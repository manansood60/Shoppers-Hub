<?php 
ob_start();
session_start();
$page="Trending";
include_once('admin/pages/db_connect.php');
include_once('header.php');
// For pagination 
  // Define number of elements per page\
  if(isset($_REQUEST['showpage'])){
    $results_per_page=$_REQUEST['showpage'];
  }else{
  $results_per_page=9;
}
  //Find out $page 
  if(!isset($_REQUEST['page'])){
    $thispage=1;
  }
  else{
    $thispage=$_REQUEST['page'];
  }
  //Query
  $startnum=($thispage-1)*$results_per_page;
  $sqlproduct="select * from tblproduct limit ".$startnum.",".$results_per_page;
  $resultproduct=mysqli_query($conn,$sqlproduct) or die(mysqli_error($conn));
  // Find out number of elements in the database
  $sqltotal="select * from tblproduct";
  $resulttotal=mysqli_query($conn,$sqltotal) or die(mysqli_error($conn));
  $number_of_elements=mysqli_num_rows($resulttotal);

  //Number of total pages available
  $number_of_pages=ceil($number_of_elements/$results_per_page);
?>  
  <!-- BANNER STRAT -->
  <div class="banner inner-banner">
    <div class="container">
      <section class="banner-detail">
        <h1 class="banner-title">Trending</h1>
        <div class="bread-crumb right-side">
          <ul>
            <li><a href="index.php">Home</a>/</li>
            <li><span>Trending</span></li>
          </ul>
        </div>
      </section>
    </div>
  </div>
  <!-- BANNER END --> 
  
  <!-- CONTAIN START -->
  <section class="ptb-50">
    <div class="container">
      <div class="row">
        <div class="col-md-3 col-sm-4 mb-xs-30">
          <div class="sidebar-block">
            <div class="sidebar-box gray-box mb-40"> <span class="opener plus"></span>
              <div class="sidebar-title">
                <h3>Shop by</h3>
              </div>
              <div class="sidebar-contant">
                <div class="price-range mb-30">
                  <div class="inner-title">Price range</div>
                  <input class="price-txt" type="text" id="amount">
                  <div id="slider-range" class="ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all"><div class="ui-slider-range ui-widget-header ui-corner-all" style="left: 9.375%; width: 53.125%;"></div><span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0" style="left: 9.375%;"></span><span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0" style="left: 62.5%;"></span></div>
                </div>
              </div>
            </div>
            <div class="sidebar-box listing-box mb-40"> <span class="opener plus"></span>
              <div class="sidebar-title">
                <h3>Categories</h3>
              </div>
              <div class="sidebar-contant">
                <div class="panel-group">
                  <div class="panel panel-default">
                  <?php 
                    $sqlcategory="select * from tblcategory";
                    $resultcategory=mysqli_query($conn,$sqlcategory) or die(mysqli_error($conn));
                    while($rowcategory=mysqli_fetch_assoc($resultcategory)){
                      echo '
                    <div class="panel-heading">
                      <a data-toggle="collapse" href="#'.$rowcategory['id'].'"><h4 class="panel-title"><span class="fa fa-caret-right"> 
                         '.$rowcategory['catname'].'</span>
                      </h4>
                      </a>
                    </div>
                    <div id="'.$rowcategory['id'].'" class="panel-collapse collapse">
                      <ul class="list-group">';
                      $sqlsubcategory="select * from tblsubcategory where catid=".$rowcategory['id'];
                      $resultsubcategory=mysqli_query($conn,$sqlsubcategory) or die(mysqli_error($resultsubcategory));
                      while($rowsubcategory=mysqli_fetch_assoc($resultsubcategory)){
                        $sqlproductcount="select count(*) from tblproduct where pscid=".$rowsubcategory['id'];
                        $resultproductcount=mysqli_query($conn,$sqlproductcount) or die(mysqli_error($conn));
                        $rowproductcount=mysqli_fetch_row($resultproductcount);
                        echo '<a href="shop.php?category='.$rowsubcategory['id'].'"><li class="list-group-item">';
                        if($rowproductcount['0']==0){
                            echo '<span class="label label-warning">'.$rowproductcount['0'].'</span> ';
                            }elseif($rowproductcount['0']<=5){
                            echo '<span class="label label-primary">'.$rowproductcount['0'].'</span> ';
                            }elseif($rowproductcount['0']>5){
                            echo '<span class="label label-success">'.$rowproductcount['0'].'</span> ';
                            }
                        echo $rowsubcategory['subcatname'].'</li></a>';
                      }
                echo '</ul>
                    </div>
                    <hr>
                      ';
                    }
                  ?>
                  </div>
                </div> 
              </div>
            </div>
            <div class="sidebar-box mb-40 visible-sm visible-md visible-lg" style="border:1px dotted red;"> <a href="todaysdeal.php"> <img  src="images/todaysdeals.png" alt="Today's Deal"> </a> </div>
            <div class="sidebar-box sidebar-item"> <span class="opener plus"></span>
              <div class="sidebar-title">
                <h3>Best Seller</h3>
              </div>
              <div class="sidebar-contant">
                <ul>
                  <?php 
                  $sqlbestseller="select * from tblproduct order by rand() limit 3";
                  $resultbestseller=mysqli_query($conn,$sqlbestseller) or die(mysqli_erro($conn));
                  while($rowbestseller=mysqli_fetch_assoc($resultbestseller)){
                    echo '
                  <li>
                    <div class="pro-media"> <a href="product-page.php?product='.$rowbestseller['id'].'"> <img src="images/products/'.$rowbestseller['productprimaryimage'].'" alt="'.$rowbestseller['producttitle'].'"> </a> </div>
                    <div class="pro-detail-info">
                    <a href="product-page.php?product='.$rowbestseller['id'].'">
                    '.$rowbestseller['producttitle'].'</a>
                      <div class="rating-summary-block">
                        <div class="rating-result" title="53%"> <span style="width:53%"></span> </div>
                      </div>
                      <div class="price-box"> <span class="price">&#8377;'.$rowbestseller['productofferprice'].'</span> </div>
                      <div class="cart-link">
                      </div>
                    </div>
                  </li>
                    ';
                  }
                  ?>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-9 col-sm-8">
          <div class="shorting mb-30">
            <div class="row">
              <div class="col-md-6">
              </div>
              <div class="col-md-6">
                <div class="show-item right-side float-left-sm"> <span>Show</span>
                  <div class="select-item">
                    <form action="#" method="post">
                    <select id="showpage" name="showpage" onchange="this.form.submit()">
                      <option value="6" <?php if($results_per_page==6){echo 'selected'; }?>>6</option>
                      <option value="9" <?php if($results_per_page==9){echo 'selected'; }?>>9</option>
                      <option value="12" <?php if($results_per_page==12){echo 'selected'; }?>>12</option>
                    </select>
                  </form>
                  </div>
                  <span>Per Page</span>
                </div>
              </div>
            </div>
          </div>
          <div class="product-listing">
            <div class="row mlr_-20">
              <?php 
                while($rowproducts=mysqli_fetch_assoc($resultproduct)){
                  echo '
              <div class="col-md-4 col-xs-6 plr-20">
                <div class="product-item">
                  <div class="sale-label"><span>Sale</span></div>
                  <div class="product-image"> <a href="product-page.php?product='.$rowproducts['id'].'"> <img src="images/products/'.$rowproducts['productprimaryimage'].'" alt="'.$rowproducts['producttitle'].'"> </a>
                  </div>
                  <div class="product-item-details">
                    <div class="product-item-name">
                    <a href="product-page.php?product='.$rowproducts['id'].'">'.$rowproducts['producttitle'].'</a> </div>
                    <div class="price-box"> 
                      <span class="price fa fa-rupee">'.$rowproducts['productofferprice'].'</span> 
                      <del class="price old-price fa fa-rupee">'.$rowproducts['productprice'].'</del>
                      <div class="rating-summary-block right-side">
                        <div title="53%" class="rating-result"> <span style="width:53%"></span> </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
                  ';
                }
              ?>
              
            </div>
            <div class="row">
              <div class="col-xs-12">
                <div class="pagination-bar">
                  <ul>
                    
                    <?php 
                    // For left Arrow
                    echo '<li><a href="';
                    if($thispage>1){
                      $temppage=$thispage-1;
                      echo 'trending.php?page='.$temppage.'&showpage='.$results_per_page;
                    }
                    echo '"><i class="fa fa-angle-left"></i></a></li>';
                    // For Pagination
                      for($page=1;$page<=$number_of_pages;$page++){
                        echo '<li ';
                        if($page==$thispage){
                          echo 'class="active"';
                        }
                        echo '><a href="trending.php?page='.$page.'&showpage='.$results_per_page.'">'.$page.'</a></li>';
                      }
                    // For right Arrow
                      echo '<li><a href="';
                    if($thispage<$number_of_pages){
                      $temppage2=$thispage+1;
                      echo 'trending.php?page='.$temppage2.'&showpage='.$results_per_page;
                    }
                    echo '"><i class="fa fa-angle-right"></i></a></li>';
                    ?>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- CONTAINER END --> 
  
<?php include_once('footer.php'); ?>
<script type="text/javascript">
  $(document).ready(function(){
    $("#showpage").change(function(){
      var val=$("#showpage").val();
      
        });
    });
  });
</script>
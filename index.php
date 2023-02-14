<?php 
ob_start();
session_start();
$page="Home";
include_once('admin/pages/db_connect.php');
include_once('header.php');
$sqlbanner="select * from tblbanner order by id limit 3";
$resultbanner=mysqli_query($conn,$sqlbanner) or die(mysqli_error($conn));
// To Handle Subscription
if(isset($_REQUEST['subscribe'])){
  $email=$_POST['email'];
  $dup=false;
  $sqlallsub="select * from tblsubscribe";
  $resultallsub=mysqli_query($conn,$sqlallsub) or die(mysqi_error($conn));
  while($rowallsub=mysqli_fetch_assoc($resultallsub)){
    if($email==$rowallsub['subemail'])
    {
      $dup=true;
      break;
    }
  }
  if($dup==false){
  $sqlsubscribe="insert into tblsubscribe values('','$email','Subscribed',curdate())";
  $test=mysqli_query($conn,$sqlsubscribe) or die(mysqli_error($conn));
  }
  else{
    $submessage="You are Already Subscribed.";
  }
}
?>
  <!-- BANNER STRAT -->
  <div class="banner">
    <div class="row">
      <div class="col-xs-12">
        <div class="main-banner">
          <?php 
            while($rowbanner=mysqli_fetch_assoc($resultbanner)){
              echo '
                <div class="item"> <img src="admin/pages/images/banner/'.$rowbanner['bimage'].'" alt="'.$rowbanner['balt'].'">
                  <div class="banner-detail">
                    <div class="container">
                      <div class="banner-detail-inner">
                        <h1 class="banner-title">'.$rowbanner['btitle'].'</h1> 
                        <span class="slogan">'.$rowbanner['bslogan'].'</span>
                        '.$rowbanner['btext'].'
                        <a href="#" class="btn btn-color">Shop Now</a>
                      </div>
                    </div>
                  </div>
                </div>
              ';
            }
          ?>
          
        </div> 
      </div>
    </div>
  </div>
  <!-- BANNER END --> 
  <!--  Site Services Features Block Start  -->
<?php if(isset($submessage)){ echo '
                <div class="alert alert-success alert-dismissable">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>Could Not Process! </strong> '.$submessage.' 
                </div>';} 
?>
  <section class="pt-50 pt-xs-30">
    <div class="container">
      <div class="ser-feature-block center-sm">
        <div class="row">
          <div class="col-md-3 col-xs-6 feature-box-main">
            <div class="feature-box feature1">
              <div class="ser-title">Free Delivery</div>
              <div class="ser-subtitle">From  &#x20B9;50.00</div>
            </div>
          </div>
          <div class="col-md-3 col-xs-6 feature-box-main">
            <div class="feature-box feature2">
              <div class="ser-title">Support 24/7</div>
              <div class="ser-subtitle">Online 24 hours</div>
            </div>
          </div>
          <div class="col-md-3 col-xs-6 feature-box-main">
            <div class="feature-box feature3">
              <div class="ser-title">Free return</div>
              <div class="ser-subtitle">365 a day</div>
            </div>
          </div>
          <div class="col-md-3 col-xs-6 feature-box-main">
            <div class="feature-box feature4">
              <div class="ser-title">Big Saving</div>
              <div class="ser-subtitle">Weeken Sales</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--  Site Services Features Block End  -->

  <!-- CONTAIN START -->
  <section class="ptb-50 ptb-xs-30">
    <div class="container">
      <div class="row">
        <div class="col-md-3 col-sm-4 mb-xs-30">
          <div class="sidebar-block">
  
             <div class="sidebar-box mb-30 visible-sm visible-md visible-lg hidden-xs" style="border:1px dotted red;"> 
                <a href="todaysdeal.php"><img src="images/todaysdeals.png" alt="Today's Deal"></a> 
             </div>
             <div class="sidebar-box gray-box mb-40"> <span class="opener plus"></span>
              <div class="sidebar-title">
                <h3>testimonials</h3>
              </div>
              <div class="sidebar-contant">
                <div class="client-inner testimonial-block">
                <div id="client" class="owl-carousel">
                  <?php 
                  $sqltestimonial="select * from tbltestimonial order by id desc limit 3";
                  $resulttestimonial=mysqli_query($conn,$sqltestimonial) or die(mysqli_erro($conn));
                  while($rowtestimonial=mysqli_fetch_assoc($resulttestimonial)){
                    echo '
                  <div class="item client-detail">
                    <div class="client-img"> <img src="images/testimonials/'.$rowtestimonial['image'].'" alt="'.$rowtestimonial['name'].'" height="200px"> </div>
                    <p>"'.$rowtestimonial['review'].'"</p>
                    <h4 class="sub-title client-title">'.$rowtestimonial['occupation'].'</h4>
                    <div class="date">'.$rowtestimonial['adddate'].'</div>
                  </div>
                    ';
                  }
                  ?>
                </div>
              </div>
             </div>
            </div>
            <div class="sidebar-box sidebar-item hidden-xs">
              <div class="sidebar-contant">
                <div class="newsletter">
                  <div class="newsletter-inner"> <img src="images/newsletter-icon.png" alt="SuperStore">
                    <h2 class="main_title">Subscribe Emails</h2>
                    <span>Get Latest News & Update</span>
                    <p>also the leap into electronic typesetting, remaining essentially</p>
                    <form action="#" method="post">
                    <input type="email" name="email" placeholder="Your email address..." required>
                    <button class="btn-color" name="subscribe" title="Subscribe">Subscribe</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-9 col-sm-8">
          <div class="product-slider mb-40">
            <div class="row">
              <div class="col-md-12">
                <div class="">
                  <div class="category-bar mb-20 p-0">
                    <ul class="tab-stap">
                      <li id="step1" class="active"><a href="javascript:void(0)">Featured Products</a></li>
                      <li id="step2"><a href="javascript:void(0)">Latest Products</a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <div class="featured-product">
              <div class="pro_cat">
                <div id="data-step1" class="product-slider-main position-r" data-temp="tabdata">
                  <div class="row mlr_-20">
                    <?php 
                    $sqlfeatured="select * from tblproduct where (pscid=16 or pscid=17) order by rand() limit 6";
                    $resultfeatured=mysqli_query($conn,$sqlfeatured) or die(mysqli_error($conn));
                    $i=1;
                    while($rowfeatured=mysqli_fetch_assoc($resultfeatured)){
                      echo '
                    <div class="col-md-4 col-xs-6 plr-20">
                      <div class="product-item">
                        <div class="sale-label"><span>Sale</span></div>
                        <div class="product-image"> <a href="product-page.php?product='.$rowfeatured['id'].'"> <img src="images/products/'.$rowfeatured['productprimaryimage'].'" alt="'.$rowfeatured['producttitle'].'"> </a>
                          <div class="product-detail-inner">
                          </div>
                        </div>
                        <div class="product-item-details">
                          <div class="product-item-name"> <a href="product-page.php?product='.$rowfeatured['id'].'">'.$rowfeatured['producttitle'].'</a> </div>
                          <div class="price-box"> 
                              <span class="price fa fa-rupee">'.$rowfeatured['productofferprice'].'</span>
                              <del class="price old-price fa fa-rupee">'.$rowfeatured['productofferprice'].'</del>
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
                </div>
                <div id="data-step2" class="product-slider-main position-r" data-temp="tabdata" style="display:none">
                   <div class="row mlr_-20">
                    <?php 
                    $sqllatest="select * from tblproduct order by id desc limit 6";
                    $resultlatest=mysqli_query($conn,$sqllatest) or die(mysqli_error($conn));
                    $i=1;
                    while($rowlatest=mysqli_fetch_assoc($resultlatest)){
                      echo '
                    <div class="col-md-4 col-xs-6 plr-20">
                      <div class="product-item">
                        <div class="sale-label"><span>Sale</span></div>
                        <div class="product-image"> <a href="product-page.php?product='.$rowlatest['id'].'"> <img src="images/products/'.$rowlatest['productprimaryimage'].'" alt="'.$rowlatest['producttitle'].'"> </a>
                          <div class="product-detail-inner">
                          </div>
                        </div>
                        <div class="product-item-details">
                          <div class="product-item-name"> <a href="product-page.php?product='.$rowlatest['id'].'">'.$rowlatest['producttitle'].'</a> </div>
                          <div class="price-box"> 
                              <span class="price fa fa-rupee">'.$rowlatest['productofferprice'].'</span>
                              <del class="price old-price fa fa-rupee">'.$rowlatest['productofferprice'].'</del>
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
                </div>
              </div>
            </div>
          </div>
        <div class="product-slider">
        <div class="row">
          <div class="col-xs-12">
            <div class="heading-part mb-20">
              <h2 class="main_title">New Sellers</h2>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="position-r"><!-- dresses -->
            <div class="owl-carousel pro_cat_slider"><!-- id="product-slider" -->
              <?php 
              $sqlseller="select * from tblproduct order by rand() limit 6";
              $resultseller=mysqli_query($conn,$sqlseller) or die(mysqli_error($conn));
              while($rowseller=mysqli_fetch_assoc($resultseller)){
                echo '
               <div class="item">
                <div class="product-item">
                  <div class="sale-label"><span>Sale</span></div>
                  <div class="product-image"> <a href="product-page.php?product='.$rowseller['id'].'"> <img src="images/products/'.$rowseller['productprimaryimage'].'" alt="'.$rowseller['producttitle'].'"> </a>
                    <div class="product-detail-inner">
                    </div>
                  </div>
                  <div class="product-item-details">
                    <div class="product-item-name"> <a href="product-page.php?product='.$rowseller['id'].'">'.$rowseller['producttitle'].'</a> </div>
                    <div class="price-box"> 
                        <span class="price fa fa-rupee">'.$rowseller['productofferprice'].'</span> <del class="price old-price fa fa-rupee">'.$rowseller['productprice'].'</del>
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
          </div>
        </div>
      </div>
      </div>
      </div>
    </div>
  </section>
  <!-- CONTAINER END --> 
  
  <!-- CONTAIN START -->
  <section>
    <div class="container">
      <div class="sub-banner-block center-xs">
        <div class="row mlr_-20">
          <div class="col-md-4 col-sm-4 col-xs-6 hidden-xs plr-10">
            <div class="sub-banner sub-banner1"> 
              <a> 
                <img src="images/sub-banner1.jpg" alt="SuperStore">
                <!-- <div class="sub-banner-detail">
                  <div class="sub-banner-type">STYLISH <br>WRISTBAND</div>
                </div> -->
                <div class="sub-banner-effect"></div>
              </a> 
            </div>
          </div>
          <div class="col-md-3 col-sm-3 hidden-xs plr-10">
            <div class="sub-banner sub-banner2"> 
              <a> 
                <img src="images/sub-banner2.jpg" alt="SuperStore">
               <!--  <div class="sub-banner-detail">
                 <div class="sub-banner-type">FREE</div>
                 <div class="sub-banner-title2">SHIPPING</div>
                 <div class="sub-banner-subtitle2">OVER $300</div>
               </div> -->
                <div class="sub-banner-effect"></div>
              </a> 
            </div>
            <div class="sub-banner sub-banner3"> 
              <a> 
                <img src="images/sub-banner3.jpg" alt="SuperStore">
                <!-- <div class="sub-banner-detail">
                  <div class="sub-banner-type">BUY  <span>MORE</span></div>
                  <div class="sub-banner-type">SAVE<span>MORE</span></div>
                  <div class="money-bank"><img src="images/money-icon.png" alt="SuperStore"></div>
                </div> -->
                <div class="sub-banner-effect"></div>
              </a>  
            </div>
          </div>
          <div class="col-md-5 col-sm-5 col-xs-6 hidden-xs plr-10">
            <div class="sub-banner sub-banner4"> 
              <a> 
                <img src="images/sub-banner4.jpg" alt="SuperStore">
                <!-- <div class="sub-banner-detail">
                  <div class="sub-banner-type">WALNUT SPEAKERS <br>& AMP</div>
                  <span class="btn btn-color">SHOP NOW</span>
                </div> -->
                <div class="sub-banner-effect"></div>
              </a> 
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
   
  <!-- Brand logo block Start  -->
  <section>
    <div class="container">
    </div>
  </section>
  <!-- Brand logo block End  --> 
  
  <!-- CONTAINER END --> 
<?php include_once('footer.php'); ?>
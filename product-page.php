<?php 
ob_start();
session_start();
$page="Product";
include_once('admin/pages/db_connect.php');
include_once('header.php');
if(isset($_REQUEST['product'])){
  $product=$_REQUEST['product'];
  $sqlproduct="select * from tblproduct where id=$product";
  $resultproduct=mysqli_query($conn,$sqlproduct) or die(mysqli_error($conn));
  $rowproduct=mysqli_fetch_assoc($resultproduct);
  // Add to Cart Process.
  if(isset($_POST['addtocart'])){
    if(!isset($_SESSION['user'])){
    header('location:login.php?product='.$product); 
    }
    else{
    if(!(isset($_POST['size']))){
    $productsize="No Size"; 
    }else {
    $productsize=$_POST['size'];
    }
    $productqty=$_POST['qty'];
    $userid=$_SESSION['user'];
    echo $product.$productsize.$productqty;
    $sqlinsertcart="insert into tblcart values('',$product,$userid,'$productsize','$productqty',curdate())";
    $test=mysqli_query($conn,$sqlinsertcart) or die(mysqli_error($conn));
    if($test){
    header('location:product-page.php?product='.$product);
    }}
  }

}
else {
  header('location:index.php');
}
?> 
  <!-- BANNER STRAT -->
  <div class="banner inner-banner align-center">
    <div class="container">
      <section class="banner-detail">
        <h1 class="banner-title"><?php echo $rowproduct['producttitle']; ?></h1>
        <div class="bread-crumb right-side">
          <ul>
            <li><a href="index.php">Home</a>/</li>
            <li><span><?php echo $rowproduct['producttitle']; ?></span></li>
          </ul>
        </div>
      </section>
    </div>
  </div>
  <!-- BANNER END --> 
  
  <!-- CONTAIN START -->
  <?php echo '
  <section class="pt-50">
    <div class="container">
      <div class="row">
        <div class="col-md-5 col-sm-5 mb-xs-30">
          <div class="fotorama" data-nav="thumbs" data-allowfullscreen="native"> <a href="#"><img src="images/products/'.$rowproduct['productprimaryimage'].'" alt="'.$rowproduct['producttitle'].'"></a> 
            <a href="#"><img src="images/products/'.$rowproduct['productimage1'].'" alt="'.$rowproduct['producttitle'].'"></a> 
            <a href="#"><img src="images/products/'.$rowproduct['productimage2'].'" alt="'.$rowproduct['producttitle'].'"></a> 
            <a href="#"><img src="images/products/'.$rowproduct['productimage3'].'" alt="'.$rowproduct['producttitle'].'"></a> 
          </div>
        </div>
        <div class="col-md-7 col-sm-7">
          <div class="row">
            <div class="col-xs-12">
              <div class="product-detail-main">
                <div class="product-item-details">
                  <h1 class="product-item-name">'.$rowproduct['producttitle'].'</h1>
                  <div class="rating-summary-block">
                    <div title="53%" class="rating-result"> <span style="width:53%"></span> </div>
                  </div>
                  <div class="price-box"> <span class="price fa fa-rupee">'.$rowproduct['productofferprice'].'</span> <del class="price old-price fa fa-rupee">'.$rowproduct['productprice'].'</del> </div>
                  <div class="product-info-stock-sku">
                  <form action="#" method="post">
                    <div>
                      <label>Availability: </label>
                      <span class="info-deta">';if($rowproduct['producttotalunits']>=1){ echo 'In stock'; } else { echo 'Out of Stock'; } echo '</span> </div>
                    
                  <p style="max-height:20ch; overflow:hidden;">'.$rowproduct['productdescription'].'</p>
                  '; 
                  if($rowproduct['psid']==1){ echo ' '; }
                    else{
                      $sqlsize="select * from tblsizechart where id=".$rowproduct['psid'];
                      $resultsize=mysqli_query($conn,$sqlsize) or die(mysqli_error($conn)); 
                      $rowsize=mysqli_fetch_assoc($resultsize);
                      $sizearray=explode(',',$rowsize['size']);
                      $i=0; 
                    echo '
                    <div class="product-size select-arrow mb-20 mt-30">
                    <label>Size</label>
                    <select class="selectpicker form-control" id="select-by-size" name="size" required>
                    <option value=""> Select Size </option>'; 
                      while(!empty($sizearray[$i])){
                        echo '
                      <option value="'.$sizearray[$i].'">'.$sizearray[$i].'</option>
                            '; 
                        $i++;
                    }
                      echo '
                      </select>
                  </div>';
                    } 
                      ?>
                    <div class="mb-40">
                    <div class="product-qty"> 
                        <label for="qty">Qty:</label>
                        <div class="custom-qty">
                          <input type="number" class="input-text qty" title="Qty" value="1" min="1" max="<?php echo $rowproduct['producttotalunits']; ?>" name="qty">
                        </div>
                    </div>
                    <div class="bottom-detail cart-button">
                      <ul>
                        <li class="pro-cart-icon">                         
                            <button type="submit" title="Add to Cart" class="btn-black" name="addtocart"><span></span>Add to Cart</button>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <div class="share-link">
                    <label>Share This : </label>
                    <div class="social-link">
                      <ul class="social-icon">
                        <li><a class="facebook" title="Facebook" href="#"><i class="fa fa-facebook"> </i></a></li>
                        <li><a class="twitter" title="Twitter" href="#"><i class="fa fa-twitter"> </i></a></li>
                        <li><a class="linkedin" title="Linkedin" href="#"><i class="fa fa-linkedin"> </i></a></li>
                        <li><a class="rss" title="RSS" href="#"><i class="fa fa-rss"> </i></a></li>
                        <li><a class="pinterest" title="Pinterest" href="#"><i class="fa fa-pinterest"> </i></a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section> 
  <section class="ptb-50">
    <div class="container">
      <div class="product-detail-tab">
        <div class="row">
          <div class="col-md-12">
            <div id="tabs">
              <ul class="nav nav-tabs">
                <li><a class="tab-Description selected" title="Description">Description</a></li>
                <li><a class="tab-Product-Tags" title="Product-Tags">Product-Tags</a></li>
                <li><a class="tab-Reviews" title="Reviews">Reviews</a></li>
              </ul>
            </div>
            <div id="items">
              <div class="tab_content">
                <ul>
                  <li>
                    <div class="items-Description selected gray-bg">
                      <div class="Description"> 
                        <?php echo $rowproduct['productdescription']; ?>
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="items-Product-Tags gray-bg"><strong>Section 1.10.32 of "de Finibus Bonorum et Malorum", written by Cicero in 45 BC</strong><br />
                      Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur</div>
                  </li>
                  <li>
                    <div class="items-Reviews gray-bg">
                      <div class="comments-area">
                        <h4>Comments<span>(2)</span></h4>
                        <ul class="comment-list mt-30">
                          <li>
                            <div class="comment-user"> <img src="images/comment-user.jpg" alt="SuperStore"> </div>
                            <div class="comment-detail">
                              <div class="user-name">John Doe</div>
                              <div class="post-info">
                                <ul>
                                  <li>Fab 11, 2016</li>
                                  <li><a href="#"><i class="fa fa-reply"></i>Reply</a></li>
                                </ul>
                              </div>
                              <p>Consectetur adipiscing elit integer sit amet augue laoreet maximus nuncac.</p>
                            </div>
                            <ul class="comment-list child-comment">
                              <li>
                                <div class="comment-user"> <img src="images/comment-user.jpg" alt="SuperStore"> </div>
                                <div class="comment-detail">
                                  <div class="user-name">John Doe</div>
                                  <div class="post-info">
                                    <ul>
                                      <li>Fab 11, 2016</li>
                                      <li><a href="#"><i class="fa fa-reply"></i>Reply</a></li>
                                    </ul>
                                  </div>
                                  <p>Consectetur adipiscing elit integer sit amet augue laoreet maximus nuncac.</p>
                                </div>
                              </li>
                              <li>
                                <div class="comment-user"> <img src="images/comment-user.jpg" alt="SuperStore"> </div>
                                <div class="comment-detail">
                                  <div class="user-name">John Doe</div>
                                  <div class="post-info">
                                    <ul>
                                      <li>Fab 11, 2016</li>
                                      <li><a href="#"><i class="fa fa-reply"></i>Reply</a></li>
                                    </ul>
                                  </div>
                                  <p>Consectetur adipiscing elit integer sit amet augue laoreet maximus nuncac.</p>
                                </div>
                              </li>
                            </ul>
                          </li>
                          <li>
                            <div class="comment-user"> <img src="images/comment-user.jpg" alt="SuperStore"> </div>
                            <div class="comment-detail">
                              <div class="user-name">John Doe</div>
                              <div class="post-info">
                                <ul>
                                  <li>Fab 11, 2016</li>
                                  <li><a href="#"><i class="fa fa-reply"></i>Reply</a></li>
                                </ul>
                              </div>
                              <p>Consectetur adipiscing elit integer sit amet augue laoreet maximus nuncac.</p>
                            </div>
                          </li>
                        </ul>
                      </div>
                      <div class="main-form mt-30">
                        <h4>Leave a comments</h4>
                        <div class="row mt-30">
                          <form >
                            <div class="col-sm-4 mb-30">
                              <input type="text" placeholder="Name" required>
                            </div>
                            <div class="col-sm-4 mb-30">
                              <input type="email" placeholder="Email" required>
                            </div>
                            <div class="col-sm-4 mb-30">
                              <input type="text" placeholder="Website" required>
                            </div>
                            <div class="col-xs-12 mb-30">
                              <textarea cols="30" rows="3" placeholder="Message" required></textarea>
                            </div>
                            <div class="col-xs-12 mb-30">
                              <button class="btn-black" name="submit" type="submit">Submit</button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="pb-95">
    <div class="container">
      <div class="product-slider">
        <div class="row">
          <div class="col-xs-12">
            <div class="heading-part mb-20">
              <h2 class="main_title">Related Products</h2>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="product-slider-main position-r"><!-- dresses -->
            <div class="owl-carousel pro_rel_slider"><!-- id="product-slider" -->
              <?php 
              $sqlrelated='select * from tblproduct where pcid='.$rowproduct['pcid'].' order by rand()  limit 7';
              $resultrelated=mysqli_query($conn,$sqlrelated) or die($conn);
              while($rowrelated=mysqli_fetch_assoc($resultrelated)){
                echo '
              <div class="item">
                <div class="product-item">
                  <div class="sale-label"><span>Sale</span></div>
                  <div class="product-image"><a href="product-page.php?product='.$rowrelated['id'].'"> <img src="images/products/'.$rowrelated['productprimaryimage'].'" alt="'.$rowrelated['producttitle'].'"> </a> 
                    <div class="product-detail-inner">
                    </div>
                  </div>
                  <div class="product-item-details">
                    <div class="product-item-name"> <a href="product-page.php?product='.$rowrelated['id'].'">'.$rowrelated['producttitle'].'</a> </div>
                    <div class="price-box"> 
                      <span class="price fa fa-rupee">'.$rowrelated['productofferprice'].'</span> 
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
  </section>
  <!-- CONTAINER END --> 
<?php include_once('footer.php'); ?>
<script type="text/javascript">
  $(document).ready(function(){
    //To send CategoryId and receiving Subcategories IN ADDPRODUCT
    $('#select-by-size').on("change",function () {
        var size = $(this).find('option:selected').val();
        var product= <?php echo $rowproduct['id']; ?>;
        $.ajax({
            url: "ajax.php",
            type: "POST",
            data: "size="+size+','+product,
            success: function (response) {
                console.log(response);
                $(".product-qty").html(response);
            },
        });
    });
  });
</script>
<?php 
ob_start();
session_start();
$page="Checkout";
include_once('admin/pages/db_connect.php');
include_once('header.php');
if(isset($_SESSION['user'])){
$user=$_SESSION['user'];
}
else {
  header("location:login.php");
}
?>  
  <!-- BANNER STRAT -->
  <div class="banner inner-banner align-center">
    <div class="container">
      <section class="banner-detail">
        <h1 class="banner-title">Checkout</h1>
        <div class="bread-crumb right-side">
          <ul>
            <li><a href="index.php">Home</a>/</li>
            <li><a href="cart.php">Cart</a>/</li>
            <li><span>Checkout</span></li>
          </ul>
        </div>
      </section>
    </div>
  </div>
  <!-- BANNER END --> 
  
  <!-- CONTAIN START -->
  <section class="checkout-section ptb-50">
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <div class="checkout-step mb-40">
            <ul>
              <li> <a href="#">
                <div class="step">
                  <div class="line"></div>
                  <div class="circle">1</div>
                </div>
                <span>Shipping</span> </a> </li>
              <li> <a href="#">
                <div class="step">
                  <div class="line"></div>
                  <div class="circle">2</div>
                </div>
                <span>Order Overview</span> </a> </li>
              <li> <a href="#">
                <div class="step">
                  <div class="line"></div>
                  <div class="circle">3</div>
                </div>
                <span>Payment</span> </a> </li>
              <li class="active"> <a href="order-complete.php">
                <div class="step">
                  <div class="line"></div>
                  <div class="circle">4</div>
                </div>
                <span>Order Complete</span> </a> </li>
              <li>
                <div class="step">
                  <div class="line"></div>
                </div>
              </li>
            </ul>
            <hr>
          </div>
          <div class="checkout-content">
            <div class="row">
              <div class="col-xs-12">
                <div class="heading-part align-center">
                  <h2 class="heading">Order Overview</h2>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-8 mb-sm-30">
                <div class="cart-item-table complete-order-table commun-table mb-30">
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Product</th>
                          <th>Product Detail</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                          $order=$_REQUEST['order'];
                          $sqlorder="select * from tblorder where ordernumber='$order'";
                          $resultorder=mysqli_query($conn,$sqlorder) or die(mysqli_error($resultorder));
                          $total=0;
                          while($roworder=mysqli_fetch_assoc($resultorder)){
                            $total=$roworder['price']+$total;
                            $orderdate=$roworder['orderdate'];
                            $paymentmethod=$roworder['paymentmethod'];
                            $sqlproduct="select * from tblproduct where id=".$roworder['pid'];
                            $resultproduct=mysqli_query($conn,$sqlproduct) or die(mysqli_error($conn));
                            $rowproduct=mysqli_fetch_assoc($resultproduct);
                            echo '
                        <tr>
                          <td><a href="product-page.php?product='.$rowproduct['id'].'">
                            <div class="product-image product-image-small"><img alt="'.$rowproduct['producttitle'].'" src="images/products/'.$rowproduct['productprimaryimage'].'">
                            </div>
                            </a>
                          </td>
                          <td><div class="product-title"> <a href="product-page.php?product='.$rowproduct['id'].'">'.$rowproduct['producttitle'].'</a> </div>
                              <div class="product-info-stock-sku m-0">
                                <div>
                                  <label>Price: </label>
                                  <div class="price-box"> <span class="price fa fa-rupee">'.$rowproduct['productofferprice'].'</span> </div>
                                </div>
                              </div>
                              <div class="product-info-stock-sku m-0">';
                                if($roworder['size']=="No Size"){}
                                else {
                                  echo '
                                <div>
                                  <label>Size:  </label>
                                  <span class="info-deta">'.$roworder['size'].' </span> 
                                </div>';
                                }
                                echo '
                                <div>
                                  <label>Quantity:  </label>
                                  <span class="info-deta">'.$roworder['qty'].' </span> 
                                </div>
                              </div>
                            </div></td>
                        </tr>
                            ';
                          }
                        ?>
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="complete-order-detail commun-table mb-30">
                  <div class="table-responsive">
                    <table class="table">
                      <tbody>
                        <tr>
                          <td><b>Order Places :</b></td>
                          <td><?php echo $orderdate; ?></td>
                        </tr>
                        <tr>
                          <td><b>Total :</b></td>
                          <td><div class="price-box"> <span class="price fa fa-rupee"><?php echo $total; ?>.00</span> </div></td>
                        </tr>
                        <tr>
                          <td><b>Payment :</b></td>
                          <td><?php echo $paymentmethod; ?></td>
                        </tr>
                        <tr>
                          <td><b>Order No. :</b></td>
                          <td>#<?php echo $order; ?></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="mb-30">
                  <div class="heading-part">
                    <h3 class="sub-heading">Order Confirmation</h3>
                  </div>
                  <hr>
                  <p class="mt-20">Thank You for your Order.</p>
                </div>
                <div class="right-side float-none-xs"> <a class="btn btn-black" href="shop.php"><span><i class="fa fa-angle-left"></i></span>Continue Shopping</a> </div>
              </div>
              <div class="col-sm-4">
                <div class="cart-total-table address-box commun-table mb-30">
                  <div class="table-responsive">
                    <table class="table">
                        <thead>
                          <tr>
                            <th>Shipping Address</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                          if($row['useraddress']==""){
                          echo 
                          '<tr><td>
                          <div class="account-tab-inner">
                            <ul class="account-tab-stap">
                              <li id="step2"> 
                              <a href="javascript:void(0)"> Enter Shipping Address</a>
                              </li>
                            </ul>
                          </div>
                            </tr></td>
                          ';
                          }
                          else {
                           echo '<tr>
                            <td><ul>
                                <li class="inner-heading"> <b>'.$row['userfname'].' '.$row['userlname'].'</b> </li>
                                <li>
                                  <p>'.$row['useraddress'].',</p>
                                </li>
                                <li>
                                  <p>'.$row['userlandmark'].',</p>
                                </li>
                                <li>
                                  <p>'.$row['userstate'].','.$row['usercity'].','.$row['userpincode'].'.</p>
                                </li>
                                <li>
                                  <p>India</p>
                                </li>
                              </ul></td>
                          </tr>'; 
                          }

                          ?>
                          
                        </tbody>
                      </table>
                  </div>
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

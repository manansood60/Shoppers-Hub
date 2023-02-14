<?php 
ob_start();
session_start();
$page="Checkout";
include_once('admin/pages/db_connect.php');
include_once('header.php'); 
if(isset($_SESSION['user'])){

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
              <li> <a href="checkout-2.php">
                <div class="step">
                  <div class="line"></div>
                  <div class="circle">1</div>
                </div>
                <span>Shipping</span> </a> </li>
              <li class="active"> <a href="order-overview.php">
                <div class="step">
                  <div class="line"></div>
                  <div class="circle">2</div>
                </div>
                <span>Order Overview</span> </a> </li>
              <li> <a href="payment.php">
                <div class="step">
                  <div class="line"></div>
                  <div class="circle">3</div>
                </div>
                <span>Payment</span> </a> </li>
              <li> <a href="order-complete.php">
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
                <div class="cart-item-table commun-table mb-30">
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Product</th>
                          <th>Product Detail</th>
                          <th>Sub Total</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                        $sqlfullcart="select * from tblcart where uid=$userid";
                        $resultfullcart=mysqli_query($conn,$sqlfullcart) or die(mysqli_error($conn));
                        $fulltotal=0;
                        while($rowfullcart=mysqli_fetch_assoc($resultfullcart)){
                          $sqlcartproduct="select * from tblproduct where id=".$rowfullcart['pid'];
                          $resultcartproduct=mysqli_query($conn,$sqlcartproduct) or die(mysqli_error($conn));
                          $rowcartproduct=mysqli_fetch_assoc($resultcartproduct);
                        echo '
                        <tr>
                          <td><a href="product-page.php">
                            <a href="product-page.php?product='.$rowcartproduct['id'].'">
                              <div class="product-image product-image-small"><img alt="'.$rowcartproduct['producttitle'].'" src="images/products/'.$rowcartproduct['productprimaryimage'].'"></div>
                            </a>
                          </td>
                          <td>
                            <div class="product-title">  <a href="product-page.php?product='.$rowcartproduct['id'].'">'.$rowcartproduct['producttitle'].'</a>
                              <div class="product-info-stock-sku m-0">
                                <div>
                                  <label>Price: </label>
                                  <div class="price-box"> <span class="price fa fa-rupee">'.$rowcartproduct['productofferprice'].'</span>  </div>
                                </div>
                              </div>
                              <div class="product-info-stock-sku m-0">';
                              if($rowfullcart['size']=="No Size"){}
                                else {
                                  echo '
                                <div>
                                  <label>Size:  </label>
                                  <span class="info-deta">'.$rowfullcart['size'].' </span> 
                                </div>';
                                }
                                echo '
                                <div>
                                  <label>Quantity:  </label>
                                  <span class="info-deta">'.$rowfullcart['qty'].' </span> 
                                </div>
                              </div>
                            </div>
                          </td>
                          <td><div data-id="100" class="total-price price-box">  <span class="price fa fa-rupee">';
                            $subtotal=$rowfullcart['qty']*$rowcartproduct['productofferprice'];
                            echo $subtotal.'</span> </div>
                          </td>
                          <td><i title="Remove Item From Cart" data-value="'.$rowfullcart['id'].'" class="fa fa-trash cart-remove-item" id="deletecartproduct"></i>
                          </td>
                        </tr>
                        '; 
                        $fulltotal+=$subtotal;
                      }
                        ?>
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="cart-total-table commun-table mb-30">
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th colspan="2">Cart Total</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>Item(s) Subtotal</td>
                          <td><div class="price-box"> <span class="price fa fa-rupee"><?php 
                          echo $fulltotal;
                          ?>.00</span> </div></td>
                        </tr>
                        <tr>
                          <td>Shipping</td>
                          <td><div class="price-box"> <span class="price fa fa-rupee">50.00</span> </div></td>
                        </tr>
                        <tr>
                          <td><b>Amount Payable</b></td>
                          <td><div class="price-box"> <span class="price fa fa-rupee"><b><?php $Totalamount=$fulltotal+50; echo $Totalamount;?>.00</b></span> </div></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="right-side float-none-xs"> <a href="payment.php" class="btn btn-black">Next</a> </div>
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
<script type="text/javascript">
  $(document).ready(function(){
    $("#deletecartproduct").click(function(){
      var deletecartid=$(this).data('value');
      console.log(deletecartid);
      $.ajax({
            url: "ajax.php",
            type: "POST",
            data: "deletecartid="+deletecartid,
            success: function (response) {
                location.reload();
            },
        });
    });
  });

</script>
<?php 
include_once('admin/pages/db_connect.php');
  // To Return Size Quantity in
  if(isset($_POST['size'])){
  $sizestring = $_POST['size'];
  $array=explode(',',$sizestring);
  $size=$array[0];
  $productid=$array[1];
  if($size==""){
  	echo '<label for="qty">Qty:</label>
              <div class="custom-qty">
                <input type="number" class="input-text qty" title="Qty" value="1" min="1" max="1" name="qty">
              </div>';
  }
  else {
  $sqlsizechart="select * from tblsizechart where id=(select psid from tblproduct where id=$productid)";
  $resultsizechart=mysqli_query($conn,$sqlsizechart) or die(mysqli_error($conn));
  $rowsizechart=mysqli_fetch_assoc($resultsizechart);
  $sizearray=explode(',',$rowsizechart['size']);
  $i=0;
  while(!empty($sizearray[$i])){
  	if($size==$sizearray[$i]){
  		break;
  	}
  	$i++;
  }
  $sqlproduct="select * from tblproduct where id=".$productid;
  $resultproduct=mysqli_query($conn,$sqlproduct) or die(mysqli_error($conn));
  $rowproduct=mysqli_fetch_assoc($resultproduct);
  $quantityarray=explode(',',$rowproduct['productquantities']);
  echo '
  					<label for="qty">Qty:</label>
                        <div class="custom-qty"><input type="number" min="1" max="'.$quantityarray[$i].'" value="1" class="input-text qty" name="qty"> </input>
                        </div>';
  }
  }
  // To Handle Delete Request from Dropdown Cart
  if(isset($_POST['cartid'])){
  	session_start();
  	$userid=$_SESSION['user'];
  	$cartid=$_POST['cartid'];
  	$sqldeletecart="delete from tblcart where (id=$cartid AND uid=$userid)";
  	$test=mysqli_query($conn,$sqldeletecart) or die(mysqli_error($conn));
  	if(isset($_SESSION['user'])){
                  $userid=$_SESSION['user'];
                  $sqlcartcount='select count(*) from tblcart where uid='.$userid;
                  $resultcartcount=mysqli_query($conn,$sqlcartcount)or die(mysqil_error($conn)); 
                  $rowcount=mysqli_fetch_row($resultcartcount); 
                  $sqlcart="select * from tblcart where uid=$userid order by id desc limit 2";
                  $resultcart=mysqli_query($conn,$sqlcart) or die(mysqli_error($conn));
                }
                echo '
                  <a href="#">
                    <span> <!-- <small class="cart-notification">2</small> --> </span>
                    <div class="cart-text hidden-sm hidden-xs">My Cart ';
                    if(isset($rowcount['0'])) { echo '('.$rowcount['0'].')'; }
                    echo ' </div>
                  </a>
                  <div class="cart-dropdown header-link-dropdown">
                    <ul class="cart-list link-dropdown-list">';
                    if(isset($_SESSION['user'])){
                      $i=1;
                      while($rowcart=mysqli_fetch_assoc($resultcart)){
                        $sqlcartproduct="select * from tblproduct where id=".$rowcart['pid'];
                        $resultcartproduct=mysqli_query($conn,$sqlcartproduct) or die(mysqli_error($conn));
                        $rowcartproduct=mysqli_fetch_assoc($resultcartproduct);
                        echo '<li> <a class="close-cart" data-value="'.$rowcart['id'].'" id="delete-small-cart'.$i.'"><i class="fa fa-times-circle"></i></a>
                        <div class="media"> <a class="pull-left" href="product-page.php?product='.$rowcart['pid'].'"> <img alt="SuperStore" src="images/products/'.$rowcartproduct['productprimaryimage'].'"></a>
                          <div class="media-body"> <span><a href="product-page.php?product='.$rowcart['pid'].'">'.$rowcartproduct['producttitle'].'</a></span>
                            <p class="cart-price"><i class="fa fa-rupee"></i>'.$rowcartproduct['productofferprice'].'</p>
                            <div class="product-qty">
                              <label>Qty:</label>
                              <div class="custom-qty">
                                <input type="text" name="qty" maxlength="8" value="'.$rowcart['qty'].'" title="Qty" class="input-text qty" disabled>
                              </div>
                            </div>
                          </div>
                        </div>
                      </li>';
                      $i++;
                      }
                    } 
                    echo '  
                    </ul>
                    <div class="clearfix"></div>
                    <div class="mt-20"> <a href="cart.php" class="btn-color btn">Full Cart</a> <a href="checkout-2.php" class="btn-color btn right-side">Checkout</a> </div>
                  </div> ';
  }
// To Handle Delete function from main Cart
  if(isset($_POST['deletecartid'])){
  	session_start();
  	$userid=$_SESSION['user'];
  	$deleteid=$_POST['deletecartid'];
  	$sqldelete="delete from tblcart where (id=$deleteid AND uid=$userid)";
  	$test=mysqli_query($conn,$sqldelete) or die(mysqli_error($conn));
  	echo "success";
  }
// To Handle Delete function from Order
  if(isset($_POST['deleteorderid'])){
    session_start();
    $userid=$_SESSION['user'];
    $deleteid=$_POST['deleteorderid'];
    $sqldelete="delete from tblorder where (id=$deleteid AND uid=$userid)";
    $test=mysqli_query($conn,$sqldelete) or die(mysqli_error($conn));
    echo "success";
  }
// To Handle Show per Page 
  if(isset($_POST['showperpage'])){
    $perpage=$_POST['showperpage'];
    $results_per_page=$perpage;
  }

?>
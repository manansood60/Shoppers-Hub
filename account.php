<?php 
ob_start();
session_start();
$page="Account";
include_once('admin/pages/db_connect.php');
include_once('header.php');
if(isset($_SESSION['user'])){
$userid=$_SESSION['user'];
$sql="select * from tbluser where id=$userid";
$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));  
$row=mysqli_fetch_assoc($result);
// To handle Submission of Account Details
  if(isset($_REQUEST['submit'])){
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $email=$_POST['email'];
    $number=$_POST['number'];
    $address=$_POST['address'];
    $landmark=$_POST['landmark'];
    $state=$_POST['state'];
    $city=$_POST['city'];
    $pincode=$_POST['pincode'];
    $sqlupdateuser="update tbluser set userfname='$fname', userlname='$lname', useremail='$email', userphone='$number', useraddress='$address', userlandmark='$landmark', userstate='$state', usercity='$city', userpincode='$pincode' where id=$userid";
    $test=mysqli_query($conn,$sqlupdateuser) or die(mysqli_error($conn));
    if($test){
      $profileupdate=TRUE;
    }
  }
  // To Handle Change Password
  if(isset($_REQUEST['changepassword'])){
    $oldpassword=$_POST['oldpassword'];
    $newpassword=$_POST['password'];
    $cpassword=$_POST['cpassword'];
    if($oldpassword!=$row['userpassword']){
      $wrongpassword=TRUE;
    }elseif($newpassword!=$cpassword){
      $matchpassword=TRUE;
    }else {
      $sqlchangepw="update tbluser set userpassword='$newpassword' where id=$userid";
      $test=mysqli_query($conn,$sqlchangepw) or die(mysqli_error($conn));
      if($test){
        $changedpassword=TRUE;
      }
    }
    
  }
}
else{
  header('location:login.php');
}
?> 
  <!-- BANNER STRAT -->
  <div class="banner inner-banner align-center">
    <div class="container">
      <section class="banner-detail">
        <h1 class="banner-title"><?php echo $row['userfname'].' '.$row['userlname']; ?></h1>
        <div class="bread-crumb right-side">
          <ul>
            <li><a href="index.php">Home</a>/</li>
            <li><span><?php echo $row['userfname'].' '.$row['userlname']; ?></span></li>
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
        <div class="col-md-3 col-sm-4">
          <div class="account-sidebar account-tab mb-xs-30">
            <div class="dark-bg tab-title-bg">
              <div class="">
                <div class="sub-title"><span></span> My Account</div>
              </div>
            </div>
            <div class="account-tab-inner">
              <ul class="account-tab-stap">
                <li id="step1" class="active"> <a href="javascript:void(0)">My Dashboard<i class="fa fa-angle-right"></i> </a> </li>
                <li id="step2"> <a href="javascript:void(0)">Account Details<i class="fa fa-angle-right"></i> </a> </li>
                <li id="step3"> <a href="javascript:void(0)">My Order List<i class="fa fa-angle-right"></i> </a> </li>
                <li id="step4"> <a href="javascript:void(0)">Change Password<i class="fa fa-angle-right"></i> </a> </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-md-9 col-sm-8">
          <div id="data-step1" class="account-content" data-temp="tabdata">
            <div class="row">
              <div class="col-xs-12">
                <?php
                  if(isset($profileupdate)){
                    echo '
                <div class="alert alert-success alert-dismissable">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>Updated!</strong> Your Account Information is Successfully Updated.
                </div>';
                  }
                  if(isset($wrongpassword)){
                  echo '
                <div class="alert alert-danger alert-dismissable">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>Failed!</strong> Entered Password is Wrong.
                </div>';
                  }elseif(isset($matchpassword)){
                    echo '
                <div class="alert alert-danger alert-dismissable">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>Failed!</strong> Entered Password Did Not Match.
                </div>';
                  }elseif(isset($changedpassword)){
                    echo '
                <div class="alert alert-success alert-dismissable">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>Changed!</strong> Your password is changed.
                </div>';
                  }
                ?>
                <div class="heading-part heading-bg mb-30">
                  <h2 class="heading m-0">Account Dashboard</h2>
                </div>
              </div>
            </div>
            <div class="mb-30">
              <div class="row">
                <div class="col-xs-12">
                  <div class="heading-part">
                    <h3 class="sub-heading">Hello, <?php echo $row['userfname']; ?></h3>
                  </div>
                  <p>Subscribe to the Print Doodles mailing list to receive updates on new product, special offers and other discount information.<a class="account-link" id="subscribelink" href="#">Click Here</a></p>
                </div>
              </div>
            </div>
            <div class="m-0">
              <div class="row">
                <div class="col-xs-12 mb-20">
                  <div class="heading-part">
                    <h3 class="sub-heading">Account Information</h3>
                  </div>
                  <hr>
                </div>
                <div class="col-sm-12">
                  <div class="cart-total-table address-box commun-table">
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
          <div id="data-step2" class="account-content" data-temp="tabdata" style="display:none">
            <div class="row">
              <div class="col-xs-12">
                <div class="heading-part heading-bg mb-30">
                  <h2 class="heading m-0">Account Details</h2>
                </div>
              </div>
            </div>
            <div class="m-0">
              <form class="main-form full" action="#" method="post">
                <div class="mb-20">
                  <div class="row">
                    <div class="col-xs-12 mb-20">
                      <div class="heading-part">
                        <h3 class="sub-heading">Shipping Address</h3>
                      </div>
                      <hr>
                    </div>
                    <div class="col-sm-6">
                      <div class="input-box">
                        <input type="text" required name="fname" placeholder="First Name" value="<?php echo $row['userfname']; ?>">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="input-box">
                        <input type="text" name="lname" required placeholder="Last Name" value="<?php echo $row['userlname']; ?>">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="input-box">
                        <input type="email" name="email" required placeholder="Email Address" value="<?php echo $row['useremail']; ?>">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="input-box">
                        <input type="text" name="number" required placeholder="Contact Number" value="<?php echo $row['userphone']; ?>">
                      </div>
                    </div>
                    <div class="col-sm-12">
                      <div class="input-box">
                        <input type="text" required placeholder="Shipping Address" name="address" value="<?php echo $row['useraddress']; ?>">
                        <span>Please provide the number and street.</span> </div>
                    </div>
                    <div class="col-sm-12">
                      <div class="input-box">
                        <input type="text" name="landmark" required placeholder="Shipping Landmark" value="<?php echo $row['userlandmark']; ?>">
                        <span>Please include landmark (e.g : Opposite Bank) as the carrier service may find it easier to locate your address.</span> </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="input-box">
                        <input type="text" name="country" value="India" disabled>
                      </div>
                    </div>
                    <div class="col-sm-6" style="height: 65px">
                      <div class="input-box">
                        <select name="state" id="shippingstateid">
                          <?php 
                          if($row['userstate']!=""){
                          echo '<option value="'.$row['userstate'].'" selected>'.$row['userstate'].'</option>'; } ?>
                          <option value=" ">Select a State</option>
                          <option value="Andhra Pradesh">Andhra Pradesh</option>
                          <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                          <option value="Assam">Assam</option>
                          <option value="Bihar">Bihar</option>
                          <option value="Chhattisgarh">Chhattisgarh</option>
                          <option value="Goa">Goa</option>
                          <option value="Gujarat">Gujarat</option>
                          <option value="Haryana">Haryana</option>
                          <option value="Himachal Pradesh">Himachal Pradesh</option>
                          <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                          <option value="Jharkhand">Jharkhand</option>
                          <option value="Karnataka">Karnataka</option>
                          <option value="Kerala">Kerala</option>
                          <option value="Madhya Pradesh">Madhya Pradesh</option>
                          <option value="Maharashtra">Maharashtra</option>
                          <option value="Manipur">Manipur</option>
                          <option value="Meghalaya">Meghalaya</option>
                          <option value="Mizoram">Mizoram</option>
                          <option value="Nagaland">Nagaland</option>
                          <option value="Orissa">Orissa</option>
                          <option value="Punjab">Punjab</option>
                          <option value="Rajasthan">Rajasthan</option>
                          <option value="Sikkim">Sikkim</option>
                          <option value="Tamil Nadu">Tamil Nadu</option>
                          <option value="Telangana">Telangana</option>
                          <option value="Tripura">Tripura</option>
                          <option value="Uttarakhand">Uttarakhand</option>
                          <option value="Uttar Pradesh">Uttar Pradesh</option>
                          <option value="West Bengal">West Bengal</option>
                          <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                          <option value="Chandigarh">Chandigarh</option>
                          <option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
                          <option value="Daman and Diu">Daman and Diu</option>
                          <option value="Delhi">Delhi</option>
                          <option value="Lakshadeep">Lakshadeep</option>
                          <option value="Pondicherry (Puducherry)">Pondicherry (Puducherry)</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="input-box">
                        <input type="text" required name="city" placeholder="Enter City" value="<?php echo $row['usercity']; ?>">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="input-box">
                        <input type="text" required name="pincode" placeholder="Postcode/zip" value="<?php echo $row['userpincode']; ?>">
                      </div>
                    </div>
                    <div class="col-xs-12">
                      <button class="btn-color" type="submit" name="submit">Submit</button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <div id="data-step3" class="account-content" data-temp="tabdata" style="display:none">
            <div class="row">
              <div class="col-xs-12">
                <div class="heading-part heading-bg mb-30">
                  <h2 class="heading m-0">My Orders</h2>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-12 mb-xs-30">
                <div class="cart-item-table commun-table">
                  <div class="table-responsive">
                    <?php
                    $sqlorder="select * from tblorder where uid=$userid group by ordernumber";
                    $resultorder=mysqli_query($conn,$sqlorder) or die(myqli_error($conn));
                    while($roworder=mysqli_fetch_assoc($resultorder)){
                      $sqlsuborder="select * from tblorder where ordernumber='".$roworder['ordernumber']."'";
                      $resultsuborder=mysqli_query($conn,$sqlsuborder) or die(mysqli_error($conn));
                      $total=0;
                      while($rowsuborder=mysqli_fetch_assoc($resultsuborder)){
                        $total=$total+$rowsuborder['price'];
                      }
                      echo '
                    <table class="table">
                      <thead>
                        <tr>
                          <th colspan="4"> <ul>
                              <li><span>Order placed</span> <span>';
                              echo date('d M Y',strtotime($roworder['orderdate']));
                              echo '</span></li>
                              <li class="price-box"><span>Total</span> <span class="price fa fa-rupee">'.$total.'.00</span></li>
                              <li><span>Order No.</span> <span>#'.$roworder['ordernumber'].'</span></li>
                            </ul>
                          </th>
                        </tr>
                      </thead>
                      <tbody>';
                      $sqlsuborder="select * from tblorder where ordernumber='".$roworder['ordernumber']."'";
                      $resultsuborder=mysqli_query($conn,$sqlsuborder) or die(mysqli_error($conn));
                      while($rowsuborder=mysqli_fetch_assoc($resultsuborder)){
                        $sqlproduct="select * from tblproduct where id=".$rowsuborder['pid'];
                        $resultproduct=mysqli_query($conn,$sqlproduct) or die(mysqli_error($conn));
                        $rowproduct=mysqli_fetch_assoc($resultproduct);
                        echo '
                        <tr>
                          <td>
                            <a href="product-page.php?product='.$rowproduct['id'].'">
                            <div class="product-image product-image-small"><img alt="'.$rowproduct['producttitle'].'" src="images/products/'.$rowproduct['productprimaryimage'].'">
                            </div>
                            </a>
                          </td>
                          <td><div class="product-title"> <a href="product-page.php?product='.$rowproduct['id'].'">'.$rowproduct['producttitle'].'</a> </div>
                            <div class="product-info-stock-sku m-0">';
                              if($rowsuborder['size']=="No Size"){}
                                else {
                                  echo '
                                <div>
                                  <label>Size:  </label>
                                  <span class="info-deta">'.$rowsuborder['size'].' </span> 
                                </div>';
                                }
                                echo '
                                <div>
                                  <label>Quantity:  </label>
                                  <span class="info-deta">'.$rowsuborder['qty'].' </span> 
                                </div>
                              </div>
                            </div>
                          </td>
                          <td><div class="price-box"> <span class="price fa fa-rupee">'.$rowproduct['productofferprice'].'</span> </div>
                          </td>
                          <td><i title="Remove Item From Cart" data-value="'.$rowsuborder['id'].'" class="fa fa-trash cart-remove-item" id="deleteorder"></i>
                          </td>
                        </tr>
                        ';
                      }
                       echo ' 
                      </tbody>
                    </table>
                      ';
                    }
                    ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div id="data-step4" class="account-content" data-temp="tabdata" style="display:none">
            <div class="row">
              <div class="col-xs-12">
                <div class="heading-part heading-bg mb-30">
                  <h2 class="heading m-0">Change Password</h2>
                </div>
              </div>
            </div>
            <form class="main-form full" action="#" method="post">
              <div class="row">
                <div class="col-xs-12">
                  <div class="input-box">
                    <label for="old-pass">Old-Password</label>
                    <input type="password" name="oldpassword" placeholder="Old Password" required id="old-pass">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="input-box">
                    <label for="login-pass">Password</label>
                    <input type="password" name="password" placeholder="Enter your Password" required id="cpassword">
                <p id="matchpassword" class="text-danger"></p>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="input-box">
                    <label for="re-enter-pass">Re-enter Password</label>
                    <input type="password" name="cpassword" placeholder="Re-enter your Password" required id="rpassword" onblur="matchpassword();">
                  </div>
                </div>
                <div class="col-xs-12">
                  <button class="btn-color" type="submit" name="changepassword">Change Password</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- CONTAINER END --> 
  
<?php include_once('footer.php'); ?> 
<script type="text/javascript">
  $(document).ready(function(){
    $("#deleteorder").click(function(){
      var deleteorderid=$(this).data('value');
      console.log(deleteorderid);
      $.ajax({
            url: "ajax.php",
            type: "POST",
            data: "deleteorderid="+deleteorderid,
            success: function (response) {
                location.reload();
            },
        });
    });
  });

</script>
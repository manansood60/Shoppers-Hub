<?php 
ob_start();
session_start();
$page="Checkout";
include_once('admin/pages/db_connect.php');
include_once('header.php');
if(isset($_SESSION['user'])){
  // To  update User Account Information
  $userid=$_SESSION['user'];
  $sql="select * from tbluser where id=$userid";
  $result=mysqli_query($conn,$sql) or die(mysqli_error($conn));  
  $row=mysqli_fetch_assoc($result);
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
    header("location:order-overview.php");
  }
}
}
else{
  header('login.php');
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
              <li class="active"> <a href="checkout-2.php">
                <div class="step">
                  <div class="line"></div>
                  <div class="circle">1</div>
                </div>
                <span>Shipping</span> </a> </li>
              <li> <a href="order-overview.php">
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
          <div class="checkout-content" >
            <div class="row">
              <div class="col-xs-12">
                <div class="heading-part align-center">
                  <h2 class="heading">Please fill up your Shipping details</h2>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6 col-md-8 col-sm-8 col-lg-offset-3 col-sm-offset-2">
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
                    <div class="col-xs-12 ">
                      <button class="btn-color right-side" type="submit" name="submit">Next</button>
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
  <!-- CONTAINER END --> 
  
<?php include_once('footer.php'); ?> 

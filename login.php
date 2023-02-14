<?php
$page="Login";
include_once('admin/pages/db_connect.php');
if(isset($_POST['submit'])){
  session_start();
  $enteredemail=$_POST['lemail'];
  $enteredpassword=$_POST['lpassword'];
  $sql="select * from tbluser where useremail='$enteredemail'";
  $result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
  $row=mysqli_fetch_assoc($result);
  if(!(empty($row))){
    // Entered Email does not exist in database
    if($row['userpassword']==$enteredpassword){
      $_SESSION['user']=$row['id'];
      if(isset($_REQUEST['product'])){
        $product=$_REQUEST['product'];
        header('location:product-page.php?product='.$product);
      }else{
      header('location:index.php');
    }}
    else {
      echo '<script> alert("User Does not Exist."); </script>';
    }
  }
  else {
    // We have found the User
    echo '<script> alert("User Does not Exist."); </script>';
  } 
}
include_once('header.php');
?> 
  <!-- BANNER STRAT -->
  <div class="banner inner-banner align-center">
    <div class="container">
      <section class="banner-detail">
        <h1 class="banner-title">Login</h1>
        <div class="bread-crumb right-side">
          <ul>
            <li><a href="index.php">Home</a>/</li>
            <li><span>Login</span></li>
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
          <div class="row">
            <div class="col-lg-6 col-md-8 col-sm-8 col-lg-offset-3 col-sm-offset-2">
              <form class="main-form full" action="#" method="post">
                <div class="row">
                  <div class="col-xs-12 mb-20">
                    <div class="heading-part heading-bg">
                      <h2 class="heading">Customer Login</h2>
                    </div>
                  </div>
                  <div class="col-xs-12">
                    <div class="input-box">
                      <label for="login-email">Email address</label>
                      <input id="login-email" name="lemail" type="email" required placeholder="Email Address">
                    </div>
                  </div>
                  <div class="col-xs-12">
                    <div class="input-box">
                      <label for="login-pass">Password</label>
                      <input id="login-pass" name="lpassword" type="password" required placeholder="Enter your Password">
                    </div>
                  </div>
                  <div class="col-xs-12">
                    <div class="check-box left-side"> <span>
                      <input type="checkbox" name="remember_me" id="remember_me" class="checkbox">
                      </span>
                      <label for="remember_me">Remember Me</label>
                    </div>
                    <button name="submit" type="submit" class="btn-color right-side">Log In</button>
                  </div>
                  <div class="col-xs-12"> <a title="Forgot Password" class="forgot-password mtb-20" href="forgot.php">Forgot your password?</a>
                    <hr>
                  </div>
                  <div class="col-xs-12">
                    <div class="new-account align-center mt-20"> <span>New to SuperStore?</span> <a class="link" title="Register with SuperStore" href="register.php">Create New Account</a> </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- CONTAINER END --> 
  
<?php include_once('footer.php'); ?>
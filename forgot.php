<?php
$page="Forgot";
include_once('admin/pages/db_connect.php');
if(isset($_POST['submit'])){
  session_start();
  $enteredemail=$_POST['lemail'];
  $sql="select * from tbluser where useremail='$enteredemail'";
  $result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
  $row=mysqli_fetch_assoc($result);
  if(!(empty($row))){

    // Entered Email does not exist in database
    // To Send Message To Email
      /*
        $to = $enteredemail;
        $subject = "Password by ShoppersHub";

        $message = "Your Password is ".$row['userpassword'];

          // Always set content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        // More headers
        $headers .= 'From: <'.$email.'>' . "\r\n";
        mail($to,$subject,$message,$headers); or die();
        echo "Message  Sent";
        */
    }else {
      echo '<script> alert("User Does not Exist."); </script>';
    } 
}
include_once('header.php');
?> 
  <!-- BANNER STRAT -->
  <div class="banner inner-banner align-center">
    <div class="container">
      <section class="banner-detail">
        <h1 class="banner-title">Forgot Password</h1>
        <div class="bread-crumb right-side">
          <ul>
            <li><a href="index.php">Home</a>/</li>
            <li><span>Forgot Password</span></li>
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
                      <h2 class="heading">Forgot Password</h2>
                    </div>
                  </div>
                  <div class="col-xs-12">
                    <div class="input-box">
                      <label for="login-email">Email address</label>
                      <input id="login-email" name="lemail" type="email" required placeholder="Email Address">
                    </div>
                  </div>
                  <div class="col-xs-12">
                    
                    <button name="submit" type="submit" class="btn-color right-side">Send Password</button>
                  </div>
                  <div class="col-xs-12"> <a title="Login" class="forgot-password mtb-20" href="login.php">Back To Login page.</a>
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
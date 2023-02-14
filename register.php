<?php 
$page="Register";
include_once('admin/pages/db_connect.php'); 
if(isset($_POST['submit'])){
  $fname=$_POST['fname'];
  $lname=$_POST['lname'];
  $email=$_POST['email'];
  $number=$_POST['number'];
  $password=$_POST['password'];
  $rpassword=$_POST['rpassword'];
  $gender=$_POST['gender'];  
  if(!($password==$rpassword)){
    echo "<script>alert('Entered Passwords Did not Match.');</script>";
  }else {
    $sqlinsert="insert into tbluser(userfname,userlname,useremail,userpassword,usergender,usercreatedate,userphone) values ('$fname','$lname','$email','$password','$gender',curdate(),'$number')";
    $test=mysqli_query($conn,$sqlinsert) or die(mysqli_error($conn));
    if($test){
      echo "<script>alert('Account is Registered. Login to start Your session.');</script>"; 
      header('location:login.php');
  } 
 } 
}
include_once('header.php');
?>  
  <!-- BANNER STRAT -->
  <div class="banner inner-banner align-center">
    <div class="container">
      <section class="banner-detail">
        <h1 class="banner-title">Register</h1>
        <div class="bread-crumb right-side">
          <ul>
            <li><a href="index.php">Home</a>/</li>
            <li><span>Register</span></li>
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
                      <h2 class="heading">Create your account</h2>
                    </div>
                  </div>
                  <div class="col-xs-12">
                    <div class="input-box">
                      <label for="f-name">First Name</label>
                      <input type="text" id="f-name" name="fname" required placeholder="First Name">
                    </div>
                  </div>
                  <div class="col-xs-12">
                    <div class="input-box">
                      <label for="l-name">Last Name</label>
                      <input type="text" id="l-name" name="lname" required placeholder="Last Name">
                    </div>
                  </div>
                  <div class="col-xs-12">
                    <div class="input-box">
                      <label for="login-email">Email address</label>
                      <input id="login-email" name="email" type="email" required placeholder="Email Address">
                    </div>
                  </div>
                  <div class="col-xs-12">
                    <div class="input-box">
                      <label for="login-pass">Password</label>
                      <input id="cpassword" name="password" type="password" required placeholder="Enter your Password">
                    </div>
                  </div>
                  <div class="col-xs-12">
                    <div class="input-box">
                      <label for="re-enter-pass">Re-enter Password</label>
                      <input id="rpassword" name="rpassword" type="password" required placeholder="Re-enter your Password" onblur="matchpassword();">
                      <p id="matchpassword" class="text-danger"></p>

                    </div>
                  </div>
                  <div class="col-xs-12">
                    <div class="input-box">
                      <label for="Phone-number">Phone</label>
                      <input id="enter-phone" type="text" required placeholder="Enter Mobile Number" name="number">
                    </div>
                  </div>
                  <div class="col-xs-12">
                    <div class="form-group">
                      <div class="input-box">
                        <label for="Gender">Gender</label>
                        <div class="radio">
                          <label>
                          <input type="radio" value="Male"  name="gender" required > Male 
                          </label>
                          <label>
                          <input type="radio" value="Female" name="gender" required >  
                          Female
                          </label>   
                        </div>
                      </div>
                    </div>

                  </div>
                  <div class="col-xs-12">
                    <div class="check-box left-side mb-20"> <span>
                      <input type="checkbox" name="terms" id="terms" class="checkbox" required>
                      </span>
                      <label for="terms">I agree to terms of Service.</label>
                    </div>
                    <button name="submit" type="submit" class="btn-color right-side">Submit</button>
                  </div>
                  <div class="col-xs-12">
                    <hr>
                    <div class="new-account align-center mt-20"> <span>Already have an account with us</span> <a class="link" title="Register with SuperStore" href="login.php">Login Here</a> </div>
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
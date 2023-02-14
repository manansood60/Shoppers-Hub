<?php 
ob_start();
session_start();
$page="About";
include_once('admin/pages/db_connect.php');
include_once('header.php');
$sqlabout="select * from tblpages where id=2";
$resultabout=mysqli_query($conn,$sqlabout) or die(mysqli_error($conn));
$rowabout=mysqli_fetch_assoc($resultabout);
?> 
  <!-- BANNER STRAT -->
  <div class="banner inner-banner align-center">
    <div class="container">
      <section class="banner-detail">
        <h1 class="banner-title">About Us</h1>
        <div class="bread-crumb right-side">
          <ul>
            <li><a href="index.php">Home</a>/</li>
            <li><span>About us</span></li>
          </ul>
        </div>
      </section>
    </div>
  </div>
  <!-- BANNER END --> 
  
  <!-- CONTAIN START ptb-50-->
  <section class="ptb-50">
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <div class="image-part"> <img alt="SuperStore" src="images/about-1.jpg"> </div>
        </div>
      </div>
      <div class="about-detail mt-40">
        <div class="row">
          <div class="col-sm-6 mb-xs-30">
            <div class="about-title">One of the India's Best Shopping Website. </div>
          </div>
          <div class="col-sm-6">
            <?php  echo $rowabout['pdescription'];?>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="ptb-50 client-main align-center gray-bg">
    <div class="container">
      <div class="client-inner">
        <div class="heading-part mb-40">
          <h2 class="main_title">What Our Clients Say</h2>
        </div>
        <div id="client" class="owl-carousel">
          <?php 
          $sqltestimonial="select * from tbltestimonial order by id desc limit 3";
          $resulttestimonial=mysqli_query($conn,$sqltestimonial) or die(mysqli_erro($conn));
          while($rowtestimonial=mysqli_fetch_assoc($resulttestimonial)){
            echo '
            <div class="item client-detail">
                    <div class="client-img"> <img src="images/testimonials/'.$rowtestimonial['image'].'" alt="'.$rowtestimonial['name'].'" height="150px"> </div>
                    <h4 class="sub-title client-title">'.$rowtestimonial['name'].'</h4>
                    <div class="rating-summary-block big">
                      <div class="rating-result" title="60%"> <span style="width:60%"></span> </div>
                    </div>
                    <p>"'.$rowtestimonial['review'].'"</p>
                  </div>
                    ';
          }
          ?>
        </div>
      </div>
    </div>
  </section>
  
  <!-- CONTAINER END --> 
  
<?php include_once('footer.php'); ?> 

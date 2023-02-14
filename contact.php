<?php 
ob_start();
session_start();
$page="Contact";
include_once('admin/pages/db_connect.php');
include_once('header.php');
$sqlcontact="select * from tblcontact";
$resultcontact=mysqli_query($conn,$sqlcontact) or die(mysqli_erro($conn));
$rowcontact=mysqli_fetch_assoc($resultcontact);
// To Handle An Enquiry
if(isset($_REQUEST['submit'])){
  $name=$_POST['name'];
  $email=$_POST['email'];
  $phone=$_POST['phone'];
  $enquirymessage=$_POST['message'];
  $ip=$_SERVER['REMOTE_ADDR'];
  $sqlinsert="insert into tblcontactenquiry values('','$name','$email','$enquirymessage','$phone',curdate(),'$ip')";
  $test=mysqli_query($conn,$sqlinsert) or die(mysqli_error($conn));
  $submessage="Message is Sent.";
// To Send Message To Email
  /*
    $to = "manansood60@gmail.com";
    $subject = $name." by ShoppersHub";

    $message = $enquirymessage;

      // Always set content-type when sending HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

    // More headers
    $headers .= 'From: <'.$email.'>' . "\r\n";
    mail($to,$subject,$message,$headers); or die();
    echo "Message  Sent";
    */
}
?>   
  <!-- BANNER STRAT -->
  <div class="banner inner-banner align-center">
    <div class="container">
      <section class="banner-detail">
        <h1 class="banner-title">Contact Us</h1>
        <div class="bread-crumb right-side">
          <ul>
            <li><a href="index.php">Home</a>/</li>
            <li><span>Contact</span></li>
          </ul>
        </div>
      </section>
    </div>
  </div>
  <!-- BANNER END --> 
  <!-- CONTAIN START ptb-50-->
  <section class="pt-50">
    <div class="container">
      <?php if(isset($submessage)){ echo '
                <div class="alert alert-success alert-dismissable">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong></strong> '.$submessage.' 
                </div>';} 
?>
      <div class="row">
        <div class="col-xs-12">
          <div class="map">
            <div class="map-part">
              <div id="map" class="map-inner-part"></div>
              <!--<style>#gmap_canvas img{max-width:none!important;background:none!important}</style><a class="google-map-code" href="http://www.themecircle.net" id="get-map-data">themecircle</a>--></div>
            <script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyC_G1wZMKrwyHHOteMdVwCy82Qm4Pp7vyI&amp;callback=initMap"></script> 
            <script type="text/javascript">
                // When the window has finished loading create our google map below
                google.maps.event.addDomListener(window, 'load', init);
            
                function init() {
                  // Basic options for a simple Google Map
                  // For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
                  
                  var mapOptions = {
                      // How zoomed in you want the map to start at (always required)
                      zoom: 15,
                      scrollwheel:false,

                      // The latitude and longitude to center the map (always required)
                      center: new google.maps.LatLng(30.8902585, 75.8531846), // New York
                      
                      // How you would like to style the map. 
                      // This is where you would paste any style found on Snazzy Maps.
                      styles: [{"featureType":"all","elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#666666"},{"lightness":40}]},{"featureType":"all","elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#000000"},{"lightness":16}]},{"featureType":"all","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#000000"},{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#000000"},{"lightness":17},{"weight":1.2}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":20}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":21}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#000000"},{"lightness":17}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#666666"},{"lightness":100},{"weight":0.2}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":18}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":16}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":19}]},{"featureType":"water","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":17}]}]
                  };

                  // Get the HTML DOM element that will contain your map 
                  // We are using a div with id="map" seen below in the <body>
                  var mapElement = document.getElementById('map');

                  // Create the Google Map using our element and options defined above
                  var map = new google.maps.Map(mapElement, mapOptions);

                  // Let's also add a marker while we're at it
                
                  var marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(30.8902585, 75.8531846)});infowindow = new google.maps.InfoWindow({content:"<b>ShoppersHub</b><br/>#2497/11 ,Street no. 1<br/>Vishkarma Town,<br/> Ludhiana" });google.maps.event.addListener(marker, "click", function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);
              </script> 
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="


pt-50 client-main align-center">
    <div class="container">
      <div class="contact-info">
        <div class="row m-0">
          <div class="col-sm-4 p-0">
            <div class="contact-box">
              <div class="contact-icon contact-phone-icon"></div>
              <span><b>Tel</b></span>
              <p><?php echo $rowcontact['cnumber']; ?></p>
            </div>
          </div>
          <div class="col-sm-4 p-0">
            <div class="contact-box">
              <div class="contact-icon contact-mail-icon"></div>
              <span><b>Mail</b></span>
              <p><?php echo $rowcontact['cemail']; ?></p>
            </div>
          </div>
          <div class="col-sm-4 p-0">
            <div class="contact-box">
              <div class="contact-icon contact-open-icon"></div>
              <span><b>Address</b></span>
              <p><?php echo $rowcontact['caddress']; ?></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="ptb-50">
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <div class="heading-part mb-20">
            <h2 class="main_title">Leave a message!</h2>
          </div>
        </div>
      </div>
      <div class="main-form">
        <div class="row">
          <form action="#" method="POST" name="contactform">
            <div class="col-sm-4 mb-30">
              <input type="text" required placeholder="Name" name="name">
            </div>
            <div class="col-sm-4 mb-30">
              <input type="email" required placeholder="Email" name="email">
            </div>
            <div class="col-sm-4 mb-30">
              <input type="text" required placeholder="Phone" name="phone">
            </div>
            <div class="col-xs-12 mb-30">
              <textarea required placeholder="Message" rows="3" cols="30" name="message"></textarea>
            </div>
            <div class="col-xs-12">
              <div class="align-center">
                <button type="submit" name="submit" class="btn-color">Submit</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
  <!-- CONTAINER END --> 
  
<?php include_once('footer.php'); ?> 

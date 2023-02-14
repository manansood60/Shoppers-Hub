  <!-- FOOTER START -->
  <div class="footer dark-bg">
    <div class="container">
      <div class="footer-inner">
        <div class="footer-middle">
          <div class="row">
            <div class="col-md-4 f-col">
             <div class="footer-static-block"> <span class="opener plus"></span>
                <div class="f-logo"> <a href="index.php" class=""> <img src="images/footer-logo2.png" alt="SuperStore"> </a>
                </div>
                <div class="footer-block-contant" >
                  <div style="max-height:100px; overflow: hidden;">
                   <?php 
                    $sqlabout="select * from tblpages where id=2";
                    $resultabout=mysqli_query($conn,$sqlabout) or die(mysqli_error($conn));
                    $rowabout=mysqli_fetch_assoc($resultabout);
                    echo $rowabout['pdescription'];
                   ?>
                  </div>
                  <a href="about.php"><button class="btn-color right-side"> ....Read More </button></a>
                </div>
              </div>
            </div>
            <div class="col-md-8">
            <div class="row">
              <div class="col-md-4 f-col">
               <div class="footer-static-block"> <span class="opener plus"></span>
                <h3 class="title">Information</h3>
                <ul class="footer-block-contant link">
                  <li><a href="about.php">About</a></li>
                  <li><a href="contact.php">Contact Us</a></li>
                  <li><a>Trending</a></li>
                  <li><a>Affiliates</a></li>
                  <li><a>Career</a></li>
                  <li><a>FAQ?</a></li>
                </ul>
              </div>
              </div>
              <div class="col-md-4 f-col">
                <div class="footer-static-block"> <span class="opener plus"></span>
                  <h3 class="title">Customer care</h3>
                  <ul class="footer-block-contant link">
                    <li><a href="account.php">My Account</a></li>
                    <li><a href="account.php">Order Tracking</a></li>
                    <li><a href="cart.php">Wishlist</a></li>
                    <li><a>Support</a></li>
                    <li><a>Customer Services</a></li>
                    <li><a>Exchange</a></li>
                  </ul>
                </div>
              </div>
              <div class="col-md-4 f-col">
               <div class="footer-static-block"> <span class="opener plus"></span>
                  <h3 class="title">Address</h3>
                  <?php
                  $sqlcontact="select * from tblcontact";
                  $resultcontact=mysqli_query($conn,$sqlcontact) or die(mysqli_error($conn));
                  $rowcontact=mysqli_fetch_assoc($resultcontact);
                  echo '
                  <ul class="footer-block-contant address-footer">
                    <li class="item"> <i class="fa fa-home"> </i>
                      <p>'.$rowcontact['caddress'].'</p>
                    </li>
                    <li class="item"> <i class="fa fa-envelope"> </i>
                      <p> <a>'.$rowcontact['cemail'].'</a> </p>
                    </li>
                    <li class="item"> <i class="fa fa-phone"> </i>
                      <a href="tel:+917355588893">'.$rowcontact['cnumber'].'</a>
                    </li>';
                    ?>
                  </ul>
                </div>
              </div>
            </div>
            </div>
          </div>
        </div>
        <div class="footer-bottom">
          <div class="row">
            <div class="col-sm-4 p-0">
              <div class="footer_social pt-xs-15 center-xs mt-xs-15">
                <ul class="social-icon">
                  <li><a title="Facebook" class="facebook"><i class="fa fa-facebook"> </i></a></li>
                  <li><a title="Twitter" class="twitter"><i class="fa fa-twitter"> </i></a></li>
                  <li><a title="Linkedin" class="linkedin"><i class="fa fa-linkedin"> </i></a></li>
                  <li><a title="RSS" class="rss"><i class="fa fa-rss"> </i></a></li>
                  <li><a title="Pinterest" class="pinterest"><i class="fa fa-pinterest"> </i></a></li>
                </ul>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="copy-right center-sm">© 2018  All Rights Reserved. Developed By <a href="#">Manan Kumar</a></div>
            </div>
            <div class="col-sm-4 p-0">
              <div class="payment float-none-xs center-sm">
                <ul class="payment_icon">
                  <li class="discover"><a></a></li>
                  <li class="visa"><a></a></li>
                  <li class="mastro"><a></a></li>
                  <li class="paypal"><a></a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="scroll-top">
    <div id="scrollup"></div>
  </div>
  <!-- FOOTER END --> 
</div>
<script src="js/jquery-1.12.3.min.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script src="js/jquery-ui.min.js"></script> 
<script src="js/fotorama.js"></script>
<script src="js/jquery.magnific-popup.js"></script>  
<script src="js/owl.carousel.min.js"></script> 
<script src="js/custom.js"></script>
<script type="text/javascript">
  //ajax function to load the sub category combo box on category combo box selection
      $(document).ready(function(){
    $('#delete-small-cart1').click(function(){
      var product=$(this).data('value');
      $.ajax({
            url: "ajax.php",
            type: "POST",
            data: "cartid="+product,
            success: function (response) {
                console.log(response);
                $("#custom-cart-dropdown").html(response);
            },
        });
    });
    $('#delete-small-cart2').click(function(){
      var product=$(this).data('value');
      $.ajax({
            url: "ajax.php",
            type: "POST",
            data: "cartid="+product,
            success: function (response) {
                console.log(response);
                $("#custom-cart-dropdown").html(response);
            },
        });
    });

  });
  // Function to Confirm Password
  function matchpassword(){
    var password1=document.getElementById('cpassword').value;
    var password2=document.getElementById('rpassword').value;
    if(!(password1==password2)){
      document.getElementById('matchpassword').innerHTML="Entered Password Did not Match.";
    }
    else {
      document.getElementById('matchpassword').innerHTML="";
    }
  }
</script>

</body>
</html>

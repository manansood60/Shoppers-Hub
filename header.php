<!DOCTYPE html>
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="en">
<!--<![endif]-->
<head>
<!-- Basic Page Needs
  ================================================== -->
<meta charset="utf-8">
<title><?php echo $page; ?></title>
<!-- SEO Meta
  ================================================== -->
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="description" content="">
<meta name="keywords" content="">
<meta name="distribution" content="global">
<meta name="revisit-after" content="2 Days">
<meta name="robots" content="ALL">
<meta name="rating" content="8 YEARS">
<meta name="Language" content="en-us">
<meta name="GOOGLEBOT" content="NOARCHIVE">
<!-- Mobile Specific Metas
  ================================================== -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<!-- CSS
  ================================================== -->
<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css"/>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
<link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="css/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="css/fotorama.css">
<link rel="stylesheet" type="text/css" href="css/magnific-popup.css">
<link rel="stylesheet" type="text/css" href="css/custom.css">
<link rel="stylesheet" type="text/css" href="css/responsive.css">
<link rel="shortcut icon" href="images/favicon.png">
<link rel="apple-touch-icon" href="images/apple-touch-icon.html">
<link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.html">
<link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.html">
</head>
<body>
<div class="se-pre-con"></div>
<div class="main"> 
  <!-- HEADER START -->
  <header class="navbar navbar-custom" id="header">
    <div class="header-top">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-sm-5 col-xs-7">
            <div class="top-link top-link-left">
              <ul>
                <li class="language-icon">
                  <select>
                    <option selected="selected" value="">English</option>
                    <option value="">French</option>
                    <option value="">German</option>
                  </select>
                </li>
                <li class="sitemap-icon">
                  <select>
                    <option selected="selected" value="">USD</option>
                    <option value="">AUD</option>
                    <option value="">EUR</option>
                  </select>
                </li>  
              </ul>
            </div>
          </div>
          <div class="col-md-6 col-sm-7 col-xs-5">
            <div class="top-link right-side">
              <ul>
                <?php 
                if(isset($_SESSION['user'])) {
                $sql="select * from tbluser where id='".$_SESSION['user']."'";
                $result=mysqli_query($conn,$sql) or die(mysqli_error($conn));  
                $row=mysqli_fetch_assoc($result);
                  echo '
                <li>
                  <div class="btn-group">
                    <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fa fa-user-secret" aria-hidden="true"></i>
                      <span class="hidden-xs">'.$row['userfname'].' '.$row['userlname'].'</span>
                    </button>
                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="account.php">My Account</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="logout.php">Sign Out</a>
                    </div>
                  </div>
                </li>'; }
                else {
                  echo '<li>
                  <a href="login.php" title="Login">
                    <span class="fa fa-user hidden-sm hidden-lg" aria-hidden="true"></span>
                    <span class="hidden-xs"><span class="fa fa-user"> Login</span></span>
                  </a>
                </li>
                <li>
                  <a href="register.php" title="Register">
                    <span class="fa fa-user-plus hidden-sm hidden-lg" aria-hidden="true"></span>  
                    <span class="hidden-xs"><span class="fa fa-user-plus"> Register</span></span>
                  </a>
                </li>';
                }
                ?>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="header-middle">
      <div class="container">
      <hr>
      <div class="header-inner">
        <div class="row">
          <div class="col-md-7 col-sm-6 col-xs-6">
            <div class="navbar-header">
            <a class="navbar-brand page-scroll" href="index.php"> <img alt="SuperStore" src="images/logo1.png"> </a>
           </div>
          </div>
          <div class="col-md-5 col-sm-6 col-xs-6">
            <div class="right-side">
              <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button"><i class="fa fa-bars"></i></button> 
              <div class="right-side float-left-xs header-right-link">
                <div class="main-search">
                  <div class="header_search_toggle desktop-view">
                    <form action="search.php" method="post">
                      <div class="search-box">
                        <input class="input-text" type="text" name="search" placeholder="Search entire store here...">
                        <button class="search-btn" type="submit"></button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="header_search_toggle mobile-view">
              <form>
                <div class="search-box">
                  <input class="input-text" type="text" placeholder="Search entire store here...">
                  <button class="search-btn"></button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
    <div class="container">
       <div class="header-bottom">
        <div class="">
          <div id="menu" class="navbar-collapse collapse left-side p-0">
            <ul class="nav navbar-nav navbar-left">
              <li class="level"><a href="index.php"><i class="fa fa-home" > HOME</i></a></li>
              <li class="level">
                <span class="opener plus"></span>
                <a href="shop.php" class="page-scroll">Category</a>
                <div class="megamenu mobile-sub-menu">
                  <div class="megamenu-inner-top">
                    <ul class="sub-menu-level1">
                      <?php 
                      // Displaying Categories in Header
                        $sqlcategory="select * from tblcategory";
                        $resultcat=mysqli_query($conn,$sqlcategory) or die(mysqli_error($conn));
                        while($rowcategory=mysqli_fetch_assoc($resultcat))
                        {
                          // Displaying Category
                          echo '
                              <li class="level2">
                                <a href="#"><span>'.$rowcategory['catname'].'
                                </span></a>'; 
                          $sqlsubcategory="select * from tblsubcategory where catid=".$rowcategory['id'];
                          $resultsub=mysqli_query($conn,$sqlsubcategory) or die(mysqli_error($conn));                          
                          // Displaying Sub Category
                          echo '<ul class="sub-menu-level2">';
                          while($rowsubcategory=mysqli_fetch_assoc($resultsub))
                          {
                            $sqlproductcount="select count(*) from tblproduct where pscid=".$rowsubcategory['id'];
                            $resultproductcount=mysqli_query($conn,$sqlproductcount) or die(mysqli_error($conn));
                            $rowcount=mysqli_fetch_row($resultproductcount);
                            echo '<li class="level3"><a href="shop.php?category='.$rowsubcategory['id'].'">';
                            if($rowcount['0']==0){
                            echo '<span class="label label-warning">'.$rowcount['0'].'</span>';
                            }elseif($rowcount['0']<=5){
                            echo '<span class="label label-primary">'.$rowcount['0'].'</span>';
                            }elseif($rowcount['0']>5){
                            echo '<span class="label label-success">'.$rowcount['0'].'</span>';
                            }
                            echo $rowsubcategory['subcatname'].'</a></li>';
                          }
                          echo '</ul></li>';                        
                        }
                      ?>
                    </ul>
                  </div>
                </div>
              </li>
              <li class="level"><a href="todaysdeal.php" class="page-scroll">
                Today's Deals<div class="menu-label"><span class="hot-menu p-label"> Hot </span></div></a>
              </li>
              <li class="level"><a href="trending.php" class="page-scroll">
                  Trending <div class="menu-label"><span class="new-menu p-label"> New </span></div></a>
              </li>
              <li class="level"><a href="contact.php" class="page-scroll">
                Contact</a>
              </li>
              <li class="level"><a href="about.php" class="page-scroll">
                About Us</a>
              </li>
              <li class="level"><a href="account.php" class="page-scroll">
                My Account</a>
              </li>
            </ul>
            <div class="header_search_toggle mobile-view">
              <form>
                <div class="search-box">
                  <input class="input-text" type="text" placeholder="Search entire store here...">
                  <button class="search-btn"></button>
                </div>
              </form>
            </div>
          </div>
          <div class="right-side float-left-xs header-right-link">
            <ul>
              <li class="cart-icon" id="custom-cart-dropdown">
                
              <?php 
              if(isset($_SESSION['user'])){
                $userid=$_SESSION['user'];
                $sqlcartcount='select count(*) from tblcart where uid='.$userid;
                $resultcartcount=mysqli_query($conn,$sqlcartcount)or die(mysqil_error($conn)); 
                $rowcount=mysqli_fetch_row($resultcartcount); 
                $sqlcart="select * from tblcart where uid=$userid order by id desc limit 2";
                $resultcart=mysqli_query($conn,$sqlcart) or die(mysqli_error($conn));
              }
              echo '
                <a href="cart.php">
                  <span> <!-- <small class="cart-notification">2</small> --> </span>
                  <div class="cart-text hidden-sm hidden-xs">My Cart ';
                  if(isset($rowcount['0'])) { echo '('.$rowcount['0'].')'; }
                  echo ' </div>
                </a>';
                  if(isset($_SESSION['user'])){
                echo '<div class="cart-dropdown header-link-dropdown">
                  <ul class="cart-list link-dropdown-list">';
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
                  echo '  
                  </ul>
                  <div class="clearfix"></div>
                  <div class="mt-20"> <a href="cart.php" class="btn-color btn">Full Cart</a> <a href="checkout-2.php" class="btn-color btn right-side">Checkout</a> </div>
                </div> '; 
                  } 
                ?>
              </li>
            </ul>
          </div>
        </div>
         <div class="menu-shadow-btm"><img src="images/menu-shadow.png" alt="SuperStore"></div>
      </div>
    </div>
  </header>
  <!-- HEADER END -->

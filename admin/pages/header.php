  <?php
    session_start();
    if(!(isset($_SESSION['name']))){
      header('location:../login.php');
    }
    include_once('db_connect.php');
    $sql='select * from tbladmin';
    $result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
    $row=mysqli_fetch_assoc($result);
  ?>
<!DOCTYPE html>
<html>
<head>
  <title><?php echo $page; ?></title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet"  href="../font-awesome-4.7.0/css/font-awesome.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../plugins/datatables/dataTables.bootstrap.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="../plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <style type="text/css">
    .imagebox{
      width: 200px;
      height: 150px;
      float: left;
      margin-right: 67px;
      overflow: hidden;
      position: relative;
    }
    .imagebox img{
      width: 150px;
      height: 150px;
      z-index: 2;
    }
    .inputimage{
      z-index: 1;
      position:absolute;
    }
    .imagebox .close{
      position: absolute;
      color: black;
      z-index:3;
      top:2px;
      right: 2px;

    }
    .inputerror {
      color: red;
    }
  </style>
</head>
<body class="hold-transition skin-green sidebar-mini">
<div class="wrapper">

  <header class="main-header">

    <!-- Logo -->
    <a href="../index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>M</b>P</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>MY</b>Panel</span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
         <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="images/admin/<?php echo $row['aimage']; ?>" class="user-image" alt="<?php echo $row['aname']; ?>">
              <span class="hidden-xs"><?php echo $row['aname']; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="images/admin/<?php echo $row['aimage']; ?>" class="img-circle" alt="<?php echo $row['aname']; ?>">

                <p>
                  <?php echo $row['aname']; ?>
                  <small>Web Developer</small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="changepassword.php" class="btn btn-default btn-flat">Change Password
                  </a>
                </div>
                <div class="pull-right">
                  <a href="../logout.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>

    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="images/admin/<?php echo $row['aimage']; ?>" class="img-circle" alt="<?php echo $row['aname']; ?>">
        </div>
        <div class="pull-left info">
          <p><?php echo $row['aname']; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li class="treeview">
          <a href="../index.php">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
          
        </li>
        
        
        
        <li <?php if($active=="category"){echo 'class="active treeview"';}?>>
          <a href="#">
            <i class="fa fa-server" aria-hidden="true"></i></i><span>Category</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="addcategory.php"><i class="fa fa-plus" aria-hidden="true"></i>
              Add Category</a></li>
            <li><a href="viewcategory.php"><i class="fa fa-eye" aria-hidden="true"></i>
              View Category</a></li>
          </ul>
        </li>
      <li <?php if($active=="subcategory"){echo 'class="active treeview"';}?>>
          <a href="#">
            <i class="fa fa-align-left" aria-hidden="true"></i><span>Sub Category</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="addsubcategory.php"><i class="fa fa-plus" aria-hidden="true"></i>Add Sub Category</a></li>
            <li><a href="viewsubcategory.php"><i class="fa fa-eye" aria-hidden="true"></i> View Sub Category</a></li>
          </ul>
        </li>
      <li <?php if($active=="products"){echo 'class="active treeview"';}?>>
          <a href="#">
            <i class="fa fa-cubes" aria-hidden="true"></i><span>Products</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="addproducts.php"><i class="fa fa-plus" aria-hidden="true"></i>Add Products</a></li>
            <li><a href="viewproducts.php"><i class="fa fa-eye" aria-hidden="true"></i> View Products</a></li>
          </ul>
        </li>
      <li <?php if($active=="events"){echo 'class="active treeview"';}?>>
          <a href="#">
            <i class="fa fa-calendar" aria-hidden="true"></i><span>Events</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="addevent.php"><i class="fa fa-plus" aria-hidden="true"></i>Add Event</a></li>
            <li><a href="viewevent.php"><i class="fa fa-eye" aria-hidden="true"></i>View Events</a></li>
          </ul>
        </li>
      <li <?php if($active=="banner"){echo 'class="active treeview"';}?>>
          <a href="#">
            <i class="fa fa-newspaper-o" aria-hidden="true"></i><span>Banner</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="addbanner.php"><i class="fa fa-plus" aria-hidden="true"></i>Add Banner</a></li>
            <li><a href="viewbanner.php"><i class="fa fa-eye" aria-hidden="true"></i>View Banner</a></li>
          </ul>
        </li>
      <li <?php if($active=="testimonials"){echo 'class="active treeview"';}?>>
          <a href="#">
            <i class="fa fa-comments" aria-hidden="true"></i><span>Testimonials</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="addtestimonial.php"><i class="fa fa-plus" aria-hidden="true"></i>Add Testimonial</a></li>
            <li><a href="viewtestimonial.php"><i class="fa fa-eye" aria-hidden="true"></i>View Testimonial</a></li>
          </ul>
        </li>
      <li <?php if($active=="pages"){echo 'class="active treeview"';}?>>
          <a href="#">
            <i class="fa fa-file-text-o" aria-hidden="true"></i><span>Pages</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="about.php"><i class="fa fa-id-badge" aria-hidden="true"></i>About Us</a></li>
            <li><a href="terms.php"><i class="fa fa-handshake-o" aria-hidden="true"></i>Terms & Conditions</a></li>
            <li><a href="disclaimer.php"><i class="fa fa-podcast" aria-hidden="true"></i>Disclaimer</a></li>
          </ul>
        </li>
      <li <?php if($active=="orders"){echo 'class="active treeview"';}?>>
          <a href="orders.php">
            <i class="fa fa-cart-arrow-down" aria-hidden="true"></i><span>Orders</span>
          </a>
        </li>
        
      <li <?php if($active=="customers"){echo 'class="active treeview"';}?>>
          <a href="customers.php">
            <i class="fa fa-users" aria-hidden="true"></i><span>Customer's</span>
          </a>
        </li>
        <li <?php if($active=="subscribers"){echo 'class="active treeview"';}?>>
          <a href="subscribers.php">
            <i class="fa fa-user-plus" aria-hidden="true"></i><span>Subscribers</span>
          </a>
        </li>
        <li <?php if($active=="messages"){echo 'class="active treeview"';}?>>
          <a href="messages.php">
            <i class="fa fa-envelope-o" aria-hidden="true"></i></i><span>Contact Messages</span>
          </a>
        </li>
        <li <?php if($active=="contact&email"){echo 'class="active treeview"';}?>>
          <a href="contact.php">
            <i class="fa fa-address-book" aria-hidden="true"></i></i><span>Contact & Email</span>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
  <div class="content-wrapper">

  
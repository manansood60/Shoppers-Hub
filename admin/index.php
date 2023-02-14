<!DOCTYPE html>
<html>
<head>
  <?php
    session_start();
    if((isset($_SESSION['name'])!='admin')){
      header('location:login.php');
    }
    include_once('pages/db_connect.php');
    $sql='select * from tbladmin';
    $result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
    $row=mysqli_fetch_assoc($result);
  ?>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet"  href="font-awesome-4.7.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="plugins/Ionicons/css/ionicons.min.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-green sidebar-mini">
<div class="wrapper">

  <header class="main-header">

    <!-- Logo -->
    <a href="index.php" class="logo">
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
              <img src="pages/images/admin/<?php echo $row['aimage']; ?>" class="user-image" alt="<?php echo $row['aname']; ?>">
              <span class="hidden-xs"><?php echo $row['aname']; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="pages/images/admin/<?php echo $row['aimage']; ?>" class="img-circle" alt="<?php echo $row['aname']; ?>">

                <p>
                  <?php echo $row['aname']; ?>
                  <small>Web Developer</small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="pages/changepassword.php" class="btn btn-default btn-flat">Change Password
                  </a>
                </div>
                <div class="pull-right">
                  <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
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
          <img src="pages/images/admin/<?php echo $row['aimage']; ?>" class="img-circle" alt="<?php echo $row['aname']; ?>">
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
        <li class="active treeview">
          <a href="index.php">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
          
        </li>
        
        
        
        <li class="treeview">
          <a href="#">
            <i class="fa fa-server" aria-hidden="true"></i></i><span>Category</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/addcategory.php"><i class="fa fa-plus" aria-hidden="true"></i>
              Add Category</a></li>
            <li><a href="pages/viewcategory.php"><i class="fa fa-eye" aria-hidden="true"></i>
              View Category</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-align-left" aria-hidden="true"></i><span>Sub Category</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/addsubcategory.php"><i class="fa fa-plus" aria-hidden="true"></i>Add Sub Category</a></li>
            <li><a href="pages/viewsubcategory.php"><i class="fa fa-eye" aria-hidden="true"></i> View Sub Category</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-cubes" aria-hidden="true"></i><span>Products</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/addproducts.php"><i class="fa fa-plus" aria-hidden="true"></i>Add Products</a></li>
            <li><a href="pages/viewproducts.php"><i class="fa fa-eye" aria-hidden="true"></i> View Products</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-calendar" aria-hidden="true"></i><span>Events</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/addevent.php"><i class="fa fa-plus" aria-hidden="true"></i>Add Event</a></li>
            <li><a href="pages/viewevent.php"><i class="fa fa-eye" aria-hidden="true"></i>View Events</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-newspaper-o" aria-hidden="true"></i><span>Banner</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/addbanner.php"><i class="fa fa-plus" aria-hidden="true"></i>Add Banner</a></li>
            <li><a href="pages/viewbanner.php"><i class="fa fa-eye" aria-hidden="true"></i>View Banner</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-comments" aria-hidden="true"></i><span>Testimonials</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/addtestimonial.php"><i class="fa fa-plus" aria-hidden="true"></i>Add Testimonial</a></li>
            <li><a href="pages/viewtestimonial.php"><i class="fa fa-eye" aria-hidden="true"></i>View Testimonial</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-file-text-o" aria-hidden="true"></i><span>Pages</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/about.php"><i class="fa fa-id-badge" aria-hidden="true"></i>About Us</a></li>
            <li><a href="pages/terms.php"><i class="fa fa-handshake-o" aria-hidden="true"></i>Terms & Conditions</a></li>
            <li><a href="pages/disclaimer.php"><i class="fa fa-podcast" aria-hidden="true"></i>Disclaimer</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="pages/orders.php">
            <i class="fa fa-cart-arrow-down" aria-hidden="true"></i><span>Orders</span>
          </a>
        </li>
        
        <li class="treeview">
          <a href="pages/customers.php">
            <i class="fa fa-users" aria-hidden="true"></i><span>Customer's</span>
          </a>
        </li>
        <li class="treeview">
          <a href="pages/subscribers.php">
            <i class="fa fa-user-plus" aria-hidden="true"></i><span>Subscribers</span>
          </a>
        </li>
        <li>
          <li class="treeview">
          <a href="pages/messages.php">
            <i class="fa fa-envelope-o" aria-hidden="true"></i></i><span>Contact Messages</span>
          </a>
        </li>
          <li class="treeview">
          <a href="pages/contact.php">
            <i class="fa fa-address-book" aria-hidden="true"></i></i><span>Contact & Email</span>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Version 2.0</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="ion ion-ios-settings-strong"></i></span>

            <div class="info-box-content">
              <a href="pages/viewsubcategory.php">
                <span class="info-box-text">Category</span>
                <span class="info-box-number">
                  <?php 
                  $sqlcategory="select count(*) from tblsubcategory";
                  $resultcategory=mysqli_query($conn,$sqlcategory);
                  $rowcategory=mysqli_fetch_row($resultcategory);
                  echo $rowcategory['0'];
                  ?>
                </span>
              </a>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="ion-ios-box"></i></span>

            <div class="info-box-content">
              <a href="pages/viewproducts.php">
                <span class="info-box-text">Products</span>
                <span class="info-box-number">
                  <?php 
                  $sqlproducts="select count(*) from tblproduct";
                  $resultproducts=mysqli_query($conn,$sqlproducts);
                  $rowproducts=mysqli_fetch_row($resultproducts);
                  echo $rowproducts['0'];
                  ?>
                </span>
              </a>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>

            <div class="info-box-content">
              <a href="pages/orders.php">
                <span class="info-box-text">Orders</span>
                <span class="info-box-number">
                  <?php 
                    $sqlorders="select count(*) from tblorder";
                    $resultorders=mysqli_query($conn,$sqlorders);
                    $roworders=mysqli_fetch_row($resultorders);
                    echo $roworders['0'];
                    ?>
                </span>
              </a>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

            <div class="info-box-content">
              <a href="pages/customers.php">
                <span class="info-box-text">Users</span>
                <span class="info-box-number">
                  <?php 
                    $sqlusers="select count(*) from tbluser";
                    $resultusers=mysqli_query($conn,$sqlusers);
                    $rowusers=mysqli_fetch_row($resultusers);
                    echo $rowusers['0'];
                    ?>
                </span>
              </a>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <div class="col-md-7">
          <!-- TABLE: LATEST ORDERS -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Latest Orders</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin">
                  <thead>
                  <tr>
                    <th>Order No.</th>
                    <th>Price</th>
                    <th>Status</th>
                    <th>Order Date</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php 
                    $sqlorder="select * from tblorder order by id desc limit 6";
                    $resultorder=mysqli_query($conn,$sqlorder) or die(mysqli_error($conn));
                    while($roworder=mysqli_fetch_assoc($resultorder)){
                      echo '
                  <tr>
                    <td><a href="pages/examples/invoice.html">#'.$roworder['ordernumber'].'</a></td>
                    <td><i class="fa fa-rupee">'.$roworder['price'].'</i></td>
                    <td><span class="label ';
                    if($roworder['orderstatus']=="Ordered"){
                      echo 'label-success';
                    }elseif($roworder['orderstatus']=="Shipped"){
                      echo 'label-primary';
                    }elseif($roworder['orderstatus']=="Cancelled"){
                      echo 'label-warning';
                    }
                    else{
                      echo 'label-danger';
                    }
                      echo '">'.$roworder['orderstatus'].'
                      </span>
                    </td>
                    <td>
                    '.$roworder['orderdate'].'
                    </td>
                  </tr>
                      ';
                    }
                  ?> 
                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <a href="pages/orders.php" class="btn btn-sm btn-default btn-flat pull-right">View All Orders</a>
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-5">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Recently Added Products</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <ul class="products-list product-list-in-box">
                <?php 
                $sqlproduct="select * from tblproduct order by id desc limit 4";
                $resultproduct=mysqli_query($conn,$sqlproduct) or die(mysqli_error($conn));
                while($rowproduct=mysqli_fetch_assoc($resultproduct)){
                  echo '
                  <!-- /.item -->
                <li class="item">
                  <div class="product-img">
                  <a href="../product-page.php?product='.$rowproduct['id'].'" class="product-title">
                    <img src="../images/products/'.$rowproduct['productprimaryimage'].'" alt="'.$rowproduct['producttitle'].'">
                  </div>
                  <div class="product-info">
                    <a href="" class="product-title">'.$rowproduct['producttitle'].'
                      <span class="label label-success pull-right fa fa-rupee">'.$rowproduct['productofferprice'].'</span></a>
                  </div>
                </li>
                  ';
                }
                ?>
              </ul>
            </div>
            <!-- /.box-body -->
            <div class="box-footer text-center">
              <a href="pages/viewproducts.php" class="uppercase">View All Products</a>
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
       </div>
            <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.3.3
    </div>
    <strong>Copyright &copy; 2014-2015 <a href="#">Manan Kumar</a>.</strong> All rights
    reserved.
  </footer>

  
      

</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.0 -->
<script src="plugins/jQuery/jQuery-2.2.0.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS 1.0.1 -->
<script src="plugins/chartjs/Chart.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard2.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>

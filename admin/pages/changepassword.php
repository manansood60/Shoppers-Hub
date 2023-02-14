<?php 
	ob_start();
	$active="";
	$page="Change Password";
	include_once("header.php");
	$password=$row['apassword'];
?>
<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Change Password
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Change Password</li>
      </ol>
    </section>
    <section class="content">
	  <div class="row">
	    <!-- left column -->
	    <div class="col-md-12">
	      <!-- general form elements -->
	      <div class="box box-success">
	        <div class="box-header with-border">
	        	<h3 class="box-title">Change Your Password</h3>
	        </div>
	        <!-- /.box-header -->
	        <!-- form start -->
	        <form role="form" action="#" method='post' enctype="multipart/form-data">
		      <div class="box-body">
		        <div class="form-group ">
		        	<label> Old Password </label>
		        	<input type="password" placeholder="Enter Your Password" name="oldpassword" id="oldpassword" class="form-control" onblur="passwordcheck();">
		        	<span class="inputerror" id="passwordcheck"></span>
		        </div>
		        <div class="form-group">
		        	<label> New Password </label>
		        	<input type="password" placeholder="Enter New Password" name="newpassword" id="newpassword" class="form-control" >
		        </div>
		        <div class="form-group">
		        	<label> Confirm New Password</label>
		        	<input type="password" placeholder="Enter New Password Again" name="confirmpassword" id="confirmpassword" class="form-control" onblur="matchpassword();">
		        	<span class="inputerror" id="matchpassword"></span>
		        </div>
		      </div>
	          <div class="box-footer">
	            	<button type="submit" name='submit' class="btn btn-success">Submit </button>
	          </div>
	        </form>
	      </div>
	      <!-- /box-->
	    </div>
	    <!-- col -->
	  </div> <!--row-->
	</section>
<?php 
		if(isset($_POST['submit']))
	{
			$oldpassword=$_POST['oldpassword'];
			$newpassword=$_POST['newpassword'];
			$confirmpassword=$_POST['confirmpassword'];
			if(!($password==$oldpassword)){
				echo '<div class="alert alert-danger alert-dismissible">
	                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	                <h3><i class="icon fa fa-ban"></i> Failed!</h3>
	                <h4>Your Password is Incorrect.</h4>   
	              </div>';
	          }else{
				if(!($newpassword==$confirmpassword)){
					echo '<div class="alert alert-danger alert-dismissible">
		                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		                <h3><i class="icon fa fa-ban"></i> Failed!</h3>
		                <h4>Your New Password Did not Match.</h4>   
		              </div>';
				}else {
				$sql="update tbladmin set apassword='$newpassword' where apassword='$oldpassword'"; 
				$test=mysqli_query($conn,$sql) or die(mysqli_error($conn));
				if( $test){
					echo '<div class="alert alert-success alert-dismissible fixed">
		                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		                <h3><i class="icon fa fa-check"></i> Success!</h3>
		                <h4>Password Successfully Changed.</h4>   
		              </div>';
					}
					else {
					echo 'Incomplete Process';
					}}
			}
	}
	include_once("footer.php");
?>

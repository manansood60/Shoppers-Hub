<?php 
	ob_start();
	$active="contact&email";
	$page="Contact";
	include_once("header.php");
	$sql="select * from tblcontact";
	$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
	$row=mysqli_fetch_row($result);
	$editid=$row['0'];
	$contact=$row['2'];
	$email=$row['1'];
	$address=$row['3'];
?>
<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add Contact Information
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Contact</li>
      </ol>
    </section>
    <section class="content">
	  <div class="row">
	    <!-- left column -->
	    <div class="col-md-12">
	      <!-- general form elements -->
	      <div class="box box-success">
	        <div class="box-header with-border">
	        	<?php
	          		if($row){
	          			echo '<h3 class="box-title">Edit Contact Infromation</h3>';
	          		}
	          		else{
	          			echo '<h3 class="box-title">Add New Contact Information</h3>';
	          	}
	          ?>
	        </div>
	        <!-- /.box-header -->
	        <!-- form start -->
	        <form role="form" action="#" method='post' enctype="multipart/form-data">
		      <div class="box-body">
		        <div class="form-group">
		        	<label> Contact No. </label>
		        	<input type="text" placeholder="Enter Contact Number" name="number" class="form-control" value="<?php if($row) { echo $contact; }?>">
		        </div>
		        <div class="from-group">
		        	<label> Email </label>
		        	<input type="email" placeholder="Enter email address" name="email" class="form-control" value="<?php if($row) { echo $email; }?>">
		        </div>
		        <div>
		        	<label> Address </label>
		        	<textarea class="form-control" name="address" placeholder="Enter Address"><?php if($row) { echo $address; }?></textarea>
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
		if($row){
			$number=$_POST['number'];
			$email=$_POST['email'];
			$address=$_POST['address'];
			$sql= "update tblcontact set cnumber='$number', cemail='$email', caddress='$address' where id =$editid";
			$test=mysqli_query($conn,$sql) or die(mysqli_error($conn));
			if( $test){
				echo '<div class="alert alert-success alert-dismissible fixed">
	                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	                <h3><i class="icon fa fa-check"></i> Success!</h3>
	                <h4>Contact Information is Successfully Updated.</h4>   
	              </div>';
				}
			else {
			echo 'Data has not entered';
			}
		}
		if(!($row)){
		$number=$_POST['number'];
		$email=$_POST['email'];
		$address=$_POST['address'];
		$sql= " insert into tblcontact(cnumber,cemail,caddress) values('$number','$email','$address')";
		$test=mysqli_query($conn,$sql) or die(mysqli_error($conn));
		if( $test){
			echo '<div class="alert alert-success alert-dismissible fixed">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h3><i class="icon fa fa-check"></i> Success!</h3>
                <h4>Contact Information is Successfully Inserted.</h4>   
              </div>';
			}
		else {
			echo 'Data has not entered';
		}
		}	
	}
	include_once("footer.php");
?>
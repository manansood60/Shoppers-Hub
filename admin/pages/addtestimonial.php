<?php 
	ob_start();
	$active="testimonials";
	$page="Add Testimonial";
	include_once("header.php");

	// To handle Edit
	if(isset($_REQUEST['editid'])){
		$editid=$_REQUEST['editid'];
		$sqledit="select * from tbltestimonial where id=".$editid;
		$result=mysqli_query($conn,$sqledit) or die(mysqli_error($conn));
		$row=mysqli_fetch_assoc($result);
		$name=$row['name'];
		$review=$row['review'];
		$occupation=$row['occupation'];
		$image=$row['image'];
		$path="../../images/testimonials/";
	}
?>
<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add Testimonial
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add Testimonial</li>
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
	          		if(isset($_REQUEST['editid'])){
	          			echo '<h3 class="box-title">Edit Testimonial</h3>';
	          		}
	          		else{
	          			echo '<h3 class="box-title">Add New Testimonial</h3>';
	          	}
	          ?>
	        </div>
	        <!-- /.box-header -->
	        <!-- form start -->
	        <form role="form" action="#" method='post' enctype="multipart/form-data">
		      <div class="box-body">
		        <div class="form-group">
		        	<label> Name </label>
		        	<input type="text" placeholder="Enter Name" name="name" class="form-control" value="<?php if (isset($_REQUEST['editid'])) { echo $name; }?>">
		        </div>
		        <div class="form-group">
		        	<label> Occupation </label>
		        	<input class="form-control" type="text" name="occupation" placeholder="Enter Occupation" value="<?php if (isset($_REQUEST['editid'])) { echo $occupation; }?>">
		        </div>
		        <div class="form-group">
		        	<label> Review </label>
		        	<textarea rows="2" class="form-control" name="review" placeholder="Enter Review"><?php if (isset($_REQUEST['editid'])) { echo $review; }?></textarea>
		        </div>
		        <?php 
                if(isset($_REQUEST['editid'])){
                  echo '
	                <div class="form-group imagebox">
	                  <span class="close" id="closeimg">&times;</span>
	                  <div class="image" id="image"><img src="'.$path.$image.'">
	                  </div>
	                  <div class="inputimage" id="inputimage">
	                  <label for="exampleInputFile">Image</label>
	                  <input type="file" name="image" >
	                  <p class="help-block">Select New Image of Event</p>

	                  </div>
	                </div>';}
                else{
                	echo '
                	<div class="form-group">
		        	<label> Image </label>
					<input type="file" name="image" >		        	
		        	</div>';
                }
                 ?>
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
		// To handle Edit
		if(isset($_REQUEST['editid'])){
			$name=$_POST['name'];
			$review=$_POST['review'];
			$occupation=$_POST['occupation'];
			$timage=$_FILES['image']['name'];
			if(!($timage=="")){
				unlink($path.$image);
				$image=time()."-".rand(1000,9999).$timage;
				move_uploaded_file($_FILES['image']['tmp_name'],$path.$image);
			}
			$sqlupdate="update tbltestimonial set name='$name', review='$review', occupation='$occupation', image='$image' where id=$editid";
			$test=mysqli_query($conn,$sqlupdate) or die(mysqli_error($conn));
			if($test){
        		header("location:viewtestimonial.php?editname=".$name);
      		}
		}
		// When Edit is not happening
		if(!isset($_REQUEST['editid'])){
		$name=$_POST['name'];
		$review=$_POST['review'];
		$occupation=$_POST['occupation'];
		$timage=$_FILES['image']['name'];
		$image=time()."-".rand(1000,9999).$timage;
		$path="../../images/testimonials/";
		$sql="insert into tbltestimonial values('','$name','$occupation','$review','$image',curdate())";
		$test=mysqli_query($conn,$sql) or die(mysqli_error($conn));
		move_uploaded_file($_FILES['image']['tmp_name'],$path.$image);
		if( $test){
			echo '<div class="alert alert-success alert-dismissible fixed">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h3><i class="icon fa fa-check"></i> Success!</h3>
                <h4>Event "'.$name.'" is Successfully Inserted.</h4>   
              </div>';
			}
		else {
			echo 'Data has not entered';
		}
		}		
	}
	include_once("footer.php");
?>

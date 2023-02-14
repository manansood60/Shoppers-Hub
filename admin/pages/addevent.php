<?php 
	ob_start();
	$active="events";
	$page="Add Event";
	include_once("header.php");

	// To handle Edit
	if(isset($_REQUEST['editid'])){
		$editid=$_REQUEST['editid'];
		$sqledit="select * from tblevent where id=".$editid;
		$result=mysqli_query($conn,$sqledit) or die(mysqli_error($conn));
		$row=mysqli_fetch_assoc($result);
		$etitle=$row['etitle'];
		$edescription=$row['edescription'];
		$eofferdiscount=$row['eofferdiscount'];
		$startdate=$row['estartdate'];
		$enddate=$row['eenddate'];
		$image=$row['eimage'];
		$path="../../images/events/";
	}
?>
<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add Event
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add Event</li>
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
	          			echo '<h3 class="box-title">Edit Event</h3>';
	          		}
	          		else{
	          			echo '<h3 class="box-title">Add New Event</h3>';
	          	}
	          ?>
	        </div>
	        <!-- /.box-header -->
	        <!-- form start -->
	        <form role="form" action="#" method='post' enctype="multipart/form-data">
		      <div class="box-body">
		        <div class="form-group">
		        	<label> Title </label>
		        	<input type="text" placeholder="Enter Title" name="title" class="form-control" value="<?php if (isset($_REQUEST['editid'])) { echo $etitle; }?>">
		        </div>
		        <div class="from-group">
		        	<label> Description </label>
		        	<textarea rows="2" class="form-control" name="description" placeholder="Enter Description"><?php if (isset($_REQUEST['editid'])) { echo $edescription; }?></textarea>
		        </div>
		        <div class="form-group">
		        	<label> Offer Discount</label>
		        	<input class="form-control" type="text" name="offer" placeholder="Enter Offer Discount" value="<?php if (isset($_REQUEST['editid'])) { echo $eofferdiscount; }?>">
		        </div>
		        <div class="form-group">
		        	<label> Start Date </label>
		        	<input type="date" class="form-control" name="startdate" value="<?php if (isset($_REQUEST['editid'])) { echo $startdate; }?>">
		        </div>
		        <div class="form-group">
		        	<label> End Date </label>
		        	<input type="date" class="form-control" name="enddate" value="<?php if (isset($_REQUEST['editid'])) { echo $enddate; }?>">
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
			$title=$_POST['title'];
			$description=$_POST['description'];
			$offerdiscount=$_POST['offer'];
			$sdate=$_POST['startdate'];
			$edate=$_POST['enddate'];
			$timage=$_FILES['image']['name'];
			if(!($timage=="")){
				unlink($path.$image);
				$image=time()."-".rand(1000,9999).$timage;
				move_uploaded_file($_FILES['image']['tmp_name'],$path.$image);
			}
			$sqlupdate="update tblevent set etitle='$title', edescription='$description', eofferdiscount='$offerdiscount', eimage='$image', estartdate='$sdate', eenddate='$edate' where id=$editid";
			$test=mysqli_query($conn,$sqlupdate) or die(mysqli_error($conn));
			if($test){
        		header("location:viewevent.php?editname=".$title);
      		}
		}
		// When Edit is not happening
		if(!isset($_REQUEST['editid'])){
		$title=$_POST['title'];
		$description=$_POST['description'];
		$offerdiscount=$_POST['offer'];
		$sdate=$_POST['startdate'];
		$edate=$_POST['enddate'];
		$timage=$_FILES['image']['name'];
		$image=time()."-".rand(1000,9999).$timage;
		$path="../../images/events/";
		$sql="insert into tblevent(etitle,edescription,eofferdiscount,estartdate,eenddate,eimage) values('$title','$description','$offerdiscount','$sdate','$edate','$image')";
		$test=mysqli_query($conn,$sql) or die(mysqli_error($conn));
		move_uploaded_file($_FILES['image']['tmp_name'],$path.$image);
		if( $test){
			echo '<div class="alert alert-success alert-dismissible fixed">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h3><i class="icon fa fa-check"></i> Success!</h3>
                <h4>Event "'.$title.'" is Successfully Inserted.</h4>   
              </div>';
			}
		else {
			echo 'Data has not entered';
		}
		}		
	}
	include_once("footer.php");
?>

<?php 
	ob_start();
	$active="banner";
	$page="Add Banner";
	include_once("header.php");
	// To handle Edit
	if(isset($_REQUEST['editid'])){
		$editid=$_REQUEST['editid'];
		$sqledit="select * from tblbanner where id=".$editid;
		$result=mysqli_query($conn,$sqledit) or die(mysqli_error($conn));
		$row=mysqli_fetch_assoc($result);
		$btitle=$row['btitle'];
		$balt=$row['balt'];
		$bslogan=$row['bslogan'];
		$btext=$row['btext'];
		$image=$row['bimage'];
		$path="images/banner/";
	}
?>
<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add Banner
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add Banner</li>
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
	          			echo '<h3 class="box-title">Edit Banner</h3>';
	          		}
	          		else{
	          			echo '<h3 class="box-title">Add New Banner</h3>';
	          	}
	          ?>
	        </div>
	        <!-- /.box-header -->
	        <!-- form start -->
	        <form role="form" action="#" method='post' enctype="multipart/form-data">
		      <div class="box-body">
		      	<div class="form-group">
		      		<label>Title</label>
		      		<input type="text" placeholder="Enter Title" class="form-control" name="title" value="<?php if (isset($_REQUEST['editid'])) { echo $btitle; }?>">
		      	</div>
		      	<div class="form-group">
		      		<label>Slogan</label>
		      		<input type="text" placeholder="Enter Banner Slogan" class="form-control" name="slogan" value="<?php if (isset($_REQUEST['editid'])) { echo $bslogan; }?>">
		      	</div>
		      	<div class="form-group">
		      		<label>Alternative Text</label>
		      		<input type="text" placeholder="Enter Alternative Text" class="form-control" name="alt" value="<?php if (isset($_REQUEST['editid'])) { echo $balt; }?>">
		      	</div>
		      	<div class="box-body pad">
              	
                    <textarea id="editor1" name="editor1" rows="10" cols="80">
                     <?php if(isset($_REQUEST['editid'])) { echo $btext; }?>
                    </textarea>
              
            	</div>
		      	<?php 
                if(isset($_REQUEST['editid'])){
                  echo '
	                <div class="form-group imagebox">
	                  <span class="close" id="closeimg">&times;</span>
	                  <div class="image" id="image"><img src="'.$path.$image.'">
	                  </div>
	                  <div class="inputimage" id="inputimage">
	                  <label for="exampleInputFile">Banner</label>
	                  <input type="file" name="banner" >
	                  <p class="help-block">Select New Image of Banner</p>
	                  </div>
	                </div>';}
                else{
                	echo '
                	<div class="form-group">
		        	<label> Banner </label>
		        	<input type="file" name="banner">
		        	<p class="help-block">Select Image of Banner</p>
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
			$alt=$_POST['alt'];
			$text=$_POST['editor1'];
			$slogan=$_POST['slogan'];
			$timage=$_FILES['banner']['name'];
			if(!($timage=="")){
				unlink($path.$image);
				$image=time()."-".rand(1000,9999).$timage;
				move_uploaded_file($_FILES['banner']['tmp_name'],$path.$image);
			}
			$sqlupdate="update tblbanner set btitle='$title', balt='$alt', bimage='$image', btext='$text', bslogan='$slogan' where id=$editid";
			$test=mysqli_query($conn,$sqlupdate) or die(mysqli_error($conn));
			if($test){
        		header("location:viewbanner.php?editname=".$title);
      		}
		}
		// When Edit is not happening
		if(!isset($_REQUEST['editid'])){
		$title=$_POST['title'];
		$alt=$_POST['alt'];
		$slogan=$_POST['slogan'];
		$text=$_POST['editor1'];
		$img=$_FILES['banner']['name'];
		$banner=time()."-".rand(1000,9999).$img;
		$path='images/banner/'.$banner;
		$sql= "insert into tblbanner(bimage,btitle,balt,btext,bslogan) values('$banner','$title','$alt','$text','$slogan')";
		$test=mysqli_query($conn,$sql) or die(mysqli_error($conn));
		move_uploaded_file($_FILES['banner']['tmp_name'],$path);
		if( $test){
			echo '<div class="alert alert-success alert-dismissible fixed">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h3><i class="icon fa fa-check"></i> Success!</h3>
                <h4>Banner "'.$img.'" is Successfully Inserted.</h4>   
              </div>';
			}
		else {
			echo 'Data has not entered';
		}
		}	
	}
	include_once("footer.php");
?>
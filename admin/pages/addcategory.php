<?php 
	ob_start();
	$active="category";
	$page="Add Category";
	include_once("header.php");
	//for Edit function 
		if(isset($_REQUEST['editid']))
		{	
			$editid=$_REQUEST['editid'];
			$sql="select * from tblcategory where id=".$editid;
			$result=mysqli_query($conn,$sql) or die(mysql_error($conn));
			$row=mysqli_fetch_row($result);
			$name=$row['1'];
			$availability=$row['2'];		
		}
?>
<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add Category
       
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add Category</li>
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
	          			echo '<h3 class="box-title">Edit Category</h3>';
	          		}
	          		else{
	          	echo '<h3 class="box-title">Add New Category</h3>';
	          	}
	          ?>
	        </div>
	        <!-- /.box-header -->
	        <!-- form start -->
	        <form role="form" action="#" method='post'>
	          <div class="box-body">
	            <div class="form-group">

	              <label for="exampleinputcatname">Category Name</label>
	              <input type="text" class="form-control" id="inputcatname" name="catname" placeholder="Enter Name" <?php if(isset($_REQUEST['editid'])) {echo 'value="'.$name.'"'; }?> required>
	            </div>
	            <div class="form-group">

	              <label for="exampleinputavailability"> Status </label>
	              <div class="radio">
	              <label >
	              <input type="radio" name="status" class="minimal" value="available" required
	              <?php if(isset($_REQUEST['editid'])){if($availability=='available'){echo 'checked';}
	          		}?> >
	              Available </label>
	          
	              <label style="padding-left: 30px;">
	              <input type="radio" name="status" value="unavailable" required
	              	 <?php if(isset($_REQUEST['editid'])){if($availability=='unavailable'){echo 'checked';}
	          		}?>
	              >
	              Unavailable </label>
	              </div>
	            </div>
	          </div>
	          <!-- /.box-body -->

	          <div class="box-footer">
	            <button type="submit" name='submit' class="btn btn-success">Submit </button>
	          </div>
	        </form>
	      </div>
	      <!-- /.box -->
	    </div>
	    <!-- col -->
	  </div> <!--row-->
	</section>


<?php 
		if(isset($_POST['submit']))
	{
		if(isset($_REQUEST['editid'])){
			$name=$_POST['catname'];
			$status=$_POST['status'];
			$date=date('Y-m-d');			
			$sqlupdate="update tblcategory set catname='$name',catstatus='$status',catmodifydate='$date' where id=$editid";
			$test=mysqli_query($conn,$sqlupdate) or die(mysqli_error($conn));
			if( $test){
			
			header('location:viewcategory.php?editid='.$editid);
			}
			else {
			echo 'Data has not update';
			}

		}
		if(!(isset($_REQUEST['editid']))){
		$name=$_POST['catname'];
		$status=$_POST['status'];
		$date=date('Y-m-d');
		$sql= " insert into tblcategory(catname,catstatus,catcreatedate,catmodifydate) values('$name','$status','$date','$date')";
		$test=mysqli_query($conn,$sql) or die(mysqli_error($conn));

		if( $test){
			echo '<div class="alert alert-success alert-dismissible fixed">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h3><i class="icon fa fa-check"></i> Success!</h3>
                <h4>Category "'.$name.'" is Successfully Inserted.</h4>
                 
              </div>';
			}
			else {
			echo 'Data has not entered';
			}

		}
	}

	include_once("footer.php");
?>

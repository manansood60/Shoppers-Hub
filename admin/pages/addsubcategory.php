	<?php
	ob_start();
		$active='subcategory';
		$catid=999;
		$page="Add Sub-Category";
		include_once('header.php');
		$sql='select * from tblcategory';
		$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
		$sqlsize='select * from tblsizechart';
		$resultsize=mysqli_query($conn,$sqlsize) or die(mysqli_error($conn));

		//for Edit function 
		if(isset($_REQUEST['editid']))
		{
			$editid=$_REQUEST['editid'];
			
			$sqldata="select * from tblsubcategory where id=".$editid;
			$result2=mysqli_query($conn,$sqldata) or die(mysqli_error($conn));
			$row2=mysqli_fetch_row($result2);
			$catid=$row2['1'];
			$sqlcatname="select catname from tblcategory where id=".$catid;
			$resultcatname=mysqli_query($conn,$sqlcatname) or die(mysqli_error($conn));
			$rowcatname=mysqli_fetch_row($resultcatname);
			$catname=$rowcatname['0'];
			$name=$row2['2'];
			$status=$row2['3'];
			$sizeid=$row2['6'];
			// Fetching Size value from database
			$sqlsizevalue="select size from tblsizechart where id=$sizeid";
			$resultsizevalue=mysqli_query($conn,$sqlsizevalue) or die(mysqli_error($conn));
			$rowsizevalue=mysqli_fetch_row($resultsizevalue);
			$sizevalue=$rowsizevalue['0'];

		}
	?>
<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add Sub Category
       
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add Sub Category</li>
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
	          			echo '<h3 class="box-title">Edit Sub Category</h3>';
	          		}
	          		else{
	          	echo '<h3 class="box-title">Add New Sub Category</h3>';
	          	}
	          ?>
	        </div>
	        <!-- /.box-header -->
	        <!-- form start -->
	        <form role="form" action="#" method='post'>
	          <div class="box-body">
	          	<div class="form-group">
	          		<label>Select Category</label>
	          		<select class="form-control" name="category">
	          			<?php
	          				if(isset($_REQUEST['editid'])){
	          					echo '<option value="'.$catid.'"">'.$catname.' </option>';
	          				}
	          				else{
	          					echo '<option> Select Category </option>';
	          				}
          					while($row=mysqli_fetch_assoc($result)){
          						if($row['id']==$catid){
          							continue;
          						}else {
          						echo '
          							<option value="'.$row['id'].'"">'.$row['catname'].'</option>
          							';
	          					}
	          				}
	          			?>
	          		</select>
	          		
	          	</div>
	            <div class="form-group">

	              <label for="exampleinputcatname">Sub Category Name</label>
	              <input type="text" class="form-control" id="inputsubcatname" name="subcatname" placeholder="Enter Name" required <?php if(isset($_REQUEST['editid'])) { echo 'value="'.$name.'"'; }?> >
	            </div>
	            <div class="form-group">
	            	<label>Select Size Type</label>
	            	<select class="form-control" name="size">
	            	<?php 
	            		if(isset($_REQUEST['editid'])){
	   					echo '<option value="'.$sizeid.'">'.$sizevalue.'</option>';
	            		} else {
	            		echo '<option value="-1">Select Size type </option>';
	            		}
	            		while($sizerow=mysqli_fetch_assoc($resultsize)){
	            			if($sizerow['id']==$sizeid){ continue;}else{
	            			echo "<option value='".$sizerow["id"]."'>".$sizerow['size']."</option>";
	            			}
	            		}
	            	?>
	            	</select>
	            	<a href="createsize.php" class="btn btn-warning">Create Size Type</a>
	            </div>
	            <div class="form-group">

	              <label for="exampleinputavailability"> Status </label>
	              <div class="radio">
	              <label >
	              <input type="radio" name="status" class="minimal" required value="available"
	              <?php if(isset($_REQUEST['editid'])){if($status=='available'){echo 'checked';}
	          		}?>>
	              Available </label>
	          
	              <label style="padding-left: 30px;">
	              <input type="radio" name="status" required value="unavailable"
	              	 <?php if(isset($_REQUEST['editid'])){if($status=='unavailable'){echo 'checked';}
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
			$catid=$_POST['category'];
			$catname=$_POST['subcatname'];
			$catstatus=$_POST['status'];
			$sizeid=$_POST['size'];
			$date=date('Y-m-d');
			$sqlupdate='update tblsubcategory set catid='.$catid.', subcatname="'.$catname.'", subcatstatus="'.$catstatus.'", subcatmodifydate="'.$date.'",sizeid="'.$sizeid.'" where id='.$editid;
			$test=mysqli_query($conn,$sqlupdate) or die(mysqli_error($conn));
			if( $test){
			
			header('location:viewsubcategory.php?editname='.$catname);
			}
			else {
			echo 'Data has not update';
			}


		}
		if(!isset($_REQUEST['editid'])){
		$catid=$_POST['category'];
		$catname=$_POST['subcatname'];
		$catstatus=$_POST['status'];
		$date=date('Y-m-d');
		$sizeid=$_POST['size'];

		$sql= "insert into tblsubcategory(catid,subcatname,subcatstatus,subcatcreatedate,subcatmodifydate,sizeid) values($catid,'$catname','$catstatus','$date','$date',$sizeid)";
		$test=mysqli_query($conn,$sql) or die(mysqli_error($conn));
	
		if( $test){
			echo '<div class="alert alert-success alert-dismissible fixed">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h3><i class="icon fa fa-check"></i> Success!</h3>
                <h4>Sub Category "'.$catname.'" is Successfully Inserted.</h4>
                 
              </div>';
			}
			else {
			echo 'Data has not entered';
			}
		}

	} 
	include_once('footer.php');
	?>

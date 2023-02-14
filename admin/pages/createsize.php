<?php
$active="subcategory";
$page="Create Size";
include_once('header.php');
?>
<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Create Size
       
      </h1>
    </section>
    <section class="content">
	  <div class="row">
	    <!-- left column -->
	    <div class="col-md-12">
	      <!-- general form elements -->
	      <div class="box box-success">
	        <div class="box-header with-border">
	        	<h3 class="box-title">Add New Size Type</h3>
	        </div>
	      <form role="form" action="#" method='post'>
	          <div class="box-body">
	          	
	            <div class="form-group">

	              <label for="exampleinputcatname">Enter New Size </label>
	              <input type="text" class="form-control" name="sizetype" placeholder="Enter New Sizes Separated by comma" required>
	            </div>

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
			$size=$_POST['sizetype'];			
			$sql="insert into tblsizechart(size) values('$size')";
			$test=mysqli_query($conn,$sql) or die(mysqli_error($conn));
			if( $test){
				echo '<div class="alert alert-success alert-dismissible fixed">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h3><i class="icon fa fa-check"></i> Success!</h3>
                <h4>Size Type "'.$size.'" is Successfully Inserted.</h4>
                 
              </div>';
			
			}
			else {
			echo 'Data has not update';

			}
	}
include_once('footer.php');

?>
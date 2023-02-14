<?php 
	ob_start();
	$active="pages";
	$page="Terms & Conditions";
	include_once("header.php");
	$sql="select * from tblpages where ptitle='Terms'";
	$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
	$row=mysqli_fetch_assoc($result);
	$pdescription=$row['pdescription'];
?>
<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Terms & Conditions
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Terms & Conditions</li>
      </ol>
    </section>
    <section class="content">
	  <div class="row">
	    <!-- left column -->
	    <div class="col-md-12">
	      <!-- general form elements -->
	      <div class="box box-success">
	        <div class="box-header with-border">
	          	<h3 class="box-title">Terms And Conditions</h3>
	        </div>
	        <!-- /.box-header -->
	        <!-- form start -->
	        <form role="form" action="#" method='post' enctype="multipart/form-data">
		      	<div class="box-body pad">
              	
                    <textarea id="editor1" name="editor1" rows="10" cols="80">
                     <?php if ($row) { echo $pdescription; }?>
                    </textarea>
              
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
		$terms=$_POST['editor1'];
		$sql= "update tblpages set pdescription='$terms', pdate=curdate() where ptitle='Terms'";
		$test=mysqli_query($conn,$sql) or die(mysqli_error($conn));
		if( $test){
			header('terms.php');
			}
		else {
			echo 'Data has not entered';
		} 
		
	}

	include_once("footer.php");
?>

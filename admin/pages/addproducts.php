<?php
ob_start();
$active="products";
$page="Add Products";
include_once('header.php');
$sql='select * from tblcategory';
$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
// For Edit 
  if(isset($_REQUEST['editid'])){
    $editid=$_REQUEST['editid'];
    $sqledit="select * from tblproduct where id=$editid";
    $resultedit=mysqli_query($conn,$sqledit) or die(mysqli_error($conn));
    $rowedit=mysqli_fetch_row($resultedit);
    $catid=$rowedit['1'];
    $subcatid=$rowedit['2'];
    $ptitle=$rowedit['3'];
    $description=$rowedit['4'];
    $price=$rowedit['5'];
    $offerprice=$rowedit['6'];
    $totalunits=$rowedit['7'];
    $sizeid=$rowedit['14'];
    $quantity=$rowedit['15'];
    $path="../../images/products/";
    $image=$rowedit['8'];
    $image1=$rowedit['9'];
    $image2=$rowedit['10'];
    $image3=$rowedit['11'];
  }

?>
<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add Products
       
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add Products</li>
      </ol>
    </section>
    <section class="content">
	  <div class="row">
	    <!-- left column -->
	    <div class="col-md-12">
        <?php
  if(isset($_POST['submit'])){
    if(isset($_REQUEST['editid'])){
      $title=$_POST['producttitle'];
      $description=$_POST['productdescription'];
      $unitprice=$_POST['productprice'];
      $offerprice=$_POST['offerprice'];
      $date=date('Y-m-d');
      $i=0;
      if (isset($_POST['size'.$i])){
        $totalunits=0;
        while(isset($_POST['size'.$i])){
        $array[$i]=$_POST['size'.$i];
        $totalunits+=$array[$i];
        $i++;

        }
        $quantity=implode(",",$array);
      } else {
        $totalunits=$_POST['totalunits'];
        $quantity=0;
      }
      
      $pimage=$_FILES['image']['name'];
      $simage1=$_FILES['image1']['name'];
      $simage2=$_FILES['image2']['name'];
      $simage3=$_FILES['image3']['name'];
      if(!($pimage=="")){
        unlink($path.$image);
        $image=time()."-".rand(0000,9999).$pimage;
        move_uploaded_file($_FILES['image']['tmp_name'],$path.$image);
      }
      if(!($simage1=="")){
        unlink($path.$image1);
        $image1=time()."-".rand(0000,9999).$simage1;
        move_uploaded_file($_FILES['image1']['tmp_name'],$path.$image1);
      }
      if(!($simage2=="")){
        unlink($path.$image2);
        $image2=time()."-".rand(0000,9999).$simage2;
        move_uploaded_file($_FILES['image2']['tmp_name'],$path.$image2);
      }
      if(!($simage3=="")){
        unlink($path.$image3);
        $image3=time()."-".rand(0000,9999).$simage3;
        move_uploaded_file($_FILES['image3']['tmp_name'],$path.$image3);
      }
      
      $sql="update tblproduct set producttitle='$title', productdescription='$description', productprice=$unitprice, productofferprice=$offerprice, producttotalunits=$totalunits, productprimaryimage='$image', productimage1='$image1', productimage2='$image2', productimage3='$image3', productmodifydate='$date', productquantities='$quantity' where id=$editid";
      $test=mysqli_query($conn,$sql) or die(mysqli_error($conn));
      if($test){
        header("location:viewproducts.php?editname=".$title);
      }
    }
    else {
      $catid=$_POST['category'];
      $subcatid=$_POST['subcategory'];
      $title=$_POST['producttitle'];
      $description=$_POST['productdescription'];
      $unitprice=$_POST['productprice'];
      $offerprice=$_POST['offerprice'];
      //Getting Product Size id from subcategory
      $sqlsize='select sizeid from tblsubcategory where id='.$subcatid;
      $resultsize=mysqli_query($conn,$sqlsize) or die(mysqli_error($conn));
      $rowsize=mysqli_fetch_row($resultsize);
      $sizeid=$rowsize['0'];
      //Getting a string of quantity values and total units
      $i=0;
      $totalunits=0;
      if (isset($_POST['size'.$i])){
        while(isset($_POST['size'.$i])){
        $array[$i]=$_POST['size'.$i];
        $totalunits+=$array[$i];
        $i++;

        }
        $quantity=implode(",",$array);
      } else {
        $totalunits=$_POST['totalunits'];
        $quantity=0;
      }
      $date=date('Y-m-d');
      $pimage=$_FILES['image']['name'];
      $simage1=$_FILES['image1']['name'];
      $simage2=$_FILES['image2']['name'];
      $simage3=$_FILES['image3']['name'];
      $image=time()."-".rand(0000,9999).$pimage;
      $image1=time()."-".rand(0000,9999).$simage1;
      $image2=time()."-".rand(0000,9999).$simage2;
      $image3=time()."-".rand(0000,9999).$simage3;
      $sql="insert into tblproduct(pcid,pscid,producttitle,productdescription,productprice,productofferprice,producttotalunits,productprimaryimage,productimage1,productimage2,productimage3,productcreatedate,productmodifydate,psid,productquantities) values($catid,$subcatid,'$title','$description',$unitprice,$offerprice,$totalunits,'$image','$image1','$image2','$image3','$date','$date',$sizeid,'$quantity')";
      $test=mysqli_query($conn,$sql) or die(mysqli_error($conn));
      $path="../../images/products/";
      move_uploaded_file($_FILES['image']['tmp_name'],$path.$image);
      move_uploaded_file($_FILES['image1']['tmp_name'],$path.$image1);
      move_uploaded_file($_FILES['image2']['tmp_name'],$path.$image2);
      move_uploaded_file($_FILES['image3']['tmp_name'],$path.$image3);
      if($test){
        echo '<div class="alert alert-success alert-dismissible fixed">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h3><i class="icon fa fa-check"></i> Success!</h3>
                  <h4>Product "'.$title.'" is Successfully Inserted.</h4>
                      
                </div>';
      }
    }
    // Else Block of (editid) end here
    
  }
  // IF Block of (submit) end here
  ?>
	      <!-- general form elements -->
	      <div class="box box-success">
	        <div class="box-header with-border">
	          <?php
                if(isset($_REQUEST['editid'])){
                  echo '<h3 class="box-title">Edit Product</h3>';
                }
                else{
                  echo '<h3 class="box-title">Add New Product</h3>';
              }
            ?>
	        </div>
	        <!-- /.box-header -->
	        <!-- form start -->
	        <form role="form" action="#" method='post' enctype="multipart/form-data">
	          <div class="box-body">
	          	<div class="form-group">
	          		<label>Select Category</label>
	          		<select class="form-control " id="catbox" name="category">
	          			
	          			<?php
	          				if(isset($_REQUEST['editid'])){
                      $sqlcatname='select catname from tblcategory where id='.$catid;
                      $resultcatname=mysqli_query($conn,$sqlcatname);
                      $rowcatname=mysqli_fetch_row($resultcatname);
	          					echo '<option value="'.$catid.'">'.$rowcatname['0'].' </option>';
                    }
                    else{
                      echo '<option value="-1" >Select Category</option>';
                    
          					while($row=mysqli_fetch_assoc($result)){
          						echo '
          							<option value="'.$row['id'].'"">'.$row['catname'].'</option>
          							';
	          				}}
	          			?>
	          		</select>
	          	</div>
	          	<div class="form-group">
	          		<label>Select Sub Category</label>
	          		<select class="form-control" id='subcatbox' name="subcategory">
	          			<?php
                      if(isset($_REQUEST['editid'])){
                      $sqlsubcatname='select subcatname from tblsubcategory where id='.$subcatid;
                      $resultsubcatname=mysqli_query($conn,$sqlsubcatname);
                      $rowsubcatname=mysqli_fetch_row($resultsubcatname);
                      echo '<option value="'.$subcatid.'">'.$rowsubcatname['0'].' </option>';
                      }else {
	          					echo '<option value="-1">Select Sub Category </option>';
          					   }
	          			?>
	          		</select>
              </div>
	          		<!-- Product Title Start -->
                <div class="form-group">
                  <label>Product Title</label>
                  <input type="text" class="form-control" placeholder="Enter Product Title" value="<?php if (isset($_REQUEST['editid'])) {
                    echo $ptitle;
                  }?>" name="producttitle" required>
                </div>
                <!--Product Title End-->
                <!--Product Description Start-->
                <div class="form-group">
                  <label>Product Description</label>
                  <textarea class="form-control" rows="3" placeholder="Enter Product Description" name="productdescription"><?php if(isset($_REQUEST['editid'])){ echo $description; }?></textarea>
                </div>
                <div class="form-group" id="sizes" name="sizes">
                	<?php 
                      if(isset($_REQUEST['editid'])){
                        if($quantity==0){
                          echo '<label> Total Quantity </label>
                                 <input class="form-control" type="text" name="totalunits" id="totalunits" value="'.$totalunits.'">';
                        }else{
                        $sqlsize='select size from tblsizechart where id='.$sizeid;
                        $resultsize=mysqli_query($conn,$sqlsize);
                        $rowsize=mysqli_fetch_row($resultsize);
                        $size=$rowsize['0'];
                        $sizearray=explode(',',$size);
                        $quantityarray=explode(',',$quantity);
                        $i=0;
                        while(!empty($sizearray[$i])){
                          echo '<label>Quantity for size '.$sizearray[$i].'</label><input class="form-control" type="text" value="'.$quantityarray[$i].'" name="size'.$i.'">';
                          $i++;
                        }
                        }
                      }
                  ?>
                </div>
                
                <!--Product Description End-->
                <!-- Product Price Start -->
                <div class="form-group">
                  <label>Product Price</label>
                  <input type="text" class="form-control" placeholder="Enter Price of Product" name="productprice" required value="<?php if (isset($_REQUEST['editid'])) { echo $price; }?>">
                </div>
                <!--Product Price End-->
                <!-- Product Offer Price Start -->
                <div class="form-group">
                  <label>Offer Price</label>
                  <input type="text" class="form-control" placeholder="Enter Offer Price of Product" name="offerprice" required value="<?php if (isset($_REQUEST['editid'])) { echo $offerprice; }?>">
                </div>
                <!--Product Pffer Price End-->
                <?php 
                if(isset($_REQUEST['editid'])){
                  echo '
                <div class="form-group imagebox">
                  <span class="close" id="close">&times;</span>
                  <div class="image" id="image"><img src="'.$path.$image.'">
                  </div>  
                  <div class="inputimage" id="inputimage">
                  <label for="exampleInputFile">Primary Image</label>
                  <input type="file" name="image" >
                  <p class="help-block">Select New Primary Image of Product
                  </p>      
                  </div>
                </div>
                <div class="form-group imagebox">
                  <span class="close" id="close1">&times;</span>
                  <div class="image" id="image1"><img src="'.$path.$image1.'">
                  </div>
                  <div class="inputimage" id="inputimage1">
                  <label for="exampleInputFile">Secondary Image 1</label>
                  <input type="file" class="file" id="exampleInputFile" name="image1">
                  <p class="help-block">Select New Secondary Image of Product
                  </p> 
                  </div>
                </div>
                <div class="form-group imagebox">
                  <span class="close" id="close2">&times;</span>
                  <div class="image" id="image2"><img src="'.$path.$image2.'">
                  </div>
                  <div class="inputimage" id="inputimage2">
                    <label for="exampleInputFile">Secondary Image 2</label>
                    <input type="file" id="example InputFile" name="image2">
                    <p class="help-block">Select New Secondary Image of Product
                    </p> 
                  </div>
                </div>
                <div class="form-group imagebox">
                  <span class="close" id="close3">&times;</span>
                  <div class="image" id="image3"><img src="'.$path.$image3.'">
                  </div>
                  <div class="inputimage" id="inputimage3">
                    <label for="exampleInputFile">Secondary Image 3</label>
                    <input type="file" id="exampleInputFile" name="image3">
                    <p class="help-block">Select New Secondary Image of Product
                    </p> 
                  </div>
                </div>
                      ';
                }
                else {
                  echo '
                <div class="form-group">
                  <label for="exampleInputFile">Primary Image</label>
                  <input type="file" id="exampleInputFile" id="image" name="image">

                  <p class="help-block">Select Primary Image of Product</p>
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">Secondary Image 1</label>
                  <input required="required" type="file" class="file" id="exampleInputFile" name="image1">

                  <p class="help-block">Select Secondary Image of Product</p>
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">Secondary Image 2</label>
                  <input type="file" id="example InputFile" name="image2">

                  <p class="help-block">Select Secondary Image of Product</p>
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">Secondary Image 3</label>
                  <input type="file" id="exampleInputFile" name="image3">

                  <p class="help-block">Select Secondary Image of Product</p>
                </div>
                      ';
                }
                ?>
            
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
include_once('footer.php');
?>

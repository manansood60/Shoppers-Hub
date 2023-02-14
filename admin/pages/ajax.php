<?php 
include_once('db_connect.php');
// To Return Subcategory values in <option>
if(isset($_POST['categoryId'])){
$categoryId = $_POST['categoryId'];
echo "<option value='-1'>Select Sub Category</option>";
$res=mysqli_query($conn,"select * from tblsubcategory WHERE catid= '$categoryId'"); 
        while($data=mysqli_fetch_assoc($res))
        {
        echo '<option value="'.$data['id'].'">'.$data['subcatname'].'</option>';
        }
}
// To Return <input> Boxex for Quantity
if(isset($_POST['subcategoryId'])){

	$subcategoryid=$_POST['subcategoryId'];
	$sqlsizeid="select sizeid from tblsubcategory where id=$subcategoryid";
	$resultsizeid=mysqli_query($conn,$sqlsizeid);
	$rowsizeid=mysqli_fetch_row($resultsizeid);
	$sizeid=$rowsizeid['0'];
	if(!($sizeid==1)){
	
		$querysize="select size from tblsizechart where id=$sizeid";
		$sizeresult=mysqli_query($conn,$querysize);
		$myrow=mysqli_fetch_row($sizeresult);
		$size=$myrow[0];
		$array=explode(",",$size);
		for($i=0;$i<sizeof($array);$i++){
			echo '<label> Quantity for Size "'.$array[$i].'"</label>
				<input class="form-control" type="text" name="size'.$i.'" onblur="quantity()" id="size'.$i.'">';
		}
	}
	else {
		echo '<label> Total Quantity </label>
				<input class="form-control" type="text" name="totalunits" id="totalunits">';
	}

}
?>
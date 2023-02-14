 <?php
  ob_start();
  $active="orders"; 
  $page="Orders";
  include_once('header.php');
  if($conn==false){
    die('Error, could not connect with the database');
  }
  $sql='select * from tblorder';
  $result=mysqli_query($conn,$sql) or die(mysqli_error($conn));

  // for Update function 
    if(isset($_REQUEST['submit'])){
       
        $id=$_REQUEST['id'];
        $status=$_REQUEST['status'];
        $order=$_REQUEST['ordernumber'];
        $sqlupdate='update tblorder set orderstatus="'.$status.'" where id='.$id;
        $result=mysqli_query($conn,$sqlupdate) or die(mysqli_error($conn));
        if($result){
            header('location:orders.php?updated="'.$order.'"');

        }
        else {
            echo 'Data has not Updated';

        }
    }
    if(isset($_REQUEST['updated'])){
      $updated=$_REQUEST['updated'];
        echo '<div class="alert alert-success alert-dismissible fixed">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h3><i class="icon fa fa-check"></i> Updated!</h3>
                <h4>Order '.$updated.' is Successfully Updated.</h4>
              </div>';
    }
  ?>
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Orders
   
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Orders</li>
  </ol>
</section>
<section class="content">
              
	<div class="row">
        <div class="col-xs-12">
          <div class="box box-success">
            <div class="box-header">
              <h3 class="box-title">Orders</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Order No.</th>
                  <th>Price</th>
                  <th>Payment Method</th>
                  <th>Status</th>
                  <th>Order Date</th>
                  <th>Operations</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    while($row=mysqli_fetch_assoc($result)){
                      $status=$row['orderstatus'];
                      echo '
                          <tr>
                            <form action="#" method="post">
                              <td>#'.$row['ordernumber'].'</td>
                              <td><i class="fa fa-rupee">'.$row['price'].'</i>
                              </td>
                              <td>'.$row['paymentmethod'].'</td>
                              <td>
                              <select name="status" class="form-control">
                              <option value="Ordered" '.(($status=='Ordered')?'selected="selected"':'').'>Ordered</option>
                              <option value="Shipped" '.(($status=='Shipped')?'selected="selected"':'').'>Shipped</option>
                              <option value="Cancelled" '.(($status=='Cancelled')?'selected="selected"':'').'>Cancelled</option>
                              <option value="Delivered" '.(($status=='Delivered')?'selected="selected"':'').'>Delivered</option>
                              </select>
                              </td>
                              <td>'.$row['orderdate'].'</td>

                              <td>
                                  <input type="hidden" value="'.$row['ordernumber'].'" name="ordernumber">
                                  <input type="hidden" value="'.$row['id'].'" name="id"> 
                                  <input type="submit" class="btn btn-success" name="submit" value="Update">
                              </td>
                            </form>
                          </tr>
                            ';
                    }

                ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
     </div>
</section>
<!-- /.content -->
<?php
include_once('footer.php');
?>
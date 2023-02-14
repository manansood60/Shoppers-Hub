 <?php
  ob_start();
  $active="messages"; 
  $page="Contact Messages";
  include_once('header.php');
  if($conn==false){
    die('Error, could not connect with the database');
  }
  $sql='select * from tblcontactenquiry';
  $result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
  // for DELETE function 
    if(isset($_REQUEST['deleteid'])){
       
        $deleteid=$_REQUEST['deleteid'];
        $sqlname='select name from tblcontactenquiry where id='.$deleteid;
        $result=mysqli_query($conn,$sqlname) or die(mysqli_error($conn));
        $row=mysqli_fetch_row($result);
        $name=$row['0'];
        $sql="delete from tblcontactenquiry where id=".$deleteid;
        $test=mysqli_query($conn,$sql) or die(mysqli_error($conn));
        if($test){
            header('location:messages.php?deleted='.$name);

        }
        else {
            echo 'Data has not deleted';

        }
    }
    if(isset($_REQUEST['deleted'])){
      $deleted=$_REQUEST['deleted'];
        echo '<div class="alert alert-danger alert-dismissible fixed">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h3><i class="icon fa fa-check"></i> Deleted!</h3>
                <h4>Message of "'.$deleted.'" is Successfully deleted.</h4>
              </div>';
    }
    ?>
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Subscribers
   
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Subscribers</li>
  </ol>
</section>
<section class="content">
              
	<div class="row">
        <div class="col-xs-12">
          <div class="box box-success">
            <div class="box-header">
              <h3 class="box-title">Subscribers</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>IP</th>
                  <th>Message</th>
                  <th>Date</th>
                  <th>Operations</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    while($row=mysqli_fetch_assoc($result)){
                      echo '<tr>
                              <td>'.$row['name'].'</td>
                              <td>'.$row['email'].'</td>
                              <td>'.$row['phone'].'</td>
                              <td>'.$row['ipaddress'].'</td>
                              <td>'.$row['message'].'</td>
                              <td>'.$row['date'].'</td>
                              <td> 
                                  <button class="btn btn-danger" href="#" data-href="messages.php?deleteid='.$row['id'].'" data-toggle="modal" data-target="#confirm-delete"><b>Delete</b>
                                  </button> 
                              </td>
                            </tr>';
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
<div class="example-modal">
                <div class="modal modal-danger" id="confirm-delete">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Confirm</h4>
                      </div>
                      <div class="modal-body">
                        <p>Do you want to delete ?</p>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cancel</button>
                        
                        <a id="confirm" class="btn btn-outline">Confirm</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
<?php
include_once('footer.php');
?>
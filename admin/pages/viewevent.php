<?php
  ob_start(); 
  $active="events";
  $page="View Event";
  include_once('header.php');
  if($conn==false){
    die('Error, could not connect with the database');
  }
  $sql='select * from tblevent';
  $result=mysqli_query($conn,$sql) or die(mysqli_error($conn));

  // for DELETE function 
    if(isset($_REQUEST['deleteid'])){
       
        $deleteid=$_REQUEST['deleteid'];
        $sql='select * from tblevent where id='.$deleteid;
        $result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
        $row=mysqli_fetch_row($result);
        $title=$row['1'];
        $path="../../images/";
        $image=$row['6'];
        $deleted=unlink($path.$image);
        $sqldelete="delete from tblevent where id=".$deleteid;
        $test=mysqli_query($conn,$sqldelete) or die(mysqli_error($conn));
        if($test){
            header('location:viewevent.php?deletedname="'.$title.'"');

        }
        else {
            echo 'Data has not deleted';

        }
    }
    if(isset($_REQUEST['deletedname'])){
      $deleted=$_REQUEST['deletedname'];
        echo '<div class="alert alert-danger alert-dismissible fixed">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h3><i class="icon fa fa-check"></i> Deleted!</h3>
                <h4>Product '.$deleted.' is Successfully deleted.</h4>
              </div>';
    }
  // for EDIT function 
    if(isset($_REQUEST['editname'])){
      $editname=$_REQUEST['editname'];
      
      echo '<div class="alert alert-success alert-dismissible fixed">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h3><i class="icon fa fa-check"></i> Success!</h3>
                <h4>Event "'.$editname.'" is Successfully edited.</h4>
              </div>';
    }


  ?>
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    View Events
   
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">View Events</li>
  </ol>
</section>
<section class="content">
              
	<div class="row">
        <div class="col-xs-12">
          <div class="box box-success">
            <div class="box-header">
              <h3 class="box-title">View Events</h3>
            </div>
            <!-- /.box-header -->
            
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Title</th>
                  <th>Description</th>
                  <th>Offer Discount</th>
                  <th>Start Date</th>
                  <th>End Date</th>
                  <th>Image</th>
                  <th>Operations</th>
                
                </tr>
                </thead>
                <tbody>
                <?php
                    while($row=mysqli_fetch_assoc($result)){
                      echo '<tr>
                              <td>'.$row['etitle'].'</td>
                              <td>'.$row['edescription'].'</td>
                              <td>'.$row['eofferdiscount'].'</td>
                              <td>'.$row['estartdate'].'</td>
                              <td>'.$row['eenddate'].'</td>
                              <td><img src="../../images/events/'.$row['eimage'].'" height="100px" title="'.$row['etitle'].'"  alt="Main Image"></td>
                              <td><a href="addevent.php?editid='.$row['id'].'"> 
                                  <button class="btn btn-success" style="padding: 6px 20px; margin-right:30px;"><b>Edit</b></button> </a>
                                  '.'
                                  <button class="btn btn-danger" href="#" data-href="viewevent.php?deleteid='.$row['id'].'" data-toggle="modal" data-target="#confirm-delete"><b>Delete</b>
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

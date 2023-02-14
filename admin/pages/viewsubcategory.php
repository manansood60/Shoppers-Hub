<?php
  ob_start();
  $active="subcategory"; 
  $page="View Sub-Category";
  include_once('header.php');
  if($conn==false){
    die('Error, could not connect with the database');
  }
  $sql='select * from tblsubcategory';
  $result=mysqli_query($conn,$sql) or die(mysqli_error($conn));

  // for DELETE function 
    if(isset($_REQUEST['deleteid'])){
       
        $delete=$_REQUEST['deleteid'];
        $sqlname='select subcatname from tblsubcategory where id='.$delete;
        $result=mysqli_query($conn,$sqlname) or die(mysqli_error($conn));
        $row=mysqli_fetch_row($result);
        $name=$row['0'];
        $sql="delete from tblsubcategory where id=".$delete;
        $test=mysqli_query($conn,$sql) or die(mysqli_error($conn));
        if($test){
            header('location:viewsubcategory.php?deletedname="'.$name.'"');

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
                <h4>Sub Category '.$deleted.' is Successfully deleted.</h4>
              </div>';
    }
  // for EDIT function 
    if(isset($_REQUEST['editname'])){
      $editname=$_REQUEST['editname'];
      
      echo '<div class="alert alert-success alert-dismissible fixed">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h3><i class="icon fa fa-check"></i> Success!</h3>
                <h4>Sub Category "'.$editname.'" is Successfully edited.</h4>
              </div>';
    }


  ?>
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    View Sub Category
   
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">View Sub Category</li>
  </ol>
</section>
<section class="content">
              
	<div class="row">
        <div class="col-xs-12">
          <div class="box box-success">
            <div class="box-header">
              <h3 class="box-title">Sub Categories</h3>
            </div>
            <!-- /.box-header -->
            
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Category Name</th>
                  <th>Status</th>
                  <th>Operations</th>
                
                </tr>
                </thead>
                <tbody>
                <?php
                    while($row=mysqli_fetch_assoc($result)){
                      $sqlcatnamequerry="select catname from tblcategory where id=".$row['catid'];
                      $result2=mysqli_query($conn,$sqlcatnamequerry) or die(mysqli_error($conn));
                      $row2=mysqli_fetch_row($result2);
                      echo '<tr>
                              <td>'.$row['id'].'</td>
                              <td>'.$row['subcatname'].'</td>
                              <td>'.$row2['0'].'</td>
                              <td>'.$row['subcatstatus'].'</td>
                              <td><a href="addsubcategory.php?editid='.$row['id'].'"> 
                                  <button class="btn btn-success" style="padding: 6px 20px; margin-right:30px;"><b>Edit</b></button> </a>
                                  '.'
                                  <button class="btn btn-danger" href="#" data-href="viewsubcategory.php?deleteid='.$row['id'].'" data-toggle="modal" data-target="#confirm-delete"><b>Delete</b>
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

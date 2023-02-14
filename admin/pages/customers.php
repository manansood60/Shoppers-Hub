 <?php
  ob_start();
  $active="customers"; 
  $page="Customers";
  include_once('header.php');
  if($conn==false){
    die('Error, could not connect with the database');
  }
  $sql='select * from tbluser';
  $result=mysqli_query($conn,$sql) or die(mysqli_error($conn));

  // for DELETE function 
    if(isset($_REQUEST['deleteid'])){
       
        $delete=$_REQUEST['deleteid'];
        $sqlname='select catname from tblcategory where id='.$delete;
        $result=mysqli_query($conn,$sqlname) or die(mysqli_error($conn));
        $row=mysqli_fetch_row($result);
        $name=$row['0'];
        $sql="delete from tblcategory where id=".$delete;
        $test=mysqli_query($conn,$sql) or die(mysqli_error($conn));
        if($test){
            header('location:viewcategory.php?deletedname="'.$name.'"');

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
                <h4>Category '.$deleted.' is Successfully deleted.</h4>
              </div>';
    }
  // for EDIT function 
    if(isset($_REQUEST['editid'])){
      $editid=$_REQUEST['editid'];
      $sqlsuccessquery='select catname from tblcategory where id='.$editid;
      $sqlsuccessname=mysqli_query($conn,$sqlsuccessquery) or die(mysqli_error($conn));
      $row=mysqli_fetch_row($sqlsuccessname);
      echo '<div class="alert alert-success alert-dismissible fixed">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h3><i class="icon fa fa-check"></i> Success!</h3>
                <h4>Category "'.$row['0'].'" is Successfully edited.</h4>
              </div>';
    }


  ?>
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Customers  
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Customers</li>
  </ol>
</section>
<section class="content">
              
	<div class="row">
        <div class="col-xs-12">
          <div class="box box-success">
            <div class="box-header">
              <h3 class="box-title">Customers</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Address</th>
                  <th>Phone</th>
                  <th>Gender</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    while($row=mysqli_fetch_assoc($result)){
                      echo '<tr>
                              <td>
                                '.$row['userfname'].' '.$row['userlname'].'
                              </td>
                              <td>'.$row['useremail'].'</td>
                              <td>
                                '.$row['useraddress'].', '.$row['userlandmark'].'<p>'.$row['userstate'].', '.$row['usercity'].', '.$row['userpincode'].', 
                                india. </p>
                              </td>
                              <td>'.$row['userphone'].'</td>
                              <td>'.$row['usergender'].'</td>
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
<?php
include_once('footer.php');
?>
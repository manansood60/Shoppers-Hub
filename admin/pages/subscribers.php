 <?php
  ob_start();
  $active="subscribers"; 
  $page="Subscribers";
  include_once('header.php');
  if($conn==false){
    die('Error, could not connect with the database');
  }
  $sql='select * from tblsubscribe';
  $result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
  // for Update function 
    if(isset($_REQUEST['submit'])){
       
        $id=$_REQUEST['id'];
        $status=$_REQUEST['status'];
        $email=$_REQUEST['email'];
        $sqlupdate='update tblsubscribe set status="'.$status.'" where id='.$id;
        $result=mysqli_query($conn,$sqlupdate) or die(mysqli_error($conn));
        if($result){
            header('location:subscribers.php?updated="'.$email.'"');

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
                <h4>Subscriber '.$updated.' is Successfully Updated.</h4>
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
                  <th>ID</th>
                  <th>Email</th>
                  <th>Status</th>
                  <th>Join Date</th>
                  <th>Operations</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    while($row=mysqli_fetch_assoc($result)){
                      $status=$row['status'];
                      echo '<tr>
                      <form action="#" method="post">
                              <td>'.$row['id'].'</td>
                              <td>'.$row['subemail'].'</td>
                              <td>'.$row['createdate'].'</td>
                              <td>
                              <select name="status" class="form-control">
                              <option value="Subscribed" '.(($status=='Subscribed')?'selected="selected"':'').'>Subscribed</option>
                              <option value="Unsubscribed" '.(($status=='Unsubscribed')?'selected="selected"':'').'>Unsubscribed</option>
                              </select>
                              </td>
                              <td>
                                  <input type="hidden" value="'.$row['subemail'].'" name="email">
                                  <input type="hidden" value="'.$row['id'].'" name="id"> 
                                  <input type="submit" class="btn btn-success" name="submit" value="Update">
                              </td>
                          </form>
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
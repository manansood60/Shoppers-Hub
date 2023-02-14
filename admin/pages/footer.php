  </div>
  <!-- Content Wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.3.3
    </div>
    <strong>Copyright &copy; 2014-2015 <a href="#">Manan Kumar</a>.</strong> All rights
    reserved.
  </footer>

  
      

</div>
<!-- ./wrapper -->


<!-- jQuery 2.2.0 -->
<script src="../plugins/jQuery/jQuery-2.2.0.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="../bootstrap/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/app.min.js"></script>
<!-- Sparkline -->
<script src="../plugins/sparkline/jquery.sparkline.min.js"></script>

<!-- SlimScroll 1.3.0 -->
<script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS 1.0.1 -->
<script src="../plugins/chartjs/Chart.min.js"></script>
<!-- CK Editor -->
<script src="../plugins/ckeditor/ckeditor.js"></script>

<!-- DataTables -->
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<!-- page script -->

<script type="text/javascript">
  //ajax function to load the sub category combo box on category combo box selection
      $(document).ready(function(){
    //To send CategoryId and receiving Subcategories IN ADDPRODUCT
    $('#catbox').on("change",function () {
        var categoryId = $(this).find('option:selected').val();
        
        $.ajax({
            url: "ajax.php",
            type: "POST",
            data: "categoryId="+categoryId,
            success: function (response) {
                console.log(response);
                $("#subcatbox").html(response);
            },
        });
    });
    //To Send SubCategoryId and receiving input fields for quantity in ADDPRODUCT
    $('#subcatbox').on("change",function () {
        var subcategoryId = $(this).find('option:selected').val();
        $.ajax({
            url: "ajax.php",
            type: "POST",
            data: "subcategoryId="+subcategoryId,
            success: function (response) {
                console.log(response);
                $("#sizes").html(response);
                

            },
        });
    });
    // Script to Fade away image on clicking close while editing IN ADDPRODUCT
    $("#close").click(function () {
          $("#image").fadeOut();
          $(this).fadeOut();
        });
    $("#close1").click(function () {
          $("#image1").fadeOut();
          $(this).fadeOut();
        });
    $("#close2").click(function () {
          $("#image2").fadeOut();
          $(this).fadeOut();
        });
    $("#close3").click(function () {
          $("#image3").fadeOut();
          $(this).fadeOut();
        });

    // Script to Fade away image on clicking close while editing event,banner
    $("#closeimg").click(function () {
          $("#image").fadeOut();
          $(this).fadeOut();
        });

    // Script to handle confirm-delete dialog box
    $('#confirm-delete').on('show.bs.modal',function(e){
      $(this).find('#confirm').attr('href',$(e.relatedTarget).data('href'));
    });


    //Script for Tables
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
  // Script for Text-Editors
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1')
    //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5()
  });

  });
  // Script Used in Change Password
  var password="<?php echo $password; ?>"
  function passwordcheck(){
    var oldpassword=document.getElementById('oldpassword').value;
    if(!(password==oldpassword)){
      document.getElementById('passwordcheck').innerHTML="Entered Password is incorrect.";
    }
    else{
      document.getElementById('passwordcheck').innerHTML="";
    }
  }
  function matchpassword(){
    var password1=document.getElementById('newpassword').value;
    var password2=document.getElementById('confirmpassword').value;
    if(!(password1==password2)){
      document.getElementById('matchpassword').innerHTML="Entered Password Did not Match.";
    }
    else {
      document.getElementById('matchpassword').innerHTML="";
    }
  } 



</script>

</body>
</html>
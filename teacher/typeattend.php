<?php   include "../resources/php/sql.php"; session_start(); ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>TEACHER</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="../plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="../plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="../plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> 
  
</head>
<body class="hold-transition sidebar-mini layout-navbar-fixed">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
   <?php include "navTeacher.php"; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Attendance</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
        <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
            <div class="row">
          <div class="col-12">
            <div class="card">
              
              <!-- /.card-header -->
              <div>
                <form method="POST" enctype="multipart/form-data">

                  <?php 
                   $attendance_id = $_SESSION['attendance_id'];
                   $student_id = $_SESSION['student_id'];
                   $date = $_SESSION['date'];


                    $result = displaystudentAttendanceByID($student_id, $attendance_id);
                    $row = mysqli_fetch_assoc($result);

                  ?>


                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputName">Name</label>
                    <input type="name" class="form-control" id="exampleInputname" value="<?php echo $row['student_name']; ?>" readonly>
                  </div>                
                  <div class="form-group">
                    <label for="exampleInputFile">File upload</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input id="image" name="image" type="file" class="custom-file-input"  >
                        <label class="custom-file-label" for="customFile">Choose File If MC</label>
                      </div>
                      
                    </div>
                  </div>
                <div class="form-group">
                  <label>Reason</label>
                  <select class="form-control select2" id="option" name="option" data-placeholder="Select" style="width: 100%;">
                    <option value="Medical Leave">Medical Leave</option>
                    <option value="Attend Late">Attend Late</option>
                  </select>
                </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button id="insert" name="insert" type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>

               
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
  
      </div>
    </section>



    <!-- DISPLAY IMAGE -->
<!-- 
    <section class="content">
      <?php 
// Include the database configuration file  
      require '/../connectDB.php';

 
// Get image data from database 
$result = $conn->query("SELECT * FROM attendance WHERE attendance_id = 50"); 
?>

<?php if($result->num_rows > 0){ ?> 
    <div class="gallery"> 
        <?php while($row = $result->fetch_assoc()){ ?> 
            <img style="height: 100px; width: 100px;" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['attendance_img']); ?>" /> 
        <?php } ?> 
    </div> 
<?php }else{ ?> 
    <p class="status error">Image(s) not found...</p> 
<?php } ?>
    </section>
     -->

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php include "footer.php"; ?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- bs-custom-file-input -->
<script src="../plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
</body>
</html>




 <script type="text/javascript">
$(document).ready(function () {
  bsCustomFileInput.init();
});
</script>

<script>  
 $(document).ready(function(){  
      $('#insert').click(function(){
        var option = $('#option').val();
           if (option == 'Medical Leave') {
              var image_name = $('#image').val();  
           if(image_name == '')  
           {  
                alert("Please Select Image");  
                return false;  
           }  
           else  
           {  
                var extension = $('#image').val().split('.').pop().toLowerCase();  
                if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)  
                {  
                     alert('Invalid Image File');  
                     $('#image').val('');  
                     return false;  
                }  
           } 
           } else {
              var image_name = $('#image').val(); 
              if (image_name != '') {
                alert("Attend Late Cant Have Image");
                return false; 
              }
           }  
            
      });  
 });  
 </script> 


 <?php 
if (isset($_POST['insert'])) {
  
   require '/../connectDB.php';
   $option = $_POST['option'];

   $student_id = $_SESSION['student_id'];

   if ($option==="Medical Leave") {

    $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"])); 

    $query = "UPDATE attendance SET attendance_img = '$file', attend_status = 'Medical Leave' WHERE attendance_id = ". $attendance_id;
    if(mysqli_query($conn, $query))  
      {  
           echo "<script>alert('Successfully Update Student Attendance');window.location.href='teacherstudattend.php';</script>";  
      }  
      else
      {
        echo '<script>alert("Failed To Update The Attendance")</script>';  
      }

   
     
   } else if($option==="Attend Late") {

     $query = "UPDATE attendance SET attend_status = 'Attend Late' WHERE attendance_id = ". $attendance_id;
     if(mysqli_query($conn, $query))  
      {   
           echo "<script>alert('Successfully Update Student Attendance');
            window.location.href='teacherstudattend.php';
            </script>";
      }  
      else
      {
       echo '<script>alert("Failed To Update The Attendance")</script>';  
      }
   } 
}

 ?>
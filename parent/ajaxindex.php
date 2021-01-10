<?php  
 $connect = mysqli_connect("localhost", "root", "", "oas"); 
 session_start();
 $student_id= $_SESSION['student_id'];

 $query = "SELECT * FROM attendance INNER JOIN student ON attendance.student_id = student.student_id INNER JOIN class ON student.class_id = class.class_id WHERE attendance.student_id = '$student_id'";  
 $result = mysqli_query($connect, $query);  
 ?>  

 <!DOCTYPE html>  
 <html>  
      <head>  


          <meta charset="utf-8">
          <meta http-equiv="X-UA-Compatible" content="IE=edge">
          <title>Attendance</title>
          <!-- Tell the browser to be responsive to screen width -->
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <!-- Font Awesome -->
          <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
          <!-- DataTables -->
          <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
          <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
          <!-- Ionicons -->
          <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
          <!-- daterange picker -->
          <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">
          <!-- Bootstrap4 Duallistbox -->
          <link rel="stylesheet" href="../plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
          <!-- Theme style -->
          <link rel="stylesheet" href="../dist/css/adminlte.min.css">
          <!-- Google Font: Source Sans Pro -->
          <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">


           
           <title>Student</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>  
          <!-- Taleh pakai -->
         <!--   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />   -->
           <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>  
            <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
           <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
       
      </head>  
      <body class="hold-transition sidebar-mini layout-navbar-fixed">
      <!-- Site wrapper -->
      <div class="wrapper">
        <?php  include "navParent1.php"; ?>


        <div class="content-wrapper">
          <section class="content-header">
            <div class="container-fluid">
              <div class="row mb-2">
                <div class="col-sm-6">
                  <h1>List of Student Attendance</h1>
                </div>
              </div>
            </div>
          </section>

          <!-- Main content -->
          <section class="content">
            <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                  <div class="card">
                  <br>
                     <div class="card-body table-responsive p-0" >
                      <table class="table table-head-fixed text-nowrap">
                   
                        <div class="col-md-2">  
                             <input type="text" name="from_date" id="from_date" class="form-control" placeholder="From Date" /> 
                             
                        </div> <br>
                        <div class="col-md-2">  
                              <input type="text" name="to_date" id="to_date" class="form-control" placeholder="To Date" />  
                        </div> <br>

                        <div class="col-md-2">
                          <select name="status" id="status" class="form-control">
                            <option value="Status" hidden>Status</option>
                            <option value="All">All</option>
                            <option value="Attend">Attend</option>
                            <option value="Attend Late">Attend Late</option>
                            <option value="Absent">Absent</option>
                            <option value="Medical Leave">Medical Leave</option>
                          </select>
                        </div><br>

                        <div class="col-md-5">  
                             <input type="button" name="filter" id="filter" value="Filter" class="btn btn-info" />  
                        </div>  
                        <div style="clear:both"></div> <br />  
                    
                    <div id="order_table">  
                         <table class="table table-bordered" id="table" 
                         >  
                              <tr>  
                                   <th width="5%">Date</th>
                                   <th width="5%">ID</th>  
                                   <th width="30%">Name</th>  
                                   <th width="43%">IC NUMBER</th>  
                                   <th width="10%">Class</th>  
                                   <th width="12%">Status</th>  
                              </tr>  
                         <?php  
                         while($row = mysqli_fetch_array($result))  
                         {  
                         ?>  
                              <tr>  
                                   <td><?php echo $row["dates"]; ?></td>  
                                   <td><?php echo $row["student_id"]; ?></td>  
                                   <td><?php echo $row["student_name"]; ?></td>  
                                   <td><?php echo $row["student_ic"]; ?></td>  
                                   <td><?php echo $row["class_name"]; ?></td>  
                                   <td><?php echo $row["attend_status"]; ?></td>  
                              </tr>  
                         <?php  
                         }  
                         ?>  
                         </table>  
                         
                    </div>  
                  </div> 

                </div>
              </div>
            </div>
           </section>

        </div>
      </div>    
          
      </body>  


      <!-- jQuery -->
<!-- <script src="../plugins/jquery/jquery.min.js"></script> -->
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
 </html>  
 

<script>  
      $(document).ready(function(){  
           $.datepicker.setDefaults({  
                dateFormat: 'yy-mm-dd'   
           });  
           $(function(){  
                $("#from_date").datepicker();  
                $("#to_date").datepicker(); 
               $("#status").val();
           });  
           $('#filter').click(function(){  
                var from_date = $('#from_date').val();var to_date = $('#to_date').val();  
                var status = $('#status').val(); 

                if(from_date != '' && to_date != '' && status != '')  
                {  
                  console.log(status);
                     $.ajax({  
                          url:"ajaxfilter.php",  
                          method:"POST",  
                          data:{from_date:from_date, to_date:to_date, status:status},  
                          success:function(data)  
                          {  
                               document.getElementById("table").innerHTML = data; 
                          }  
                     });  
                }  
                else  
                {  
                     alert("Please Select Date");  
                }  
           });  
      });  
 </script>





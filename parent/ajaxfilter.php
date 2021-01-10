
<?php  
 //filter.php  
session_start();
$student_id= $_SESSION['student_id'];

 if(isset($_POST["from_date"], $_POST["to_date"], $_POST["status"]))  
 {  
      $connect = mysqli_connect("localhost", "root", "", "oas");  
      $output = '';  
      if ($_POST["status"]!="All") {
      $query = "  
            SELECT * FROM attendance INNER JOIN student ON attendance.student_id = student.student_id INNER JOIN class ON student.class_id = class.class_id WHERE attendance.student_id = '$student_id' AND attendance.attend_status = '".$_POST["status"]."' AND dates BETWEEN '".$_POST["from_date"]."' AND '".$_POST["to_date"]."'"; 
      } else{
        $query = "  
            SELECT * FROM attendance INNER JOIN student ON attendance.student_id = student.student_id INNER JOIN class ON student.class_id = class.class_id WHERE attendance.student_id = '".$student_id."'"; 
      } 
      $result = mysqli_query($connect, $query);  
      $output .= '  
           <table class="table table-bordered">  
                <tr>  
                    <th width="5%">Date</th>
                    <th width="5%">ID</th>  
                    <th width="30%">Name</th>  
                    <th width="43%">IC NUMBER</th>  
                    <th width="10%">Class</th>  
                    <th width="12%">Status</th>    
                </tr>  
      ';  
      if(mysqli_num_rows($result) > 0)  
      {  
           while($row = mysqli_fetch_array($result))  
           {  
                $output .= '  
                     <tr>  
                          <td>'. $row["dates"] .'</td> 
                          <td>'. $row["student_id"] .'</td>  
                          <td>'. $row["student_name"] .'</td>  
                          <td>'. $row["student_ic"] .'</td>  
                          <td>'. $row["class_name"] .'</td>  
                          <td>'. $row["attend_status"] .'</td>  
                     </tr>  
                ';  
           }  
      }  
      else  
      {  
           $output .= '  
                <tr>  
                     <td colspan="5">No Order Found</td>  
                </tr>  
           ';  
      }  
      $output .= '</table>';  
      echo $output;  
 }  
 ?>
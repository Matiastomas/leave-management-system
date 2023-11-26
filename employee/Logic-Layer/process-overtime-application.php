<?php
require_once("database-connection.php");
session_start();
$conn;

if(isset($_REQUEST['submit'])) {
      

    // Retrieve data from the form
      // Get form input values
   $EmployeeName= $_SESSION['name'];
    $reason = $_POST['reason'];
    $date = $_POST['date'];
    $startTime = $_POST['startTime'];
    $endTime = $_POST['endTime'];
    $publish_at =  date('y/m/d');
       
        $query = "INSERT into overtime_application (reason, application_date, starttime, end_time, employee_name, publish_at) 
        VALUES('$reason', '$date', '$startTime', '$endTime', '$EmployeeName', '$publish_at')";

        if (mysqli_query($conn, $query)) {
           
            echo "<p style='color:green'>Application Submitted Successfully</p>";
            header("Location:view-overtime-applications-report.php");
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($conn);
        }

        // Close the database connection
        mysqli_close($conn);
  
} 
?>

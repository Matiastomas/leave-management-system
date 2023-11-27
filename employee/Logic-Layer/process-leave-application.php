<?php
require_once("database-connection.php");
session_start();
$conn;

if(isset($_REQUEST['submit'])) {
    
   // Get form input values
   $EmployeeName= $_SESSION['name'];
    // Retrieve data from the form
    $start_date = $_POST["start_date"];
    $end_date = $_POST["end_date"];
    $days = $_POST["days"];
    $leave_type = $_POST["leave_type"];
    $publish_at =  date('y/m/d');

    if ($leave_type == "vacation_leave") {

        updateVacationLeaveDays($conn, $start_date, $end_date, $days, $leave_type, $publish_at, $EmployeeName);
        
    } elseif ($leave_type == "compassionate_leave") {
        
        updateCompassionateLeave($conn, $start_date, $end_date, $days, $leave_type, $publish_at, $EmployeeName);
    }else{

    // Insert leave application details
    $query = "INSERT into leave_application (startdate, enddate, leave_type, employee_name, application_date, numDays) 
    VALUES('$start_date', '$end_date', '$leave_type', '$EmployeeName', '$publish_at','$days')";

    if (mysqli_query($conn, $query)) {
        echo "<p style='color:green'>Application Submitted Successfully</p>";
        header("Location:view-Leave-applications-report.php");
    } else {
        // Handle errors
        // echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
    }
  

}

function updateVacationLeaveDays($conn, $start_date, $end_date, $days, $leave_type, $publish_at, $EmployeeName){

    // Retrieve vacation leave days for the employee
    $vacation_leave_query = "SELECT vacation_leave FROM `employee` WHERE username = '$EmployeeName'";
    $result = mysqli_query($conn, $vacation_leave_query);
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $vacation_leave = $row['vacation_leave'];
        // Calculate remaining vacation leave days
        $remainingVacationLeaveDays = $vacation_leave - $days;

        if($remainingVacationLeaveDays < 0 || $remainingVacationLeaveDays == 0){
        
            echo '<script type="text/javascript">alert("All your 25 days for vacation leave have been used."); window.location="Leave-Application-Form.php";</script>';
                         // Update vacation_leave for the employee
        $update_query = "UPDATE employee SET vacation_leave = 0 WHERE username = '$EmployeeName'";
        mysqli_query($conn, $update_query);
            exit(); // Stop further execution


            
    }else{

        // Update vacation_leave for the employee
        $update_query = "UPDATE employee SET vacation_leave = '$remainingVacationLeaveDays' WHERE username = '$EmployeeName'";
        mysqli_query($conn, $update_query);

         // Insert leave application details
$query = "INSERT into leave_application (startdate, enddate, leave_type, employee_name, application_date, numDays) 
VALUES('$start_date', '$end_date', '$leave_type', '$EmployeeName', '$publish_at','$days')";
   if (mysqli_query($conn, $query)) {
   
    echo "<p style='color:green'>Application Submitted Successfully</p>";
    header("Location:view-Leave-applications-report.php");
} else {
    // Handle errors
    // echo "Error: " . $query . "<br>" . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
    }
}
}

function updateCompassionateLeave ($conn, $start_date, $end_date, $days, $leave_type, $publish_at, $EmployeeName){

    // Retrieve compassionate leave days for the employee
    $compassionate_leave_query = "SELECT compassionate_leave FROM `employee` WHERE username = '$EmployeeName'";
    $result = mysqli_query($conn, $compassionate_leave_query);
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $compassionate_leave = $row['compassionate_leave'];

        // Calculate remaining compassionate leave days
        $remainingCompassionateLeaveDays = $compassionate_leave - $days;

        if( $remainingCompassionateLeaveDays  < 0 ||  $remainingCompassionateLeaveDays  == 0){

            echo '<script type="text/javascript">alert("All your 10 days for compassionate leave have been used."); window.location="Leave-Application-Form.php";</script>';
                   
        // Update compassionate_leave for the employee
        $update_query = "UPDATE employee SET compassionate_leave = 0 WHERE username = '$EmployeeName'";
        mysqli_query($conn, $update_query);
            exit(); // Stop further execution
      
    }else{

        
        // Update compassionate_leave for the employee
        $update_query = "UPDATE employee SET compassionate_leave = '$remainingCompassionateLeaveDays' WHERE username = '$EmployeeName'";
        mysqli_query($conn, $update_query);

        // File upload handling
    $targetDirectory = "uploads/"; // Directory where files will be uploaded
    $uploadedFileName = $_FILES['certificate']['name']; // Get the name of the uploaded file
    

    // Check if file was uploaded without errors
    if (move_uploaded_file($_FILES['certificate']['tmp_name'], $targetFilePath)) {
     
        $query = "INSERT into leave_application (startdate, enddate, leave_type, employee_name, application_date, numDays, certificate_path) 
VALUES('$start_date', '$end_date', '$leave_type', '$EmployeeName', '$publish_at','$days','$uploadedFileName')";
 if (mysqli_query($conn, $query)) {
    echo "<p style='color:green'>Application Submitted Successfully</p>";
    header("Location:view-Leave-applications-report.php");
} else {
    // Handle errors
    // echo "Error: " . $query . "<br>" . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
    }
      
         // Insert leave application details

    }
    }

}
?>

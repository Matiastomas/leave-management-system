<?php
session_start();
require_once('database-connection.php');

// Process login method
if (isset($_POST['username'])) {
    $userName = $_POST['username'];
    $passWord = $_POST['password'];
    $userType = $_POST['user'];

    if ($userType == "employee") {
  
      
      // Select student number and password from student_account table
      $sql = "SELECT * FROM  employee WHERE username='$userName' AND employee_password ='$passWord'";
      $result = mysqli_query($conn, $sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
   
   $count = mysqli_num_rows($result);
   
   // If result matched $myusername and $mypassword, table row must be 1 row
     
   if($count == 1) {
   
       
    $_SESSION['id'] = $row['employee_id'];
    $_SESSION['name'] = $row['username'];
    echo "<script>alert('Login Successful'); window.location.href='employee/index.php';</script>";
   //header("Location:student-module/home-page.php");

   }else {

    echo "Debug Info: Count = $count"; // Print the count for debugging
    echo "<script>alert('Your Login Name or Password is invalid'); window.location.href='index.php';</script>";
   }

     

        }else if($userType == "hr_manager"){
        $sql = "SELECT * FROM hr_manager WHERE username ='$userName' AND hr_mangerpassword ='$passWord'";
        $result = mysqli_query($conn, $sql);

        if (!$result) {
            // Handle SQL query error
            echo "SQL Error: " . mysqli_error($conn);
        } else {
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
            $count = mysqli_num_rows($result);

            if ($count == 1) {
                $_SESSION['admin_name'] = $row['username'];
                echo "<script>alert('Login Successful'); window.location.href='hr-manager/index.php ';</script>";
            } else {
                echo "<script>alert('Your Login Name or Password is invalid'); window.location.href='index.php';</script>";
            }
        }
    }
}
?>

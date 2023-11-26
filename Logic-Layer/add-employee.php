<?php
require_once("database-connection.php");

$conn;

if(isset($_REQUEST['submit'])) {
        // Get form input values
        $username = $_POST["username"];
        $password = $_POST["employeePassword"];
        $department = $_POST["department"];
        $employmentNumber = $_POST["employmentNumber"];
        $contact = $_POST["contact"];

       
        $query = "INSERT into employee (username, employee_password, department, employmentNumber, contact) 
        VALUES('$username', '$password', '$department', '$employmentNumber', '$contact')";

        if (mysqli_query($conn, $query)) {
            echo "<p style='color:green'>New Employee Added Successfully</p>";
            echo  "$username $password $department$employmentNumber$contact";
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($conn);
        }

        // Close the database connection
        mysqli_close($conn);
  
} else {
    echo "Database connection failed!";
}
?>

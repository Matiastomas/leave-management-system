<?php

require_once("database-connection.php");

 $conn;

if(isset($_REQUEST['id']) && !empty($_POST["id"])){
   
  
// Get StudentTOPICID  from hidden input 
//Get Accet/rejct value from select
//Get Comments
    
$Id = $_POST["id"];

if (!empty($Id)){
    
    $sql = "DELETE FROM employee WHERE employee_id ='$Id'";
    
      if (mysqli_query($conn, $sql)) {
        
        echo "Records were deleted successfully.";
        header("location:manage-employee-accounts.php");
        
    
        exit();

      } else {
        echo "Error deleting record: " . mysqli_error($conn);
      }
      
      mysqli_close($conn);
     
          
    }
   
} 

?>
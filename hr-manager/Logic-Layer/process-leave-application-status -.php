<?php

require_once("database-connection.php");

 $conn;

if(isset($_REQUEST['id']) && !empty($_POST["id"])){
   
  
// Get StudentTOPICID  from hidden input 
//Get Accet/rejct value from select
//Get Comments
    
$Id = $_POST["id"];
$Status = $_POST ["status"];
$comment = $_POST ['comment'];
  if (!empty($Status)){
    
      $sql = "UPDATE leave_application SET Leavestatus='$Status', hr_manager_comments='$comment' WHERE leave_id ='$Id'";

      if (mysqli_query($conn, $sql)) {
        
        header("location:view-Leave-applications-report.php");
    
        exit();

      } else {
        echo "Error updating record: " . mysqli_error($conn);
      }
      
      mysqli_close($conn);
     
          
    }
   
} 

?>
<?php

require_once("database-connection.php");

 $conn;

if(isset($_REQUEST['id']) && !empty($_POST["id"])){
   
  
// Get StudentTOPICID  from hidden input 
//Get Accet/rejct value from select
//Get Comments
    
$incidentId = $_POST["id"];
$Status = $_POST ["incidentstatus"];
$comment = $_POST ['comment'];
  if (!empty($Status)){
    
      $sql = "UPDATE incidents SET Incidentstatus ='$Status', Comments='$comment' WHERE incident_id='$incidentId'";

      if (mysqli_query($conn, $sql)) {
        
        header("location:incident-reports.php");
    
        exit();

      } else {
        echo "Error updating record: " . mysqli_error($conn);
      }
      
      mysqli_close($conn);
     
          
    }
   
} 

?>
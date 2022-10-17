<?php
   require_once("library.php");
    
   
   $sql = new mySQL();
   $conn = $sql->dbConnect();
   $id =  $_POST['html'];
   if($conn !=-1){
      $result = $sql->delete($id);

      if ($result == 1) {
         echo json_encode(1);
         exit();
      } else {
         echo json_encode(-1);
         exit();
      }
   }
?>
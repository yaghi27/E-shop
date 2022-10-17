<?php
   require_once("library.php");
      
   $sql = new mySQL();
   $conn = $sql->dbConnect();
   
   if($conn !=-1){
       $array;
       $result = $sql->start($array);
       if ($result == 1) {
        echo json_encode($array);
    }
    else{
        echo json_encode(0);
    }
   }
?>
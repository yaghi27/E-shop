<?php
       require_once("library.php");
      
       $sql = new mySQL();
       $conn = $sql->dbConnect();
       
       $dataid = $_POST['html'];
       if($conn !=-1){
           $array;
           $result = $sql->edit1($array, $dataid);
           if ($result == 1) {
            echo json_encode($array);
        }
        else{
            echo json_encode(0);
        }
       }
?>
<?php
           require_once("library.php");
      
           $sql = new mySQL();
           $conn = $sql->dbConnect();

           
        if (isset($_POST["fname"]) && !empty($_POST["fname"])) {
            $fname = $_POST["fname"];
        } else {
            $flag = -1;
            $msg = "First Name is required.";
    
            echo json_encode([$flag, $msg]);
        }
    
        if (isset($_POST["lname"]) && !empty($_POST["lname"])) {
            $lname = $_POST["lname"];
        } else {
            $flag = -1;
            $msg = "Last Name is required.";
    
            echo json_encode([$flag, $msg]);
        }
    
        if (isset($_POST["email"]) && !empty($_POST["email"])) {
            $email = $_POST["email"];
        } else {
            $flag = -1;
            $msg = "Email is required.";
    
            echo json_encode([$flag, $msg]);
        }
           $id = $_POST['html'];
           if($conn !=-1){
               $result = $sql->edit($id, $fname, $lname, $email);
               if ($result == 1) {
                $flag = 1;
                $msg = "Employee has been updated successfully!";

                echo json_encode([$flag, $msg]);
            }
            else{
                $flag = -1;
                $msg = "Failed to update employee.";
        
                echo json_encode([$flag, $msg]);
            }
           }
?>
<?php
    require_once("../Admin/library.php");
    if (isset($_POST["email"]) && !empty($_POST["email"])) {
        $email = $_POST["email"];
     } else {
        echo json_encode([-1, "Email is required."]);
        exit();
     }
     if (isset($_POST["password"]) && !empty($_POST["password"])) {
        $password = md5($_POST["password"]);
     } else {
        echo json_encode([-1, "Password is required."]);
        exit();
     }
        
    $sql = new mySQL();
    $conn = $sql->dbConnect();
    if($conn==1){
        $result = $sql->login($email, $password);
        if($result = 1){
            echo json_encode(1);
        }
        else{
            echo json_encode(-1);
        }
    }
?>
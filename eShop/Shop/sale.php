<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "tony";

    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if(!$conn){
        die ("Connection failed:" .mysqli_connect_error());
    }
    $id = $_POST['id'];
    $sale = $_POST['sale'];
    $sql = "UPDATE items SET sale = '$sale' , fprice = price * '$sale' WHERE id = '$id'";

    if ($conn->query($sql) === TRUE) {
        echo json_encode(1);
      } else {
        echo json_encode(0);
      }
      
      $conn->close();
     //UPDATE items SET sale = 0.8 AND fprice = price * 0.8 WHERE id = 1 
?>
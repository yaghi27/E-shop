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
    $qty = $_POST['quantity'];
    $sql = "UPDATE items SET quantity = quantity-'$qty' WHERE id = '$id'";

    if ($conn->query($sql) === TRUE) {
        echo json_encode(1);
      } else {
        echo json_encode(0);
      }
      
      $conn->close();
?>
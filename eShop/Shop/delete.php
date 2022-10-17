<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "tony";

    $dataid =  $_POST['html'];
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if(!$conn){
        die ("Connection failed:" .mysqli_connect_error());
    }
    $sql = "UPDATE items set isDeleted = 1 where id=$dataid";

    if ($conn->query($sql) === TRUE) {
        echo json_encode($dataid);
      } else {
        echo json_encode(0);
      }
      
      $conn->close();
?>
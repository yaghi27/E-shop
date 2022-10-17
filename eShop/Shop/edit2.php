<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "tony";
     // Create connection
     $conn = new mysqli($servername, $username, $password, $dbname);
     // Check connection
     if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
     }

     $id = $_POST['itemId'];
     $name = $_POST['name'];
     $description = $_POST['description'];
     $size = $_POST["size"];
     $color = $_POST['color'];
     $price = $_POST["price"];
     $category = $_POST["category"];
     $sql = "UPDATE items 
             SET name = '$name',
             description = '$description',
             size = '$size',
             color = '$color',
             price = '$price',
             category = '$category'
             WHERE id = '$id'";

     if ($conn->query($sql) === TRUE) {
        //  echo json_encode(1);
     echo "New record created successfully";
     } else {
         //echo json_encode(0);
     echo "Error: " . $sql . "<br>" . $conn->error;
     }

     $conn->close();
?>
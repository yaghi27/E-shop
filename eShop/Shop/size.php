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

    $code = $_POST['code'];
    $size = $_POST['size'];
    $sql = "SELECT * 
            FROM items
            WHERE code = '$code'
            AND size = '$size'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        
        while($row = mysqli_fetch_array($result))
        {
            $array[] = $row;
        }
        echo json_encode($array);
    } else {
        echo json_encode(0);
    }
    $conn->close();
?>
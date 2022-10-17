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
        
        $sql = "SELECT * 
                FROM items
                WHERE isDeleted = 0";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
          // output data of each row
          while($row = mysqli_fetch_array($result)) {
            $array[] = $row;
        }
        echo json_encode($array);
        } else {
          echo json_encode(0);
        }
        $conn->close();
?>
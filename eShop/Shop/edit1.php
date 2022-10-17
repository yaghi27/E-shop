<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "tony";

    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if(!$conn){
        die ("Connection failed:" .mysqli_connect_error());
    }
    $dataid = $_POST['html'];
    $sql = "SELECT * 
            FROM items 
            WHERE id = $dataid";
    
    $result = $conn->query($sql);
    if($result->num_rows > 0)
    {

        while($row = mysqli_fetch_array($result))
        {
            $array[] = $row;
        }
        echo json_encode($array);
        
    }
    else{
        echo json_encode(0);
    }
    mysqli_close($conn);
?>
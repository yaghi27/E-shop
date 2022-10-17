<?php
    $target_dir = "../items/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
    }

    // Check if file already exists
    // if (file_exists($target_file)) {
    // echo "Sorry, file already exists.";
    // $uploadOk = 0;
    // }

    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
    }

    //Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";

        $iName = htmlspecialchars( basename( $_FILES["fileToUpload"]["name"]));

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

         $name = $_POST['name'];
         $description = $_POST['description'];
         $size = $_POST["size"];
         $color = $_POST['color'];
         $price = $_POST["price"];
         $category = $_POST["category"];
         $qty = $_POST['qty'];
         $code = $_POST['code'];
         $sql = "INSERT INTO items (name, description, size, color, image, price,category, isDeleted, quantity, code,sale, fprice)
                 VALUES ('$name','$description','$size','$color', '$iName',$price,$category, 0, '$qty', '$code', 1, '$price)";
 
         if ($conn->query($sql) === TRUE) {
         echo "New record created successfully";
         } else {
         echo "Error: " . $sql . "<br>" . $conn->error;
         }
 
         $conn->close();
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
    }

?>
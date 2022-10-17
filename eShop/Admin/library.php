<?php
    class mySQL{
        private $host = "localhost";
        private $username = "root";
        private $password = "";
        private $dbname = "tony";
        private $conn ;

        public function dbConnect(){
            $this->conn = new mysqli($this->host, $this->username, $this->password, $this->dbname);
            if($this->conn->connect_error){
                die("connection failed" . $this->conn->connect_error);
                return -1;
            }else{
                return 1;
            }
        }

        public function signUp($fname, $lname, $email, $password){
            $fname = mysqli_real_escape_string($this->conn, $fname);
            $lname = mysqli_real_escape_string($this->conn, $lname);
            $email = mysqli_real_escape_string($this->conn, $email);
            $password = mysqli_real_escape_string($this->conn, $password);

            $sql = "INSERT INTO users (fname, lname, email, password, isDeleted)
                    VALUES ('$fname', '$lname', '$email', '$password', 0)";
  
            if ($this->conn->query($sql) === TRUE) {
                return 1;
            } else {
                return -1;
            }
        }

        public function login($email, $password){
            $email = mysqli_real_escape_string($this->conn, $email);
            $password = mysqli_real_escape_string($this->conn, $password);
            $sql = "SELECT * from users
                    WHERE email = '$email' and password = '$password'";
            $result = $this->conn->query($sql);
            $resultt =mysqli_fetch_array($result);
            $fname = $resultt[2];
            $lname = $resultt[3];
            $admin = $resultt[6];
            if ($result->num_rows > 0) {
                session_start();
                $_SESSION["fname"] = $fname;
                $_SESSION["lname"] = $lname;
                $_SESSION["isAdmin"] = $admin;
                return 1;
              } else {
                return -1;
              }
        }
        public function edit($id, $fname , $lname, $email){
            $email = mysqli_real_escape_string($this->conn, $email);
            $fname = mysqli_real_escape_string($this->conn, $fname);
            $lname = mysqli_real_escape_string($this->conn, $lname);
            $sql = "UPDATE users 
                    SET fname = '$fname', 
                        lname = '$lname',
                        email = '$email',
                    WHERE id = $id";
            if ($this->conn->query($sql) === TRUE)
            {
                return 1;
            }
            else{
                return -1;
            }
        }
        public function start(&$array){
            $sql = "SELECT * 
            FROM users 
            WHERE isDeleted = 0";
    
            $result = $this->conn->query($sql);
            if($result->num_rows > 0)
            {
                while($row = mysqli_fetch_array($result))
                {
                    $array[] = $row;
                }
                return 1;
            }
            else{
                return -1;
            }
        }
        public function delete($id){
            $sql = "UPDATE users set isDeleted = 1 where id='$id'";

            if ($this->conn->query($sql) === TRUE) {
                return 1;
            } else {
                return -1;
            }
        }
        public function edit1(&$array, $id)
        {
            $sql = "SELECT * 
                    FROM users 
                    WHERE id = '$id'";
    
            $result = $this->conn->query($sql);
            if($result->num_rows > 0)
            {

                while($row = mysqli_fetch_array($result))
                {
                    $array[] = $row;
                }
                return 1;
                
            }
            else{
                return -1;
            }
                }
    }
?>
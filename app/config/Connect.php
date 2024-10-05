<?php
    Class Connect{
        private $hostname;
        private $username;
        private $database;
        private $password;

        public function __construct(){
            $this->hostname = "localhost";
            $this->username = "root";
            $this->password = "";
            $this->database = "sigetutoria";
        }

        public function connect(){
            $conn = new mysqli($this->hostname, $this->username, $this->password, $this->database);

            if($conn->connect_error){
                die("Connection Error ". $conn->connect_error);
            }
            else{
                return $conn;
            }

            // try{
            //     $conn = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);
            //     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //     echo "Connected successfully";
            // }
            // catch(PDOException $e) {
            //     echo "Connection failed: " . $e->getMessage(); 
            // }
        }
    }
?>
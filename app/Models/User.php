<?php

    Class User{
        private $uID;
        private $uName;
        private $uSurname;
        private $uEmail;
        private $uPasswd;
        private $uCategory;

        public $conn;
        public function __construct(){
            $this->conn = (new Connect())->connect();
        }
        
        //getters
        public function get_uID(){
            return $this->uID;
        }
        public function get_uName(){
            return $this->uName;
        }
        public function get_uSurname(){
            return $this->uSurname;
        }
        public function get_uEmail(){
            return $this->uEmail;
        }
        public function get_uPasswd(){
            return $this->uPasswd;
        }
        public function get_uCategory(){
            return $this->uCategory;
        }

        //setters
        public function set_uID($u_ID){
            $this->uID = $u_ID;
        }
        public function set_uName($u_name){
            $this->uName = $u_name;
        }
        public function set_uSurname($u_surname){
            $this->uSurname = $u_surname;
        }
        public function set_uEmail($u_email){
            $this->uEmail = $u_email;
        }
        public function set_uPasswd($u_passwd){
            $this->uPasswd = $u_passwd;
        }
        public function set_uCategory($u_category){
            $this->uCategory = $u_category;
        }

        //methods
        public function login(){
            //
            $stmt = $this->conn->prepare("SELECT * FROM user WHERE email = ? && password = ?");
            $stmt->bind_param("ss", $uEmail, $uPasswd);
            $stmt->execute();

            return $stmt->get_result();
        }

        public function signin(){
            //
            $stmt = $this->conn->prepare("INSERT INTO user(name, surname, category, email, password) VALUES(?, ?, 'Estudante', ?, ?)");
            $stmt->bind_param("ssss", $u_Name, $u_Surname, $u_Email, $u_Passwd);
            
            return $stmt->execute();
        }
    }

?>
<?php
    //include "app/config/Connect.php";
    include "app/Models/User.php";

    Class UserController{
        
        public function login(){
            //
            if($_SERVER['REQUEST_METHOD'] == "POST"){
                //
                $user = new User();
                $user->set_uEmail($_POST['email']);
                $user->set_uPasswd($_POST['passwd']);

                $result = $user->login();

                if ($result->num_rows > 0) {
                    $user = $result->fetch_assoc();
                    session_start();
                    $_SESSION['id'] = $user['id'];
                    $_SESSION['category'] = $user['category'];
                    return true;
                }
                else{
                    echo "Something went wrong";
                    //return false;
                }
            }
        }
        public function signin(){
            //
            if($_SERVER['REQUEST_METHOD'] == "POST"){
                //
                $user = new User();
                $user->set_uName($_POST['nome']);
                $user->set_uSurname($_POST['apelido']);
                $user->set_uEmail($_POST['email']);
                $user->set_uPasswd($_POST['passwd']);

                if($this->login()){
                    echo "ja exite";
                }
                else{
                    if($user->signin()){
                        return true;
                    }
                    else{
                        echo "something went wrong";
                    }
                }
            }
        }
    }
?>
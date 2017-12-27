<?php
require_once "model.php";
    class UserModel extends Model{

        public function registerUser(string $email, string $password, string $username){
            
            $this->create( 
                array("email", "password", "username"), 
                array($email, $password, $username) 
            );
        }
    }
    
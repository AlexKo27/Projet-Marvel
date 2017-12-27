<?php
require_once "controller.php";

    class LoginController extends Contoller{

        public function login(array $user): ?string{

            if(!isset($user["email"]) || !isset($user["password"])) // verification de l'existance
                return "view/no-connect/login.php";
                
            if(empty(trim($user["email"])) || empty(trim($user["password"]))) // verification remplie
                return "view/no-connect/login.php";

            $email = htmlspecialchars(trim($user["email"]));
            $password = strip_tags(trim($user["password"]));
            
            if(!$this->validateEmail($email))
                return "view/no-connect/index.php";

            if($email == "test@test.test" && $password == "test"){
                $_SESSION["user"] = $user;
                return "view/connect/index.php";
            }else
                return "view/no-connect/index.php";
            
        }
        
    }
?>
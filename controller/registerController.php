<?php
require_once "controller.php";
    class RegisterController extends Controller{

        public function register(array $user): ?string{

            if(!isset($user["email"]) || !isset($user["password"]) || !isset($user["username"])) // verification de l'existance
                return "view/no-connect/register.php";
                
            if(empty(trim($user["email"])) || empty(trim($user["password"])) || empty(trim($user["username"]))) // verification remplie
                return "view/no-connect/register.php";

            $email = htmlspecialchars(trim($user["email"]));
            $password = strip_tags(trim($user["password"]));
            $username = strip_tags(trim($user["username"]));
            
            if(!$this->validateEmail($email))
                return "view/no-connect/index.php";

            if($email == "test@test.test" && $password == "test"){
                $_SESSION["user"] = $user;
                return "view/connect/index.php";
            }else
                return "view/no-connect/register.php";
            
        }
    }
?>
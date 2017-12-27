<?php
    class LoginController{

        public function login(array $user): ?string{

            if(!isset($user["email"]) || !isset($user["password"])) // verification de l'existance
                return "view/no-connect/login.php";
                
            if(empty(trim($user["email"])) || empty(trim($user["password"]))) // verification remplie
                return "view/no-connect/login.php";

            $email = htmlspecialchars(trim($user["email"]));
            $password = strip_tags(trim($user["password"]));
            
            if(!$this->validateEmail($email))
                return "view/no-connect/index.php";

            if($email == "test@test.fr" && $password == "test"){
                $_SESSION["user"] = $user;
                return "view/connect/index.php";
            }else
                return "view/no-connect/index.php";
            
        }
        public function validateEmail(string $email): bool{

            return (filter_var($email, FILTER_VALIDATE_EMAIL)) ? true : false; 

        }
    }
?>
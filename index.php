<?php

    require "config.php";
    $view = "view/no-connect/login.php";
    if($_GET){
        if(isset($_GET["page"])){
            foreach(PAGE_SITE as $key => $val){
                if($key == $_GET["page"]){
                    $view = $val;
                    break;
                }
            }
            //$view = "view/no-connect/".$_GET["page"].".php";
        }

    }
    if($_POST){
        require "controller/loginController.php";
        $controllerLogin = new LoginController();
        $view = $controllerLogin->login($_POST);

    }
    require $view;

?>
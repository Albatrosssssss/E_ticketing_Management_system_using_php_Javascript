<?php
session_start();
require ('../Model/prepared.php');
 $count = 0;
 $username = NULL; 
    if(isset($_POST['button'])){
        $password = $_POST['password'];
        $username = $_POST['username'];
        //$_SESSION['user'] = $username ; 

        $error = [];
        $error['wrongpassword']='Wrong password';
        if(isset($_COOKIE['username']) && isset($_COOKIE['password'])){
            $username = $_COOKIE['username'];
            $password = $_COOKIE['password'];
        } 
        if( !empty($_POST['username']) && !empty($_POST['password'])){
            $flag = Checklogin($username,$password);
            if($flag) {
                $_SESSION['authenticated'] = "true";
                if(isset($_REQUEST['rememberme'])){
                    setcookie('username',$_REQUEST['username'], time()+10);
                    setcookie('password',$_REQUEST['password'], time()+10);
                }
                header("Location: ../View/home.php");
            }
            else{
                header("Location: ../View/login.php");
            }   
        }    
        else{
            if(empty($_POST['password'])){
                $error['password'] = 'Insert Your password';
            }
            if(empty($_POST['username'])){
                $error['username'] = 'Insert Your User name';
            }
        }
        
    }
?>
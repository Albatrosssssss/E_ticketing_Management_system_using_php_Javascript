<?php
   require ('../Model/prepared.php');

  if(isset($_POST['button_sign'])){
    $firstname = $_POST['fname'];
    $lastname = $_POST['lname'];
    $father_name = $_POST['father_name'];
    $mother_name = $_POST['mother_name'];
    $dob = $_POST['dob'];
    $blood = $_POST['blood'];
    $number = $_POST['number'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $username = $_POST['username'];

    //setcookie("First_Name",$firstname,time()+10);

    $error = [];
    $error['count_1'] = 'Sign Up Successfully';
    $error['count_2'] = 'Failed to Sign Up';
    if(!empty($_POST['fname']) && !empty($_POST['lname']) && !empty($_POST['father_name']) && !empty($_POST['mother_name']) && !empty($_POST['dob']) && !empty($_POST['blood']) && !empty($_POST['number']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['username']) ){ 
        $flag = registration($firstname , $lastname , $father_name, $mother_name, $dob, $blood, $number, $email, $password, $username);
        if($flag) {
            header("Location: ../View/login.php");
        }
    }
    else{
        
        if(empty($_POST['lname'])){
            $error['lastname'] = 'Insert Your last name';
        }
        if(empty($_POST['father_name'])){
            $error['father_name'] = 'Insert Your Fathers name';
        }
        if(empty($_POST['mother_name'])){
            $error['mother_name'] = 'Insert Your mothers name';
        }
        if(empty($_POST['dob'])){
            $error['dob'] = 'Insert Your Date of birth name';
        }
    
        if(empty($_POST['blood'])){
            $error['blood'] = 'Insert Your blood';
        }
    
        if(empty($_POST['number'])){
            $error['number'] = 'Insert Your Number';
        }
        if(empty($_POST['email'])){
            $error['email'] = 'Insert Your Email';
        }
    
        if(empty($_POST['password'])){
            $error['password'] = 'Insert Your password';
        }
        if(empty($_POST['username'])){
            $error['username'] = 'Insert Your User name';
        }
    }
  }
?>

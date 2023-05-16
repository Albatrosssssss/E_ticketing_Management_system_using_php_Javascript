<?php 
   // session_start();
   if(isset($_REQUEST['rememberme'])){
    setcookie('username',$_REQUEST['username'], time()+5);
    setcookie('password',$_REQUEST['password'], time()+5);
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="styles.css">
    <script src="JS/login_validation.js"></script>
	<title> Login Manager </title>
</head>
<body>

    
<?php include('header.php');
include ('../Controller/login_action.php');
?>

    <div class="img">
	<form action="../Controller/login_action.php" method="post" novalidate onsubmit="return validate(this);">
        <div class="login_container">
            <div class= "color"><br><br>
                <label for="username"><b>Username</b></label> <br>
                <input type="text" placeholder="Enter username" name="username" value="<?php if(isset($username)) echo $username ?>"><br><br>
                <span id= "errorusername">
                    <?php
                    if(isset($error['username'])){
                        echo $error['username'];
                    }
                    ?>
                </span><br>


                <label for="password"><b> Password </b></label><br>
                <input type="text" placeholder="Type Password " name="password" value="<?php if(isset($password)) echo $password ?>"><br>
                <span id = "errorpassword">
                    <?php
                    if(isset($error['password'])){
                        echo $error['password'];
                    }
                    if($count==1){
                        echo $error['wrongpassword'];
                    }
                    ?>
                </span><br>
                <input type="checkbox" name="rememberme" id="rememberme" >
                <label for="rememberme">Remember me </label><br>

                <input type="submit" value ="Log in" name="button"><br><br>
            </div>
            <a href="forget_pass.php"> Forget Password </a><br>
            <a href="sign_up.php"> Sign Up </a>
        </div>
    </form>
    </div>
    <?php include('footer.php'); ?>
</body>
</html>

<?php
    if(isset($_POST['sign'])){

        session_start();
        $email = $_POST['email'];

        if( empty($_POST['email']) ){
            $error['email'] = 'Insert Your Username';
        }
        else{
            // Check if email exists in the database
        // If it does, generate a random verification code and store it in the database
        // along with the user's email
        $verification_code = rand(100000, 999999);
        // Store the verification code in the session for later use
        $_SESSION['verification_code'] = $verification_code;
        
        // Send an email to the user with the verification code and a link to the password reset page
        $to = $email;
        $subject = "e-Ticketing Management System";
        $message = "Your verification code is: " . $verification_code . "\n\n";
        // $message .= "Please click on the following link to reset your password:\n";
        // $message .= "http://yourdomain.com/reset_password.php";
        $headers = "From: Your Name <sadialhuda.aiub@gmail.com>";
        
        mail($to, $subject, $message, $headers);
        
        // Redirect the user to the password reset page
        header("Location: reset_pass.php");
        exit;
        }
        
    }
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="styles.css">
	<title> Login Manager </title>
</head>
<body>
    
<?php include('header.php'); ?>

    <div class="img"><br><br>
    <form action="" method="post" novalidate>
    <label for="psw"><b>Email</b></label>
        <input type="tsswordpa" placeholder="Enter email" name="email" id="psw" value="<?php if(isset($email)) echo $email ?>" ><br>
        <span>
          <?php
          if(isset($error['email'])){
            echo $error['email'];
          }
          ?><br><br><br>
        </span>
        <input type="submit" value ="Submit" name="sign"><br><br>
    </form>

	
        <a href="login.php">Back </a>
      </fieldset>
        </div>
    </form>
    </div>
    <?php include('footer.php'); ?>
</body>
</html>

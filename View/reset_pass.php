<?php
session_start();

// Check if the user has submitted the form
if (isset($_POST['submit'])) {
    // Check if the verification code and email match the values stored in the session
    if ($_POST['verification_code'] == $_SESSION['verification_code'] && $_POST['email'] == $_SESSION['email']) {
        // Reset the user's password
        // ...
        // Redirect the user to the login page
        header("Location: login.php");
        exit;
    } else {
        // Display an error message
        echo "Invalid verification code or email";
    }
}

// Display the password reset form
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
        <div class="login_container">
            <div class= "home">&nbsp&nbsp
            <form method="POST" novalidate>
                <label for="email">Email:</label>
                <input type="email" name="email" required> <br><br>
                <label for="verification_code">Verification code:</label>
                <input type="text" name="verification_code" required><br><br>
                <button type="submit" name="submit">Reset Password</button>
            </div>
        </div>
        <a href="forget_pass.php">Back </a>
    </form>
    </div>
    <?php include('footer.php'); ?>
</body>
</html>

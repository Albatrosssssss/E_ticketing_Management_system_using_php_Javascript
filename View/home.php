<?php 
    //$_SESSION['authenticated'] = "";
    session_start();
    if($_SESSION['authenticated']!= "true" ){
        header("Location: login.php");
        exit;
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
        <div class="login_container">
            <div class= "home">&nbsp&nbsp
                <a href="view_pro.php"> View Profile </a> &nbsp&nbsp
                <a href="update.php"> Update Profile </a> &nbsp&nbsp
                <a href="change_pass.php"> Change Password  </a> &nbsp&nbsp
                <a href="seat_capasity.php"> Seat Capasity </a> &nbsp&nbsp
                <a href="logout.php"> Logout  </a> &nbsp&nbsp
            </div>
        </div>
    </form>
    </div>
    <?php include('footer.php'); ?>
</body>
</html>

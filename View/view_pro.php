<?php 
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
    
<?php include('header.php');  ?>

    <div class="img"><br><br>
	<form action="" method="post" novalidate>
        <div class="login_container">
            <div class= "forget">&nbsp&nbsp
                <label for="username"><b>Username</b></label> <br>
                <input type="text" placeholder="Enter username" name="username" value="<?php if(isset($username)) echo $username ?>"><br><br>
                <span>
                    <div class="sadi">
                   
                </span>
                </div>
                <input type="submit" value ="Show Profile" name="button_submit"><br><br>
                <a href="home.php"> Back </a>
            </div>
        </div>
    </form>
    <?php include('../Controller/view_action.php'); ?>
    </div>
   <?php  include('footer.php'); ?>
</body>
</html>
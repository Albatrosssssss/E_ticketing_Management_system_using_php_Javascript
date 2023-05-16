<?php 
    session_start();
    if($_SESSION['authenticated']!= "true" ){
        header("Location: login.php");
        exit;
    }
?>
<?php
$count = 0;
    if(isset($_POST['btn'])){
        $username = $_POST['username'];
        $current_pass = $_POST['current_password'];
        $new_pass = $_POST['new_password'];
        $error = [];
        $error['Current_pass_wrong']='Current Password Wrong';
        $error['Successfully Updated']='Password Change Successfully';
        $error['Failed to Change Password']='Failed to Change Password';
        if( empty($_POST['username']) or empty($_POST['current_password']) or empty($_POST['new_password']) ){
            if(empty($_POST['username'])){
                $error['username'] = 'Insert Your Username';
            }
            if(empty($_POST['current_password'])){
                $error['current_password'] = 'Insert Your Current Password';
            }
            if(empty($_POST['new_password'])){
                $error['new_password'] = 'Insert Your New Password';
            }
        }
        else{
            $servername = "localhost";
            $dusername = "root";
            $dpassword = "";
            $dbname = "user";
            // Create connection
            $conn = new mysqli($servername, $dusername, $dpassword, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            $sql = "SELECT * FROM signup WHERE username='$username' ";
            $result = $conn->query($sql);
            if($result->num_rows > 0)
            {
                $row = $result->fetch_assoc();
                //var_dump($row['password']);
                if (($current_pass==$row['password'])) {
                    // Password matches, so create a session for the user
                    setcookie("Username",$username,time()+10);
                    $_SESSION['authenticated'] = "true";
                    $sql = "UPDATE signup SET password='$new_pass' WHERE username = '$username'";
                    if (mysqli_query($conn, $sql)) {
                        $count=3;
                    } 
                    else {
                        $count=2;
                    }
                }
                else{
                    $count = 1;
                }
            }
            else{
                echo "error occured";
            }
           
            $conn->close();
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

    <div class="img">
	<form action="" method="post" novalidate>
        <div class="login_container">
            <div class= "color"><br><br>
                <label for="username"><b>Username</b></label> <br>
                <input type="text" placeholder="Enter username" name="username" value="<?php if(isset($username)) echo $username ?>"><br><br>
                <span>
                    <?php
                    if(isset($error['username'])){
                        echo $error['username'];
                    }
                    ?><br>
                </span>

                <label for="password"><b>Current Password </b></label><br>
                <input type="text" placeholder="Type Current Password " name="current_password" value="<?php if(isset($current_pass)) echo $current_pass ?>"><br><br>
                <span>
                    <?php
                    if(isset($error['current_password'])){
                        echo $error['current_password'];
                    }
                    else if ($count==1){
                        echo $error['Current_pass_wrong'];
                    }
                    ?><br>
                </span> 

                <label for="password"><b> New Password </b></label><br>
                <input type="text" placeholder="Type new Password " name="new_password" value="<?php if(isset($new_pass)) echo $new_pass ?>" ><br><br>
                <span>
                    <?php
                    if(isset($error['new_password'])){
                        echo $error['new_password'];
                    }
                    else if($count==3){
                        echo $error['Successfully Updated'];
                    }
                    else if($count==2){
                        echo $error['Failed to Change Password'];
                    }

                  
                    ?><br>
                </span> 

                <input type="submit" value ="Change Password" name="btn"><br>
                <a href = "home.php"> Back </a>
            </div>

        </div>
    </form>
    </div>
    <?php include('footer.php'); ?>
</body>
</html>


<?php
$count = 0 ; 
include('header.php');
require ('../Controller/sign_up_action.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="styles.css">
  <script src="JS/registrationvalidation.js"></script>
	<title> Login Manager </title>
</head>
<body>
    

    <div class="img">
	<form action="../Controller/sign_up_action.php" method="post" novalidate onsubmit="return validate(this);">
        <div class="sign_up">
        <fieldset>
        <legend>Sign Up</legend>

        <label for="Firstname"><b>First name </b></label>
        <input type="text" placeholder="First name" name="fname" id="first_name" value="<?php if(isset($firstname)) echo $firstname ?>" ><br>
        <span id="errorfirstname"></span>
          <?php
          if(isset($error['firstname'])){
            echo $error['firstname'];
          }
          ?><br>
        </span>

        <label for="Lastname"><b>Last name </b></label>
        <input type="text" placeholder="First name" name="lname" id="last_name" value="<?php if(isset($lastname)) echo $lastname ?>" ><br>
        <span id="errorlastname" >
        <?php
          if(isset($error['lastname'])){
            echo $error['lastname'];
          }
          ?>
        </span><br>

        <label for="Lastname"><b>Father's name </b></label>
        <input type="text" placeholder="First name" name="father_name" id="father_name" value="<?php if(isset($father_name)) echo $father_name ?>" ><br>
        <span id="errorfather_name" >
        <?php
          if(isset($error['father_name'])){
            echo $error['father_name'];
          }
        ?>
        </span><br>

        <label for="Lastname"><b>Mother's name </b></label>
        <input type="text" placeholder="First name" name="mother_name" id="Mother_name" value="<?php if(isset($mother_name)) echo $mother_name ?>" ><br>
        <span id="errormother_name" >
          <?php
          if(isset($error['mother_name'])){
            echo $error['mother_name'];
          }
          ?>
        </span><br>

        <label for="dob"><b>Date of Birth:</b></label>
        <input type="date" name="dob" id="dob" value="<?php if(isset($dob)) echo $dob ?>"><br>
        <span id="errordob" >
        <?php
          if(isset($error['dob'])){
            echo $error['dob'];
          }
        ?>
        </span><br>
     

        <label for="Blood"><b>Blood Group:</b></label>
        <select name="blood">
          <option value="A+">A+</option>
          <option value="A-">A-</option>
          <option value="O+">O+</option>
        </select><br>
        <span id="errorblood">
          <?php
          if(isset($error['blood'])){
            echo $error['blood'];
          }
          ?>
        </span>

        <label for="Number"><b>Phone Number</b></label>
        <input type="number" placeholder="Enter Phone Number" name="number" id="number" value="<?php if(isset($number)) echo $number ?>" ><br>
        <span id="errornumber" >
          <?php
          if(isset($error['number'])){
            echo $error['number'];
          }
          ?>
        </span><br>

        <label for="email"><b>Email</b></label>
        <input type="text" placeholder="Enter Email" name="email" id="email" value="<?php if(isset($email)) echo $email ?>" ><br>
        <span id="erroremail">
          <?php
          if(isset($error['email'])){
            echo $error['email'];
          }
          ?>
        </span><br>

        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="password" id="psw" value="<?php if(isset($password)) echo $password ?>" ><br>
        <span id="errorpassword">
          <?php
          if(isset($error['password'])){
            echo $error['password'];
          }
        ?>
        </span><br>

        <label for="psw"><b>Username</b></label>
        <input type="tsswordpa" placeholder="Enter Username" name="username" id="username" value="<?php if(isset($username)) echo $username ?>" ><br>
        <span id="errorusername">
          <?php
          if(isset($error['username'])){
            echo $error['username'];
          }
          if($count==1){
            echo $error['count_1'];
          }
          if($count==2){
            echo $error['count_2'];
          }
          ?>
        </span><br>

        <input type="submit" value ="Submit" name="button_sign"><br><br>
        <a href="login.php">Back </a>
      </fieldset>
        </div>
    </form>
    </div>
    <?php include('footer.php'); ?>
</body>
</html>

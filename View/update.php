<?php 
    session_start();
    if($_SESSION['authenticated']!= "true" ){
        header("Location: login.php");
        exit;
    }
?>
<?php
$count=0;
$temp=0;
  if(isset($_POST['sign'])){
    $username = $_POST['username'];

   // setcookie("First_Name",$firstname,time()+10);

    $error = [];
    if(empty($_POST['username'])){
        $error['username'] = 'Insert Your User name';
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
            $sql = "SELECT * FROM signup where username='$username'";
            
            $result = $conn->query($sql);
            if($result->num_rows > 0)
            {
                $row = $result->fetch_assoc();
                $count=1;
            }
            else{
                
            }
    }
    
    
}

    if(isset($_POST['button_sign'])){
        $firstname = $_POST['fname'];
        $lastname = $_POST['lname'];
        $father_name = $_POST['father_name'];
        $mother_name = $_POST['mother_name'];
        $dob = $_POST['dob'];
        $blood = $_POST['blood'];
        $number = $_POST['number'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        setcookie("First_Name",$firstname,time()+10);
    
        $error = [];
        $error['Successfully Updated']= 'Successfully Updated';
        $error['Updated Failed'] = 'Updated Failed';

        if(empty($_POST['fname']) || empty($_POST['lname']) || empty($_POST['father_name']) || empty($_POST['mother_name']) || empty($_POST['dob']) || empty($_POST['blood']) || empty($_POST['number']) || empty($_POST['email'])  ){
            if(empty($_POST['fname'])){
                $error['firstname'] = 'Insert Your First Name';
            }
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
                $sql = "UPDATE signup SET firstname='$firstname', lastname='$lastname', father_name='$father_name', mother_name='$mother_name',dob='$dob',blood='$blood',number='$number',email='$email'  WHERE username='$username'";
                $result = $conn->query($sql);
                if($result){
                    $count=5;
                }
                else{
                    $count=7;
                }
                // if($result->num_rows>0 )
                // {
                //     echo "Updated";
                // }
                // else{
                //     echo "error occured";
                // }
                
    

                $conn->close();
               // echo "Connected successfully";
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
    
<?php include('header.php');
include ('../Controller/update_action.php') ?>

    <div class="img"><br><br>
    <form action="" method="post" novalidate>
    <label for="psw"><b>Username</b></label>
        <input type="tsswordpa" placeholder="Enter Username" name="username" id="psw" value="<?php if(isset($username)) echo $username ?>" ><br>
        <span>
          <?php
          if(isset($error['username'])){
            echo $error['username'];
          }
          ?><br>
        </span>
        <input type="submit" value ="Submit" name="sign"><br><br>
    </form>

	<form action="" method="post" novalidate>
        <div class="sign_up">
        <fieldset>
        <legend> </legend>
        <label for="psw"><b>Username</b></label>
        <input type="text"  name="username" id="psw" value="<?php if($count==1) echo $row['username'] ?>" ><br>
        
       
        <label for="Firstname"><b>First name </b></label>
        <input type="text"  name="fname" id="first_name" value="<?php if($count==1) echo $row['firstname'] ?>"><br>


        <label for="Lastname"><b>Last name </b></label>
        <input type="text" name="lname" id="last_name" value="<?php if($count==1) echo $row['lastname'] ?>" ><br>


        <label for="Lastname"><b>Father's name </b></label>
        <input type="text"  name="father_name" id="last_name" value="<?php if($count==1) echo $row['father_name'] ?>" ><br>


        <label for="Lastname"><b>Mother's name </b></label>
        <input type="text"  name="mother_name" id="last_name" value="<?php if($count==1) echo $row['mother_name'] ?>" ><br>


        <label for="dob"><b>Date of Birth:</b></label>
        <input type="date" name="dob" id="dob" value="<?php if($count==1) echo $row['dob'] ?>"><br><br>



        <label for="Blood"><b>Blood Group:</b></label>
        <select name="blood" value="<?php if($count==1) echo $row['blood'] ?>">
          <option value="A+">A+</option>
          <option value="A-">A-</option>
          <option value="O+">O+</option>
        </select>


        <label for="Number"><b>Phone Number</b></label>
        <input type="number"  name="number" id="number" value="<?php if($count==1) echo $row['number'] ?>" ><br>
   

        <label for="email"><b>Email</b></label>
        <input type="text"  name="email" id="email" value="<?php if($count==1) echo $row['email'] ?>" ><br>
   

        <br><br>
        <input type="submit" value ="Update Information" name="button_sign">
        <?php
            if($count==5){
                echo $error['Successfully Updated'];
            }
            elseif($count==7){
                echo $error['Updated Failed']; 
            }
        ?><br>
        <a href="home.php">Back </a>
      </fieldset>
        </div>
    </form>
    </div>
    <?php include('footer.php'); ?>
</body>
</html>

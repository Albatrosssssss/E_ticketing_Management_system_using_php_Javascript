<?php 
    session_start();
    if($_SESSION['authenticated']!= "true" ){
        header("Location: login.php");
        exit;
    }
?>
<?php
$count=0;
    if(isset($_POST['btn'])){
        $username = $_POST['username'];
        $from = $_POST['from'];
        $to = $_POST['to'];
        $seat_number = $_POST['seat_number'];
        $price = $_POST['price'];
        $time = $_POST['time'];
        
        //setcookie("First_Name",$firstname,time()+10);
    
        $error = [];
        $error['done']='Successfully Created';
        $error['fail']='Failed';

        if(empty($_POST['username']) || empty($_POST['from']) || empty($_POST['to']) || empty($_POST['seat_number']) || empty($_POST['price']) || empty($_POST['time']) ){
            if(empty($_POST['username'])){
                $error['username'] = 'Insert Bus Name';
            }
            if(empty($_POST['from'])){
                $error['from'] = 'Insert where are you from';
            }
            if(empty($_POST['to'])){
                $error['to'] = 'Insert where you want to go';
            }
            if(empty($_POST['seat_number'])){
                $error['seat_number'] = 'Enter full quantitu of seat';
            }
            if(empty($_POST['price'])){
                $error['price'] = 'Enter ticket price';
            }
        
            if(empty($_POST['time'])){
                $error['time'] = 'Enter Time';
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
                $sql = "INSERT INTO bus( username,`from`, `to`, seat_no, price, time )
                VALUES ( '$username','$from', '$to', '$seat_number','$price', '$time')";
                //var_dump($sql);
                if (mysqli_query($conn, $sql)) {
                    echo "New record created successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
            //     if ($conn->query($sql) === TRUE) {
            //         //echo "New record created successfully";
            //         $count=1;
            //         } else {
            //         echo "Error: " . $sql . "<br>" . $conn->error;
            //         $count=2;
            //         }
            //    // echo "Connected successfully";
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
        <div class="login_container">
            <div class= "color">
                <label for="username"><b>Bus Name</b></label> <br>
                <input type="text" placeholder="Enter Bus Name " name="username" value="<?php if(isset($username)) echo $username ?>" ><br>
                <span>
                    <?php
                    if(isset($error['username'])){
                        echo $error['username'];
                    }
                    ?><br>
                </span>

                <label for="username"><b>From </b></label> <br>
                <input type="text" placeholder="Where are from ? " name="from"  value="<?php if(isset($from)) echo $from ?>" ><br>
                <span>
                    <?php
                    if(isset($error['from'])){
                        echo $error['from'];
                    }
                    ?><br>
                </span>

                <label for="username"><b>To</b></label> <br>
                <input type="text" placeholder="Where you want to go? " name="to"  value="<?php if(isset($to)) echo $to ?>" ><br>
                <span>
                    <?php
                    if(isset($error['to'])){
                        echo $error['to'];
                    }
                    ?><br>
                </span>

                <label for="password"><b>Total Number of Seat </b></label><br>
                <input type="text" placeholder="Total Number of seat " name="seat_number"   value="<?php if(isset($seat_number)) echo $seat_number ?>" ><br>
                <span>
                    <?php
                    if(isset($error['seat_number'])){
                        echo $error['seat_number'];
                    }
                    ?><br>
                </span>

                <label for="username"><b>Ticket Price</b></label> <br>
                <input type="text" placeholder="Ticket price " name="price"  value="<?php if(isset($price)) echo $price ?>" ><br>
                <span>
                    <?php
                    if(isset($error['price'])){
                        echo $error['price'];
                    }
                    ?><br>
                </span>

                <label for="password"><b> Time  </b></label><br>
                <input type="date" placeholder="Time  " name="time"  value="<?php if(isset($time)) echo $time ?>" ><br><br>
                <span>
                    <?php
                    if(isset($error['time'])){
                        echo $error['time'];
                    }
                    if($count==1){
                        echo $error['done'];
                    }
                    elseif($count==2){
                        echo $error['fail'];
                    }
                    ?><br>
                </span>


                <input type="submit" value ="Create Bus Schedule" name="btn"><br><br>
                <a href = "home.php"> Back </a>
            </div>

        </div>
    </form>
    </div>
    <?php include('footer.php'); ?>
</body>
</html>


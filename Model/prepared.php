<?php
require ('Connect.php');

function registration($fname , $ltname , $f_name, $m_name, $db, $bld, $num, $mail, $pass, $un){
    $conn = connect();
    if($conn){
	$stmt = $conn->prepare("Insert INTO signup (firstname , lastname , father_name, mother_name, dob, blood, number, email, password, username) VALUES(?,?,?,?,?,?,?,?,?,?)");
			$stmt->bind_param("ssssssssss", $firstname , $lastname , $father_name, $mother_name, $dob, $blood, $number, $email, $password, $username);
    $firstname = $fname;
    $lastname = $ltname;
    $father_name = $f_name;
    $mother_name = $m_name;
    $dob = $db;
    $blood = $bld;
    $number = $num;
    $email = $mail;
    $password = $pass;
    $username = $un;

    $stmt->execute();
        return true; 
    // die($stmt->error);
    }
    else{
        return false;
    }
}

function Checklogin($username, $password) {
    $conn = connect();
    if ($conn) {

        $sql = "SELECT * FROM signup WHERE username = '" . $username . "' and password = '" . $password . "'";
        $res = mysqli_query($conn, $sql);
        if ($res->num_rows === 1){
            $_SESSION['authenticated']= "true" ;
            return true;
        }
        else{
            return false;
        }
    }
}

//-------------------------------------------
    // // Access the array key here
//     $servername = "localhost";
//     $username = "root";
//     $password = "";
//     $dbname = "user";

//     // Create connection
//     $conn = new mysqli($servername, $username, $password, $dbname);

//     // Check connection
//     if ($conn->connect_error) {
//         die("Connection failed: " . $conn->connect_error);
//     }

//     // Insert data
//     $stmt = $conn->prepare("INSERT INTO `signup` (`firstname`, `lastname`, `father_name`, `mother_name`, `dob`, `blood` , `number`, `email`, `password`, `username`) VALUES (?,?,?,?,?,?,?,?,?,?)");
//     $stmt->bind_param("ssssssssss", $firstname, $lastname, $father_name, $mother_name,$dob, $blood, $number,$email,$password,$username);
//     $stmt->execute();

//     echo "New records created successfully <br><br>";
//     $stmt->free_result();
//     $stmt->close();
//     $conn->close();
//--------------------------------------------------

//}

// --------------------
// else if(isset($_SESSION['update_action']) && $_SESSION['update_action']==1){ //update
//     $servername = "localhost";
//     $username = "root";
//     $password = "";
//     $dbname = "user";

//     // Create connection
//     $conn = new mysqli($servername, $username, $password, $dbname);

//     // Check connection
//     if ($conn->connect_error) {
//         die("Connection failed: " . $conn->connect_error);
//     }

//     $stmt2 = $conn->prepare("UPDATE `signup` SET `firstname`=?,`lastname`=?,`father_name`=?,`mother_name`=? , `dob`=? ,`blood`=? ,`number`=? ,`email`=? ,`password`=? ,`username`=?   WHERE `username`=$username");
//     $stmt2->bind_param( "ssssssssss",$firstname, $lastname, $father_name, $mother_name,$dob, $blood, $number,$email,$password,$username);
//     $stmt2->execute();
        
//     echo "Updated successfully ";
//     $stmt2->free_result();
//     $stmt2->close();
    
// }
// -----------------
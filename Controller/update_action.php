
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
            $_SESSION['update_action']=1;
            //     $servername = "localhost";
            //     $dusername = "root";
            //     $dpassword = "";
            //     $dbname = "user";
    
            //     // Create connection
            //     $conn = new mysqli($servername, $dusername, $dpassword, $dbname);
    
            //     // Check connection
            //     if ($conn->connect_error) {
            //     die("Connection failed: " . $conn->connect_error);
            //     }
            //     $sql = "UPDATE signup SET firstname='$firstname', lastname='$lastname', father_name='$father_name', mother_name='$mother_name',dob='$dob',blood='$blood',number='$number',email='$email'  WHERE username='$username'";
            //     $result = $conn->query($sql);
            //     if($result){
            //         $count=5;
            //     }
            //     else{
            //         $count=7;
            //     }
            //     // if($result->num_rows>0 )
            //     // {
            //     //     echo "Updated";
            //     // }
            //     // else{
            //     //     echo "error occured";
            //     // }

            //     $conn->close();
            //    // echo "Connected successfully";
        }
        
    
    }
?>
<?php
    $count=0;
  if(isset($_POST['button_submit'])){
        $username = $_POST['username'];
        $error = [];
        $error['wrong']='Wrong Username';

        if(empty($_POST['username'])){
            $error['username'] = 'Insert Your User Name';
        }
        else{
            $count=1;
        }
    }
?>
<?php
    if(isset($error['username'])){
        echo $error['username'];
    }
?><br>

<?php
    if($count==1){
        $servername = "localhost";
        $dusername = "root";
        $dpassword = "";
        $dbname = "user";

        // Create connection
        $conn = new mysqli($servername, $dusername, $dpassword, $dbname);

        // Check connection
        $sql = "SELECT * FROM signup where username='$username'";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {

            // Echo the data in a table
            echo '<table align="center" border=2 color=black style="background-color: rgb(143,188,143);"  >';
            echo '<tr style="background-color: rgb(8,157,73);">
                    <th >First Name </th>
                    <th>Last Name</th>
                    <th>Father Name</th>
                    <th>Mother Name</th>
                    <th>Date of Birth</th>
                    <th>Blood Group</th>
                    <th>Phone Number</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>User Name</th>
                </tr>';
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<tr>';
                echo '<td>' . $row['firstname'] . '</td>';
                echo '<td>' . $row['lastname'] . '</td>';
                echo '<td>' . $row['father_name'] . '</td>';
                echo '<td>' . $row['mother_name'] . '</td>';
                echo '<td>' . $row['dob'] . '</td>';
                echo '<td>' . $row['blood'] . '</td>';
                echo '<td>' . $row['number'] . '</td>';
                echo '<td>' . $row['email'] . '</td>';
                echo '<td>' . $row['password'] . '</td>';
                echo '<td>' . $row['username'] . '</td>';
                echo '</tr>';
            }
            echo '</table>';
    }
    else{
        echo $error['wrong'];
    }
    }
?>
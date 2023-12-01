<?php
session_start();
$db = mysqli_connect('localhost:3306','root','','project');
 
$username = $_POST["user"];
$password = $_POST["pass"];

$i=0;
$usern = "";
$passd = "";
 $que="INSERT INTO `login` (`username`,`password`) VALUES ('$username','$password')";
 
$sql="SELECT fname, password FROM `customer` WHERE fname='$username' and password='$password'";
$result2 = mysqli_query($db, $sql);
 
if(isset($_POST['submit'])){
    if($username == 'admin' and $password == 'ad123'){
        $result = mysqli_query($db, $que);
        header('location:admin.php');
    }
    elseif($result2) {
        while($rows = mysqli_fetch_assoc($result2) and $i==0)
        {
 
            $usern = $rows['fname'];
            $passd = $rows['password'];
            $i= $i+1;
        }if ($usern==$username and $passd==$password) {
            $result = mysqli_query($db, $que);
            $_SESSION['username'] = $username; // Store the username in the session
            header("location:destination.php");
        }
        else{
            ?>
<script>
                alert("Invalid username or password");
            </script>
            <?php
        }
    }
}
?>
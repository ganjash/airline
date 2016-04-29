<?php
session_start();
//session_start();
//if(session_status()=== PHP_SESSION_ACTIVE){
$firstname=$_POST['firstname'];
$lastname=$_POST['lastname'];
$email=$_POST['email'];
$password1=$_POST['password'];       #PASSWORD
$personid=$_POST['personid'];
$dob=$_POST['dob'];
$address=$_POST['address'];
$username = $email;                 #USERNAME


$_SESSION["user"]=$firstname;
echo $_SESSION["user"];
echo '</br>';
//print_r($_POST);
 
$servername = "localhost";
$dbadmin = "root";
$password = "root";
$dbname = "airline";

// Create connection
$conn = new mysqli($servername, $dbadmin, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    
session_unset();
session_destroy();
}
 else {


    #$sql = "SELECT * FROM users where username='$user_name' and password='$password1'";

    $sql = "INSERT INTO passenger (ID, FIRST_NAME, LAST_NAME, EMAIL, PASSWORD, DOB, ADDRESS) VALUES ('$personid', '$firstname', '$lastname', '$email', '$password1', STR_TO_DATE('$dob', '%m/%d/%Y'), '$address')";

    if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    }
     else {
            echo "Error: " . $sql . "<br>" . $conn->error;
            session_destroy();
            header("Location:error.php");

          }
    }
//}
//else{
    
  //  session_destroy();
    //header("Location:index.php");
//}
   
?>

<?php


if(strcmp($_COOKIE["user_id"], "admin@airline.com") == 0) {
      #echo "Cookie named '" . $cookie_name . "' is not set!";


$flightid =$_POST['flightid'];
session_start();
$disable_sign = False;

//session_start();
//if(session_status()=== PHP_SESSION_ACTIVE){
$_SESSION["user"]=$user_name;

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "airline";
 
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    
session_unset();
session_destroy();
}
 else {
    $sql = "DELETE FROM FLIGHTS WHERE FLIGHT_NO ='$flightid'";


        if ($conn->query($sql) === TRUE) {
                #echo "New record created successfully";
                echo "";
            }
       else {
                printf("Errormessage: %s\n", $conn->error);
                echo "<br>";
                var_dump(http_response_code(500));

          }

    }

    
  }
  else{

     echo "You are UNAUTHORISED !! Please sign in";

  }


?>

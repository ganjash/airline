<?php

echo "Hi you reached flightUpdation";


$flight_no = $_POST['flight_no'];
$airways_id = $_POST['airways_id'];
$capacity = $_POST['capacity'];
$origin = $_POST['origin'];
$desti = $_POST['desti'];

/*
echo $flight_no."<br>";
echo $airways_id."<br>";
echo $capacity."<br>";
echo $origin."<br>";
echo $desti."<br>";
*/


if(strcmp($_COOKIE["user_id"], "admin@airline.com") == 0) {
      #echo "Cookie named '" . $cookie_name . "' is not set!";


/*
$flight_no = $_POST['flight_no'];
$airways_id = $_POST['airways_id'];
$capacity = $_POST['capacity'];
$origin = $_POST['origin'];
$desti = $_POST['desti'];
*/


session_start();
//$disable_sign = False;

//session_start();
//if(session_status()=== PHP_SESSION_ACTIVE){

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
    $sql = "UPDATE flights SET FLIGHT_NO='$flight_no' , AIRWAYS_ID = '$airways_id' , CAPACITY = '$capacity' , ORIGIN = '$origin' , DESTINATION = '$desti' where FLIGHT_NO = '$flight_no'"; 
    //echo "<br>".$sql."<br>";


        if ($conn->query($sql) === TRUE) {
                #echo "New record created successfully";
        	     echo "<h1>Flight details Updated !!</h1>";
        	     //sleep(3);
        	     header('Location: adminListFlights.php');



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

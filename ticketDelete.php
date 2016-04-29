<?php


if(isset($_COOKIE["user"])) {
      #echo "Cookie named '" . $cookie_name . "' is not set!";


$ticketid =$_POST['ticketid'];
$entry=$_POST['entry'];
$date_on=$_POST['date_on'];
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
    $sql = "DELETE FROM TICKET WHERE TICKET_ID ='$ticketid'";


        if ($conn->query($sql) === TRUE) {
                #echo "New record created successfully";
                echo "";
            }
       else {
                var_dump(http_response_code(404));

          }


        $sql = "UPDATE flight_available SET seats_booked = seats_booked - 1 where flight_id = '$entry' AND depart = STR_TO_DATE('$date_on', '%m/%d/%Y' ) ";
        $conn->query($sql);
    }

    
  }
  else{

     echo "You are UNAUTHORISED !! Please sign in";

  }


?>

<?php


if(!isset($_COOKIE["user"])) {
      #echo "Cookie named '" . $cookie_name . "' is not set!";



$user_name=$_POST['username'];
$password1=$_POST['password'];

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
    $sql = "SELECT FIRST_NAME , ID FROM passenger where email='$user_name' and password='$password1' ";

    $result = $conn->query($sql);   
    if ($result->num_rows > 0) {
        $disable_sign = True;



        $row = $result->fetch_assoc();

        $_SESSION["user"]= $row["FIRST_NAME"] ;
        $cookie_value3 =  $row["ID"] ;

        $cookie_name = "user";
        $cookie_name2="user_id";
        $cookie_name3="pass_id";

        $cookie_value = $_SESSION["user"];
        $cookie_value2 = $user_name;
        //$row["ID"] ;

        
        setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
        setcookie($cookie_name2, $cookie_value2, time() + (86400 * 30), "/"); // 86400 = 1 day
        setcookie($cookie_name3, $cookie_value3, time() + (86400 * 30), "/"); // 86400 = 1 day





        #echo "hiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiii";
        echo "<form class=\"navbar-form navbar-right form-signin\" action=\"list_available.php\" method=\"POST\">
                <div class=\"dropdown\">
  <button class=\"btn btn-default dropdown-toggle\" type=\"button\" id=\"dropdownMenu1\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"true\">
    Hi ".
       
            $_SESSION["user"]
      

    ."<span class=\"caret\"></span>
  </button>
  <ul class=\"dropdown-menu\" aria-labelledby=\"dropdownMenu1\">

  <li><a href=\"ticket_list.php\">Orders</a></li>
    <li role=\"separator\" class=\"divider\"></li>
    <li><a href=\"logout.php\">Sign Out</a></li>

  </ul>
</div>
              </form>";
      
    } 
    else {
        echo "Authentication Failed";
        echo '<br/>';
        echo '<a href="index.php">Click here to go back </a>';
        session_unset();
        session_destroy();
    }
}


} 

?>

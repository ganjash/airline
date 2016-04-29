<?php

// remove all session variables


if (isset($_COOKIE['user'])) {
    setcookie('user', null, -1, '/');
    unset($_COOKIE['user']);
	setcookie('user_id', null, -1, '/');
    unset($_COOKIE['user_id']);
	setcookie('pass_id', null, -1, '/');
    unset($_COOKIE['pass_id']);


	}

    session_unset(); 

// destroy the session 
session_destroy(); 
$url = 'http://localhost:600/airline/index.php'; 
header( "Location: $url" );



?>

</body>
</html>
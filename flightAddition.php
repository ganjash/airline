<?php 

$flight_no = $_POST["flight_no"];
$airways_id = $_POST["airways_id"];
$capacity = $_POST["capacity"];
$origin = $_POST["origin"];
$desti = $_POST["desti"];
$depart = intval($_POST["depart"]);
$dates = array();
for ($i=0; $i < $depart ; $i++ ) { 
   array_push($dates, $_POST["date".$i]) ;
   #echo"<br> ".$dates[$i] ;
}

#KEY : flight_no Value :AA333
#KEY : airways_id Value :250
#KEY : capacity Value :250
#KEY : origin Value :WA
#KEY : desti Value :TX
#KEY : depart Value :3
#KEY : date0 Value :05/01/2016
#KEY : date1 Value :05/02/2016
#KEY : date2 Value :05/03/2016





#foreach ($_POST as $key => $value) {
#	echo "KEY : ".$key." Value :".$value ."<br>";
#	# code...
# }

$servername = "localhost";
$dbadmin = "root";
$password = "root";
$dbname = "airline";




   if(strcmp($_COOKIE["user_id"], "admin@airline.com") == 0)
   {


		   // Create connection
		$conn = new mysqli($servername, $dbadmin, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		    
		}
		 else {








   		 #$sql =  "INSERT INTO flights ( `FLIGHT_NO`, `AIRWAYS_ID`,`CAPACITY`, `ORIGIN`, `DESTINATION`) VALUES "."('$flight_no', '$airways_id', '$capacity', '$origin', '$desti')" ;
		 $sql =  "INSERT INTO `flights` ( `FLIGHT_NO`, `AIRWAYS_ID`,`CAPACITY`, `ORIGIN`, `DESTINATION`) VALUES ('$flight_no', '$airways_id', '$capacity', '$origin', '$desti')" ;
		if ($conn->query($sql) === TRUE) {
	                echo "<h1>Flight has been added</h1>";
	                
	                #echo "";
	       }
	      
	    else {
	                var_dump(http_response_code(500));
	                #return;

	         }

	         
      
        $str1 = "INSERT INTO flight_available (`FLIGHT_ID`, `DEPART`, `SEATS_BOOKED`) VALUES ";
        
         
	    $str2 = "";
        $i=0;
        for( $i = 0;$i < $depart -1; $i++)
        {
          $str2 = $str2 . "('$flight_no', STR_TO_DATE('".$dates[$i]."','%m/%d/%Y') , '0')," ;
        
        }

         $str2 = $str2 . "('$flight_no', STR_TO_DATE('".$dates[$i]."','%m/%d/%Y') , '0')" ;
         $str1 = $str1 . $str2 ;

         $sql = $str1 ;

         if ($conn->query($sql) === TRUE) {
                echo "<br> <h1>flights Availability added</h1>";
                
                #echo "";
            }
        else {
                var_dump(http_response_code(500));

          }

        

     }

	   
	}
	else
	{
		echo "You are Unauthorized";
	}	


?>
<?php

if(isset($_COOKIE["user"])) {

$origin=$_POST['origin'];
$desti=$_POST['desti'];
$date_on=$_POST['date_on'];
#$adults=$_POST['adults'];     
#$children=$_POST['children'];
$entry=$_POST['entry'];
$seats=array();
$total=array();
$remain=array();
$pass_id=$_COOKIE["pass_id"];
$total_ppl = $_POST["total_ppl"];
$total_ppl = intval($total_ppl);


#$origin='CA';
#$desti='TX';
#$date_on="04/30/2016";
#$adults="3";
#$children="1";
#$entry="aa123";
#$total_ppl = $_POST["total_ppl"];




$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "airline";
 
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);

}
 else {

    $sql = "select t.seat_no from ticket t where t.flight_no = '$entry' and t.date = STR_TO_DATE('$date_on','%m/%d/%Y') and t.from='$origin' and t.to = '$desti'";


    $result = $conn->query($sql);   
        if ($result->num_rows > 0) {
            

          while($row = $result->fetch_assoc()) {
            #echo $row["seat_no"];
            array_push($seats, intval($row["seat_no"]));
        }     

    }
       


    $sql = "select f.capacity -sum(fa.seats_booked)  AS 'available' from flights f , flight_available fa where f.flight_no = fa.flight_id AND fa.depart = STR_TO_DATE('$date_on','%m/%d/%Y') AND fa.flight_id = '$entry'";

      $result = $conn->query($sql);   
              if ($result->num_rows > 0) {
                  
      ##################

                $row = $result->fetch_assoc() ;

                  $total = range(1, intval($row["available"])) ;
                       

          }
          $remain = array_diff($total, $seats);

  






    
      

        $str1 = "INSERT INTO TICKET (`TICKET_ID`, `FLIGHT_NO`, `PASSENGER_ID`, `FROM`, `TO`, `DATE`, `SEAT_NO`) VALUES ";
        #$str2 = "(NULL, '$entry', '$pass_id', '$origin', '$desti', STR_TO_DATE('$date_on','%m/%d/%Y') , '".$remain[i]."')," ;

        $str2 = "";
        $i=1;
     
        foreach ($remain as $key => $value) {
               
          $str2 = $str2 . "(NULL, '$entry', '$pass_id', '$origin', '$desti', STR_TO_DATE('$date_on','%m/%d/%Y') , '".$value."')," ;
          $i++;
          if($i > $total_ppl){
            break;
          }

        }
        $str2 = substr_replace($str2 ,"",-1);


         $str1 = $str1 . $str2 ;

         $sql = $str1 ;


         #echo $sql;


         if ($conn->query($sql) === TRUE) {
                echo "<h1>Your Ticket Have Been Booked</h1>";
                echo "<br><h5>Click on orders to View Tickets</h5>";
                #echo "";
            }
        else {
                var_dump(http_response_code(404));

          }

       
        $sql = "UPDATE flight_available SET seats_booked = seats_booked + ".$total_ppl ." where flight_id = '$entry' AND depart = STR_TO_DATE('$date_on', '%m/%d/%Y' ) ";
        $conn->query($sql);


  }
}
else{
  echo "<h1>echo You are UNAUTHORISED !! Please sign in </h1>";
}
  


#INSERT INTO `airline`.`ticket` (`TICKET_ID`, `FLIGHT_NO`, `PASSENGER_ID`, `FROM`, `TO`, `DATE`, `SEAT_NO`) VALUES (NULL, 'aa131', '123', 'FL', 'NY', '2016-04-30', '12'), (NULL, 'aa131', '123', 'FL', 'NY', '2016-04-30', '13');

#(NULL, 'aa131', '123', 'FL', 'NY', '2016-04-30', '12'),
#(NULL, 'aa131', '123', 'FL', 'NY', '2016-04-30', '13')


?>

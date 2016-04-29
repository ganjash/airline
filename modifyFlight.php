
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- <link rel="icon" href="docs/favicon.ico"> -->

    <title>Carousel Template for Bootstrap</title>
 <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">

    <!-- select2 -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/css/select2.min.css" rel="stylesheet" />

    <!-- Bootstrap core CSS -->
    <link href="docs/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MyStylings CSS -->
    <link href="./mystyles.css" rel="stylesheet">


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="docs/assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="docs/assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="docs/assets/js/ie-emulation-modes-warning.js"></script>


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Custom styles for this template -->
    <link href="carousel.css" rel="stylesheet">
  </head>

  <body >




<?php

if(strcmp($_COOKIE["user_id"], "admin@airline.com") != 0){
   echo "YOU ARE AUTHORIZED";
   return ;
}

?>



    
    <!-- NAVBAR
     ================================================== -->
    <div class="container theme-showcase" role="main">
    <div class="navbar-wrapper">
      <div class="container">

        <nav class="navbar navbar-inverse navbar-static-top">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <!-- <a class="navbar-brand" href="#">Fligh High</a> -->
            </div>
            <div id="navbar" class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                <li class="active"><a href="index.php">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#contact">Contact</a></li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li role="separator" class="divider"></li>
                    <li class="dropdown-header">Nav header</li>
                    <li><a href="#">Separated link</a></li>
                    <li><a href="#">One more separated link</a></li>
                  </ul>
                </li>
              </ul>



              <?php 
              

                if(  !isset($_COOKIE["user"]) ){ ?>

              <div id="change">
              <form class="navbar-form navbar-right form-signin">
                
                <div class="form-group">
                  <label for="inputEmail" class="sr-only">Email address</label>
                  <input type="email" name="username" placeholder="Email" class="form-control" id="uname" required autofocus>
                </div>
                <div class="form-group">
                  <label for="inputPassword" class="sr-only">Password</label>
                  <input type="password" name="password" placeholder="Password" class="form-control " id="paswd" required>
                </div>
                <button type="button" class="btn btn-success" onclick="submit_sign()" >Signin</button>
              </form>
            </div>

              <?php } 
              else{ ?>

                <form class="navbar-form navbar-right form-signin" action="list_available.php" method="POST">
                <div class="dropdown">
  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
    Hi
      <?php   
            echo $_COOKIE["user"] ;
            #echo $_SESSION["user"] ;
      ?>

    <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
    <li><a href="ticket_list.php">Orders</a></li>


 <?php 
                  $admin_email = "admin@airline.com"; 
                  #echo "<h1>". strcmp($_COOKIE["user_id"], $admin_email) == 0 . "</h1>";
                  
                  if( strcmp($_COOKIE["user_id"], $admin_email) == 0) 
                  {    echo "";
                    ?>


                    <li role="separator" class="divider"></li>
                    <li><a href="adminOperations.php">Admin</a></li>
                     
                   <?php   }?>


    <li role="separator" class="divider"></li>
    <li><a href="logout.php">Sign Out</a></li>
  </ul>
</div>
              </form>

             <?php   } ?>

              

            </div>
          </div>
        </nav>

      </div>
    </div>


<br><br><br><br><br>

<div id="status_msg">



</div>


        <h1>LIST OF FLIGHTS</h1>
 

    

      




     

<?php

echo "<form class=\"form-inline\">";
        echo "<div style='float:right;'> ";
        echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
        echo "<label> Search </label>&nbsp;&nbsp;&nbsp;&nbsp;<input type='text' id='search' placeholder='Type to search'>";
        echo "</div>";
        echo "</form>";

echo '</br>';

//print_r($_POST);
 
$servername = "localhost";
$dbadmin = "root";
$password = "root";
$dbname = "airline";


$FLIGHT_NO = "";
$AIRWAYS_ID = "";
$CAPACITY="";
$ORIGIN = "";
$DESTINATION = "";

// Create connection
$conn = new mysqli($servername, $dbadmin, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    
}
 else {
    $sql = "SELECT f.*,a.airways_name AS 'Airways' from flights f , airways a WHERE a.ID=f.AIRWAYS_ID";
    $result = $conn->query($sql);   
    if ($result->num_rows > 0) {
        


        echo "LIST OF AVAILABLE FLIGHTS <br>";


echo '</br></br>';
?>

 <div class="container">
          <div class="row row-centered">
              <div class="col-xs-4 col-centered"></div>
              <input class="btn btn-primary" value="Modify Flight" onclick="flightDelete()">
              <input class="btn btn-danger" value="Delete Flight" onclick="flightDelete()">
          </div>
        </div>


<?php

echo '</br>';
        //session_start();
        /*$sql1 = "SELECT * FROM users";
        $result = $conn->query($sql); */  
        #echo "<form onsubmit = \"return check_sign()\">";
        echo "<table id='table' class=\"table table-hover\" cellspacing=\"0\" width=\"100%\" >";

        echo "<thead>";
        echo "<tr>";
        echo "<th onclick='sort_table(list_avail, 0, asc1); asc1 *= -1; asc2 = 1; asc3 = 1;asc4 = 1;asc5 = 1;asc6 = 1;asc7 = 1;'> Select</th>";
        echo "<th onclick='sort_table(list_avail, 1, asc2); asc2 *= -1; asc1 = 1; asc3 = 1;asc4 = 1;asc5 = 1;asc6 = 1;asc7 = 1;'> Flight ID </th>";
        echo "<th onclick='sort_table(list_avail, 2, asc3); asc3 *= -1; asc2 = 1; asc1 = 1;asc4 = 1;asc5 = 1;asc6 = 1;asc7 = 1;'> Airways ID </th>";
        echo "<th onclick='sort_table(list_avail, 3, asc4); asc4 *=  -1; asc2 = 1; asc3 = 1;asc1 = 1;asc5 = 1;asc6 = 1;asc7 = 1;'> Airways </th>";
        echo "<th onclick='sort_table(list_avail, 4, asc5); asc5 *=  -1; asc2 = 1; asc3 = 1;asc4 = 1;asc1 = 1;asc6 = 1;asc7 = 1;'> Capacity </th>";
        echo "<th onclick='sort_table(list_avail, 5, asc6); asc6 *=  -1; asc2 = 1; asc3 = 1;asc4 = 1;asc5 = 1;asc1 = 1;asc7 = 1;'> Origin </th>";
        echo "<th onclick='sort_table(list_avail, 6, asc7); asc7 *=  -1; asc2 = 1; asc3 = 1;asc4 = 1;asc5 = 1;asc6 = 1;asc1 = 1;'> Destination </th>";
        echo "</tr>";
        echo "</thead>";


        echo "<tbody id='list_avail'>";
        
        while($row = $result->fetch_assoc()) {

            echo "<tr >";
            echo "<td> <input  type=\"radio\" name=\"flight-entry\" value='". $row["FLIGHT_NO"]  ."'> "." <td>" . $row["FLIGHT_NO"]. " <td> ".$row["AIRWAYS_ID"]  ." <td>".$row["Airways"].  " <td> ".$row["CAPACITY"]  ."  <td>".$row["ORIGIN"]. "  <td>".$row["DESTINATION"];
            echo "</tr>";
            //$_SESSION["user"]=$row["username"];
            //$_SESSION["password"]=$row["password"];
        }

        

        echo "</tbody>";
        echo "</table>";
        ?>
        

      

        <?php
        #echo "</form>";
        #echo "<h1> HIIIIIIIIII USER </h1>";
        #echo "<h1>".$_COOKIE["user"]."</h1>";
        #echo "<h1> ". $_SESSION["user"] ."</h1>";

         ?>
    <!-- <button class="btn btn-success" >Reload page</button>  -->

    <?php




    }
    else{
         echo "NO FLIGHTS FOR SELECTED OPTIONS";
    }
  }
   
?>


      
<!-- /form -->    





 <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    
    <script>window.jQuery || document.write('<script src="docs/assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
    
    <script src="docs/dist/js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="docs/assets/js/vendor/holder.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="docs/assets/js/ie10-viewport-bug-workaround.js"></script>
    <!-- select 2 js --> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/js/select2.min.js"></script>  
    <script>

     var list_avail, asc1 = 1,
            asc2 = 1,
            asc3 = 1,
            asc4 = 1,
            asc5 = 1,
            asc6 = 1,
            asc7 = 1;
        window.onload = function () {
            list_avail = document.getElementById("list_avail");
            var $rows = $('#table tr');
            $('#search').keyup(function() {
                var val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();
                
                $rows.show().filter(function() {
                    var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
                    return !~text.indexOf(val);
                }).hide();
            });   
        }

function sort_table(tbody, col, asc){
    var rows = tbody.rows, rlen = rows.length, arr = new Array(), i, j, cells, clen;
    // fill the array with values from the table
    for(i = 0; i < rlen; i++){
    cells = rows[i].cells;
    clen = cells.length;
    arr[i] = new Array();
        for(j = 0; j < clen; j++){
                 if( isNaN(cells[j].innerHTML)){
                    arr[i][j] = cells[j].innerHTML;
                }
                else{
                    arr[i][j] = parseInt(cells[j].innerHTML);
                    
                }
        
        }
    }
    // sort the array by the specified column number (col) and order (asc)
    arr.sort(function(a, b){
        return (a[col] == b[col]) ? 0 : ((a[col] > b[col]) ? asc : -1*asc);
    });
    for(i = 0; i < rlen; i++){
        arr[i] = "<td>"+arr[i].join("</td><td>")+"</td>";
    }
    tbody.innerHTML = "<tr>"+arr.join("</tr><tr>")+"</tr>";
}






function submit_sign() {
  alert("hiiiii");
    var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
      document.getElementById("change").innerHTML = xhttp.responseText;
    }
  };

  xhttp.open("POST", "check_login.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  var str1 = "username=" + document.getElementById("uname").value ;
  var str1 = str1 + "&password=" + document.getElementById("paswd").value;
  alert(str1);

  xhttp.send(str1);

}




    function check_sign(){
      var x = checkCookie("user");
    if( x == false){
      alert("You need to sign in first");
      return false;
    }
    else{
      //x[0].innerHTML = "WELCOME !!!"; 
      alert("welcome");
          var xx= document.getElementsByName("entry");
        var yy;
        for( i = 0; i < xx.length; i++)
         {
             //alert(xx[i].value);
             if(xx[i].checked){
                
                break;
               }

           }

           var zz = $(xx[i]).parent().siblings();
           //alert($(zz[1]).text());
////////////////////////////////////

       
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
           
            document.getElementById("status_msg").innerHTML = "<div class=\"alert alert-success fade in\"><a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a><strong>Success!</strong> Ticket :  is Booked !! </div>";
        //setTimeout("location.reload()",3000);
        setTimeout("window.location.assign('http://localhost:600/airline/ticket_list.php')",3000);
    }

    
  };

  xhttp.open("POST", "ticketCreate.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  var str1 = "entry=" + $(zz[0]).text() + "&origin=" + $(zz[2]).text()+"&desti=" + $(zz[3]).text()+ "&date_on=" + document.getElementById("date_on").textContent +"&total_ppl=" + document.getElementById("total_ppl").textContent ;
  //alert(str1);
  xhttp.send(str1);





///////////////////////////////////////

      //return false;
    }
     
 }

 function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i=0; i<ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

function checkCookie(cname) {
    var user=getCookie(cname);
    if (user != "") {
        return true;
    } else {
        return false;
    }
}



function flightDelete() {

    if (confirm("Do you want to Delete Flight ? It cancels the flight on all AVAILABLE days.") == true) {
       

   var xx= document.getElementsByName("flight-entry");
   var yy;
    for( i = 0; i < xx.length; i++)
     {
         //alert(xx[i].value);
         if(xx[i].checked){
            yy = xx[i].value;
            break;
           }

       }
       //alert(yy);

  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
           
            document.getElementById("status_msg").innerHTML = "<div class=\"alert alert-success fade in\"><a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a><strong>Success!</strong> Flight    id: "+ yy +" is Cancelled !! </div>";
        setTimeout("location.reload()",3000);
    }
    else if(xhttp.status == 500){
              document.getElementById("status_msg").innerHTML = "<div class=\"alert alert-danger fade in\"><a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a><strong>Failed!</strong> You Can't Delete Flight    id: "+ yy +" error:"+xhttp.responseText   +"  </div>";
        //setTimeout("location.reload()",3000);
    }
    
  };

  xhttp.open("POST", "flightDelete.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  var str1 = "flightid=" + yy ;
  xhttp.send(str1);

    } 
else {
        alert("You pressed Cancel!") ;
    }
    


}


 </script>

</div>
  </body>
</html>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="docs/favicon.ico">

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
                <li class="active"><a href="index.html">Home</a></li>
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
                <a href="register_form.html" style="color:#4da6ff;">Register Now! </a>&nbsp;&nbsp;&nbsp;&nbsp;
                <div class="form-group">
                  <label for="inputEmail" class="sr-only">Email address</label>
                  <input type="email" name="username" placeholder="Email" class="form-control" id="uname" required autofocus>
                </div>
                <div class="form-group">
                  <label for="inputPassword" class="sr-only">Password</label>
                  <input type="password" name="password" placeholder="Password" class="form-control " id="paswd" required>
                </div>
                <input type="submit" class="btn btn-success" onclick="submit_sign()" value="Signin " >
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


    <!-- Carousel
    ================================================== -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <div class="item active">
          <img class="first-slide" src="docs/assets/img/virgin_air.jpg" alt="First slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>Fly high</h1>
              <p>Note: If you're viewing this page via a <code>file://</code> URL, the "next" and "previous" Glyphicon buttons on the left and right might not load/display properly due to web browser security rules.</p>
              <p><a class="btn btn-lg btn-primary" href="#" role="button">Sign up today</a></p>
            </div>
          </div>
        </div>
        <div class="item">
          <img class="second-slide" src="docs/assets/img/jetblue_air.jpg" alt="Second slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>Fly high</h1>
              <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
              <p><a class="btn btn-lg btn-primary" href="#" role="button">Learn more</a></p>
            </div>
          </div>
        </div>
        <div class="item">
          <img class="third-slide" src="docs/assets/img/american_air.jpg" alt="Third slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>Fly High</h1>
              <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
              <p><a class="btn btn-lg btn-primary" href="#" role="button">Browse gallery</a></p>
            </div>
          </div>
        </div>
      </div>
      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div><!-- /.carousel -->


    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->
<form id = "form-fligts" role="form" method="POST" onsubmit = "return validate()" action="list_available.php">
     <div class="form-inline" >

      <div class="form-group">
        <label> Journey Date</label>  
         <input id="datepicker1" class="form-control" name="date_on" /> 
      </div>
      <div class="form-group">
        <label> Return Date</label>
         <input id="datepicker2" class="form-control" disabled='disabled' /> 
      </div>
     </div> <!-- form class for email n paswd -->
     <br>
     <label class="radio-inline">
      <input type="radio" name="toandfro" value="one" id=1 checked >One way
    </label>
    <label class="radio-inline">
      <input type="radio" name="toandfro" value="two" id=2 >Two way
    </label>
    <br>
    <br>
     <div class="form-inline">
        <label> From</label>
         <select class="form-control states" name="origin" id="from"></select> 
     </div>
    <br>
      <div class="form-inline">
        <label> To</label>
         <select  class="form-control states" name="desti" id="to"></select> 
     </div>
    <br>
    <div class="form-inline">
   <div class="form-group">
   <label for="sel1">Adults(18):</label>
    <select class="form-control" name="adults" id="adult">
    <option>1</option>
    <option>2</option>
    <option>3</option>
    <option>4</option>
    <option>5</option>
    <option>6</option>
    <option>7</option>
    <option>8</option>
    <option>9</option>
    </select>
   </div>
    <div class="form-group">
   <label for="sel1">Children:</label>
    <select class="form-control" name="children" id="child">
    <option>0</option>
    <option>1</option>
    <option>2</option>
    <option>3</option>
    <option>4</option>
    <option>5</option>
    <option>6</option>
    <option>7</option>
    <option>8</option>
    <option>9</option>
    </select>
   </div>  
    </div>
    <br>
    <input type="submit" class="btn btn-primary" value="Find Flights!">
</form>



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
  
 function validate(){

 // To and From dates
   var to_date = new Date(document.getElementById("datepicker1").value);
   var return_date = new Date(document.getElementById("datepicker2").value);
   var err_block = "<div class='err' id='home_error'>";
   var str_err = String("");
   var flag = 0;

   //date is invalid
    if ( isNaN( to_date.getTime() ) ) {  
        
        str_err = str_err + "Please select Date<br>";
        flag = 1;
     }
      

   if(return_date <= to_date){
    //alert(return_date);
     str_err = str_err + "return date should be after journey date<br>";
     flag = 1;
   }

   if( ($("#from").val()).localeCompare( $("#to").val()   ) == 0 ){
     str_err = str_err + "Choose a Different Origin or Destination, both can't be same <br>";
     flag = 1;
   }

    //alert(str_err);


   if(flag == 1){

      if( $("#home_error").length != 0){

            $("#home_error").empty();
            $("#home_error").append(str_err);
      }
      else{
            $("form#form-fligts").prepend("<div class='err' id='home_error'>" + str_err + "</div><br>");
      }
    
    return false;
   }

 }



  $(document).ready(function() {

    //LIST OF COUNTRIES

    var data = [
    {
        text: "Alabama",
        id: "AL"
    },
    {
        text: "Alaska",
        id: "AK"
    },
    {
        text: "American Samoa",
        id: "AS"
    },
    {
        text: "Arizona",
        id: "AZ"
    },
    {
        text: "Arkansas",
        id: "AR"
    },
    {
        text: "California",
        id: "CA"
    },
    {
        text: "Colorado",
        id: "CO"
    },
    {
        text: "Connecticut",
        id: "CT"
    },
    {
        text: "Delaware",
        id: "DE"
    },
    {
        text: "District Of Columbia",
        id: "DC"
    },
    {
        text: "Federated States Of Micronesia",
        id: "FM"
    },
    {
        text: "Florida",
        id: "FL"
    },
    {
        text: "Georgia",
        id: "GA"
    },
    {
        text: "Guam",
        id: "GU"
    },
    {
        text: "Hawaii",
        id: "HI"
    },
    {
        text: "Idaho",
        id: "ID"
    },
    {
        text: "Illinois",
        id: "IL"
    },
    {
        text: "Indiana",
        id: "IN"
    },
    {
        text: "Iowa",
        id: "IA"
    },
    {
        text: "Kansas",
        id: "KS"
    },
    {
        text: "Kentucky",
        id: "KY"
    },
    {
        text: "Louisiana",
        id: "LA"
    },
    {
        text: "Maine",
        id: "ME"
    },
    {
        text: "Marshall Islands",
        id: "MH"
    },
    {
        text: "Maryland",
        id: "MD"
    },
    {
        text: "Massachusetts",
        id: "MA"
    },
    {
        text: "Michigan",
        id: "MI"
    },
    {
        text: "Minnesota",
        id: "MN"
    },
    {
        text: "Mississippi",
        id: "MS"
    },
    {
        text: "Missouri",
        id: "MO"
    },
    {
        text: "Montana",
        id: "MT"
    },
    {
        text: "Nebraska",
        id: "NE"
    },
    {
        text: "Nevada",
        id: "NV"
    },
    {
        text: "New Hampshire",
        id: "NH"
    },
    {
        text: "New Jersey",
        id: "NJ"
    },
    {
        text: "New Mexico",
        id: "NM"
    },
    {
        text: "New York",
        id: "NY"
    },
    {
        text: "North Carolina",
        id: "NC"
    },
    {
        text: "North Dakota",
        id: "ND"
    },
    {
        text: "Northern Mariana Islands",
        id: "MP"
    },
    {
        text: "Ohio",
        id: "OH"
    },
    {
        text: "Oklahoma",
        id: "OK"
    },
    {
        text: "Oregon",
        id: "OR"
    },
    {
        text: "Palau",
        id: "PW"
    },
    {
        text: "Pennsylvania",
        id: "PA"
    },
    {
        text: "Puerto Rico",
        id: "PR"
    },
    {
        text: "Rhode Island",
        id: "RI"
    },
    {
        text: "South Carolina",
        id: "SC"
    },
    {
        text: "South Dakota",
        id: "SD"
    },
    {
        text: "Tennessee",
        id: "TN"
    },
    {
        text: "Texas",
        id: "TX"
    },
    {
        text: "Utah",
        id: "UT"
    },
    {
        text: "Vermont",
        id: "VT"
    },
    {
        text: "Virgin Islands",
        id: "VI"
    },
    {
        text: "Virginia",
        id: "VA"
    },
    {
        text: "Washington",
        id: "WA"
    },
    {
        text: "West Virginia",
        id: "WV"
    },
    {
        text: "Wisconsin",
        id: "WI"
    },
    {
        text: "Wyoming",
        id: "WY"
    }
];


    $("#datepicker1").datepicker({minDate: new Date()});
    $("#datepicker2").datepicker({minDate: new Date()});

$("tr").click(function(){

   $("tr").removeClass("selected");

   $("this").addClass("selected");


});

     $(".states").select2({
     data: data
    });
    $("input[name='toandfro']").change(function(event){
        if(event.target.id == 2){
             $("#datepicker2").removeAttr('disabled');
             //var x = datesel();
             }
        else{
              $("#datepicker2").attr('disabled','disabled');

         }
       
    });

  });


function submit_sign() {
  if(document.getElementById("uname").value == "" || document.getElementById("paswd").value == "")
  {
    return false;
  }
  //alert("hiiiii");
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
  //alert(str1);

  xhttp.send(str1);

}
 

  
  </script>
</div>
  </body>
</html>


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
	<link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
    
    <link rel="stylesheet" href="normalize.css">

    
        <link rel="stylesheet" href="style.css">
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
              <form class="navbar-form  form-signin">
                
                <img src="flyhigh.jpg" alt="logo" height="40" >

                </form>
            </div>
          </div>
        </nav>

      </div>
    </div>

<br><br><br><br><br>
        <h1>Modify Flight</h1>
 

    
    <div class="form">
      
     
      
      
        <div id="signup">   
          
          
          <form action="flightUpdation.php" method="post">
          
          <div class="top-row">
            <div class="field-wrap">
               <strong> Flight ID</strong><span class="req">*</span>
              <input type="text" name="flight_no" required autocomplete="off" value=<?php echo "'".trim($_GET["flight_no"]) ."'";      ?> />
            </div>
        
            <div class="field-wrap">
                <strong>Airways ID</strong><span class="req">*</span>
              <input type="text" name="airways_id" required autocomplete="off" value=<?php echo "'".trim($_GET["airways_id"]) ."'";      ?>/>
            </div>
          </div>

          <div class="field-wrap">
              <strong>Flight Capacity</strong><span class="req">*</span>
            <input type="text" name="capacity" required autocomplete="off" value=<?php echo "'".trim($_GET["capacity"]) ."'";      ?>/>
          </div>
          
          <div class="field-wrap">
              <strong>Origin</strong><span class="req">*</span>
            <input type="text"  name="origin" required autocomplete="off" value=<?php echo "'".trim($_GET["origin"]) ."'";      ?>/>
          </div>
		  
		  <div class="field-wrap">
              <strong>Destination</strong><span class="req">*</span>
            <input type="text"  name="desti" required autocomplete="off" value=<?php echo "'".$_GET["desti"] ."'";      ?>/>
          </div>
		       

          <button type="submit" class="button button-block"  />Update </button>
          
          </form>

        </div>
        
        
        
      
      
</div> <!-- /form -->
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

        <script src="js/index.js"></script>

    
    
    

                                                
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

     <script src="./validations.js"></script>
	 <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
    
    <link rel="stylesheet" href="normalize.css">

    
        <link rel="stylesheet" href="style.css">

      <script>
function displayVals() {
  var singleValues = $( "#days_avail" ).val();

   
  
  var count = parseInt(singleValues);
  //alert(count);
  
  $("#datesection").empty();
 for(var y = 0 ; y < count ; y++)
  {

     $("#datesection").append("<input name=date"+ y +"  type='text'>");


  }
  

}

$(document).ready(function(){
       


$( "select" ).change( displayVals );
displayVals();   

    //$("#days_avail option:selected").val()
});
</script>  
  
  
</div>
  </body>
</html>

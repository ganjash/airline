  
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
    

    $("#dob").datepicker();
    //$("#list_flights").DataTable();
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
 

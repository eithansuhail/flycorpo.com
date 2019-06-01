<?php  
session_start();

?>
<?php


require "init.php";
include("functions.php");
$count = $_SESSION['count'];



$allAirports = curl("https://webapi.etravos.com/Flights/AvailableFlights?source=".$_SESSION['from_address']."&destination=".$_SESSION['to_address']."&journeyDate=".$_SESSION['start_Date']."&tripType=".$_SESSION['tripType']."&flightType=2&adults=".$_SESSION['Adults']."&children=".$_SESSION['Children']."&infants=".$_SESSION['Infant']."&travelClass=".$_SESSION['classvalue']."&userType=5&returnDate=".$_SESSION['endDate'], [], "application/json", false, [
    "ConsumerKey: ",
    "ConsumerSecret: ",
    // "Accept-Encoding:gzip, deflate",
]);
    // $o = gzdecode($allAirports);


$IntBaseFare=0;
$IntTax=0;
$IntAmount=0;

$obj = json_decode($allAirports);

?>
<!DOCTYPE HTML>
<html>

<head>
    <title>Flycorpo</title>


    <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
    <meta name="keywords" content="flybuzz" />
    <meta name="description" content="flybuzz">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- GOOGLE FONTS -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,300,600' rel='stylesheet' type='text/css'>
    <!-- /GOOGLE FONTS -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/font-awesome.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/schemes/bright-turquoise.css"/> </head>
    <link rel="stylesheet" href="css/mystyles.css">
    <script src="js/modernizr.js"></script>
<link rel="stylesheet" href="css/schemes/bright-turquoise.css"/>

</head>

<body onload="active_nav()"  style="display:none;">

    <!-- FACEBOOK WIDGET -->
    <div id="fb-root"></div>
    <script>
        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.0";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>
    <!-- /FACEBOOK WIDGET -->
    <div class="global-wrap">
          <?php include("header.php"); ?>

     <section class="flight-search-result">
        <div  class="container">

            
            <div class="row">
                
                <div class="col-md-9">
                <div class="row">
                    <div class="search-result-header m-t-15   m-b-15">
                      <div class="col-md-8 padding-0">
                          <div class="pull-left">
                                <div class="payment-header">
                                  <h5>Payment options </h5> <p class="grey-text  pull-right"> &nbsp; Standed convenience of Rs. 270/Ticket has been added.</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-4 padding-0">
                          <div class="pull-right">
                              
                               <p class="grey-text"> This session will expire in: 16mins 11sec</p>
                                
              
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>



                    <?php

                    function str_replace_last( $search , $replace , $str ) {
    if( ( $pos = strrpos( $str , $search ) ) !== false ) {
        $search_length  = strlen( $search );
        $str    = substr_replace( $str , $replace , $pos , $search_length );
    }
    return $str;
}


     $key =$obj->InternationalFlights[$count];

     $FareDetails = $key->FareDetails;
     $ChargeableFares = $FareDetails->ChargeableFares;
     $ActualBaseFare = $ChargeableFares->ActualBaseFare;
      $FlightSegment = $key->IntOnward->FlightSegments[0];
    
    $AirLineName=$FlightSegment->AirLineName;
     $OperatingAirlineCode=$FlightSegment->OperatingAirlineCode;
     $OperatingAirlineFlightNumber =$FlightSegment->OperatingAirlineFlightNumber;
     $departdate = substr($FlightSegment->DepartureDateTime, 0,10);
     $departtime = substr($FlightSegment->DepartureDateTime, 11,5);
     $IntDepartureAirportName = $FlightSegment->IntDepartureAirportName;

    $Duration = $FlightSegment->Duration;
    $ArrivalTime = substr($FlightSegment->ArrivalDateTime, 11,5);
    $ArrivalDate = substr($FlightSegment->ArrivalDateTime, 0,10);
    $count = count($FlightSegment);
    $IntArrivalAirportName = $FlightSegment->IntArrivalAirportName;

    $key1 = $key->FareDetails;
    $key2 = $key1->FareBreakUp;
    $key3 = $key2->FareAry[0];
    $IntBaseFare = $key3->IntBaseFare;
    $IntTax = $key3->IntTax;
    $IntYQTax = $key3->IntYQTax;
    $totaltax = $IntYQTax+ $IntTax  ;


    $key4 = $key3->IntTaxDataArray[0];
    $IntAmount = $key4->IntAmount;
    
?>




<?php 

if(isset($_SESSION['email'])){
  $usertype ='user';
  $booker_email = $_SESSION['email'];
}
else if (isset($_SESSION['agent_email'])){
  $usertype ='agent';
  $booker_email = $_SESSION['agent_email'];


}else {
  $usertype ='none';
  $booker_email= 'none';

}

$tripType = $_SESSION['tripType'];

 $query = "INSERT INTO `bookedflight`(AirLineName, OperatingAirlineCode, OperatingAirlineFlightNumber, departtime, departdate, IntDepartureAirportName, Duration, ArrivalTime, ArrivalDate, IntArrivalAirportName, IntBaseFare, IntTax, IntAmount,  usertype,booker_email,triptype,flighttype) 
    VALUES ('$AirLineName', '$OperatingAirlineCode', '$OperatingAirlineFlightNumber', '$departtime', '$departdate', '$IntDepartureAirportName', '$Duration','$ArrivalTime','$ArrivalDate','$IntArrivalAirportName','$IntBaseFare','$IntTax','$IntAmount','$usertype','$booker_email','$tripType','2')";
            
                  if (mysqli_query($link,$query)) {
                    
                    
                    $flag = 1;
                     $sql= "SELECT id FROM `bookedflight` where AirLineName= '$AirLineName' order by id desc";
                      $result1=mysqli_query($link,$sql);
                      $numm= mysqli_num_rows($result1); 
                      $row = mysqli_fetch_assoc($result1);
                              if ($numm) {    
                                $tid = $row["id"]; 
                                $_SESSION['tid'] =$tid ;
                                  // echo $row["id"];      
                                 
                              }
                              else{
                                $condition=6;
                               echo "flight data not inserted";

                              }

                  } else {
                      // echo $link->error;
                      // echo "<p>There was a problem signing you up - please try again later.</p>";
                    $flag = 2;
                    echo $link->error;
                      
                  }


$flag = 0;
$arrayname="";
$arrayemail="";
$arraydob="";
$arrayage="";
$arrayaddress="";
$arraymobile="";
$arraygender = "";
$arraypassport = "";


if ($_SESSION['Adults']>0) {

$c = 1;
 ${"title" . $c} =$_POST["title".$c];
 ${"adultmobile" . $c} =$_POST["adultmobile".$c];
 ${"adultemail" . $c} =$_POST["adultemail".$c];
 ${"afirstname" . $c} =$_POST["afirstname".$c];
 ${"alastname" . $c} =$_POST["alastname".$c];
 ${"address" . $c} =$_POST["address".$c];
 ${"gender" . $c} =$_POST["gender".$c];
 ${"age" . $c} =$_POST["age".$c]; 
 ${"dob" . $c} =$_POST["dob".$c];



 $title = ${"title" . $c};
 $afirstname = ucwords(${"afirstname" . $c});
 $alastname = ucwords(${"alastname" . $c});
 $address = ucwords(${"address" . $c});
 
  $state = $_POST["state"];
   $pincode = $_POST["pincode"];

 $Address = $address;
 $Mobile = ${"adultmobile" . $c};
 $Email = ${"adultemail" . $c};
 $age = ${"age" . $c};
 $gender = ${"gender" . $c};
 $dob = ${"dob" . $c};

  ${"avisatype" . $c} =$_POST["avisatype".$c];
 ${"apassportno" . $c} =$_POST["apassportno".$c];
 ${"aissueplace" . $c} =$_POST["aissueplace".$c];
 ${"aissuedate" . $c} =$_POST["aissuedate".$c];
 ${"aexpirydate" . $c} =$_POST["aexpirydate".$c];

 $visatype = ${"avisatype" . $c};
 $passportno = ${"apassportno" . $c};
 $issueplace = ${"aissueplace" . $c};
 $issuedate = ${"aissuedate" . $c};
 $expirydate = ${"aexpirydate" . $c};


 $passengertype = "Adult";

 $arrayname .= $title."|".$afirstname."|".$alastname."|adt~";
 $arraypassport .= $visatype."|".$passportno."|".$issueplace."|". $issuedate."|".$expirydate."~";
 $arrayemail .= $email."~";
 $arraydob .= $dob."~";
 $arrayage .= $age."~";
 $arrayaddress .= $address."~";
 $arraymobile .= $mobile."~";
 $arraygender .= $gender."~";


$query = "INSERT INTO `passengers_table`( title, email, firstname,lastname,  mobile,age,gender,  dob,passengertype,tid,address) 
    VALUES ('$title','$Email','$afirstname','$alastname','$Mobile','$age','$gender','$dob','$passengertype','$tid','$Address')";
            
                  if (mysqli_query($link,$query)) {
                      // echo "data updated";
                  }
                  else {
                      // echo $link->error;
                      // echo "<p>There was a problem signing you up - please try again later.</p>";
                    
                    echo $link->error;
                     }



    # code...
for ($i=1; $i <$_SESSION['Adults'] ; $i++) { 
    $c=$i+1;



 ${"title" . $c} =$_POST["title".$c];
 // ${"adultmobile" . $c} =$_POST["adultmobile".$c];
 // ${"adultemail" . $c} =$_POST["adultemail".$c];
 ${"afirstname" . $c} =$_POST["afirstname".$c];
 ${"alastname" . $c} =$_POST["alastname".$c];
 
 ${"gender" . $c} =$_POST["gender".$c];
 ${"age" . $c} =$_POST["age".$c]; 
 ${"dob" . $c} =$_POST["dob".$c];



 $title = ${"title" . $c};
 $afirstname = ucwords(${"afirstname" . $c});
 $alastname = ucwords(${"alastname" . $c});
 // $address = ucwords(${"address" . $c});
 
 

 // $Address = $address;
 // $mobile = ${"adultmobile" . $c};
 // $email = ${"adultemail" . $c};
 $age = ${"age" . $c};
 $gender = ${"gender" . $c};
 $dob = ${"dob" . $c};

  ${"avisatype" . $c} =$_POST["avisatype".$c];
 ${"apassportno" . $c} =$_POST["apassportno".$c];
 ${"aissueplace" . $c} =$_POST["aissueplace".$c];
 ${"aissuedate" . $c} =$_POST["aissuedate".$c];
 ${"aexpirydate" . $c} =$_POST["aexpirydate".$c];

 $visatype = ${"avisatype" . $c};
 $passportno = ${"apassportno" . $c};
 $issueplace = ${"aissueplace" . $c};
 $issuedate = ${"aissuedate" . $c};
 $expirydate = ${"aexpirydate" . $c};


 $passengertype = "Adult";

 $arrayname .= $title."|".$afirstname."|".$alastname."|adt~";
 $arraypassport .= $visatype."|".$passportno."|".$issueplace."|". $issuedate."|".$expirydate."~";
 // $arrayemail .= $email."~";
 $arraydob .= $dob."~";
 $arrayage .= $age."~";
 // $arrayaddress .= $address."~";
 // $arraymobile .= $mobile."~";
 $arraygender .= $gender."~";


$query = "INSERT INTO `passengers_table`( title, email, firstname,lastname,  mobile,age,gender,  dob,passengertype,tid,address) 
    VALUES ('$title','$email','$afirstname','$alastname','$mobile','$age','$gender','$dob','$passengertype','$tid','$address')";
            
                  if (mysqli_query($link,$query)) {
                      // echo "data updated";
                  }
                  else {
                      // echo $link->error;
                      // echo "<p>There was a problem signing you up - please try again later.</p>";
                    
                    echo $link->error;
                     }



    
} 
$arrayname = str_replace_last("~","",$arrayname);
$arrayemail = str_replace_last("~","",$arrayemail);
$arraydob = str_replace_last("~","",$arraydob);
$arrayage = str_replace_last("~","",$arrayage);
$arrayaddress = str_replace_last("~","",$arrayaddress);
$arraymobile = str_replace_last("~","",$arraymobile);
$arraygender = str_replace_last("~","",$arraygender);
$arraypassport = str_replace_last("~","",$arraypassport);

}
 

 if ($_SESSION['Children']>0) {
    $arrayname .="~";
$arrayemail .="~";
$arraydob .="~";
$arrayage .="~";
// $arrayaddress .="~";
$arraymobile .="~";
$arraygender .="~";
$arraypassport.="~";
for ($i=0; $i <$_SESSION['Children'] ; $i++) { 
    $c=$i+1;



 ${"ctitle" . $c} =$_POST["ctitle".$c];
 // ${"cmobile" . $c} =$_POST["cmobile".$c];
 // ${"cemail" . $c} =$_POST["cemail".$c];
 ${"cfirstname" . $c} =$_POST["cfirstname".$c];
 ${"clastname" . $c} =$_POST["clastname".$c];
 // ${"caddress" . $c} =$_POST["caddress".$c];
 ${"cgender" . $c} =$_POST["cgender".$c];
 ${"cage" . $c} =$_POST["cage".$c]; 
 ${"cdob" . $c} =$_POST["cdob".$c];
 // ${"caddress" . $c} =$_POST["caddress".$c];

 $title = ${"ctitle" . $c};
 $afirstname = ucwords(${"cfirstname" . $c});
 $alastname = ucwords(${"clastname" . $c});
 // $address = ucwords(${"caddress" . $c});

 // // $Address = $address;
 // $mobile = ${"cmobile" . $c};
 // $email = ${"cemail" . $c};
 $age = ${"cage" . $c};
 $gender = ${"cgender" . $c};
 $dob = ${"cdob" . $c};
 $passengertype = "Child";

 ${"cvisatype" . $c} =$_POST["cvisatype".$c];
 ${"cpassportno" . $c} =$_POST["cpassportno".$c];
 ${"cissueplace" . $c} =$_POST["cissueplace".$c];
 ${"cissuedate" . $c} =$_POST["cissuedate".$c];
 ${"cexpirydate" . $c} =$_POST["cexpirydate".$c];

 $visatype = ${"cvisatype" . $c};
 $passportno = ${"cpassportno" . $c};
 $issueplace = ${"cissueplace" . $c};
 $issuedate = ${"cissuedate" . $c};
 $expirydate = ${"cexpirydate" . $c};

 $arraypassport .= $visatype."|".$passportno."|".$issueplace."|". $issuedate."|".$expirydate."~";

 $arrayname .= $title."|".$afirstname."|".$alastname."|chd~";
 $arrayemail .= $email."~";
 $arraydob .= $dob."~";
 $arrayage .= $age."~";
 // $arrayaddress .= $address."~";
 $arraymobile .= $mobile."~";
 $arraygender .= $gender."~";



$query = "INSERT INTO `passengers_table`( title, firstname,lastname,  age,gender,  dob,passengertype,tid) 
    VALUES ('$title','$afirstname','$alastname','$age','$gender','$dob','$passengertype','$tid')";
            
                  if (mysqli_query($link,$query)) {
                      // echo "data updated";
                  }
                  else {
                      // echo $link->error;
                      // echo "<p>There was a problem signing you up - please try again later.</p>";
                    
                    echo $link->error;
                     }



    
} 
$arrayname = str_replace_last("~","",$arrayname);
// $arrayemail = str_replace_last("~","",$arrayemail);
$arraydob = str_replace_last("~","",$arraydob);
$arrayage = str_replace_last("~","",$arrayage);
// $arrayaddress = str_replace_last("~","",$arrayaddress);
// $arraymobile = str_replace_last("~","",$arraymobile);
$arraygender = str_replace_last("~","",$arraygender);
$arraypassport = str_replace_last("~","",$arraypassport);
}
 

  if ($_SESSION['Infant']>0) {
    $arrayname .="~";
// $arrayemail .="~";
$arraydob .="~";
$arrayage .="~";
// $arrayaddress .="~";
// $arraymobile .="~";
$arraygender .="~";
$arraypassport.="~";

for ($i=0; $i <$_SESSION['Infant'] ; $i++) { 
    $c=$i+1;



 ${"ititle" . $c} =$_POST["ititle".$c];
 // ${"imobile" . $c} =$_POST["imobile".$c];
 // ${"iemail" . $c} =$_POST["iemail".$c];
 ${"ifirstname" . $c} =$_POST["ifirstname".$c];
 ${"ilastname" . $c} =$_POST["ilastname".$c];
 // ${"iaddress" . $c} =$_POST["iaddress".$c];
 ${"igender" . $c} =$_POST["igender".$c];
 ${"iage" . $c} =$_POST["iage".$c]; 
 ${"idob" . $c} =$_POST["idob".$c];
 // ${"iaddress" . $c} =$_POST["iaddress".$c];

 $title = ${"ititle" . $c};
 $afirstname = ucwords(${"ifirstname" . $c});
 $alastname = ucwords(${"ilastname" . $c});
 // $address = ucwords(${"iaddress" . $c});

 $Address = $address;
 // $mobile = ${"imobile" . $c};
 // $email = ${"iemail" . $c};
 $age = ${"iage" . $c};
 $gender = ${"igender" . $c};
 $dob = ${"idob" . $c};
 $passengertype = "Infant";

  ${"ivisatype" . $c} =$_POST["ivisatype".$c];
 ${"ipassportno" . $c} =$_POST["ipassportno".$c];
 ${"iissueplace" . $c} =$_POST["iissueplace".$c];
 ${"iissuedate" . $c} =$_POST["iissuedate".$c];
 ${"iexpirydate" . $c} =$_POST["iexpirydate".$c];

 $visatype = ${"ivisatype" . $c};
 $passportno = ${"ipassportno" . $c};
 $issueplace = ${"iissueplace" . $c};
 $issuedate = ${"iissuedate" . $c};
 $expirydate = ${"iexpirydate" . $c};
 $arraypassport .= $visatype."|".$passportno."|".$issueplace."|". $issuedate."|".$expirydate."~";
 

 $arrayname .= $title."|".$afirstname."|".$alastname."|inf~";
 // $arrayemail .= $email."~";
 $arraydob .= $dob."~";
 $arrayage .= $age."~";
 // $arrayaddress .= $address."~";
 // $arraymobile .= $mobile."~";
 $arraygender .= $gender."~";



$query = "INSERT INTO `passengers_table`( title, firstname,lastname, age,gender,  dob,passengertype,tid) 
    VALUES ('$title','$afirstname','$alastname','$age','$gender','$dob','$passengertype','$tid')";
            
                  if (mysqli_query($link,$query)) {
                      // echo "data updated";
                  }
                  else {
                      // echo $link->error;
                      // echo "<p>There was a problem signing you up - please try again later.</p>";
                    
                    echo $link->error;
                     }



    
} 
$arrayname = str_replace_last("~","",$arrayname);
// $arrayemail = str_replace_last("~","",$arrayemail);
$arraydob = str_replace_last("~","",$arraydob);
$arrayage = str_replace_last("~","",$arrayage);
// $arrayaddress = str_replace_last("~","",$arrayaddress);
// $arraymobile = str_replace_last("~","",$arraymobile);
$arraygender = str_replace_last("~","",$arraygender);
$arraypassport = str_replace_last("~","",$arraypassport);
}


echo $arrayname."<br>";
echo $arrayemail."<br>";
echo $arraydob."<br>";
echo $arrayaddress."<br>";
echo $arrayage."<br>";
echo $arraymobile."<br>";
echo $arraygender."<br>";
echo $arraypassport."<br>";
?>



<?php

$to = "admin@flycorpo.com,eithansuhail@gmail.com";




// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
date_default_timezone_set("Asia/Kolkata");

$message .= 'Time: '.date("F j, Y, g:i a") . "<br>\r\n";
$message .= 'name: '.$arrayname . "<br>\r\n";
$message .= 'mobile: '.$Mobile . "<br>\r\n";
$message .= 'age: '.$arrayage . "<br>\r\n";
$message .= 'gender: '.$arraygender . "<br>\r\n";
$message .= 'city: '.$Address . "<br>\r\n";
$message .= 'state: '.$state . "<br>\r\n";
$message .= 'pincode: '.$pincode . "<br>\r\n";

$message .= 'from_address: '.$_SESSION['from_address'] . "<br>\r\n";
$message .= 'to_address: '.$_SESSION['to_address']. "<br>\r\n";
$message .= 'tripType: '.$tripType . "<br>\r\n";
$message .= 'visa: '.$arraypassport . "<br>\r\n";

$subject = "New Booking request at ".date("F j, Y, g:i a");

// $headers .= 'Cc: myboss@example.com' . "\r\n";


$result = mail($to,$subject,$message,$headers);
if(!$result) {   
     echo "Error";   
} else {
      echo "mail has been  sent";
 }
?>



<!-- get fare rule -->


<?php 
  $keyfare = $key->OriginDestinationoptionId->Key;
   $airlineIdfare =  $FlightSegment->OperatingAirlineCode;
   $couponFarefare = $FlightSegment->RPH;
   $flightIdfare = $FlightSegment->OperatingAirlineFlightNumber;
   $providerfare = $key->Provider;

   $classCode = $FlightSegment->BookingClassFare->ClassType;
$url = "https://webapi.etravos.com/Flights/GetFareRule?key=".$keyfare."&airlineId=".$airlineIdfare."&flightId=".$flightIdfare."&classCode=".$classCode."&service=2&provider=".$providerfare."&tripType=1&couponFare=".$couponFarefare."&userType=5&user=";

// echo $url;
$fares = curl($url, [], "application/json", false, [
    "ConsumerKey: 816EDF7E056EB6E0D84B997CAB3F000C4ABE2FC7",
    "ConsumerSecret: 0EC008F43044CADBA7D71D50CCBC6948F756799F",
    "Accept-Encoding:gzip, deflate",
]);
    $o23 = gzdecode($fares);
    $farerule = json_decode($o23);

 // echo "fsarerule" . $farerule;
?>


<?php


foreach ($key->IntOnward->FlightSegments as $ft) {
  $IntArrivalAirportName = $ft->IntArrivalAirportName;
}


        include("functions.php");
          $to = $_SESSION['to_address'];
                        $query = "SELECT * FROM `flightdetails` WHERE AirportCode = '$to'";
                        // echo $query;
    $result=mysqli_query($link,$query);
    if (mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_assoc($result);
       $desti =  $row['City'];
      }
                              
                            
// echo($IntArrivalAirportName);



  $jsontax = array(
    "DeviceModel"=> null,
    "DeviceOS"=> null,
    "DeviceOSVersion"=> null,
    "DeviceToken"=> null,
    "ApplicationType"=> 0,
    "TicketRefNo"=> null,
    "LastTicketDate"=> null,
    "FrequentFlyerDetails"=> null,
    "IsBlockTicket"=> false,
    "IsAgentPaymentGateway"=> false,
    "BookingResponseXML"=> null,
    "IsOfflineBooking"=> false,
    "EcommerceSegment"=> null,
    "BookingRefNo"=> null,
    "BookingStatus"=> 0,
    "APIRefNo"=> null,
    "Provider"=> $providerfare,
    "PaymentId"=> null,
    "Names"=> "",
    "ages"=> "",
    "Genders"=> "",
    "telePhone"=> "",
    "ISD"=> null,
    "MobileNo"=> "",
    "EmailId"=> "",
    "dob"=> "",
    "psgrtype"=> "",
    "Address"=> null,
    "State"=> null,
    "City"=> null,
    "PostalCode"=> $pincode,
    "PassportDetails"=> null,
    "SMSUsageCount"=> 0,
    "ImagePath"=> "",
    "ImagePathRet"=> null,
    "Rule"=> null,
  "key"=> $key->OriginDestinationoptionId->Key,
    "RuleRet"=> null,
    "keyRet"=> null,
    "FlightId"=> "",
    "FlightIdRet"=> null,
    "OnwardFlightSegments"=> [],
    "ReturnFlightSegments"=> null,
  "FareDetails"=> array(
    "ChargeableFares"=> array(
                    "ActualBaseFare"=> $key->FareDetails->ChargeableFares->ActualBaseFare,
                    "Tax"=> $key->FareDetails->ChargeableFares->Tax,
                    "STax"=> $key->FareDetails->ChargeableFares->STax,
                    "SCharge"=> $key->FareDetails->ChargeableFares->SCharge,
                    "TDiscount"=> $key->FareDetails->ChargeableFares->TDiscount,
                    "TPartnerCommission"=> $key->FareDetails->ChargeableFares->TPartnerCommission,
                    "NetFare"=> $key->FareDetails->ChargeableFares->NetFare,
                    "Conveniencefee"=> $key->FareDetails->ChargeableFares->Conveniencefee,
                    "ConveniencefeeType"=> $key->FareDetails->ChargeableFares->ConveniencefeeType,
                    "PartnerFareDatails"=> array(
                        "NetFares"=> $key->FareDetails->ChargeableFares->PartnerFareDatails->NetFares,
                        "Commission"=> $key->FareDetails->ChargeableFares->PartnerFareDatails->Commission,
                        "CommissionType"=> $key->FareDetails->ChargeableFares->PartnerFareDatails->CommissionType
                    )
                ),
                "NonchargeableFares"=> array(
                    "TCharge"=> $key->FareDetails->NonchargeableFares->TCharge,
                    "TMarkup"=> $key->FareDetails->NonchargeableFares->TMarkup,
                    "TSdiscount"=> $key->FareDetails->NonchargeableFares->TSdiscount
                ),
                "FareBreakUp"=> array(
                    "FareAry"=> [
                        array(
                            "IntPassengerType"=> $key->FareDetails->FareBreakUp->FareAry[0]->IntPassengerType,
                            "IntBaseFare"=> $key->FareDetails->FareBreakUp->FareAry[0]->IntBaseFare,
                            "IntPassengerCount"=> $key->FareDetails->FareBreakUp->FareAry[0]->IntPassengerCount,
                            "IntTax"=> $key->FareDetails->FareBreakUp->FareAry[0]->IntTax,
                            "IntYQTax"=> $key->FareDetails->FareBreakUp->FareAry[0]->IntYQTax,
                            "IntTaxDataArray"=> [
                                array(
                                    "IntCountry"=> $key->FareDetails->FareBreakUp->FareAry[0]->IntTaxDataArray[0]->IntCountry,
                                    "IntAmount"=> $key->FareDetails->FareBreakUp->FareAry[0]->IntTaxDataArray[0]->IntAmount
                                )
                            ],
                            "OtherCharges"=> [
                                array(
                                    "Amount"=> $key->FareDetails->FareBreakUp->FareAry[0]->OtherCharges[0]->Amount,
                                    "ChargeCode"=> $key->FareDetails->FareBreakUp->FareAry[0]->OtherCharges[0]->ChargeCode,
                                    "ChargeType"=> $key->FareDetails->FareBreakUp->FareAry[0]->OtherCharges[0]->ChargeType
                                )
                            ]
                        )
                    ]
                ),
                "OCTax"=> $key->FareDetails->OCTax,
                "PartnerFee"=> $key->FareDetails->PartnerFee,
                "PLBEarned"=> $key->FareDetails->PLBEarned,
                "TdsOnPLB"=> $key->FareDetails->TdsOnPLB,
                "Bonus"=> $key->FareDetails->Bonus,
                "TotalFare"=> $key->FareDetails->TotalFare,
                "ResponseStatus"=> $key->FareDetails->ResponseStatus,
                "Status"=> $key->FareDetails->Status,
                "IsGSTMandatory"=> $key->FareDetails->IsGSTMandatory,
                "Message"=> $key->FareDetails->Message,
                "RequiredFields"=> $key->FareDetails->RequiredFields
  ),
    "BookingDate"=> date('d-m-Y'),
    "PromoCode"=> null,
    "PromoCodeAmount"=> 0.0,
    "PostMarkup"=> 0.0,
    "IsLCC"=> $key->IsLCC,
    "IsLCCRet"=> null,
    "BookedFrom"=> null,
    "CreatedById"=> 0,
    "IsWallet"=> false,
    "IsPartnerAgentDetails"=> null,
    "OcTax"=> $key->FareDetails->OCTax,
    "CurrencyID"=> null,
    "CurrencyValue"=> null,
    "PLBEarned"=> 0.0,
    "TdsOnPLB"=> 0.0,
    "ActualBaseFare"=> $key->FareDetails->ChargeableFares->ActualBaseFare,
    "Tax"=> $ChargeableFares->Tax,
    "NetFare"=> 0.0,
    "Bonus"=> 0.0,
    "STax"=> $ChargeableFares->STax,
    "SCharge"=> $ChargeableFares->SCharge,
    "TDiscount"=> $ChargeableFares->TDiscount,
    "TPartnerCommission"=> 0.0,
    "TCharge"=> 0.0,
    "TMarkup"=> 0.0,
    "TSdiscount"=> 0.0,
    "PartnerFee"=> 0.0,
    "TransactionId"=> null,
    "Conveniencefee"=> 10.0,
    "ConveniencefeeType"=> 1,
    "ConvenienceFeeTotal"=> 0.0,
    "EProductPrice"=> 0.0,
    "PLBEarnedRet"=> 0.0,
    "TdsOnPLBRet"=> 0.0,
    "ActualBaseFareRet"=> 0.0,
    "NetFareRet"=> 0.0,
    "BonusRet"=> 0.0,
    "TaxRet"=> 0.0,
    "STaxRet"=> 0.0,
    "SChargeRet"=> 0.0,
    "TDiscountRet"=> 0.0,
    "TSDiscountRet"=> 0.0,
    "TPartnerCommissionRet"=> 0.0,
    "EProductPriceRet"=> 0.0,
    "TChargeRet"=> 0.0,
    "TMarkupRet"=> 0.0,
    "ConveniencefeeRet"=> 0.0,
    "PartnerFeeRet"=> 0.0,
    "ConveniencefeeTypeRet"=> 0,
    "GSTDetails"=> null,
    "SSRRequests"=> null,
    "Tickets"=> null,
    "IsHoldAllowedRet"=> false,
    "IsHoldAllowed"=> false,
    "IsGSTMandatoryRet"=> false,
    "IsGSTMandatory"=> false,
    "RequiredFields"=> null,
    "RequiredFieldsRet"=> null,
  "Source"=> $_SESSION['from_address'],
    "SourceName"=> $IntDepartureAirportName,
   "Destination"=> $_SESSION['to_address'] ,
   "DestinationName"=> $desti,
   "JourneyDate"=> $_SESSION['start_Date'],
    "ReturnDate"=>$_SESSION['endDate'],
    "TripType"=> $_SESSION['tripType'],
    "FlightType"=> 2,
    "AdultPax"=> $_SESSION['Adults'],
    "ChildPax"=> $_SESSION['Children'],
    "InfantPax"=> $_SESSION['Infant'],
    "TravelClass"=>  $_SESSION['classvalue'],
    "IsNonStopFlight"=> false,
    "FlightTimings"=> null,
    "AirlineName"=> $AirLineName,
    "User"=> "",
    "UserType"=> 5,
    "IsGDS"=> null,
    "AffiliateId"=> "",
    "WebsiteUrl"=> null,
    "MultiFlightsSearch"=> null
);

 foreach ($key->IntOnward->FlightSegments as $flightSegment) {
    $jsontax['OnwardFlightSegments'][]= array(
      "AirEquipType"=> $flightSegment->AirEquipType,
      "ArrivalAirportCode"=> $flightSegment->ArrivalAirportCode,
      "ArrivalDateTime"=> $flightSegment->ArrivalDateTime,
      "ArrivalDateTimeZone"=> $flightSegment->ArrivalDateTimeZone,
      "DepartureAirportCode"=> $flightSegment->DepartureAirportCode,
      "DepartureDateTime"=> $flightSegment->DepartureDateTime,
      "DepartureDateTimeZone"=> $flightSegment->DepartureDateTimeZone,
      "Duration"=> $flightSegment->Duration,
      "FlightNumber"=> $flightSegment->FlightNumber,
      "OperatingAirlineCode"=> $flightSegment->OperatingAirlineCode,
      "OperatingAirlineFlightNumber"=> $flightSegment->OperatingAirlineFlightNumber,
      "RPH"=> $flightSegment->RPH,
      "StopQuantity"=> $flightSegment->StopQuantity,
      "AirLineName"=> $AirLineName,
      "AirportTax"=> $flightSegment->AirLineName,
      "ImageFileName"=> $flightSegment->ImageFileName,
      "ImagePath"=> $flightSegment->ImagePath,
      "ViaFlight"=> $flightSegment->ViaFlight,
      "Discount"=> $flightSegment->Discount,
      "AirportTaxChild"=> $flightSegment->AirportTaxChild,
      "AirportTaxInfant"=> $flightSegment->AirportTaxInfant,
      "AdultTaxBreakup"=> $flightSegment->AdultTaxBreakup,
      "ChildTaxBreakup"=> $flightSegment->ChildTaxBreakup,
      "InfantTaxBreakup"=> $flightSegment->InfantTaxBreakup,
      "OcTax"=> $flightSegment->OcTax,
       "BookingClass"=> array(
       "Availability"=> $flightSegment->BookingClass->Availability,
       "ResBookDesigCode"=> $flightSegment->BookingClass->ResBookDesigCode,
       "IntBIC"=> ""
       ),
       "BookingClassFare"=> array(
       "AdultFare"=> $flightSegment->BookingClassFare->AdultFare,
       "Bookingclass"=> $flightSegment->BookingClassFare->Bookingclass,
       "ClassType"=> $flightSegment->BookingClassFare->ClassType,
       "Farebasiscode"=> $flightSegment->BookingClassFare->Farebasiscode,
       "Rule"=>  $flightSegment->BookingClassFare->Rule,
       "AdultCommission"=> null,
       "ChildCommission"=> null,
       "CommissionOnTCharge"=> null,
       "ChildFare"=> $flightSegment->BookingClassFare->ChildFare,
       "InfantFare"=> $flightSegment->BookingClassFare->InfantFare
       ),
       "IntNumStops"=> null,
       "IntOperatingAirlineName"=> null,
       "IntArrivalAirportName"=> $flightSegment->IntArrivalAirportName,
       "IntDepartureAirportName"=> $flightSegment->IntDepartureAirportName,
       "IntMarketingAirlineCode"=> $flightSegment->IntMarketingAirlineCode,
       "IntLinkSellAgrmnt"=> null,
       "IntConx"=> null,
       "IntAirpChg"=> null,
       "IntInsideAvailOption"=> null,
       "IntGenTrafRestriction"=> null,
       "IntDaysOperates"=> null,
       "IntJourneyTime"=> null,
       "IntEndDate"=> null,
       "IntStartTerminal"=> "",
       "IntEndTerminal"=> "",
       "IntFltTm"=> null,
       "IntLSAInd"=> null,
       "IntMile"=> "0",
       "Cabin"=> null,
       "itineraryNumber"=> null,
       "BaggageAllowed"=> array(
       "CheckInBaggage"=> $flightSegment->BaggageAllowed->CheckInBaggage,
       "HandBaggage"=> $flightSegment->BaggageAllowed->HandBaggage
       ),
       "AccumulatedDuration"=> $flightSegment->AccumulatedDuration

    );
  }




 
$jsonDataEncoded1 = json_encode($jsontax);
// print_r($jsonDataEncoded1);
$url = 'https://webapi.etravos.com/Flights/GetTaxDetails';
$headers =  [
    "ConsumerKey: 816EDF7E056EB6E0D84B997CAB3F000C4ABE2FC7",
    "ConsumerSecret: 0EC008F43044CADBA7D71D50CCBC6948F756799F",
    'Content-Type: application/json',
      "Accept-Encoding:gzip, deflate",
];
    
 
$result = curl($url, $jsonDataEncoded1, "application/json", true,$headers);
$result1 = gzdecode($result);


$taxarray = json_decode($result1);

// var_dump($taxarray);

$_SESSION['TotalFare']= $taxarray->TotalFare;



?>

<br>
<br>
<br>


<?php

if ($_SESSION['tripType']==1) {
  echo " 1";


$jsonData = array(

 "ActualBaseFare"=> $taxarray->ChargeableFares->ActualBaseFare,
 "ActualBaseFareRet"=> 0,
 "Address"=> $Address,
 "AdultPax"=> $_SESSION['Adults'],
 "ages"=> $arrayage,
 "BookedFrom"=> null,
 "BookingDate"=> date('d-m-Y'),
 "ChildPax"=> $_SESSION['Children'],
 "City"=> $Address,
 "Conveniencefee"=> 0,
 "ConveniencefeeRet"=> 0,
 "Destination"=> $_SESSION['to_address'] ,
 "DestinationName"=> $desti,
 "dob"=> $arraydob,
 "EmailId"=> $Email,
 "FareDetails"=> null,
 "FlightId"=> $key->OriginDestinationoptionId->Id,
 "FlightIdRet"=> null,
 "FlightType"=> 2,
  "EProductPrice"=> 0,
 "EProductPriceRet" =>0,
 "Genders"=> $arraygender,
 "GSTDetails"=>
 array(
 "GSTCompanyAddress"=> "Hyderabad",
 "GSTCompanyContactNumber"=> "9234234234",
 "GSTCompanyName"=> "i2space",
 "GSTNumber"=> "534234234233",
 "GSTCompanyEmail"=> "guru.m@i2space.com",
 "GSTFirstName"=> "guru",
 "GSTLastName"=> "bharat"
 ),
 "InfantPax"=> $_SESSION['Infant'],
 "IsLCC"=> $key->IsLCC,
 "IsLCCRet"=> null,
 "IsNonStopFlight"=> false,
 "JourneyDate"=> $_SESSION['start_Date'],
 "key"=> $key->OriginDestinationoptionId->Key,
 "keyRet"=> null,
 "MobileNo"=> $Mobile,
 "Names"=> $arrayname,
 "OcTax"=> $FlightSegment->AirEquipType,
 "OnwardFlightSegments"=> [
 ],
 "PassportDetails"=> $arraypassport,
 "PostalCode"=> $pincode,
 "Provider"=> $key->Provider,
 "psgrtype"=> "",
 "ReturnDate"=> $_SESSION['endDate'],
 "ReturnFlightSegments"=> null,
 "Rule"=> $key->OriginDestinationoptionId->Key,
 "RuleRet"=> null,
 "SCharge"=> $taxarray->ChargeableFares->SCharge,
 "SChargeRet"=> 0,
 "SMSUsageCount"=> 0,
   "State"=> $state,
 "Source"=> $_SESSION['from_address'],
 "SourceName"=> $IntDepartureAirportName,
 "STax"=> $taxarray->ChargeableFares->STax,
 "STaxRet"=> 0,
 "Tax"=> $taxarray->ChargeableFares->Tax,
 "TaxRet"=> 0,
 "TCharge"=> $taxarray->NonchargeableFares->TCharge,
 "TChargeRet"=> 0,
 "TDiscount"=> $taxarray->ChargeableFares->TDiscount,
 "TDiscountRet"=> 0,
 "telePhone"=> "8888888888",
 "TMarkup"=> $taxarray->NonchargeableFares->TMarkup, 
 "TMarkupRet"=> 0,
 "TPartnerCommission"=> $taxarray->ChargeableFares->TPartnerCommission,
 "TPartnerCommissionRet"=> 0,
 "TravelClass"=> $_SESSION['classvalue'],
 "TripType"=> $_SESSION['tripType'],
 "TSdiscount"=> 0,
 "TSDiscountRet"=> 0,
 "User"=> "",
 "UserType"=> 5


);

foreach ($key->IntOnward->FlightSegments as $flightSegment) {
    $jsonData['OnwardFlightSegments'][]= array(
      "AirEquipType"=> $flightSegment->AirEquipType,
      "ArrivalAirportCode"=> $flightSegment->ArrivalAirportCode,
      "ArrivalDateTime"=> $flightSegment->ArrivalDateTime,
      "ArrivalDateTimeZone"=> $flightSegment->ArrivalDateTimeZone,
      "DepartureAirportCode"=> $flightSegment->DepartureAirportCode,
      "DepartureDateTime"=> $flightSegment->DepartureDateTime,
      "DepartureDateTimeZone"=> $flightSegment->DepartureDateTimeZone,
      "Duration"=> $flightSegment->Duration,
      "FlightNumber"=> $flightSegment->FlightNumber,
      "OperatingAirlineCode"=> $flightSegment->OperatingAirlineCode,
      "OperatingAirlineFlightNumber"=> $flightSegment->OperatingAirlineFlightNumber,
      "RPH"=> $flightSegment->RPH,
      "StopQuantity"=> $flightSegment->StopQuantity,
      "AirLineName"=> $AirLineName,
      "AirportTax"=> $flightSegment->AirLineName,
      "ImageFileName"=> $flightSegment->ImageFileName,
      "ImagePath"=> $flightSegment->ImagePath,
      "ViaFlight"=> $flightSegment->ViaFlight,
      "Discount"=> $flightSegment->Discount,
      "AirportTaxChild"=> $flightSegment->AirportTaxChild,
      "AirportTaxInfant"=> $flightSegment->AirportTaxInfant,
      "AdultTaxBreakup"=> $flightSegment->AdultTaxBreakup,
      "ChildTaxBreakup"=> $flightSegment->ChildTaxBreakup,
      "InfantTaxBreakup"=> $flightSegment->InfantTaxBreakup,
      "OcTax"=> $flightSegment->OcTax,
       "BookingClass"=> array(
       "Availability"=> $flightSegment->BookingClass->Availability,
       "ResBookDesigCode"=> $flightSegment->BookingClass->ResBookDesigCode,
       "IntBIC"=> ""
       ),
       "BookingClassFare"=> array(
       "AdultFare"=> $flightSegment->BookingClassFare->AdultFare,
       "Bookingclass"=> $flightSegment->BookingClassFare->Bookingclass,
       "ClassType"=> $flightSegment->BookingClassFare->ClassType,
       "Farebasiscode"=> $flightSegment->BookingClassFare->Farebasiscode,
       "Rule"=>  $flightSegment->BookingClassFare->Rule,
       "AdultCommission"=> null,
       "ChildCommission"=> null,
       "CommissionOnTCharge"=> null,
       "ChildFare"=> $flightSegment->BookingClassFare->ChildFare,
       "InfantFare"=> $flightSegment->BookingClassFare->InfantFare
       ),
       "IntNumStops"=> null,
       "IntOperatingAirlineName"=> null,
       "IntArrivalAirportName"=> $flightSegment->IntArrivalAirportName,
       "IntDepartureAirportName"=> $flightSegment->IntDepartureAirportName,
       "IntMarketingAirlineCode"=> $flightSegment->IntMarketingAirlineCode,
       "IntLinkSellAgrmnt"=> null,
       "IntConx"=> null,
       "IntAirpChg"=> null,
       "IntInsideAvailOption"=> null,
       "IntGenTrafRestriction"=> null,
       "IntDaysOperates"=> null,
       "IntJourneyTime"=> null,
       "IntEndDate"=> null,
       "IntStartTerminal"=> "",
       "IntEndTerminal"=> "",
       "IntFltTm"=> null,
       "IntLSAInd"=> null,
       "IntMile"=> "0",
       "Cabin"=> null,
       "itineraryNumber"=> null,
       "BaggageAllowed"=> array(
       "CheckInBaggage"=> $flightSegment->BaggageAllowed->CheckInBaggage,
       "HandBaggage"=> $flightSegment->BaggageAllowed->HandBaggage
       ),
       "AccumulatedDuration"=> $flightSegment->AccumulatedDuration

    );
  }
  var_dump($jsonData);


$url = 'https://webapi.etravos.com/Flights/BlockFlightTicket';

$headers =  [
    "ConsumerKey: 816EDF7E056EB6E0D84B997CAB3F000C4ABE2FC7",
    "ConsumerSecret: 0EC008F43044CADBA7D71D50CCBC6948F756799F",
    'Content-Type: application/json',
      "Accept-Encoding:gzip, deflate",
];


$ch = curl_init($url);
 
$jsonDataEncoded = json_encode($jsonData);
// print_r($jsonDataEncoded);
 
$result = curl($url, $jsonDataEncoded, "application/json", true,$headers);
    // $result1 = gzdecode($result);
    $ooo = gzdecode($result);

$response = json_decode($ooo);
// var_dump($response);
$ReferenceNo= $response->ReferenceNo;
$_SESSION['ReferenceNo'] =$ReferenceNo;
$BookingStatus= $response->BookingStatus;
$Message= $response->Message;
echo "ReferenceNo" . $ReferenceNo;


}

















if ($_SESSION['tripType']==2) {

  foreach ($key->IntReturn->FlightSegments as $ft) {
  $rIntArrivalAirportName = $ft->IntArrivalAirportName;
}

  echo "2";
  $rFlightSegments =$key->IntReturn->FlightSegments[0];

     // $rFareDetails = $rkey->FareDetails;
     // $ChargeableFares = $rFareDetails->ChargeableFares;
     // $rActualBaseFare = $rChargeableFares->ActualBaseFare;

     // $rFlightSegments = $rkey->FlightSegments;
    $keyfare = $key->OriginDestinationoptionId->Key;
   $airlineIdfare =  $FlightSegment->OperatingAirlineCode;
   $couponFarefare = $FlightSegment->RPH;
   $flightIdfare = $FlightSegment->OperatingAirlineFlightNumber;
   $providerfare = $key->Provider;

   $classCode = $FlightSegment->BookingClassFare->ClassType;
   $url = "https://webapi.etravos.com/Flights/GetFareRule?key=".$keyfare."&airlineId=".$airlineIdfare."&flightId=".$flightIdfare."&classCode=".$classCode."&service=2&provider=".$providerfare."&tripType=2&couponFare=".$couponFarefare."&userType=5&user=";
// echo $url;
$rfares = curl( $url,[], "application/json", false, [
    "ConsumerKey: 816EDF7E056EB6E0D84B997CAB3F000C4ABE2FC7",
    "ConsumerSecret: 0EC008F43044CADBA7D71D50CCBC6948F756799F",
    "Accept-Encoding:gzip, deflate",
]);
    $ro23 = gzdecode($rfares);
    $rfarerule = json_decode($ro23);
    // var_dump($rfarerule);




//     $rFlightSegment =$rkey->FlightSegments[0]; 


foreach ($key->IntOnward->FlightSegments as $ft) {
  $IntArrivalAirportName = $ft->IntArrivalAirportName;
}



  $rjsontax = array(
 
  "DeviceModel"=> null,
    "DeviceOS"=> null,
    "DeviceOSVersion"=> null,
    "DeviceToken"=> null,
    "ApplicationType"=> 0,
    "TicketRefNo"=> null,
    "LastTicketDate"=> null,
    "FrequentFlyerDetails"=> null,
    "IsBlockTicket"=> false,
    "IsAgentPaymentGateway"=> false,
    "BookingResponseXML"=> null,
    "IsOfflineBooking"=> false,
    "EcommerceSegment"=> null,
    "BookingRefNo"=> null,
    "BookingStatus"=> 0,
    "APIRefNo"=> null,
    "Provider"=> $providerfare,
    "PaymentId"=> null,
    "Names"=> "",
    "ages"=> "",
    "Genders"=> "",
    "telePhone"=> "",
    "ISD"=> null,
    "MobileNo"=> "",
    "EmailId"=> "",
    "dob"=> "",
    "psgrtype"=> "",
    "Address"=> null,
    "State"=> null,
    "City"=> null,
    "PostalCode"=> $pincode,
    "PassportDetails"=> null,
    "SMSUsageCount"=> 0,
    "ImagePath"=> "",
    "ImagePathRet"=> null,
    "Rule"=> $rfarerule,
    "key"=> $key->OriginDestinationoptionId->Key,
    "RuleRet"=> $rfarerule,
    "keyRet"=> $key->OriginDestinationoptionId->Key,
    "FlightId"=> "",
    "FlightIdRet"=> null,
    "OnwardFlightSegments"=> [],
    "ReturnFlightSegments"=> [],
    "FareDetails"=> array(
    "ChargeableFares"=> array(
                    "ActualBaseFare"=> $key->FareDetails->ChargeableFares->ActualBaseFare,
                    "Tax"=> $key->FareDetails->ChargeableFares->Tax,
                    "STax"=> $key->FareDetails->ChargeableFares->STax,
                    "SCharge"=> $key->FareDetails->ChargeableFares->SCharge,
                    "TDiscount"=> $key->FareDetails->ChargeableFares->TDiscount,
                    "TPartnerCommission"=> $key->FareDetails->ChargeableFares->TPartnerCommission,
                    "NetFare"=> $key->FareDetails->ChargeableFares->NetFare,
                    "Conveniencefee"=> $key->FareDetails->ChargeableFares->Conveniencefee,
                    "ConveniencefeeType"=> $key->FareDetails->ChargeableFares->ConveniencefeeType,
                    "PartnerFareDatails"=> array(
                        "NetFares"=> $key->FareDetails->ChargeableFares->PartnerFareDatails->NetFares,
                        "Commission"=> $key->FareDetails->ChargeableFares->PartnerFareDatails->Commission,
                        "CommissionType"=> $key->FareDetails->ChargeableFares->PartnerFareDatails->CommissionType
                    )
                ),
                "NonchargeableFares"=> array(
                    "TCharge"=> $key->FareDetails->NonchargeableFares->TCharge,
                    "TMarkup"=> $key->FareDetails->NonchargeableFares->TMarkup,
                    "TSdiscount"=> $key->FareDetails->NonchargeableFares->TSdiscount
                ),
                "FareBreakUp"=> array(
                    "FareAry"=> [
                        array(
                            "IntPassengerType"=> $key->FareDetails->FareBreakUp->FareAry[0]->IntPassengerType,
                            "IntBaseFare"=> $key->FareDetails->FareBreakUp->FareAry[0]->IntBaseFare,
                            "IntPassengerCount"=> $key->FareDetails->FareBreakUp->FareAry[0]->IntPassengerCount,
                            "IntTax"=> $key->FareDetails->FareBreakUp->FareAry[0]->IntTax,
                            "IntYQTax"=> $key->FareDetails->FareBreakUp->FareAry[0]->IntYQTax,
                            "IntTaxDataArray"=> [
                                array(
                                    "IntCountry"=> $key->FareDetails->FareBreakUp->FareAry[0]->IntTaxDataArray[0]->IntCountry,
                                    "IntAmount"=> $key->FareDetails->FareBreakUp->FareAry[0]->IntTaxDataArray[0]->IntAmount
                                )
                            ],
                            "OtherCharges"=> [
                                array(
                                    "Amount"=> $key->FareDetails->FareBreakUp->FareAry[0]->OtherCharges[0]->Amount,
                                    "ChargeCode"=> $key->FareDetails->FareBreakUp->FareAry[0]->OtherCharges[0]->ChargeCode,
                                    "ChargeType"=> $key->FareDetails->FareBreakUp->FareAry[0]->OtherCharges[0]->ChargeType
                                )
                            ]
                        )
                    ]
                ),
                "OCTax"=> $key->FareDetails->OCTax,
                "PartnerFee"=> $key->FareDetails->PartnerFee,
                "PLBEarned"=> $key->FareDetails->PLBEarned,
                "TdsOnPLB"=> $key->FareDetails->TdsOnPLB,
                "Bonus"=> $key->FareDetails->Bonus,
                "TotalFare"=> $key->FareDetails->TotalFare,
                "ResponseStatus"=> $key->FareDetails->ResponseStatus,
                "Status"=> $key->FareDetails->Status,
                "IsGSTMandatory"=> $key->FareDetails->IsGSTMandatory,
                "Message"=> $key->FareDetails->Message,
                "RequiredFields"=> $key->FareDetails->RequiredFields
  ),
    "BookingDate"=> date('d-m-Y'),
    "PromoCode"=> null,
    "PromoCodeAmount"=> 0.0,
    "PostMarkup"=> 0.0,
    "IsLCC"=> $key->IsLCC,
    "IsLCCRet"=> $key->IsLCC,
    "BookedFrom"=> null,
    "CreatedById"=> 0,
    "IsWallet"=> false,
    "IsPartnerAgentDetails"=> null,
    "OcTax"=> $key->FareDetails->OCTax,
    "CurrencyID"=> null,
    "CurrencyValue"=> null,
    "PLBEarned"=> 0.0,
    "TdsOnPLB"=> 0.0,
    "ActualBaseFare"=> $key->FareDetails->ChargeableFares->ActualBaseFare,
    "Tax"=> $ChargeableFares->Tax,
    "NetFare"=> 0.0,
    "Bonus"=> 0.0,
    "STax"=> $ChargeableFares->STax,
    "SCharge"=> $ChargeableFares->SCharge,
    "TDiscount"=> $ChargeableFares->TDiscount,
    "TPartnerCommission"=> 0.0,
    "TCharge"=> 0.0,
    "TMarkup"=> 0.0,
    "TSdiscount"=> 0.0,
    "PartnerFee"=> 0.0,
    "TransactionId"=> null,
    "Conveniencefee"=> 10.0,
    "ConveniencefeeType"=> 1,
    "ConvenienceFeeTotal"=> 0.0,
    "EProductPrice"=> 0.0,
    "PLBEarnedRet"=> 0.0,
    "TdsOnPLBRet"=> 0.0,
    "ActualBaseFareRet"=> $key->FareDetails->ChargeableFares->ActualBaseFare,
    "NetFareRet"=> 0.0,
    "BonusRet"=> 0.0,
    "TaxRet"=> $ChargeableFares->Tax,
    "STaxRet"=>$ChargeableFares->STax,
    "SChargeRet"=>$ChargeableFares->SCharge,
    "TDiscountRet"=>$ChargeableFares->TDiscount,
    "TSDiscountRet"=> 0.0,
    "TPartnerCommissionRet"=> 0.0,
    "EProductPriceRet"=> 0.0,
    "TChargeRet"=> 0.0,
    "TMarkupRet"=> 0.0,
    "ConveniencefeeRet"=> 0.0,
    "PartnerFeeRet"=> 0.0,
    "ConveniencefeeTypeRet"=> 0,
    "GSTDetails"=> null,
    "SSRRequests"=> null,
    "Tickets"=> null,
    "IsHoldAllowedRet"=> false,
    "IsHoldAllowed"=> false,
    "IsGSTMandatoryRet"=> $key->IsGSTMandatory,
    "IsGSTMandatory"=> $key->IsGSTMandatory,
    "RequiredFields"=> null,
    "RequiredFieldsRet"=> null,
  "Source"=> $_SESSION['from_address'],
    "SourceName"=> $IntDepartureAirportName,
   "Destination"=> $_SESSION['to_address'] ,
   "DestinationName"=> $desti,
   "JourneyDate"=> $_SESSION['start_Date'],
    "ReturnDate"=>$_SESSION['endDate'],
    "TripType"=> $_SESSION['tripType'],
    "FlightType"=> 2,
    "AdultPax"=> $_SESSION['Adults'],
    "ChildPax"=> $_SESSION['Children'],
    "InfantPax"=> $_SESSION['Infant'],
    "TravelClass"=>  $_SESSION['classvalue'],
    "IsNonStopFlight"=> false,
    "FlightTimings"=> null,
    "AirlineName"=> $AirLineName,
    "User"=> "",
    "UserType"=> 5,
    "IsGDS"=> null,
    "AffiliateId"=> "",
    "WebsiteUrl"=> null,
    "MultiFlightsSearch"=> null
);

 foreach ($key->IntOnward->FlightSegments as $flightSegment) {
    $rjsontax['OnwardFlightSegments'][]= array(
      "AirEquipType"=> $flightSegment->AirEquipType,
      "ArrivalAirportCode"=> $flightSegment->ArrivalAirportCode,
      "ArrivalDateTime"=> $flightSegment->ArrivalDateTime,
      "ArrivalDateTimeZone"=> $flightSegment->ArrivalDateTimeZone,
      "DepartureAirportCode"=> $flightSegment->DepartureAirportCode,
      "DepartureDateTime"=> $flightSegment->DepartureDateTime,
      "DepartureDateTimeZone"=> $flightSegment->DepartureDateTimeZone,
      "Duration"=> $flightSegment->Duration,
      "FlightNumber"=> $flightSegment->FlightNumber,
      "OperatingAirlineCode"=> $flightSegment->OperatingAirlineCode,
      "OperatingAirlineFlightNumber"=> $flightSegment->OperatingAirlineFlightNumber,
      "RPH"=> $flightSegment->RPH,
      "StopQuantity"=> $flightSegment->StopQuantity,
      "AirLineName"=> $AirLineName,
      "AirportTax"=> $flightSegment->AirLineName,
      "ImageFileName"=> $flightSegment->ImageFileName,
      "ImagePath"=> $flightSegment->ImagePath,
      "ViaFlight"=> $flightSegment->ViaFlight,
      "Discount"=> $flightSegment->Discount,
      "AirportTaxChild"=> $flightSegment->AirportTaxChild,
      "AirportTaxInfant"=> $flightSegment->AirportTaxInfant,
      "AdultTaxBreakup"=> $flightSegment->AdultTaxBreakup,
      "ChildTaxBreakup"=> $flightSegment->ChildTaxBreakup,
      "InfantTaxBreakup"=> $flightSegment->InfantTaxBreakup,
      "OcTax"=> $flightSegment->OcTax,
       "BookingClass"=> array(
       "Availability"=> $flightSegment->BookingClass->Availability,
       "ResBookDesigCode"=> $flightSegment->BookingClass->ResBookDesigCode,
       "IntBIC"=> ""
       ),
       "BookingClassFare"=> array(
       "AdultFare"=> $flightSegment->BookingClassFare->AdultFare,
       "Bookingclass"=> $flightSegment->BookingClassFare->Bookingclass,
       "ClassType"=> $flightSegment->BookingClassFare->ClassType,
       "Farebasiscode"=> $flightSegment->BookingClassFare->Farebasiscode,
       "Rule"=>  $flightSegment->BookingClassFare->Rule,
       "AdultCommission"=> null,
       "ChildCommission"=> null,
       "CommissionOnTCharge"=> null,
       "ChildFare"=> $flightSegment->BookingClassFare->ChildFare,
       "InfantFare"=> $flightSegment->BookingClassFare->InfantFare
       ),
       "IntNumStops"=> null,
       "IntOperatingAirlineName"=> null,
       "IntArrivalAirportName"=> $flightSegment->IntArrivalAirportName,
       "IntDepartureAirportName"=> $flightSegment->IntDepartureAirportName,
       "IntMarketingAirlineCode"=> $flightSegment->IntMarketingAirlineCode,
       "IntLinkSellAgrmnt"=> null,
       "IntConx"=> null,
       "IntAirpChg"=> null,
       "IntInsideAvailOption"=> null,
       "IntGenTrafRestriction"=> null,
       "IntDaysOperates"=> null,
       "IntJourneyTime"=> null,
       "IntEndDate"=> null,
       "IntStartTerminal"=> "",
       "IntEndTerminal"=> "",
       "IntFltTm"=> null,
       "IntLSAInd"=> null,
       "IntMile"=> "0",
       "Cabin"=> null,
       "itineraryNumber"=> null,
       "BaggageAllowed"=> array(
       "CheckInBaggage"=> $flightSegment->BaggageAllowed->CheckInBaggage,
       "HandBaggage"=> $flightSegment->BaggageAllowed->HandBaggage
       ),
       "AccumulatedDuration"=> $flightSegment->AccumulatedDuration

    );
  }


  foreach ($key->IntReturn->FlightSegments as $flightSegment) {
    $rjsontax['ReturnFlightSegments'][]= array(
      "AirEquipType"=> $flightSegment->AirEquipType,
      "ArrivalAirportCode"=> $flightSegment->ArrivalAirportCode,
      "ArrivalDateTime"=> $flightSegment->ArrivalDateTime,
      "ArrivalDateTimeZone"=> $flightSegment->ArrivalDateTimeZone,
      "DepartureAirportCode"=> $flightSegment->DepartureAirportCode,
      "DepartureDateTime"=> $flightSegment->DepartureDateTime,
      "DepartureDateTimeZone"=> $flightSegment->DepartureDateTimeZone,
      "Duration"=> $flightSegment->Duration,
      "FlightNumber"=> $flightSegment->FlightNumber,
      "OperatingAirlineCode"=> $flightSegment->OperatingAirlineCode,
      "OperatingAirlineFlightNumber"=> $flightSegment->OperatingAirlineFlightNumber,
      "RPH"=> $flightSegment->RPH,
      "StopQuantity"=> $flightSegment->StopQuantity,
      "AirLineName"=> $AirLineName,
      "AirportTax"=> $flightSegment->AirLineName,
      "ImageFileName"=> $flightSegment->ImageFileName,
      "ImagePath"=> $flightSegment->ImagePath,
      "ViaFlight"=> $flightSegment->ViaFlight,
      "Discount"=> $flightSegment->Discount,
      "AirportTaxChild"=> $flightSegment->AirportTaxChild,
      "AirportTaxInfant"=> $flightSegment->AirportTaxInfant,
      "AdultTaxBreakup"=> $flightSegment->AdultTaxBreakup,
      "ChildTaxBreakup"=> $flightSegment->ChildTaxBreakup,
      "InfantTaxBreakup"=> $flightSegment->InfantTaxBreakup,
      "OcTax"=> $flightSegment->OcTax,
       "BookingClass"=> array(
       "Availability"=> $flightSegment->BookingClass->Availability,
       "ResBookDesigCode"=> $flightSegment->BookingClass->ResBookDesigCode,
       "IntBIC"=> ""
       ),
       "BookingClassFare"=> array(
       "AdultFare"=> $flightSegment->BookingClassFare->AdultFare,
       "Bookingclass"=> $flightSegment->BookingClassFare->Bookingclass,
       "ClassType"=> $flightSegment->BookingClassFare->ClassType,
       "Farebasiscode"=> $flightSegment->BookingClassFare->Farebasiscode,
       "Rule"=>  $flightSegment->BookingClassFare->Rule,
       "AdultCommission"=> null,
       "ChildCommission"=> null,
       "CommissionOnTCharge"=> null,
       "ChildFare"=> $flightSegment->BookingClassFare->ChildFare,
       "InfantFare"=> $flightSegment->BookingClassFare->InfantFare
       ),
       "IntNumStops"=> null,
       "IntOperatingAirlineName"=> null,
       "IntArrivalAirportName"=> $flightSegment->IntArrivalAirportName,
       "IntDepartureAirportName"=> $flightSegment->IntDepartureAirportName,
       "IntMarketingAirlineCode"=> $flightSegment->IntMarketingAirlineCode,
       "IntLinkSellAgrmnt"=> null,
       "IntConx"=> null,
       "IntAirpChg"=> null,
       "IntInsideAvailOption"=> null,
       "IntGenTrafRestriction"=> null,
       "IntDaysOperates"=> null,
       "IntJourneyTime"=> null,
       "IntEndDate"=> null,
       "IntStartTerminal"=> "",
       "IntEndTerminal"=> "",
       "IntFltTm"=> null,
       "IntLSAInd"=> null,
       "IntMile"=> "0",
       "Cabin"=> null,
       "itineraryNumber"=> null,
       "BaggageAllowed"=> array(
       "CheckInBaggage"=> $flightSegment->BaggageAllowed->CheckInBaggage,
       "HandBaggage"=> $flightSegment->BaggageAllowed->HandBaggage
       ),
       "AccumulatedDuration"=> $flightSegment->AccumulatedDuration

    );
  }



 
$rjsonDataEncoded1 = json_encode($rjsontax);
 // print_r($jsonDataEncoded1);
$rurl = 'https://webapi.etravos.com/Flights/GetTaxDetails';
$rheaders =  [
    "ConsumerKey: 816EDF7E056EB6E0D84B997CAB3F000C4ABE2FC7",
    "ConsumerSecret: 0EC008F43044CADBA7D71D50CCBC6948F756799F",
    'Content-Type: application/json',
      "Accept-Encoding:gzip, deflate",
];
    
 
$rresult = curl($rurl, $rjsonDataEncoded1, "application/json", true,$rheaders);
    $rresult1 = gzdecode($rresult);


$rtaxarray = json_decode($rresult1);
// var_dump($taxarray);
$_SESSION['TotalFare']= $rtaxarray->TotalFare + $_SESSION['TotalFare'];

 // var_dump($rtaxarray);



$jsonData = array(

 "ActualBaseFare"=> $rtaxarray->ChargeableFares->ActualBaseFare,
 "ActualBaseFareRet"=> $rtaxarray->ChargeableFares->ActualBaseFare,
 "Address"=> $Address,
 "AdultPax"=> $_SESSION['Adults'],
 "ages"=> $arrayage,
 "BookedFrom"=> null,
 "BookingDate"=> date('d-m-Y'),
 "ChildPax"=> $_SESSION['Children'],
 "City"=> $Address,
 "Conveniencefee"=> 0,
 "ConveniencefeeRet"=> 0,
 "Destination"=> $_SESSION['to_address'] ,
 "DestinationName"=> $desti,
 "dob"=> $arraydob,
 "EmailId"=> $Email,
 "FareDetails"=> array(
    "ChargeableFares"=> array(
                    "ActualBaseFare"=> $key->FareDetails->ChargeableFares->ActualBaseFare,
                    "Tax"=> $key->FareDetails->ChargeableFares->Tax,
                    "STax"=> $key->FareDetails->ChargeableFares->STax,
                    "SCharge"=> $key->FareDetails->ChargeableFares->SCharge,
                    "TDiscount"=> $key->FareDetails->ChargeableFares->TDiscount,
                    "TPartnerCommission"=> $key->FareDetails->ChargeableFares->TPartnerCommission,
                    "NetFare"=> $key->FareDetails->ChargeableFares->NetFare,
                    "Conveniencefee"=> $key->FareDetails->ChargeableFares->Conveniencefee,
                    "ConveniencefeeType"=> $key->FareDetails->ChargeableFares->ConveniencefeeType,
                    "PartnerFareDatails"=> array(
                        "NetFares"=> $key->FareDetails->ChargeableFares->PartnerFareDatails->NetFares,
                        "Commission"=> $key->FareDetails->ChargeableFares->PartnerFareDatails->Commission,
                        "CommissionType"=> $key->FareDetails->ChargeableFares->PartnerFareDatails->CommissionType
                    )
                ),
                "NonchargeableFares"=> array(
                    "TCharge"=> $key->FareDetails->NonchargeableFares->TCharge,
                    "TMarkup"=> $key->FareDetails->NonchargeableFares->TMarkup,
                    "TSdiscount"=> $key->FareDetails->NonchargeableFares->TSdiscount
                ),
                "FareBreakUp"=> array(
                    "FareAry"=> [
                        array(
                            "IntPassengerType"=> $key->FareDetails->FareBreakUp->FareAry[0]->IntPassengerType,
                            "IntBaseFare"=> $key->FareDetails->FareBreakUp->FareAry[0]->IntBaseFare,
                            "IntPassengerCount"=> $key->FareDetails->FareBreakUp->FareAry[0]->IntPassengerCount,
                            "IntTax"=> $key->FareDetails->FareBreakUp->FareAry[0]->IntTax,
                            "IntYQTax"=> $key->FareDetails->FareBreakUp->FareAry[0]->IntYQTax,
                            "IntTaxDataArray"=> [
                                array(
                                    "IntCountry"=> $key->FareDetails->FareBreakUp->FareAry[0]->IntTaxDataArray[0]->IntCountry,
                                    "IntAmount"=> $key->FareDetails->FareBreakUp->FareAry[0]->IntTaxDataArray[0]->IntAmount
                                )
                            ],
                            "OtherCharges"=> [
                                array(
                                    "Amount"=> $key->FareDetails->FareBreakUp->FareAry[0]->OtherCharges[0]->Amount,
                                    "ChargeCode"=> $key->FareDetails->FareBreakUp->FareAry[0]->OtherCharges[0]->ChargeCode,
                                    "ChargeType"=> $key->FareDetails->FareBreakUp->FareAry[0]->OtherCharges[0]->ChargeType
                                )
                            ]
                        )
                    ]
                ),
                "OCTax"=> $key->FareDetails->OCTax,
                "PartnerFee"=> $key->FareDetails->PartnerFee,
                "PLBEarned"=> $key->FareDetails->PLBEarned,
                "TdsOnPLB"=> $key->FareDetails->TdsOnPLB,
                "Bonus"=> $key->FareDetails->Bonus,
                "TotalFare"=> $key->FareDetails->TotalFare,
                "ResponseStatus"=> $key->FareDetails->ResponseStatus,
                "Status"=> $key->FareDetails->Status,
                "IsGSTMandatory"=> $key->FareDetails->IsGSTMandatory,
                "Message"=> $key->FareDetails->Message,
                "RequiredFields"=> $key->FareDetails->RequiredFields
  ),
 "FlightId"=> $key->OriginDestinationoptionId->Id,
 "FlightIdRet"=> $key->OriginDestinationoptionId->Id,
 "FlightType"=> 2,
 "Genders"=> $arraygender,
 "GSTDetails"=>
 array(
 "GSTCompanyAddress"=> "Hyderabad",
 "GSTCompanyContactNumber"=> "9234234234",
 "GSTCompanyName"=> "i2space",
 "GSTNumber"=> "534234234233",
 "GSTCompanyEmail"=> "guru.m@i2space.com",
 "GSTFirstName"=> "guru",
 "GSTLastName"=> "bharat"
 ),
 "InfantPax"=> $_SESSION['Infant'],
 "IsLCC"=> $key->IsLCC,
 "IsLCCRet"=> $key->IsLCC,
 "IsNonStopFlight"=> false,
 "JourneyDate"=> $_SESSION['start_Date'],
 "key"=> $key->OriginDestinationoptionId->Key,
 "keyRet"=> $key->OriginDestinationoptionId->Key,
 "MobileNo"=> $Mobile,
 "Names"=> $arrayname,
 "OcTax"=> $FlightSegment->AirEquipType,
 
 "OnwardFlightSegments"=> [
 ],
 "PassportDetails"=> $arraypassport,
 "PostalCode"=> $pincode,
 "Provider"=> $key->Provider,
 "psgrtype"=> "",
 "ReturnDate"=> $_SESSION['endDate'],

 "ReturnFlightSegments"=>  [
 ],
 "Rule"=> $rfarerule,
 "RuleRet"=> $rfarerule,
 "SCharge"=> $taxarray->ChargeableFares->SCharge,
 "SChargeRet"=> $taxarray->ChargeableFares->SCharge,
 "SMSUsageCount"=> 0,
 "Source"=> $_SESSION['from_address'],
 "SourceName"=> $IntDepartureAirportName,
  "State"=> $state,
 "STax"=> $taxarray->ChargeableFares->STax,
 "STaxRet"=> $rtaxarray->ChargeableFares->STax,
 "Tax"=> $taxarray->ChargeableFares->Tax,
 "TaxRet"=> $rtaxarray->ChargeableFares->Tax,
 "TCharge"=> $taxarray->NonchargeableFares->TCharge,
 "TChargeRet"=> $rtaxarray->NonchargeableFares->TCharge, 
 "TDiscount"=> $taxarray->ChargeableFares->TDiscount,
 "TDiscountRet"=> $rtaxarray->ChargeableFares->TDiscount,
 "telePhone"=> "8888888888",
 "TMarkup"=> $taxarray->NonchargeableFares->TMarkup, "TMarkupRet"=> $rtaxarray->NonchargeableFares->TMarkup,
 "TPartnerCommission"=> $taxarray->ChargeableFares->TPartnerCommission,
 "TPartnerCommissionRet"=> $rtaxarray->ChargeableFares->TPartnerCommission,
 "TravelClass"=> $_SESSION['classvalue'],
 "TripType"=> 2,
 "TSdiscount"=> 0,
 "TSDiscountRet"=> 0,
 "User"=> "",
 "UserType"=> 5


);

foreach ($key->IntOnward->FlightSegments as $flightSegment) {
    $jsonData['OnwardFlightSegments'][]= array(
      "AirEquipType"=> $flightSegment->AirEquipType,
      "ArrivalAirportCode"=> $flightSegment->ArrivalAirportCode,
      "ArrivalDateTime"=> $flightSegment->ArrivalDateTime,
      "ArrivalDateTimeZone"=> $flightSegment->ArrivalDateTimeZone,
      "DepartureAirportCode"=> $flightSegment->DepartureAirportCode,
      "DepartureDateTime"=> $flightSegment->DepartureDateTime,
      "DepartureDateTimeZone"=> $flightSegment->DepartureDateTimeZone,
      "Duration"=> $flightSegment->Duration,
      "FlightNumber"=> $flightSegment->FlightNumber,
      "OperatingAirlineCode"=> $flightSegment->OperatingAirlineCode,
      "OperatingAirlineFlightNumber"=> $flightSegment->OperatingAirlineFlightNumber,
      "RPH"=> $flightSegment->RPH,
      "StopQuantity"=> $flightSegment->StopQuantity,
      "AirLineName"=> $AirLineName,
      "AirportTax"=> $flightSegment->AirLineName,
      "ImageFileName"=> $flightSegment->ImageFileName,
      "ImagePath"=> $flightSegment->ImagePath,
      "ViaFlight"=> $flightSegment->ViaFlight,
      "Discount"=> $flightSegment->Discount,
      "AirportTaxChild"=> $flightSegment->AirportTaxChild,
      "AirportTaxInfant"=> $flightSegment->AirportTaxInfant,
      "AdultTaxBreakup"=> $flightSegment->AdultTaxBreakup,
      "ChildTaxBreakup"=> $flightSegment->ChildTaxBreakup,
      "InfantTaxBreakup"=> $flightSegment->InfantTaxBreakup,
      "OcTax"=> $flightSegment->OcTax,
       "BookingClass"=> array(
       "Availability"=> $flightSegment->BookingClass->Availability,
       "ResBookDesigCode"=> $flightSegment->BookingClass->ResBookDesigCode,
       "IntBIC"=> ""
       ),
       "BookingClassFare"=> array(
       "AdultFare"=> $flightSegment->BookingClassFare->AdultFare,
       "Bookingclass"=> $flightSegment->BookingClassFare->Bookingclass,
       "ClassType"=> $flightSegment->BookingClassFare->ClassType,
       "Farebasiscode"=> $flightSegment->BookingClassFare->Farebasiscode,
       "Rule"=>  $flightSegment->BookingClassFare->Rule,
       "AdultCommission"=> null,
       "ChildCommission"=> null,
       "CommissionOnTCharge"=> null,
       "ChildFare"=> $flightSegment->BookingClassFare->ChildFare,
       "InfantFare"=> $flightSegment->BookingClassFare->InfantFare
       ),
       "IntNumStops"=> null,
       "IntOperatingAirlineName"=> null,
       "IntArrivalAirportName"=> $flightSegment->IntArrivalAirportName,
       "IntDepartureAirportName"=> $flightSegment->IntDepartureAirportName,
       "IntMarketingAirlineCode"=> $flightSegment->IntMarketingAirlineCode,
       "IntLinkSellAgrmnt"=> null,
       "IntConx"=> null,
       "IntAirpChg"=> null,
       "IntInsideAvailOption"=> null,
       "IntGenTrafRestriction"=> null,
       "IntDaysOperates"=> null,
       "IntJourneyTime"=> null,
       "IntEndDate"=> null,
       "IntStartTerminal"=> "",
       "IntEndTerminal"=> "",
       "IntFltTm"=> null,
       "IntLSAInd"=> null,
       "IntMile"=> "0",
       "Cabin"=> null,
       "itineraryNumber"=> null,
       "BaggageAllowed"=> array(
       "CheckInBaggage"=> $flightSegment->BaggageAllowed->CheckInBaggage,
       "HandBaggage"=> $flightSegment->BaggageAllowed->HandBaggage
       ),
       "AccumulatedDuration"=> $flightSegment->AccumulatedDuration

    );
  }


  foreach ($key->IntReturn->FlightSegments as $flightSegment) {
    $jsonData['ReturnFlightSegments'][]= array(
      "AirEquipType"=> $flightSegment->AirEquipType,
      "ArrivalAirportCode"=> $flightSegment->ArrivalAirportCode,
      "ArrivalDateTime"=> $flightSegment->ArrivalDateTime,
      "ArrivalDateTimeZone"=> $flightSegment->ArrivalDateTimeZone,
      "DepartureAirportCode"=> $flightSegment->DepartureAirportCode,
      "DepartureDateTime"=> $flightSegment->DepartureDateTime,
      "DepartureDateTimeZone"=> $flightSegment->DepartureDateTimeZone,
      "Duration"=> $flightSegment->Duration,
      "FlightNumber"=> $flightSegment->FlightNumber,
      "OperatingAirlineCode"=> $flightSegment->OperatingAirlineCode,
      "OperatingAirlineFlightNumber"=> $flightSegment->OperatingAirlineFlightNumber,
      "RPH"=> $flightSegment->RPH,
      "StopQuantity"=> $flightSegment->StopQuantity,
      "AirLineName"=> $AirLineName,
      "AirportTax"=> $flightSegment->AirLineName,
      "ImageFileName"=> $flightSegment->ImageFileName,
      "ImagePath"=> $flightSegment->ImagePath,
      "ViaFlight"=> $flightSegment->ViaFlight,
      "Discount"=> $flightSegment->Discount,
      "AirportTaxChild"=> $flightSegment->AirportTaxChild,
      "AirportTaxInfant"=> $flightSegment->AirportTaxInfant,
      "AdultTaxBreakup"=> $flightSegment->AdultTaxBreakup,
      "ChildTaxBreakup"=> $flightSegment->ChildTaxBreakup,
      "InfantTaxBreakup"=> $flightSegment->InfantTaxBreakup,
      "OcTax"=> $flightSegment->OcTax,
       "BookingClass"=> array(
       "Availability"=> $flightSegment->BookingClass->Availability,
       "ResBookDesigCode"=> $flightSegment->BookingClass->ResBookDesigCode,
       "IntBIC"=> ""
       ),
       "BookingClassFare"=> array(
       "AdultFare"=> $flightSegment->BookingClassFare->AdultFare,
       "Bookingclass"=> $flightSegment->BookingClassFare->Bookingclass,
       "ClassType"=> $flightSegment->BookingClassFare->ClassType,
       "Farebasiscode"=> $flightSegment->BookingClassFare->Farebasiscode,
       "Rule"=>  $flightSegment->BookingClassFare->Rule,
       "AdultCommission"=> null,
       "ChildCommission"=> null,
       "CommissionOnTCharge"=> null,
       "ChildFare"=> $flightSegment->BookingClassFare->ChildFare,
       "InfantFare"=> $flightSegment->BookingClassFare->InfantFare
       ),
       "IntNumStops"=> null,
       "IntOperatingAirlineName"=> null,
       "IntArrivalAirportName"=> $flightSegment->IntArrivalAirportName,
       "IntDepartureAirportName"=> $flightSegment->IntDepartureAirportName,
       "IntMarketingAirlineCode"=> $flightSegment->IntMarketingAirlineCode,
       "IntLinkSellAgrmnt"=> null,
       "IntConx"=> null,
       "IntAirpChg"=> null,
       "IntInsideAvailOption"=> null,
       "IntGenTrafRestriction"=> null,
       "IntDaysOperates"=> null,
       "IntJourneyTime"=> null,
       "IntEndDate"=> null,
       "IntStartTerminal"=> "",
       "IntEndTerminal"=> "",
       "IntFltTm"=> null,
       "IntLSAInd"=> null,
       "IntMile"=> "0",
       "Cabin"=> null,
       "itineraryNumber"=> null,
       "BaggageAllowed"=> array(
       "CheckInBaggage"=> $flightSegment->BaggageAllowed->CheckInBaggage,
       "HandBaggage"=> $flightSegment->BaggageAllowed->HandBaggage
       ),
       "AccumulatedDuration"=> $flightSegment->AccumulatedDuration

    );
  }
var_dump($jsonData);


$url = 'https://webapi.etravos.com/Flights/BlockFlightTicket';

$headers =  [
    "ConsumerKey: 816EDF7E056EB6E0D84B997CAB3F000C4ABE2FC7",
    "ConsumerSecret: 0EC008F43044CADBA7D71D50CCBC6948F756799F",
    'Content-Type: application/json',
    "Accept-Encoding:gzip, deflate",  
];
 
$jsonDataEncoded = json_encode($jsonData);
// echo $jsonDataEncoded;
 
$result = curl($url, $jsonDataEncoded, "application/json", true,$headers);
    // $result1 = gzdecode($result);

$gzdecode = gzdecode($result);
$response = json_decode($gzdecode);
// var_dump($response);
$ReferenceNo= $response->ReferenceNo;
$_SESSION['ReferenceNo'] =$ReferenceNo;
$BookingStatus= $response->BookingStatus;
$Message= $response->Message;
echo "ReferenceNo" . $ReferenceNo;

}
 ?>
                          

                    
                            <div class="booking-item-container bg-white">
                                
                                  <div  class="bg-white  checkput-flight m-b-10">
                                    <div  class="fight-table-list">
                                        
                                          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                                    <span class="largo-logo">
                                                        <?php require "image.php"; ?>
                                                    <img src="http://webapi.i2space.co.in<?php echo $FlightSegment->ImagePath?>" alt="Image Alternative text" title="Image Title" />
                                                    </span>
                                                    <aside>
                                                     <p class="uppercase"><?php echo $FlightSegment->AirLineName;
                                                                        $AirLineName=$FlightSegment->AirLineName;?></p>

                                                      <small><?php echo $FlightSegment->OperatingAirlineCode;
                                                      $OperatingAirlineCode=$FlightSegment->OperatingAirlineCode;?>-

                                                      <?php echo $FlightSegment->OperatingAirlineFlightNumber;

                                                            $OperatingAirlineFlightNumber =$FlightSegment->OperatingAirlineFlightNumber;                                                               ?></small>
                                                      </aside>
                                               </div>
                                                  <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                                        <p class="uppercase"><?php echo $_SESSION['from_address'];?></p>
                                                        <h4 class="theme-color-text font-bold"><?php echo substr($FlightSegment->DepartureDateTime, 11,5);
                                                        $departtime = substr($FlightSegment->DepartureDateTime, 11,5);?></h4>


                                                        <p><?php echo substr($FlightSegment->DepartureDateTime, 0,10);
                                                        $departdate = substr($FlightSegment->DepartureDateTime, 0,10);?></p>

                                                        <p><?php echo $FlightSegment->IntDepartureAirportName;
                                                        $IntDepartureAirportName = $FlightSegment->IntDepartureAirportName;
                                                        ?></p>

                                                  </div>
                                                   <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                                   <div class="border-grey"></div>
                                                     <i class="fa fa-plane flight-time"></i>
                                                     <div class="text-center m-t-15"><i class="fa fa-clock-o m-r-5"></i><span><?php echo $FlightSegment->Duration;
                                                     $Duration = $FlightSegment->Duration;?></span></div>
                                                   </div>
                                                    
                                                    
                                                     
                                                     <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                                     <div class="pull-right">
                                                        <p class="uppercase"><?php echo $_SESSION['to_address'];?></p>
                                                        <h4 class="theme-color-text font-bold"><?php echo substr($FlightSegment->ArrivalDateTime, 11,5);
                                                        $ArrivalTime = substr($FlightSegment->ArrivalDateTime, 11,5);?></h4>

                                                        <p><?php echo substr($FlightSegment->ArrivalDateTime, 0,10);
                                                        $ArrivalDate = substr($FlightSegment->ArrivalDateTime, 0,10);?></p>
                                                        <p><?php echo $FlightSegment->IntArrivalAirportName;
                                                        $IntArrivalAirportName = $FlightSegment->IntArrivalAirportName;?></p>
                                                        </div>

                                                  </div>
                                          
                        
                                </div>
                                        
                                    
  
                  </div>
              </div> 

          

            <?php





            ?>
                    <!---Start Tab--->
                    <div class="col-md-12 padding-0 bg-white box-shadow m-b-30">
          <div class="tab col-lg-3 p-l-0">
                          <button class="tablinks" onClick="openCity(event, 'credit')" id="defaultOpen">Credit Card</button>
                          <button class="tablinks" onClick="openCity(event, 'debit')">Debir card</button>
                          <button class="tablinks" onClick="openCity(event, 'net')">Net banking</button>
                          <button class="tablinks" onClick="openCity(event, 'wallet')">Mobile Wallet</button>
                        </div>
                        <div class="col-lg-9  p-b-15"> 
                        <div id="credit" class="tabcontent">
                          <div class="m-t-15 row">
                              <span></span><span></span><span></span>
                            </div>
                          <form method="post" class="m-t-15 payment-form" action="payment.html">
                                                    <div class="row">
                                                      <div class="row">
                                                          <div class="col-lg-7">
                                                          
                                                        <label class="uppercase">Card Number</label><input type="text" class="form-control">
                                                        </div>
                                                        </div>
                                                        <div class="row">
                                                        <div class="col-lg-7"><label class="uppercase">Name on the card</label><input type="text" class="form-control" >
                                                        </div>
                                                        </div>
                                                        <div class="row">
                                                         <div class="control-group col-lg-12">
                                                         <div class="col-md-6 padding-0">
                                                            <label class="control-label uppercase">Expiry Date</label>
                                                              <div class=" col-lg-6 padding-0"><input type="text" class="form-control" placeholder="Month" ></div>
                                                              <div class=" col-lg-6"><input type="text" class="form-control" placeholder="Year" ></div>
                                                            
                                 </div>
                                                         <div class="col-lg-2 p-lr-7">
                                                          <label class="uppercase control-label">Cvv code</label><input type="text" class="form-control" placeholder="CVV" >
                                                        </div>
                                                        
                                                        </div>
                                                        </div>
                                                       
                                                     </div>
                                                     
                                                     
                                                      <div class="checkbox row   m-t-15">
                                                            <label>
                                                                <input class="i-check" type="checkbox" /><span>Save your card details for faster  checkout. CVV is not saved. </span>
                                                            </label>
                                                      </div>
                                                          <div class="row">
                                                             <a href="payment.html">
                                                             <button type="button" class="btn btn-primary uppercase btn-large col-lg-4">
                                 Make Payment</button> </a> <span class="col-lg-6"> <h4 class="theme-color-text font-bold margin-0">Rs. <?php echo number_format($key->FareDetails->TotalFare); ?></h4><p>Total in INR incl Rs. conv fee.</p></span>
                                 </div>
                                                        </form>
                                                        <a href="ticket-response.php"  class="btn btn-primary uppercase btn-large col-lg-4">Book now</a>
                        </div>
                        
                        <div id="debit" class="tabcontent">
                          
                        </div>
                        
                        <div id="net" class="tabcontent">
                          
                        </div>
                        <div id="wallet" class="tabcontent">
                          
                        </div>
              </div>
                    </div>
                </div>
        </div>
        <div class="col-md-3">
                     
                    <aside class="booking-filters fare-details-block">
                       
                         <ul class="list booking-filters-list">
                    
                            <li>
                                <h5 class="booking-filters-title">Travellers </h5>
                                <ul class="stop-list list-inline list-unstyled">
                                  <li class="col-md-12 col-xs-12">
                                   <div  class="col-md-7 col-xs-7 p-l-0"><p>Sreelatha</p> <span class="grey-text">Insurance Included</span></div>
                                   <div  class="col-md-5 col-xs-5 p-r-0"><span  class="pull-right grey-text">Adult,F</span></div>
                                    </li>
                                    
                               </ul>
                            </li>
                            <li>
                                <h5 class="booking-filters-title">Contact Details </h5>
                                <ul class="stop-list list-inline list-unstyled">
                                  <li class="col-md-12 col-xs-12">
                                   <div  class="col-md-12 col-xs-12 p-l-0">
                                   <p><i class="fa fa-credit-card m-r-5 fa-2x grey-text"></i> <span class="aside">sreelatha@gmail.com</p></span>
                                    <p><i class="fa fa-credit-card m-r-5 fa-2x grey-text"></i> <span class="aside">9090909090</p></span>
                                   </div>
                                   
                                    </li>
                                    
                               </ul>
                            </li>
                            <li>
                                <h5 class="booking-filters-title">price Breakup </h5>
                                <ul class="stop-list list-inline list-unstyled">
                                  <li class="col-md-12 col-xs-12">
                                   <div  class="col-md-7 col-xs-7 p-l-0">Subtotal </div>
                                   <div  class="col-md-5 col-xs-5 p-r-0"><h5  class="pull-right">Rs. <?php echo number_format($IntBaseFare); ?></h5></div>
                                    </li>
                                   <!--  <li  class="col-md-12 col-xs-12">
                                   <div  class="col-md-7 col-xs-7 p-l-0">Fee & Surcharges</div>
                                   <div  class="col-md-5 col-xs-5  p-r-0"><h5  class="pull-right">Rs. 5</h5></div>
                                    </li> -->
                                    <li  class="col-md-12 col-xs-12 ">
                                   <div  class="col-md-7 col-xs-7 p-l-0">Total Tax</div>
                                   <div  class="col-md-5 col-xs-5 p-r-0"><h5  class="pull-right">Rs. <?php echo number_format($totaltax + $ChargeableFares->STax); ?></h5></div>
                                    </li>
                               </ul>
                            </li>
                            
                          <li class="col-md-12 col-xs-12 bg-theme padding-0"> 
                              <div  >
                                        <div  class="col-md-7 col-xs-7  padding-0"> 
                                            <h3 class="text-white">Total: </h3>
                                            <p class="text-white">(1 Adult)</p>
                                        </div>
                                        <div  class="col-md-5 col-xs-5  padding-0">
                                            <h3  class="pull-right text-white">Rs. <?php echo number_format($key->FareDetails->TotalFare); ?></h3>
                                            
                                        </div>
                              </div>
                    </li>
              
                        </ul>
                    </aside>
                </div>
        <div class="clearfix"></div>
        
        
     </section> 
      
      
       

       <?php include("footer.php"); ?>
        <!---Earch Modal --->
        

 
</div>

        <script src="js/jquery.js"></script>
       
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/slimmenu.js"></script>
        <script src="js/bootstrap-datepicker.js"></script>
        <script src="js/bootstrap-timepicker.js"></script>
        <script src="js/nicescroll.js"></script>
        <script src="js/dropit.js"></script>
        <script src="js/ionrangeslider.js"></script>
        <script src="js/icheck.js"></script>
        <script src="js/fotorama.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
        <script src="js/typeahead.js"></script>
        <script src="js/card-payment.js"></script>
        <script src="js/magnific.js"></script>
        <script src="js/owl-carousel.js"></script>
        <script src="js/fitvids.js"></script>
        <script src="js/tweet.js"></script>
        <script src="js/countdown.js"></script>
        <script src="js/gridrotator.js"></script>
        <script src="js/custom.js"></script>
        <script>
      function openCity(evt, paymenttype) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(paymenttype).style.display = "block";
    evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();

function active_nav(){

      // var data = document.getElementById("holidaypackage");
      // var s = data.replace(data, data+ 'class=" active"');
      document.getElementById("paymentnav").className = " active";
      
    }   
    </script>
        <script>
      
    </script>
    </div>
      <form name="redirect" action="datafrom.php" method="get">
      

    </form>
<?php 

if ($BookingStatus==8) {
echo "<script language='javascript'>document.redirect.submit();</script>";
}
else echo "<script language='javascript'>alert(".$Message.");</script>";
?>
</body>

</html>



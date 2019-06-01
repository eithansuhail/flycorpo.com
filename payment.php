<?php  
session_start();

?>
<?php


require "init.php";
include("functions.php");
$count = $_SESSION['count'];
$rcount = $_SESSION['rcount'];



$allAirports = curl("https://webapi.etravos.com/Flights/AvailableFlights?source=".$_SESSION['from_address']."&destination=".$_SESSION['to_address']."&journeyDate=".$_SESSION['start_Date']."&tripType=".$_SESSION['tripType']."&flightType=1&adults=".$_SESSION['Adults']."&children=".$_SESSION['Children']."&infants=".$_SESSION['Infant']."&travelClass=".$_SESSION['classvalue']."&userType=5&returnDate=".$_SESSION['endDate'], [], "application/json", false, [
    "ConsumerKey: ",
    "ConsumerSecret: ",
    "Accept-Encoding:gzip, deflate",
]);
    $o = gzdecode($allAirports);


$IntBaseFare=0;
$IntTax=0;
$IntAmount=0;

$obj = json_decode($o);

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

<body onload="active_nav()" style="display: none;" >

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
     $key =$obj->DomesticOnwardFlights[$count];




     $key =$obj->DomesticOnwardFlights[$count];
     $FareDetails = $key->FareDetails;
     $ChargeableFares = $FareDetails->ChargeableFares;
     $ActualBaseFare = $ChargeableFares->ActualBaseFare;
    $FlightSegment = $key->FlightSegments[0];
    
    $AirLineName=$FlightSegment->AirLineName;
     $OperatingAirlineCode=$FlightSegment->OperatingAirlineCode;
     $OperatingAirlineFlightNumber =$FlightSegment->OperatingAirlineFlightNumber;
     $departdate = substr($FlightSegment->DepartureDateTime, 0,10);
     $departtime = substr($FlightSegment->DepartureDateTime, 11,5);
     $IntDepartureAirportName = $FlightSegment->IntDepartureAirportName;

    $Duration = $FlightSegment->Duration;
    $ArrivalTime = substr($FlightSegment->ArrivalDateTime, 11,5);
    $ArrivalDate = substr($FlightSegment->ArrivalDateTime, 0,10);
    $IntArrivalAirportName = $FlightSegment->IntArrivalAirportName;

    $key1 = $key->FareDetails;
    $key2 = $key1->FareBreakUp;
    $key3 = $key2->FareAry[0];
    $IntBaseFare = $key3->IntBaseFare;
    $IntTax = $key3->IntTax;
    $IntYQTax = $key3->IntYQTax;
    $totaltax = $IntYQTax+ $IntTax;


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
$tripType =  $_SESSION['tripType'];

 $query = "INSERT INTO `bookedflight`(AirLineName, OperatingAirlineCode, OperatingAirlineFlightNumber, departtime, departdate, IntDepartureAirportName, Duration, ArrivalTime, ArrivalDate, IntArrivalAirportName, IntBaseFare, IntTax, IntAmount,  usertype,booker_email,triptype,flighttype) 
    VALUES ('$AirLineName', '$OperatingAirlineCode', '$OperatingAirlineFlightNumber', '$departtime', '$departdate', '$IntDepartureAirportName', '$Duration','$ArrivalTime','$ArrivalDate','$IntArrivalAirportName','$IntBaseFare','$IntTax','$IntAmount','$usertype','$booker_email','$tripType','1')";
    // echo $query;
            
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
                                 echo "bookedflight data";
                              }
                              else{
                                $condition=6;
                             echo "book".$link->error;

                              }

                  } else {
                                   
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
function str_replace_last( $search , $replace , $str ) {
    if( ( $pos = strrpos( $str , $search ) ) !== false ) {
        $search_length  = strlen( $search );
        $str    = substr_replace( $str , $replace , $pos , $search_length );
    }
    return $str;
}

if ($_SESSION['Adults']>0) {
  $c=1;

  ${"title" . $c} =$_POST["title".$c];
 ${"adultmobile" . $c} =$_POST["adultmobile".$c];
 ${"adultemail" . $c} =$_POST["adultemail".$c];
 ${"afirstname" . $c} =$_POST["afirstname".$c];
 ${"alastname" . $c} =$_POST["alastname".$c];
 ${"address" . $c} =$_POST["address".$c];
 ${"gender" . $c} =$_POST["gender".$c];
 ${"age" . $c} =$_POST["age".$c]; 
 ${"dob" . $c} =$_POST["dob".$c];
 ${"address" . $c} =$_POST["address".$c];
 

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
 $passengertype = "Adult";

 $arrayname .= $title."|".$afirstname."|".$alastname."|adt~";
 // $arrayemail .= $email."~";
 $arraydob .= $dob."~";
 $arrayage .= $age."~";
 // $arrayaddress .= $address."~";
 // $arraymobile .= $mobile."~";
 $arraygender .= $gender."~";


$query = "INSERT INTO `passengers_table`( title, email, firstname,lastname,  mobile,age,gender,  dob,passengertype,tid,address) 
    VALUES ('$title','$Email','$afirstname','$alastname','$Mobile','$age','$gender','$dob','$passengertype','$tid','$address')";
            
                  if (mysqli_query($link,$query)) {
                      // echo "data updated";
                                 echo "adult data";

                  }
                  else {
                      // echo $link->error;
                      // echo "<p>There was a problem signing you up - please try again later.</p>";
                    
                    echo "adu".$link->error;
                     }



    


    # code...
for ($i=1; $i <$_SESSION['Adults'] ; $i++) { 
    $c=$i+1;



 ${"title" . $c} =$_POST["title".$c];
 // ${"adultmobile" . $c} =$_POST["adultmobile".$c];
 // ${"adultemail" . $c} =$_POST["adultemail".$c];
 ${"afirstname" . $c} =$_POST["afirstname".$c];
 ${"alastname" . $c} =$_POST["alastname".$c];
 // ${"address" . $c} =$_POST["address".$c];
 ${"gender" . $c} =$_POST["gender".$c];
 ${"age" . $c} =$_POST["age".$c]; 
 ${"dob" . $c} =$_POST["dob".$c];

 $title = ${"title" . $c};
 $afirstname = ucwords(${"afirstname" . $c});
 $alastname = ucwords(${"alastname" . $c});
 // $address = ucwords(${"address" . $c});

 $Address = $address;
 // $mobile = ${"adultmobile" . $c};
 // $email = ${"adultemail" . $c};
 $age = ${"age" . $c};
 $gender = ${"gender" . $c};
 $dob = ${"dob" . $c};
 $passengertype = "Adult";

 $arrayname .= $title."|".$afirstname."|".$alastname."|adt~";
 // $arrayemail .= $email."~";
 $arraydob .= $dob."~";
 $arrayage .= $age."~";
 // $arrayaddress .= $address."~";
 // $arraymobile .= $mobile."~";
 $arraygender .= $gender."~";


$query = "INSERT INTO `passengers_table`( title,  firstname,lastname,age,gender,  dob,passengertype,tid) 
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
}
 

 if ($_SESSION['Children']>0) {
    $arrayname .="~";
// $arrayemail .="~";
$arraydob .="~";
$arrayage .="~";
// $arrayaddress .="~";
// $arraymobile .="~";
$arraygender .="~";
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

 // $Address = $address;
 // $mobile = ${"cmobile" . $c};/
 // $email = ${"cemail" . $c};
 $age = ${"cage" . $c};
 $gender = ${"cgender" . $c};
 $dob = ${"cdob" . $c};
 $passengertype = "Child";

 $arrayname .= $title."|".$afirstname."|".$alastname."|chd~";
 // $arrayemail .= $email."~";
 $arraydob .= $dob."~";
 $arrayage .= $age."~";
 // $arrayaddress .= $address."~";
 // $arraymobile .= $mobile."~";
 $arraygender .= $gender."~";

$query = "INSERT INTO `passengers_table`( title,  firstname,lastname,age,gender,  dob,passengertype,tid) 
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
}
 

  if ($_SESSION['Infant']>0) {
    $arrayname .="~";
// $arrayemail .="~";
$arraydob .="~";
$arrayage .="~";
// $arrayaddress .="~";/
// $arraymobile .="~";
$arraygender .="~";
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

 // $Address = $address;
 // $mobile = ${"imobile" . $c};
 // $email = ${"iemail" . $c};
 $age = ${"iage" . $c};
 $gender = ${"igender" . $c};
 $dob = ${"idob" . $c};
 $passengertype = "Infant";

 $arrayname .= $title."|".$afirstname."|".$alastname."|inf~";
 // $arrayemail .= $email."~";
 $arraydob .= $dob."~";
 $arrayage .= $age."~";
 // $arrayaddress .= $address."~";
 // $arraymobile .= $mobile."~";
 $arraygender .= $gender."~";

$query = "INSERT INTO `passengers_table`( title,  firstname,lastname,age,gender,  dob,passengertype,tid) 
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
}
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


$fares = curl("https://webapi.etravos.com/Flights/GetFareRule?key=".$keyfare."&airlineId=".$airlineIdfare."&flightId=".$flightIdfare."&classCode=".$classCode."&service=1&provider=".$providerfare."&tripType=1&couponFare=".$couponFarefare."&userType=5&user=", [], "application/json", false, [
    "ConsumerKey: 816EDF7E056EB6E0D84B997CAB3F000C4ABE2FC7",
    "ConsumerSecret: 0EC008F43044CADBA7D71D50CCBC6948F756799F",
    "Accept-Encoding:gzip, deflate",
]);
    $o23 = gzdecode($fares);
    $farerule = json_decode($o23);

// echo "farerule" . $farerule;
?>


<?php

foreach ($key->FlightSegments as $ft) {
  $IntArrivalAirportName = $ft->IntArrivalAirportName;
}


  $jsontax = array(

 "ActualBaseFare"=> $ActualBaseFare,
 "ActualBaseFareRet"=> 0,
 "Address"=> $Address,
 "AdultPax"=> $_SESSION['Adults'],
 "BookedFrom"=> null,
 "BookingDate"=> date('d-m-Y'),
 "ChildPax"=> $_SESSION['Children'],
 "City"=> $Address,
 "Conveniencefee"=> 0,
 "ConveniencefeeRet"=> 0,
 "Destination"=> $_SESSION['to_address'] ,
 "DestinationName"=> $IntArrivalAirportName,
  "FareDetails"=> null,
 "FlightId"=> $key->OriginDestinationoptionId->Id,
 "FlightIdRet"=> null,
 "FlightType"=> 1,
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
 "OcTax"=> $FlightSegment->AirEquipType,


 "OnwardFlightSegments"=> [ array()
 ],
 "Provider"=> $key->Provider,
 "ReturnDate"=> $_SESSION['endDate'],
 "ReturnFlightSegments"=> null,
 "Rule"=> $key->OriginDestinationoptionId->Key,
 "RuleRet"=> null,
 "SCharge"=> $ChargeableFares->SCharge,
 "SChargeRet"=> 0,
 "SMSUsageCount"=> 0,
 "Source"=> $_SESSION['from_address'],
 "SourceName"=> $IntDepartureAirportName,
 "State"=> $state,
 "STax"=> $ChargeableFares->STax,
 "STaxRet"=> 0,
 "Tax"=> $ChargeableFares->Tax,
 "TaxRet"=> 0,
 "TCharge"=> 0,
 "TChargeRet"=> 0,
 "TDiscount"=> $ChargeableFares->TDiscount,
 "TDiscountRet"=> 0,
 "TMarkup"=> 0,
 "TMarkupRet"=> 0,
 "TPartnerCommission"=> 0,
 "TPartnerCommissionRet"=> 0,
 "TravelClass"=> $_SESSION['classvalue'],
 "TripType"=> $_SESSION['tripType'],
 "TSdiscount"=> 0,
 "TSDiscountRet"=> 0,
 "User"=> "",
 "UserType"=> 5


);
  foreach ($key->FlightSegments as $flightSegment) {
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
 "Rule"=> $farerule,
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
 "AccumulatedDuration"=> "0"

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





$_SESSION['TotalFare']= $taxarray->TotalFare;
echo $_SESSION['TotalFare'];
?>


<?php

if ($_SESSION['tripType']==1) {
  echo " 1";
  # code...


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
 "DestinationName"=> $IntArrivalAirportName,
 "dob"=> $arraydob,
 "EmailId"=> $Email,
 "FareDetails"=> null,
 "FlightId"=> $key->OriginDestinationoptionId->Id,
 "FlightIdRet"=> null,
 "FlightType"=> 1,
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
 "MobileNo"=> $Mobile ,
 "Names"=> $arrayname,
 "OcTax"=> $FlightSegment->AirEquipType,
 "OnwardFlightSegments"=> [
 array(
"AirEquipType"=> $FlightSegment->AirEquipType,
"ArrivalAirportCode"=> $FlightSegment->ArrivalAirportCode,
"ArrivalDateTime"=> $FlightSegment->ArrivalDateTime,
"ArrivalDateTimeZone"=> $FlightSegment->ArrivalDateTimeZone,
"DepartureAirportCode"=> $FlightSegment->DepartureAirportCode,
"DepartureDateTime"=> $FlightSegment->DepartureDateTime,
"DepartureDateTimeZone"=> $FlightSegment->DepartureDateTimeZone,
"Duration"=> $FlightSegment->Duration,
"FlightNumber"=> $FlightSegment->FlightNumber,
"OperatingAirlineCode"=> $FlightSegment->OperatingAirlineCode,
"OperatingAirlineFlightNumber"=> $FlightSegment->OperatingAirlineFlightNumber,
"RPH"=> $FlightSegment->RPH,
"StopQuantity"=> $FlightSegment->StopQuantity,
"AirLineName"=> $AirLineName,
"AirportTax"=> $FlightSegment->AirLineName,
"ImageFileName"=> $FlightSegment->ImageFileName,
"ImagePath"=> $FlightSegment->ImagePath,
"ViaFlight"=> $FlightSegment->ViaFlight,
"Discount"=> $FlightSegment->Discount,
"AirportTaxChild"=> $FlightSegment->AirportTaxChild,
"AirportTaxInfant"=> $FlightSegment->AirportTaxInfant,
"AdultTaxBreakup"=> $FlightSegment->AdultTaxBreakup,
"ChildTaxBreakup"=> $FlightSegment->ChildTaxBreakup,
"InfantTaxBreakup"=> $FlightSegment->InfantTaxBreakup,
"OcTax"=> $FlightSegment->OcTax,
 "BookingClass"=> array(
 "Availability"=> $FlightSegment->BookingClass->Availability,
 "ResBookDesigCode"=> $FlightSegment->BookingClass->ResBookDesigCode,
 "IntBIC"=> ""
 ),
 "BookingClassFare"=> array(
 "AdultFare"=> $FlightSegment->BookingClassFare->AdultFare,
 "Bookingclass"=> $FlightSegment->BookingClassFare->Bookingclass,
 "ClassType"=> $FlightSegment->BookingClassFare->ClassType,
 "Farebasiscode"=> $FlightSegment->BookingClassFare->Farebasiscode,
 "Rule"=> $farerule,
 "AdultCommission"=> null,
 "ChildCommission"=> null,
 "CommissionOnTCharge"=> null,
 "ChildFare"=> $FlightSegment->BookingClassFare->ChildFare,
 "InfantFare"=> $FlightSegment->BookingClassFare->InfantFare
 ),
 "IntNumStops"=> $FlightSegment->IntNumStops,
 "IntOperatingAirlineName"=> null,
 "IntArrivalAirportName"=> $FlightSegment->IntArrivalAirportName,
 "IntDepartureAirportName"=> $FlightSegment->IntDepartureAirportName,
 "IntMarketingAirlineCode"=> $FlightSegment->IntMarketingAirlineCode,
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
 "CheckInBaggage"=> $FlightSegment->BaggageAllowed->CheckInBaggage,
 "HandBaggage"=> $FlightSegment->BaggageAllowed->HandBaggage
 ),
 "AccumulatedDuration"=> "0"
 )
 ],
 "PassportDetails"=> "",
"PostalCode"=>  $pincode,
 "Provider"=> $key->Provider,
 "psgrtype"=> "",
 "ReturnDate"=> $_SESSION['endDate'],
 "ReturnFlightSegments"=> null,
 "Rule"=> $key->OriginDestinationoptionId->Key,
 "RuleRet"=> null,
 "SCharge"=> $taxarray->ChargeableFares->SCharge,
 "SChargeRet"=> 0,
 "SMSUsageCount"=> 0,
 "Source"=> $_SESSION['from_address'],
 "SourceName"=> $IntDepartureAirportName,
 "State"=> $state,
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

// var_dump($jsonData);

$url = 'https://webapi.etravos.com/Flights/BlockFlightTicket';

$headers =  [
    "ConsumerKey: 816EDF7E056EB6E0D84B997CAB3F000C4ABE2FC7",
    "ConsumerSecret: 0EC008F43044CADBA7D71D50CCBC6948F756799F",
    'Content-Type: application/json',
      "Accept-Encoding:gzip, deflate",
];


$ch = curl_init($url);
 
$jsonDataEncoded = json_encode($jsonData);
 
$result = curl($url, $jsonDataEncoded, "application/json", true,$headers);
    // $result1 = gzdecode($result);
    $ooo = gzdecode($result);

$response = json_decode($ooo);

// var_dump($response);
$ReferenceNo= $response->ReferenceNo;
$BookingStatus= $response->BookingStatus;
$Message= $response->Message;

$_SESSION['ReferenceNo'] =$ReferenceNo;
echo "ReferenceNo" . $ReferenceNo;


}














if ($_SESSION['tripType']==2) {

  echo "2";
  $rkey =$obj->DomesticReturnFlights[$rcount];

     $rFareDetails = $rkey->FareDetails;
     $rChargeableFares = $rFareDetails->ChargeableFares;
     $rActualBaseFare = $rChargeableFares->ActualBaseFare;

     $rFlightSegments = $rkey->FlightSegments;

    $rkeyfare = $rkey->OriginDestinationoptionId->Key;
   $rairlineIdfare =  $rFlightSegments[0]->OperatingAirlineCode;
   $rcouponFarefare = $rFlightSegments[0]->RPH;
   $rflightIdfare = $rFlightSegments[0]->OperatingAirlineFlightNumber;
   $rproviderfare = $rkey->Provider;
   $rclassCode = $rFlightSegments[0]->BookingClassFare->ClassType;


$rfares = curl("https://webapi.etravos.com/Flights/GetFareRule?key=".$rkeyfare."&airlineId=".$rairlineIdfare."&flightId=".$rflightIdfare."&classCode=".$rclassCode."&service=1&provider=".$rproviderfare."&tripType=2&couponFare=".$rcouponFarefare."&userType=5&user=", [], "application/json", false, [
    "ConsumerKey: 816EDF7E056EB6E0D84B997CAB3F000C4ABE2FC7",
    "ConsumerSecret: 0EC008F43044CADBA7D71D50CCBC6948F756799F",
    "Accept-Encoding:gzip, deflate",
]);
    $ro23 = gzdecode($rfares);
    $rfarerule = json_decode($ro23);




    foreach ($rkey->FlightSegments as $rFlightSegment) 

{


  $rjsontax = array(
 
"ActualBaseFare"=> $taxarray->ChargeableFares->ActualBaseFare,
 "ActualBaseFareRet"=> $rActualBaseFare,
 "Address"=> "Hyderbad",
 "AdultPax"=> $_SESSION['Adults'],
 "BookedFrom"=> null,
 "BookingDate"=> date('d-m-Y'),
 "ChildPax"=> $_SESSION['Children'],
 "Conveniencefee"=> 0,
 "ConveniencefeeRet"=> 0,
 "Destination"=> $_SESSION['to_address'] ,
 "DestinationName"=> $IntArrivalAirportName,
 "FareDetails"=> null,
 "FlightId"=> $key->OriginDestinationoptionId->Id,
 "FlightIdRet"=> "",
 "FlightType"=> 1,
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
 "IsLCCRet"=> $rkey->IsLCC,
 "IsNonStopFlight"=> false,
 "JourneyDate"=> $_SESSION['start_Date'],
 "key"=> $key->OriginDestinationoptionId->Key,
 "keyRet"=> $rkey->OriginDestinationoptionId->Key,
 "OcTax"=> $FlightSegment->AirEquipType,
 
 "OnwardFlightSegments"=> [
 array(
"AirEquipType"=> $FlightSegment->AirEquipType,
"ArrivalAirportCode"=> $FlightSegment->ArrivalAirportCode,
"ArrivalDateTime"=> $FlightSegment->ArrivalDateTime,
"ArrivalDateTimeZone"=> $FlightSegment->ArrivalDateTimeZone,
"DepartureAirportCode"=> $FlightSegment->DepartureAirportCode,
"DepartureDateTime"=> $FlightSegment->DepartureDateTime,
"DepartureDateTimeZone"=> $FlightSegment->DepartureDateTimeZone,
"Duration"=> $FlightSegment->Duration,
"FlightNumber"=> $FlightSegment->FlightNumber,
"OperatingAirlineCode"=> $FlightSegment->OperatingAirlineCode,
"OperatingAirlineFlightNumber"=> $FlightSegment->OperatingAirlineFlightNumber,
"RPH"=> $FlightSegment->RPH,
"StopQuantity"=> $FlightSegment->StopQuantity,
"AirLineName"=> $AirLineName,
"AirportTax"=> $FlightSegment->AirLineName,
"ImageFileName"=> $FlightSegment->ImageFileName,
"ImagePath"=> $FlightSegment->ImagePath,
"ViaFlight"=> $FlightSegment->ViaFlight,
"Discount"=> $FlightSegment->Discount,
"AirportTaxChild"=> $FlightSegment->AirportTaxChild,
"AirportTaxInfant"=> $FlightSegment->AirportTaxInfant,
"AdultTaxBreakup"=> $FlightSegment->AdultTaxBreakup,
"ChildTaxBreakup"=> $FlightSegment->ChildTaxBreakup,
"InfantTaxBreakup"=> $FlightSegment->InfantTaxBreakup,
"OcTax"=> $FlightSegment->OcTax,
 "BookingClass"=> array(
 "Availability"=> $FlightSegment->BookingClass->Availability,
 "ResBookDesigCode"=> $FlightSegment->BookingClass->ResBookDesigCode,
 "IntBIC"=> ""
 ),
 "BookingClassFare"=> array(
 "AdultFare"=> $FlightSegment->BookingClassFare->AdultFare,
 "Bookingclass"=> $FlightSegment->BookingClassFare->Bookingclass,
 "ClassType"=> $FlightSegment->BookingClassFare->ClassType,
 "Farebasiscode"=> $FlightSegment->BookingClassFare->Farebasiscode,
 "Rule"=> $farerule ,
 "AdultCommission"=> null,
 "ChildCommission"=> null,
 "CommissionOnTCharge"=> null,
 "ChildFare"=> null,
 "InfantFare"=> null
 ),
 "IntNumStops"=> null,
 "IntOperatingAirlineName"=> null,
 "IntArrivalAirportName"=> $FlightSegment->IntArrivalAirportName,
 "IntDepartureAirportName"=> $FlightSegment->IntDepartureAirportName,
 "IntMarketingAirlineCode"=> $FlightSegment->IntMarketingAirlineCode,
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
 "CheckInBaggage"=> $FlightSegment->BaggageAllowed->CheckInBaggage,
 "HandBaggage"=> $FlightSegment->BaggageAllowed->HandBaggage
 ),
 "AccumulatedDuration"=> "0"
 )
 ],


 "Provider"=> $key->Provider,
 "ReturnDate"=> $_SESSION['endDate'],
 "ReturnFlightSegments"=>  [
 array(
"AirEquipType"=> $rFlightSegment->AirEquipType,
"ArrivalAirportCode"=> $rFlightSegment->ArrivalAirportCode,
"ArrivalDateTime"=> $rFlightSegment->ArrivalDateTime,
"ArrivalDateTimeZone"=> $rFlightSegment->ArrivalDateTimeZone,
"DepartureAirportCode"=> $rFlightSegment->DepartureAirportCode,
"DepartureDateTime"=> $rFlightSegment->DepartureDateTime,
"DepartureDateTimeZone"=> $rFlightSegment->DepartureDateTimeZone,
"Duration"=> $rFlightSegment->Duration,
"FlightNumber"=> $rFlightSegment->FlightNumber,
"OperatingAirlineCode"=> $rFlightSegment->OperatingAirlineCode,
"OperatingAirlineFlightNumber"=> $rFlightSegment->OperatingAirlineFlightNumber,
"RPH"=> $rFlightSegment->RPH,
"StopQuantity"=> $rFlightSegment->StopQuantity,
"AirLineName"=> $rFlightSegment->AirLineName,
"AirportTax"=> $rFlightSegment->AirLineName,
"ImageFileName"=> $rFlightSegment->ImageFileName,
"ImagePath"=> $rFlightSegment->ImagePath,
"ViaFlight"=> $rFlightSegment->ViaFlight,
"Discount"=> $rFlightSegment->Discount,
"AirportTaxChild"=> $rFlightSegment->AirportTaxChild,
"AirportTaxInfant"=> $rFlightSegment->AirportTaxInfant,
"AdultTaxBreakup"=> $rFlightSegment->AdultTaxBreakup,
"ChildTaxBreakup"=> $rFlightSegment->ChildTaxBreakup,
"InfantTaxBreakup"=> $rFlightSegment->InfantTaxBreakup,
"OcTax"=> $rFlightSegment->OcTax,
 "BookingClass"=> array(
 "Availability"=> $rFlightSegment->BookingClass->Availability,
 "ResBookDesigCode"=> $rFlightSegment->BookingClass->ResBookDesigCode,
 "IntBIC"=> ""
 ),
 "BookingClassFare"=> array(
 "AdultFare"=> $rFlightSegment->BookingClassFare->AdultFare,
 "Bookingclass"=> $rFlightSegment->BookingClassFare->Bookingclass,
 "ClassType"=> $rFlightSegment->BookingClassFare->ClassType,
 "Farebasiscode"=> $rFlightSegment->BookingClassFare->Farebasiscode,
 "Rule"=> $rfarerule,
 "AdultCommission"=> null,
 "ChildCommission"=> null,
 "CommissionOnTCharge"=> null,
 "ChildFare"=> null,
 "InfantFare"=> null
 ),
 "IntNumStops"=> null,
 "IntOperatingAirlineName"=> null,
 "IntArrivalAirportName"=> $rFlightSegment->IntArrivalAirportName,
 "IntDepartureAirportName"=> $rFlightSegment->IntDepartureAirportName,
 "IntMarketingAirlineCode"=> $rFlightSegment->IntMarketingAirlineCode,
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
 "CheckInBaggage"=> $rFlightSegment->BaggageAllowed->CheckInBaggage,
 "HandBaggage"=> $rFlightSegment->BaggageAllowed->HandBaggage,
 ),
 "AccumulatedDuration"=> "0"
 )
 ],
 "Rule"=> $FlightSegment->BookingClassFare->Rule,
 "RuleRet"=> $rFlightSegment->BookingClassFare->Rule,
 "SCharge"=> $ChargeableFares->SCharge,
 "SChargeRet"=> $rChargeableFares->SCharge,
 "SMSUsageCount"=> 0,
 "Source"=> $_SESSION['from_address'],
 "SourceName"=> $IntDepartureAirportName,
 "State"=> $state,
 "STax"=> $ChargeableFares->STax,
 "STaxRet"=> $rChargeableFares->STax,
 "Tax"=> $ChargeableFares->Tax,
 "TaxRet"=> $rChargeableFares->Tax,
 "TCharge"=> 0,
 "TChargeRet"=> 0,
 "TDiscount"=> $ChargeableFares->TDiscount,
 "TDiscountRet"=> $rChargeableFares->TDiscount,
 "TMarkup"=> 0,
 "TMarkupRet"=> 0,
 "TPartnerCommission"=> 0,
 "TPartnerCommissionRet"=> 0,
 "TravelClass"=> $_SESSION['classvalue'],
 "TripType"=> 2,
 "TSdiscount"=> 0,
 "TSDiscountRet"=> 0,
 "User"=> "",
 "UserType"=> 5



);




 
$rjsonDataEncoded1 = json_encode($rjsontax);
// var_dump($jsonDataEncoded1);
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

$_SESSION['TotalFare']= $rtaxarray->TotalFare + $_SESSION['TotalFare'];
echo $_SESSION['TotalFare'];




$jsonData = array(

 "ActualBaseFare"=> $taxarray->ChargeableFares->ActualBaseFare,
 "ActualBaseFareRet"=> $rtaxarray->ChargeableFares->ActualBaseFare,
 "Address"=> "Hyderbad",
 "AdultPax"=> $_SESSION['Adults'],
 "ages"=> $arrayage,
 "BookedFrom"=> null,
 "BookingDate"=> date('d-m-Y'),
 "ChildPax"=> $_SESSION['Children'],
 "City"=> "Hyderbad",
 "Conveniencefee"=> 0,
 "ConveniencefeeRet"=> 0,
 "Destination"=> $_SESSION['to_address'] ,
 "DestinationName"=> $IntArrivalAirportName,
 "dob"=> $arraydob,
 "EmailId"=> $Email,
 "FareDetails"=> null,
 "FlightId"=> $key->OriginDestinationoptionId->Id,
 "FlightIdRet"=> $rkey->OriginDestinationoptionId->Id,
 "FlightType"=> 1,
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
 "IsLCCRet"=> $rkey->IsLCC,
 "IsNonStopFlight"=> false,
 "JourneyDate"=> $_SESSION['start_Date'],
 "key"=> $key->OriginDestinationoptionId->Key,
 "keyRet"=> $rkey->OriginDestinationoptionId->Key,
 "MobileNo"=> $Mobile ,
 "Names"=> $arrayname,
 "OcTax"=> $FlightSegment->AirEquipType,
 
 "OnwardFlightSegments"=> [
 array(
"AirEquipType"=> $FlightSegment->AirEquipType,
"ArrivalAirportCode"=> $FlightSegment->ArrivalAirportCode,
"ArrivalDateTime"=> $FlightSegment->ArrivalDateTime,
"ArrivalDateTimeZone"=> $FlightSegment->ArrivalDateTimeZone,
"DepartureAirportCode"=> $FlightSegment->DepartureAirportCode,
"DepartureDateTime"=> $FlightSegment->DepartureDateTime,
"DepartureDateTimeZone"=> $FlightSegment->DepartureDateTimeZone,
"Duration"=> $FlightSegment->Duration,
"FlightNumber"=> $FlightSegment->FlightNumber,
"OperatingAirlineCode"=> $FlightSegment->OperatingAirlineCode,
"OperatingAirlineFlightNumber"=> $FlightSegment->OperatingAirlineFlightNumber,
"RPH"=> $FlightSegment->RPH,
"StopQuantity"=> $FlightSegment->StopQuantity,
"AirLineName"=> $AirLineName,
"AirportTax"=> $FlightSegment->AirLineName,
"ImageFileName"=> $FlightSegment->ImageFileName,
"ImagePath"=> $FlightSegment->ImagePath,
"ViaFlight"=> $FlightSegment->ViaFlight,
"Discount"=> $FlightSegment->Discount,
"AirportTaxChild"=> $FlightSegment->AirportTaxChild,
"AirportTaxInfant"=> $FlightSegment->AirportTaxInfant,
"AdultTaxBreakup"=> $FlightSegment->AdultTaxBreakup,
"ChildTaxBreakup"=> $FlightSegment->ChildTaxBreakup,
"InfantTaxBreakup"=> $FlightSegment->InfantTaxBreakup,
"OcTax"=> $FlightSegment->OcTax,
 "BookingClass"=> array(
 "Availability"=> $FlightSegment->BookingClass->Availability,
 "ResBookDesigCode"=> $FlightSegment->BookingClass->ResBookDesigCode,
 "IntBIC"=> ""
 ),
 "BookingClassFare"=> array(
 "AdultFare"=> $FlightSegment->BookingClassFare->AdultFare,
 "Bookingclass"=> $FlightSegment->BookingClassFare->Bookingclass,
 "ClassType"=> $FlightSegment->BookingClassFare->ClassType,
 "Farebasiscode"=> $FlightSegment->BookingClassFare->Farebasiscode,
 "Rule"=> $farerule ,
 "AdultCommission"=> null,
 "ChildCommission"=> null,
 "CommissionOnTCharge"=> null,
 "ChildFare"=> null,
 "InfantFare"=> null
 ),
 "IntNumStops"=> null,
 "IntOperatingAirlineName"=> null,
 "IntArrivalAirportName"=> $FlightSegment->IntArrivalAirportName,
 "IntDepartureAirportName"=> $FlightSegment->IntDepartureAirportName,
 "IntMarketingAirlineCode"=> $FlightSegment->IntMarketingAirlineCode,
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
 "CheckInBaggage"=> $FlightSegment->BaggageAllowed->CheckInBaggage,
 "HandBaggage"=> $FlightSegment->BaggageAllowed->HandBaggage
 ),
 "AccumulatedDuration"=> "0"
 )
 ],
 "PassportDetails"=> "",
 "PostalCode"=> $pincode,
 "Provider"=> $key->Provider,
 "psgrtype"=> "",
 "ReturnDate"=> $_SESSION['endDate'],

 "ReturnFlightSegments"=>  [
 array(
"AirEquipType"=> $rFlightSegment->AirEquipType,
"ArrivalAirportCode"=> $rFlightSegment->ArrivalAirportCode,
"ArrivalDateTime"=> $rFlightSegment->ArrivalDateTime,
"ArrivalDateTimeZone"=> $rFlightSegment->ArrivalDateTimeZone,
"DepartureAirportCode"=> $rFlightSegment->DepartureAirportCode,
"DepartureDateTime"=> $rFlightSegment->DepartureDateTime,
"DepartureDateTimeZone"=> $rFlightSegment->DepartureDateTimeZone,
"Duration"=> $rFlightSegment->Duration,
"FlightNumber"=> $rFlightSegment->FlightNumber,
"OperatingAirlineCode"=> $rFlightSegment->OperatingAirlineCode,
"OperatingAirlineFlightNumber"=> $rFlightSegment->OperatingAirlineFlightNumber,
"RPH"=> $rFlightSegment->RPH,
"StopQuantity"=> $rFlightSegment->StopQuantity,
"AirLineName"=> $rFlightSegment->AirLineName,
"AirportTax"=> $rFlightSegment->AirLineName,
"ImageFileName"=> $rFlightSegment->ImageFileName,
"ImagePath"=> $rFlightSegment->ImagePath,
"ViaFlight"=> $rFlightSegment->ViaFlight,
"Discount"=> $rFlightSegment->Discount,
"AirportTaxChild"=> $rFlightSegment->AirportTaxChild,
"AirportTaxInfant"=> $rFlightSegment->AirportTaxInfant,
"AdultTaxBreakup"=> $rFlightSegment->AdultTaxBreakup,
"ChildTaxBreakup"=> $rFlightSegment->ChildTaxBreakup,
"InfantTaxBreakup"=> $rFlightSegment->InfantTaxBreakup,
"OcTax"=> $rFlightSegment->OcTax,
 "BookingClass"=> array(
 "Availability"=> $rFlightSegment->BookingClass->Availability,
 "ResBookDesigCode"=> $rFlightSegment->BookingClass->ResBookDesigCode,
 "IntBIC"=> ""
 ),
 "BookingClassFare"=> array(
 "AdultFare"=> $rFlightSegment->BookingClassFare->AdultFare,
 "Bookingclass"=> $rFlightSegment->BookingClassFare->Bookingclass,
 "ClassType"=> $rFlightSegment->BookingClassFare->ClassType,
 "Farebasiscode"=> $rFlightSegment->BookingClassFare->Farebasiscode,
 "Rule"=> $rfarerule ,
 "AdultCommission"=> null,
 "ChildCommission"=> null,
 "CommissionOnTCharge"=> null,
 "ChildFare"=> null,
 "InfantFare"=> null
 ),
 "IntNumStops"=> null,
 "IntOperatingAirlineName"=> null,
 "IntArrivalAirportName"=> $rFlightSegment->IntArrivalAirportName,
 "IntDepartureAirportName"=> $rFlightSegment->IntDepartureAirportName,
 "IntMarketingAirlineCode"=> $rFlightSegment->IntMarketingAirlineCode,
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
 "CheckInBaggage"=> $rFlightSegment->BaggageAllowed->CheckInBaggage,
 "HandBaggage"=> $rFlightSegment->BaggageAllowed->HandBaggage,
 ),
 "AccumulatedDuration"=> "0"
 )
 ],
 "Rule"=> $FlightSegment->BookingClassFare->Rule,
 "RuleRet"=> $rFlightSegment->BookingClassFare->Rule,
 "SCharge"=> $ChargeableFares->SCharge,
 "SChargeRet"=> $rChargeableFares->SCharge,
 "SMSUsageCount"=> 0,
 "Source"=> $_SESSION['from_address'],
 "SourceName"=> $IntDepartureAirportName,
 "State"=> $state,
 "STax"=> $ChargeableFares->STax,
 "STaxRet"=> $rChargeableFares->STax,
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



}
// var_dump($jsonData);
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
$BookingStatus= $response->BookingStatus;
$Message= $response->Message;

$_SESSION['ReferenceNo'] =$ReferenceNo;
echo "ReferenceNo" . $ReferenceNo;

}
 ?>
                          

                    
                            <div class="booking-item-container bg-white">

                              <?php foreach ($key->FlightSegments as $flightSegment) {
                                # code...
                               ?>
                                
                                  <div  class="bg-white  checkput-flight m-b-10">
                                    <div  class="fight-table-list">
                                        
                                          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                                    <span class="largo-logo">
                                                        <?php require "image.php"; ?>
                                                    <img src="<?php echo $IMG;?>" alt="Image Alternative text" title="Image Title" />
                                                    </span>
                                                    <aside>
                                                     <p class="uppercase"><?php echo $flightSegment->AirLineName;
                                                                        $AirLineName=$flightSegment->AirLineName;?></p>

                                                      <small><?php echo $flightSegment->OperatingAirlineCode;
                                                      $OperatingAirlineCode=$flightSegment->OperatingAirlineCode;?>-

                                                      <?php echo $flightSegment->OperatingAirlineFlightNumber;

                                                            $OperatingAirlineFlightNumber =$flightSegment->OperatingAirlineFlightNumber;                                                               ?></small>
                                                      </aside>
                                               </div>
                                                  <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                                        <p class="uppercase"><?php echo $flightSegment->DepartureAirportCode;?></p>
                                                        <h4 class="theme-color-text font-bold"><?php echo substr($flightSegment->DepartureDateTime, 11,5);
                                                        $departtime = substr($flightSegment->DepartureDateTime, 11,5);?></h4>


                                                        <p><?php echo substr($flightSegment->DepartureDateTime, 0,10);
                                                        $departdate = substr($flightSegment->DepartureDateTime, 0,10);?></p>

                                                        <p><?php echo $flightSegment->IntDepartureAirportName;
                                                        $IntDepartureAirportName = $flightSegment->IntDepartureAirportName;
                                                        ?></p>

                                                  </div>
                                                   <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                                   <div class="border-grey"></div>
                                                     <i class="fa fa-plane flight-time"></i>
                                                     <div class="text-center m-t-15"><i class="fa fa-clock-o m-r-5"></i><span><?php echo $flightSegment->Duration;
                                                     $Duration = $flightSegment->Duration;?></span></div>
                                                   </div>
                                                    
                                                    
                                                     
                                                     <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                                     <div class="pull-right">
                                                        <p class="uppercase"><?php echo $flightSegment->ArrivalAirportCode;?></p>
                                                        <h4 class="theme-color-text font-bold"><?php echo substr($flightSegment->ArrivalDateTime, 11,5);
                                                        $ArrivalTime = substr($flightSegment->ArrivalDateTime, 11,5);?></h4>

                                                        <p><?php echo substr($flightSegment->ArrivalDateTime, 0,10);
                                                        $ArrivalDate = substr($flightSegment->ArrivalDateTime, 0,10);?></p>
                                                        <p><?php echo $flightSegment->IntArrivalAirportName;
                                                        $IntArrivalAirportName = $flightSegment->IntArrivalAirportName;?></p>
                                                        </div>

                                                  </div>
                                          
                        
                                </div>
                                        
                                    
  
                  </div>

            <?php } ?>

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
                                 Make Payment</button> </a> <span class="col-lg-6"> <h4 class="theme-color-text font-bold margin-0">Rs. <?php echo number_format($IntAmount); ?></h4><p>Total in INR incl Rs. conv fee.</p></span>
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
                                   <div  class="col-md-5 col-xs-5 p-r-0"><h5  class="pull-right">Rs. <?php echo number_format($totaltax); ?></h5></div>
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
                                            <h3  class="pull-right text-white">Rs. <?php echo number_format($IntAmount); ?></h3>
                                            
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
    </div>






   <form name="redirect" action="dataFrom.php" method="get">
      

    </form>
<?php 

if ($BookingStatus==8) {
echo "<script language='javascript'>document.redirect.submit();</script>";
}
else echo "<script language='javascript'>alert(".$Message.");</script>";
?>

</body>




</html>



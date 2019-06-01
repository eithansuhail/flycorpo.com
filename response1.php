<?php
session_start();
require "init.php";


$allAirports = curl("http://webapi.i2space.co.in/Flights/AvailableFlights?source=HYD&destination=BLR&journeyDate=01-01-2020&tripType=1&flightType=1&adults=1&children=0&infants=0&travelClass=E&userType=5&returnDate=01-01-2020", [], "application/json", false, [
    "ConsumerKey: 816EDF7E056EB6E0D84B997CAB3F000C4ABE2FC7",
    "ConsumerSecret: 0EC008F43044CADBA7D71D50CCBC6948F756799F",
]);


$obj = json_decode($allAirports);
$key =$obj->DomesticOnwardFlights[0];


$key1 = $key->FareDetails;
$key2 = $key1->FareBreakUp;
$key3 = $key2->FareAry[0];
$key4 = $key3->IntTaxDataArray[0];
// echo $key4->IntAmount;



?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

 <div class="container" >
	 <?php

   

     $key =$obj->DomesticOnwardFlights[5];
    foreach ($key->FlightSegments as $FlightSegment) {
    echo "{
        <br>ArrivalAirportCode :  ".$FlightSegment->ArrivalAirportCode;
        echo "<br>AirLineName :  ".$FlightSegment->AirLineName;
        echo "<br>DepartureAirportCode :  ".$FlightSegment->DepartureAirportCode;
        echo "<br>DepartureAirportCode :  ".$FlightSegment->DepartureAirportCode;
    echo "<br>DepartureAirportCode :  ".$FlightSegment->DepartureAirportCode;
    echo "<br>ArrivalDateTime :  ".$FlightSegment->ArrivalDateTime;
    echo "<br>FlightNumber :  ".$FlightSegment->FlightNumber;
    echo "<br>OperatingAirlineCode :  ".$FlightSegment->OperatingAirlineCode."}<br>";
     echo $FlightSegment->OperatingAirlineCode; echo $FlightSegment->OperatingAirlineFlightNumber;
    

    $key1 = $key->FareDetails;
$key2 = $key1->FareBreakUp;
$key3 = $key2->FareAry[0];
$key4 = $key3->IntTaxDataArray[0];
    


        
        echo "<br>PRICE :  ".$key4->IntAmount."}<br>";
    




} ?>

 </div>
</body>
</html>


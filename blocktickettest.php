<?php
session_start();
require "init.php";

$key= "70ba73c4-f1cf-4fad-8777-669bef5d3292~OB1~636892207383990597182";

$jsonData = array(

 "ActualBaseFare"=> 1472,
 "ActualBaseFareRet"=> 0,
 "Address"=> "Hyderbad",
 "AdultPax"=> 1,
 "ages"=> "24",
 "BookedFrom"=> null,
 "BookingDate"=> "20-04-2019",
 "ChildPax"=> 0,
 "City"=> "Hyderbad",
 "Conveniencefee"=> 0,
 "ConveniencefeeRet"=> 0,
 "Destination"=> "BLR",
 "DestinationName"=> "BANGALORE, India - (BLR)-Bangalore International Airport",
 "dob"=> "11-01-1993",
 "EmailId"=> "guru.m@i2space.com",
 "FareDetails"=> null,
 "FlightId"=> "",
 "FlightIdRet"=> null,
 "FlightType"=> 1,
 "Genders"=> "M",
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
 "InfantPax"=> 0,
 "IsLCC"=> true,
 "IsLCCRet"=> null,
 "IsNonStopFlight"=> false,
 "JourneyDate"=> "01-01-2020",
 "key"=> $key,
 "keyRet"=> null,
 "MobileNo"=> "9999999999",
 "Names"=> "Mr.|Guru|Bharath|adt",
 "OcTax"=> 0,
 "OnwardFlightSegments"=> [
 array(
"AirEquipType"=> "320",
"ArrivalAirportCode"=> "BLR",
"ArrivalDateTime"=> "2020-01-01T09=>50=>00",
"ArrivalDateTimeZone"=> "01/01/2020 9=>50=>00 AM",
"DepartureAirportCode"=> "HYD",
"DepartureDateTime"=> "2020-01-01T08=>25=>00",
"DepartureDateTimeZone"=> "01/01/2020 8=>25=>00 AM",
"Duration"=> "01=>25 hrs",
"FlightNumber"=> "151",
"OperatingAirlineCode"=> "6E",
"OperatingAirlineFlightNumber"=> "151",
"RPH"=> "",
"StopQuantity"=> "0",
"AirLineName"=> "Indigo",
"AirportTax"=> null,
"ImageFileName"=> "6E",
"ImagePath"=> "/Images/airline_logos/6E.png",
"ViaFlight"=> "",
"Discount"=> "0",
"AirportTaxChild"=> "0",
"AirportTaxInfant"=> "0",
"AdultTaxBreakup"=> "0",
"ChildTaxBreakup"=> "0",
"InfantTaxBreakup"=> "0",
"OcTax"=> "0",
 "BookingClass"=> array(
 "Availability"=> "9",
 "ResBookDesigCode"=> "L",
 "IntBIC"=> ""
 ),
 "BookingClassFare"=> array(
 "AdultFare"=> "",
 "Bookingclass"=> "",
 "ClassType"=> "L",
 "Farebasiscode"=> "L0IP",
 "Rule"=> "Refundable",
 "AdultCommission"=> null,
 "ChildCommission"=> null,
 "CommissionOnTCharge"=> null,
 "ChildFare"=> null,
 "InfantFare"=> null
 ),
 "IntNumStops"=> null,
 "IntOperatingAirlineName"=> null,
 "IntArrivalAirportName"=> "Bangalore",
 "IntDepartureAirportName"=> "Hyderabad",
 "IntMarketingAirlineCode"=> "151",
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
 "CheckInBaggage"=> "15 Kg",
 "HandBaggage"=> "7 Kg"
 ),
 "AccumulatedDuration"=> "0"
 )
 ],
 "PassportDetails"=> "",
 "PostalCode"=> "500071",
 "Provider"=> "OpvFxVwo03md+gnyIb8Q+A==",
 "psgrtype"=> "",
 "ReturnDate"=> "01-01-2020",
 "ReturnFlightSegments"=> null,
 "Rule"=> "Refundable",
 "RuleRet"=> null,
 "SCharge"=> 0,
 "SChargeRet"=> 0,
 "SMSUsageCount"=> 0,
 "Source"=> "HYD",
 "SourceName"=> "HYDERABAD, India - (HYD)-Rajiv Gandhi Airport",
 "State"=> "Telangana",
 "STax"=> 0,
 "STaxRet"=> 0,
 "Tax"=> 825,
 "TaxRet"=> 0,
 "TCharge"=> 0,
 "TChargeRet"=> 0,
 "TDiscount"=> 0,
 "TDiscountRet"=> 0,
 "telePhone"=> "8888888888",
 "TMarkup"=> 0,
 "TMarkupRet"=> 0,
 "TPartnerCommission"=> 0,
 "TPartnerCommissionRet"=> 0,
 "TravelClass"=> "E",
 "TripType"=> 1,
 "TSdiscount"=> 0,
 "TSDiscountRet"=> 0,
 "User"=> "",
 "UserType"=> 5


);


$url = 'http://webapi.i2space.co.in/Flights/BlockFlightTicket';

$headers =  [
    "ConsumerKey: 816EDF7E056EB6E0D84B997CAB3F000C4ABE2FC7",
    "ConsumerSecret: 0EC008F43044CADBA7D71D50CCBC6948F756799F",
    'Content-Type: application/json',
];

 
//Initiate cURL.
$ch = curl_init($url);
 
//The JSON data.

 
//Encode the array into JSON.
$jsonDataEncoded = json_encode($jsonData);
 
//Tell cURL that we want to send a POST request.
curl_setopt($ch, CURLOPT_POST, 1);
 
//Attach our encoded JSON string to the POST fields.
curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
 
//Set the content type to application/json
// curl_setopt($ch, CURLOPT_HTTPHEADER, array()); 
 
//Execute the request
$result = curl_exec($ch);

var_dump($result);

?>
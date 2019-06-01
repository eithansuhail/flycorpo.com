<?php 
  $keyfare = $key->OriginDestinationoptionId->Key;
   $airlineIdfare =  $FlightSegment->OperatingAirlineCode;
   $couponFarefare = $FlightSegment->RPH;
   $flightIdfare = $FlightSegment->OperatingAirlineFlightNumber;
   $providerfare = $key->Provider;
   $classCode = $FlightSegment->BookingClassFare->ClassType;


$fares = curl("http://webapi.i2space.co.in/Flights/GetFareRule?key=".$keyfare."&airlineId=".$airlineIdfare."&flightId=".$flightIdfare."&classCode=".$classCode."&service=1&provider=".$providerfare."&tripType=1&couponFare=".$couponFarefare."&userType=5&user=", [], "application/json", false, [
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
 "State"=> "Telangana",
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
$url = 'http://webapi.i2space.co.in/Flights/GetTaxDetails';
$headers =  [
    "ConsumerKey: 816EDF7E056EB6E0D84B997CAB3F000C4ABE2FC7",
    "ConsumerSecret: 0EC008F43044CADBA7D71D50CCBC6948F756799F",
    'Content-Type: application/json',
      "Accept-Encoding:gzip, deflate",
];
    
 
$result = curl($url, $jsonDataEncoded1, "application/json", true,$headers);
    $result1 = gzdecode($result);


$taxarray = json_decode($result1);
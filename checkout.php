<?php
session_start();
require "init.php";
include("functions.php");

$count = base64_decode($_GET['count']);
$rcount = base64_decode($_GET['rcount']);

$url = "https://webapi.etravos.com/Flights/AvailableFlights?source=".$_SESSION['from_address']."&destination=".$_SESSION['to_address']."&journeyDate=".$_SESSION['start_Date']."&tripType=".$_SESSION['tripType']."&flightType=1&adults=".$_SESSION['Adults']."&children=".$_SESSION['Children']."&infants=".$_SESSION['Infant']."&travelClass=".$_SESSION['classvalue']."&userType=5&returnDate=".$_SESSION['endDate'];

// echo $url;

$allAirports = curl($url, [], "application/json", false, [
    "ConsumerKey: ",
    "ConsumerSecret: ",
    "Accept-Encoding:gzip, deflate",
]);
    $o = gzdecode($allAirports);



$IntBaseFare=0;
$IntTax=0;
$IntAmount=0;

$obj = json_decode($o);


                                                        
$query= "SELECT * FROM all_states";
  $result=mysqli_query($link,$query) or die("Bad SQL: $query");

   if (mysqli_num_rows($result) > 0) {
                                                                            // output data of each row
        $result->data_seek(0);
        $states = "";
    while($row3 = mysqli_fetch_assoc($result)) {  

    $states .= '<option value='.$row3["state_code"].'>'.$row3["state_name"].'</option>';
}

}

?>
<!DOCTYPE HTML>
<html>

<head>
    <title>Checkout page- Flycorpo</title>
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
    <link rel="stylesheet" href="css/styles1.css">
    <link rel="stylesheet" href="css/schemes/bright-turquoise.css" />
</head>
<link rel="stylesheet" href="css/mystyles.css">
<script src="js/modernizr.js"></script>
<link rel="stylesheet" href="css/schemes/bright-turquoise.css" />
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $("select.state").change(function() {
        var selectedState = $(".state option:selected").val();
        $.ajax({
            type: "POST",
            url: "process-request.php",
            data: { state: selectedState }
        }).done(function(data) {
            $("#response").html(data);
        });
    });
});
</script>
</head>

<body>
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
        <section class="flight-search-result" style='margin-bottom:50px;'>
            <div class="container">
                <div class="row">
                    <div class="col-md-9">
                        <div class="row">
                            <div class="search-result-header m-t-15">
                                <div class="col-md-6 padding-0  m-b-15">
                                    <div class="pull-left">
                                        <h5>Confirm Your Booking</h5>
                                    </div>
                                </div>
                                <div class="col-md-6 padding-0  m-b-15">
                                    <div class="pull-right">
                                        <!-- <button type="button" class="btn btn-primary uppercase" data-toggle="modal" data-target="#exampleModalLong">
                                 Checkout</button>  -->
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <?php

   

     $key =$obj->DomesticOnwardFlights[$count];
    $FlightSegment = $key->FlightSegments[0]; ?>
                            <div class="booking-item-container bg-white" style="
                border-radius: 7px;  
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
                
                border: 2px;">
                                <?php foreach ($key->FlightSegments as $flightSegment) {
                                # code...
                               ?>
                                <div class="bg-white  checkput-flight m-b-10">
                                    <div class="fight-table-list">
                                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                            <span class="largo-logo">
                                                <?php require "image.php"; ?>
                                                <img src="http://webapi.i2space.co.in<?php echo $FlightSegment->ImagePath?>" alt="Image Alternative text" title="Image Title" />
                                            </span>
                                            <aside>
                                                <p class="uppercase">
                                                    <?php $airname = explode(" ", $flightSegment->AirLineName);
                                                     echo $airname[0];
                                                                        $AirLineName=$flightSegment->AirLineName;?>
                                                </p>
                                                <small>
                                                    <?php echo $flightSegment->OperatingAirlineCode;
                                                      $OperatingAirlineCode=$flightSegment->OperatingAirlineCode;?>-
                                                    <?php echo $flightSegment->OperatingAirlineFlightNumber;

                                                            $OperatingAirlineFlightNumber =$flightSegment->OperatingAirlineFlightNumber;                                                               ?></small>
                                            </aside>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4">
                                            <p class="uppercase">
                                                <?php echo $flightSegment->DepartureAirportCode;?>
                                            </p>
                                            <h4 class="theme-color-text font-bold">
                                                <?php echo substr($flightSegment->DepartureDateTime, 11,5);
                                                        $departtime = substr($flightSegment->DepartureDateTime, 11,5);?>
                                            </h4>
                                            <p>
                                                <?php echo substr($flightSegment->DepartureDateTime, 0,10);
                                                        $departdate = substr($flightSegment->DepartureDateTime, 0,10);?>
                                            </p>
                                            <p>
                                                <?php echo $flightSegment->IntDepartureAirportName;
                                                        $IntDepartureAirportName = $flightSegment->IntDepartureAirportName;
                                                        ?>
                                            </p>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4">
                                            <div class="border-grey"></div>
                                            <i class="fa fa-plane flight-time"></i>
                                            <div class="text-center m-t-15"><i class="fa fa-clock-o m-r-5"></i><span>
                                                    <?php echo $flightSegment->Duration;
                                                     $Duration = $flightSegment->Duration;?></span></div>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4">
                                            <div class="pull-right">
                                                <p class="uppercase">
                                                    <?php echo $flightSegment->ArrivalAirportCode;?>
                                                </p>
                                                <h4 class="theme-color-text font-bold">
                                                    <?php echo substr($flightSegment->ArrivalDateTime, 11,5);
                                                        $ArrivalTime = substr($flightSegment->ArrivalDateTime, 11,5);?>
                                                </h4>
                                                <p>
                                                    <?php echo substr($flightSegment->ArrivalDateTime, 0,10);
                                                        $ArrivalDate = substr($flightSegment->ArrivalDateTime, 0,10);?>
                                                </p>
                                                <p>
                                                    <?php echo $flightSegment->IntArrivalAirportName;
                                                        $IntArrivalAirportName = $flightSegment->IntArrivalAirportName;?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                            <?php

   if ($_SESSION['tripType'] ==2) { 

     $key =$obj->DomesticReturnFlights[$count];
    $FlightSegment = $key->FlightSegments[0]; ?>
                            <div class="" style="
                border-radius: 7px;  
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
                       background-color: #CCFFCC;        
                border: 2px;">
                                <?php foreach ($key->FlightSegments as $flightSegment) {
                                # code...
                               ?>
                                <div class="bg-white  checkput-flight m-b-10">
                                    <div class="fight-table-list">
                                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                            <span class="largo-logo">
                                                <?php require "image.php"; ?>
                                                <img src="http://webapi.i2space.co.in<?php echo $FlightSegment->ImagePath?>" alt="Image Alternative text" title="Image Title" />
                                            </span>
                                            <aside>
                                                <p class="uppercase">
                                                    <?php $airname = explode(" ", $flightSegment->AirLineName);
                                                     echo $airname[0];
                                                                        $AirLineName=$flightSegment->AirLineName;?>
                                                </p>
                                                <small>
                                                    <?php echo $flightSegment->OperatingAirlineCode;
                                                      $OperatingAirlineCode=$flightSegment->OperatingAirlineCode;?>-
                                                    <?php echo $flightSegment->OperatingAirlineFlightNumber;

                                                            $OperatingAirlineFlightNumber =$flightSegment->OperatingAirlineFlightNumber;                                                               ?></small>
                                            </aside>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4">
                                            <p class="uppercase">
                                                <?php echo $flightSegment->DepartureAirportCode;?>
                                            </p>
                                            <h4 class="theme-color-text font-bold">
                                                <?php echo substr($flightSegment->DepartureDateTime, 11,5);
                                                        $departtime = substr($flightSegment->DepartureDateTime, 11,5);?>
                                            </h4>
                                            <p>
                                                <?php echo substr($flightSegment->DepartureDateTime, 0,10);
                                                        $departdate = substr($flightSegment->DepartureDateTime, 0,10);?>
                                            </p>
                                            <p>
                                                <?php echo $flightSegment->IntDepartureAirportName;
                                                        $IntDepartureAirportName = $flightSegment->IntDepartureAirportName;
                                                        ?>
                                            </p>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4">
                                            <div class="border-grey"></div>
                                            <i class="fa fa-plane flight-time"></i>
                                            <div class="text-center m-t-15"><i class="fa fa-clock-o m-r-5"></i><span>
                                                    <?php echo $flightSegment->Duration;
                                                     $Duration = $flightSegment->Duration;?></span></div>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4">
                                            <div class="pull-right">
                                                <p class="uppercase">
                                                    <?php echo $flightSegment->ArrivalAirportCode;?>
                                                </p>
                                                <h4 class="theme-color-text font-bold">
                                                    <?php echo substr($flightSegment->ArrivalDateTime, 11,5);
                                                        $ArrivalTime = substr($flightSegment->ArrivalDateTime, 11,5);?>
                                                </h4>
                                                <p>
                                                    <?php echo substr($flightSegment->ArrivalDateTime, 0,10);
                                                        $ArrivalDate = substr($flightSegment->ArrivalDateTime, 0,10);?>
                                                </p>
                                                <p>
                                                    <?php echo $flightSegment->IntArrivalAirportName;
                                                        $IntArrivalAirportName = $flightSegment->IntArrivalAirportName;?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php }
            ?>
                            </div>
                            <?php
            
            }
            // end of if
            ?>
                            <div class="col-lg-12">
                                <div class="secure-block">
                                    <div class="checkbox">
                                        <label>
                                            <input class="i-check" type="checkbox" /><span>Secure your trip for delays and baggage loss for one adult <span class="grey-text">(Rs 249.0 per one passenger (Hide benifits) )</span></span>
                                        </label>
                                    </div>
                                    <div class="row m-t-30">
                                        <div class="col-lg-3 col-sm-12 col-xs-12 secure-info">
                                            <img src="img/baggage-icons.png" alt="baggage icon">
                                            <p>Flight delay reimbused upto Rs 1000 * for 75 min delay</p>
                                        </div>
                                        <div class="col-lg-3 col-sm-12 col-xs-12 secure-info">
                                            <img src="img/baggage-icons.png" alt="baggage icon">
                                            <p>Flight delay reimbused upto Rs 1000 * for 75 min delay</p>
                                        </div>
                                        <div class="col-lg-3 col-sm-12 col-xs-12 secure-info">
                                            <img src="img/baggage-icons.png" alt="baggage icon">
                                            <p>Flight delay reimbused upto Rs 1000 * for 75 min delay</p>
                                        </div>
                                        <div class="col-lg-3 col-sm-12 col-xs-12 secure-info">
                                            <img src="img/baggage-icons.png" alt="baggage icon">
                                            <p>Flight delay reimbused upto Rs 1000 * for 75 min delay</p>
                                        </div>
                                    </div>
                                    <!--End row-->
                                    <!--   <div class=" m-t-30">
                                                      <div class="checkbox">
                                                            <label>
                                                                <input class="i-check" type="radio" /><span>Yes, Secure my trip with insurance. I agree to the Terms & Conditions </span>
                                                            </label>
                                                      </div>
                                                        <div class="checkbox">
                                                            <label>
                                                                <input class="i-check" type="radio" /><span>No,  I do not want to insure my trip </span>
                                                            </label>
                                                      </div>
                                                    </div> -->
                                    <div class="border-thin"></div>
                                    <div class="traveller-details">
                                        <h5 class="m-t-15">Enter Traveller Details</h5>
                                        <form method="GET" class="m-t-15 p-lr-7" action="paymentconfirmation.php" id="form">
                                            <!--   <div class="row">
                                                        <div class="col-lg-4 p-lr-7"><input type="text" class="form-control" placeholder="Name"></div>
                                                        <div class="col-lg-4 p-lr-7"><input type="text" class="form-control" placeholder="Mobile"></div>
                                                        <div class="col-lg-4 p-lr-7"><input type="email" class="form-control" placeholder="Email"></div>
                                                    </div> -->
                                            <input type="hidden" name="count" value="<?php echo $count;?>">
                                            <input type="hidden" name="rcount" value="<?php echo $count;?>">
                                            <p>Adults 1</p>
                                            <div class="row">
                                                <div class="col-lg-2 col-md-2 col-xs-2 padding-0">
                                                    <div class="form-group">
                                                        <label>Title</label>
                                                        <select class="form-control" name="title<?php echo 1; ?>">
                                                            <option value="Mr.">Mr.</option>
                                                            <option value="Ms.">Ms.</option>
                                                            <option value="Mrs.">Mrs.</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2  form-group name col-md-2 col-xs-5">
                                                    <label>First Name</label>
                                                    <input required type="text" class="form-control" onchange="return inputAlphabet(this.value)" placeholder="First Name" name="afirstname<?php echo 1; ?>"></div>
                                                <div class="col-lg-2 name col-md-2 col-xs-5">
                                                    <label>Last Name</label>
                                                    <input required type="text" class="form-control" placeholder="Last Name" name="alastname<?php echo 1; ?>"></div>
                                                <div class="col-lg-3 col-md-3 col-xs-6 padding-0">
                                                    <div class="form-group">
                                                        <label>Gender</label>
                                                        <select class="form-control" name="gender<?php echo 1; ?>">
                                                            <option value="M">Male</option>
                                                            <option value="F">Female</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-lg-3 col-xs-6">
                                                    <div class="form-group form-group-lg form-group-icon-left">
                                                        <label>DOB</label>
                                                        <i class="fa fa-calendar input-icon input-icon-highlight"></i>
                                                        <input required class="date-pick   form-control" data-date-format="dd-mm-yyyy" type="text" name="dob<?php echo 1; ?>" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="age col-lg-3 col-md-3 col-xs-6">
                                                    <label>Age</label>
                                                    <input required type="text" class="form-control" placeholder="Age" maxlength="2" onchange=" return adultage(this.value)" name="age<?php echo 1; ?>"></div>
                                                <div class="col-lg-3 col-md-3 mobile col-xs-6">
                                                    <label>Mobile</label>
                                                    <input required type="text" class="form-control" placeholder="Mobile" maxlength="10" minlength="9" name="adultmobile<?php echo 1; ?>"></div>
                                                <div class="col-lg-3 col-md-3 col-xs-6">
                                                    <label>Email</label>
                                                    <input required type="email" class="form-control" placeholder="Email" name="adultemail<?php echo 1; ?>"></div>
                                                <div class="col-lg-3 mobile col-md-3 col-xs-6">
                                                    <label>Pincode</label>
                                                    <input required type="text" class="form-control" placeholder="Pincode" name="pincode"></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-3 col-md-3 col-xs-6">
                                                    <label>State</label>
                                                    <select name="state" class="form-control state" id="state">
                                                        <option value="">Select</option>
                                                        <?php echo $states;  ?>
                                                    </select></div>
                                                <div class="col-lg-3  col-md-3 col-xs-6" id="response">
                                                </div>
                                                <div class="col-lg-3  col-md-3 col-xs-3 text-danger" id="alertstate">
                                                </div>
                                            </div>
                                            <div class="border-thin"> </div>
                                            <?php
                                                        if($_SESSION['Adults']>0){?>
                                            <?php

                                                        for ($i=1; $i <$_SESSION['Adults'] ; $i++) { ?>
                                            <p>Adults
                                                <?php echo $i+1; ?>
                                            </p>
                                            <div class="row">
                                                <div class="col-lg-1 col-md-1 col-xs-2 padding-0">
                                                    <div class="form-group">
                                                        <label>Title</label>
                                                        <select class="form-control padding-2" name="title<?php echo $i+1; ?>">
                                                            <option value="Mr.">Mr.</option>
                                                            <option value="Ms.">Ms.</option>
                                                            <option value="Mrs.">Mrs.</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2  name col-md-2 col-xs-5">
                                                    <label>First Name</label>
                                                    <input required type="text" class="form-control" placeholder="First Name" name="afirstname<?php echo $i+1; ?>"></div>
                                                <div class="col-lg-2 name col-md-2 col-xs-5">
                                                    <label>Last Name</label>
                                                    <input required type="text" class="form-control" placeholder="Last Name" name="alastname<?php echo $i+1; ?>"></div>
                                                <div class="col-lg-2 col-md-2 col-xs-3 padding-0">
                                                    <div class="form-group">
                                                        <label>Gender</label>
                                                        <select class="form-control" name="gender<?php echo $i+1; ?>">
                                                            <option value="M">Male</option>
                                                            <option value="F">Female</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-lg-3 col-xs-6">
                                                    <div class="form-group form-group-lg form-group-icon-left">
                                                        <label>DOB</label>
                                                        <i class="fa fa-calendar input-icon input-icon-highlight"></i>
                                                        <input required class="date-pick   form-control" data-date-format="dd-mm-yyyy" type="text" name="dob<?php echo $i+1; ?>" />
                                                    </div>
                                                </div>
                                                <div class="age col-lg-2 col-md-2 col-xs-3">
                                                    <label>Age</label>
                                                    <input required type="text" onchange=" return adultage(this.value)" class="form-control" placeholder="Age" maxlength="2" name="age<?php echo $i+1; ?>"></div>
                                            </div>
                                            <div class="border-thin"> </div>
                                            <?php
                                                        }
                                                        }?>
                                            <?php
                                                        if($_SESSION['Children']>0){?>
                                            <?php

                                                        for ($i=0; $i <$_SESSION['Children'] ; $i++) { ?>
                                            <p>Child
                                                <?php echo $i+1; ?>
                                            </p>
                                            <div class="row">
                                                <div class="col-lg-1 col-md-1 col-xs-2 padding-0">
                                                    <div class="form-group">
                                                        <label>Title</label>
                                                        <select class="form-control padding-2" name="ctitle<?php echo $i+1; ?>">
                                                            <option value="Mstr.">Mstr.(for child and infant)</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2  name col-md-2 col-xs-5">
                                                    <label>First Name</label>
                                                    <input required type="text" class="form-control" placeholder="First Name" name="cfirstname<?php echo $i+1; ?>"></div>
                                                <div class="col-lg-2 name col-md-2 col-xs-5">
                                                    <label>Last Name</label>
                                                    <input required type="text" class="form-control" placeholder="Last Name" name="clastname<?php echo $i+1; ?>"></div>
                                                <div class="col-lg-2 col-md-2 col-xs-3 padding-0">
                                                    <div class="form-group">
                                                        <label>Gender</label>
                                                        <select class="form-control" name="cgender<?php echo $i+1; ?>">
                                                            <option value="M">Male</option>
                                                            <option value="F">Female</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-lg-3 col-xs-6 ">
                                                    <div class="form-group form-group-lg form-group-icon-left">
                                                        <label>DOB</label>
                                                        <i class="fa fa-calendar input-icon input-icon-highlight"></i>
                                                        <input required class="date-pick   form-control" data-date-format="dd-mm-yyyy" type="text" name="cdob<?php echo $i+1; ?>" />
                                                    </div>
                                                </div>
                                                <div class="age col-lg-2 col-md-2 col-xs-3">
                                                    <label>Age</label>
                                                    <input required type="text" onchange=" return childage(this.value)" class="form-control" placeholder="Age" maxlength="2" name="cage<?php echo $i+1; ?>"></div>
                                            </div>
                                            <div class="border-thin"> </div>
                                            <?php
                                                        }
                                                        }?>
                                            <?php
                                                        if($_SESSION['Infant']>0){?>
                                            <?php

                                                        for ($i=0; $i <$_SESSION['Infant'] ; $i++) { ?>
                                            <p>Infant
                                                <?php echo $i+1; ?>
                                            </p>
                                            <div class="row">
                                                <div class="col-lg-1 col-md-1 col-xs-2 padding-0">
                                                    <div class="form-group">
                                                        <label>Title
                                                            <?php echo $i+1; ?></label>
                                                        <select class="form-control padding-2" name="ititle<?php echo $i+1; ?>">
                                                            <option value="Mstr.">Mstr.(for child and infant)</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2  name col-md-2 col-xs-5">
                                                    <label>First Name</label>
                                                    <input required type="text" class="form-control" placeholder="First Name" name="ifirstname<?php echo $i+1; ?>"></div>
                                                <div class="col-lg-2 name col-md-2 col-xs-5">
                                                    <label>Last Name</label>
                                                    <input required type="text" class="form-control" placeholder="Last Name" name="ilastname<?php echo $i+1; ?>"></div>
                                                <div class="col-lg-2 col-md-2 col-xs-3 padding-0">
                                                    <div class="form-group">
                                                        <label>Gender</label>
                                                        <select class="form-control" name="igender<?php echo $i+1; ?>">
                                                            <option value="M">Male</option>
                                                            <option value="F">Female</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-lg-3 col-xs-6">
                                                    <div class="form-group form-group-lg form-group-icon-left">
                                                        <label>DOB</label>
                                                        <i class="fa fa-calendar input-icon input-icon-highlight"></i>
                                                        <input required class="date-pick   form-control" data-date-format="dd-mm-yyyy" type="text" name="idob<?php echo $i+1; ?>" />
                                                    </div>
                                                </div>
                                                <div class="age col-lg-2 col-md-2 col-xs-3">
                                                    <label>Age</label>
                                                    <input required type="text" onchange=" return infantage(this.value)" class="form-control" placeholder="Age" maxlength="1" pattern="[0-2]" name="iage<?php echo $i+1; ?>"></div>
                                            </div>
                                            <div class="border-thin"> </div>
                                            <?php
                                                        }
                                                        }?>
                                            <p>Your booking details will be send to this email address and phone number</p>
                                            <label>
                                                <input type="checkbox" id="rulescheck" class="i-check"><span><br>By clicking this button, I understood & agree with the rules & regulations of this fare, the<a href="rulesandregulations.php" rel="noopener noreferrer" target="_blank"><b> Privacy Policy & Terms & Conditions<b></a>.
                                                </span>
                                                </input>
                                                <br>
                                                <button type="submit" class="btn btn-primary uppercase btn-large col-md-4">Continue</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <aside class="booking-filters fare-details-block">
                            <ul class="list booking-filters-list">
                                <li>
                                    <h5 class="booking-filters-title">Price Breakup </h5>
                                    <ul class="stop-list list-inline list-unstyled">
                                        <li class="col-md-12 col-xs-12">
                                            <div class="col-md-7 col-xs-7 p-l-0">Subtotal </div>
                                            <div class="col-md-5 col-xs-5 p-r-0">
                                                <h5 class="pull-right">Rs.
                                                    <?php echo number_format($key->FareDetails->ChargeableFares->ActualBaseFare); ?>
                                                </h5>
                                            </div>
                                        </li>
                                        <button class="btn btn-primary" data-toggle="collapse" data-target="#demo">Tax Details</button>
                                        <div id="demo" class="collapse">
                                            <li class="col-md-12 col-xs-12">
                                                <div class="col-md-7 col-xs-7 p-l-0">Tax </div>
                                                <div class="col-md-5 col-xs-5 p-r-0">
                                                    <h5 class="pull-right">Rs.
                                                        <?php echo number_format($key->FareDetails->ChargeableFares->Tax); ?>
                                                    </h5>
                                                </div>
                                            </li>
                                            <li class="col-md-12 col-xs-12">
                                                <div class="col-md-7 col-xs-7 p-l-0">STax </div>
                                                <div class="col-md-5 col-xs-5 p-r-0">
                                                    <h5 class="pull-right">Rs.
                                                        <?php echo number_format($key->FareDetails->ChargeableFares->STax); ?>
                                                    </h5>
                                                </div>
                                            </li>
                                            <li class="col-md-12 col-xs-12">
                                                <div class="col-md-7 col-xs-7 p-l-0">SCharge </div>
                                                <div class="col-md-5 col-xs-5 p-r-0">
                                                    <h5 class="pull-right">Rs.
                                                        <?php echo number_format($key->FareDetails->ChargeableFares->SCharge); ?>
                                                    </h5>
                                                </div>
                                            </li>
                                            <li class="col-md-12 col-xs-12">
                                                <div class="col-md-7 col-xs-7 p-l-0">TCharge </div>
                                                <div class="col-md-5 col-xs-5 p-r-0">
                                                    <h5 class="pull-right">Rs.
                                                        <?php echo number_format($key->FareDetails->NonchargeableFares->TCharge); ?>
                                                    </h5>
                                                </div>
                                            </li>
                                            <li class="col-md-12 col-xs-12">
                                                <div class="col-md-7 col-xs-7 p-l-0">TMarkup </div>
                                                <div class="col-md-5 col-xs-5 p-r-0">
                                                    <h5 class="pull-right">Rs.
                                                        <?php echo number_format($key->FareDetails->NonchargeableFares->TMarkup); ?>
                                                    </h5>
                                                </div>
                                            </li>
                                        </div>
                                        <li class="col-md-12 col-xs-12 ">
                                            <div class="col-md-7 col-xs-7 p-l-0">Total Tax</div>
                                            <div class="col-md-5 col-xs-5 p-r-0">
                                                <h5 class="pull-right">Rs.
                                                    <?php echo number_format($key->FareDetails->NonchargeableFares->TMarkup+
                                    $key->FareDetails->NonchargeableFares->TCharge+
                                     $key->FareDetails->ChargeableFares->STax
                                     +
                                     $key->FareDetails->ChargeableFares->SCharge+
                                     $key->FareDetails->ChargeableFares->Tax); ?>
                                                </h5>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                                <li class="col-md-12 col-xs-12 bg-theme padding-0">
                                    <div>
                                        <div class="col-md-7 col-xs-7  padding-0">
                                            <h3 class="text-white">Total: </h3>
                                        </div>
                                        <div class="col-md-5 col-xs-5  padding-0">
                                            <h3 class="pull-right text-white">Rs.
                                                <?php echo number_format($key->FareDetails->TotalFare); ?>
                                            </h3>
                                        </div>
                                    </div>
                                </li>
                                <?php if ($_SESSION['tripType'] == 2) {

                                            $rkey =   $obj->DomesticReturnFlights[$rcount];
                                            $FlightSegment = $rkey->FlightSegments[0];?>
                                <li>
                                    <h5 class="booking-filters-title">Price Breakup (Return) </h5>
                                    <ul class="stop-list list-inline list-unstyled">
                                        <li class="col-md-12 col-xs-12">
                                            <div class="col-md-7 col-xs-7 p-l-0">Subtotal </div>
                                            <div class="col-md-5 col-xs-5 p-r-0">
                                                <h5 class="pull-right">Rs.
                                                    <?php echo number_format($rkey->FareDetails->ChargeableFares->ActualBaseFare); ?>
                                                </h5>
                                            </div>
                                        </li>
                                        <button class="btn btn-primary" data-toggle="collapse" data-target="#demo1">Tax Details</button>
                                        <div id="demo1" class="collapse">
                                            <li class="col-md-12 col-xs-12">
                                                <div class="col-md-7 col-xs-7 p-l-0">Tax </div>
                                                <div class="col-md-5 col-xs-5 p-r-0">
                                                    <h5 class="pull-right">Rs.
                                                        <?php echo number_format($rkey->FareDetails->ChargeableFares->Tax); ?>
                                                    </h5>
                                                </div>
                                            </li>
                                            <li class="col-md-12 col-xs-12">
                                                <div class="col-md-7 col-xs-7 p-l-0">STax </div>
                                                <div class="col-md-5 col-xs-5 p-r-0">
                                                    <h5 class="pull-right">Rs.
                                                        <?php echo number_format($rkey->FareDetails->ChargeableFares->STax); ?>
                                                    </h5>
                                                </div>
                                            </li>
                                            <li class="col-md-12 col-xs-12">
                                                <div class="col-md-7 col-xs-7 p-l-0">SCharge </div>
                                                <div class="col-md-5 col-xs-5 p-r-0">
                                                    <h5 class="pull-right">Rs.
                                                        <?php echo number_format($rkey->FareDetails->ChargeableFares->SCharge); ?>
                                                    </h5>
                                                </div>
                                            </li>
                                            <li class="col-md-12 col-xs-12">
                                                <div class="col-md-7 col-xs-7 p-l-0">TCharge </div>
                                                <div class="col-md-5 col-xs-5 p-r-0">
                                                    <h5 class="pull-right">Rs.
                                                        <?php echo number_format($rkey->FareDetails->NonchargeableFares->TCharge); ?>
                                                    </h5>
                                                </div>
                                            </li>
                                            <li class="col-md-12 col-xs-12">
                                                <div class="col-md-7 col-xs-7 p-l-0">TMarkup </div>
                                                <div class="col-md-5 col-xs-5 p-r-0">
                                                    <h5 class="pull-right">Rs.
                                                        <?php echo number_format($rkey->FareDetails->NonchargeableFares->TMarkup); ?>
                                                    </h5>
                                                </div>
                                            </li>
                                        </div>
                                        <li class="col-md-12 col-xs-12 ">
                                            <div class="col-md-7 col-xs-7 p-l-0">Total Tax</div>
                                            <div class="col-md-5 col-xs-5 p-r-0">
                                                <h5 class="pull-right">Rs.
                                                    <?php echo number_format($rkey->FareDetails->NonchargeableFares->TMarkup+
                                    $rkey->FareDetails->NonchargeableFares->TCharge+
                                     $rkey->FareDetails->ChargeableFares->STax
                                     +
                                     $rkey->FareDetails->ChargeableFares->SCharge+
                                     $rkey->FareDetails->ChargeableFares->Tax); ?>
                                                </h5>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                                <li class="col-md-12 col-xs-12 bg-theme padding-0">
                                    <div>
                                        <div class="col-md-7 col-xs-7  padding-0">
                                            <h3 class="text-white">Total: </h3>
                                        </div>
                                        <div class="col-md-5 col-xs-5  padding-0">
                                            <h3 class="pull-right text-white">Rs.
                                                <?php echo number_format($rkey->FareDetails->TotalFare); ?>
                                            </h3>
                                        </div>
                                    </div>
                                </li>
                                <?php } ?>
                            </ul>
                        </aside>
                    </div>
                    <div class="clearfix"></div>
        </section>
        <?php include("footer.php"); ?>
        <!---Earch Modal --->
        <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="exampleModalLongTitle">Search for Flight</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form style='margin-bottom:30px;'>
                            <div class="tabbable">
                                <ul class="nav nav-pills nav-sm nav-no-br mb10" id="flightChooseTab">
                                    <li class="active"><a href="#flight-search-1" data-toggle="tab">Round Trip</a>
                                    </li>
                                    <li><a href="#flight-search-2" data-toggle="tab">One Way</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane fade in active" id="flight-search-1">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group form-group-lg form-group-icon-left"><i class="fa fa-map-marker input-icon input-icon-highlight"></i>
                                                    <label>From</label>
                                                    <input class="typeahead form-control" placeholder="City, Airport or U.S. Zip Code" type="text" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group form-group-lg form-group-icon-left"><i class="fa fa-map-marker input-icon input-icon-highlight"></i>
                                                    <label>To</label>
                                                    <input class="typeahead form-control" placeholder="City, Airport or U.S. Zip Code" type="text" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="input-daterange" data-date-format="MM d, D">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group form-group-lg form-group-icon-left"><i class="fa fa-calendar input-icon input-icon-highlight"></i>
                                                        <label>Departing</label>
                                                        <input class="form-control" name="start" type="text" />
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group form-group-lg form-group-icon-left"><i class="fa fa-calendar input-icon input-icon-highlight"></i>
                                                        <label>Returning</label>
                                                        <input class="form-control" name="end" type="text" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group form-group-lg form-group-select-plus">
                                                        <label>Passengers</label>
                                                        <div class="btn-group btn-group-select-num" data-toggle="buttons">
                                                            <label class="btn btn-primary active">
                                                                <input type="radio" name="options" />1</label>
                                                            <label class="btn btn-primary">
                                                                <input type="radio" name="options" />2</label>
                                                            <label class="btn btn-primary">
                                                                <input type="radio" name="options" />3</label>
                                                            <label class="btn btn-primary">
                                                                <input type="radio" name="options" />4</label>
                                                            <label class="btn btn-primary">
                                                                <input type="radio" name="options" />5</label>
                                                            <label class="btn btn-primary">
                                                                <input type="radio" name="options" />5+</label>
                                                        </div>
                                                        <select class="form-control hidden">
                                                            <option>1</option>
                                                            <option>2</option>
                                                            <option>3</option>
                                                            <option>4</option>
                                                            <option>5</option>
                                                            <option selected="selected">6</option>
                                                            <option>7</option>
                                                            <option>8</option>
                                                            <option>9</option>
                                                            <option>10</option>
                                                            <option>11</option>
                                                            <option>12</option>
                                                            <option>13</option>
                                                            <option>14</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="flight-search-2">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group form-group-lg form-group-icon-left"><i class="fa fa-map-marker input-icon input-icon-highlight"></i>
                                                    <label>From</label>
                                                    <input class="typeahead form-control" placeholder="City, Airport or U.S. Zip Code" type="text" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group form-group-lg form-group-icon-left"><i class="fa fa-map-marker input-icon input-icon-highlight"></i>
                                                    <label>To</label>
                                                    <input class="typeahead form-control" placeholder="City, Airport or U.S. Zip Code" type="text" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group form-group-lg form-group-icon-left"><i class="fa fa-calendar input-icon input-icon-hightlight"></i>
                                                    <label>Departing</label>
                                                    <input class="date-pick form-control" data-date-format="MM d, D" type="text" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group form-group-lg form-group-select-plus">
                                                    <label>Passengers</label>
                                                    <div class="btn-group btn-group-select-num" data-toggle="buttons">
                                                        <label class="btn btn-primary active">
                                                            <input type="radio" name="options" />1</label>
                                                        <label class="btn btn-primary">
                                                            <input type="radio" name="options" />2</label>
                                                        <label class="btn btn-primary">
                                                            <input type="radio" name="options" />3</label>
                                                        <label class="btn btn-primary">
                                                            <input type="radio" name="options" />4</label>
                                                        <label class="btn btn-primary">
                                                            <input type="radio" name="options" />5</label>
                                                        <label class="btn btn-primary">
                                                            <input type="radio" name="options" />5+</label>
                                                    </div>
                                                    <select class="form-control hidden">
                                                        <option>1</option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                        <option>4</option>
                                                        <option>5</option>
                                                        <option selected="selected">6</option>
                                                        <option>7</option>
                                                        <option>8</option>
                                                        <option>9</option>
                                                        <option>10</option>
                                                        <option>11</option>
                                                        <option>12</option>
                                                        <option>13</option>
                                                        <option>14</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-primary btn-lg" type="submit">Search for Flights</button>
                        </form>
                    </div>
                </div>
                <!--<div class="modal-footer">

         
      </div>-->
            </div>
        </div>
        <!---End search modal--->
        <!--- Fight details modal--->
        <div class="booking-item-details modal fade" id="booking-item-details-view" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLongTitle">Flight Details</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="row modal-body">
                        <div class="col-md-12">
                            <h6 class="list-title theme-color-text">London (LHR) to Charlotte (CLT)</h6>
                            <ul class="list">
                                <li>US Airways 731</li>
                                <li>Economy / Coach Class ( M), AIRBUS INDUSTRIE A330-300</li>
                                <li>Depart 09:55 Arrive 15:10</li>
                                <li>Duration: 9h 15m</li>
                            </ul>
                            <h6 class="theme-color-text">Stopover: Charlotte (CLT) 7h 1m</h6>
                            <h6 class="list-title">Charlotte (CLT) to New York (JFK)</h6>
                            <ul class="list">
                                <li>US Airways 1873</li>
                                <li>Economy / Coach Class ( M), Airbus A321</li>
                                <li>Depart 22:11 Arrive 23:53</li>
                                <li>Duration: 1h 42m</li>
                            </ul>
                            <p>Total trip time: 17h 58m</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!---end Filght search modal--->
    </div>
    <style type="text/css">
    label {
        color: black;
    }
    </style>
    <script src="js/jquery.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <!-- <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script> -->
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
    <script src="validate.js"></script>
    <script>
    </script>
    </div>
    <script type="text/javascript">
    $(".name").bind("keypress", function(event) {
        if (event.charCode != 0) {
            var regex = new RegExp("^[a-zA-Z ]+$");
            var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
            if (!regex.test(key)) {
                event.preventDefault();
                return false;
            }
        }
    });

    $(".mobile").bind("keypress", function(event) {
        if (event.charCode != 0) {
            var regex = new RegExp("^[0-9]+$");
            var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
            if (!regex.test(key)) {
                event.preventDefault();
                return false;
            }
        }
    });
    $(".age").bind("keypress", function(event) {
        if (event.charCode != 0) {
            var regex = new RegExp("^[0-9]+$");
            var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
            if (!regex.test(key)) {
                event.preventDefault();
                return false;
            }
        }
    });
    $(".age").bind("keypress", function(event) {
        if (event.charCode != 0) {
            var regex = new RegExp("^[0-9]+$");
            var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
            if (!regex.test(key)) {
                event.preventDefault();
                return false;
            }
        }
    });

    function adultage(age) {
        if (age < 12) {
            alert("Adult age should be greater than 12");
            return false;

        }
    }

    function childage(age) {
        if (age > 12 && age < 2) {
            alert("Adult age should be between 2  and 12");
            return false;

        }
    }

    function infantage(age) {
        if (age > 2) {
            alert("Adult age should be less than 2");
            return false;

        }
    }

    $('#form').submit(function() {
        if ($("#rulescheck").is(":not(:checked)")) {
            alert("Please select terms and conditions.");
            return false;
        }
    });

    $('#form').submit(function() {
        if ($("#state").val() == "") {
            $("#alertstate").html("<br>Please select a state");

            $("#state").focus();
            return false;
        } else {
            $("#alertstate").text(" ");

        }
    });
    $('#form').submit(function() {
        if ($("#city").val() == "") {
            $("#alertstate").html("<br>Please select a city");

            $("#state").focus();
            return false;
        } else {
            $("#alertstate").text(" ");

        }
    });
    </script>
</body>

</html>
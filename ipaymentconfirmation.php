<?php  
session_start();
require "functions.php";

require "init.php";
$_SESSION['count'] = $_GET['count'];

$allAirports = curl("https://webapi.etravos.com/Flights/AvailableFlights?source=".$_SESSION['from_address']."&destination=".$_SESSION['to_address']."&journeyDate=".$_SESSION['start_Date']."&tripType=".$_SESSION['tripType']."&flightType=2&adults=".$_SESSION['Adults']."&children=".$_SESSION['Children']."&infants=".$_SESSION['Infant']."&travelClass=".$_SESSION['classvalue']."&userType=5&returnDate=".$_SESSION['endDate'], [], "application/json", false, [
    "ConsumerKey: ",
    "ConsumerSecret: ",
    "Accept-Encoding:gzip, deflate",
]);
    $o = gzdecode($allAirports);

$tripType  = $_SESSION['tripType'];
$count = $_GET['count'];

$IntBaseFare=0;
$IntTax=0;
$IntAmount=0;

$obj = json_decode($o);

?><!DOCTYPE HTML>
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
    <link rel="stylesheet" href="css/styles1.css">
    <link rel="stylesheet" href="css/schemes/bright-turquoise.css"/> </head>
    <link rel="stylesheet" href="css/mystyles.css">
    <script src="js/modernizr.js"></script>
    <link rel="stylesheet" href="css/schemes/bright-turquoise.css"/>

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
     <section class="flight-search-result">
        <div  class="container">

            
            <div class="row">
                
                <div class="col-md-9">
                <div class="row">
                    <div class="search-result-header m-t-15">
                    	<div class="col-md-6 padding-0  m-b-15">
                        	<div class="pull-left">
                                
                                <h5>Review Your Booking</h5>
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

   

     $key =$obj->InternationalFlights[$count];
    $FlightSegment=$key->IntOnward->FlightSegments[0]; ?>
                    
                           
                                
                                 
                                       <?php foreach ($key->IntOnward->FlightSegments as $flightSegment) {
                                # code...
                               ?>
                                <div class="booking-item-container bg-white"  style="
                border-radius: 7px;  
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
                       background-color: #CCFFCC;        
                border: 2px;" >
                                
                                  <div  class="bg-white  checkput-flight m-b-10" >
                                    <div  class="fight-table-list">
                                        
                                          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                                    <span class="largo-logo">
                                                        <?php require "image.php"; ?>
                                                  <img src="http://webapi.i2space.co.in<?php echo $FlightSegment->ImagePath?>" alt="Image Alternative text" title="Image Title" />
                                                    </span>
                                                    <aside>
                                                     <p class="uppercase"><?php 
                                                     $airname = explode(" ", $flightSegment->AirLineName);
                                                     echo $airname[0];
                                                                        $AirLineName=$flightSegment->AirLineName;?></p>

                                                      <small><?php echo $flightSegment->OperatingAirlineCode;
                                                      $OperatingAirlineCode=$flightSegment->OperatingAirlineCode;?>-

                                                      <?php echo $flightSegment->OperatingAirlineFlightNumber;

                                                            $OperatingAirlineFlightNumber =$flightSegment->OperatingAirlineFlightNumber;                                                               ?></small>
                                                      </aside>
                                               </div>
                                                  <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4">
                                                        <p class="uppercase"><?php echo $flightSegment->DepartureAirportCode;?></p>
                                                        <h4 class="theme-color-text font-bold"><?php echo substr($flightSegment->DepartureDateTime, 11,5);
                                                        $departtime = substr($flightSegment->DepartureDateTime, 11,5);?></h4>


                                                        <p><?php echo substr($flightSegment->DepartureDateTime, 0,10);
                                                        $departdate = substr($flightSegment->DepartureDateTime, 0,10);?></p>

                                                        <p><?php echo $flightSegment->IntDepartureAirportName;
                                                        $IntDepartureAirportName = $flightSegment->IntDepartureAirportName;
                                                        ?></p>

                                                  </div>
                                                   <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4">
                                                   <div class="border-grey"></div>
                                                     <i class="fa fa-plane flight-time"></i>
                                                     <div class="text-center m-t-15"><i class="fa fa-clock-o m-r-5"></i><span><?php echo $flightSegment->Duration;
                                                     $Duration = $flightSegment->Duration;?></span></div>
                                                   </div>
                                                    
                                                    
                                                     
                                                     <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4">
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
	</div>
            <?php } ?>



<?php

if ($tripType==2) { 

   

     $key =$obj->InternationalFlights[$count];
    $FlightSegment=$key->IntReturn->FlightSegments[0]; ?>
                    
                           
                                
                                 
                                       <?php foreach ($key->IntReturn->FlightSegments as $flightSegment) {
                                # code...
                               ?>
                                <div class="booking-item-container"  style="
                border-radius: 7px;  
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
                       background-color: #CCFFCC;        
                border: 2px;" >
                                
                                  <div  class="  checkput-flight m-b-10" >
                                    <div  class="fight-table-list">
                                        
                                          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                                    <span class="largo-logo">
                                                        <?php require "image.php"; ?>
                                                  <img src="http://webapi.i2space.co.in<?php echo $FlightSegment->ImagePath?>" alt="Image Alternative text" title="Image Title" />
                                                    </span>
                                                    <aside>
                                                     <p class="uppercase"><?php 
                                                     $airname = explode(" ", $flightSegment->AirLineName);
                                                     echo $airname[0];
                                                                        $AirLineName=$flightSegment->AirLineName;?></p>

                                                      <small><?php echo $flightSegment->OperatingAirlineCode;
                                                      $OperatingAirlineCode=$flightSegment->OperatingAirlineCode;?>-

                                                      <?php echo $flightSegment->OperatingAirlineFlightNumber;

                                                            $OperatingAirlineFlightNumber =$flightSegment->OperatingAirlineFlightNumber;                                                               ?></small>
                                                      </aside>
                                               </div>
                                                  <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4">
                                                        <p class="uppercase"><?php echo $flightSegment->DepartureAirportCode;?></p>
                                                        <h4 class="theme-color-text font-bold"><?php echo substr($flightSegment->DepartureDateTime, 11,5);
                                                        $departtime = substr($flightSegment->DepartureDateTime, 11,5);?></h4>


                                                        <p><?php echo substr($flightSegment->DepartureDateTime, 0,10);
                                                        $departdate = substr($flightSegment->DepartureDateTime, 0,10);?></p>

                                                        <p><?php echo $flightSegment->IntDepartureAirportName;
                                                        $IntDepartureAirportName = $flightSegment->IntDepartureAirportName;
                                                        ?></p>

                                                  </div>
                                                   <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4">
                                                   <div class="border-grey"></div>
                                                     <i class="fa fa-plane flight-time"></i>
                                                     <div class="text-center m-t-15"><i class="fa fa-clock-o m-r-5"></i><span><?php echo $flightSegment->Duration;
                                                     $Duration = $flightSegment->Duration;?></span></div>
                                                   </div>
                                                    
                                                    
                                                     
                                                     <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4">
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
	</div>
            <?php } 
            }
            ?>
                        
                                        <div class="col-lg-12 col-sm-12 col-md-12">
                                        	<div class="secure-block">
                                               
                                               
                                                <!--End row-->
                                                
                                                <div class="border-thin"></div>
                                                <div class="traveller-details">
                                                	<!-- <h5 class="m-t-15"> Traveller Details</h5> -->
                                                    <form method="post" class="m-t-15 p-lr-7" action="ipayment.php">
                                               

                                                  <input type="hidden" name="AirLineName" value="<?php echo $AirLineName;?>">
                                                            <input type="hidden" name="OperatingAirlineCode" value="<?php echo $OperatingAirlineCode;?>">
                                                            <input type="hidden" name="OperatingAirlineFlightNumber" value="<?php echo $OperatingAirlineFlightNumber;?>">
                                                            <input type="hidden" name="departtime" value="<?php echo $departtime;?>">
                                                            <input type="hidden" name="departdate" value="<?php echo $departdate;?>">
                                                            <input type="hidden" name="IntDepartureAirportName" value="<?php echo $IntDepartureAirportName;?>">
                                                            <input type="hidden" name="Duration" value="<?php echo $Duration;?>">
                                                            <input type="hidden" name="ArrivalTime" value="<?php echo $ArrivalTime;?>">

                                                            <input type="hidden" name="ArrivalDate" value="<?php echo $ArrivalDate;?>">
                                                            <input type="hidden" name="IntArrivalAirportName" value="<?php echo $IntArrivalAirportName;?>">


                                                            <p >Adults <?php echo 1; ?></p>
                                                         

                                                        <div class="row">
                                                        
                                                           
                                                        <div class="col-lg-2  col-md-2 ">
                                                                        <label>Title</label>
                                                            <input type="text" class="form-control" placeholder="Name" name="title<?php echo 1; ?>" value="<?php echo $_GET["title1"];?>" readonly ></div>
                                                        <div class="col-lg-2  col-md-2 ">
                                                                        <label>First Name</label>
                                                            <input readonly type="text" class="form-control" placeholder="Name" name="afirstname<?php echo 1; ?>" value="<?php echo $_GET["afirstname1"];?>"></div>
                                                            <div class="col-lg-2  col-md-2 ">
                                                                        <label>Last Name</label>
                                                            <input readonly type="text" class="form-control" placeholder="Name" name="alastname<?php echo 1; ?>" value="<?php echo $_GET["alastname1"];?>"></div>
                                                        <div class="col-lg-3 col-md-3 ">
                                                                        <label>Mobile</label>
                                                            <input readonly type="text" class="form-control" placeholder="Mobile" name="adultmobile<?php echo 1; ?>"value="<?php echo $_GET["adultmobile1"];?>"></div>

                                                        <div class="col-lg-3 col-md-3 ">
                                                                        <label>Email</label>
                                                            <input readonly type="email" class="form-control" placeholder="Email" name="adultemail<?php echo 1; ?>"value="<?php echo $_GET["adultemail1"];?>"></div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-3 col-md-3 ">
                                                                        <label>Gender</label>
                                                            <input readonly type="text" class="form-control" placeholder="Gender" name="gender<?php echo 1; ?>"value="<?php echo $_GET["gender1"];?>"></div>

                                                        
                                                        <div class="col-lg-3 col-md-3 ">
                                                                        <label>Age</label>
                                                            <input readonly type="number" class="form-control" placeholder="Age" name="age<?php echo 1; ?>"value="<?php echo $_GET["age1"];?>"></div>
                                                         
                                                          <div class="col-lg-3 col-md-3 ">
                                                                        <label>DOB</label>
                                                            <input readonly type="text" class="form-control" placeholder="DOB" name="dob<?php echo 1; ?>"value="<?php echo $_GET["dob1"];?>"></div>

                                                            <div class="col-lg-3 col-md-3 ">
                                                                        <label>Address</label>
                                                            <input readonly type="text" class="form-control" placeholder="Age" name="address<?php echo 1; ?>"value="<?php echo $_GET["address1"];?>"></div>
                                                        


                                                        </div>
                                                        
                                                         <div class="row">
                                                         

                                                        
                                                                    <?php 
                                                                    $state = $_GET["state"];
                                                                    $query= "SELECT * FROM all_states where state_code = '$state'";
                                                                          $result=mysqli_query($link,$query) or die("Bad SQL: $query");
                                                                        
                                                                           if (mysqli_num_rows($result) > 0) {
                                                                                                                                                    // output data of each row
                                                                                $result->data_seek(0);
                                                                               
                                                                            while($row3 = mysqli_fetch_assoc($result)) {  
                                                                        
                                                                            $statename =$row3["state_name"];
                                                                        }
                                                                        
                                                                        }?>

                                                        <div class="col-lg-3 col-md-3 ">
                                                                        <label>State</label>
                                                            <input readonly type="text" class="form-control" placeholder="s" name="state"value="<?php echo $statename;?>"></div>
                                                           
                                                            <div class="col-lg-3 col-md-3 ">
                                                                        <label>Pincode</label>
                                                            <input readonly type="text" class="form-control" placeholder="" name="pincode"value="<?php echo $_GET["pincode"];?>"></div>
                                                        


                                                        </div>


                                                        <div class="row">
                                                            <div class="col-lg-2 col-md-2 ">
                                                                        <label>Visa Type</label>
                                                            <input readonly type="text" class="form-control" name="avisatype<?php echo 1; ?>"value="<?php echo $_GET["avisatype1"];?>"></div>

                                                        
                                                        <div class="col-lg-2 col-md-2 ">
                                                                        <label>Passport No</label>
                                                            <input readonly type="text" class="form-control"  name="apassportno<?php echo 1; ?>"value="<?php echo $_GET["apassportno1"];?>"></div>

                                                            <div class="col-lg-2 col-md-2 ">
                                                                        <label>Issue place</label>
                                                            <input readonly type="text" class="form-control"  name="aissueplace<?php echo 1; ?>"value="<?php echo $_GET["aissueplace1"];?>"></div>
                                                         
                                                          <div class="col-lg-3 col-md-3 ">
                                                                        <label>Issued date</label>
                                                            <input readonly type="text" class="form-control" placeholder="DOB" name="aissuedate<?php echo 1; ?>"value="<?php echo $_GET["aissuedate1"];?>"></div>

                                                             <div class="col-lg-3 col-md-3 ">
                                                                        <label>Expiry date</label>
                                                            <input readonly type="text" class="form-control" placeholder="DOB" name="aexpirydate<?php echo 1; ?>"value="<?php echo $_GET["aexpirydate1"];?>"></div>

                                                            
                                                        


                                                        </div>



                                                        <?php
                                                        if($_SESSION['Adults']>0){?>

                                                            <?php

                                                        for ($i=1; $i <$_SESSION['Adults'] ; $i++) { 
                                                        	$c= $i+1;?>
                                                            
                                                        <p >Adults <?php echo $i+1; ?></p>
                                                         

                                                        <div class="row">
                                                        
                                                           
                                                        <div class="col-lg-  col-md-1 ">
                                                                        <label>Title</label>
                                                            <input type="text" class="form-control" placeholder="Name" name="title<?php echo $i+1; ?>" value="<?php echo $_GET["title".$c];?>" readonly ></div>
                                                        <div class="col-lg-2  col-md-2 ">
                                                                        <label>First Name</label>
                                                            <input readonly type="text" class="form-control" placeholder="Name" name="afirstname<?php echo $i+1; ?>" value="<?php echo $_GET["afirstname".$c];?>"></div>
                                                            <div class="col-lg-2  col-md-2 ">
                                                                        <label>Last Name</label>
                                                            <input readonly type="text" class="form-control" placeholder="Name" name="alastname<?php echo $i+1; ?>" value="<?php echo $_GET["alastname".$c];?>"></div>

                                                             <div class="col-lg-2 col-md-2 ">
                                                                        <label>Gender</label>
                                                            <input readonly type="text" class="form-control" placeholder="Gender" name="gender<?php echo $i+1; ?>"value="<?php echo $_GET["gender".$c];?>"></div>

                                                             <div class="col-lg-2 col-md-2 ">
                                                                        <label>Age</label>
                                                            <input readonly type="number" class="form-control" placeholder="Age" name="age<?php echo $i+1; ?>"value="<?php echo $_GET["age".$c];?>"></div>
                                                         
                                                          <div class="col-lg-2 col-md-2 ">
                                                                        <label>DOB</label>
                                                            <input readonly type="text" class="form-control" placeholder="DOB" name="dob<?php echo $i+1; ?>"value="<?php echo $_GET["dob".$c];?>"></div>
                                                        
                                                        </div>
                                                       
                                                        <div class="row">
                                                            <div class="col-lg-2 col-md-2 ">
                                                                        <label>Visa Type</label>
                                                            <input readonly type="text" class="form-control" name="avisatype<?php echo $i+1; ?>"value="<?php echo $_GET["avisatype".$c];?>"></div>

                                                        
                                                        <div class="col-lg-2 col-md-2 ">
                                                                        <label>Passport No</label>
                                                            <input readonly type="text" class="form-control"  name="apassportno<?php echo $i+1; ?>"value="<?php echo $_GET["apassportno".$c];?>"></div>

                                                            <div class="col-lg-2 col-md-2 ">
                                                                        <label>Issue place</label>
                                                            <input readonly type="text" class="form-control"  name="aissueplace<?php echo $i+1; ?>"value="<?php echo $_GET["aissueplace".$c];?>"></div>
                                                         
                                                          <div class="col-lg-3 col-md-3 ">
                                                                        <label>Issued date</label>
                                                            <input readonly type="text" class="form-control" placeholder="DOB" name="aissuedate<?php echo $i+1; ?>"value="<?php echo $_GET["aissuedate".$c];?>"></div>

                                                             <div class="col-lg-3 col-md-3 ">
                                                                        <label>Expiry date</label>
                                                            <input readonly type="text" class="form-control" placeholder="DOB" name="aexpirydate<?php echo $i+1; ?>"value="<?php echo $_GET["aexpirydate".$c];?>"></div>

                                                            
                                                        


                                                        </div>
                                                         

                                                            
                                                            <?php
                                                        }
                                                        }?>

                                                         
                                                        <?php
                                                        if($_SESSION['Children']>0){?>

                                                            <?php

                                                        for ($i=0; $i <$_SESSION['Children'] ; $i++) { 
                                                            $c= $i+1;?>
                                                            
                                                         <p >Child <?php echo $i+1; ?></p>
                                                         

                                                        <div class="row">
                                                        
                                                           
                                                        <div class="col-lg-1  col-md-1 ">
                                                                        <label>Title</label>
                                                            <input type="text" class="form-control" placeholder="Name" name="ctitle<?php echo $i+1; ?>" value="<?php echo $_GET["ctitle".$c];?>" readonly ></div>
                                                        <div class="col-lg-2  col-md-2 ">
                                                                        <label>First Name</label>
                                                            <input readonly type="text" class="form-control" placeholder="Name" name="cfirstname<?php echo $i+1; ?>" value="<?php echo $_GET["cfirstname".$c];?>"></div>
                                                            <div class="col-lg-2  col-md-2 ">
                                                                        <label>Last Name</label>
                                                            <input readonly type="text" class="form-control" placeholder="Name" name="clastname<?php echo $i+1; ?>" value="<?php echo $_GET["clastname".$c];?>"></div>

                                                             <div class="col-lg-2 col-md-2 ">
                                                                        <label>Gender</label>
                                                            <input readonly type="text" class="form-control" placeholder="Gender" name="cgender<?php echo $i+1; ?>"value="<?php echo $_GET["cgender".$c];?>"></div>

                                                             <div class="col-lg-2 col-md-2 ">
                                                                        <label>Age</label>
                                                            <input readonly type="number" class="form-control" placeholder="Age" name="cage<?php echo $i+1; ?>"value="<?php echo $_GET["cage".$c];?>"></div>

                                                            <div class="col-lg-2 col-md-2 ">
                                                                        <label>DOB</label>
                                                            <input readonly type="text" class="form-control" placeholder="DOB" name="cdob<?php echo $i+1; ?>"value="<?php echo $_GET["cdob".$c];?>"></div>
                                                        
                                                        </div>
                                                      



                                                        <div class="row">
                                                            <div class="col-lg-2 col-md-2 ">
                                                                        <label>Visa Type</label>
                                                            <input readonly type="text" class="form-control" name="cvisatype<?php echo $i+1; ?>"value="<?php echo $_GET["cvisatype".$c];?>"></div>

                                                        
                                                        <div class="col-lg-2 col-md-2 ">
                                                                        <label>Passport No</label>
                                                            <input readonly type="text" class="form-control"  name="cpassportno<?php echo $i+1; ?>"value="<?php echo $_GET["cpassportno".$c];?>"></div>

                                                            <div class="col-lg-2 col-md-2 ">
                                                                        <label>Issue place</label>
                                                            <input readonly type="text" class="form-control"  name="cissueplace<?php echo $i+1; ?>"value="<?php echo $_GET["cissueplace".$c];?>"></div>
                                                         
                                                          <div class="col-lg-3 col-md-3 ">
                                                                        <label>Issued date</label>
                                                            <input readonly type="text" class="form-control" placeholder="DOB" name="cissuedate<?php echo $i+1; ?>"value="<?php echo $_GET["cissuedate".$c];?>"></div>

                                                             <div class="col-lg-3 col-md-3 ">
                                                                        <label>Expiry date</label>
                                                            <input readonly type="text" class="form-control" placeholder="DOB" name="cexpirydate<?php echo $i+1; ?>"value="<?php echo $_GET["cexpirydate".$c];?>"></div>

                                                            
                                                        


                                                        </div>
                                                         

                                                            
                                                            <?php
                                                        }
                                                        }?>

                                                        <?php
                                                        if($_SESSION['Infant']>0){?>

                                                            <?php

                                                        for ($i=0; $i <$_SESSION['Infant'] ; $i++) { 
                                                            $c= $i+1;?>
                                                            
                                                         <p >Infant <?php echo $i+1; ?></p>
                                                         

                                                        <div class="row">
                                                        
                                                           
                                                        <div class="col-lg-1  col-md-1 ">
                                                                        <label>Title</label>
                                                            <input type="text" class="form-control" placeholder="Name" name="ititle<?php echo $i+1; ?>" value="<?php echo $_GET["ititle".$c];?>" readonly ></div>
                                                        <div class="col-lg-2  col-md-2 ">
                                                                        <label>First Name</label>
                                                            <input readonly type="text" class="form-control" placeholder="Name" name="ifirstname<?php echo $i+1; ?>" value="<?php echo $_GET["ifirstname".$c];?>"></div>
                                                            <div class="col-lg-2  col-md-2 ">
                                                                        <label>Last Name</label>
                                                            <input readonly type="text" class="form-control" placeholder="Name" name="ilastname<?php echo $i+1; ?>" value="<?php echo $_GET["ilastname".$c];?>"></div>
                                                       
                                                               <div class="col-lg-2 col-md-2 ">
                                                                        <label>Gender</label>
                                                            <input readonly type="text" class="form-control" placeholder="Gender" name="igender<?php echo $i+1; ?>"value="<?php echo $_GET["igender".$c];?>"></div>

                                                        
                                                        <div class="col-lg-2 col-md-2 ">
                                                                        <label>Age</label>
                                                            <input readonly type="number" class="form-control" placeholder="Age" name="iage<?php echo $i+1; ?>"value="<?php echo $_GET["iage".$c];?>"></div>
                                                         
                                                          <div class="col-lg-2 col-md-2 ">
                                                                        <label>DOB</label>
                                                            <input readonly type="text" class="form-control" placeholder="DOB" name="idob<?php echo $i+1; ?>"value="<?php echo $_GET["idob".$c];?>"></div>


                                                        </div>
                                                        

                                                        <div class="row">
                                                            <div class="col-lg-2 col-md-2 ">
                                                                        <label>Visa Type</label>
                                                            <input readonly type="text" class="form-control"  name="ivisatype<?php echo $i+1; ?>"value="<?php echo $_GET["ivisatype".$c];?>"></div>

                                                        
                                                        <div class="col-lg-2 col-md-2 ">
                                                                        <label>Passport No</label>
                                                            <input readonly type="text" class="form-control" placeholder="Age" name="ipassportno<?php echo $i+1; ?>"value="<?php echo $_GET["ipassportno".$c];?>"></div>

                                                            <div class="col-lg-2 col-md-2 ">
                                                                        <label>Issue place</label>
                                                            <input readonly type="text" class="form-control" placeholder="Age" name="iissueplace<?php echo $i+1; ?>"value="<?php echo $_GET["iissueplace".$c];?>"></div>
                                                         
                                                          <div class="col-lg-3 col-md-3 ">
                                                                        <label>Issued date</label>
                                                            <input readonly type="text" class="form-control" placeholder="DOB" name="iissuedate<?php echo $i+1; ?>"value="<?php echo $_GET["iissuedate".$c];?>"></div>

                                                             <div class="col-lg-3 col-md-3 ">
                                                                        <label>Expiry date</label>
                                                            <input readonly type="text" class="form-control" placeholder="DOB" name="iexpirydate<?php echo $i+1; ?>"value="<?php echo $_GET["iexpirydate".$c];?>"></div>

                                                            
                                                        


                                                        </div>
                                                         



                                                            
                                                            <?php
                                                        }
                                                        }?>

                                                         

                                                        
                                                  <p class="text-left">
                                                      Above Information will be reflect on tickets.
                                                  </p>
                                                     
                                                    <h5 class="text-center"> Total Travellers : <?php echo $_SESSION['Adults']+$_SESSION['Children']+$_SESSION['Infant'] ?></h5>
                                                    <center>
                                                    	<div class="col-md-4"></div>
                                                     
                                    <button type="submit" class="btn btn-primary uppercase btn-large col-md-4">Book Now</button></center>

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
                                   <div  class="col-md-7 col-xs-7 p-l-0">Subtotal </div>
                                   <div  class="col-md-5 col-xs-5 p-r-0"><h5  class="pull-right">Rs. <?php echo number_format($key->FareDetails->ChargeableFares->ActualBaseFare); ?></h5></div>
                                    </li>

                                    <button class="btn btn-primary" data-toggle="collapse" data-target="#demo">Tax Details</button>

                                    <div id="demo" class="collapse">
                                    <li class="col-md-12 col-xs-12">
                                   <div  class="col-md-7 col-xs-7 p-l-0">Tax </div>
                                   <div  class="col-md-5 col-xs-5 p-r-0"><h5  class="pull-right">Rs. <?php echo number_format($key->FareDetails->ChargeableFares->Tax); ?></h5></div>
                                    </li>
                                 

                                 
                                  <li class="col-md-12 col-xs-12">
                                   <div  class="col-md-7 col-xs-7 p-l-0">STax </div>
                                   <div  class="col-md-5 col-xs-5 p-r-0"><h5  class="pull-right">Rs. <?php echo number_format($key->FareDetails->ChargeableFares->STax); ?></h5></div>
                                    </li>
                                 
                                 
                                  <li class="col-md-12 col-xs-12">
                                   <div  class="col-md-7 col-xs-7 p-l-0">SCharge </div>
                                   <div  class="col-md-5 col-xs-5 p-r-0"><h5  class="pull-right">Rs. <?php echo number_format($key->FareDetails->ChargeableFares->SCharge); ?></h5></div>
                                    </li>
                                 
                               
                                <li class="col-md-12 col-xs-12">
                                   <div  class="col-md-7 col-xs-7 p-l-0">TCharge </div>
                                   <div  class="col-md-5 col-xs-5 p-r-0"><h5  class="pull-right">Rs. <?php echo number_format($key->FareDetails->NonchargeableFares->TCharge); ?></h5></div>
                                    </li>

                                     <li class="col-md-12 col-xs-12">
                                   <div  class="col-md-7 col-xs-7 p-l-0">TMarkup </div>
                                   <div  class="col-md-5 col-xs-5 p-r-0"><h5  class="pull-right">Rs. <?php echo number_format($key->FareDetails->NonchargeableFares->TMarkup); ?></h5></div>
                                    </li>
                                 
                                    </div>
                                 
                                 
                                  
                                    <li  class="col-md-12 col-xs-12 ">
                                   <div  class="col-md-7 col-xs-7 p-l-0">Total Tax</div>
                                   <div  class="col-md-5 col-xs-5 p-r-0"><h5  class="pull-right">Rs. <?php echo number_format($key->FareDetails->NonchargeableFares->TMarkup+
                                    $key->FareDetails->NonchargeableFares->TCharge+
                                     $key->FareDetails->ChargeableFares->STax
                                     +
                                     $key->FareDetails->ChargeableFares->SCharge+
                                     $key->FareDetails->ChargeableFares->Tax); ?></h5></div>
                                    </li>

                               </ul>
                            </li>
                            
                          <li class="col-md-12 col-xs-12 bg-theme padding-0"> 
                              <div  >
                                        <div  class="col-md-7 col-xs-7  padding-0"> 
                                            <h3 class="text-white">Total: </h3>
                                            
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
      
      <?php ?>
       

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
       
                
                <form>
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
  <div class="booking-item-details modal fade" id="booking-item-details-view" tabindex="-1" role="dialog" 		aria-labelledby="exampleModalLongTitle" aria-hidden="true">
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
</div><style type="text/css">
    label{
        color: black;
    }
</style>

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


		</script>
    </div>
</body>

</html>


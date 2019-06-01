<?php
session_start();
require "init.php";



$tripType = 1;
$_SESSION['tripType'] = $tripType;
// echo "start_Date   ".$start_Date."   endDate  ".$endDate."  tripType". $_SESSION['tripType'];
$NCS = $_GET['NCS'];

$_SESSION['Adults'] = 0;
$_SESSION['Children'] = 0;
$_SESSION['Infant'] = 0;

 
$a =  explode(",", $NCS);
// print_r($a);
$classvalue = $_GET['classvalue'];



foreach ($a as $arr) {
    $array = array("0","0","0");
    
    $array =explode(" ",$arr);
    // print_r($array);
    $count = count($array);

    if((strcmp("Infant",$array[$count-1])) ==0 ){
        $_SESSION['Infant'] = $array[1];
    }

    else if((strcmp("Children",$array[$count-1])) ==0) {
        $_SESSION['Children'] =$array[1];
    }


    else if(strcmp("Adults",$array[$count-1])==0 ){
        $_SESSION['Adults'] = $array[0];
    }
    
}
// echo $_SESSION['Adults']." ".$_SESSION['Children']." ".$_SESSION['Infant'];
//$classvalue = $_GET['classvalue'];
if ($classvalue=="Business") {
    $classvalue = "B";
}else if($classvalue=="Premium Economy") {
    $classvalue = "PE";
}
else if($classvalue=="Economy") {
    $classvalue = "E";
}else if($classvalue=="First Class") {
    $classvalue = "F";
}
// echo $from_address." ".$to_address." ".$start_Date." ".$endDate." ".$classvalue;



$number = count($_GET["fromAddress"]);  



// $_SESSION['from_address'] = $from_address;
// $_SESSION['to_address'] = $to_address;
// $_SESSION['start_Date'] = $start_Date;
// $_SESSION['classvalue'] = $classvalue;
// $_SESSION['endDate'] = $endDate;




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
    <link rel="stylesheet" href="css/styles.css">
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
                <div class="col-md-3">
                     
                    <aside class="booking-filters">
                       <div class="aside-title">
                            <p class="pull-left col-md-6 padding-0">Search Complete 255 Results</p>
                            <p class="pull-right "><i class="fa fa-filter"></i>Filter</p>
                       </div>
                         <ul class="list booking-filters-list">
                                
                            
                            <li>
                                <h5 class="booking-filters-title">Price </h5>
                                <input type="text" id="price-slider">
                            </li>
                            <li>
                                <h5 class="booking-filters-title">Stop </h5>
                                <ul class="stop-list list-inline list-unstyled">
                                    <a href=""><li class="col-md-4">
                                        <div class="stop-box-listitem ">Non-Stop<p>Rs,9734</p></div>
                                    </li></a>
                                    <a href=""><li class="col-md-4">
                                        <div class="stop-box-listitem ">1-Stop<p>Rs,7734</p></div>
                                    </li></a>
                                    <a href=""><li class="col-md-4">
                                        <div class="stop-box-listitem ">2+Stop<p>Rs,5734</p></div>
                                    </li></a>
                                </ul>
                            </li>
                            <li>
                                <h5 class="booking-filters-title">Departure time (Outbound) </h5>
                                <div id="time-range">
                                <p><span class="slider-time pull-left">12:00 AM</span> <span class="slider-time2 pull-right">11:59 PM</span>
                            
                                </p>
                                <div class="sliders_step1">
                                    <div id="slider-range"></div>
                                </div>
                            </div> 
                                  
                            </li>
                            <li>
                                <h5 class="booking-filters-title">Flight Classes </h5>
                                <form  method="GET" action="<?php $_PHP_SELF ?>" id="formname">

                            <input type="hidden" name="from_address" value="<?php echo $_SESSION['from_address'];?>">
                            <input type="hidden" name="to_address" value="<?php echo $_SESSION['to_address']?>">
                            <!-- <input type="hidden" name="classvalue" value="E"> -->
                            <input type="hidden" name="NCS" value="<?php echo $NCS;?>">



                                <!-- not useed -->
                            <input type="hidden" name="fromAddress" value="">
                            <input type="hidden" name="toAddress" value="">
                            <input type="hidden" name="startDate" value="">
                            <input type="hidden" name="endDate" value="">
                          <div class="checkbox">
                                    <label>

                                        <input class="i-check" name="classvalue" type="checkbox"onChange="this.form.submit()" value="E">Economy</input><span></span>
                                    </label>
                                </div>
                                   <input type="hidden" name="start_Date" value="<?php echo $_SESSION['start_Date'] ;?>">
                                     <input type="hidden" name="endDate" value="<?php echo $_SESSION['start_Date'] ;?>">
                                 </form>
                                <div class="checkbox">
                                    <label>
                                        <input class="i-check" type="checkbox" /><span>Business</span>
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input class="i-check" type="checkbox" /><span>First</span>
                                    </label>
                                </div>
                            </li>
                           
                            <li>
                                <h5 class="booking-filters-title">Fare Type </h5>
                          <div class="checkbox">
                                    <label>
                                        <input class="i-check" type="checkbox" />Refundable <span class="">46</span>
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input class="i-check" type="checkbox" />Non Refundable <span class="">2</span>
                                    </label>
                                </div>
                                
                            </li>
                            <li>
                                <h5 class="booking-filters-title">Airlines </h5>
                          <div class="checkbox">
                                    <label>
                                        <input class="i-check" type="checkbox" />Lufthansa<span class="pull-right">2,150 INR</span>
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input class="i-check" type="checkbox" />American Airlines<span class="pull-right">3,500 INR</span>
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input class="i-check" type="checkbox" />Airfrance<span class="pull-right">1,540 INR</span>
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input class="i-check" type="checkbox" />Croatia Airlines<span class="pull-right">1,970 INR</span>
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input class="i-check" type="checkbox" />Delta<span class="pull-right">2,640 INR</span>
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input class="i-check" type="checkbox" />Air Canada<span class="pull-right">4,450 INR</span>
                                    </label>
                                </div>
                            </li>
                            
                        </ul>
                    </aside>
                </div>
                <div class="col-md-9">
          
                
                    <div class="clearfix"></div>
                 
      <div class="clearfix"></div>
                    
                            <div class="booking-item-container">
                                
                                  <div  class="booking-item">
                                    <div>
                                       
                                        <div class="clearfix"></div>
                                        
                                       <div class="col-md-12 col-sm-12 padding-0">
                                       <ul class="list-inline list-unstyled flight-search-ul">

                                            <?php  


                                            if($number > 0)  
                                                 {  
                                                      for($i=0; $i<$number; $i++)  
                                                      {  
                                                        $from_address =  $_GET["fromAddress"][$i];
                                                        $start_Date =  $_GET["startDate"][$i];
                                                        $endDate =  $_GET["startDate"][$i];
                                                        $to_address =  $_GET["toAddress"][$i];

                                                        ?>



                                                        <?php
                                                           

                                                $allAirports = curl("https://webapi.etravos.com/Flights/AvailableFlights?source=".$from_address."&destination=".$to_address."&journeyDate=".$start_Date."&tripType=".$_SESSION['tripType']."&flightType=1&adults=".$_SESSION['Adults']."&children=".$_SESSION['Children']."&infants=".$_SESSION['Infant']."&travelClass=".$classvalue."&userType=5&returnDate=".$endDate, [], "application/json", false, [
                                                    "ConsumerKey: ",
                                                    "ConsumerSecret: ",
                                                        "Accept-Encoding:gzip, deflate",
                                                ]);
                                                    $o = gzdecode($allAirports);

                                                    $obj = json_decode($o);
                                            if($obj->DomesticOnwardFlights!=NULL){
                                                 $count=0;
                                                $key = $obj->DomesticOnwardFlights[$count];
                                                   
                                                foreach ($key->FlightSegments as $FlightSegment) {  ?>
                                     
                                   
                                            <li>
                                            <div  class="bg-white fight-table-list">
                                                <div class="row container">
                                                    
                                                    <div class="col-md-2 text-secondary">
                                                        
                                                        Trip <?php echo $i;?>
                                                    </div>
                                                      <div class="col-md-8" style="font-weight: bold;">
                                                          <?php 
                                                        
                                                        echo $key->RequestDetails->Source. 
                                                        " TO " 
                                                        .$key->RequestDetails->Destination." | ".$start_Date;?> 

 
                                                      </div>

                                                </div>
                                                <br>
                                              
                                        
                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-3 p-r-0">
                                               <?php require "image.php"; ?>
                                                    <span class="booking-item-airline-logo">
                                                    <img src="<?php echo $IMG;?>" alt="Image Alternative text" title="Image Title" />
                                                    </span>
                                                    <aside>
                                                     <p class="uppercase"><?php echo $FlightSegment->AirLineName;?></p>
                                                      <small><?php echo $FlightSegment->OperatingAirlineCode;?>-<?php echo $FlightSegment->OperatingAirlineFlightNumber;?></small>
                                                      </aside>
                                               </div>
                                                  <div class="booking-item-flight-details col-md-1 col-sm-4text-center p-r-0">
                                                        <p class="uppercase " style="font-weight: bold;"><?php 
                                                        $departdate = substr($FlightSegment->DepartureDateTime, 11,5);
                                                        echo $departdate;?></p>
                                                        <small><?php 
                                                        
                                                        echo $FlightSegment->DepartureAirportCode;?></small>

                                                  </div>
                                                   <div class="col-md-2 col-sm-4 text-center p-r-0">
                                                        <p ><?php echo $FlightSegment->Duration;?></p>
                                                        <small>Non Stop</small>
                                                    </div>
                                                   <div class="col-md-1 col-sm-4 text-center p-r-0">
                                                     <p style="font-weight: bold;"><?php echo substr($FlightSegment->ArrivalDateTime, 11,5);?></p>
                                                     <small><?php 
                                                        
                                                        echo $FlightSegment->ArrivalAirportCode;?></small>    
                                                   </div>
                                                   
                                                    <div class="col-md-2 col-sm-4 text-center p-r-0">
                                                     <h5 class="theme-color-text font-bold">Rs. 


                                                            <?php 

                                                                $key1 = $key->FareDetails;
                                                                $key2 = $key1->FareBreakUp;
                                                                $key3 = $key2->FareAry[0];
                                                                $key4 = $key3->IntTaxDataArray[0];
                                                                echo number_format($key->FareDetails->TotalFare);
                                                            ?>

                                                     </h5>
                                                     </div>
                                                     <div class="col-md-2 col-sm-4 text-center p-r-0">
                                                     <span class="uppercase bolded" data-toggle="modal" data-target="#booking-item-details-view"><?php echo $FlightSegment->FlightNumber;?></span>
                                                     
                                                     </div>
                                                     <div class="col-md-2 col-sm-4 text-center">
                                                        <form action="checkout.php" method="GET">
                                                            <input type="hidden" name="count" id="count" value="<?php echo $count;  ?>">
                                                        <button class="btn btn-primary small-btn "  type="submit" >Book Now</button>
                                                        </form>
                                                     </div>
                                          
                        
                        </div>
                        </li>

                        <?php  }
                        $count = $count+1;
                        
                    }



// end of if and for of array names
                }

            }?>
                        

                       <!--    <?php  
                                            if($obj->DomesticOnwardFlights!=NULL){
                                                foreach ($obj->InternationalFlights as $key ) {
                                                foreach ($key->FlightSegments as $FlightSegment) {  ?>
                                     
                                   
                                            <li>
                                            <div  class="bg-white fight-table-list">
                                        
                                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-3 p-r-0">
                                                    <span class="booking-item-airline-logo">
                                                    <img src="img/airline/spicejet-logo.png" alt="Image Alternative text" title="Image Title" />
                                                    </span>
                                                    <aside>
                                                     <p class="uppercase"><?php echo $FlightSegment->AirLineName;?></p>
                                                      <small><?php echo $FlightSegment->OperatingAirlineCode;?>-<?php echo $FlightSegment->OperatingAirlineFlightNumber;?></small>
                                                      </aside>
                                               </div>
                                                  <div class="booking-item-flight-details col-md-1 text-center p-r-0">
                                                        <p class="uppercase"><?php echo substr($FlightSegment->DepartureDateTime, 11,5);?></p>

                                                  </div>
                                                   <div class="col-md-1 text-center p-r-0">
                                                     <p><?php echo substr($FlightSegment->ArrivalDateTime, 11,5);?></p>
                                                   </div>
                                                    <div class="col-md-2 text-center p-r-0">
                                                        <p><?php echo $FlightSegment->Duration;?></p>
                                                        <small>Non Stop</small>
                                                    </div>
                                                    <div class="col-md-2 text-center p-r-0">
                                                     <h5 class="theme-color-text font-bold">Rs. 4,793</h5>
                                                     </div>
                                                     <div class="col-md-2 text-center p-r-0">
                                                     <span class="uppercase bolded" data-toggle="modal" data-target="#booking-item-details-view">Flight Details</span>
                                                     
                                                     </div>
                                                     <div class="col-md-2 text-center">
                                                        <a class="btn btn-primary small-btn " href="checkout.html">Book Now</a>
                                                     </div>
                                          
                        
                        </div>
                        </li>

                        <?php  }
                        } 
                    }?> -->
                        
                    </ul>
                        </div>
                      
                       
                        
                    
                    </div>
  
        </div>
        </div> 
        </div>
        </div>
        <div class="clearfix"></div>

     </section> 
      
    
        <!--- End Services--->
        <section class="travel-deal-blk">
                    <div class="container">
                        <div class="travel-deal-in">
                            <h4>Like travel deals? Enter your email and we'll send them your way.</h4>
                            <div class="subscription-blk">
                                <form>
                                    <div class="mail-blk">
                                        <span class="cust-form"><input type="email" class="form-control email-box" placeholder="Email"></span>
                                        <button type="button" class="btn btn-proceed">SEND ME DEALS</button>
                                    </div>
                                </form>
                                <p>Your privacy is important to us, so we'll never spam you or share your info with third parties.<br>Take a look at our privacy policy.</p>
                            </div>
                        </div>
                    </div>
                </section>
                <!---End Email block--->


       <?php include("footer.php"); ?>
        <!---Earch Modal --->
  
  <!---End search modal--->
  <!--- Fight details modal--->
  <div class="booking-item-details modal fade" id="booking-item-details-view" tabindex="-1" role="dialog"       aria-labelledby="exampleModalLongTitle" aria-hidden="true">
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



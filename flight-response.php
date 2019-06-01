<?php
session_start();
require "init.php";


 
if ($_GET['tripType']==1) {
    

$endDate = $_GET['startDate'];


}
else {
    $endDate = $_GET['endDate'];
}

$from_address = $_GET['fromAddress'];
$to_address = $_GET['toAddress'];
$start_Date = $_GET['startDate'];
$tripType = $_GET['tripType'];
$_SESSION['tripType'] = $tripType;
// echo "start_Date   ".$start_Date."   endDate  ".$endDate."  tripType". $_SESSION['tripType'];
$NCS = $_GET['NCS'];

$_SESSION['Adults'] = 1;
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

$allAirports = curl("https://webapi.etravos.com/Flights/AvailableFlights?source=".$from_address."&destination=".$to_address."&journeyDate=".$start_Date."&tripType=".$_SESSION['tripType']."&flightType=1&adults=".$_SESSION['Adults']."&children=".$_SESSION['Children']."&infants=".$_SESSION['Infant']."&travelClass=".$classvalue."&userType=5&returnDate=".$endDate, [], "application/json", false, [
    "ConsumerKey: ",
    "ConsumerSecret: ",
        "Accept-Encoding:gzip, deflate",
]);
    $o = gzdecode($allAirports);


$_SESSION['from_address'] = $from_address;
$_SESSION['to_address'] = $to_address;
$_SESSION['start_Date'] = $start_Date;
$_SESSION['classvalue'] = $classvalue;
$_SESSION['endDate'] = $endDate;


$obj = json_decode($o);

?><!DOCTYPE HTML>
<html>

<head>
    <title>Search results - Flycorpo</title>


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
<!-- <link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css"> -->
<!-- <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script> -->

</head>

<body>
<?php include("header.php"); ?>
     <section class="flight-search-result">
        <div  class="container">
    <div class="row">
                <div class="col-md-3">
                     
                    <aside class="booking-filters">
                       <div class="aside-title">
                            <p class="pull-left col-md-6 padding-0">Search Complete <?php echo count($obj->DomesticOnwardFlights); ?> Results</p>
                            <p class="pull-right "><i class="fa fa-filter"></i>Filter</p>
                       </div>
                         <ul class="list booking-filters-list">
                                
                        <!--     
                            <li>
                                <h5 class="booking-filters-title">Price </h5> -->
                                <!-- <input type="text"id="price-slider"> -->
                           <!--  <ul class="stop-list list-inline list-unstyled">
                                <li class="col-md-12">
                                    <button id="btn1">Show Text</button>
                                       
                                          <div class="checkbox">
                                    <label>
                                        <input class="i-check" type="checkbox" id="price1000" onchange="changeprice1000()" />1000 - 5000 -->
                                        <!-- <span class="pull-right">3,500 INR</span> -->
<!--                                         
                                    </label>
                                </div>

<script>

$(document).ready(function(){
  $("#btn1").click(function(){
          $(".price").parents('div').parents('li').parents('div.fight-table-list').hide();
          
          $('.price').each( function(  ){
  


  var s = parseInt($(this).text().trim());
  if(s>2500 && s<5000)
          $(this).parents('div').parents('li').parents('div.fight-table-list').show();
});
   
  });
  $("#btn2").click(function(){
    alert("HTML: " + $(".test").html());
  });
});
function changeprice1000(){
      $(".price").parents('div').parents('li').parents('div.fight-table-list').hide();

    if($("#price1000").is(":checked")){

        $(".price").parents('div').parents('li').parents('div.fight-table-list').hide();
          
        $('.price').each( function(){
        var s = parseInt($(this).text().trim());
        if(s>1000 && s<5000)
          $(this).parents('div').parents('li').parents('div.fight-table-list').show();
});
   

  }
  
  if($("#price1000").is(":not(:checked)")){
  $(".price").parents('div').parents('li').parents('div.fight-table-list').show();
  }

}

</script>
                                    </li>
                            </ul>


                            </li>
 -->                         
                            <li>
                                <h5 class="booking-filters-title">Stop </h5>
                                <ul class="stop-list list-inline list-unstyled">
                                   <li class="col-md-4">
                                       
                                          <div class="checkbox">
                                    <label>
                                        <input class="i-check" type="checkbox" id="NonStop" onchange="changeNonStop()" />Non Stop
                                        <!-- <span class="pull-right">3,500 INR</span> -->
                                    </label>
                                </div>

<script>
function changeNonStop(){
$(document).ready(function(){
    if($("#NonStop").is(":checked")){
        $(".stop").parents('li').parents('div.fight-table-list').show();
  $(".stop:not(:contains('Non Stop'))").parents('li').parents('div.fight-table-list').hide();
  }
  
  if($("#NonStop").is(":not(:checked)")){
  $(".stop").parents('li').parents('div.fight-table-list').show();
  }
});
}

</script>
                                    </li>
                                    
                                     <li class="col-md-4">
                                       
                                          <div class="checkbox">
                                    <label>
                                        <input class="i-check" type="checkbox" id="1Stop" onchange="change1Stop()" />1 Stop(s)
                                        <!-- <span class="pull-right">3,500 INR</span> -->
                                    </label>
                                </div>

<script>
function change1Stop(){
$(document).ready(function(){
    if($("#1Stop").is(":checked")){
        $(".stop").parents('li').parents('div.fight-table-list').show();
  $(".stop:not(:contains('1 Stop(s)'))").parents('li').parents('div.fight-table-list').hide();
  }
  
  if($("#1Stop").is(":not(:checked)")){
  $(".stop").parents('li').parents('div.fight-table-list').show();
  }
});
}

</script>
                                    </li>
                                     <li class="col-md-4">
                                       
                                          <div class="checkbox">
                                    <label>
                                        <input class="i-check" type="checkbox" id="2Stop" onchange="change2Stop()" />2 Stop(s)
                                        <!-- <span class="pull-right">3,500 INR</span> -->
                                    </label>
                                </div>

<script>
function change2Stop(){
$(document).ready(function(){
    if($("#2Stop").is(":checked")){
        $(".stop").parents('li').parents('div.fight-table-list').show();
  $(".stop:not(:contains('2 Stop(s)'))").parents('li').parents('div.fight-table-list').hide();
  }
  
  if($("#2Stop").is(":not(:checked)")){
  $(".stop").parents('li').parents('div.fight-table-list').show();
  }
});
}

</script>
                                    </li>
                                   <!--  <a href=""><li class="col-md-4">
                                        <div class="stop-box-listitem ">1-Stop<p>Rs,7734</p></div>
                                    </li></a>
                                    <a href=""><li class="col-md-4">
                                        <div class="stop-box-listitem ">2+Stop<p>Rs,5734</p></div>
                                    </li></a> -->
                                </ul>
                            </li>
                            <!--<li>-->
                            <!--    <h5 class="booking-filters-title">Departure time (Outbound) </h5>-->
                            <!--    <div id="time-range">-->
                            <!--    <p><span class="slider-time pull-left">12:00 AM</span> <span class="slider-time2 pull-right">11:59 PM</span>-->
                            
                            <!--    </p>-->
                            <!--    <div class="sliders_step1">-->
                            <!--        <div id="slider-range"></div>-->
                            <!--    </div>-->
                            <!--</div> -->
                                  
                            <!--</li>-->
                            <li>
                                <h5 class="booking-filters-title">Flight Classes </h5>
                             
                          <div class="checkbox">
                               <form  method="GET" action="<?php $_PHP_SELF ?>" id="formname">

                            <input type="hidden" name="fromAddress" value="<?php echo $_SESSION['from_address'];?>">
                            <input type="hidden" name="toAddress" value="<?php echo $_SESSION['to_address']?>">
                            <!-- <input type="hidden" name="classvalue" value="<?php echo $classvalue;?>"> -->
                          
                            <input type="hidden" name="NCS" value="<?php echo $NCS;?>">
                            <input type="hidden" name="tripType" value="<?php echo $tripType;?>">

                        



                                <!-- not useed -->
                       
                            <input type="hidden" name="startDate" value="<?php echo $start_Date; ?>">
                            <input type="hidden" name="endDate" value="<?php echo $endDate; ?>">
                                    <label>

                                        <input class="i-check" name="classvalue" type="checkbox"onchange="document.getElementById('formname').submit()" value="E">Economy</input><span></span>
                                    </label>
                                      <input type="hidden" name="start_Date" value="<?php echo $_SESSION['start_Date'] ;?>">
                                     <input type="hidden" name="endDate" value="<?php echo $_SESSION['start_Date'] ;?>">
                                 </form>
                                </div>
                                 
                                <div class="checkbox">
                                      <form  method="GET" action="<?php $_PHP_SELF ?>" id="formname1">

                            <input type="hidden" name="fromAddress" value="<?php echo $_SESSION['from_address'];?>">
                            <input type="hidden" name="toAddress" value="<?php echo $_SESSION['to_address']?>">
                            <!-- <input type="hidden" name="classvalue" value="<?php echo $classvalue;?>"> -->
                          
                            <input type="hidden" name="NCS" value="<?php echo $NCS;?>">
                            <input type="hidden" name="tripType" value="<?php echo $tripType;?>">

                            <input type="hidden" name="startDate" value="<?php echo $start_Date; ?>">
                            <input type="hidden" name="endDate" value="<?php echo $endDate; ?>">
                                    <label>
                                        <input class="i-check" name="classvalue" type="checkbox"onchange="document.getElementById('formname1').submit()" value="B" /><span>Business</span>
                                    </label>
                                       <input type="hidden" name="start_Date" value="<?php echo $_SESSION['start_Date'] ;?>">
                                     <input type="hidden" name="endDate" value="<?php echo $_SESSION['start_Date'] ;?>">
                                 </form>
                                </div>



                                  <div class="checkbox">
                                      <form  method="GET" action="<?php $_PHP_SELF ?>" id="formname2">

                            <input type="hidden" name="fromAddress" value="<?php echo $_SESSION['from_address'];?>">
                            <input type="hidden" name="toAddress" value="<?php echo $_SESSION['to_address']?>">
                            <!-- <input type="hidden" name="classvalue" value="<?php echo $classvalue;?>"> -->
                          
                            <input type="hidden" name="NCS" value="<?php echo $NCS;?>">
                            <input type="hidden" name="tripType" value="<?php echo $tripType;?>">

                            <input type="hidden" name="startDate" value="<?php echo $start_Date; ?>">
                            <input type="hidden" name="endDate" value="<?php echo $endDate; ?>">
                                    <label>
                                        <input class="i-check" name="classvalue" type="checkbox"onchange="document.getElementById('formname2').submit()" value="PE" /><span>Premium Economy</span>
                                    </label>
                                       <input type="hidden" name="start_Date" value="<?php echo $_SESSION['start_Date'] ;?>">
                                     <input type="hidden" name="endDate" value="<?php echo $_SESSION['start_Date'] ;?>">
                                 </form>
                                </div>    <div class="checkbox">
                                      <form  method="GET" action="<?php $_PHP_SELF ?>" id="formname3">

                            <input type="hidden" name="fromAddress" value="<?php echo $_SESSION['from_address'];?>">
                            <input type="hidden" name="toAddress" value="<?php echo $_SESSION['to_address']?>">
                            <!-- <input type="hidden" name="classvalue" value="<?php echo $classvalue;?>"> -->
                          
                            <input type="hidden" name="NCS" value="<?php echo $NCS;?>">
                            <input type="hidden" name="tripType" value="<?php echo $tripType;?>">

                            <input type="hidden" name="startDate" value="<?php echo $start_Date; ?>">
                            <input type="hidden" name="endDate" value="<?php echo $endDate; ?>">
                                    <label>
                                        <input class="i-check" name="classvalue" type="checkbox"onchange="document.getElementById('formname3').submit()" value="F" /><span>First Class</span>
                                    </label>
                                       <input type="hidden" name="start_Date" value="<?php echo $_SESSION['start_Date'] ;?>">
                                     <input type="hidden" name="endDate" value="<?php echo $_SESSION['start_Date'] ;?>">
                                 </form>
                                </div>
                            </li>
                           
                         <!--    <li>
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
                                
                            </li> -->
                            <li>
                                <h5 class="booking-filters-title">Airlines </h5>
                         

                                <?php  $obj->DomesticOnwardFlights;
                                $i= 0;
                                 $arr = [];

                                foreach ($obj->DomesticOnwardFlights as $key) {
                                        $AirLineName =  $key->FlightSegments[0]->AirLineName;
                                        $aaaa = explode(" ", $AirLineName);
                                        $arr[$i]  = $aaaa[0];
                                        $i++;

                                 } 
                                 $arr =  array_unique($arr);
                                  foreach ($arr as $a) {
                                  
                                       # code...
                                     ?>
                                <div class="checkbox">
                                    <label>
                                        <input class="i-check" type="checkbox" id="<?php  echo $a ?>" onchange="change<?php  echo $a ?>()" /><?php  echo $a ?>
                                        <!-- <span class="pull-right">3,500 INR</span> -->
                                    </label>
                                </div>

<script>
function change<?php  echo $a ?>(){
$(document).ready(function(){
    if($("#<?php  echo $a ?>").is(":checked")){
        $(".AirLineName").parents('aside').parents('div').parents('li').parents('div.fight-table-list').show();
  $(".AirLineName:not(:contains('<?php  echo $a ?>'))").parents('aside').parents('div').parents('li').parents('div.fight-table-list').hide();
  }
  
  if($("#<?php  echo $a ?>").is(":not(:checked)")){
  $(".AirLineName").parents('aside').parents('div').parents('li').parents('div.fight-table-list').show();
  }
});
}

</script>
<?php } ?>
                               
                            </li>
                            
                        </ul>
                    </aside>
                </div>
                <div class="col-md-9">
                <div class="row">
                    <div class="search-result-header">
                        <div class="col-md-3 col-sm-3 col-xs-3 padding-0">
                            <div class="pull-left">
                                <h3 class=""><?php echo $from_address?></h3>
                                <h6 class="uppercase"></h6>
                            </div>
                        </div>
                        <div class="text-center col-md-6 col-sm-6 col-xs-6 padding-0">
                            <h5>Depart <?php echo $start_Date?></h5>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-3 padding-0">
                            <div class="pull-right">
                                <aside>
                                <h3 class=""><?php echo $to_address?></h3>
                                <h6 class="uppercase"></h6>
                                </aside>
                                <span>
                                <!-- <button type="button" class="btn btn-primary uppercase" data-toggle="modal" data-target="#exampleModalLong">
                                 Modify Search</button>  -->
                                 </span>  
              
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                          <div  class="carousel slide media-carousel" id="media" data-ride="carousel" data-interval="false">
        <div class="carousel-inner matrix-block"> 
        
          <div class="item matrix-list active">
                <div class="media-block">
                    <a href="#">
                    <div class="offer-item">
                        <p class="uppercase text-center">

                        <?php
                            $date = $start_Date;
                            echo date('D,Md', strtotime($date. ' + 0 days'));
                            // echo $date;
                        ?></p>
                        <!-- <p class="uppercase text-center">Rs 2,800</p> -->
                    </div></a>
                    
                    </div>
    
            
            </div>
            <?php 
              for ($i=1; $i < 7; $i++) { 
                            # code...
                        ?>
                        
                           
            <div class="item matrix-list">
                <div class="media-block">
                    <form  method="GET" action="<?php $_PHP_SELF ?>" id="form-id<?php echo $i;?>">

                            <input type="hidden" name="fromAddress" value="<?php echo $_SESSION['from_address'];?>">
                            <input type="hidden" name="toAddress" value="<?php echo $_SESSION['to_address']?>">
                            <input type="hidden" name="classvalue" value="<?php echo $classvalue;?>">
                            <input type="hidden" name="NCS" value="<?php echo $NCS;?>">

                            <input type="hidden" name="tripType" value="<?php echo $tripType;?>">



                                <!-- not useed -->
                           
                      
                          <!--   <input type="hidden" name="NCS" value="0"> -->



                    <a href="javascript:$('#form-id<?php echo $i;?>').submit();" type="submit">
                    <div class="offer-item">
                        <p class="uppercase text-center"><?php

                            $date = $start_Date;
                            echo date('D,Md', strtotime($date. ' + '.$i.' days'));
                            $newdate = date('d-m-Y', strtotime($date. ' + '.$i.' days'));
                            // echo $newdate;
                        ?></p>
                        <!-- <p class="uppercase text-center">Rs 2,800</p> -->
                    </div></a>
                    
                    </div>
    
            
            </div>

             <input type="hidden" name="startDate" value="<?php echo $newdate;?>">

             <?php
                if ($tripType==1) {  ?>


                    <input type="hidden" name="endDate" value="<?php echo $newdate;?>">              
                    <?php  }
                     else {
                        ?>
                    <input type="hidden" name="endDate" value="<?php echo $_GET["endDate"]?>">                                

               <?php  }
             ?>
            
            </form>

        <?php } ?>
      

        </div>
        <a data-slide="prev" href="#media" class="left carousel-control"><i class="fa fa-angle-left fa-2x"></i></a>
        <a data-slide="next" href="#media" class="right carousel-control"><i class="fa fa-angle-right fa-2x"></i></a>
      </div>
      <div class="clearfix"></div>



      <!-- trip type one -->

        <?php
                if ($tripType==1) {  ?>
                                

                
                            <div class="booking-item-container">
                                
                                  <div  class="booking-item">
                                    <div>
                                        <div class="list-header">
                                          <div class="col-md-2 col-sm-4 col-xs-4 text-center padding-0">Airline</div>
                                            <div class="col-md-2 col-sm-4 col-xs-4 text-center p-r-0">Depart</div>
                                            <div class="col-md-2 col-sm-4 col-xs-4 text-center p-r-0">Duration</div>

                                            <div class="col-md-2 col-sm-4 col-xs-4 text-center p-r-0">Arrive</div>
                                            
                                            <div class="col-md-2 col-sm-4 col-xs-4 text-center p-r-0">Price (Per Adult)</div>
                                            
                                     
                                        </div>
                                        <div class="clearfix"></div>
                                        
                                       <div class="col-md-12 col-sm-12 padding-0">
                                       <ul class="list-inline list-unstyled flight-search-ul">

                                            <?php  
                                            if($obj->DomesticOnwardFlights!=NULL){
                                                 $count=0;

                                                 $num = count($obj->DomesticOnwardFlights);
                                                for ($i = 0; $i < $num; $i++ ) {
                                                $key =   $obj->DomesticOnwardFlights[$i];
                                                $FlightSegment = $key->FlightSegments[0];   ?>
                                     
                                   
                                          
                                            <div  class="bg-white fight-table-list" style="
                border-radius: 7px;  
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
                
                border: 2px;">
                                                  <li>
                                        
                                          <div class=" col-md-2 col-sm-12 col-xs-12 p-r-0">
                                               <?php require "image.php"; ?>
                                                    <span class="booking-item-airline-logo">
                                                    <img src="http://webapi.i2space.co.in<?php echo $FlightSegment->ImagePath?>" alt="Image Alternative text" title="Image Title" />
                                                    </span>
                                                    <aside>
                                                     <p class="uppercase AirLineName"><?php 
                                                     $ar = explode(" ", $FlightSegment->AirLineName); 
                                                     echo $ar[0];?></p>
                                                      <small><?php echo $FlightSegment->OperatingAirlineCode;?>-<?php echo $FlightSegment->OperatingAirlineFlightNumber;?></small>
                                                      </aside>
                                               </div>
                                                  <div class="booking-item-flight-details col-md-2 col-sm-2 col-xs-2 text-center p-r-0">
                                                        <p class="uppercase"><?php 
                                                        $departdate = substr($FlightSegment->DepartureDateTime, 11,5);
                                                        echo $departdate;?></p>

                                                  </div>
                                                 

                                                   <div class="col-md-2 col-sm-2 col-xs-2 text-center p-r-0 stop">
                                                        <p><?php echo $FlightSegment->Duration;?></p>
                                                        <?php if (count($key->FlightSegments)==1) {
                                                            echo "<p>Non Stop</p>";
                                                        }
                                                        else{
                                                             echo "<p>".(count($key->FlightSegments)-1)." Stop(s)</p>";
                                                        } ?>
                                                        
                                                    </div>
                                                      <div class="col-md-2 col-sm-2 col-xs-2 text-center p-r-0">
                                                     <p><?php echo substr($FlightSegment->ArrivalDateTime, 11,5);?></p>
                                                   </div>
                                                   <div class="col-md-2 col-sm-3 col-xs-3 text-center p-r-0">
                                                     <h5 class="theme-color-text font-bold price"><?php
                                                                $key1 = $key->FareDetails;
                                                                $key2 = $key1->FareBreakUp;
                                                                $key3 = $key2->FareAry[0];
                                                                $key4 = $key3->IntTaxDataArray[0];
                                                                // echo number_format($key->FareDetails->TotalFare);
                                                                echo $key->FareDetails->TotalFare;
                                                            ?></h5>
                                                     </div>
                                                     <!-- <div class="col-md-2 col-sm-4 col-xs-4 text-center p-r-0">
                                                     <span class="uppercase bolded" data-toggle="modal" data-target="#booking-item-details-view"><?php echo $FlightSegment->FlightNumber;?></span>
                                                     
                                                     </div> -->
                                                    <div class="col-md-2 col-sm-3 col-xs-3 text-center">
                                                        <form action="checkout.php" method="GET">
                                                            
                                                             <input type="hidden" name="count" value="<?php echo base64_encode($count);?>">
                                                    <input type="hidden" name="rcount" value="<?php base64_encode(0);?>">
                                                        <button class="btn btn-primary small-btn "  type="submit" >Book Now</button>
                                                        </form>
                                                     </div>
                           </li>
                        </div>
                     

                        <?php  
                        $count = $count+1;
                        } 
                    }?>
                        

                   
                        
                    </ul>
                        </div>
                      
                       
                        
                    
                    </div>
  
        </div>
        </div> 

            <?php  }
             ?>
               


        <!-- end of trip type one -->


        <!-- trip two  -->

      

        <?php
                if ($tripType==2) {  ?>
                              

                <form action="checkout.php" method="GET" id="form<?php echo $count;  ?>">
                  <div class="text-right">
                   <button class="btn btn-primary large-btn "  type="submit" >Book Now</button>
                  </div>
                            <div class="booking-item-container">
                             
                                
                                  <div  class="booking-item">
                                    <div>
                                        
                                        <div class="clearfix"></div>
                                        
                                       <div class="col-md-6 col-sm-6 padding-0">

                                       <ul class="list-inline list-unstyled flight-search-ul">
                                           
                                            

                                            <?php  
                                            if($obj->DomesticOnwardFlights!=NULL){
                                                 $count=0;

                                                 $num = count($obj->DomesticOnwardFlights);
                                                for ($i = 0; $i < $num; $i++ ) {
                                                $key =   $obj->DomesticOnwardFlights[$i];
                                                $FlightSegment = $key->FlightSegments[0];   ?>
                                     
                                   
                                            
                                                        
                                                            
                                            <div  class="bg-white fight-table-list"  style="
                border-radius: 7px;  
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
                
                border: 2px;">
                                                  <li>
                                                    <div class="row"> 
                                                      <div class=" col-md-1 col-sm-1 col-xs-1 p-r-0">
                                                      
                                                      </div>


                                                      <div class=" col-md-1 col-sm-1 col-xs-1 p-r-0">
                                                       <label class="container">
                                                            <input type="radio" <?php  if($count == 0) echo 'checked="checked"';?>  name="count"  value="<?php echo base64_encode($count)  ?>">
                                                            <span class="checkmark"></span>
                                                          </label>
                                                      </div>

                                                     
                                                    
                                                      <div class=" col-md-8 col-sm-8 col-xs-8 p-r-0">
                                              
                                                    
                                                    <aside>
                                                     <p class="uppercase AirLineName"> 
                                                      <?php 
                                                     $ar = explode(" ", $FlightSegment->AirLineName); 
                                                     echo $ar[0];?> | 

                                                     <small><?php echo $FlightSegment->OperatingAirlineCode;?>-<?php echo $FlightSegment->OperatingAirlineFlightNumber;?></small>
                                                       

                                                     </p>
                                                      
                                                      </aside>

                                                     


                                               </div>
                                                    </div>
                                                  
                                                    <hr>
                                        
                                               <div class=" col-md-2 col-sm-2 col-xs-2 p-r-0">
                                                 <span class="booking-item-airline-logo">
                                                    <img src="http://webapi.i2space.co.in<?php echo $FlightSegment->ImagePath?>" alt="Image Alternative text" title="Image Title" />
                                                    </span>
                                               </div>
                                                  <div class="booking-item-flight-details col-md-2 col-sm-2 col-xs-2 text-center p-r-0">
                                                        <p class="uppercase"><?php 
                                                        $departdate = substr($FlightSegment->DepartureDateTime, 11,5);
                                                        echo $departdate;?></p>

                                                  </div>
                                                 

                                                   <div class="col-md-3 col-sm-3 col-xs-3 text-center p-r-0 stop">
                                                        <p><?php echo $FlightSegment->Duration;?></p>
                                                        <?php if (count($key->FlightSegments)==1) {
                                                            echo "Non Stop";
                                                        }
                                                        else{
                                                             echo (count($key->FlightSegments)-1)." Stop(s)";
                                                        } ?>
                                                        
                                                    </div>
                                                      <div class="col-md-2 col-sm-2 col-xs-2 text-center p-r-0">
                                                     <p><?php echo substr($FlightSegment->ArrivalDateTime, 11,5);?></p>
                                                   </div>
                                                   <div class="col-md-3 col-sm-3 col-xs-3 text-center p-r-0">
                                                     <h5 class="theme-color-text font-bold price">Rs. <?php
                                                                $key1 = $key->FareDetails;
                                                                $key2 = $key1->FareBreakUp;
                                                                $key3 = $key2->FareAry[0];
                                                                $key4 = $key3->IntTaxDataArray[0];
                                                                // echo number_format($key->FareDetails->TotalFare);
                                                                echo number_format($key->FareDetails->TotalFare);
                                                            ?></h5>
                                                     </div>
                           </li>
                        </div>
                      </a>
                  
                     

                        <?php  
                        $count = $count+1;
                        } 
                    }?>
                        
                 
                   
                        
                    </ul>
                        </div>


                        <!-- return segment -->
                          <div class="col-md-6 col-sm-6 padding-0">
                                       <ul class="list-inline list-unstyled flight-search-ul">

                                          

                                            <?php  
                                            if($obj->DomesticReturnFlights!=NULL){
                                                 $rcount=0;

                                                 $num = count($obj->DomesticReturnFlights);
                                                for ($i = 0; $i < $num; $i++ ) {
                                                $key =   $obj->DomesticReturnFlights[$i];
                                                $FlightSegment = $key->FlightSegments[0];   ?>
                                     
                                   
                                         
                                                         
                                                            
                                            <div  class=" fight-table-list"  style="
                border-radius: 7px;  
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
                background-color: #CCFFCC;                
                border: 2px;">
                                                  <li>
                                        
                                           <div class="row"> 
                                                      <div class=" col-md-1 col-sm-1 col-xs-1 p-r-0">
                                                      
                                                      </div>


                                                      <div class=" col-md-1 col-sm-1 col-xs-1 p-r-0">
                                                       <label class="container">
                                                            <input type="radio" <?php  if($rcount == 0) echo 'checked="checked"';?>  name="rcount"  value="<?php echo base64_encode($rcount) ;  ?>">
                                                            <span class="checkmark"></span>
                                                          </label>
                                                      </div>

                                                     
                                                    
                                                      <div class=" col-md-8 col-sm-8 col-xs-8 p-r-0">
                                              
                                                    
                                                    <aside>
                                                     <p class="uppercase AirLineName"> 
                                                      <?php 
                                                     $ar = explode(" ", $FlightSegment->AirLineName); 
                                                     echo $ar[0];?> | 

                                                     <small><?php echo $FlightSegment->OperatingAirlineCode;?>-<?php echo $FlightSegment->OperatingAirlineFlightNumber;?></small>
                                                       

                                                     </p>
                                                      
                                                      </aside>

                                                     


                                               </div>
                                                    </div>
                                                  
                                                    <hr>
                                               <div class=" col-md-2 col-sm-2 col-xs-2 p-r-0">
                                                 <span class="booking-item-airline-logo">
                                                    <img src="http://webapi.i2space.co.in<?php echo $FlightSegment->ImagePath?>" alt="Image Alternative text" title="Image Title" />
                                                    </span>
                                               </div>
                                                  <div class="booking-item-flight-details col-md-2 col-sm-2 col-xs-2 text-center p-r-0">
                                                        <p class="uppercase"><?php 
                                                        $departdate = substr($FlightSegment->DepartureDateTime, 11,5);
                                                        echo $departdate;?></p>

                                                  </div>
                                                 

                                                   <div class="col-md-3 col-sm-3 col-xs-3 text-center p-r-0 stop">
                                                        <p><?php echo $FlightSegment->Duration;?></p>
                                                        <?php if (count($key->FlightSegments)==1) {
                                                            echo "Non Stop";
                                                        }
                                                        else{
                                                             echo (count($key->FlightSegments)-1)." Stop(s)";
                                                        } ?>
                                                        
                                                    </div>
                                                      <div class="col-md-2 col-sm-2 col-xs-2 text-center p-r-0">
                                                     <p><?php echo substr($FlightSegment->ArrivalDateTime, 11,5);?></p>
                                                   </div>
                                                   <div class="col-md-3 col-sm-3 col-xs-3 text-center p-r-0">
                                                     <h5 class="theme-color-text font-bold price">Rs. <?php
                                                                $key1 = $key->FareDetails;
                                                                $key2 = $key1->FareBreakUp;
                                                                $key3 = $key2->FareAry[0];
                                                                $key4 = $key3->IntTaxDataArray[0];
                                                                // echo number_format($key->FareDetails->TotalFare);
                                                                echo number_format($key->FareDetails->TotalFare);
                                                            ?></h5>
                                                     </div>
                                                  
                                                  
                           </li>
                        </div>
                                       

                                       </form>
                     

                        <?php  
                        $rcount = $rcount+1;
                        } 
                    }?>

                       
                    </ul>
                        </div>
                        <!-- end of return segment -->
                      
                       
                    </div>
  
        </div>
        </div> 
      </form>
         

            <?php  }
             ?>
               


        <!-- end of trip type two -->


              </div>
        </div>
        <div class="clearfix"></div>
      
        
     </section> 
      
      
        
                <!---End Email block--->


       <?php include("footer.php"); ?>
        <!---Earch Modal --->



        <!-- <script src="js/jquery.js"></script> -->
     

       
        <!-- <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>  -->
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
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

    </div>

   <!--  <script>
        $(document).ready(function(){
    $("#formname").on("change", "input:checkbox", function(){
        $("#formname").submit();
    });
});
    </script> -->
    <script>
       function changeprice1000(){
$(document).ready(function(){
    if($("#price1000").is(":checked")){
        
         $(".price").parents('div').parents('li').parents('div.fight-table-list').hide();
          
          $('.price').each( function(  ){
  


  var s = parseInt($(this).text().trim());
  if(s>2500 && s<5000)
          $(this).parents('div').parents('li').parents('div.fight-table-list').show();
});
          
  }
  
  if($("#price1000").is(":not(:checked)")){
  $(".price").parents('li').parents('div.fight-table-list').show();
  }
});
}
    </script>


  <!-- custom radio -->

   <style type="text/css">
                                                        
                                                        .container {

  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

/* Hide the browser's default radio button */
.container input[type=radio] {
  position: absolute;
  opacity: 0;
  cursor: pointer;
}
.checkmark {
  position: absolute;
  top: 0;
  left: 0;
  height: 25px;
  width: 25px;
  background-color: #eee;
  border-radius: 50%;
}

/* On mouse-over, add a grey background color */
.container:hover input ~ .checkmark {
  background-color: #ccc;
}

/* When the radio button is checked, add a blue background */
.container input:checked ~ .checkmark {
  background-color: #F89901;
}

/* Create the indicator (the dot/circle - hidden when not checked) */
.checkmark:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the indicator (dot/circle) when checked */
.container input:checked ~ .checkmark:after {
  display: block;
}

/* Style the indicator (dot/circle) */
.container .checkmark:after {
  top: 9px;
  left: 9px;
  width: 8px;
  height: 8px;
  border-radius: 50%;
  background: white;
}
</style>
  <!-- end custom radio -->
</body>

</html>



<?php  
session_start();

require "init.php";
include("functions.php");
// var_dump($response);
 
$query= "SELECT * FROM `flightdetails` where type='0' ORDER BY City";
  $result=mysqli_query($link,$query) or die("Bad SQL: $query");

   if (mysqli_num_rows($result) > 0) {
                                                                            // output data of each row
        $result->data_seek(0);
        $optdom = "";
    while($row3 = mysqli_fetch_assoc($result)) {  

    $optdom .= '<option value='.$row3["AirportCode"].'>'.$row3["City"]." ".$row3["Country"]. " (".$row3["AirportCode"].')</option>';
}

}


  $query3= "SELECT * FROM `flightdetails` where type='1' ORDER BY City" ;
      $intfdata=mysqli_query($link,$query3) or die("Bad SQL: $query3");
  
  if (mysqli_num_rows($intfdata) > 0) {
                                                                            // output data of each row
        $intfdata->data_seek(0);
        $opt = "";
    while($row3 = mysqli_fetch_assoc($intfdata)) {  

    $opt .= '<option value='.$row3["AirportCode"].'>'.$row3["City"]." ".$row3["Country"]. " (".$row3["AirportCode"].')</option>';
        



  }

}?><!DOCTYPE HTML>
<html>

<head>

    <title>Leading online travel website portal - Flycorpo Travels LLP</title>
    <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
    <meta name="keywords" content="Flycorpo, Flycorpo Travels, Air ticket booking, Flight ticket Booking, Holiday Packages, Hotel booking" />
    <meta name="description" content="Find best deals for Flights, Hotels, Visas, and Holiday Packages at affordable prices. What are you waiting for? Visit us now for great savings and offers!">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- GOOGLE FONTS -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,300,600' rel='stylesheet' type='text/css'>
    <!-- /GOOGLE FONTS -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/font-awesome.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/styles1.css">
    <link rel="stylesheet" href="css/schemes/bright-turquoise.css"/>
     <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />   -->
      <!--      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>   -->
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
                 <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-NF5RWBF');</script>
<!-- End Google Tag Manager -->

    <style>
        #load{
    width:100%;
    height:100%;
    position:fixed;
    z-index:9999;
    background:url("https://www.creditmutuel.fr/cmne/fr/banques/webservices/nswr/images/loading.gif") no-repeat center center rgba(0,0,0,0.25)
}
    </style>
    
    <script>document.onreadystatechange = function () {
  var state = document.readyState
  if (state == 'interactive') {
    //   document.getElementById('global-wrap').style.visibility="hidden";
  } else if (state == 'complete') {
  
         document.getElementById('interactive');
         document.getElementById('load').style.visibility="hidden";
         document.getElementById('global-wrap').style.visibility="visible";
     
  }
}</script>
</head>

<body style="background-color: #f9f9f9;">
    <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NF5RWBF"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
    <!-- /FACEBOOK WIDGET -->
    
    <?php include("header.php"); ?>
    
    <div id="load"></div>
    <div class="global-wrap" id="global-wrap">
       
            <section class="section-content  book-flight" id="book-flight" style="padding-top: 100px; padding-bottom: 130px; ">
                <div class="container">
                    <div class="text-center" style="color: white;" id="alert"></div>    
                <h2 class="text-center" style="color: white; font-weight: bold;">Book Flights, Hotels & Holiday Packages</h2>
                    <div class="search-tabs search-tabs-bg">
                       
                        <div  class="tabbable">
                            <ul class="nav nav-tabs" id="myTvab">
                                 
                                <li class="active"><a href="#tab-1" data-toggle="tab"><span >Domestic Flights</span></a>
                                </li>
                                <li class=""><a href="#tab-2" data-toggle="tab"><span >International Flights</span></a>
                                </li>
                                
                            </ul>
                            <div  class="tab-content parent-tab-content">
                               
                                 
                                <div  class="tab-pane fade in active"  id="tab-1">



                                     <div class="col-md-12 tabbable">
                                                 <div class="form-group">
                                                 <ul class="" id="flightChooseTab">
                                                 
                                             
                                                
                                               
                                                <li  class="active">
                                                
                                                 <a href="#flight-search1-1" data-toggle="tab">
                                                <div class="checkbox">
                                                   <label>
                                                         <input class="i-check booking-form-input" type="radio"  /><span>ROUND TRIP</span></label
                                                        ></div>
                                                         </a>
                                                </li>
                                                   <li >
                                                <a href="#flight-search1-2" data-toggle="tab">
                                                <div class="checkbox">
                                                    <label>
                                                       <input class="i-check booking-form-input " type="radio"  /><span> ONE WAY</span>
                                                    </label>
                                                </div>
                                                </a>
                                                </li>

                                         <!--        <li>
                                                
                                                 <a href="#flight-search1-3" data-toggle="tab">
                                                <div class="checkbox">
                                                   <label>
                                                         <input class="i-check booking-form-input" type="radio"  /><span>MULTIPLE CITY</span></label
                                                        ></div>
                                                         </a>
                                                </li> -->
                                               
                                                
                                            </ul>
                                           </div>
                                            </div>

                                    
                                    
                                        <div class="tabbable">
                                         <div class="tab-content">
                                            <div class="tab-content col-md-12 padding-0">
                                                <div class="tab-pane fade in active col-md-12 padding-0" id="flight-search1-1">
                                                    <div class="row">
                                                      <div class="col-md-12">
                                                      <form action="flight-response.php" method="GET" id="form1">
                                                        <input type="hidden" name="tripType" value="2">
                                                        
                                                                <div class="col-md-2  padding-0">
                                                                    <div class="form-group form-group-lg form-group-icon-left">
                                                                    
                                                                        <label>From:</label>
                                                                        
                                                                        <select  name="fromAddress" data-search="true"  class="form-control " id="fromr"><option value="" >Select</option>
                                                                            <?php echo $optdom;  ?>

                                                                    </select>
                                                                    </div>
                                                                     
                                                                </div>
                                                              
                                                              <div class="col-md-2 padding-0">
                                                                    <div class="form-group form-group-lg form-group-icon-left">
                                                                    
                                                                        <label>To:</label>
                                                                        <!-- <input class=" form-control" id="toAddress" name="toAddress" placeholder="City, Airport, U.S. Zip" type="text" /> -->
                                                                        <select name="toAddress"  class="form-control " id="tor"><option value="">Select</option>
                                                                           <?php echo $optdom;  ?>
                                                                    </select>

                                                                    </div>
                                                                </div>
                                                            
                                                       
                                                            <div class="input-daterange" data-date-format="M d, D">
                                                              
                                                                    <div class="col-md-2    padding-0 ">
                                                                        <div class="form-group form-group-lg form-group-icon-left"><i class="fa fa-calendar input-icon input-icon-highlight"></i>
                                                                            <label>Departure:</label>
                                                                            
                                                                             <input class="date-pick default-cursor   form-control"  data-date-format="dd-mm-yyyy" type="text"   name="startDate" required   readonly="readonly"/>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-2  padding-0 ">
                                                                        <div class="form-group form-group-lg form-group-icon-left"><i class="fa fa-calendar input-icon input-icon-highlight"></i>
                                                                            <label>Return:</label>
                                                                            
                                                                             <input class="date-pick default-cursor readonly form-control"  data-date-format="dd-mm-yyyy" type="text" name="endDate"  required  readonly="readonly"/>

                                                                        </div>
                                                                    </div>
                                                                    
                                                                       </div>
                                                                      
                                                                   
                                                                
                                                            
                                                                
                                                                    <div class="col-md-2  padding-0">
                                       <div class="form-group form-group-lg form-group-icon-left">
                                           <div class=" ncs">
                                           
                                                <label>Passengers:</label>                       
                                            <input  name="NCS" type="text"  placeholder="Passenger(s)" class="full-width traveller NCS" value="1 Adults" readonly required> 

                                                                             
                                                                                                                                                 
                                                                    </div>
                                                                </div>
                                                                </div>
                                                                <div class="col-md-2  padding-0 p-r-0 mb-p-l-0 ml-1">
                                                                <div class="form-group form-group-lg form-group-icon-left">
                                                           <ul class="list-unstyled">
                                                           <li class="dropdown">
                                                            <label>Class:</label>
                                                            <a class="drop1" href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" role="button" aria-expanded="false"> 
                                                              <input id="classvalue" required name="classvalue" type="text" readonly placeholder="Class" value="Economy" class="full-width traveller ">  </a>
                                                              <ul id="classList" class="dropdown-menu">
                                                                    <li data-value="Economy"><a href="#">
                                                                <input type="radio" value="" id="level-4"value="PE"name="class-level" data-price-id="4" style="display:none;">
                                                                <label for="level-3">Economy</label></a>
                                                              </li>
                                                                   <li data-value="Premium Economy"><a href="#">
                                                                <input type="radio" value="" id="level-3"value="PE"name="class-level" data-price-id="3" style="display:none;">
                                                                <label for="level-3">Premium Economy</label></a>
                                                              </li>
                                                                    <li data-value="Business"><a href="#"><input type="radio" value="B" id="level-1" name="class-level" data-price-id="1" style="display:none;"/>
                                                                  <label for="level-1">Business</label></a>
                                                             </li>
                                                              <li data-value="First Class"><a href="#">
                                                                <input type="radio" value="" id="level-2" name="class-level"value="F" data-price-id="2" style="display:none;">
                                                                <label for="level-2">First Class</label></a>
                                                              </li>
                                                                 
                                                            
                                                                </ul>
                                                                </li>
                                                                </ul>
                                                           </div>
                                                           </div>

                                                         </div>
                                                      


                                                        

                                                        </div>
                                                        

                                                        <div class="clearfix"></div>
                                                           
                                                          
                                                        <div class="col-md-1 p-l-0">
                                                       <button class="btn btn-primary btn-lg btn-yellow btn-circle" type="submit"><i class="fa fa-chevron-right fa-2x"></i></button>
                                                       </div>
                                                            </form>    
                                                                
                                                      </div>
                                                        <!--- End round trip--->












                                                        <div class="tab-pane fade  col-md-12 padding-0" id="flight-search1-2">
                                                          <div class="row">
                                                             <form action="flight-response.php" method="GET" id="form2">
                                                        <input type="hidden" name="tripType" value="1">

                                                           <div class="container">
                                                                <div class="col-md-2  padding-0">
                                                                    <div class="form-group form-group-lg form-group-icon-left">
                                                                    
                                                                        <label>From:</label>
                                                                        
                                                                        <select name="fromAddress"  class="form-control " id="from2"><option value="" >Select</option>
                                                                            <?php echo $optdom;  ?>

                                                                    </select>
                                                                    </div>
                                                                     
                                                                </div>
                                                              
                                                              <div class="col-md-2 padding-0">
                                                                    <div class="form-group form-group-lg form-group-icon-left">
                                                                    
                                                                        <label>To:</label>
                                                                        <!-- <input class=" form-control" id="toAddress" name="toAddress" placeholder="City, Airport, U.S. Zip" type="text" /> -->
                                                                        <select name="toAddress"  class="form-control " id="to2"><option value="">Select</option>
                                                                           <?php echo $optdom;  ?>
                                                                    </select>

                                                                    </div>
                                                                </div>
                                                            
                                                       
                                                            <div class="input-daterange" data-date-format="M d, D">
                                                               
                                                                    <div class="col-md-2 padding-0 ">
                                                                        <div class="form-group form-group-lg form-group-icon-left"><i class="fa fa-calendar input-icon input-icon-highlight"></i>
                                                                            <label>Departure:</label>
                                                                            
                                                                             <input class="date-pick default-cursor   form-control"  data-date-format="dd-mm-yyyy" readonly="readonly"  type="text" name="startDate" />
                                                                        </div>
                                                                    </div>
                    
                                                                       </div>
                                                                 
                                                            
                                                                  
                                                                    <div class="col-md-2 padding-0">
                                       <div class="form-group form-group-lg form-group-icon-left">
                                           <div class=" ncs">
                                           
                                                <label>Passengers:</label>                       
                                            <input  name="NCS" type="text"  placeholder="Passenger(s)" class="full-width traveller NCS" value="1 Adults" readonly required>

                                                                             
                                                                                                                                                 
                                                                    </div>
                                                                </div>
                                                                </div>
                                                                <div class="col-md-2  padding-0">
                                                                <div class="form-group form-group-lg form-group-icon-left">
                                                           <ul class="list-unstyled">
                                                           <li class="dropdown">
                                                            <label>Class:</label>
                                                           <select name="classvalue" class=" form-control " id="to">
                                                    <option value="Economy">Economy</option>
                                                      <option value="Premium Economy">Premium Economy</option>

                                                    <option value="Business">Business</option>
                                                    <option value="First Class">First Class</option>                      
                                                  
                                                                    </select>
                                                                </li>
                                                                </ul>
                                                           </div>
                                                           </div>
                                                        </div>


                                                            

                                                        </div>
                                                    

                                                        <div class="clearfix"></div>
                                                           
                                                          
                                                        <div class="col-md-1 p-l-0">
                                                       <button class="btn btn-primary btn-lg btn-yellow btn-circle" type="submit"><i class="fa fa-chevron-right fa-2x"></i></button>
                                                       </div></form>
                                                     
                                                    </div>


                                                    <!-- multicity -->


                                                    <div class="tab-pane fade in  col-md-12 padding-0" id="flight-search1-3">
                                                      <div id="append_here">
                                                    <div class="row">
                                                      <form action="multi_dom_flight_response.php" method="GET">
                                                        <input type="hidden" name="tripType" value="1">
                                                           <div class="col-md-4">
                                                                <div class="col-md-6 padding-0">
                                                                    <div class="form-group form-group-lg form-group-icon-left">
                                                                    
                                                                        <label>From:</label>
                                                                        
                                                                        <select name="fromAddress[]"  class="form-control " id="to"><option value="">Select</option>
                                                                            <?php echo $optdom;  ?>

                                                                    </select>
                                                                    </div>
                                                                     
                                                                </div>
                                                              
                                                              <div class="col-md-6 padding-0">
                                                                    <div class="form-group form-group-lg form-group-icon-left">
                                                                    
                                                                        <label>To:</label>
                                                                      
                                                                        <select name="toAddress[]"  class="form-control " id="to"><option value="">Select</option>
                                                                           <?php echo $optdom;  ?>
                                                                    </select>

                                                                    </div>
                                                                </div>
                                                             </div>
                                                        <div class="col-md-4">
                                                            <div class="input-daterange" data-date-format="M d, D">
                                                                <div class="row">
                                                                    <div class="col-md-6  padding-0 mb-p-l-15 mb-p-r-15">
                                                                        <div class="form-group form-group-lg form-group-icon-left"><i class="fa fa-calendar input-icon input-icon-highlight"></i>
                                                                            <label>Departure:</label>
                                                                            
                                                                             <input class="date-pick default-cursor   form-control"  data-date-format="dd-mm-yyyy" readonly="readonly"  type="text" name="startDate[]" />
                                                                        </div>
                                                                    </div>
                                                                   
                                                                       </div>
                                                                       </div>
                                                                      
                                                                   
                                                                </div>
                                                            

                                                                    <div class="col-md-2 padding-0">
                                       <div class="form-group form-group-lg form-group-icon-left">
                                           <div class=" ncs">
                                           
                                                <label>Passengers:</label>                       
                                            <input  name="NCS" type="text"  placeholder="Passenger(s)" class="full-width traveller" readonly required>

                                                                             
                                                                                                                                                 
                                                                    </div>
                                                                </div>
                                                                </div>
                                                                <div class="col-md-2 adjustable-block p-r-0 mb-p-l-0">
                                                                <div class="form-group form-group-lg form-group-icon-left">
                                                           <ul class="list-unstyled">
                                                           <li class="dropdown">
                                                            <label>Class:</label>
                                                           <select name="classvalue" class=" form-control " id="to">
                                                            <option value="Economy">Economy</option>
                                                      <option value="Premium Economy">Premium Economy</option>

                                                    <option value="Business">Business</option>
                                                    <option value="First Class">First Class</option>   
                                                                    </select>
                                                                </li>
                                                                </ul>
                                                           </div>
                                                           </div>


                                                        

                                                        </div>
                                                      </div>

                                                        <div >
                                                          
                                                          <div class="row">
                                                    
                                                        <input type="hidden" name="tripType" value="1">
                                                           <div class="col-md-4">
                                                                <div class="col-md-6 padding-0">
                                                                    <div class="form-group form-group-lg form-group-icon-left">
                                                                    
                                                                        <label>From:</label>
                                                                        
                                                                        <select name="fromAddress[]"  class="form-control " id="to"><option value="">Select</option>
                                                                            <?php echo $optdom;  ?>

                                                                    </select>
                                                                    </div>
                                                                     
                                                                </div>
                                                              
                                                              <div class="col-md-6 padding-0">
                                                                    <div class="form-group form-group-lg form-group-icon-left">
                                                                    
                                                                        <label>To:</label>
                                                                        
                                                                        <select name="toAddress[]"  class="form-control " id="to"><option value="">Select</option>
                                                                           <?php echo $optdom;  ?>
                                                                    </select>

                                                                    </div>
                                                                </div>
                                                             </div>
                                                        <div class="col-md-4">
                                                            <div class="input-daterange" data-date-format="M d, D">
                                                                <div class="row">
                                                                    <div class="col-md-6  padding-0 mb-p-l-15 mb-p-r-15">
                                                                        <div class="form-group form-group-lg form-group-icon-left"><i class="fa fa-calendar input-icon input-icon-highlight"></i>
                                                                            <label>Departure:</label>
                                                                            
                                                                             <input class="date-pick default-cursor   form-control"  data-date-format="dd-mm-yyyy" readonly="readonly"  type="text" name="startDate[]" />
                                                                        </div>
                                                                    </div>
                                                                  
                                                                       </div>
                                                                       </div>
                                                                      
                                                                   
                                                                </div>
                                                            

                                                                    
                                                                    <div class="col-md-4">
                                                                      <br>
                                                                      <button type="button" name="add" id="add" class="btn btn-success">+ Add Another City</button>
                                                                    </div>

                                                        

                                                        </div>
                                                        </div>

                                                        <div class="clearfix"></div>
                                                           
                                                          
                                                                <div class="col-md-1 p-l-0">
                                                       <button class="btn btn-primary btn-lg btn-yellow btn-circle" type="submit"><i class="fa fa-chevron-right fa-2x"></i></button>
                                                       </div></form>
                                                                
                                                      </div>
                                                    
                                                </div>

                                                <!---End One way--->
                                             
                                                  
                                                                 <div class="clearfix"></div>
                                                           
                                                          
                                                                
                                                                
                                                                
                                                    </div>
                                                </div>
                                                </form>
                                                </div>


                                                <!-- end of tab 1 -->


                              
                              


                                                  <div  class="tab-pane fade in "  id="tab-2">


                                     <div class="col-md-12 tabbable">
                                                 <div class="form-group">
                                                 <label></label>
                                                 <ul class="" id="flightChooseTab">
                                                 
                                                <li  class="active">
                                                      <a href="#flight-search2-1" data-toggle="tab">
                                                <div class="checkbox">
                                                   <label>
                                                         <input class="i-check booking-form-input" type="radio"  /><span>ROUND TRIP</span></label
                                                        ></div>
                                                         </a>
                                               
                                                </li>
                                                
                                               
                                                <li>
                                                     <a href="#flight-search2-2" data-toggle="tab">
                                                <div class="checkbox">
                                                    <label>
                                                       <input class="i-check booking-form-input " type="radio"  /><span> ONE WAY</span>
                                                    </label>
                                                </div>
                                                </a>
                                                
                                               
                                                </li>

                                         <!--        <li>
                                                
                                                 <a href="#flight-search1-3" data-toggle="tab">
                                                <div class="checkbox">
                                                   <label>
                                                         <input class="i-check booking-form-input" type="radio"  /><span>MULTIPLE CITY</span></label
                                                        ></div>
                                                         </a>
                                                </li> -->
                                               
                                                
                                            </ul>
                                           </div>
                                            </div>

                                    
                                    
                                    
                                    
                                        <div class="tabbable">
                                         <div class="tab-content">
                                            <div class="tab-content col-md-12 padding-0">
                                                <div class="tab-pane fade in active col-md-12 padding-0" id="flight-search2-1">
                                                    <div class="row">
                                                    <div class="col-md-12">

                                                        
                                                      <form action="iflight-response.php" method="GET" id="form11">
                                                        <input type="hidden" name="tripType" value="2">
                                                           
                                                                <div class="col-md-2  padding-0">
                                                                    <div class="form-group form-group-lg form-group-icon-left">
                                                                    
                                                                        <label>From</label>
                                                                        
                                                                        <select name="fromAddress"  class="form-control " id="from11"><option value="">Select</option>
                                                                            <?php echo $opt;  ?>

                                                                    </select>
                                                                    </div>
                                                                     
                                                                </div>
                                                              
                                                              <div class="col-md-2 padding-0">
                                                                    <div class="form-group form-group-lg form-group-icon-left">
                                                                    
                                                                        <label>To</label>
                                                                        <!-- <input class=" form-control" id="toAddress" name="toAddress" placeholder="City, Airport, U.S. Zip" type="text" /> -->
                                                                        <select name="toAddress"  class="form-control " id="to11"><option value="">Select</option>
                                                                           <?php echo $opt;  ?>
                                                                    </select>

                                                                    </div>
                                                                </div>
                                                            
                                                        
                                                           
                                                               
                                                                    <div class="col-md-2  padding-0 ">
                                                                        <div class="form-group form-group-lg form-group-icon-left"><i class="fa fa-calendar input-icon input-icon-highlight"></i>
                                                                            <label>Depart</label>
                                                                            
                                                                             <input class="date-pick default-cursor   form-control"  data-date-format="dd-mm-yyyy" type="text" name="startDate" required   readonly="readonly"/>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-2  padding-0 ">
                                                                        <div class="form-group form-group-lg form-group-icon-left"><i class="fa fa-calendar input-icon input-icon-highlight"></i>
                                                                            <label>Return</label>
                                                                            
                                                                             <input class="date-pick default-cursor readonly form-control"  data-date-format="dd-mm-yyyy" type="text" name="endDate"  required  readonly="readonly"/>

                                                                        </div>
                                                                    </div>
                                                                     
                                                                      
                                                                      
                                                                   
                                                               
                                                            
                                                                  
                                                                    <div class="col-md-2  padding-0">
                                       <div class="form-group form-group-lg form-group-icon-left">
                                           <div class=" ncs">
                                           
                                                <label>Passengers</label>                       
                                            <input  name="NCS" type="text"  placeholder="Passenger(s)" class="full-width traveller NCS" value="1 Adults" readonly required> 

                                                                             
                                                                                                                                                 
                                                                    </div>
                                                                </div>
                                                                </div>
                                                                <div class="col-md-2  padding-0">
                                                                <div class="form-group form-group-lg form-group-icon-left">
                                                           <ul class="list-unstyled">
                                                           <li class="dropdown">
                                                            <label>Class</label>
                                                          
                                                              <select name="classvalue" class=" form-control " id="to">
                                                    <option value="Economy">Economy</option>
                                                      <option value="Premium Economy">Premium Economy</option>

                                                    <option value="Business">Business</option>
                                                    <option value="First Class">First Class</option>                      
                                                  
                                                                    </select>
                                                                </li>
                                                                </ul>
                                                           </div>
                                                           </div>
                                                        


                                                        

                                                        </div>
                                                        </div>
                                                        

                                                        <div class="clearfix"></div>
                                                           
                                                          
                                                                <div class="col-md-1 p-l-0">
                                                       <button class="btn btn-primary btn-lg btn-yellow btn-circle" type="submit"><i class="fa fa-chevron-right fa-2x"></i></button>
                                                       </div>
                                                            </form> 
                                                     
                                                                
                                                      </div>
                                                        <!--- End round trip--->












                                                        <div class="tab-pane fade  col-md-12 padding-0" id="flight-search2-2">
                                                          <div class="row"> <form action="iflight-response.php" method="GET" id="form12">
                                                        <input type="hidden" name="tripType" value="1">

                                                           <div class="col-md-12">
                                                                <div class="col-md-2 padding-0">
                                                                    <div class="form-group form-group-lg form-group-icon-left">
                                                                    
                                                                        <label>From</label>
                                                                        
                                                                        <select name="fromAddress"  class="form-control " id="from12"><option value="">Select</option>
                                                                            <?php echo $opt;  ?>

                                                                    </select>
                                                                    </div>
                                                                     
                                                                </div>
                                                              
                                                              <div class="col-md-2  padding-0">
                                                                    <div class="form-group form-group-lg form-group-icon-left">
                                                                    
                                                                        <label>To</label>
                                                                        <!-- <input class=" form-control" id="toAddress" name="toAddress" placeholder="City, Airport, U.S. Zip" type="text" /> -->
                                                                        <select name="toAddress"  class="form-control " id="to12"><option value="DXB">Select</option>
                                                                           <?php echo $opt;  ?>
                                                                    </select>

                                                                    </div>
                                                                </div>
                                                             
                                                        
                                                           
                                                               
                                                                    <div class="col-md-2  padding-0">
                                                                        <div class="form-group form-group-lg form-group-icon-left"><i class="fa fa-calendar input-icon input-icon-highlight"></i>
                                                                            <label>Depart</label>
                                                                            
                                                                             <input class="date-pick default-cursor   form-control"  data-date-format="dd-mm-yyyy" readonly="readonly"  type="text" name="startDate" />
                                                                        </div>
                                                                    </div>
                                                           
                                                                      
                                                                   
                                                             
                                                            
                                                               
                                                                    <div class="col-md-2 padding-0">
                                       <div class="form-group form-group-lg form-group-icon-left">
                                           <div class=" ncs">
                                           
                                                <label>Passengers</label>                       
                                            <input  name="NCS" type="text"  placeholder="Passenger(s)" class="full-width traveller NCS" value="1 Adults" readonly required>

                                                                             
                                                                                                                                                 
                                                                    </div>
                                                                </div>
                                                                </div>
                                                                <div class="col-md-2 padding-0">
                                                                <div class="form-group form-group-lg form-group-icon-left">
                                                           <ul class="list-unstyled">
                                                           <li class="dropdown">
                                                            <label>Class</label>
                                                           <select name="classvalue" class=" form-control " id="to">
                                                     <option value="Economy">Economy</option>
                                                      <option value="Premium Economy">Premium Economy</option>

                                                    <option value="Business">Business</option>
                                                    <option value="First Class">First Class</option>   
                                                                    </select>
                                                                </li>
                                                                </ul>
                                                           </div>
                                                           </div>
                                                        </div>


                                                            

                                                        </div>
                                                    

                                                        <div class="clearfix"></div>
                                                           
                                                          
                                                                <div class="col-md-1 p-l-0">
                                                       <button class="btn btn-primary btn-lg btn-yellow btn-circle" type="submit"><i class="fa fa-chevron-right fa-2x"></i></button>
                                                       </div></form>   
                                                    </div>


                                                    <!-- multicity -->


                                                    <div class="tab-pane fade in  col-md-12 padding-0" id="flight-search2-3">
                                                      <div id="append_here">
                                                    <div class="row">
                                                      <form action="multi_dom_flight_response.php" method="GET">
                                                        <input type="hidden" name="tripType" value="1">
                                                           <div class="col-md-4">
                                                                <div class="col-md-6 padding-0">
                                                                    <div class="form-group form-group-lg form-group-icon-left">
                                                                    
                                                                        <label>From</label>
                                                                        
                                                                        <select name="fromAddress[]"  class="form-control " id="to"><option value="HYD">HYDERABAD, INDIA</option>
                                                                            <?php echo $optdom;  ?>

                                                                    </select>
                                                                    </div>
                                                                     
                                                                </div>
                                                              
                                                              <div class="col-md-6 padding-0">
                                                                    <div class="form-group form-group-lg form-group-icon-left">
                                                                    
                                                                        <label>To</label>
                                                                      
                                                                        <select name="toAddress[]"  class="form-control " id="to"><option value="BLR">BANGLORE, INDIA</option>
                                                                           <?php echo $optdom;  ?>
                                                                    </select>

                                                                    </div>
                                                                </div>
                                                             </div>
                                                        <div class="col-md-4">
                                                            <div class="input-daterange" data-date-format="M d, D">
                                                                <div class="row">
                                                                    <div class="col-md-6  padding-0 mb-p-l-15 mb-p-r-15">
                                                                        <div class="form-group form-group-lg form-group-icon-left"><i class="fa fa-calendar input-icon input-icon-highlight"></i>
                                                                            <label>Depart</label>
                                                                            
                                                                             <input class="date-pick default-cursor   form-control"  data-date-format="dd-mm-yyyy" readonly="readonly"  type="text" name="startDate[]" />
                                                                        </div>
                                                                    </div>
                                                                   
                                                                       </div>
                                                                       </div>
                                                                      
                                                                   
                                                                </div>
                                                            

                                                                    <div class="col-md-2 padding-0">
                                       <div class="form-group form-group-lg form-group-icon-left">
                                           <div class=" ncs">
                                           
                                                <label>Passengers</label>                       
                                            <input  name="NCS" type="text"  placeholder="Passenger(s)" class="full-width traveller" readonly required>

                                                                             
                                                                                                                                                 
                                                                    </div>
                                                                </div>
                                                                </div>
                                                                <div class="col-md-2 adjustable-block p-r-0 mb-p-l-0">
                                                                <div class="form-group form-group-lg form-group-icon-left">
                                                           <ul class="list-unstyled">
                                                           <li class="dropdown">
                                                            <label>Class</label>
                                                           <select name="classvalue" class=" form-control " id="to">
                                                    <option value="Economy">Economy</option>

                                                    <option value="Business">Business</option>
                                                    <option value="First Class">First Class</option>                      
                                                    <option value="Premium Economy">Premium Economy</option>
                                                                    </select>
                                                                </li>
                                                                </ul>
                                                           </div>
                                                           </div>


                                                        

                                                        </div>
                                                      </div>

                                                        <div >
                                                          
                                                          <div class="row">
                                                    
                                                        <input type="hidden" name="tripType" value="1">
                                                           <div class="col-md-4">
                                                                <div class="col-md-6 padding-0">
                                                                    <div class="form-group form-group-lg form-group-icon-left">
                                                                    
                                                                        <label>From</label>
                                                                        
                                                                        <select name="fromAddress[]"  class="form-control " id="to"><option value="">City, Airport, U.S. Zip</option>
                                                                            <?php echo $optdom;  ?>

                                                                    </select>
                                                                    </div>
                                                                     
                                                                </div>
                                                              
                                                              <div class="col-md-6 padding-0">
                                                                    <div class="form-group form-group-lg form-group-icon-left">
                                                                    
                                                                        <label>To</label>
                                                                        
                                                                        <select name="toAddress[]"  class="form-control " id="to"><option value="">City, Airport, U.S. Zip</option>
                                                                           <?php echo $optdom;  ?>
                                                                    </select>

                                                                    </div>
                                                                </div>
                                                             </div>
                                                        <div class="col-md-4">
                                                            <div class="input-daterange" data-date-format="M d, D">
                                                                <div class="row">
                                                                    <div class="col-md-6  padding-0 mb-p-l-15 mb-p-r-15">
                                                                        <div class="form-group form-group-lg form-group-icon-left"><i class="fa fa-calendar input-icon input-icon-highlight"></i>
                                                                            <label>Depart</label>
                                                                            
                                                                             <input class="date-pick default-cursor   form-control"  data-date-format="dd-mm-yyyy" readonly="readonly"  type="text" name="startDate[]" />
                                                                        </div>
                                                                    </div>
                                                                  
                                                                       </div>
                                                                       </div>
                                                                      
                                                                   
                                                                </div>
                                                            

                                                                    
                                                                    <div class="col-md-4">
                                                                      <br>
                                                                      <button type="button" name="add" id="add" class="btn btn-success">+ Add Another City</button>
                                                                    </div>

                                                        

                                                        </div>
                                                        </div>

                                                        <div class="clearfix"></div>
                                                           
                                                          
                                                                <div class="col-md-1 p-l-0">
                                                       <button class="btn btn-primary btn-lg btn-yellow btn-circle" type="submit"><i class="fa fa-chevron-right fa-2x"></i></button>
                                                       </div></form>
                                                                
                                                      </div>
                                                    
                                                </div>

                                                <!---End One way--->
                                             
                                                  
                                                                 <div class="clearfix"></div>
                                                           
                                                          
                                                                
                                                                
                                                                
                                                    </div>
                                                </div>
                                                </form>
                                                </div>
                                                </div>


                                                <!-- end of tab 2 -->
                              


                          </div>
                                             
                                        </div>
                                       
                                    
                            
                                
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
</div>

   <section class="section-content1  popular-cities-blk popular-holyday-spots" style=" background-color:  #e5e5e5;" >
                <div class="container">
                    <div class="row" style=" border-style: solid; border-color: white; border-width: 1px; font-weight: normal; font-size: 15px;">
                    <div class="col-md-12 col-lg-12" style="background-color:#363082; color: white; padding: 8px;text-align: center; ">
                        <i class="fas fa-bullhorn"></i>  Important Info
                    </div>
                    <div class="col-md-12 col-lg-12" id="info-impo">
                        
                     <!--carousels-->
                                         
                              <div class="container">
                        
                        <div class="row " style="text-align: center;">
                            <div id="myCarousel" class="carousel1 slide vertical">
                                <!-- Carousel items -->
                                <div class="carousel-inner">
                                    <div class="active item">
                                      <div style="z-index: -1; padding: 8px;">Upgrade to Business Class - Get Chance for Free Upgrade to Business Class Flights</div>
                                    </div>
                                    <div class="item">
                                     <div style="z-index: -1; padding: 8px;">Upgrade to Business Class - Get Chance for Free Upgrade to Business Class Flights</div>
                                    </div>
                                    <div class="item">
                                       <div style="z-index: -1; padding: 8px;">Upgrade to Business Class - Get Chance for Free Upgrade to Business Class Flights</div>
                                    </div>
                                </div>
                                <!-- Carousel nav -->
                                <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
                                <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
                            </div>
                        </div>
                    </div>
                     <!--end carousel-->
                     
                
                        
                    </div>
                </div>
                </div>

            </div>

                </section>



<section class="popular-cities-blk section-content1" style="padding-top: 20px; background-color:white;" >
                    <div class="container ">
                        <div class="popular-bg-block holyday-spots">
                            <h2 style="color:black;">Popular Destinations</h2>
                            <p style="color:black;">Start your travel planning here</p>

                            
                            <div class="city-category inhternational-city-cate" style="background-color: white; 
                                width: 100%; 
                                padding-left: 7px;
                                padding-right:   7px;
                                border-radius: 7px;  
                                margin-top: 30px;
                                padding-top: 7px;
                                padding-bottom: 7px;

                                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
                                /*opacity: 0.5;*/
                                border: 2px;">
                                
                                <div class="row no-gutters" >
                                    <div class="col-sm-3 col-xs-6 ">
                                        <a class="city-cate-in" href="destinations.php"><figure><img src="img/poplar desinations/goa2.jpg" alt="bangkok image"><figcaption style="color: white;">Goa</figcaption></figure></a>
                                    </div>
                                    <div class="col-sm-3 col-xs-6" href="destinations.php">
                                        <a class="city-cate-in" href="destinations.php"><figure><img src="img/poplar desinations/agra2.jpg" alt="miami image"><figcaption style="color: white;">Agra</figcaption></figure></a>
                                    </div>
                                    <div class="col-sm-3 col-xs-6" href="destinations.php">
                                        <a class="city-cate-in" ><figure><img src="img/poplar desinations/kashmir2.jpg" alt="new-york image"><figcaption style="color: white;">Kashmir</figcaption></figure></a>
                                    </div>  
                                    <div class="col-sm-3 col-xs-6" href="destinations.php">
                                        <a class="city-cate-in" ><figure><img src="img/poplar desinations/kerela2.jpg" alt="brazil image"><figcaption style="color: white;">Kerala</figcaption></figure></a>
                                    </div>
                                </div>
                            </div>
                          <div ><br>  <a href="destinations.php"><small style=" float: right;">VIEW ALL</small></a></div> 
                            





                        </div>
                    </div>
                </section>  



                 <section class=" popular-cities-blk section-content2" style=" margin-bottom:0px;background-color:white;" >
                    <div class="container ">
                        <div class="popular-bg-block holyday-spots">
                            <h2 style="color:black;">Perfect International Holidays</h2>
                            <p style="color:black;">Start your travel planning here</p>
                            
                            
                            <div class="city-category inhternational-city-cate" style="background-color: white; 
                                width: 100%; 
                                padding-left: 7px;
                                padding-right:   7px;
                                border-radius: 7px;  
                                margin-top: 30px;
                                padding-top: 7px;
                                padding-bottom: 7px;

                                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
                                /*opacity: 0.5;*/
                                border: 2px;">
                                <a href="holidaypackage.php">
                                <div class="row" >
                                    <div class="col-sm-3 col-xs-6">
                                        <a class="city-cate-in" href="holidaypackage.php"><figure><img src="img/perfect-international-holidays/bangkok1.jpg" alt="bangkok image"><figcaption style="color: white;">Bangkok</figcaption></figure></a>
                                    </div>
                                    <div class="col-sm-3 col-xs-6">
                                        <a class="city-cate-in" href="holidaypackage.php"><figure><img src="img/perfect-international-holidays/miami1.jpg" alt="miami image"><figcaption style="color: white;">Miami</figcaption></figure></a>
                                    </div>
                                    <div class="col-sm-3 col-xs-6">
                                        <a class="city-cate-in" href="holidaypackage.php"><figure><img src="img/perfect-international-holidays/new-york1.jpg" alt="new-york image"><figcaption style="color: white;">New-york</figcaption></figure></a>
                                    </div>
                                    <div class="col-sm-3 col-xs-6">
                                        <a class="city-cate-in" href="holidaypackage.php"><figure><img src="img/perfect-international-holidays/brazil1.jpg" alt="brazil image"><figcaption style="color: white;">Brazil</figcaption></figure></a>
                                    </div>
                                </div></a>
                            </div><br>
                            <a href="holidaypackage.php"><small style=" float: right;">VIEW ALL</small></a>
                            





                        </div>
                    </div>
                </section>
                
            

        
        
        <section class="popular-cities-blk section-content1" style="padding-top: 40px;  background-color:white;" >
            <div class=" container" style="z-index: 3;">
                
                    <div class="container">
                        <h2 style="font-weight: bolder; color: black;">Popular cities</h2>
                        <p style="font-weight: bolder; color: black;">The most searched cities on FlyCorpo</p>
                        <div class="pop-city-cate box-shadow" style="background-color: white; 
                                width: 100%; 
                                padding:20px;
                                border-radius: 7px;  
                                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
                                border: 2px;">
                            <div class="row">
                                <div class="col-sm-4 col-md-3 col-xs-6 col-lg-3  ">

                                    <div class="city-cate-block "  style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); border-radius: 5px; ">
                                        <a href="#">
                                            <li><figure><img src="img/popular cities/new-delhi.png" alt="image"></figure><figcaption>New Delhi</figcaption></li>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-md-3 col-xs-6 col-lg-3">

                                    <div class="city-cate-block  " style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); border-radius: 5px; ">
                                        <a href="#">
                                            <li><figure><img src="img/popular cities/mumbai.png" alt="image"></figure><figcaption>Mumbai</figcaption></li>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-md-3 col-xs-6 col-lg-3">

<div class="city-cate-block  " style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); border-radius: 5px; ">
    <a href="#">
        <li><figure><img src="img/popular cities/chennai.png" alt="image"></figure><figcaption>Chennai</figcaption></li>
    </a>
</div>
</div>
                                <div class="col-sm-4 col-md-3 col-xs-6 col-lg-3">

                                    <div class="city-cate-block  " style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); border-radius: 5px; ">
                                        <a href="#">
                                            <li><figure><img src="img/popular cities/banglore.png" alt="image"></figure><figcaption>Banglore</figcaption></li>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-md-3 col-xs-6 col-lg-3">

                                    <div class="city-cate-block  " style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); border-radius: 5px; ">
                                        <a href="#">
                                            <li><figure><img src="img/popular cities/agra.png" alt="image"></figure><figcaption>Agra</figcaption></li>
                                        </a>
                                    </div>
                                </div>
        
                                <div class="col-sm-4 col-md-3 col-xs-6 col-lg-3">

                                    <div class="city-cate-block  " style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); border-radius: 5px; ">
                                        <a href="#">
                                            <li><figure><img src="img/popular cities/goa.png" alt="image"></figure><figcaption>Goa</figcaption></li>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-md-3 col-xs-6 col-lg-3">

                                    <div class="city-cate-block  " style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); border-radius: 5px; ">
                                        <a href="#">
                                            <li><figure><img src="img/popular cities/kolkata.png" alt="image"></figure><figcaption>Kolkata</figcaption></li>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-md-3 col-xs-6 col-lg-3">

                                    <div class="city-cate-block  " style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); border-radius: 5px; ">
                                        <a href="#">
                                            <li><figure><img src="img/popular cities/dubai.png" alt="image"></figure><figcaption>Dubai</figcaption></li>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-md-3 col-xs-6 col-lg-3">

                                    <div class="city-cate-block  " style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); border-radius: 5px; ">
                                        <a href="#">
                                            <li><figure><img src="img/popular cities/hyderabad.png" alt="image"></figure><figcaption>Hyderabad</figcaption></li>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-md-3 col-xs-6 col-lg-3">

                                    <div class="city-cate-block  " style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); border-radius: 5px; ">
                                        <a href="#">
                                            <li><figure><img src="img/popular cities/pune.png" alt="image"></figure><figcaption>Pune</figcaption></li>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-md-3 col-xs-6 col-lg-3">

                                    <div class="city-cate-block  " style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); border-radius: 5px; ">
                                        <a href="#">
                                            <li><figure><img src="img/popular cities/Ahmedabad.png" alt="image"></figure><figcaption>Ahmedabad</figcaption></li>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-md-3 col-xs-6 col-lg-3">

                                    <div class="city-cate-block  " style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); border-radius: 5px; ">
                                        <a href="#">
                                            <li><figure><img src="img/popular cities/singapore.png" alt="image"></figure><figcaption>Singapore</figcaption></li>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-md-3 col-xs-6 col-lg-3">

                                    <div class="city-cate-block  " style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); border-radius: 5px; ">
                                        <a href="#">
                                            <li><figure><img src="img/popular cities/jaipur.png" alt="image"></figure><figcaption>Jaipur</figcaption></li>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-md-3 col-xs-6 col-lg-3">

                                    <div class="city-cate-block  " style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); border-radius: 5px; ">
                                        <a href="#">
                                            <li><figure><img src="img/popular cities/lucknow.png" alt="image"></figure><figcaption>Lucknow</figcaption></li>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-md-3 col-xs-6 col-lg-3">

                                    <div class="city-cate-block  " style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); border-radius: 5px; ">
                                        <a href="#">
                                            <li><figure><img src="img/popular cities/kerala.png" alt="image"></figure><figcaption>Kerala</figcaption></li>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-md-3 col-xs-6 col-lg-3">

                                    <div class="city-cate-block  " style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); border-radius: 5px; ">
                                        <a href="#">
                                            <li><figure><img src="img/popular cities/bangkok.png" alt="image"></figure><figcaption>Bangkok</figcaption></li>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            <!---End Popular Cities--->
            
           
        <section class="popular-cities-blk section-content2" style="color: white;background-color:white;">
                    <div class="container fontwhite">
                        <h2 style="color: black;">Why Flycorpo Travels LLP</h2>
                        <div class="more-about">
                            <div class="row">
                                <div class="col-sm-4 ">
                                    <a class="" href="#"><figure><img src="img/flycorp-services/easy booking.png" alt="flights image"><figcaption style="color: black;">Easy booking </figcaption></figure></a>
                                    
                                      </div>
                                <div class="col-sm-4 ">
                                    <a class="" href="#"><figure><img src="img/flycorp-services/best orice.jpg" alt="fare-calender image"><figcaption style="color: black;">Best price guarantee </figcaption></figure></a>
                                    
                                      </div>
                                <div class="col-sm-4 ">
                                    <a class="" href="#"><figure><img src="img/flycorp-services/Easy and secure payment gateway.png" alt="search-the-most-websites image"><figcaption style="color: black;">Payment Gateway</figcaption></figure></a>
                                    
                                      </div>
                                
                            </div>

                            <div class="row">
                                <div class="col-sm-4 ">
                                    <a class="" href="#"><figure><img src="img/flycorp-services/No hidden Charges.jpg" alt="nearby-airport image"><figcaption style="color: black;">No hidden Charges </figcaption></figure></a>
                                    
                                      </div>
                                <div class="col-sm-4 ">
                                    <a class="" href="#"><figure><img src="img/flycorp-services/No Middle man.jpg" alt="fare-calender image"><figcaption style="color: black;">No Middle man </figcaption></figure></a>
                                    
                                      </div>
                                <div class="col-sm-4 ">
                                    <a class="" href="#"><figure><img src="img/flycorp-services/Exclusive Special Offers.jpg" alt="search-the-most-websites image"><figcaption style="color: black;">•Exclusive Special Offers </figcaption></figure></a>
                                    
                                      </div>
                                
                            </div>
                        </div>
                    </div>
                </section>
        <!--- End Services--->
        
        <!--testimonials-->
        <section  class="testimonial">
 <div class="container-fluid">
 <div class="row">
 
 
 <div class="testimonial-heading">
 <h2></h2>
 </div>

 
 
  <div class="container">
  
  <div class="row">
    <div class="col-md-12">
      
        
  
  <div class="row">
    <div class="col-md-12">
      <div class="carousel slide media-carousel" id="abc">
        <div class="carousel-inner">
        
        <!-- /.slide 1 -->
          <div class="item   active">  
        
          <div class="col-md-4 col-sm-12 col-xs-12 ">
         
              <div class="panel panel-default">
            <div class="panel-body">
            <div class="embed-responsive embed-responsive-16by9">
                <iframe width="100%" height="280" src="https://www.youtube.com/embed/isXuI-maFf8" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

 
            </div>
         
          </div>
          
            <div class="panel-footer">
            <div class="panel-footer-txt">
            <p>FLYING BUSINESS CLASS</p>
           
            </div>
            </div>
            </div>
            
         
          </div>
          <div class="col-md-4 col-sm-12 col-xs-12 ">
         
              <div class="panel panel-default">
            <div class="panel-body">
            <div class="embed-responsive embed-responsive-16by9">
                <iframe width="100%" height="280" src="https://www.youtube.com/embed/isXuI-maFf8" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

 
            </div>
         
          </div>
          
            <div class="panel-footer">
            <div class="panel-footer-txt">
            <p>FLYING BUSINESS CLASS</p>
           
            </div>
            </div>
            </div>
            
         
          </div>
            <div class="col-md-4 col-sm-12 col-xs-12 container">
         
              <div class="panel panel-default">
            <div class="panel-body">
            <div class="embed-responsive embed-responsive-16by9">

  <iframe width="100%" height="280" src="https://www.youtube.com/embed/q0B8k3UPZNc" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
         
          </div>
          
            <div class="panel-footer">
            <div class="panel-footer-txt">
            <p>John Doe</p>
           
            </div>
            </div>
            </div>
            
         
          </div>
          
        </div>
          
          
           <!-- /.slide 2 -->
         <div class="item ">  
       <div class="col-md-4 col-sm-12 col-xs-12 ">
         
              <div class="panel panel-default">
            <div class="panel-body">
            <div class="embed-responsive embed-responsive-16by9">
                <iframe width="100%" height="280" src="https://www.youtube.com/embed/isXuI-maFf8" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

 
            </div>
         
          </div>
          
            <div class="panel-footer">
            <div class="panel-footer-txt">
            <p>FLYING BUSINESS CLASS</p>
           
            </div>
            </div>
            </div>
            
         
          </div>
          <div class="col-md-4 col-sm-12 col-xs-12 ">
         
              <div class="panel panel-default">
            <div class="panel-body">
            <div class="embed-responsive embed-responsive-16by9">

  <iframe width="100%" height="280" src="https://www.youtube.com/embed/q0B8k3UPZNc" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
         
          </div>
          
            <div class="panel-footer">
            <div class="panel-footer-txt">
            <p>John Doe</p>
           
            </div>
            </div>
            </div>
            
         
          </div>
            <div class="col-md-4 col-sm-12 col-xs-12 container">
         
              <div class="panel panel-default">
            <div class="panel-body">
            <div class="embed-responsive embed-responsive-16by9">

  <iframe width="100%" height="280" src="https://www.youtube.com/embed/q0B8k3UPZNc" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
         
          </div>
          
            <div class="panel-footer">
            <div class="panel-footer-txt">
            <p>John Doe</p>
           
            </div>
            </div>
            </div>
            
         
          </div>
          
        </div>
          
        </div>
        <a data-slide="prev" href="#abc" class="leftar carousel-control" ><img src="https://lh3.googleusercontent.com/DQV4Kju297pbLw-OxHyBU7Stw0iuaJj7zyyLoz8TQetixBNKPeCY-d5FJkzyA-xUztVRKdgOFIGyNsUSlGLMwskym6FRT6DKFFLN-_CptX_VlFZGmtsnK4xqZwTU9Yxvh2kCxwhatdqbzk_Uky3SGei4QVY-zopEgvKW_S5IC5oTcISYOIM1VjCnYcqJJDrw8RrXTEQj2UrWq0_EO0QMiujCzMH2ZxU68SJT1ioueqCI_pkr9v3PJPiFaeByAf7S3FDcbBzC3J-l5HXNtx70UnMSy_tySicFSPJnhVxsci0D9FE_nYugmc6ZEDhG0HsIN6WpHlxGEoBE8Tlhfo4-hQduEIF2n3yJO-gPBzlLpPkp8WuyWPzAFi64X01yOW6djYLSh3UoWje0pLm8FBUCtp5fjYTBn51iCc3ZP06RMdDaMM9abgQDVpM3GMRZqcYMAST02xq6cp1F3TCfqnUkyCjkZnTdED9Ioi5gIljrWhqgBOqcW9HKrBFHibGfZB109kl_SPJpxCOVlUQZ9tqIRsh1tlru-5G4ngtnXFd_cEq0SGdYxe2fSjSkQxFVbdu_VULBFGNSoL0zjVKmTaza48lTQUfRlq1k-_Zdj8Q=s256-no" class="img-responsive" alt="control"></a>
        <a data-slide="next" href="#abc" class="rightar carousel-control"><img src="https://lh3.googleusercontent.com/TgD9r34yTa_kofhI58_Rmhpnp87dqstYVcX9ygEROSyUlTcc8gBYrQUcJnIKu3yI4B5pXRd0Vecr2sxbxppP7vKHmYkQQ1YkxeTCqXiAkgxSrH-IgRdCHGdP21rwcZkfGb9dZaQ2sBN9ZEw0pf5hZfpS8GNJ4B9IpOOmMeqkQ22IhhvLAHEPwPieAsPUb1T3K8yi4jLbx-BZWtIMlczqft_Ya6oz_72ub2nkkRHr9USmLH_bjTwjjyca7CyFnxwACa3ANGmfTgNkFOrEZeU6zec0JvM2vvg-TqUDXmLGYGjY6-ZnKaaMi4kOl9d7lzyEC688wjZJ7XQzD9Y6dzttnSyiYX3nxUDAWDkRfDtxhZxV9U-uBYB2C72mPYAFEn8mIq-EZlUlQ28UD2epCQTcbdWlDy2hkMvE75ABzTVJu8DNttfPBY2lX1HzZJedpNJ6VPyYvAIRi5MrsKYb6WKDfaD0Mu8CpGE0fbF6p4qXpJCyk-zUdkJjvqJ8ZLHv-OXwyXkH4tTzsDqdJ9xJWopLcuNLjESwHo_iSVad-S7GgEXZWpAlDBHoy8NO3ikPCmi1t9PRlfdk8AgrZBp1g0YPPeM4mfC2MFwWJsiulFM=s256-no" alt="right arrow" class="img-responsive"></a>
      </div>
    </div>
  </div>   
      
      
                                
    </div><!-- /.col-12  end -->
  </div>  <!-- /.ROW end -->
</div>  <!-- /.container end -->
 
 
 
 </div><!-- /. row end -->
 </div><!-- /.container fluid end -->
 
 </section>
 
 <!--end testimonials-->
  <?php  
//  if (isset($_GET['emaildeals'])) {
//      # code...
//     $emaildeals = $_GET['emaildeals'];
    
//      $query = "select * from `newsletter` where email = '$emaildeals'";
//       $result=mysqli_query($link,$query) or die("Bad SQL: $query");

//                             if (mysqli_num_rows($result) > 0) 
//                   {
//                       echo "<h5 class='text-center text-success'>Your Email is Already Registered with us.</h5>";
//                   }
//                   else {
                       
//                          $query = "INSERT INTO `newsletter`(email) VALUES ('$emaildeals')";
//                                       if (mysqli_query($link,$query)) {
//                                           echo "<h4 class='text-center text-success'>We have registered your Email</h4>";
//                                       }
//                                       else {
//                                           echo "<div class='text-center'>Error</div>";
//                                       }

                       
//                   }
    
    
// }
 ?>

<script type="text/javascript">
$(document).ready(function() {
    $("#dealbtn").click(function() {
        var email = $("#emaildeals").val();
        $.ajax({
            type: "GET",
            url: "senddeals.php",
            data: { emaildeals: email }
        }).done(function(data) {
            $("#responsedeals").html(data);
        });
    });
});


</script>

<h4 class='text-center text-success' id="responsedeals"></h4>
    



       
        <section class="travel-deal-blk">
                    <div class="container">
                        <div class="travel-deal-in" style="background-color: #ff9500 ; ">
                            <h4>Like travel deals? Enter your email and we'll send them your way.</h4>
                            <div class="subscription-blk">
                                <!--<form method="get">-->
                                    <div class="mail-blk">
                                        <span class="cust-form"><input type="email" class="form-control email-box" id="emaildeals" placeholder="Email"></span>
                                        <button id="dealbtn" class="btn btn-proceed">SEND ME DEALS</button>
                                    </div>
                                <!--</form>-->
                                <p>Your privacy is important to us, so we'll never spam you or share your info with third parties.<br>Take a look at our privacy policy.</p>
                            </div>
                        </div>
                    </div>
                </section>
                <!---End Email block--->
    <div class="head-block">

        <div class="bg-holder">


    
        
<?php include("footer.php"); ?>

<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
  

        <!-- <script src="js/jquery.js"></script> -->
        
        <script src="js/bootstrap.js"></script>
        <script src="js/slimmenu.js"></script>
        <script src="js/bootstrap-datepicker.js"></script>
        <script src="js/bootstrap-timepicker.js"></script>
      <script src="js/modernizr.js"></script>
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
        <script src="js/numbercategoryselector.js"></script>
        <!--<script>
        jQuery('#submit1').click(function() {
     var fromAddress = jQuery('#fromAddress').val();
     var toAddress = jQuery('#toAddress').val();

     jQuery('#fromAddress').val('toAddress');
     jQuery('#toAddress').val('fromAddress');
});
</script>-->
    </div></div>
    <script>
    $(document).ready(function(){
  $('.dropdown').click(function(e){
    $(this).find('.dropdown-menu').toggleClass('open');
    $($(e.target).find('.down-caret').toggleClass('open-caret'));
    e.preventDefault();
    e.stopPropagation();
    $(document).click(function(){
      $('.dropdown-menu').removeClass('open');
      $('.down-caret').removeClass('open-caret');
    });
  });
});
</script>
<script>
// function swap(){
//  var temp=document.getElementById("fromAddress").value;
//  document.getElementById("fromAddress").value=document.getElementById("toAddress").value;
//  document.getElementById("toAddress").value=temp;
// }
// function swap1(){
//  var temp1=document.getElementById("from_address").value;
//  document.getElementById("from_address").value=document.getElementById("to_address").value;
//  document.getElementById("to_address").value=temp1;
// }
</script>
 <script>

        $("input[name='NCS']").NCS({
      categoryNames: ["Adults", "Children", "Infant"], 
            callback: function (values) {
                console.log(values);
            }
        });

        $(".NCS").attr("value", "New value");
// $(document).ready(function() {

//     var $input = $(".NCS");
//     $input.focus(function() {
//         if($(this).val() == $(this).data('placeholder-text')) { 
//             $(this).val('') 
//         }
//     }).blur(function() {
//         if($(this).val() == '') {
//             $(this).val($(this).data('placeholder-text'));
//         }
//     }).trigger('blur');
// }):

    </script>
    <script>
    $('li').click(function() {
$(':radio[data-price-id="'+$(this).data('level')+'"]').prop('checked', true);

});

    </script>
    <script>
  $("#classList").on("click", "a", function(e){
e.preventDefault();
var $this=$(this).parent();
$this.addClass("select").siblings().removeClass("select");
$("#classvalue").val($this.data("value"));

})
    
</script>



   <script>
  $("#classLis1").on("click", "a", function(e){
e.preventDefault();
var $this=$(this).parent();
$this.addClass("select").siblings().removeClass("select");
$("#classvalue1").val($this.data("value"));

})
    
</script>
<script>
$('.dropdown').on('show.bs.dropdown', function(e){
  $(this).find('.dropdown-menu').first().stop(true, true).show();
});

$('.dropdown').on('hide.bs.dropdown', function(e){
  $(this).find('.dropdown-menu').first().stop(true, true).hide();
});

 $('.date-pick').datepicker({
    
}).on('changeDate', function(e){
    $(this).datepicker('hide');
});
</script>

<style type="text/css">
  .book-flight{
    background-image: url('https://yoplanning.com/wp-content/uploads/2018/10/kora-xian-754924-unsplash.jpg');
    position: relative;
  background-position: center;
  background-size: cover;
  background-repeat: no-repeat;
  
  }


input[readonly].default-cursor {
    cursor: default;
}
</style>




<!-- for multicity -->


 <script>  
 $(document).ready(function(){  
      var i=1;  
      $('#add').click(function(){  
           i++;  
           $('#append_here').append(' <div class="row"> <input type="hidden" name="tripType" value="1"><div class="col-md-4"><div class="col-md-6 padding-0"><div class="form-group form-group-lg form-group-icon-left"><label>From</label><select name="fromAddress[]"  class="form-control " id="to"><option value="">City, Airport, U.S. Zip</option><?php echo $optdom;  ?></select></div></div><div class="col-md-6 padding-0"><div class="form-group form-group-lg form-group-icon-left"><label>To</label> <select name="toAddress[]"  class="form-control " id="to"><option value="">City, Airport, U.S. Zip</option><?php echo $optdom;  ?>
                                                                    </select></div></div></div><div class="col-md-4"><div class="input-daterange" data-date-format="M d, D"><div class="row"><div class="col-md-6  padding-0 mb-p-l-15 mb-p-r-15"><div class="form-group form-group-lg form-group-icon-left"><i class="fa fa-calendar input-icon input-icon-highlight"></i><label>Depart</label><input class="date-pick   form-control"  data-date-format="dd-mm-yyyy" type="text" name="startDate[]" /></div></div></div></div></div></div>');  
      });  
      $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
      });  
     
 });  
 </script>

 <script src="jquery.js"></script> <!-- Set this path correctly -->
<script>
jQuery(function () {
    jQuery(".jtable-c").click(function () {
        alert("asdas");
    });
});



</script>

<style type="text/css">
    .popular-destination{
        margin-top: 160px;
    }
    #bg{
        background-image: url("img/backgrounds/cloudy_sky.jpg");
        /*opacity: 0.5;*/
    }.text-left{
        color: white;

    }
    .header-button{
  background: transparent;
  border-radius: 15px;
  border: solid;
  border-width: 1px;
  color: white;
  padding-left: 40px;
  padding-top: 5px;
  padding-bottom: 5px;
  padding-right:  40px;
  text-align: center;
  text-decoration: none;
  font-size: 16px;
  



    }
    .header-button:hover{
        /*border-width: 2px;*/
        background-color: orange;
    }
    .info {background-color: #2196F3;} /* Blue */
.info:hover {background: #0b7dda;}

h2 {
    font-weight: bold;

}
p
{
    font-size: 15px;
    font-weight: bold;
}


.vert-move{
        /*overflow: initial;*/
    overflow-y: hidden;
}





/*zoom */
.city-cate-in{
          display: inline-block;
  /*margin: 20px;*/
  /*border: 1px solid black;*/
  overflow: hidden; 
}

.city-cate-in img {
  display: block;
  transition: transform 2.6s;   /* smoother zoom */
}
.city-cate-in:hover img {
  transform: scale(1.3);
  transform-origin: 50% 50%;
}


.fontwhite{
    color: black;   
}

@media (max-width: 568px) {
  .firstimg,
  .secondimg,
  .thirdimg,
  .forthimg {
    background-attachment: scroll;
  }
}

.firstimg,
.secondimg,
.thirdimg,
.forthimg {
  position: relative;
  background-position: center;
  background-size: cover;
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-color:#000000;
}
.firstimg {
  background-color: "#00vc99";
}
 
.secondimg {
  background-image: url('img/slider/11.jpg');
  min-height: 400px;
}
 
.thirdimg {
  background-image: url('img/slider/13.jpg');
  min-height: 400px;
}
 
.forthimg {
  background-image: url('img/slider/11.jpg');
  min-height: 100%;
}


#book-flight background-image {
  position:absolute;
  left:0;
  -webkit-transition: opacity 1s ease-in-out;
  -moz-transition: opacity 1s ease-in-out;
  -o-transition: opacity 1s ease-in-out;
  transition: opacity 1s ease-in-out;
}
</style>


<!--background image of book-flight-->

<script>
var images = [
  "img/slider/11.jpg",
  "img/slider/12.jpg",
  "img/slider/13.jpg"
  
 
]
var imageHead = document.getElementById("book-flight");
var i = 0;
document.getElementById("book-flight").style.transition = "opacity 1s ease-in-out";
document.getElementById("book-flight").style.WebkitTransition = "opacity 1s ease-in-out";
document.getElementById("book-flight").style.OTransition = "opacity 1s ease-in-out";
document.getElementById("book-flight").style.transition = "opacity 1s ease-in-out";
setInterval(function() {
      imageHead.style.backgroundImage = "url(" + images[i] + ")";
      
      
      i = i + 1;
      if (i == images.length) {
        i =  0;
      }
}, 6000);



// prevent form from submittion
$('#form1').submit(function() {
    if ($.trim($("#fromr").val()) === "" || $.trim($("#tor").val()) === "") {
        $("#alert").text( "You did not fill out one of the fields");
        return false;
    }else{
        $("#alert").text(" ");
    }
});
$('#form2').submit(function() {
    if ($.trim($("#from2").val()) === "" || $.trim($("#to2").val()) === "") {
        $("#alert").text( "You did not fill out one of the fields");
        return false;
    }else{
        $("#alert").text(" ");
    }
});
$('#form11').submit(function() {
    if ($.trim($("#from11").val()) === "" || $.trim($("#to11").val()) === "") {
        $("#alert").text( "You did not fill out one of the fields");
        return false;
    }else{
        $("#alert").text(" ");
    }
});
$('#form12').submit(function() {
    if ($.trim($("#from12").val()) === "" || $.trim($("#to12").val()) === "") {
         $("#alert").text( "You did not fill out one of the fields");
        return false;
    }else{
        $("#alert").text(" ");
    }
});




// vertical corousel

$('.carousel1').carousel1({
  interval: 3000
})

// end vertical carousel



</script>




<!--style for video testimonails-->



<style>
    .carousel {
  position: relative;
}
.carousel-inner {
  position: relative;
  width: 100%;
  overflow: hidden;
}
.carousel-inner > .item {
  position: relative;
  display: none;
  -webkit-transition: .6s ease-in-out left;
       -o-transition: .6s ease-in-out left;
          transition: .6s ease-in-out left;
}
.carousel-inner > .item > img,
.carousel-inner > .item > a > img {
  line-height: 1;
}
@media all and (transform-3d), (-webkit-transform-3d) {
  .carousel-inner > .item {
    -webkit-transition: -webkit-transform .6s ease-in-out;
         -o-transition:      -o-transform .6s ease-in-out;
            transition:         transform .6s ease-in-out;

    -webkit-backface-visibility: hidden;
            backface-visibility: hidden;
    -webkit-perspective: 1000;
            perspective: 1000;
  }
  .carousel-inner > .item.next,
  .carousel-inner > .item.active.right {
    left: 0;
    -webkit-transform: translate3d(100%, 0, 0);
            transform: translate3d(100%, 0, 0);
  }
  .carousel-inner > .item.prev,
  .carousel-inner > .item.active.left {
    left: 0;
    -webkit-transform: translate3d(-100%, 0, 0);
            transform: translate3d(-100%, 0, 0);
  }
  .carousel-inner > .item.next.left,
  .carousel-inner > .item.prev.right,
  .carousel-inner > .item.active {
    left: 0;
    -webkit-transform: translate3d(0, 0, 0);
            transform: translate3d(0, 0, 0);
  }
}
.carousel-inner > .active,
.carousel-inner > .next,
.carousel-inner > .prev {
  display: block;
}
.carousel-inner > .active {
  left: 0;
}
.carousel-inner > .next,
.carousel-inner > .prev {
  position: absolute;
  top: 0;
  width: 100%;
}
.carousel-inner > .next {
  left: 100%;
}
.carousel-inner > .prev {
  left: -100%;
}
.carousel-inner > .next.left,
.carousel-inner > .prev.right {
  left: 0;
}
.carousel-inner > .active.left {
  left: -100%;
}
.carousel-inner > .active.right {
  left: 100%;
}
    
    
.carousel-control.rightar {
  right: 0;
  left: auto;
  background-image: -webkit-linear-gradient(left, rgba(0, 0, 0, .0001) 0%, rgba(0, 0, 0, .5) 100%);
  background-image:      -o-linear-gradient(left, rgba(0, 0, 0, .0001) 0%, rgba(0, 0, 0, .5) 100%);
  background-image: -webkit-gradient(linear, left top, right top, from(rgba(0, 0, 0, .0001)), to(rgba(0, 0, 0, .5)));
  background-image:    none;
  filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#00000000', endColorstr='#80000000', GradientType=1);
  background-repeat: repeat-x;
}
 /* carousel */
.media-carousel 
{
  margin-bottom: 0;
  padding: 0 40px 30px 40px;
  margin-top: 30px;
}
/* Previous button  */
.media-carousel .carousel-control.left 
{
  left: -12px;
  background-image: none;
  background: none repeat scroll 0 0 #a2ab58;
  border: 4px solid #FFFFFF;
  border-radius: 23px 23px 23px 23px;
  height: 40px;
  width : 40px;
  margin-top: 50px
}

.media-carousel .carousel-control.leftar 
{
     left: 0px !important;
    background-image: none;
    background: none repeat scroll 0 0 transparent;
    border: 4px solid transparent;
    height: 60px;
    width: 60px;
    margin-top: 80px;
}

/* Next button  */
.media-carousel .carousel-control.right 
{
  right: -12px !important;
  background-image: none;
  background: none repeat scroll 0 0 transparent;
  border: 4px solid transparent;
  height: 120px;
  width : 120px;
  margin-top: 80px;
}


.media-carousel .carousel-control.rightar 
{
    right: 0px !important;
    background-image: none;
    background: none repeat scroll 0 0 transparent;
    border: 4px solid transparent;
    height: 60px;
    width: 60px;
    margin-top: 80px;
}


/* Changes the position of the indicators */
.media-carousel .carousel-indicators 
{
  right: 50%;
  top: auto;
  bottom: 0px;
  margin-right: -19px;
}
/* Changes the colour of the indicators */
.media-carousel .carousel-indicators li 
{
  background: #c0c0c0;
}
.media-carousel .carousel-indicators .active 
{
  background: #333333;
}
.media-carousel img
{
  width: 100%;
  height: 100%;
}


.testimonial{
    background-color: #EBEBEB;
    color:#000;
}

.testimonial-heading{
    color:#000;
    text-align:center;
    text-decoration:underline;
}





/* video player code here     */

        

.gal-container{
    padding: 12px;
}
.gal-item{
    overflow: hidden;
    padding: 3px;
}
.gal-item .box{
    height: 350px;
    overflow: hidden;
}
.box img{
    height: 100%;
    width: 100%;
    object-fit:cover;
    -o-object-fit:cover;
}
.gal-item a:focus{
    outline: none;
}
.gal-item a:after{
    content:"\e003";
    font-family: 'Glyphicons Halflings';
    opacity: 0;
    background-color: rgba(0, 0, 0, 0.75);
    position: absolute;
    right: 3px;
    left: 3px;
    top: 3px;
    bottom: 3px;
    text-align: center;
    line-height: 350px;
    font-size: 30px;
    color: #fff;
    -webkit-transition: all 0.5s ease-in-out 0s;
    -moz-transition: all 0.5s ease-in-out 0s;
    transition: all 0.5s ease-in-out 0s;
}
.gal-item a:hover:after{
    opacity: 1;
}
.modal-open .gal-container .modal{
    background-color: rgba(0,0,0,0.4);
}
.modal-open .gal-item .modal-body{
    padding: 0px;
}
.modal-open .gal-item button.close{
    position: absolute;
    width: 30px;
    height: 30px;
    background-color: #000;
    opacity: 1;
    color: #fff;
    z-index: 999;
    right: -12px;
    top: -12px;
    border-radius: 50%;
    font-size: 15px;
    border: 2px solid #fff;
    line-height: 25px;
    -webkit-box-shadow: 0 0 1px 1px rgba(0,0,0,0.35);
    box-shadow: 0 0 1px 1px rgba(0,0,0,0.35);
}
.modal-open .gal-item button.close:focus{
    outline: none;
}
.modal-open .gal-item button.close span{
    position: relative;
    top: -3px;
    font-weight: lighter;
    text-shadow:none;
}
.gal-container .modal-dialogue{
    width: 80%;
}
.gal-container .description{
    position: relative;
    height: 40px;
    top: -40px;
    padding: 10px 25px;
    background-color: rgba(0,0,0,0.5);
    color: #fff;
    text-align: left;
}
.gal-container .description h4{
    margin:0px;
    font-size: 15px;
    font-weight: 300;
    line-height: 20px;
}
.gal-container .modal.fade .modal-dialog {
    -webkit-transform: scale(0.1);
    -moz-transform: scale(0.1);
    -ms-transform: scale(0.1);
    transform: scale(0.1);
    top: 100px;
    opacity: 0;
    -webkit-transition: all 0.3s;
    -moz-transition: all 0.3s;
    transition: all 0.3s;
}

.gal-container .modal.fade.in .modal-dialog {
    -webkit-transform: scale(1);
    -moz-transform: scale(1);
    -ms-transform: scale(1);
    transform: scale(1);
    -webkit-transform: translate3d(0, -100px, 0);
    transform: translate3d(0, -100px, 0);
    opacity: 1;
}
@media (min-width: 768px) {
.gal-container .modal-dialog {
    width: 55%;
    margin: 50 auto;
}
}
@media (max-width: 768px) {
    .gal-container .modal-content{
        height:250px;
    }
}
/* Footer Style */
i.red{
    color:#BC0213;
}
.gal-container{
    padding-top :75px;
    padding-bottom:75px;
}
footer{
    font-family: 'Quicksand', sans-serif;
}
footer a,footer a:hover{
    color: #88C425;
}




/* video player code end */


.test-vid{
    width:100%;
    height:auto;
}


.panel-footer-txt > p{
    letter-spacing:5px;
    color:#fff;
    padding-top:5px;fr
    
}
.panel-footer{
    background-color:#1480D8!important;
}
.panel-footer-txt > p:hover{
    color:#a2ab58;
}


.checked {
    color: orange;
}

</style>
<!--end of video testimonials-->



<!--vertical carousel important info-->

<style>
    
.vertical .carousel-inner {
  height: 100%;
}

.carousel1.vertical .item {
  -webkit-transition: 0.6s ease-in-out top;
     -moz-transition: 0.6s ease-in-out top;
      -ms-transition: 0.6s ease-in-out top;
       -o-transition: 0.6s ease-in-out top;
          transition: 0.6s ease-in-out top;
}

.carousel1.vertical .active {
  top: 0;
}

.carousel1.vertical .next {
  top: 100%;
}

.carousel1.vertical .prev {
  top: -100%;
}

.carousel1.vertical .next.left,
.carousel1.vertical .prev.right {
  top: 0;
}

.carousel1.vertical .active.left {
  top: -100%;
}

.carousel1.vertical .active.right {
  top: 100%;
}

.carousel1.vertical .item {
    left: 0;
} 
    
</style>
<!--end vertical carousel important info-->




</body>

</html>
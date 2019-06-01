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

    <title>Cheap air ticket booking at the lowest airfare - Flycorpo</title>
    <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
    <meta name="keywords" content="Flycorpo, Flycorpo Travels, Air ticket booking, Flight ticket Booking, Holiday Packages, Hotel booking" />
    <meta name="description" content="One stop destination for Domestic and International flight bookings. Book cheap flight tickets at the lowest price guaranteed. Book your flight tickets now!">
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
         <?php  
 if (isset($_GET['emaildeals'])) {
     # code...
    $emaildeals = $_GET['emaildeals'];
    
     $query = "INSERT INTO `newsletter`(email) VALUES ('$emaildeals')";
                   if (mysqli_query($link,$query)) {
                       echo "<div class='text-center'>We have registered your Email</div>";
                   }
                   else {
                       echo "<div class='text-center'>Error</div>";
                   }

}
?>
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


 
 <!--end testimonials-->


    <div class="head-block">

        <div class="bg-holder">


    
        
<?php include("footer.php"); ?>

  

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








</body>

</html>

<?php  
session_start();

?><!DOCTYPE HTML>
<html>

<head>
    
    <title>Flycorpo</title>

    <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
    <meta name="keywords" content="flybuzz" />
    <meta name="description" content="flybuzz">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- GOOGLE FONTS -->
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400italic,400,300,600' rel='stylesheet' type='text/css'>
    <!-- /GOOGLE FONTS -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/font-awesome.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/schemes/bright-turquoise.css"/> </head>
    <link rel="stylesheet" href="css/mystyles.css">
    <script src="js/modernizr.js"></script>
<link rel="stylesheet" href="css/schemes/bright-turquoise.css"/>

<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-NF5RWBF');</script>
<!-- End Google Tag Manager -->

</head>

<body>
    
    <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NF5RWBF"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

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
            
            <!--<div class="mfp-with-anim mfp-hide mfp-dialog mfp-search-dialog" id="search-dialog">
                <h3>Search for Flight</h3>
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
            </div>-->
            
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
                          <div class="checkbox">
                                    <label>
                                        <input class="i-check" type="checkbox" /><span>Economy</span>
                                    </label>
                                </div>
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
                <div class="row">
                    <div class="search-result-header">
                    	<div class="col-md-4 padding-0">
                        	<div class="pull-left">
                                <h3 class="">HYD</h3>
                                <h6 class="uppercase">HYDERABAD</h6>
                            </div>
                        </div>
                        <div class="text-center col-md-4 padding-0">
                        	<h5>Depart Mon,27 Feb 2018</h5>
                        </div>
                        <div class="col-md-4 padding-0">
                        	<div class="pull-right">
                            	<aside>
                                <h3 class="">BOM</h3>
                                <h6 class="uppercase">Mumbai</h6>
                                </aside>
                                <span>
                                <button type="button" class="btn btn-primary uppercase" data-toggle="modal" data-target="#exampleModalLong">
                                 Modify Search</button> 
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
                        <p class="uppercase text-center">MON, Feb26</p>
                        <p class="uppercase text-center">Rs 2,800</p>
                    </div></a>
                    
                	</div>
	
            
            </div>
            <div class="item matrix-list">
                <div class="media-block">
                 	<a href="#">
                	<div class="offer-item">
                        <p class="uppercase text-center">TUE, Feb26</p>
                        <p class="uppercase text-center">Rs 2,800</p>
                    </div></a>
                    
                	</div>
	
            
            </div>
            <div class="item  matrix-list">
                <div class="media-block">
                 	<a href="#">
                	<div class="offer-item">
                        <p class="uppercase text-center">WED, Feb26</p>
                        <p class="uppercase text-center">Rs 2,800</p>
                    </div></a>
                    
                	</div>
	
            
            </div>
            <div class="item  matrix-list">
                <div class="media-block">
                 	<a href="#">
                	<div class="offer-item">
                        <p class="uppercase text-center">THu, Feb26</p>
                        <p class="uppercase text-center">Rs 2,800</p>
                    </div></a>
                    
                	</div>
	
            
            </div>
            <div class="item  matrix-list">
                <div class="media-block">
                 	<a href="#">
                	<div class="offer-item">
                        <p class="uppercase text-center">FRI, Feb26</p>
                        <p class="uppercase text-center">Rs 8,800</p>
                    </div></a>
                    
                	</div>
	
            
            </div>
            <div class="item  matrix-list">
                <div class="media-block">
                 	<a href="#">
                	<div class="offer-item">
                        <p class="uppercase text-center">SAT, Feb26</p>
                        <p class="uppercase text-center">Rs 2,800</p>
                    </div></a>
                    
                	</div>
	
            
            </div>
            <div class="item  matrix-list">
                <div class="media-block">
                 	<a href="#">
                	<div class="offer-item">
                        <p class="uppercase text-center">SUN, Feb26</p>
                        <p class="uppercase text-center">Rs 2,800</p>
                    </div></a>
                    
                	</div>
	
            
            </div>
            <div class="item  matrix-list">
                <div class="media-block">
                 	<a href="#">
                	<div class="offer-item">
                        <p class="uppercase text-center">MON, Feb26</p>
                        <p class="uppercase text-center">Rs 2,800</p>
                    </div></a>
                    
                	</div>
	
            
            </div>
   

        </div>
        <a data-slide="prev" href="#media" class="left carousel-control"><i class="fa fa-angle-left fa-2x"></i></a>
        <a data-slide="next" href="#media" class="right carousel-control"><i class="fa fa-angle-right fa-2x"></i></a>
      </div>
      <div class="clearfix"></div>
                    
                            <div class="booking-item-container">
                                
                                  <div  class="booking-item">
                                    <div>
                                        <div class="list-header">
                                        
                                            <div class="col-md-2 padding-0">Airline</div>
                                            <div class="col-md-1 text-center p-r-0">Depart</div>
                                            <div class="col-md-1 text-center p-r-0">Arrive</div>
                                            <div class="col-md-2 text-center p-r-0">Duration</div>
                                            <div class="col-md-2 text-center p-r-0">Price (Per Adult)</div>
                                            
                                          </ul>
                                        </div>
                                        <div class="clearfix"></div>
                                        
                                       <div class="col-md-12 padding-0">
                                       <ul class="list-inline list-unstyled flight-search-ul">
                                        	<li>
                                        	<div  class="bg-white fight-table-list">
                                        
                                        	<div class="col-lg-2 col-md-2 col-sm-2 col-xs-3 p-r-0">
                                                    <span class="booking-item-airline-logo">
                                                    <img src="img/airline/spicejet-logo.png" alt="Image Alternative text" title="Image Title" />
                                                    </span>
                                                    <aside>
                                                     <p class="uppercase">Spicejet</p>
                                                      <small>SG-468</small>
                                                      </aside>
                                               </div>
                                                  <div class="booking-item-flight-details col-md-1 text-center p-r-0">
                                                        <p class="uppercase">14:45</p>

                                                  </div>
                                                   <div class="col-md-1 text-center p-r-0">
                                                     <p>16:20</p>
                                                   </div>
                                                    <div class="col-md-2 text-center p-r-0">
                                                        <p>01h 35m</p>
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
                        <li>
                                        	<div  class="bg-white fight-table-list">
                                        
                                        	<div class="col-lg-2 col-md-2 col-sm-2 col-xs-3 p-r-0">
                                                    <span class="booking-item-airline-logo">
                                                    <img src="img/airline/indigo-logo.png" alt="Image Alternative text" title="Image Title" />
                                                    </span>
                                                    <aside>
                                                     <p class="uppercase">Spicejet</p>
                                                      <small>SG-468</small>
                                                      </aside>
                                               </div>
                                                  <div class="booking-item-flight-details col-md-1 text-center p-r-0">
                                                        <p class="uppercase">14:45</p>

                                                  </div>
                                                   <div class="col-md-1 text-center p-r-0">
                                                     <p>16:20</p>
                                                   </div>
                                                    <div class="col-md-2 text-center p-r-0">
                                                        <p>01h 35m</p>
                                                        <small>Non Stop</small>
                                                	</div>
                                                    <div class="col-md-2 text-center p-r-0">
                                                     <h5 class="theme-color-text font-bold">Rs. 4,793</h5>
                                                     </div>
                                                     <div class="col-md-2 text-center p-r-0">
                                                     <span class="uppercase bolded" data-toggle="modal" data-target="#booking-item-details-view1">Flight Details</span>
                                                     
                                                     </div>
                                                     <div class="col-md-2 text-center">
                                                      	<a class="btn btn-primary small-btn " href="">Book Now</a>
                                                     </div>
                                          
                        
                        </div>
                        </li>
                        <li>
                                        	<div  class="bg-white fight-table-list">
                                        
                                        	<div class="col-lg-2 col-md-2 col-sm-2 col-xs-3 p-r-0">
                                                    <span class="booking-item-airline-logo">
                                                    <img src="img/airline/air-asia-logo.png" alt="Image Alternative text" title="Image Title" />
                                                    </span>
                                                    <aside>
                                                     <p class="uppercase">Spicejet</p>
                                                      <small>SG-468</small>
                                                      </aside>
                                               </div>
                                                  <div class="booking-item-flight-details col-md-1 text-center p-r-0">
                                                        <p class="uppercase">14:45</p>

                                                  </div>
                                                   <div class="col-md-1 text-center p-r-0">
                                                     <p>16:20</p>
                                                   </div>
                                                    <div class="col-md-2 text-center p-r-0">
                                                        <p>01h 35m</p>
                                                        <small>Non Stop</small>
                                                	</div>
                                                    <div class="col-md-2 text-center p-r-0">
                                                     <h5 class="theme-color-text font-bold">Rs. 4,793</h5>
                                                     </div>
                                                     <div class="col-md-2 text-center p-r-0">
                                                     <span class="uppercase bolded" data-toggle="modal" data-target="#booking-item-details-view2">Flight Details</span>
                                                     
                                                     </div>
                                                     <div class="col-md-2 text-center">
                                                      	<a class="btn btn-primary small-btn " href="">Book Now</a>
                                                     </div>
                                          
                        
                        </div>
                        </li>
                        <li>
                                        	<div  class="bg-white fight-table-list">
                                        
                                        	<div class="col-lg-2 col-md-2 col-sm-2 col-xs-3 p-r-0">
                                                    <span class="booking-item-airline-logo">
                                                    <img src="img/airline/jetairways-logo.png" alt="Image Alternative text" title="Image Title" />
                                                    </span>
                                                    <aside>
                                                     <p class="uppercase">Spicejet</p>
                                                      <small>SG-468</small>
                                                      </aside>
                                               </div>
                                                  <div class="booking-item-flight-details col-md-1 text-center p-r-0">
                                                        <p class="uppercase">14:45</p>

                                                  </div>
                                                   <div class="col-md-1 text-center p-r-0">
                                                     <p>16:20</p>
                                                   </div>
                                                    <div class="col-md-2 text-center p-r-0">
                                                        <p>01h 35m</p>
                                                        <small>Non Stop</small>
                                                	</div>
                                                    <div class="col-md-2 text-center p-r-0">
                                                     <h5 class="theme-color-text font-bold">Rs. 4,793</h5>
                                                     </div>
                                                     <div class="col-md-2 text-center p-r-0">
                                                     <span class="uppercase bolded" data-toggle="modal" data-target="#booking-item-details-view3">Flight Details</span>
                                                     
                                                     </div>
                                                     <div class="col-md-2 text-center">
                                                      	<a class="btn btn-primary small-btn " href="checkout.html">Book Now</a>
                                                     </div>
                                          
                        
                        </div>
                        </li>
                        <li>
                                        	<div  class="bg-white fight-table-list">
                                        
                                        	<div class="col-lg-2 col-md-2 col-sm-2 col-xs-3 p-r-0">
                                                    <span class="booking-item-airline-logo">
                                                    <img src="img/airline/airindia-logo.png" alt="Image Alternative text" title="Image Title" />
                                                    </span>
                                                    <aside>
                                                     <p class="uppercase">Spicejet</p>
                                                      <small>SG-468</small>
                                                      </aside>
                                               </div>
                                                  <div class="booking-item-flight-details col-md-1 text-center p-r-0">
                                                        <p class="uppercase">14:45</p>

                                                  </div>
                                                   <div class="col-md-1 text-center p-r-0">
                                                     <p>16:20</p>
                                                   </div>
                                                    <div class="col-md-2 text-center p-r-0">
                                                        <p>01h 35m</p>
                                                        <small>Non Stop</small>
                                                	</div>
                                                    <div class="col-md-2 text-center p-r-0">
                                                     <h5 class="theme-color-text font-bold">Rs. 4,793</h5>
                                                     </div>
                                                     <div class="col-md-2 text-center p-r-0">
                                                     <span class="uppercase bolded" data-toggle="modal" data-target="#booking-item-details-view4">Flight Details</span>
                                                     
                                                     </div>
                                                     <div class="col-md-2 text-center">
                                                      	<a class="btn btn-primary small-btn " href="">Book Now</a>
                                                     </div>
                                          
                        
                        </div>
                        </li>
                        <li>
                                        	<div  class="bg-white fight-table-list">
                                        
                                        	<div class="col-lg-2 col-md-2 col-sm-2 col-xs-3 p-r-0">
                                                    <span class="booking-item-airline-logo">
                                                    <img src="img/airline/indigo-logo.png" alt="Image Alternative text" title="Image Title" />
                                                    </span>
                                                    <aside>
                                                     <p class="uppercase">Spicejet</p>
                                                      <small>SG-468</small>
                                                      </aside>
                                               </div>
                                                  <div class="booking-item-flight-details col-md-1 text-center p-r-0">
                                                        <p class="uppercase">14:45</p>

                                                  </div>
                                                   <div class="col-md-1 text-center p-r-0">
                                                     <p>16:20</p>
                                                   </div>
                                                    <div class="col-md-2 text-center p-r-0">
                                                        <p>01h 35m</p>
                                                        <small>Non Stop</small>
                                                	</div>
                                                    <div class="col-md-2 text-center p-r-0">
                                                     <h5 class="theme-color-text font-bold">Rs. 4,793</h5>
                                                     </div>
                                                     <div class="col-md-2 text-center p-r-0">
                                                     <span class="uppercase bolded" data-toggle="modal" data-target="#booking-item-details-view5">Flight Details</span>
                                                     
                                                     </div>
                                                     <div class="col-md-2 text-center">
                                                      	<a class="btn btn-primary small-btn " href="">Book Now</a>
                                                     </div>
                                          
                        
                        </div>
                        </li>
                        <li>
                                        	<div  class="bg-white fight-table-list">
                                        
                                        	<div class="col-lg-2 col-md-2 col-sm-2 col-xs-3 p-r-0">
                                                    <span class="booking-item-airline-logo">
                                                    <img src="img/airline/airindia-logo.png" alt="Image Alternative text" title="Image Title" />
                                                    </span>
                                                    <aside>
                                                     <p class="uppercase">Spicejet</p>
                                                      <small>SG-468</small>
                                                      </aside>
                                               </div>
                                                  <div class="booking-item-flight-details col-md-1 text-center p-r-0">
                                                        <p class="uppercase">14:45</p>

                                                  </div>
                                                   <div class="col-md-1 text-center p-r-0">
                                                     <p>16:20</p>
                                                   </div>
                                                    <div class="col-md-2 text-center p-r-0">
                                                        <p>01h 35m</p>
                                                        <small>Non Stop</small>
                                                	</div>
                                                    <div class="col-md-2 text-center p-r-0">
                                                     <h5 class="theme-color-text font-bold">Rs. 4,793</h5>
                                                     </div>
                                                     <div class="col-md-2 text-center p-r-0">
                                                     <span class="uppercase bolded" data-toggle="modal" data-target="#booking-item-details-view5">Flight Details</span>
                                                     
                                                     </div>
                                                     <div class="col-md-2 text-center">
                                                      	<a class="btn btn-primary small-btn " href="">Book Now</a>
                                                     </div>
                                          
                        
                        </div>
                        </li>
                        <li>
                                        	<div  class="bg-white fight-table-list">
                                        
                                        	<div class="col-lg-2 col-md-2 col-sm-2 col-xs-3 p-r-0">
                                                    <span class="booking-item-airline-logo">
                                                    <img src="img/airline/spicejet-logo.png" alt="Image Alternative text" title="Image Title" />
                                                    </span>
                                                    <aside>
                                                     <p class="uppercase">Spicejet</p>
                                                      <small>SG-468</small>
                                                      </aside>
                                               </div>
                                                  <div class="booking-item-flight-details col-md-1 text-center p-r-0">
                                                        <p class="uppercase">14:45</p>

                                                  </div>
                                                   <div class="col-md-1 text-center p-r-0">
                                                     <p>16:20</p>
                                                   </div>
                                                    <div class="col-md-2 text-center p-r-0">
                                                        <p>01h 35m</p>
                                                        <small>Non Stop</small>
                                                	</div>
                                                    <div class="col-md-2 text-center p-r-0">
                                                     <h5 class="theme-color-text font-bold">Rs. 4,793</h5>
                                                     </div>
                                                     <div class="col-md-2 text-center p-r-0">
                                                     <span class="uppercase bolded" data-toggle="modal" data-target="#booking-item-details-view5">Flight Details</span>
                                                     
                                                     </div>
                                                     <div class="col-md-2 text-center">
                                                      	<a class="btn btn-primary small-btn " href="">Book Now</a>
                                                     </div>
                                          
                        
                        </div>
                        </li>
                        <li>
                                        	<div  class="bg-white fight-table-list">
                                        
                                        	<div class="col-lg-2 col-md-2 col-sm-2 col-xs-3 p-r-0">
                                                    <span class="booking-item-airline-logo">
                                                    <img src="img/airline/air-asia-logo.png" alt="Image Alternative text" title="Image Title" />
                                                    </span>
                                                    <aside>
                                                     <p class="uppercase">Spicejet</p>
                                                      <small>SG-468</small>
                                                      </aside>
                                               </div>
                                                  <div class="booking-item-flight-details col-md-1 text-center p-r-0">
                                                        <p class="uppercase">14:45</p>

                                                  </div>
                                                   <div class="col-md-1 text-center p-r-0">
                                                     <p>16:20</p>
                                                   </div>
                                                    <div class="col-md-2 text-center p-r-0">
                                                        <p>01h 35m</p>
                                                        <small>Non Stop</small>
                                                	</div>
                                                    <div class="col-md-2 text-center p-r-0">
                                                     <h5 class="theme-color-text font-bold">Rs. 4,793</h5>
                                                     </div>
                                                     <div class="col-md-2 text-center p-r-0">
                                                     <span class="uppercase bolded" data-toggle="modal" data-target="#booking-item-details-view5">Flight Details</span>
                                                     
                                                     </div>
                                                     <div class="col-md-2 text-center">
                                                      	<a class="btn btn-primary small-btn " href="">Book Now</a>
                                                     </div>
                                          
                        
                        </div>
                        </li>
                    </ul>
                        </div>
                      
                       
                        
                    
                    </div>
  
        </div>
        </div> 
        </div>
        </div>
        <div class="clearfix"></div>
        <div class="container">
                            	<div class="row">
                                        <div class="col-md-12 p-r-0">
                                            <div class="offer-block">
                                                 <div class="col-sm-2"><img class="offer-flight" src="img/bg/flite_white.png" alt="flite image"></div>
                                                <div class="col-sm-3">
                                                    <ul class="offer-list">
                                                        <li class=""><a href="#">- 100% GST Compliance</a></li>
                                                        <li class=""><a href="#">- Free Cancellations & Loyalty Benefits</a></li>
                                                        <li class=""><a href="#">- Do It Yourself(DIY) Platform on Apps & Desktop</a></li>
                                                        <li class=""><a href="#">- Customised Travel Policies & Approvals</a></li>
                                                        <li class=""><a href="#">- Customised Travel Policies & Approvals</a></li>
                                                        <li class=""><a href="#">LEARN MORE</a></li>
                                                    </ul>
                                                </div>
                                                <div class="col-sm-7">
                                                    <div class="subscription-blk">
                                                        <h3>Get Started Here</h3>
                                                        <form method="post">
                                                            <span class="cust-form"><input type="email" class="form-control email-box" placeholder="Email ID"></span>
                                                            <span class="cust-form"><input type="text" class="form-control email-box" placeholder="Mobile Number"></span>
                                                            <button type="button" class="btn btn-proceed">PROCEED</button>
                                                        </form>
                                                    </div>
                                          			
                                                </div>
                                            </div>
                                      </div> 
                                 </div> 
							</div>
        
     </section> 
      
      
        <section class="services-block popular-cities-blk">
					<div class="container">
						<h2>A little bit more about FlyCorpo services</h2>
						<div class="more-about">
							<div class="row">
								<div class="col-sm-3">
									<a class="" href="#"><figure><img src="img/flycorp-services/flights.png" alt"flights image"><figcaption>Flight + Hotel Packages</figcaption></figure></a>
									<p>We search FlyCorpo, Orbitz and others for packages that can save you even more.</p>
								</div>
								<div class="col-sm-3">
									<a class="" href="#"><figure><img src="img/flycorp-services/fare-calender.png" alt"fare-calender image"><figcaption>Fare Calendars</figcaption></figure></a>
									<p>Fare Calendars show the best prices over the next 180 days on 2000+ routes.</p>
								</div>
								<div class="col-sm-3">
									<a class="" href="#"><figure><img src="img/flycorp-services/search-the-most-websites.png" alt"search-the-most-websites image"><figcaption>Search the Most Sites</figcaption></figure></a>
									<p>We search 500+ sites to find you the cheapest flights.</p>
								</div>
								<div class="col-sm-3">
									<a class="" href="#"><figure><img src="img/flycorp-services/nearby-airport.png" alt"nearby-airport image"><figcaption>Nearby Airport Savings</figcaption></figure></a>
									<p>If it's cheaper to travel to/from a nearby airport, we'll alert you.</p>
								</div>
							</div>
						</div>
					</div>
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


        <footer>
					<div class="upper-footer-blk">
						<div class="container">
							<div class="row">
								<div class="col-sm-9">
									<div class="row">
										<div class="col-sm-2">
											<h5>Corporate</h5>
											<ul>
			                  <li><a href="#">Investor Information</a></li>
			                  <li><a href="#">About FlyCorpo</a></li>
			                  <li><a href="#">Careers</a></li>
			                </ul>
										</div>
										<div class="col-sm-2">
											<h5>Legal</h5>
											<ul>
			                  <li><a href="#">Terms & Conditions</a></li>
			                  <li><a href="#">Policies</a></li>
			                  <li><a href="#">Disclaimer</a></li>
			                </ul>
										</div>
										<div class="col-sm-2">
											<h5>Media Center</h5>
											<ul>
			                  <li><a href="#">Press Releases</a></li>
			                  <li><a href="#">Media Contacts</a></li>
			                </ul>
										</div>
										<div class="col-sm-2">
											<h5>Support</h5>
											<ul>
												<li><a href="#">Contact Us</a></li>
												<li><a href="#">FAQs</a></li>
												<li><a href="#">Special Assistance</a></li>
												<li><a href="#">Feedback</a></li>
											</ul>
										</div>
										<div class="col-sm-2">
											<h5>Others</h5>
											<ul>
												<li><a href="#">Optional Charges</a></li>
												<li><a href="#">Explore</a></li>
												<li><a href="#">Subscribe for Offers</a></li>
												<li><a href="#">Fare Sheets</a></li>
												<li><a href="#">Sitemap</a></li>
											</ul>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
										<div class="payment-options">
											<a href="#"><img src="img/footer/payments-gateways/mastercard.png" alt="mastercard icon"></a>
											<a href="#"><img src="img/footer/payments-gateways/visa.png" alt="visa icon"></a>
											<a href="#"><img src="img/footer/payments-gateways/paypal.png" alt="paypal icon"></a>
										</div>
										<div class="payment-options">
											<a href="#"><img src="img/footer/payments-gateways/american-express.png" alt="american-express icon"></a>
											<a href="#"><img src="img/footer/payments-gateways/mastero.png" alt="mastero icon"></a>
											<a href="#"><img src="img/footer/payments-gateways/google-wallets.png" alt="google-wallets icon"></a>
										</div>
								</div>
							</div>
						</div>
					</div>
					<div class="middle-footer-blk">
						<div class="container">
							<div class="middle-footer-in">
								<div class="row">
									<div class="col-sm-2">
										<a href="#"><img src="img/footer/footer_logo.png" alt="footer logo"></a>
									</div>
									<div class="col-sm-2">
										<a href="#"><span><img src="img/footer/mail.png" alt="mail icon"></span>
											<aside>
												<h5>Email</h5>
												<small>nfo@flycorpo.com</small>
											</aside>
										</a>
									</div>
									<div class="col-sm-2">
										<a href="#"><span><img src="img/footer/phone.png" alt="phone icon"></span>
											<aside>
												<h5>Phone</h5>
												<small>040-42703020<br>040-42703021</small>
											</aside>
										</a>
									</div>
									<div class="col-sm-4">
										<a href="#"><span><img src="img/footer/location.png" alt="location icon"></span>
											<aside>
												<h5>Location</h5>
												<small>Location Door No.1-96/4, Above Hyderabad Hosts,<br>Madhapur Main Road, Hyderabad-81.</small>
											</aside>
										</a>
									</div>
									<div class="col-sm-2">
										<h5>Connect with us</h5>
										<ul class="social-media">
			                <li><a href="#" target="_blank"><img src="img/footer/connect-with-us/facebook.jpg" alt="facebook"></a></li>
											<li><a href="#" target="_blank"><img src="img/footer/connect-with-us/twitter.jpg" alt="twitter"></a></li>
			                <li><a href="#" target="_blank"><img src="img/footer/connect-with-us/google_pluse.jpg" alt="google_pluse"></a></li>
			                <li><a href="#" target="_blank"><img src="img/footer/connect-with-us/linkedin.jpg" alt="linkedin"></a></li>
			                <li><a href="#" target="_blank"><img src="img/footer/connect-with-us/youtube.jpg" alt="youtube"></a></li>
			              </ul>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="lower-footer-blk">
						<div class="container">
							<span class="foot-text">&copy;2018 Flycorpo.com. All Rights reserved</span>
							<span class="foot-text text-right">Designed and Developed By<img src="img/footer/powerd_by_logo.png" alt="powerd logo"></span>
						</div>
					</div>
				</footer>
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



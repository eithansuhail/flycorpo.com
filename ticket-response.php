<?php  
session_start();
require "init.php";
include("functions.php");
 include('Crypto.php');



?>


<!DOCTYPE HTML>
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

          <?php

  error_reporting(0);
  
  $workingKey='272DFAE6BD7E603A39DC924EA32E33BC';   //Working Key should be provided here.
  $encResponse=$_POST["encResp"];     //This is the response sent by the CCAvenue Server
  $rcvdString=decrypt($encResponse,$workingKey);    //Crypto Decryption used as per the specified working key.
  $order_status="";
  $decryptValues=explode('&', $rcvdString);
  $dataSize=sizeof($decryptValues);
  echo "<center>";

  for($i = 0; $i < $dataSize; $i++) 
  {
    $information=explode('=',$decryptValues[$i]);
    if($i==3) $order_status=$information[1];
  }

  if($order_status==="Success")
  {
    echo "<br>Thank you for shopping with us. Your credit card has been charged and your transaction is successful. You will redirect to website in 2 seconds.";


$allAirports = curl("http://webapi.i2space.co.in/Flights/BookFlightTicket?referenceNo=".$_SESSION['ReferenceNo'], [], "application/json", false, [
    "ConsumerKey: 816EDF7E056EB6E0D84B997CAB3F000C4ABE2FC7",
    "ConsumerSecret: 0EC008F43044CADBA7D71D50CCBC6948F756799F",
        "Accept-Encoding:gzip, deflate",
]);
    $o = gzdecode($allAirports);

$obj = json_decode($o);


  // header('Refresh: 2; URL=http://yoursite.com/page.php');    
  }
  else if($order_status==="Aborted")
  {
    echo "<br>Thank you for shopping with us.We will keep you posted regarding the status of your order through e-mail";
  
  }
  else if($order_status==="Failure")
  {
    echo "<br>Thank you for shopping with us.However,the transaction has been declined.";
  }
  else
  {
    echo "<br>Security Error. Illegal access detected";
  
  }

  echo "<br><br>";

  echo "<table cellspacing=4 cellpadding=4>";
  for($i = 0; $i < $dataSize; $i++) 
  {
    $information=explode('=',$decryptValues[$i]);
        echo '<tr><td>'.$information[0].'</td><td>'.urldecode($information[1]).'</td></tr>';
  }

  echo "</table><br>";
  echo "</center>";
?>

            
            <div class="row">
                
                
                
                          
                    
     <?php  
     if (!empty($obj->ReferenceNo)) {

      $trackid = $_SESSION['trackid'] ;
      $tid=$_SESSION['tid'];
      $ReferenceNo= $obj->ReferenceNo;
      $GDFPNRNo= $obj->GDFPNRNo;
      $TransactionId= $obj->TransactionId;
      $Message= $obj->Message;
      $EticketNo= $obj->EticketNo;

    $query = "update `bookedflight` set ReferenceNo = '$ReferenceNo',GDFPNRNo = '$GDFPNRNo',TransactionId = '$TransactionId',Message = '$Message',EticketNo = '$EticketNo' where id ='$tid'"; 
            
                  if (mysqli_query($link,$query)) {
                    
                      // $condition=1;
                    $flag = 1;

                  } else { 
                                              echo $link->error;
                                              }

  ?>
  <div class="container">

      <h4 class="text-center">Flight has been booked.</h4><br>
    <p class="text-left">ReferenceNo : <?php echo $obj->ReferenceNo;?></p>
        <p class="text-left">GDFPNRNo : <?php echo $obj->GDFPNRNo;?></p>
        <p class="text-left">TransactionId : <?php echo $obj->TransactionId;?></p>
        <p class="text-left">Message : <?php echo $obj->Message;?></p>
        <p class="text-left">EticketNo : <?php echo $obj->EticketNo;?></p>
    <!--     <div class="row">
      
      <div class="col-md-4"><h5 class="text-center">ReferenceNo : <?php echo $obj->ReferenceNo;?></h5></div>
      
      <div class="col-md-4">
        

    <h5 class="text-center">GDFPNRNo : <?php echo $obj->GDFPNRNo;?></h5>
      </div>
      <div class="col-md-4">
    <h5 class="text-center">TransactionId : <?php echo $obj->TransactionId;?></h5>
        
      </div>
    </div>

    <div class="row col-md-12">
      <div class="col-md-6">
    <h5 class="text-center">Message : <?php echo $obj->Message;?></h5>
        
      </div>
      <div class="col-md-6">
    <h5 class="text-center">EticketNo : <?php echo $obj->EticketNo;?></h5>
        
      </div>
    </div>
     -->
  </div>


  <section class="container " style=" box-shadow: 2px 2px 2px 2px #8888; border-radius: 10px; margin-bottom: 30px;">
    
    <div class="booking-item-container container">
    <div class="text-center"><h3>Tickets</h3></div>
                                
                                  <div  class="booking-item">
                                    <div>
                                        <div class="list-header col-md-12">
                                        
                                            <div class="col-md-2 padding-0">EticketNo</div>
                                            <div class="col-md-2 text-center p-r-0">TicketId</div>
                                            <!-- <div class="col-md-1 text-center p-r-0">FlightuId</div> -->
                                            <div class="col-md-2 text-center p-r-0">PassuId</div>
                                            <div class="col-md-3 text-center p-r-0">Name</div>
                                            <div class="col-md-2 text-center p-r-0">TripType</div>
                                            
                                            
                                         
                                        </div>
                                        <div class="clearfix"></div>
                                        
                                       <div class="col-md-12 padding-0">
                                       <ul class="list-inline list-unstyled flight-search-ul">

                                            <?php  
                                           include("functions.php");

                                           foreach ($obj->Tickets as $ticket) {

                                            $TicketId=  $ticket->TicketId;
                                            $PassuId=  $ticket->PassuId;
                                            $TripType=  $ticket->TripType;
                                            $EticketNo=  $ticket->EticketNo;
                                              # code...
                                            $query = "update `passengers_table` set TicketId = '$TicketId',PassuId = '$PassuId',TripType = '$TripType',EticketNo = '$EticketNo' where tid ='$tid'"; 
            
                                          if (mysqli_query($link,$query)) {
                                            
                                              // $condition=1;
                                            $flag = 1;

                                          }else { 
                                              echo $link->error;
                                              }
                                             ?>

                                                  
                                   
                                          <li>
                                          <div  class="bg-white fight-table-list">
                                        
                                          <div class="col-lg-2 col-md-2 col-sm-2 col-xs-3 p-r-0">
                                                    
                                                    
                                                     <p class="uppercase"><?php echo $ticket->EticketNo;?></p>
                                                     
                                                      </aside>
                                               </div>
                                                  <div class="booking-item-flight-details col-md-2 text-center p-r-0">
                                                        <p class="uppercase"><?php echo
                                                        $ticket->TicketId;?></p>

                                                  </div>
                                                   <div class="col-md-2 text-center p-r-0">
                                                     <p><?php echo $ticket->PassuId;?></p>
                                                   </div>
                                                    <div class="col-md-3 text-center p-r-0">
                                                        <p><?php echo $ticket->NameReference;?></p>
                                                       
                                                  </div>
                                                    <div class="col-md-2 text-center p-r-0">
                                                     <h5 class="theme-color-text font-bold"> 


                                                            <?php 

                                                               
                                                                echo $ticket->TripType;
                                                            ?>

                                                     </h5>
                                                     </div>
                                                     
                                                      
                                          
                        
                        </div>
                        </li>

                          <?php }?>
                        

                        
                    </ul>
                        </div>

                        
                      
                       
                        
                    
                    </div>
  
        </div>
        </div> 
  </section>





  <?php
     }
     else{
    echo "<h3 class=\"text-center text-danger\"> Flight(s) has not been booked.</h3>";         # code...

     }
     ?>
        
        
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



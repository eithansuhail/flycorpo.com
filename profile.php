
<?php  
session_start();
if(!isset($_SESSION['email'] )){
  header('Location: login.php');
}


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

<body onload="active_nav()">

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
      <?php include("header.php"); ?>
    <div class="global-wrap">
      <div class="head-block">
         


        <div class="bg-holder">
        



          <h2 class="text-center">Profile</h2>
   <div class="container " style=" box-shadow: 2px 2px 2px 2px #8888; border-radius: 10px; margin-bottom: 30px;">
              
                <!-- card -->
              <div class="w3-container">
              
        <div class="w3-section text-muted" style="float: right; margin: 10px;">
                  <!-- <button class="btn btn-primary">Edit Profile</button> -->
                 
                </div>
            <div class="w3-card-4" style="width:30%">

              <div class="w3-container w3-center">
                
                <img src="img/img_avatar.png" alt="Avatar" style="width:100px" class=" img-thumbnail img-circle border">
            <!--     <form action="<?php $_PHP_SELF ?>" method="post" enctype="multipart/form-data">
               
                  <input type="file" name="file">
                  <input type="submit" value="Change Profile" name="submit">
              </form> -->
                <p > <strong style="text-transform: uppercase;"><?php echo $_SESSION['name']; ?></strong> <span class="text-muted" style="font-size: 12px;"><?php echo $_SESSION['email']; ?></span></p>


              <!-- </div><?php echo $statusMsg; ?> -->

            </div>
          </div>
          <!-- card-end -->

            </div></div>

 
      <section>
  

  <div class="booking-item-container container">
    <div class="text-center"><h3>Booked Flights</h3></div>
                                
                                  <div  class="booking-item">
                                    <div>
                                        <div class="list-header col-md-9">
                                        
                                             <div class="col-md-2 padding-0">ReferenceNo</div>
                                            <div class="col-md-2 text-center p-r-0">GDFPNRNo</div>
                                            <div class="col-md-2 text-center p-r-0">EticketNo</div>
                                            <div class="col-md-2 text-center p-r-0">TransactionId</div>
                                            <div class="col-md-2 text-center p-r-0">Base fare</div>
                                            <div class="col-md-2 text-center p-r-0">IntAmount</div>
                                            <!-- <div class="col-md-2 text-center p-r-0">Name</div> -->
                                            
                                         
                                        </div>
                                        <div class="clearfix"></div>
                                        
                                       <div class="col-md-9 padding-0">
                                       <ul class="list-inline list-unstyled flight-search-ul">

                                            <?php  
                                           $email = $_SESSION['email'];
                                            include("functions.php");

                                            $query = "SELECT ReferenceNo,GDFPNRNo,EticketNo, TransactionId, IntAmount, IntBaseFare FROM bookedflight where booker_email = '$email' && usertype= 'user'";
                   $result=mysqli_query($link,$query);
                   if (mysqli_num_rows($result) > 0) {
                          while($row = mysqli_fetch_assoc($result)) {
                                                  ?>
                                     
                                   
                                          <li>
                                          <div  class="bg-white fight-table-list">
                                        
                                          <div class="col-lg-2 col-md-2 col-sm-2 col-xs-3 p-r-0">
                                                     <aside>
                                                     <p class="uppercase"><?php echo $row["ReferenceNo"];?></p>
                                                     
                                                      </aside>
                                               </div>
                                                  <div class="booking-item-flight-details col-md-2 text-center p-r-0">
                                                        <p class="uppercase"><?php 
                                                        echo $row["GDFPNRNo"];?></p>

                                                  </div>
                                                   <div class="col-md-2 text-center p-r-0">
                                                     <p><?php echo $row["EticketNo"];?></p>
                                                   </div>
                                                    <div class="col-md-2 text-center p-r-0">
                                                        <p><?php echo $row["TransactionId"];?></p>
                                                        <small>Non Stop</small>
                                                  </div>
                                                    <div class="col-md-2 text-center p-r-0">
                                                     <h5 class="theme-color-text font-bold">Rs. 


                                                            <?php 

                                                               
                                                                echo $row["IntBaseFare"];;
                                                            ?>

                                                     </h5>
                                                     </div>
                                                     
                                                      <div class="col-md-2 text-center p-r-0">
                                                     <h5 class=" font-bold uppercase"> 


                                                      <?php                                  
                                                          echo $row["IntAmount"];
                                                      ?>

                                                     </h5>
                                                     </div>
                                                     <div class="col-md-2 text-center p-r-0">
                                                     <h5 class=" font-bold uppercase"> 


                                                            <?php 

                                                               
                                                                // echo $row["Mobile"];;
                                                            ?>

                                                     </h5>
                                                     </div>
                                                     <div class="col-md-2 text-center p-r-0">
                                                     <span class="uppercase bolded" data-toggle="modal" data-target="#booking-item-details-view"></span>
                                                     
                                                     </div>
                                                     <div class="col-md-2 text-center">
                                                        <!-- <form action="checkout.php" method="post"> -->
                                                            <!-- <input type="hidden" name="count" id="count" value="<?php echo $count;  ?>"> -->
                                                        <!-- <button class="btn btn-primary small-btn "  type="submit" >Book Now</button> -->
                                                        <!-- </form> -->
                                                     </div>
                                          
                        
                        </div>
                        </li>

                        <?php  }
                    }
                    else{
                      echo $link->error;
                    }
                      
                        
                    ?>
                        

                        
                    </ul>
                        </div>

                      <!--   <div class="col-md-3">

                           <div class="booking-item-container bg-white">
                                
                                  <div  class="bg-white  checkput-flight m-b-10">
                                    <div class="text-center"> <h3>Wallet</h3>
                                       <div > Your Wallet has Rs. 70.</div>
                                    </div>

                                      <br>
                    }
                  <button class="btn btn-primary uppercase btn-large col-md-12">Add Balance</button>


                                        
                                    
  
                  </div>
              </div> 
                          
                        </div> -->
                      
                       
                        
                    
                    </div>
  
        </div>
        </div> 
        
</section>
            
  
      
       

       <?php include("footer.php"); ?>
        <!---Earch Modal --->
        

 
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
      function openCity(evt, paymenttype) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(paymenttype).style.display = "block";
    evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();

function active_nav(){

      // var data = document.getElementById("holidaypackage");
      // var s = data.replace(data, data+ 'class=" active"');
      document.getElementById("paymentnav").className = " active";
      
    }   
    </script>
        <script>
      
    </script>
    </div>
</body>

</html>




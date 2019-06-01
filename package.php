<?php  
  session_start();
  include("functions.php");
  $id = $_GET['id'];
  
$query= "SELECT * FROM `holidaypkgs` where id = '$id'";
                        $result=mysqli_query($link,$query) or die("Bad SQL: $query");

                    
                                                                                                  // output data of each row
                         
                              $optdom = "";
                         $row = mysqli_fetch_assoc($result);

                          $optdom .= '
  
<div style="">
                              <div style="font-size: 15px; float: left; text-transform: uppercase;" class="">Coupon Code : '.$row["coupon_code"].'</div>
                              <div class=" " style="margin-bottom: 15px;font-size: 15px; float: right;">Price : Rs 
                              '. number_format($row["price"]).'
                            </div>
                            
                          <br>
                          <h3 class=" text-left" style="margin-bottom: 15px; ">
                            Package Overview
                            </h3>


                            <h5 class=" text-justify" style="margin-bottom: 15px; ">
                              '.$row["desc"].'
                            </h5>
                              <h4 class=" text-left" style="margin-bottom: 15px; "> 
                             Location : '.$row["location"].'
                            </h4>
                              <h4 class=" text-center" style="margin-bottom: 15px;font-weight: bold;">
                              Book by '.$row["deadline"].'
                            </h4>
                            </div>
                        ';
          



    


  ?>
  <!DOCTYPE HTML>
  <html>

  <head>
      <title>Flycorpo</title>
      <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
      <meta name="keywords" content="Flycorpo" />
      <meta name="description" content="Flycorpo">
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
      
  </head>

  <body onload="active_nav()">
      <!-- /FACEBOOK WIDGET -->
      <?php include("header.php"); ?>

        <img src="<?php echo $row['image'] ?>">
        <section class="section-content  popular-cities-blk popular-holyday-spots" style="" >
         
            <div class="container text-center">
              <div class="popular-bg-block holyday-spots">
               
          
               <h2 class="" style=""><?php echo $row["name"]; ?></h2>
                <div class="city-category inhternational-city-cate" style=" 
                  width: 100%; 
                  padding-left: 7px;
                  padding-right:   7px;
                  border-radius: 7px;  
                  margin-top: 30px;
                  padding-top: 7px;
                  padding-bottom: 7px;

                  ">
   <div class="container">
                          

                        <!-- container start -->


    <?php 
      echo $optdom;
  ?> 





  <style type="text/css"> h2{
    text-transform: uppercase;
  } </style>


                        
                       

                  


              
            </div> 
                
                  
                
                </div>
                





              </div>
            </div>
          </section>
          

      
          
          <?php include("footer.php"); ?>

          <script src="js/jquery.js"></script>
          
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

  </body>

  </html>



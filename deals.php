<?php  
session_start();
require "functions.php";
?>
<!DOCTYPE HTML>
<html>

<head>
    <title>Grab best Deals on Flight, Hotel, and Holiday packages</title>
    <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
    <meta name="keywords" content="Flycorpo" />
    <meta name="description" content="Enjoy best discounts on flight tickets booking, hotel booking and Holiday packages with best offers on travel. Enjoy the best travel deals now!">
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


      <section class="section-content  popular-cities-blk popular-holyday-spots" style="padding-top: 40px;background-color:#151b35; " >
          <div class="container ">
            <div class="popular-bg-block holyday-spots">
             
        
             <h2 class="text-center elementToAnimate" style="color: white;">Deals</h2>
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
 <div class="container">
                        

                      <!-- container start -->


                      <?php $query= "SELECT * FROM `deals` ";
                      $result=mysqli_query($link,$query) or die("Bad SQL: $query");

                       if (mysqli_num_rows($result) > 0) {
                                                                                                // output data of each row
                            $result->data_seek(0);
                            $optdom = "";
                        while($row = mysqli_fetch_assoc($result)) {  

                        $optdom .= '<div class="col-lg-4 col-md-6 col-sm-12">
                      <div class="w3-card-4 " style=" border-radius: 5px;  box-shadow: 2px 2px 2px 2px #888888; width:30%; min-width: 300px;  margin: 5px;">

                     
                          
                          <img src="'.$row["image"].'" alt="Avatar" style="width:100% ;max-height: 210px;">
                          <div style="margin: 5px;">
                            <div style="font-size: 10px; text-transform: uppercase;">'.$row["coupon_code"].'</div>
                          <h5 style="text-transform: uppercase; font-weight:bold;" >'.$row["name"].'</h5>
                          <div class="text-danger text-center" style="margin-bottom: 15px;">
                            Book by '.$row["deadline"].'
                          </div>
                          </div>

                       </div>

                      </div>';
        



  }

}   

    echo $optdom;
?> <style type="text/css"> h2{
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



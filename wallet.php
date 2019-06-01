
<?php  
session_start();
if(!isset($_SESSION['agent_email'] )){
  header('Location: agent_login.php');
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
    <link rel="stylesheet" href="css/styles.css">
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
    <div class="global-wrap">
          <?php include("header.php"); ?>

     <section class="flight-search-result">
        <div  class="container">

            
            <div class="row">
                
                <div class="col-md-12">
                <div class="row">
                    <div class="search-result-header m-t-15   m-b-15">
                    	
                        
                        
                    </div>
                    <div class="clearfix"></div>
                          

                    
                            <div class="booking-item-container bg-white">
                                
                                  <div  class="bg-white  checkput-flight m-b-10">
                                  	<div class="text-center"> <h3>Wallet</h3>
                                       <div > Your Wallet has Rs. 70.</div>
                                    </div>




                                        
                                    
  
        					</div>
        			</div> 
                    <!---Start Tab--->
                
        <div class="clearfix"></div>
        
        
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




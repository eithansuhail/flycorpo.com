<?php  
session_start();
include('functions.php');

?><!DOCTYPE HTML>
<html>

<head>
    <title>We are happy to help you  - Flycorpo Travels LLP</title>
    <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
    <meta name="keywords" content="Flycorpo" />
    <meta name="description" content="Get in touch with us anytime for complete assistance with your travel needs. Reach us at +91-70322 52999 or info@flycorpo.com to assist you! Contact us now!">
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
    
   
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    
</head>

<body onload="active_nav()">
    <!-- /FACEBOOK WIDGET -->
    <?php include("header.php"); ?>
    
 <script type="text/javascript">
$(document).ready(function() {
    $("#submit").click(function() {
        var message = $("#form_message").val();
        var name = $("#form_name").val();
        var surname = $("#form_lastname").val();
        var email = $("#form_email").val();
        var subject = $("#form_subject").val();
        
        $.ajax({
            type: "GET",
            url: "contactusjs.php",
            data: { email: email, name: name, surname: surname, subject: subject, message: message}
        }).done(function(data) {
            $("#response").html(data);
        });
    });
});


</script>

<div id="response"></div>

        <section class="section-content" style="background-color: #151b35;">
            <div class="container">

               <div class="col-lg-4" style="margin-top:50px;">

                 
                                   
                                    <div class="col-sm-6 col-xs-6 ">
                                        <a href="#"><span><i class="fa fa-envelope" style="font-size:24px;color:white"></i></span>
                                            <aside>
                                                <h4>Email</h4>
                                                <h6>Bookings@flycorpo</h6>
                                            </aside>
                                        </a>
                                    </div>
                                    <div class="col-sm-6 col-xs-6">
                                        <a href="#"><span><i class="fa fa-mobile" style="font-size:28px;color:white"></i></span>
                                            <aside>
                                                <h4>Phone</h4>
                                                <h6>7032252999<br>040-42703021</h6>
                                            </aside>
                                        </a>
                                    </div>
                                    <div class="col-sm-12">
                                        <a href="#"><span><i class="fa fa-location-arrow" style="font-size:24px;color:white"></i></span>
                                            <aside>
                                                <h4>Location</h4>
                                                <h6>Door No.1-96/4, Above Hyderabad Hosts,<br>Madhapur Main Road, Hyderabad-81.</h6>
                                                <br/>
                                                <h6>UK Office Address: -
117 Station Crescent, Ashford,<br>TW15 3HN, United Kingdom.</h6>
 <br/>
                                                <h6>USA Office Address: -
9350, Wilshire Blvd Suite 203,
Beverly Hills, CA<br>, 90212
United States..</h6>
                                            </aside>
                                        </a>
                                    </div>
                   



               </div>
               <div class="col-lg-8">
                    <!--<form id="contact-form" method="get" action="<?php $_PHP_SELF ?>" role="form">-->
                <h2 class="text-center elementToAnimate" >Contact Us</h2>


   

    <div class="controls">

        <div class="row">
            <div class="col-md-6">


                <div class="form-group form-group-lg name">
                    <label  for="form_name">Firstname *</label>
                    <input id="form_name" type="text" name="name" class="form-control " placeholder="Please enter your firstname *" required="required" data-error="Firstname is required.">
                    <div class="help-block with-errors"></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group form-group-lg name">
                    <label  for="form_lastname">Lastname *</label>
                    <input id="form_lastname" type="text" name="surname" class="form-control" placeholder="Please enter your lastname *" required="required" data-error="Lastname is required.">
                    <div class="help-block with-errors"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group form-group-lg">
                    <label  for="form_email">Email *</label>
                    <input id="form_email" type="email" name="email" class="form-control" placeholder="Please enter your email *" required="required" data-error="Valid email is required.">
                    <div class="help-block with-errors"></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group form-group-lg">
                    <label  for="form_need">Subject *</label>
                    <input id="form_subject" type="text" name="subject" class="form-control" placeholder="Subject" required="required" data-error="Subject is required.">
                    
                    <div class="help-block with-errors"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label  for="form_message">Description *</label>
                    <textarea id="form_message" name="message" class="form-control" placeholder="Message for me *" rows="4" required="required" data-error="Please, leave us a message."></textarea>
                    <div class="help-block with-errors"></div>
                </div>
            </div>
            <div class="col-md-12">
              <button type="submit"  id="submit" class="btn btn-success btn-send" >Send message</button>
               
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <p class="text-muted">
                    <strong>*</strong> These fields are required.
                </p>
            </div>
        </div>
    </div>

<!--</form>-->
               </div>
            </div>

        </section>
        <!-- end of Contact Us form -->
     
 <div class="bg-holder">

        <?php include("footer.php"); ?>

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
 
<style type="text/css">
    .section-content,h2,h4,h6{
        color: white;
    }
    h2{
        font-weight: bold;
        
    }
</style> 

<script>
        $(".name").bind("keypress", function(event) {
        if (event.charCode != 0) {
            var regex = new RegExp("^[a-zA-Z ]+$");
            var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
            if (!regex.test(key)) {
                event.preventDefault();
                return false;
            }
        }
    });

 
</script>
</body>

</html>



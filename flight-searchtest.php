
<?php  
session_start();

?><!DOCTYPE HTML>
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

<body>
    <!-- /FACEBOOK WIDGET -->
    <div class="global-wrap">
    <div class="head-block">
        <header id="header">
            <div class="container">
						<div class="row">
							<div class="col-sm-2 col-xs-6">
		              <div id="logo"><a href="index.php" class="logo"><img src="img/logo.png" alt="flycorp logo"></a></div>
		          </div>
							<div class="col-md-10 col-xs-12">
								<div class="">
									
                                         <div class="nav quick-links  col-md-12 col-xs-12">
                                            <ul class="slimmenu" id="slimmenu">
                                            <div class="col-md-8">
                                            <li id="index" >  
                                            	<ul class="" id="slimmenu" onmouseover="showdropdown()" onmouseleave="hidropdown()" class="showonhover" style="display: none;">
		                                            <div class="col-md-12">
		                                          
													<li ><a href="flight-search.php">Flight search</a>
													</li>
													<li id="rulesandregulations"><a href="rulesandregulations.php">Rules and regulations</a>
		                                            </li>
		                                            </div>
                                           
                            					</ul>
                            				<a href="index.php">Flights </a>
											</li>
											<li  id="holidaypackage"><a href="holidaypackage.php">Holidays Package</a>
                                            </li>
											<li id="visa"><a href="Visa.php">Visa service</a></li>
											<li id="hotelnav"><a href="hotel.php">Hotel</a></li>
											<li id="charitynav"> <a href="charity.php">Charity Work</a></li>
											
											
											<!-- <li id="hotelnav"><a href="hotel.php">Hotel</a></li> -->
                                            
                                       
                                            </div>
                                            <div class="col-md-4">
											
											<li id="dealsnav"><a href="deals.php">Deals</a></li>
											<li id="contactus"><a href="contactus.php">Contact Us	</a></li>
											

									
										
										<?php if(isset($_SESSION['email'] )){
												echo '
												<li id="index" name="profilenav">  
                                            	<ul class="" id="slimmenu" onmouseover="showdropdown()" onmouseleave="hidropdown()" class="showonhover" style="display: none;">
		                                            <div class="col-md-12">
		                                          
													<li ><a href="profile.php">PROFILE</a>
													</li>
													<li ><a href="logout.php">logout</a>
		                                            </li>
		                                            </div>
                                           
                            					</ul>
                            				<a href="">'.$_SESSION['name'].' </a>
											</li>';


											}
									 

									 else if(isset($_SESSION['agent_email'] )){
												echo '
												<li id="index" name="profilenav">  
                                            	<ul class="" id="slimmenu" onmouseover="showdropdown()" onmouseleave="hidropdown()" class="showonhover" style="display: none;">
		                                            <div class="col-md-12">
		                                          
													<li ><a href="agent_profile.php">AGENT PROFILE</a>
													</li>
													<li id="paymentnav"><a href="payment.php" >Wallet</a></li>
													<li ><a href="logout.php">logout</a>
		                                            </li>
		                                            </div>
                                           
                            					</ul>
                            				<a href="">'.$_SESSION['agent_name'].' </a>
											</li>';


											}
											 else{		
											 	echo '
											
											 	<li id="index" name="profilenav"> 
										  <ul class="" id="slimmenu" onmouseover="showdropdown()" onmouseleave="hidropdown()" class="showonhover" style="display: none;">
		                                            <div class="col-md-12">
		                                          
													<li ><a href="agent_login.php">AGENT LOGIN</a>
													</li>
													<li id="paymentnav"><a href="login.php" >User Login</a></li>
													
		                                            </div>
                                           
                            					</ul>
                            				<a href="">Login </a>
											</li>';	
									  }

									  ?>
										
                                          </div>
                            </ul>
                                    </div>
								</div>
		          </div>
							
						</div>
					</div>
            
        </header>
        <script>

        	function showdropdown(){
        		document.getelementsbyclassname("showonhover").style.display ="block";
        	}
        	function hidropdown(){
        		document.getelementsbyclassname("showonhover").style.display ="none	";	
        	}
        	
        </script>

        <div class="bg-holder">
        
            <!-- START GRIDROTATOR -->
            
            <!-- END GRIDROTATOR -->
            <section class="section-content">
                <div class="container">
                <h2 class="text-center">Book Flights, Hotels & Holiday Packages</h2>
                    <div class="search-tabs search-tabs-bg">
                       
                        <div  class="tabbable">
                            <ul class="nav nav-tabs" id="myTab">
                                 
                                <li class="active"><a href="#tab-1" data-toggle="tab"><span >Flights</span></a>
                                </li>
                               <!-- <li class=""><a href="#tab-2" data-toggle="tab"><span >Hotels</span></a>
                                </li>-->
                                
                            </ul>
                            <div  class="tab-content parent-tab-content">
                               
                                 
                                <div  class="tab-pane fade in active"  id="tab-1">
                                    
                                    <form action="response.php" method="POST">
                                         
                                        
                                           
                                                <label>Flight Type</label>                       
                                          	<input  name="flighttype" type="text" readonly placeholder="(s)" class="full-width traveller">

                                                                             
                                                          <div class="styled-select black">
                                                              <select name="flightType">
                                                                <option  value="1" class="others" selected="selected">Domestic flights</option>
                                                                <option value="2"class="others">International flights</option>
                                                                <option class="others">INFANT</option>
                                                              </select>
                                                            </div>
                                                                                
                                                                   
                                                                
                                                                 <div class="clearfix"></div>
                                                           
                                                          
                                                                <div class="col-md-1 p-l-0">
                                                       <button class="btn btn-primary btn-lg btn-yellow btn-circle" type="submit"><i class="fa fa-chevron-right fa-2x"></i></button>
                                                       </div>
                                                                
                                                                
                                                                
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                             
                                        </div>
                                       
                                    </form>
                            
                                
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
</div>

    
        
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
        <!--<script>
        jQuery('#submit1').click(function() {
     var fromAddress = jQuery('#fromAddress').val();
     var toAddress = jQuery('#toAddress').val();

     jQuery('#fromAddress').val('toAddress');
     jQuery('#toAddress').val('fromAddress');
});
</script>-->
    </div>
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
function swap(){
 var temp=document.getElementById("fromAddress").value;
 document.getElementById("fromAddress").value=document.getElementById("toAddress").value;
 document.getElementById("toAddress").value=temp;
}
function swap1(){
 var temp1=document.getElementById("from_address").value;
 document.getElementById("from_address").value=document.getElementById("to_address").value;
 document.getElementById("to_address").value=temp1;
}
</script>
 <script>
        $("input[name='NCS']").NCS({
			categoryNames: ["adults", "children", "infants"], 
            callback: function (values) {
                console.log(values);
            }
        });
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
$('.dropdown').on('show.bs.dropdown', function(e){
  $(this).find('.dropdown-menu').first().stop(true, true).show();
});

$('.dropdown').on('hide.bs.dropdown', function(e){
  $(this).find('.dropdown-menu').first().stop(true, true).hide();
});
</script>
</body>

</html>



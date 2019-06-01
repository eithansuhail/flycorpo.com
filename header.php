<?php

  ?>
  
  <!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-NF5RWBF');</script>
<!-- End Google Tag Manager -->
<header  style=" padding-top: 0px;background-color:#ffffff ;" >
    
            <div class="container">
            <div class="row">
              <span class="col-sm-2 col-xs-6 col-lg-2">
                  <a href="/"><img src="img/logo.png"></a>
              </span>
              <div class="col-md-10 col-xs-12">
                <div >
                  
                                         <div class="nav quick-links  col-md-12 col-xs-12">
                                            <ul class="slimmenu" id="slimmenu" style="font-weight: bold;">
                                            <div class="col-md-8">
                                          <!---  <li id="index" style="font-size: 14px; font-weight: bold;">  
                                              <ul class="" id="slimmenu" onmouseover="showdropdown()" onmouseleave="hidropdown()" class="showonhover" style="display: none;width: 250px;">
                                                <div class="col-md-12">
                                              
                          <li ><a href="flight-search.php">Flight search</a>
                          </li>
                          <li id="rulesandregulations"><a href="rulesandregulations.php">Rules and regulations</a>
                                                </li>
                                                </div>
                                           
                                      </ul>
                                      
                                    
                                    <a href="/" >Flights </a>
                      </li> --->
             <li ><a href="flight.php">Flights</a></li>         
                        <li ><a href="Visa.php">Visa service</a></li>
                      <li  id="holidaypackage"><a href="holidaypackage.php">Holidays</a>
                      <li id="hotelnav"><a href="hotel.php">Hotels</a></li>
                      <li id="hotelnav"><a href="offers.php">Offers</a></li>
   


                      
                                            </li>

                                             <li id="index" style="font-size: 14px; font-weight: bold;">  
                                              <ul class="" id="slimmenu" onmouseover="showdropdown()" onmouseleave="hidropdown()" class="showonhover" style="display: none;width: 250px;">
                                                <div class="col-md-12">
                                                      <li id=""><a href="corporatetravel.php">Corporate Travel</a></li>
                                                      <li ><a href="rulesandregulations.php">Rules and regulations</a></li>
                          <li ><a href="agent_login.php">AGENT LOGIN</a>
                                              
                          </li>
                                              
                           <li > <ul class="col-lg-12 col-lg-12" id="" onclick ="showdropdown()" onmouseleave="hidropdown()" style="display: none; width: 340px;">
                                                <div class="col-md-12 col-lg-12">
                                              
                          <li ><a href="cc_form.php">CREDIT CARD TICKET ORDER FORM</a>
                          </li>
                          <li ><a href="backup_form.php">BACK UP ONLY FORM</a></li>
                          <li ><a href="refund_xlation.php">REFUND AND CANCELLATION FORM</a></li>
                          <li ><a href="date_form.php">DATE CHANGE AND AUTHORIZATION FORM</a></li>
                          <li ><a href="ach_form.php">ACH AUTHORIZATION FORM</a></li>
                                                </div>
                                           
                                      </ul><a type="a"  data-toggle="modal" data-target="#exampleModalLong">
                                      E-Forms</a>


                                    </li>
                        
                                                </div>
                                           
                                      </ul>
                                    <a href="" >More </a>
                      </li>
 </div>
                                            <div class="col-md-4">
                      
                      <li id="dealsnav"><a href="deals.php">Deals</a></li>
                      <li id="contactus"><a href="contactus.php">Contact Us </a></li>
                      <?php 

                    if(isset($_SESSION['email'] )){
                      $name = explode(" ", $_SESSION['name']);

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
                                    <a href="">'.$name[0].' </a>
                      </li>';


                      }
                   

                   else if(isset($_SESSION['agent_email'] )){
                    $agent_name = explode(" ", $_SESSION['agent_name']);
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
                                    <a href="">'.$agent_name[0].' </a>
                      </li>';


                      }
                       else{    
                        echo '
                      
                       <li id="login"><a href="login.php">My Account </a></li>';  
                    }

                    ?>
                    
                                          </div>
                            </ul>
                                    </div>
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
            document.getelementsbyclassname("showonhover").style.display ="none ";  
          }
          
        </script>
        
        
        
        
        
        
        
        
        
        
        
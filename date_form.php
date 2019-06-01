<?php  
session_start();

include("functions.php");
$condition = 0;




?>
<!DOCTYPE HTML>
<html>

<head>
    <title>Date Change Authorization Form - Flycorpo Travels LLP</title>
    <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
    <meta name="keywords" content="Flycorpo" />
    <meta name="description" content="Flycorpo's Date Change Authorization Form">
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
    <div class="global-wrap">
    <div class="head-block">
         


        <div class="bg-holder">
        
            <!-- START GRIDROTATOR -->
            
            <!-- END GRIDROTATOR -->

             <section class="section-content">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
        <h4><span style="color:#d6171f;">Date Change Authorization Form</span></h4>
    
      
      
      <strong>Please read and review the Rules, Terms & Condition before Submission of this Online form.</strong><br>
      <!-- <strong>3. After Submission, this form will be automatically returned to lanita Travel Inc. < alanita@alanitatravel.net > </strong> <br><br> -->
      
    </div>
        </div>
      </div>
    </section>

    <div class="container">
     <?php 


     if(isset($_POST['submit']))
      {
          
          $email = $_POST['email']; 
          $firstname = $_POST['firstname1'];
          $lastname = $_POST['lastname1'];
    
     
          $card_name = $_POST['card_name'];
          $card_number = $_POST['card_number'];
          $expirydate = $_POST['expirydate'];
          $cvv = $_POST['cvv'];   

          if (($_POST['firstname2']) != ''){
            if ($_POST['firstname2'] ==''  ||  $_POST['lastname2'] ==''  ) {
                  echo "All fields are required for passenger 2.</p>";
            }
          }

            else if (($_POST['firstname3']) != ''){
            if ($_POST['firstname3'] ==''  ||  $_POST['lastname3'] ==''  ) {
                  echo "All fields are required for passenger 3.</p>";
            }
          }
            else if (($_POST['firstname4']) != ''){
            if ($_POST['firstname4'] ==''  ||  $_POST['lastname4'] ==''  ) {
                  echo "All fields are required for passenger 4.</p>";
            }
          }
            // else if (($_POST['firstname5']) != ''){
            // if ($_POST['firstname5'] ==''  ||  $_POST['lastname5'] ==''  ) {
            //       echo "All fields are required for passenger 5.</p>";
            // }

              
            //    }
               else if ($_POST['firstname1'] == '') {
              
              $condition=1;
              
          } else if ($_POST['lastname1'] == '') {
              
              $condition=2;
              
          } 
          // else if ($_POST['email1'] == '') {
              
          //     $condition=3;
              
          // }else if ($_POST['mobile'] == '') {
              
          //     $condition=4;
              
          // }
          // else if ($_POST['dob1'] == '') {
              
          //     $condition=5;
              
          // }else if ($_POST['gender1'] == '') {
              
          //     $condition=6;
              
          // }
          else if ($_POST['card_name'] == '') {
              
              $condition=7;
              
          }else if ($_POST['card_number'] == '') {
              
              $condition=8;
              
          }else if ($_POST['expirydate'] == '') {
              
              $condition=9;
              
          }else if ($_POST['cvv'] == '') {
              
              $condition=10;
              
          }
          else if ($_POST['bil_ad'] == '') {
              
              echo "<p>Billing address is required.</p>";
              
          }
          else if ($_POST['city'] == '') {
              
              echo "<p>city is required.</p>";
              
          }else if ($_POST['bankname'] == '') {
              
              echo "<p>Bank Name is required.</p>";
              
          }else if ($_POST['state'] == '') {
              
              echo "<p>State is required.</p>";
              
          }else if ($_POST['zipcode'] == '') {
              
              echo "<p>Zip code is required.</p>";
              
          }else if ($_POST['amount'] == '') {
              
              echo "<p>Amount is required.</p>";
              
          }else {
              
              
                 $query = "INSERT INTO date_info(pnr, airlineid, email, card_name, mobile, card_number,cvv,bil_ad,city,state,zipcode,tollfree,bankname,amount,idate_from,idate_to,odate_from,odate_to) 
                 VALUES ('".$_POST['pnr']."','". 
                 $_POST['airlineid']."','". $_POST['email']."','". $_POST['card_name']."','". $_POST['mobile']."','". $_POST['card_number']."','". $_POST['cvv']."','". $_POST['bil_ad']."','". $_POST['city']."','". $_POST['state']."','". $_POST['zipcode']."','". $_POST['tollfree']."','". $_POST['bankname']."','". $_POST['amount']."','". $_POST['idate_from']."','". $_POST['idate_to']."','". $_POST['odate_from']."','". $_POST['odate_to']."')"; 

                 // echo $query;
            
                  if (mysqli_query($link,$query)) {
                    
                      $condition=200;
                      $lastid  = mysqli_insert_id($link);
                      // echo  $lastid;

                       $query = "INSERT INTO date_table(date_id, firstname, lastname) 
                              VALUES ('$lastid','".$_POST['firstname1']."','". 
                                 $_POST['lastname1']."')";

                            
            
                              if (mysqli_query($link,$query)) {
                                
                                  $condition=200;

                              } else {
                                      echo $link->error;
                                  echo "<p>There was a problem signing you up - please try again later.</p>";
                                  
                              }

                              if (($_POST['firstname2']) != ''){
                             $query = "INSERT INTO date_table(date_id, firstname, lastname) 
                              VALUES ('$lastid','".$_POST['firstname2']."','". 
                                 $_POST['lastname2']."')";

                            
            
                              if (mysqli_query($link,$query)) {
                                
                                  $condition=200;

                              } else {
                                  
                                  echo "<p>There was a problem signing you up - please try again later.</p>";
                                  
                              }
                      }


                      if (($_POST['firstname3']) != ''){
                             $query = "INSERT INTO date_table(date_id, firstname, lastname) 
                              VALUES ('$lastid','".$_POST['firstname3']."','". 
                                 $_POST['lastname3']."')";

                            
            
                              if (mysqli_query($link,$query)) {
                                
                                  $condition=200;

                              } else {
                                  
                                  echo "<p>There was a problem signing you up - please try again later.</p>";
                                  
                              }
                      }

                               if (($_POST['firstname4']) != ''){
                             $query = "INSERT INTO date_table(date_id, firstname, lastname) 
                              VALUES ('$lastid','".$_POST['firstname4']."','". 
                                 $_POST['lastname4']."')";

                            
            
                              if (mysqli_query($link,$query)) {
                                
                                  $condition=200;

                              } else {
                                  
                                  echo "<p>There was a problem signing you up - please try again later.</p>";
                                  
                              }
                      }
                         if (($_POST['firstname5']) != ''){
                             $query = "INSERT INTO date_table(date_id, firstname, lastname) 
                              VALUES ('$lastid','".$_POST['firstname5']."','". 
                                 $_POST['lastname5']."')";

                            
            
                              if (mysqli_query($link,$query)) {
                                
                                  $condition=200;

                              } else {
                                  
                                  echo "<p>There was a problem signing you up - please try again later.</p>";
                                  
                              }
                      }


                       

                  } else {

                    echo $link->error;
                      
                      echo "<p>There was a problem signing you up - please try again later.</p>";
                      
                  }

                  
                  
              
            }
          }
        

                    if($condition==200)
{
    echo "<div class='text-suceess'><p>Request has been submitted! Your Request ID is <b>$lastid</b></p></div>";
  
}?>

     <?php 
                    if($condition==1)
{
    echo "<div class='text-suceess'><p>First Name is required!</p></div>";
}?>
<?php 
                    if($condition==2)
{
    echo "<div class='text-suceess'><p>Last Name is required!</p></div>";
}?>
 <?php 
                    if($condition==3)
{
    echo "<div class='text-suceess'><p>Email is required!</p></div>";
}?>
  <?php 
                    if($condition==4)
{
    echo "<div class='text-suceess'><p>ate of Birth is required!</p></div>";
}?>
  <?php 
                    if($condition==5)
{
    echo "<div class='text-suceess'><p>Gender is required!</p></div>";
}?>
  <?php 
                    if($condition==6)
{
    echo "<div class='text-suceess'><p>Mobile is required!</p></div>";
}?>
 <?php 
                    if($condition==7)
{
    echo "<div class='text-suceess'><p>Card holder's Name is required!</p></div>";
}?>
 <?php 
                    if($condition==8)
{
    echo "<div class='text-suceess'><p>Card Number is required!</p></div>";
}?>
  <?php 
                    if($condition==9)
{
    echo "<div class='text-suceess'><p>Expiry Date is required!</p></div>";
}?>
     <?php 
                    if($condition==10)
{
    echo "<div class='text-suceess'><p>CVV is required!</p></div>";
}?>
<?php 
                    if($condition==11)
{
    echo "<div class='text-suceess'><p>Request from this email is already registered.</p></div>";
}?>
       </div>

    <section class="container">
      
      

        <div style="background-color: white; width: 100%; border-radius: 5px;  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);" >
          
        <div class="container section-content"  >

           <h3 class="text-center" style="font-weight: bold;">Date Change Authorization Form</h3>


          <form method="post" class="m-x-auto  app-login-form" onsubmit="return validate()" role="form" name="form" action="<?php $_PHP_SELF ?>">

            <div class="row col-md-12">
              
              <div class="form-group col-md-4 form-group-lg">
           <label>PNR/ Confirmation Code </label>
                    <input type="text" class="form-control " pattern="[A-Za-z 0-9]+" placeholder="PNR/ Confirmation Code " name='pnr' minlength="3" maxlength="20" required    autofocus/>
                    </div>


              <div class="form-group col-md-4 form-group-lg">
           <label>Airline ID </label>
                    <input type="text" class="form-control " pattern="[A-Za-z 0-9]+" placeholder="Airline ID" name='airlineid' minlength="3" maxlength="20" required   autofocus/>
                    </div>

            
              <div class="form-group col-md-4 form-group-lg">
           <label>Email ID </label>
                    <input type="email" class="form-control "  placeholder="Email ID " name='email' minlength="3" required   autofocus/>
                    </div>


            </div>

            <hr>


          <div class="text-center " style="font-weight: bold;">Passenger 1 (To be filled as appearing on the Passport)  </div>

              <div class="row col-md-12 container"> 
                 
        <div class="form-group col-md-6 form-group-lg">
           <label>First Name </label>
                    <input type="text" class="form-control name-valid" pattern="[A-Za-z ]+" placeholder="First Name" name='firstname1' minlength="3" maxlength="20" required   autofocus/>
                    </div>
            <div class="form-group col-md-6 form-group-lg">
           <label>Last Name </label>
                    <input type="text" class="form-control " pattern="[A-Za-z ]+" placeholder="Last Name" name='lastname1' minlength="3" maxlength="20" required   autofocus/>
                    </div>
         

      </div>
          <div class="text-center " style="font-weight: bold;">Passenger 2 (To be filled as appearing on the Passport)   </div>

              <div class="row col-md-12 container"> 
                 
        <div class="form-group col-md-6 form-group-lg">
           <label>First Name </label>
                    <input type="text" class="form-control name-valid" pattern="[A-Za-z ]+" placeholder="First Name" name='firstname2' minlength="3" maxlength="20"    autofocus/>
                    </div>
            <div class="form-group col-md-6 form-group-lg">
           <label>Last Name </label>
                    <input type="text" class="form-control " pattern="[A-Za-z ]+" placeholder="Last Name" name='lastname2' minlength="3" maxlength="20"    autofocus/>
                    </div>
          </div>
        <div class="bottom2 text-danger"></div>


          <div class="text-center " style="font-weight: bold;">Passenger 3 (To be filled as appearing on the Passport)   </div>
              <div class="row col-md-12 container"> 
                 
        <div class="form-group col-md-6 form-group-lg">
           <label>First Name </label>
                    <input type="text" class="form-control name-valid" pattern="[A-Za-z ]+" placeholder="First Name" name='firstname3' minlength="3" maxlength="20"    autofocus/>
                    </div>
            <div class="form-group col-md-6 form-group-lg">
           <label>Last Name </label>
                    <input type="text" class="form-control " pattern="[A-Za-z ]+" placeholder="Last Name" name='lastname3' minlength="3" maxlength="20"    autofocus/>
                    </div>
          </div>
        <div class="bottom3  text-danger"></div>


          <div class="text-center " style="font-weight: bold;">Passenger 4 (To be filled as appearing on the Passport)   </div>

              <div class="row col-md-12 container"> 
                 
        <div class="form-group col-md-6 form-group-lg">
           <label>First Name </label>
                    <input type="text" class="form-control name-valid" pattern="[A-Za-z ]+" placeholder="First Name" name='firstname4' minlength="3" maxlength="20"    autofocus/>
                    </div>
            <div class="form-group col-md-6 form-group-lg">
           <label>Last Name </label>
                    <input type="text" class="form-control " pattern="[A-Za-z ]+" placeholder="Last Name" name='lastname4' minlength="3" maxlength="20"    autofocus/>
                    </div>
                     </div>
         
        <div class="bottom4  text-danger"></div>



          <div class="text-center " style="font-weight: bold;">Passenger 5 (To be filled as appearing on the Passport)   </div>

              <div class="row col-md-12 container"> 
                 
        <div class="form-group col-md-6 form-group-lg">
           <label>First Name </label>
                    <input type="text" class="form-control name-valid" pattern="[A-Za-z ]+" placeholder="First Name" name='firstname5' minlength="3" maxlength="20"    autofocus/>
                    </div>
            <div class="form-group col-md-6 form-group-lg">
           <label>Last Name </label>
                    <input type="text" class="form-control " pattern="[A-Za-z ]+" placeholder="Last Name" name='lastname5' minlength="3" maxlength="20"    autofocus/>
                    </div>
                  </div>
         
        <div class="bottom5  text-danger"></div>
        <div class="row col-md-12 container"> 

          <div class="form-group col-md-4 form-group-lg">
            <br>
            <br>
            <h5 class="text-left">Change my existing Outbound Date :</h5>
          </div>

          <div class="form-group col-md-4 form-group-lg ">
              <div class="form-group form-group-icon-left"><i class="fa fa-calendar input-icon input-icon-highlight"></i>
                  <label>Existing Date (Frorm) </label>
                  
                   <input class="date-pick   form-control"  data-date-format="dd-mm-yyyy" type="text" name='odate_from' />
              </div>
          </div>



          <div class="form-group col-md-4 form-group-lg ">
              <div class="form-group form-group-icon-left"><i class="fa fa-calendar input-icon input-icon-highlight"></i>
                  <label>New Date (To)</label>
                  
                   <input class="date-pick   form-control"  data-date-format="dd-mm-yyyy" type="text" name='odate_to' />
              </div>
          </div>
      
           
                  </div>


                  <div class="row col-md-12 container"> 

          <div class="form-group col-md-4 form-group-lg">
            <br>
            <br>
            <h5 class="text-left">Change my existing Inbound Date :</h5>
          </div>

          <div class="form-group col-md-4 form-group-lg ">
              <div class="form-group form-group-icon-left"><i class="fa fa-calendar input-icon input-icon-highlight"></i>
                  <label>Existing Date (Frorm) </label>
                  
                   <input class="date-pick   form-control"  data-date-format="dd-mm-yyyy" type="text" name='idate_from' />
              </div>
          </div>



          <div class="form-group col-md-4 form-group-lg ">
              <div class="form-group form-group-icon-left"><i class="fa fa-calendar input-icon input-icon-highlight"></i>
                  <label>New Date (To)</label>
                  
                   <input class="date-pick   form-control"  data-date-format="dd-mm-yyyy" type="text" name='idate_to' />
              </div>
          </div>
      
           
                  </div>
         
         


       


           <section >
             <h3 class="text-center">Credit Card Details</h3>
          

                <div class="row col-md-12"> 
        <div class="form-group col-md-6 form-group-lg">
           <label>Card holder's Name </label>
                    <input type="text" class="form-control email-box"required placeholder="Card holder's Nam" name='card_name' minlength="6" maxlength="20"    autofocus/>
                    </div>
        <div class="form-group col-md-6 form-group-lg">
           <label>Mobile</label>
                    <input type="text" class="form-control email-box" placeholder="Mobile" name='mobile' minlength="6" maxlength="20"    autofocus/>
                    </div>

        </div>
        <div class="row row col-md-12"> 
        <div class="form-group col-md-6 form-group-lg">
           <label>Card Number</label>
                    <input type="text" id="card-number"  onkeyup='this.mask("9999 9999 9999 9999")' class="form-control email-box" placeholder="Card-number"required name='card_number' minlength="6" maxlength="20" required    autofocus/>
                    </div>
        <div class="form-group col-md-3 form-group-lg">
           <label>Expiry Date</label>
                    <input type="text" class="form-control email-box"required placeholder="mm/yyyy"required name='expirydate' minlength="4" maxlength="5"    autofocus/>
          </div>
           <div class="form-group col-md-3 form-group-lg">
           <label>CVV</label>
                    <input type="text" class="form-control email-box"required maxlength="3" minlength="3"required placeholder="CVV" name="cvv"   autofocus/>
          </div>

        </div>

        <div class="row col-md-12"> 
            <div class="form-group col-md-6 form-group-lg">
               <label>Billing Address </label>
                        <input type="text" class="form-control email-box" placeholder="Billing Address" name='bil_ad'  autofocus/>
             </div>
             <div class="form-group col-md-6 form-group-lg">
               <label>City </label>
                        <input type="text" class="form-control email-box"required placeholder="City" name='city'  autofocus/>
             </div>
              </div>

        <div class="row col-md-12"> 
              <div class="form-group col-md-6 form-group-lg">
               <label>State </label>
                        <input type="text" class="form-control email-box"required placeholder="State" name='state'  autofocus/>
             </div>

             <div class="form-group col-md-3 form-group-lg">
               <label>Zip Code </label>
                        <input type="text" class="form-control email-box"required placeholder="Zip Code" name='zipcode'  autofocus/>
             </div>
             <div class="form-group col-md-3 form-group-lg">
               <label>Bank Toll Free </label>
                        <input type="text" class="form-control email-box" placeholder="Bank Toll Free" name='tollfree'  autofocus/>
             </div>
`
           </div>

           <div class="row col-md-12"> 
            <div class="form-group col-md-6 form-group-lg">
               <label>Card Issuing Bank Name </label>
                        <input type="text" class="form-control email-box"required placeholder="Card Issuing Bank Name" name='bankname'  autofocus/>
             </div>
             <div class="form-group col-md-6 form-group-lg">
               <label>Total amount authorizing to be charged </label>
                        <input type="text" class="form-control email-box" required pattern="[0-9]+" placeholder="Total amount authorizing to be charged" name='amount'  autofocus/>
             </div>
              </div>

              <p style="font-style: italic;">
              

              </p>

     

           </section>
        
        <div class="container">
        <button class="btn btn-primary uppercase btn-large " type="submit" name="submit" >Submit</button>
        </div>


        </div>
        </div>
                                                                  
                    
                    
      </div>
      </form>
      
      
    
      
      
        
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

        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
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
      categoryNames: ["Room", "Guests"], 
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

  // $("#card-number").mask("9999 9999 9999 9999");
    
</script>

<script>
$('.dropdown').on('show.bs.dropdown', function(e){
  $(this).find('.dropdown-menu').first().stop(true, true).show();
});

$('.dropdown').on('hide.bs.dropdown', function(e){
  $(this).find('.dropdown-menu').first().stop(true, true).hide();
});


 

    function showflights(){
      // hide = document.getElementById("tab-2");
      // hide.style.display = "none";

      show = document.getElementById("tab-1");
      show.style.display = "none";
    }
    function showvisa(){
      hide = document.getElementById("tab-1");
      hide.style.display = "none";

      show = document.getElementById("tab-2");
      show.style.display = "block";
    }

    function active_nav(){

      document.getElementById("hotelnav").className = " active";
      
    }

    $('.date-pick').datepicker({
    
}).on('changeDate', function(e){
    $(this).datepicker('hide');
});
</script>
<style type="text/css">
  
@media screen and ( min-width:  1000px){
  .desktop{
    margin-left: 30px;
  }
 

} label{
    color: black;
  }


</style>

<script type = "text/javascript">
   <!--
      // Form validation code will come here.
      function validate() {
      
         // if( document.form.firstname2.value != "" ) {
         //  if (document.form.firstname2.value == "" || document.form.lastname2.value == "" || document.form.dob2.value == ""  || document.form.gender2.value == "" ) {
         //              document.getElementsByClassName("bottom2").innerHTML = "All fields are Mandatory to fill.";

         //    return false;
         //  }
         // }
         // if( document.form.EMail.value == "" ) {
         //    alert( "Please provide your Email!" );
         //    document.form.EMail.focus() ;
         //    return false;
         // }
         // if( document.form.Zip.value == "" || isNaN( document.form.Zip.value ) ||
         //    document.form.Zip.value.length != 5 ) {
            
         //    alert( "Please provide a zip in the format #####." );
         //    document.form.Zip.focus() ;
         //    return false;
         // }
         // if( document.form.Country.value == "-1" ) {
         //    alert( "Please provide your country!" );
         //    return false;
         // }
         return( true );
      }
   //-->


   $(document).ready(function() {
         $('.name-valid').on('keypress', function(e) {
          var regex = new RegExp("^[a-zA-Z ]*$");
          var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
          if (regex.test(str)) {
             return true;
          }
          e.preventDefault();
          return false;
         });
        });
</script>
</body>

</html>



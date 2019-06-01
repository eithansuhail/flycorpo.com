<?php  
session_start();

include("functions.php");
$condition = 0;




?>
<!DOCTYPE HTML>
<html>

<head>
    <title>ACH Authorization Form - Flycorpo Travels LLP</title>
    <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
    <meta name="keywords" content="Flycorpo" />
    <meta name="description" content="Flycorpo's ACH Authorization Form">
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
        <h4><span style="color:#d6171f;">Ach Authorization Form></span></h4>
    
      
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
          // $firstname = $_POST['firstname'];
          // $lastname = $_POST['lastname'];
          $dob = $_POST['dob']; 
          $gender = $_POST['gender'];
          // $card_name = $_POST['card_name'];
          // $card_number = $_POST['card_number'];
          // $expirydate = $_POST['expirydate'];
          // $cvv = $_POST['cvv'];   

          
            // else if (($_POST['firstname5']) != ''){
            // if ($_POST['firstname5'] ==''  ||  $_POST['lastname5'] =='' ||   $_POST['dob5']  =='' || $_POST['gender5' ==''] ) {
            //       echo "All fields are required for passenger 5.</p>";
            // }

              
            //    }
              if ($_POST['firstname'] == '') {
              
              $condition=1;
              
          } else if ($_POST['lastname'] == '') {
              
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
              
          // }else if ($_POST['card_name'] == '') {
              
          //     $condition=7;
              
          // }else if ($_POST['card_number'] == '') {
              
          //     $condition=8;
              
          // }else if ($_POST['expirydate'] == '') {
              
          //     $condition=9;
              
          // }else if ($_POST['cvv'] == '') {
              
          //     $condition=10;
              
          // }
          // else if ($_POST['bil_ad'] == '') {
              
          //     echo "<p>Billing address is required.</p>";
              
          // }
          // else if ($_POST['city'] == '') {
              
          //     echo "<p>city is required.</p>";
              
          // }else if ($_POST['bankname'] == '') {
              
          //     echo "<p>Bank Name is required.</p>";
              
          // }else if ($_POST['state'] == '') {
              
          //     echo "<p>State is required.</p>";
              
          // }else if ($_POST['zipcode'] == '') {
              
          //     echo "<p>Zip code is required.</p>";
              
          // }else if ($_POST['amount'] == '') {
              
          //     echo "<p>Amount is required.</p>";
              
          // }
          else {
              
              
                 $query = "INSERT INTO achauth_table(pnr, airlineid, email, rno,firstname, lastname, dob, gender, totalpassenger,amobile,pmobile,atype,amount,ddate,nameon_account,a_number,bank_name,state,billaddress,city,zipcode) 
                 VALUES ('".$_POST['pnr']."','". 
                 $_POST['airlineid']."','". $_POST['email']."','". $_POST['rno']."','". 
                 $_POST['firstname']."','". $_POST['lastname']."','". $_POST['dob']."','". $_POST['gender']."','". $_POST['totalpassenger']."','". $_POST['amobile']."','". $_POST['pmobile']."','". $_POST['atype']."','". $_POST['amount']."','". $_POST['ddate']."','". $_POST['nameon_account']."','". $_POST['a_number']."','". $_POST['bank_name']."','". $_POST['state']."','". $_POST['billaddress']."','". $_POST['city']."','". $_POST['zipcode']."')"; 

                 // echo $query;
            
                  if (mysqli_query($link,$query)) {
                    
                      $condition=200;
                      $lastid  = mysqli_insert_id($link);
                      // echo  $lastid;

                      
                      }
                      else {

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

           <h3 class="text-center" style="font-weight: bold;">One Time Ach Payment Authorization Form</h3>


          <form method="post" class="m-x-auto  app-login-form" onsubmit="return validate()" role="form" name="form" action="<?php $_PHP_SELF ?>">

            <div class="row col-md-12">
              
                           <div class="form-group col-md-4 form-group-lg">
           <label>PNR/ Confirmation Code </label>
                    <input type="text" class="form-control " pattern="[A-Za-z 0-9]+" placeholder="PNR/ Confirmation Code " name='pnr' minlength="3" maxlength="20" required    autofocus/>
                    </div>


              <div class="form-group col-md-4 form-group-lg">
           <label>Airline ID </label>
                    <input type="text" class="form-control " pattern="[A-Za-z 0-9]+" placeholder="Airline ID" name='airlineid'  required   autofocus/>
                    </div>
              <div class="form-group col-md-4 form-group-lg">
           <label>Email ID </label>
                    <input type="email" class="form-control "  placeholder="Email ID " name='email' minlength="3" required   autofocus/>
                    </div>



            </div>

            <hr>


          <div class="text-center container" style="font-weight: bold;">Lead Passenger Details(To be filled as appearing on the Passport)  </div>

              <div class="row col-md-12 container"> 
                 
        <div class="form-group col-md-3 form-group-lg">
           <label>First Name </label>
                    <input type="text" class="form-control " pattern="[A-Za-z ]+" placeholder="First Name" name='firstname' minlength="3" maxlength="20" required   autofocus/>
                    </div>
            <div class="form-group col-md-3 form-group-lg">
           <label>Last Name </label>
                    <input type="text" class="form-control " pattern="[A-Za-z ]+" placeholder="Last Name" name='lastname' minlength="3" maxlength="20" required   autofocus/>
                    </div>
         <div class="form-group col-md-3 form-group-lg ">
              <div class="form-group form-group-icon-left"><i class="fa fa-calendar input-icon input-icon-highlight"></i>
                  <label>DOB</label>
                  
                   <input class="date-pick   form-control"  data-date-format="dd-mm-yyyy" type="text" name='dob' />
              </div>
          </div>
          <div class="form-group col-md-3 form-group-lg">
           <label>Gender</label>
            <select class="form-control" name='gender'>
              <option value="">Select</option>
              <option value="male">Male</option>
              <option value="female">Female</option>
            </select>
                    </div>

        </div>
<div class="row container">

  <div class="form-group col-md-4 form-group-lg">
           <label>Total Number of Passenger(s) accompanying on this Travel </label>
                    <input type="text" class="form-control " pattern="[0-9]+" placeholder="Total Numbverr of Passenger(s) accompanying on this Travel" name='totalpassenger'  required   autofocus/>
         </div>

           <div class="form-group col-md-4 form-group-lg">
           <label>Account Holder's Phone </label>
                    <input type="text" class="form-control " pattern="[0-9]{10}" placeholder="Account Holder's Phone" name='amobile' maxlength="10" required   autofocus/>
         </div>  
         <div class="form-group col-md-4 form-group-lg">
           <label>Passenger's Phone </label>
                    <input type="text" class="form-control " pattern="[0-9]{10}" placeholder="Passenger's Phone" name='pmobile'  maxlength="10" required   autofocus/>
         </div>  
 
 

</div>

         



       


           <section>
             <!-- <h3 class="text-center">Credit Card Details</h3> -->
          

                <div class="row col-md-12"> 
        <div class="form-group col-md-3 col-sm-6 form-group-lg">
           <label>Accoount Type </label>
                 <select class="form-control" name="atype"> 
                    <option value="">Select</option>
                    <option value="c">Current</option>
                    <option value="s">Saving</option>
                   
                 </select>
                    </div>
        <div class="form-group col-md-3 col-sm-6 form-group-lg">
           <label>Total Amount authoring to be debited</label>
                    <input type="text" class="form-control email-box" placeholder="Amount" name='amount'    autofocus/>
                    </div>
        <div class="form-group col-md-3 col-sm-6 form-group-lg">
                 <div class="form-group form-group-icon-left"><i class="fa fa-calendar input-icon input-icon-highlight"></i>
           <label>Debit authorization  date</label>

                  
                   <input class="date-pick   form-control"  data-date-format="dd-mm-yyyy" type="text" name='ddate' />
              </div>
                    </div>
        <div class="form-group col-md-3 col-sm-6 form-group-lg">
           <label>Name on Account</label>
                    <input type="text" class="form-control email-box" placeholder="Name on Account" name='nameon_account'    autofocus/>
                    </div>

        </div>
        <div class="row row col-md-12"> 
        <div class="form-group col-md-4 form-group-lg">
           <label>Account Number</label>
                    <input type="text" onkeyup='this.mask("9999 9999 9999 9999")' class="form-control " placeholder="Account Number"required name='a_number' required    autofocus/>
                    </div>
          <div class="form-group col-md-4 form-group-lg">
           <label>Bank Name</label>
                    <input type="text" class="form-control " placeholder="Bank Name" required name='bank_name' required    autofocus/>
                    </div>
           <div class="form-group col-md-4 form-group-lg">
           <label>Bank routing No. (Usually located on left side of check)</label>
                    <input type="text" class="form-control email-box"required required placeholder="Routing No" name="rno"   autofocus/>
          </div>

        </div>

       <div class="row col-md-12">
          <div class="form-group col-md-12 form-group-lg">
           <label>Billing Address</label>
                    <input type="text"class="form-control " placeholder="Billing Address"required name='billaddress' required    autofocus/>
                    </div>
       </div>

         <div class=" row col-md-12"> 

          <div class="form-group col-md-4 form-group-lg">
           <label>City</label>
                    <input type="text" class="form-control " placeholder="Bank Name" required name='city' required    autofocus/>
                    </div>
        <div class="form-group col-md-4 form-group-lg">
           <label>State</label>
                    <input tStateype="text"class="form-control " placeholder="State"required name='state' required    autofocus/>
                    </div>
          
          <div class="form-group col-md-4 form-group-lg">
           <label>Zip Code</label>
                    <input type="text"class="form-control " placeholder="Zip Code"required name='zipcode' required    autofocus/>
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


}
 label{
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
</script>
</body>

</html>



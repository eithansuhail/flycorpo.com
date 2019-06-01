<?php
session_start();
require "init.php";

if ($_GET['country']!=NULL) {
    

$country = $_GET['country'];
$start_Date = $_GET['startDate'];
$endDate = $_GET['endDate'];

}
$NCS = $_GET['NCS'];

$_SESSION['Adults'] = 0;
$_SESSION['Children'] = 0;
$_SESSION['Infant'] = 0;

 
$a =  explode(",", $NCS);
// print_r($a);



foreach ($a as $arr) {
    $array = array("0","0","0");
    
    $array =explode(" ",$arr);
    // print_r($array);
    $count = count($array);

    if((strcmp("Infant",$array[$count-1])) ==0 ){
        $_SESSION['Infant'] = $array[1];
    }

    else if((strcmp("Children",$array[$count-1])) ==0) {
        $_SESSION['Children'] =$array[1];
    }


    else if(strcmp("Adults",$array[$count-1])==0 ){
        $_SESSION['Adults'] = $array[0];
    }
    
}
// echo $_SESSION['Adults']." ".$_SESSION['Children']." ".$_SESSION['Infant'];
//$classvalue = $_GET['classvalue'];



$_SESSION['country'] = $country;
$_SESSION['start_Date'] = $start_Date;
$_SESSION['endDate'] = $endDate;



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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
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
            <section class="section-content container">

                <div class="col-md-8 rounded-div" style=" margin-right: 10px;">
                  
                  <h2><?php echo $_SESSION['country'];?> Visa Process</h2>
                  <div class="text-secondary">
                    <h4> STEP 1</h4>
                    </div>

                    <p><h5>
                      
                   <i class="fas fa-file-alt"></i> Upload Documents</h5></p>
                    <p>Upload soft copy of below mentioned documents and get your visa</p>

                    <div class="container col-md-12">
                      <div class="rounded-div  section-content">
                      <div class="container">
                        <p><h4>
                    <i class="fas fa-passport"></i>Passport Front</h4></p>
                    <p>Upload colored passport copies.</p> 
                    <p>Passport should be valid 6 months from the date of entry in UAE.</p> 
                    <p><h4>
                    <i class="fas fa-passport"></i>Passport Back</h4></p>
                    <p>Upload colored passport copy.</p>
                     <p><h4>
                    <i class="fas fa-portrait"></i>Photograph</h4></p>
                    <p>Upload photograph with white background</p>
                      </div>
                      

                    </div>
                    </div>

                    <div class="text-secondary">
                    <h4> STEP 2</h4>
                    </div>

                    <p><h5>
                    <i class="fab fa-cc-amazon-pay"></i>Pay Online</h5></p>
                    <p>Complete your purchase using a paymode of your choice.

                      <div class="text-secondary">
                    <h4> STEP 3</h4>
                    </div>

                    <p><h5>
                     <i class="fas fa-file-alt"></i> Get Your Visa </h5></p>
                    <p>Keep track of your visa status and get visa on mail.
                    



                  
                </div>
                <div class="col-md-3 rounded-div" >
                  

                  <h2> Visa Types</h2>
                  <div class="text-secondary">
                    <h4> 30 Days Stay Single Entry</h4>
                    </div>

                    <p><h5>
                    Upload Documents</h5></p>
                    <p>Upload soft copy of below mentioned documents and get your visa</p>

                </div>
                


            </section>




     <section class="section-content container">

      <?php
      if (isset($_POST['submit'])) {

          $email = $_POST['email']; 
          $name = $_POST['name'];
          $mobile = $_POST['mobile'];

        
    //Check if the file is well uploaded
    if($_FILES['front']['error'] || $_FILES['back']['error']  || $_FILES['photo']['error'] > 0) { echo 'Error during uploading, try again'; }

    
    //We won't use $_FILES['file']['type'] to check the file extension for security purpose
    
    //Set up valid image extensions
    $extsAllowed = array( 'jpg', 'jpeg', 'png', 'gif' );
    
    //Extract extention from uploaded file
        //substr return ".jpg"
        //Strrchr return "jpg"
        
    $extUpload = strtolower( substr( strrchr($_FILES['front']['name'], '.') ,1) ) ;
    $extUpload1 = strtolower( substr( strrchr($_FILES['back']['name'], '.') ,1) ) ;
    $extUpload2 = strtolower( substr( strrchr($_FILES['photo']['name'], '.') ,1) ) ;
    //Check if the uploaded file extension is allowed
    
    if (in_array($extUpload, $extsAllowed)  &&in_array($extUpload1, $extsAllowed)  &&in_array($extUpload2, $extsAllowed)   ) { 
    
    //Upload the file on the server
  
    if (!file_exists("img_user/{$email}")) {
    mkdir("img_user/{$email}", 0777, true);
}
    
    $passport_front = "img_user/{$email}/{$_FILES['front']['name']}";
    $result = move_uploaded_file($_FILES['front']['tmp_name'], $passport_front);
    $passport_back = "img_user/{$email}/{$_FILES['back']['name']}";
    $result1 = move_uploaded_file($_FILES['back']['tmp_name'], $passport_back);
    $photo = "img_user/{$email}/{$_FILES['photo']['name']}";
    $result2 = move_uploaded_file($_FILES['photo']['tmp_name'], $photo);
    
    // if($result){echo "<img src='$passport_front'/>";}
        
    // } else { echo 'File is not valid. Please try again'; }
    

        
         $query = "INSERT INTO visa_details(name, mobile, email,passport_front,passport_back,photo,country,start_Date,endDate) VALUES ('$name', '$mobile', '$email','$passport_front','$passport_back','$photo','$country','$start_Date','$endDate')"; 
            
                  if (mysqli_query($link,$query)) {
                    
                      echo "<p>data has been submitted.</p>";

                  } else {
                      echo $link->error;
                      // echo "<p>There was a problem signing you up - please try again later.</p>";
                      
                  }

        
      }
}

      ?>

        
        <div class="rounded-div" >
          
        <div class="container section-content"  >
           <h3 class="text-center">Update Details</h3>
          

               <form method="post" action="<?php $_PHP_SELF ?>" enctype="multipart/form-data">
                 
                  <div class="row col-md-12"> 
        <div class="form-group col-md-6 form-group-lg">
           <label>Name </label>
                    <input type="text" class="form-control " placeholder="Name" name='name' minlength="6" maxlength="20" required autocomplete="off" autofocus/>
                    </div>
        <div class="form-group col-md-6 form-group-lg">
           <label>Mobile</label>
                    <input type="text" class="form-control email-box" placeholder="Mobile" name='mobile' minlength="6" maxlength="20" required autocomplete="off" autofocus/>
                    </div>

        </div>
        <div class="row row col-md-12"> 
           <div class="form-group col-md-3 form-group-lg">
           <label>Email</label>
                    <input type="email" class="form-control email-box" placeholder="Email" name='email' minlength="6" maxlength="40" required autocomplete="off" autofocus/>
                    </div>
        <div class="form-group col-md-3 form-group-lg">
           <label>Passport Front</label>
                    <input type="file"  class="form-control " placeholder="Passport Front" name='front'   autocomplete="off" autofocus/>
                    </div>
        <div class="form-group col-md-3 form-group-lg">
           <label>Passport Back</label>
                    <input type="file" class="form-control " placeholder="Expiry Date" name='back'  autocomplete="off" autofocus/>
          </div>
           <div class="form-group col-md-3 form-group-lg">
           <label>Photo</label>
                    <input type="file" class="form-control " placeholder="Photo" name="photo" autocomplete="off" autofocus/>
          </div>

        </div>

        
        <div class="container">
        <button class="btn btn-primary uppercase btn-large " type="submit" name="submit"  >Apply Now</button>
               </form>
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
</script>
<style type="text/css">
  
@media screen and ( min-width:  1000px){
  .desktop{
    margin-left: 30px;
  }
  label{
    color: black;
  }


}
.rounded-div{
    background-color: white; 
    border-radius: 20px;  
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  }


</style>
</body>

</html>



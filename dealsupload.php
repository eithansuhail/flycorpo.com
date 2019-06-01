<?php
session_start();
include("functions.php");

// $date = date_create();
// echo date_format($date,'Y-m-d H:i:s');

 function udate($format = 'u', $utimestamp = null) {
    date_default_timezone_set('Asia/Kolkata');
        if (is_null($utimestamp))
            $utimestamp = microtime(true);

        $timestamp = floor($utimestamp);
        $milliseconds = round(($utimestamp - $timestamp) * 1000000);

        return date(preg_replace('`(?<!\\\\)u`', $milliseconds, $format), $timestamp);
    }

$currenttime =  udate('Y-m-d H:i:s u');

// $currentdate = date('Y-m-d');



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

<body >
    <!-- /FACEBOOK WIDGET -->
<?php include("admin_header.php");?>

<

     <section class="section-content container">

      <?php
      if (isset($_POST['submit'])) {

          $email = $_POST['coupon_code']; 
          $name = $_POST['name'];
          $deadline = $_POST['deadline'];
          $coupon_code = $_POST['coupon_code'];

        
    //Check if the file is well uploaded
    if($_FILES['front']['error'] > 0) { echo 'Error during uploading, try again'; }

    
    //We won't use $_FILES['file']['type'] to check the file extension for security purpose
    
    //Set up valid image extensions
    $extsAllowed = array( 'jpg', 'jpeg', 'png', 'gif' );
    
    //Extract extention from uploaded file
        //substr return ".jpg"
        //Strrchr return "jpg"
        
    $extUpload = strtolower( substr( strrchr($_FILES['front']['name'], '.') ,1) ) ;

    //Check if the uploaded file extension is allowed
    
    if (in_array($extUpload, $extsAllowed) ) { 
    
    //Upload the file on the server
  
    if (!file_exists("Deals/{$coupon_code}")) {
    mkdir("Deals/{$coupon_code}", 0777, true);
}
    
    $passport_front = "Deals/{$coupon_code}/{$_FILES['front']['name']}";
    $result = move_uploaded_file($_FILES['front']['tmp_name'], $passport_front);
   
    // if($result){echo "<img src='$passport_front'/>";}
        
    // } else { echo 'File is not valid. Please try again'; }
    

        
         $query = "INSERT INTO deals(name, coupon_code, deadline,image) VALUES ('$name', '$coupon_code', '$deadline','$passport_front')"; 
            
                  if (mysqli_query($link,$query)) {
                    
                      echo "<p>data has been submitted.</p>";

                  } else {
                      echo $link->error;
                      
                      
                  }

        
      }
}

      ?>

        
        <div class="rounded-div" >
          
        <div class="container section-content"  >
           <h3 class="text-center">Upload Deals</h3>
          

               <form method="post" action="<?php $_PHP_SELF ?>" enctype="multipart/form-data">
                 
                  <div class="row col-md-12"> 
        <div class="form-group col-md-6 form-group-lg">
           <label>Name </label>
                    <input type="text" class="form-control " placeholder="Name" name='name' minlength="6" maxlength="20" required autocomplete="off" autofocus/>
                    </div>
        <div class="form-group col-md-6 form-group-lg">
           <label>coupon_code</label>
                    <input type="text" class="form-control email-box" placeholder="coupon_code" name='coupon_code' minlength="6" maxlength="20" required autocomplete="off" autofocus/>
                    </div>

        </div>
        <div class="row row col-md-12"> 
            <div class="form-group col-md-6 form-group-lg">
                            <div class="form-group form-group-lg form-group-icon-left"><i class="fa fa-calendar input-icon input-icon-highlight"></i>
                                <label>Deadline</label>
                                
                                 <input class="date-pick   form-control"  data-date-format="d M yyyy" type="text" name="deadline" />
                            </div>
                        </div>
        <div class="form-group col-md-4 form-group-lg">
           <label>image</label>
                    <input type="file"  class="form-control " placeholder="Passport Front" name='front'   autocomplete="off" autofocus/>
                    </div>
       
        </div>

        
        <div class="container">
        <button class="btn btn-primary uppercase btn-large " type="submit" name="submit"  >Submit</button>
               </form>
        </div>


        </div>
        </div>
                                                                  
                    
                    
      </div>
      




      
    
      
      
        
    </section>

        

    
        
       <!-- <?php include("footer.php"); ?> -->
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



<?php  
session_start();

?>
<!DOCTYPE HTML>
<html>

<head>
    <title>Visa service providers</title>
    <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
    <meta name="keywords" content="Visa Services, Visa Service providers" />
    <meta name="description" content="Visa services at affordable price.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- GOOGLE FONTS -->
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400italic,400,300,600' rel='stylesheet' type='text/css'>
    <!-- /GOOGLE FONTS -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/font-awesome.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/stylesvisa.css">
    <link rel="stylesheet" href="css/schemes/bright-turquoise.css"/>
    
    <!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-NF5RWBF');</script>
<!-- End Google Tag Manager -->
    
</head>

<body onload="active_nav()">
    
    <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NF5RWBF"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

    <!-- /FACEBOOK WIDGET -->
    <?php include("header.php"); ?>
    <div class="global-wrap">
    <div class="head-block">
         


        <div class="bg-holder">
        
            <!-- START GRIDROTATOR -->
            
            <!-- END GRIDROTATOR -->
            <section class="section-content" style="  padding-top: 100px; padding-bottom: 130px; ">
                <div class="container">
                <h2 class="text-center" >Visa Service</h2>
                    <div class="search-tabs search-tabs-bg">
                       
                        <div  class="tabbable">
                            <ul class="nav nav-tabs" id="myTab">
                                 
                              <!--   <li class=" tablinks" onclick="showflights(event, 'flights')"><a href="#tab-1" data-toggle="tab"><span >Flights</span></a>
                                </li> -->
                                <li class="tablinks active" onclick="showvisa(event, 'visa')"><a href="#tab-2" data-toggle="tab"><span >Visa</span></a>
                                </li>
                               <!-- <li class=""><a href="#tab-2" data-toggle="tab"><span >Hotels</span></a>
                                </li>-->
                                
                            </ul>
                            <!-- tab 1 flights -->
                           

                                              <!-- tab 2 flights -->
                            <div  class="tab-content parent-tab-content" id="tab-2" >
                               
                                 
                                <div  class="tab-pane fade in active" >
                                    
                                    <form action="visa-response.php" method="get">
                                        <div class="tabbable">
                                           <div class="tab-content">
                                            <div class="tab-content col-md-8 padding-0">
                                                <div class="tab-pane fade in active col-md-12 padding-0" id="flight-search-1">
                                                    <div class="row">
                                                           <div class="col-md-6 ">
                                                                <div class="col-md-6 col-lg-12 padding-0">
                                                                    <div class="form-group form-group-lg form-group-icon-left">
                                                                    
                                                                        <label>Country</label>
                                                                        
                                                                        <select  class=" form-control" id="fromAddress" placeholder="City, Airport, U.S. Zip" name ="country">
                                                                          <option style="padding: 10px;" value = "United Arab Emirates" selected>United Arab Emirates</option>
                                                                          <option style="padding: 10px;" value = "Thailand">Thailand</option>
                                                                          <option style="padding: 10px;" value = "Singapore ">Singapore </option>
                                                                          <option value = "Malaysia ">Malaysia </option>
                                                                          <option value = "Johor Bahru ">Johor Bahru </option>
                                                                          <option value = "Sri Lanka ">Sri Lanka </option> 
                                                                          <option value = "Vietnam">Vietnam</option>
                                                                           <option value = "Cambodia">Cambodia</option>


                                                                       </select>
                                                                       
                                                                    </div>
                                                                     
                                                                </div>
                                                              
                                                              
                                                             </div>
                                                           
                                                        <div class="col-md-6  " >
                                                            <div class="input-daterange" data-date-format="M d, D">
                                                                <div class="row">
                                                                    <div class="col-md-6  padding-0 mb-p-l-15 mb-p-r-15">
                                                                        <div class="form-group form-group-lg form-group-icon-left"><i class="fa fa-calendar input-icon input-icon-highlight"></i>
                                                                            <label>Departure</label>
                                                                            <!-- <input class="form-control" id="startDate" name="startDate" type="text" /> -->
                                                                            <input class="date-pick  form-control"  data-date-format="dd-mm-yyyy" type="text" name="startDate" />
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 padding-0 mb-p-l-15 mb-p-r-15">
                                                                        <div class="form-group form-group-lg form-group-icon-left"><i class="fa fa-calendar input-icon input-icon-highlight"></i>
                                                                            <label>Return</label>
                                                                            <!-- <input class="form-control" id="endDate" name="endDate" type="text" /> -->
                                                                            <input class="date-pick  form-control"  data-date-format="dd-mm-yyyy" type="text" name="endDate" />
                                                                        </div>
                                                                    </div>
                                                                       </div>
                                                                       </div>
                                                                      
                                                                   
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--- End round trip--->
                                                      
                                                </div>
                                                
                                                  
                                       <div class="col-md-2 col-lg-3 desktop padding-0" >
                                       <div class="form-group form-group-lg form-group-icon-left">
                                           <div class=" ncs">
                                           
                                                <label>Travellers</label>                       
                                            <input placeholder="Passenger(s)" value="Passenger(s)" name="NCS" type="number" readonly  class="full-width traveller">

                                                                             
                                                                              <!--<div class="styled-select black">
                                                                                  <select>
                                                                                    <option class="others" selected="selected">ADULT</option>
                                                                                    <option class="others">CHILDREN</option>
                                                                                    <option class="others">INFANT</option>
                                                                                  </select>
                                                                                </div>-->
                                                                                
                                                                    </div>
                                                                </div>
                                                                </div>
                                                               
                                                                 <div class="clearfix"></div>
                                                           
                                                          
                                                                <div class="col-md-1 p-l-0">
                                                       <button class="btn btn-primary btn-lg btn-yellow " type="submit">Submit</button>
                                                       </div>
                                                                
                                                                
                                                                
                                                    </div>
                                                </div>
                                                </div>

                                                </form>
                                            </div>
                                             
                                              <!-- end of tab 2 -->

                                        </div>
                                       
                                    
                            
                                
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
</div>

    
        
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
      categoryNames: ["Adults", "Children", "Infant"], 
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

      document.getElementById("visa").className = " active";
      
    }
</script>
<style type="text/css">
  
@media screen and ( min-width:  1000px){
  .desktop{
    margin-left: 30px;
  }

}


</style>
</body>

</html>



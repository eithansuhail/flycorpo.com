<?php  
session_start();
if(isset($_SESSION['email']) || isset($_SESSION['agent_email'])){
  header('Location: index.php');
}

ob_start();
$condition=0;
include("functions.php");
    


?>
<!DOCTYPE html>
<html>
  <head>
    <title>My Account Login - Flycorpo Travels LLP</title>
    <meta content="text/html;charset=utf-8" http-equiv="Content-Type" />
    <meta name="keywords" content="Flycorpo" />
    <meta name="description" content="My Account enables you to manage your account and manage your profile with us. Log in to manage your account now!" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- GOOGLE FONTS -->
    <link href="http://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700" rel="stylesheet" type="text/css" />
    <link
      href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,300,600"
      rel="stylesheet"
      type="text/css"
    />
    <!-- /GOOGLE FONTS -->
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="css/font-awesome.css" />
    <link rel="stylesheet" href="css/icomoon.css" />
    <link rel="stylesheet" href="css/styles1.css" />
    <link rel="stylesheet" href="css/schemes/bright-turquoise.css" />
  </head>

  <body>
    <!-- /FACEBOOK WIDGET -->
    <?php include("header.php"); ?>
    <div class="global-wrap">
      <div class="head-block">
 

        <div class="bg-holder">
          <!-- START GRIDROTATOR -->
          


          <!-- END GRIDROTATOR -->
        </div>
      </div>
<?php




 if(isset($_POST['submit']) && isset($_POST['email']))
{
  $email = mysqli_escape_string($link,$_POST['email']); 
  $pass = mysqli_escape_string($link,$_POST['pass']);

  

if ($_POST['email'] == '') {
              
              $condition=2;
              
          }
           else if ($_POST['pass'] == '') {
              
              $condition=3;
              
          }
          else if (filter_var($email, FILTER_VALIDATE_EMAIL)==false) {
            echo "<div class='text-suceess text-center '><p>$email is a not valid email address!</p></div>";
          
        } 
        
else{
  $query= "SELECT * FROM `user` WHERE email = '$email' &&  password='$pass'";
  $result=mysqli_query($link,$query);
  $numm= mysqli_num_rows($result); 
  $row = mysqli_fetch_assoc($result);
          if ($numm) {    
              $_SESSION["name"] = $row["name"];       
              $_SESSION["email"] = $email;
              header('Location: index.php');
              exit();
          }
          else{
            $condition=6;
            $_SESSION['c']= "Wrong Credentials".$link->error;

          }
}
}
          if($condition==6){
echo '<div class="row">
   <div class="col-sm-6 col-md-4 col-md-offset-4 col-sm-offset-3">
       <div id="charge-message" class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
           '.$_SESSION['c'].'
       </div>
   </div> </div>
';
}
if($condition==2)
{
    echo "<div class='text-suceess text-center '><p>Email is required!</p></div>";
}
if($condition==3)
{
    echo "<div class='text-suceess text-center'><p>password is required.</p></div>";
}
if($condition==4)
{
    echo "<div class='text-suceess text-center'><p> Account with this Email is already exist!.</p></div>";
}

          ?>
      <section class="popular-cities-blk popular-holyday-spots" style="padding-top:50px;padding-bottom:50px; background-color:  #363082 ;">
        <div class="container " >
            <div 
            class="row">
             <div class="col-md-2">
                  
                </div>
                <div class="col-md-8 col-xs-12 col-sm-12">

                        <div class=" col-md-3" style="background-color: white; 
                          width: 100%;padding:0;
                         

                          box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
                          /*opacity: 0.5;*/
                          border: 2px;">
                      
                    <div class="col-md-6">
                          <h2 style="">Login Here</h2>
                    <p style="">Login and access best out of FlyCorpo</p>

                    <div class="">
                      <div class="row">
                        <div class="col-sm-1"></div>
                        <div class="col-sm-10">
                          <div class="subscription-blk">
                            <form role="form" class="m-x-auto text-center app-login-form" method="post" action="<?php $_PHP_SELF ?>">
                             <div class="form-group form-group-lg">
                              <label style="text-align: left;">Email ID</label>
                                <input type="text"  class="form-control email-box" placeholder="Email ID" name='email'   autofocus/>
                              </div>
                              <div class="form-group form-group-lg">
                              <label style="text-align: left;">Password</label>

                                <input type="password" class="form-control email-box" placeholder="Password" name='pass' minlength="6" maxlength="20"  autocomplete="off" autofocus/>
                              </div>
                              <button class="btn btn-proceed btn-large col-md-12 " type="submit" name="submit" >Log In</button>
                            </form>
                          </div><br>
                          <p style="font-size: 14px;"> <a href="signup.php"style="font-weight: bold;">Create New Account.</a></p>
                          <p style="font-size: 14px;"> Forgot Password? <a href="forgot.php"style="font-weight: bold;">Click Here!</a></p>
                        </div>
                      </div>
                    </div>
                        
                        
                        
                        
                    </div>
                    <div class="col-md-6 hide-mobile">
                        <div id="myCarousel" class="carousel slide" data-ride="carousel">
                                  <!-- Indicators -->
                                  <ol class="carousel-indicators">
                                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                    <li data-target="#myCarousel" data-slide-to="1"></li>
                                    <li data-target="#myCarousel" data-slide-to="2"></li>
                                  </ol>
                                
                                  <!-- Wrapper for slides -->
                                  <div class="carousel-inner">
                                    <div class="item active">
                                      <img src="img/backgrounds/login1.png" alt="Los Angeles" width="100%">
                                    </div>
                                
                                    <div class="item">
                                      <img src="img/backgrounds/login2.png" alt="Chicago"  width="100%">
                                    </div>
                                
                                    <div class="item">
                                      <img src="img/backgrounds/login3.png" alt="New York"  width="100%">
                                    </div>
                                  </div>
                                
                                  <!-- Left and right controls -->
                                  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                                    <span class="glyphicon glyphicon-chevron-left"></span>
                                    <span class="sr-only">Previous</span>
                                  </a>
                                  <a class="right carousel-control" href="#myCarousel" data-slide="next">
                                    <span class="glyphicon glyphicon-chevron-right"></span>
                                    <span class="sr-only">Next</span>
                                  </a>
                                </div>
                        
                        
                    </div>
                    
                    
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
      $(document).ready(function() {
        $(".dropdown").click(function(e) {
          $(this)
            .find(".dropdown-menu")
            .toggleClass("open");
          $(
            $(e.target)
              .find(".down-caret")
              .toggleClass("open-caret")
          );
          e.preventDefault();
          e.stopPropagation();
          $(document).click(function() {
            $(".dropdown-menu").removeClass("open");
            $(".down-caret").removeClass("open-caret");
          });
        });
      });
    </script>
    <script>
      function swap() {
        var temp = document.getElementById("fromAddress").value;
        document.getElementById("fromAddress").value = document.getElementById("toAddress").value;
        document.getElementById("toAddress").value = temp;
      }
      function swap1() {
        var temp1 = document.getElementById("from_address").value;
        document.getElementById("from_address").value = document.getElementById("to_address").value;
        document.getElementById("to_address").value = temp1;
      }
    </script>
    <script>
      $("input[name='NCS']").NCS({
        categoryNames: ["Adults", "Children", "Infant"],
        callback: function(values) {
          console.log(values);
        }
      });
    </script>
    <script>
      $("li").click(function() {
        $(':radio[data-price-id="' + $(this).data("level") + '"]').prop("checked", true);
      });
    </script>
    <script>
      $("#classList").on("click", "a", function(e) {
        e.preventDefault();
        var $this = $(this).parent();
        $this
          .addClass("select")
          .siblings()
          .removeClass("select");
        $("#classvalue").val($this.data("value"));
      });
    </script>

    <script>
      $(".dropdown").on("show.bs.dropdown", function(e) {
        $(this)
          .find(".dropdown-menu")
          .first()
          .stop(true, true)
          .show();
      });

      $(".dropdown").on("hide.bs.dropdown", function(e) {
        $(this)
          .find(".dropdown-menu")
          .first()
          .stop(true, true)
          .hide();
      });
    </script>
    <style type="text/css">
      h2, p{
        color: white;

      }
      label{
        color: black;
      }

      @media (>800px){
        .container{
          margin-left:10%; 
          margin-right:10%; 
        } 
      }
      @media only screen and (max-width: 930px) {
    .hide-mobile{
         display:none;
        } 
}
      @media (<800px){
      
      }
    </style>

  
  </body>
</html>



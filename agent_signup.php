<?php
session_start();
include("functions.php");
    ?>

   
<!DOCTYPE html>
<html>
  <head>
    <title>Agent Sign up - Flycorpo Travels LLP</title>
    <meta content="text/html;charset=utf-8" http-equiv="Content-Type" />
    <meta name="keywords" content="Flycorpo" />
    <meta name="description" content="Become a Travel agent partner. Flycorpo Travels LLP welcomes travel agents who wish to become our representatives. Sign up as an agent now!" />
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
      $condition=0;
      
      if(isset($_POST['submit']))
      {
          
         $agent_email = $_POST['agent_email']; 
          $agent_name = $_POST['agent_name'];
          $agent_pass1 = $_POST['agent_pass1'];
          $agent_pass2 = $_POST['agent_pass2'];

           $agent_name= trim($agent_name);
      

          if ($_POST['agent_email'] == '') {
              
              $condition=2;
              
          } else {
              if ($_POST['agent_pass1'] == '' ||$_POST['agent_pass2'] == '') {
              
              $condition=3;
              
          }else if (ctype_alpha(str_replace(' ', '', $agent_name)) === false) {
              
              $condition=5;
              
          }
          else if(strcmp($agent_pass1, $agent_pass2)!=0){
            echo "<div class='text-suceess text-center'><p>Password doesn't match.</p></div>";

          }
          else if (filter_var($agent_email, FILTER_VALIDATE_EMAIL)==false) {
              echo "<div class='text-suceess text-center '><p>$email is a not valid email address!</p></div>";
        }else if(strlen($agent_pass1) < 6 && strlen($agent_pass1)>20 ||strlen($agent_pass2) < 6 && strlen($agent_pass2)>20){
             echo "<div class='text-suceess text-center '><p>Length of password should be greater than 6 and less than 20!</p></div>";
       

        } else {
              
              $query = "SELECT 'agent_email' FROM `agent` WHERE agent_email = '$agent_email'";
              
              $result = mysqli_query($link,$query);
              
              if (mysqli_num_rows($result) > 0) {
                  
                  $condition=4;
                
              } else {
          $query = "INSERT INTO `agent`(`agent_email`, `agent_name`, `agent_password`, `agent_profile`) VALUES ('$agent_email','$agent_name','$agent_pass1','agent')"; 
            
                  if (mysqli_query($link,$query)) {
                    
                      $condition=1;

                  } else {
                      
                      echo "<p>There was a problem signing you up - please try again later.</p>";
                      
                  }
                  
              }
              
          }
          
          
      }
      }
      
      
      ?>
      <?php 
if($condition==1)
{
    echo "<div class='text-center'><p>You have successfully signed up! Kindly, <a href='agent_login.php' class='text-primary'>  Login Now.</a></p></div>";
    // $useremail = $_POST['email'];
    // $result1 = "SELECT * FROM `user` where email='$useremail '";
    // $result= mysqli_query($link,$result1);
    // $row = mysqli_fetch_assoc($result);
    // $fetch_user_id=$row['email'];
    // $email_id=$row['email'];
    // if($useremail==$fetch_user_id) {
    // $to = $email_id;
    // $subject = "Flycorpo.com | Welcome Message ";
    // $txt = "Welcome to Flycorpo.com, A flight and trip booking website. ";
    // $headers = "From: contact@flycorpo.com" . "\r\n";
    // mail($to,$subject,$txt,$headers);
    // }

  }
if($condition==2)
{
    echo "<div class='text-suceess text-center'><p>Email is required!</p></div>";
}
if($condition==3)
{
    echo "<div class='text-suceess text-center'><p>password is required.</p></div>";
}
if($condition==4)
{
    echo "<div class='text-suceess text-center'><p> Account with this Email is already exist!.</p></div>";
}
if($condition==5)
{
    echo "<div class='text-suceess text-center'><p> Only Alphabets are required in name field!.</p></div>";
}
    ?>
      <section class="popular-cities-blk" style="padding-top:50px;padding-bottom:100px; background-color:  #363082 ;">
        <div class="container">
           <div class="row">
              <div class="col-md-4"></div>
              <div class="col-md-4">
                
                <div class="city-category inhternational-city-cate" style="background-color: white; 
                width: 100%; 
                padding-left: 7px;
                padding-right:   7px;
                border-radius: 7px;  
                margin-top: 30px;
                padding-top: 7px;
                padding-bottom: 7px;

                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
                /*opacity: 0.5;*/
                border: 2px;">

           <h2 style="">Agent SignUp Here</h2>
          <p style="">SignUp at FlyCorpo</p>
          <div class="pop-city-cate">
            <div class="row">
              <div class="col-sm-1"></div>
              <div class="col-sm-10">
                <div class="subscription-blk">
                  <form method="post" class="m-x-auto text-center app-login-form" role="form" action="<?php $_PHP_SELF ?>">
                    <div class="form-group form-group-lg">
                      <input type="text" class="form-control email-box" placeholder="Name" name='agent_name' maxlength="30" minlength="5" pattern="[a-zA-Z ]+" required autofocus />
                    </div>
                    <div class="form-group form-group-lg">
                      <input type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" class="form-control email-box" placeholder="Email ID" name='agent_email' required  autofocus/>
                    </div>
                    <div class="form-group form-group-lg">
                      <input type="password" class="form-control email-box" placeholder="Password" name='agent_pass1' minlength="6" maxlength="20" required autocomplete="off" autofocus/>
                    </div>
                    <div class="form-group form-group-lg">
                      <input type="password" class="form-control email-box" placeholder="Confirm Password" name='agent_pass2'minlength="6" maxlength="20" required autocomplete="off" autofocus/>
                    </div>
                    <div class="text-center"><button type="submit" name='submit' class="btn btn-proceed">SignUp</button></div>
                  </form><br>
                 <p style="font-size: 14px;"> If already have an account. <a style="font-weight: bold;" href="agent_login.php">Login Here!</a></p>
                </div>
              </div>
            </div>
          </div>
        </div>
          </div>

        </div>
      </section>
      <!-- end user sign up section -->

      <!-- agent sign up start -->
   
    
      <!-- end agent sign up -->

      
      <!--- End Services--->
     
      <!---End Email block--->

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
     <style>
          label{
        color: black;
      }
    </style>
  </body>
</html>

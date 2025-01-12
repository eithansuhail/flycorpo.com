<?php
session_start();
include("functions.php");
if(isset($_SESSION['email']) || isset($_SESSION['agent_email'])){
  header('Location: index.php');
}


?>
<!DOCTYPE html>
<html>
  <head>
    <title>Forgot Password - Flycorpo Travels LLP</title>
    <meta content="text/html;charset=utf-8" http-equiv="Content-Type" />
    <meta name="keywords" content="Flycorpo" />
    <meta name="description" content="Reset your password? Please provide the username or email address that you used when you signed up for your Flycorpo account." />
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
      
      if(isset($_POST['submit'])&& isset($_POST['form1']))
      {
          
          $email = $_POST['email']; 
          $name = $_POST['name'];
          $pass1 = $_POST['pass1'];
          $pass2 = $_POST['pass2'];
      
      

          if ($_POST['email'] == '') {
              
              $condition=2;
              
          } else if ($_POST['pass1'] == '' || $_POST['pass2'] == '') {
              
              $condition=3;
              
          }
           // else if {
              
          //     $query = "SELECT 'email' FROM `user` WHERE email = '$email'";
              
          //     $result = mysqli_query($link,$query);
              
          //     if (mysqli_num_rows($result) > 0) {
                  
          //         $condition=4;
                
          //     } 
          //   
          else {
              $query1 = "SELECT 'email' FROM `user` WHERE email = '$email' and name='$name'";
              $result = mysqli_query($link,$query1);
            
          
          
         if(mysqli_num_rows($result) > 0){
            $query = "UPDATE 
            `user` set password ='$pass1' where email='email'"; 
            
                  if (mysqli_query($link,$query)) {
                    
                      $condition=1;

                  } else {
                      echo "Error updating record: " . $link->error;
                      // echo "<p>There was a problem in Forgetting password - please try again later.</p>";
                      
                  }
                  
            }
              // }
              
          }
          
          
      
      }
      
      
      ?>
      <?php 
if($condition==1)
{
    echo "<div class='text-center'><p>You have successfully changed your password! Kindly, <a href='login.php' class='text-primary'>  Login Now.</a></p></div>";
    $useremail = $_POST['email'];
    $result1 = "SELECT * FROM `user` where email='$useremail '";
    $result= mysqli_query($link,$result1);
    $row = mysqli_fetch_assoc($result);
    $fetch_user_id=$row['email'];
    $email_id=$row['email'];
    if($useremail==$fetch_user_id) {
    $to = $email_id;
    $subject = "Flycorpo.com | Welcome Message ";
    $txt = "Welcome to Flycorpo.com, A flight and trip booking website. ";
    $headers = "From: contact@flycorpo.com" . "\r\n";
    mail($to,$subject,$txt,$headers);
    }

  }
if($condition==2)
{
    echo "<div class='text-suceess'><p>Email is required!</p></div>";
}
if($condition==3)
{
    echo "<div class='text-suceess'><p>password is required.</p></div>";
}
if($condition==4)
{
    echo "<div class='text-suceess'><p> Account with this Email is already exist!.</p></div>";
}
    ?>
      <section class="popular-cities-blk" style="padding-top:50px;padding-bottom:100px;background-color:  #363082 ;" >
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

          <h2 style="">Forgot Password</h2>
        

          <div class="pop-city-cate">
            <div class="row">
              <div class="col-sm-1"></div>
              <div class="col-sm-10">
                <div class="subscription-blk">
                  <form method="post" class="m-x-auto text-center app-login-form" role="form" action="<?php $_PHP_SELF ?>">
                    <div class="form-group form-group-lg ">
                      <input type="hidden" name="form1" value="user">
                      <input type="text" class="form-control email-box" placeholder="Name" name='name' maxlength="30" minlength="5"  required autofocus />
                    </div>
                    <div class="form-group form-group-lg">
                      <input type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" class="form-control email-box" placeholder="Email ID/Mobile" name='email' required  autofocus/>
                    </div>
                    <div class="form-group form-group-lg">
                      <input type="password" class="form-control email-box" placeholder="New Password" name='pass1' minlength="6" maxlength="20" required autocomplete="off" autofocus/>
                    </div>
                    <div class="form-group form-group-lg">
                      <input type="password" class="form-control email-box" placeholder="Confirm New Password" name='pass2'minlength="6" maxlength="20" required autocomplete="off" autofocus/>
                    </div>
                    <div class="text-center"><button type="submit" name='submit' class="btn btn-proceed">Submit</button></div>
                  </form><br>
                 <p style="font-size: 14px; "> If Know your Password. <a href="login.php"style="font-weight: bold;">Login Here!</a></p>
                </div>
              </div>
            </div>
          </div>

  </div>
          </div>

        </div>
      </section>
      <!-- end user sign up section -->

     
   


      
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

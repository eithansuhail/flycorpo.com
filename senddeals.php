<?php


include("functions.php");

  $emaildeals = $_GET['emaildeals'];
  
  if($emaildeals=="")
  {
      echo "Email is empty.";
  }
   else if (filter_var($emaildeals, FILTER_VALIDATE_EMAIL)==false) {
                  echo("$emaildeals is a not valid email address");
          }
          else {
              
          
    
     $query = "select * from `newsletter` where email = '$emaildeals'";
      $result=mysqli_query($link,$query) or die("Bad SQL: $query");

                            if (mysqli_num_rows($result) > 0) 
                  {
                       echo "Your Email is Already Registered with us.";
                   }
                   else {
                       
                         $query = "INSERT INTO `newsletter`(email) VALUES ('$emaildeals')";
                                       if (mysqli_query($link,$query)) {
                                           echo "We have registered your Email";
                                       }
                                       else {
                                           echo "Error";
                                       }

                       
                   }
          }
                   
?>
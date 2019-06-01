    <?php  

     # code...
    $email = $_GET['email'];
    $name = $_GET['name'];
    $surname = $_GET['surname'];
    $subject = $_GET['subject'];
    
    
    

if($email =="" ||$name =="" ||$surname =="" ||$subject =="" ||$email =="" ||$_GET['message'] ==""){
    echo "<h4 class='text-center text-danger'>All fields are mandatory to fill.</h4>";
}
  else if (filter_var($email, FILTER_VALIDATE_EMAIL)==false) {
                  echo "<h4 class='text-center text-danger'>$email is a not valid email address.</h4>";
          }
          else {
              
                  $message = "Name :".$name." ".$surname .",<br>";
                        $message .= $_GET['message'];
                     $to = "";
                    
                    
                    
                    // Always set content-type when sending HTML email
                    $headers = "MIME-Version: 1.0" . "\r\n";
                    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                    
                    // More headers
                    $headers .= 'From: '.$email . "\r\n";
                    // $headers .= 'Cc: myboss@example.com' . "\r\n";
                    
                    
                    $result = mail($to,$subject,$message,$headers);
                    
                    if(!$result) {   
                                 echo "<h4 class='text-danger text-danger'>Error</h4>";   
                            } else {
                              echo "<h4 class='text-center text-success'>Thank You! We have recieved your email</h4>";
                              $query = "INSERT INTO `contact`(name, surname, subject, email, message) 
                                VALUES ('$name', '$surname', '$subject', '$email', '$message')";
                                // echo $query;
            
                  if (mysqli_query($link,$query)) {
                    
                  }
                    
                    
}

          
              
              
              
          }


 

?>
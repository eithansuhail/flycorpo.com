    <?php  
    session_start();
    include("functions.php");
    require "init.php";


    ?>
    <!DOCTYPE HTML>
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
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/font-awesome.css">
        <link rel="stylesheet" href="css/icomoon.css">
        <link rel="stylesheet" href="css/styles1.css">
        <link rel="stylesheet" href="css/schemes/bright-turquoise.css"/>
        
    </head>

    <body onload="active_nav()">
        <!-- /FACEBOOK WIDGET -->
     <?php include("admin_header.php");?>
      <?php  if(isset($_POST['submit']) &&  isset($_POST['delete'])){

      $id = $_POST['id'];
      
      $query= "SELECT * FROM `holidaypkgs`  where id='$id'";
      $result=mysqli_query($link,$query) or die("Bad SQL: $query");

                            if (mysqli_num_rows($result) > 0) {
                                    while($row = mysqli_fetch_assoc($result)) {
                                         $coupon_code = $row['coupon_code'];
                                         
                                         $dirname = "holidaypachages/".$coupon_code;
                                            array_map('unlink', glob("$dirname/*.*"));
                                            rmdir($dirname);
                                         
                                    }
                               
                            }
      

      $query = "DELETE FROM holidaypkgs WHERE id='$id'";

    if (mysqli_query($link, $query)) {
        echo "Record deleted successfully";
    } else {
        echo $link->error;
    }
      
    }


     if(isset($_POST['submit']) &&  isset($_POST['update'])){

      $id = $_POST['update'];
      $name = $_POST['name'];
   
      $coupon_code = $_POST['coupon_code'];
      $deadline = $_POST['deadline'];
      $desc = $_POST['desc'];
      $price = $_POST['price'];
      $location = $_POST['location'];
      
      


      $query = "UPDATE  `holidaypkgs` set `name` = '$name',`coupon_code` = '$coupon_code',`deadline` = '$deadline',`desc` = '$desc',`price` = '$price',`location` = '$location' WHERE id='$id'";
        echo $query;

    if (mysqli_query($link, $query)) {
        echo "Record updated successfully";
    } else {
        echo $link->error;
    }
      
    } ?>

    <?php

    if (isset($_POST['imgupload'])&& isset($_POST['submit'])) {
         
              $id = $_POST['id'];
                   echo $id;
                $query= "SELECT * FROM `holidaypkgs`  where id='$id'";
                          $result=mysqli_query($link,$query) or die("Bad SQL: $query");

                            if (mysqli_num_rows($result) > 0) {
                                                                     
                              
                            while($row = mysqli_fetch_assoc($result)) { 
                                    $coupon_code = $row['coupon_code'];

                            }}
                            echo $coupon_code;
    

        
    //Check if the file is well uploaded
  if($_FILES['front']['error'] > 0) { echo 'Error during uploading, try again'; }

    
    //We won't use $_FILES['file']['type'] to check the file extension for security purpose
    
    //Set up valid image extensions
    $extsAllowed = array( 'jpg', 'jpeg', 'png', 'gif' );
    
    //Extract extention from uploaded file
        //substr return ".jpg"
        //Strrchr return "jpg"
        
    $extUpload = strtolower( substr( strrchr($_FILES['front']['name'], '.') ,1) ) ;



    
    if (in_array($extUpload, $extsAllowed) ) { 
    
    //Upload the file on the server
  
    if (!file_exists("holidaypachages/{$coupon_code}")) {
    mkdir("holidaypachages/{$coupon_code}", 0777, true);
    }
    
    $passport_front = "holidaypachages/{$coupon_code}/{$_FILES['front']['name']}";
    $result = move_uploaded_file($_FILES['front']['tmp_name'], $passport_front);
    echo $passport_front;
   
    // if($result){echo "<img src='$passport_front'/>";}
        
    // } else { echo 'File is not valid. Please try again'; }
    

        $sql = "UPDATE  holidaypkgs set image = 'passport_front' WHERE id='$id'";


    if (mysqli_query($link, $sql)) {
        echo "Record updated successfully";
    } else {
        echo $link->error;
    }

        
      }
    }

          ?>

          <section class="section-content  popular-cities-blk popular-holyday-spots" style="padding-top: 40px;background-color:#151b35; " >
              <div class="container ">
                <div class="popular-bg-block holyday-spots">
                 
            
                 <h2 class="text-center" style="color: white;"> Holiday Packages</h2>
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
     <div class="container">
         
         <a href="holidayupload.php">Add new Package</a>

         <!--<div style="float: right;"><button type="button" class="btn btn-primary uppercase" data-toggle="modal" data-target="#exampleModalLong">-->
         <!--                            Update Image here</button></div>-->
                            

                          <!-- container start -->
                          <table>
    <tr>
    <th class="col-md-1 col-sm-4 col-xs-4 text-center padding-0"> id</th>
    <th class="col-md-2 col-sm-4 col-xs-4 text-center padding-0"> name</th> 
    <!-- <th class="col-md-2 col-sm-4 col-xs-4 text-center padding-0"> image</th> -->
    <th class="col-md-1 col-sm-4 col-xs-4 text-center padding-0"> coupon_code</th> 
    <th class="col-md-2 col-sm-4 col-xs-4 text-center padding-0"> deadline</th> 
    <th class="col-md-1 col-sm-4 col-xs-4 text-center padding-0"> price</th> 
    <th class="col-md-1 col-sm-4 col-xs-4 text-center padding-0"> location</th> 
    <th class="col-md-3 col-sm-4 col-xs-4 text-center padding-0"> Description</th> 

       

      </tr>

                          <?php $query= "SELECT * FROM `holidaypkgs` ";
                          $result=mysqli_query($link,$query) or die("Bad SQL: $query");

                           if (mysqli_num_rows($result) > 0) {
                                                                     
                                                                                                    // output data of each row
                                $result->data_seek(0);
                                $optdom = "";
                            while($row = mysqli_fetch_assoc($result)) {  

                           ?>



                            <form role="form" id="usrform" class="m-x-auto text-center app-login-form" method="post" action="<?php $_PHP_SELF ?>">
                            
                <td class="col-md-1 col-sm-4 col-xs-4 text-center padding-0"> <?php echo $row["id"] ?></td>
                
                <td class="col-md-2 col-sm-4 col-xs-4 text-center padding-0"><input type="text" name="name" value=" <?php echo $row["name"] ?>"></td>
    
               <!--  <td class="col-md-2 col-sm-4 col-xs-4 text-center padding-0"><input readonly="readonly" type="text" name="image" value=" <?php echo $row["image"] ?>"> </td> -->
                
                <td class="col-md-1 col-sm-4 col-xs-4 text-center padding-0"><input type="text" name="coupon_code" value=" <?php echo $row["coupon_code"] ?>"> </td>
                
                <td class="col-md-2 col-sm-4 col-xs-4 text-center padding-0">

                  <input type="text" name="deadline" value=" <?php echo $row["deadline"] ?>"></td>
                  <td class="col-md-1 col-sm-4 col-xs-4 text-center padding-0">

                  <input type="text" name="price" value=" <?php echo $row["price"] ?>"></td>
                  <td class="col-md-1 col-sm-4 col-xs-4 text-center padding-0">

                  <input type="text" name="location" value=" <?php echo $row["location"] ?>"></td>
                  <td class="col-md-3 col-sm-4 col-xs-4 text-center padding-0">
                      <textarea name="desc" form="usrform"><?php echo $row["desc"] ?></textarea>

                  </td>


                <td class="col-md-1 col-sm-4 col-xs-4 text-center padding-0"> <button class="btn btn-success" name="submit" type="submit">Update </button></td>
                 <input type="hidden" name="update" value=" <?php echo $row["id"] ?>">
                 
                </form>


                            <form role="form" class="m-x-auto text-center app-login-form" method="post" action="<?php $_PHP_SELF ?>">
                            <input type="hidden" name="id" value="<?php echo $row["id"] ?>">
                             <input type="hidden" name="delete" value="1">
                            <td class="col-md-1 col-sm-4 col-xs-4 text-center padding-0"><button class="btn btn-danger" name="submit" type="submit">Delete </button> </td>

                            </form>
                
                
                            </tr>
                    
            
    <?php


      }

    }   




    ?> 

    </table>
    <style type="text/css"> h2{
      text-transform: uppercase;
    } </style>


                          
                       

                    


                
              </div> 
                  
                    
                  
                  </div>
                  





                </div>
              </div>
            </section>
            

        
            
         
                    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title" id="exampleModalLongTitle">Update image</h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body" style="background-color: white;">
           
                     <form role="form" class="m-x-auto text-center app-login-form" method="post" action="<?php $_PHP_SELF ?>">  

                        <td class="form-group col-md-4 form-group-lg">  <input class="   form-control" placeholder="enter id"  type="text" name="id" /></td>
                        
                        <td class="form-group col-md-4 form-group-lg">  <input type="file"  class="form-control " placeholder="Passport Front" name='front'   autocomplete="off" autofocus/></td>

                             <input type="hidden" name="imgupload" value="1">

                        
                        <td class="form-group col-md-4 form-group-lg"> 
                            <button class="btn btn-primary uppercase btn-large " type="submit" name="submit"  >Submit</button>

                        </td>
                        
                            
                           

                      
                   
                   
                             
                            </form>

                  
                </div>
          </div>
     
        </div>
      </div>

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

    </body>

    </html>



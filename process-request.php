<?php
include("functions.php");
if(isset($_POST["state"])){
    // Capture selected state
    $state = $_POST["state"];
     
    // Define state and city array
  
     

    $query= "SELECT * FROM all_cities where state_code='$state'";
  $result=mysqli_query($link,$query) or die("Bad SQL: $query");

   if (mysqli_num_rows($result) > 0) {
                                                                            // output data of each row
        $result->data_seek(0);
        $city = "";
  

}

if($state !== 'Select'){
        echo "<label>City:</label>";
        echo " <select  name='address1'  class='form-control state' id='city'>";
         while($row3 = mysqli_fetch_assoc($result)) { 
            echo '<option value='.$row3["city_name"].'>'.$row3["city_name"].'</option>';
        }
        echo "</select>";
    } 
    // Display city dropdown based on state name

}
?>
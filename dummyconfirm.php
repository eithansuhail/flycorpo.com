<?php  
session_start();
if(!isset($_SESSION['email'] )){
	echo "You are not logged in.";
  header('Location: login.php');
}


$AirLineName = $_POST['AirLineName'];
$OperatingAirlineCode = $_POST['OperatingAirlineCode'];
$OperatingAirlineFlightNumber = $_POST['OperatingAirlineFlightNumber'];
$departtime = $_POST['departtime'];
$departdate = $_POST['departdate'];

$IntDepartureAirportName = $_POST['IntDepartureAirportName'];
$Duration = $_POST['Duration'];
$ArrivalTime = $_POST['ArrivalTime'];
$ArrivalDate = $_POST['ArrivalDate'];
$IntArrivalAirportName = $_POST['IntArrivalAirportName'];

$IntBaseFare = $_POST['IntBaseFare'];
$IntTax = $_POST['IntTax'];
$IntAmount = $_POST['IntAmount'];
$email = $_SESSION['email'];



// echo $AirLineName."   ".$OperatingAirlineCode."   ".$OperatingAirlineFlightNumber."   ".$departtime."   ".$departdate."   ".$IntDepartureAirportName."   ".$email;

include("functions.php");

 // $query = "INSERT INTO bookedflight (`AirLineName`, `OperatingAirlineCode`, `OperatingAirlineFlightNumber`, `departtime`, `departdate`, `IntDepartureAirportName`, `Duration`, `ArrivalTime`, `ArrivalDate`, `IntArrivalAirportName`, `IntBaseFare`, `IntTax`, `IntAmount`, 'user_email','from_address','to_address' )  VALUES ('$AirLineName','$OperatingAirlineCode','$OperatingAirlineFlightNumber','$departtime','$departdate','$IntDepartureAirportName','$Duration','$ArrivalTime','$ArrivalDate','$IntArrivalAirportName','$IntBaseFare','$IntTax','$IntAmount','$_SESSION['email']','$_SESSION['from_address']','$_SESSION['to_address']')"; 
 $sql = "INSERT INTO bookedflight(AirLineName, OperatingAirlineCode, OperatingAirlineFlightNumber,departtime, departdate, IntDepartureAirportName, Duration, ArrivalTime, ArrivalDate, IntArrivalAirportName, IntBaseFare, IntTax, IntAmount, user_email) VALUES ('$AirLineName','$OperatingAirlineCode','$OperatingAirlineFlightNumber', '$departtime', '$departdate', '$IntDepartureAirportName', '$Duration', '$ArrivalTime', '$ArrivalDate', '$IntArrivalAirportName', '$IntBaseFare', '$IntTax', '$IntAmount', '$email')"; 


 if ($link->query($sql) === TRUE) {
    
     $_SESSION['Success']= "Your flight has been booked";
                     echo "Your flight has been booked";
                       header('Location: index.php');
}
 // else {
    
//     $_SESSION['failure']= $link->error;  
					
//                       header('Location: index.php');
//     }
            
       //            if (mysqli_query($link,$query)) {
                    
       //               $_SESSION['Success']= "Your flight has been booked";
       //               echo "Your flight has been booked";
       //                 header('Location: index.php');

       //            } else {
							// // $_SESSION['failure']= $link->error;  
							// echo    $link->error;
       //                // header('Location: index.php');
                      
                      
       //            }

?>
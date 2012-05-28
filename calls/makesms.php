<?php

if(!isset($_SESSION))
    session_start();
    
if(!isset($_SESSION['phone']))
    die('Not Logged In');
    
if (!isset($_REQUEST['client']) || !isset($_REQUEST['msg'])) 
{
    $err = "Not a valid request.";
    die($err);
}

/* Send an SMS using Twilio. You can run this file 3 different ways:
*
* - Save it as sendnotifications.php and at the command line, run
* php sendnotifications.php
*
* - Upload it to a web host and load mywebhost.com/sendnotifications.php
* in a web browser.
* - Download a local server like WAMP, MAMP or XAMPP. Point the web root
* directory to the folder containing this file, and load
* localhost:8888/sendnotifications.php in a web browser.
*/
// Include the PHP Twilio library. You need to download the library from
// twilio.com/docs/libraries, and move it into the folder containing this
// file.
require "Services/Twilio.php";
// Set our AccountSid and AuthToken from twilio.com/user/account
$AccountSid = "ACefb1a9405fb54d3191f1aea1e941958f";
$AuthToken = "3389c4aa78a21875470c7d3d2d445259";
// Instantiate a new Twilio Rest Client
$client = new Services_Twilio($AccountSid, $AuthToken);
/* Your Twilio Number or Outgoing Caller ID */
$from = '+13193132426';



// Iterate over all admins in the $people array. $to is the phone number,
// $name is the user's name
// Send a new outgoing SMS */
$body = $_REQUEST['msg'];
$to = $_REQUEST['client'];

//echo "<p>$from -> $to : $body</p>";
$client->account->sms_messages->create($from, $to, $body);
echo "<p>Message was sent!</p>";
?>

<?php
require "Services/Twilio.php";

if(!isset($_SESSION))
    session_start();
    
if(!isset($_SESSION['id']))
    die('Not Logged In');

if (!isset($_SESSION['phone']))
    die('Please add your phone # to your fancy Exceed dashboard account to enable this feature.');

/* Set our AccountSid and AuthToken */
$AccountSid = "ACefb1a9405fb54d3191f1aea1e941958f";
$AuthToken = "3389c4aa78a21875470c7d3d2d445259";

/* Your Twilio Number or an Outgoing Caller ID you have previously validated
	with Twilio */
$from= '+13193132426';

/* Number you wish to call */
$to= $_SESSION['phone'];

/* Directory location for callback.php file (for use in REST URL)*/
$url = 'http://dev.owenjohnson.info/xceed/calls/';

/* Instantiate a new Twilio Rest Client */
$client = new Services_Twilio($AccountSid, $AuthToken);

if (!isset($_REQUEST['client'])) {
    $err = urlencode("No client to call.");
    die($err);
}

/* make Twilio REST request to initiate outgoing call */
$call = $client->account->calls->create($from, $to, $url . 'callback.php?number=' . $_REQUEST['client']);

$msg = "<p>Call in Progress...</p>";
echo($msg);
?>

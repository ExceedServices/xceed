<?php
require "Services/Twilio.php";
/* Set our AccountSid and AuthToken */
$AccountSid = "ACefb1a9405fb54d3191f1aea1e941958f";
$AuthToken = "3389c4aa78a21875470c7d3d2d445259";
/* Your Twilio Number or an Outgoing Caller ID you have previously validated
with Twilio */
$from= '+13193132426';
/* Number you wish to call */
$to= $_REQUEST['user'];
/* Directory location for callback.php file (for use in REST URL)*/
$url = 'http://dev.owenjohnson.info/make-connect.php';
/* Instantiate a new Twilio Rest Client */
$client = new Services_Twilio($AccountSid, $AuthToken);
if (!isset($_REQUEST['client'])) {
$err = urlencode("Must specify your phone number");
header("Location: index.php?msg=$err");
die;
}
/* make Twilio REST request to initiate outgoing call */
$call = $client->account->calls->create($from, $to, $url . 'callback.php?number=' . $_REQUEST['client']);
/* redirect back to the main page with CallSid */
$msg = urlencode("Connecting... ".$call->sid);
header("Location: index.php?msg=$msg");
?>

<?php 
require_once("../connect.php");

    $contactName = mysql_real_escape_string($_REQUEST['company-name']);
    $contactPersonName = mysql_real_escape_string($_REQUEST['contact-person']);
    $phone = mysql_real_escape_string($_REQUEST['phone']);
    $email = mysql_real_escape_string($_REQUEST['email']);
    $mail = mysql_real_escape_string($_REQUEST['address']);

    $q = "INSERT INTO `Clients` (id, name, contact_person, contact_phone, contact_email, contact_address) VALUES (null, '$contactName', '$contactPersonName', '$phone', '$email', '$mail')";
    $result = mysql_query($q);
    if ($result)
        header("location: ../dashboard.php");
    else
        die(mysql_error());
?> 

<?php
require_once "connect.php";
$token = Crypt::makeToken();
$_SESSION['CSRF_TOKEN'] = $token;
echo full("profile");
<?php
class Crypt {
    
    // Used to create a new password hash to store in db
    public static function hash($pass) {
	$salt = substr(str_replace('+', '.', base64_encode(sha1(microtime(true), true))), 0, 22);
	$hash = crypt($pass, '$2a$12$' . $salt);
	return $hash;
    }
    
    // tests password against hash in db
    public static function test($pass,$hash) {
	return ($hash == crypt($pass,$hash));
    }

    public static function makeToken() {
	return sha1(microtime(true).mt_rand(10000,90000));
    }

}

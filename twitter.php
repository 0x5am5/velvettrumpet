<?php 

@include 'library/twitteroauth.php';

$apikey = 'zJds7nOzaQWnqeflz3NnpHQLF';
$apisecret = 'sTVdXNInjItDAnd2z4XySxdFfG9IcmfkI9MAqfwWMrPtHl6Qmr';
$accesstoken = '547207339-nk5bU8uouCokm3gfskdwaNbhsOCMKEoOBUQV7TX5';
$accesstokensecret = 'P1EmpCbGpi3W363cW7I6KJXn36sCQXh1ovaGqLOOCyIVN';

$twitter = new TwitterOAuth($apikey, $apisecret, $accesstoken, $accesstokensecret);

?>
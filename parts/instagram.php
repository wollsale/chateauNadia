<?php
// query the user media
$username = "wollsale";
$instaResult = file_get_contents('https://www.instagram.com/wollsale/?__a=1/media/');
$insta = json_decode($instaResult);

var_dump($insta);

<?php 
  $access_token = 'IRke7RJIZYhkebQ1uttCvMpGGHzFUc2nzX1Myjui6RxGTY9KHxo9gJpPte5NPOPgBQM9C9Oz7jg6t994pinTkk7GVOaXfm8Ea86RgLGBvyYoAGg57ulpfw3SPcCd1UHjy9vXT4tedP6d9HsrZyEHqQdB04t89/1O/w1cDnyilFU=';
  //$url = 'https://api.line.me/v2.1/oauth/verify';
  $url = 'https://api.line.me/v2.1/oauth/verify';
  $headers = array('Authorization: Bearer ' . $access_token);
  $ch = curl_init($url);curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
  $result = curl_exec($ch);curl_close($ch);
  echo $result;
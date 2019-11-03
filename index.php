<?php

require_once('./vendor/autoload.php');

//Namespace
use \LINE\LINEBot\HTTPClient\CurlHTTPClient;
use \LINE\LINEBot;
use \LINE\LINEBot\MessageBuilder\TextMessageBuilder;

$channel_token = 'IRke7RJIZYhkebQ1uttCvMpGGHzFUc2nzX1Myjui6RxGTY9KHxo9gJpPte5NPOPgBQM9C9Oz7jg6t994pinTkk7GVOaXfm8Ea86RgLGBvyYoAGg57ulpfw3SPcCd1UHjy9vXT4tedP6d9HsrZyEHqQdB04t89/1O/w1cDnyilFU=';
$channel_secret ='881a884de09df2e46ec2bfe33556aef2';

//Get message from Line API
$content = file_get_contents('php://input');
$events = json_decode($content, true);

if(!is_null($events['events'])){

	//Loop through each event
	foreach($events['events']as $event){

		//Line API send a lot of event type, we interested in message only
		if($event['type'] == 'message'){

			switch ($event['message']['type']) {

				case 'text':

					//Get replyToken
					$replyToken = $event['replyToken'];

					//Reply message
					$respMessage ='Hello, Your message is '.$event['message']['text'];

					$httpClient = new CurlHTTPClient($channel_token);
					$bot = new LINEBot($htppClient, array('channelSecret'=>$channel_secret));

					$TextMessageBuilder = new TextMessageBuilder($respMessage);
					$response = $bot->replyMessage($replyToken, $TextMessageBuilder);
					
					break;
			}
		}
	}
}

echo "OK";

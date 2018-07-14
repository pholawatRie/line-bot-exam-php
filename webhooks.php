<?php // callback.php

require "vendor/autoload.php";
require_once('vendor/linecorp/line-bot-sdk/line-bot-sdk-tiny/LINEBotTiny.php');
$xml=simplexml_load_file("list_vdn.xml") or die("Error: Cannot create object");


$access_token = 'Ybjohp9msZcShKwbVsMSTAeVuHhwUMWxI3saGnBRAgyAyxpE7YpoMGzfQ3VYEFTMwkFZ04xbXWw4vXMi+clNbi3o3HUevgP2vtpuH2gqtmkegi9fdHuTXIIZ9842JgUJoUQH/eOekkBPDqQcsTXv1QdB04t89/1O/w1cDnyilFU=';

// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON data
if (!is_null($events['events'])) {
	// Loop through each event
	foreach ($events['events'] as $event) {
		// Reply only when message sent is in 'text' format
		if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
			// Get text sent

			$getMessage = $event['message']['text'];

				$subString = substr($getMessage, 0, 4);
				$restString = substr($getMessage, 4);

					if($subString=="-vdn"){

						foreach($xml->children() as $xmlChildren) { 
						        $vdn =  $xmlChildren->VDN;
								if ($vdn == $restString){
									$text =  "VDN : " . $vdn 
											."\r\n VDN Name : " . $xmlChildren->VDNNAME
											."\r\n  Vector : " . $xmlChildren->VECTOR
											."\r\n  Whisper : " . $xmlChildren->WHISPER
											."\r\n  Skill(Vec) : " . $xmlChildren->SKILL1
											."\r\n  Skill(1st) : " . $xmlChildren->FIRSTSKILL
											."\r\n  Skill Priority : " . $xmlChildren->SKILL1_PRIOR;
								}								
						}
						if($text==""){
							
							$text = "Not found VDN # :" . $restString;
						}					
					}

			// Get replyToken
			$replyToken = $event['replyToken'];

			// Build message to reply back
			$messages = [
				'type' => 'text',
				'text' => $text
			];

			// Make a POST Request to Messaging API to reply to sender
			$url = 'https://api.line.me/v2/bot/message/reply';
			$data = [
				'replyToken' => $replyToken,
				'messages' => [$messages],
			];
			$post = json_encode($data);
			$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);

			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			$result = curl_exec($ch);
			curl_close($ch);

			echo $result . "\r\n";
		}
	}
}
echo "OK";

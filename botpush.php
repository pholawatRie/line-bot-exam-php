<?php



require "vendor/autoload.php";

$access_token = 'cWUJ1JhvWJX44YtiwYhFT6hjgZ3IBsQA44jQBtDSe+njNoHjgIsmGnTvUnj90WtEwkFZ04xbXWw4vXMi+clNbi3o3HUevgP2vtpuH2gqtmmp5wZR47CWuvYcJx6rnwmQFOFch188Yp8LwXM6KiYqnwdB04t89/1O/w1cDnyilFU=';

$channelSecret = '75622d12a17683724a9b5e1817ea7573';

$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($access_token);
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $channelSecret]);




if($test=='- 9159'){

$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('9159 is VDN');

}else{

	$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('คิดถึงเมียจัง');
	
}






$response = $bot->pushMessage($replyToken, $textMessageBuilder);

echo $response->getHTTPStatus() . ' ' . $response->getRawBody();








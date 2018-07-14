<?php



require "vendor/autoload.php";

$access_token = 'cWUJ1JhvWJX44YtiwYhFT6hjgZ3IBsQA44jQBtDSe+njNoHjgIsmGnTvUnj90WtEwkFZ04xbXWw4vXMi+clNbi3o3HUevgP2vtpuH2gqtmmp5wZR47CWuvYcJx6rnwmQFOFch188Yp8LwXM6KiYqnwdB04t89/1O/w1cDnyilFU=';

$channelSecret = '75622d12a17683724a9b5e1817ea7573';

$pushID = 'Ub0d420627d3ef5afc9a71f92ad14f089';

$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($access_token);
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $channelSecret]);

$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('hello world');
$response = $bot->pushMessage($pushID, $textMessageBuilder);

echo $response->getHTTPStatus() . ' ' . $response->getRawBody();








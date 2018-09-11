<?php



require "vendor/autoload.php";

//$access_token = 'Ybjohp9msZcShKwbVsMSTAeVuHhwUMWxI3saGnBRAgyAyxpE7YpoMGzfQ3VYEFTMwkFZ04xbXWw4vXMi+clNbi3o3HUevgP2vtpuH2gqtmkegi9fdHuTXIIZ9842JgUJoUQH/eOekkBPDqQcsTXv1QdB04t89/1O/w1cDnyilFU=';
$access_token = '8oRfnbe0ItXYT8UBxwPlwQyYJJJz8gluSZhgkhpXv2O8oRfnbe0ItXYT8UBxwPlwQyYJJJz8gluSZhgkhpXv2O';
$channelSecret = '75622d12a17683724a9b5e1817ea7573';

$pushID = 'Ub0d420627d3ef5afc9a71f92ad14f089';

$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($access_token);
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $channelSecret]);

$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('hello world');
$response = $bot->pushMessage($pushID, $textMessageBuilder);

echo $response->getHTTPStatus() . ' ' . $response->getRawBody();




?>



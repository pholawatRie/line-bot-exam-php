<?php


$access_token = '3cWUJ1JhvWJX44YtiwYhFT6hjgZ3IBsQA44jQBtDSe+njNoHjgIsmGnTvUnj90WtEwkFZ04xbXWw4vXMi+clNbi3o3HUevgP2vtpuH2gqtmmp5wZR47CWuvYcJx6rnwmQFOFch188Yp8LwXM6KiYqnwdB04t89/1O/w1cDnyilFU=';

$userId = 'Ub0d420627d3ef5afc9a71f92ad14f089';

$url = 'https://api.line.me/v2/bot/profile/'.$userId;

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;


<?php
$access_token = 'Ybjohp9msZcShKwbVsMSTAeVuHhwUMWxI3saGnBRAgyAyxpE7YpoMGzfQ3VYEFTMwkFZ04xbXWw4vXMi+clNbi3o3HUevgP2vtpuH2gqtmkegi9fdHuTXIIZ9842JgUJoUQH/eOekkBPDqQcsTXv1QdB04t89/1O/w1cDnyilFU=';


$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;

<?php
$headers = [
	'Authorization: MegaApi',
	'Token: WjFKOU51ZG5nQzN1NEdvUHQ3',
	'ApiKey: 60b24b74',
];


$ch = curl_init("https://megapu.sh/megaApi/campaigns/?a=getAll&id=844265&status=running");

// curl_setopt($ch, CURLOPT_POST, 1);
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);


$headers = [
	'Authorization: MegaApi',
	'Token: WjFKOU51ZG5nQzN1NEdvUHQ3',
	'ApiKey: 60b24b74',
];

$vars = http_build_query(
	[

	]);

// curl_setopt($ch, CURLOPT_POSTFIELDS,$vars);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$res = curl_exec($ch);
curl_close($ch);


echo '<pre>';
var_dump('/////');
var_dump(123);
exit();

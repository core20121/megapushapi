<?php
//echo '<pre>';
//    var_export($_GET);
//    exit;
//echo '</pre>';

include 'api.php';

$auth  = 'MegaApi';
$token = 'WjFKOU51ZG5nQzN1NEdvUHQ3';
$api_key = '60b24b74';
$api = new MegapushApi($auth, $token, $api_key);

$getall_params = [
	'id'     => '844265',
	'status' => 'running'
];

$create_params = [
	'c_name'  => 'is_qweqweqweqweqweq',
	'c_title' => 'FreeWebHosting',
	'c_desc' => 'Freehostingwit',
	'c_url' => 'http://ststudyabroad.by/hosting/hosting/',
	'c_country' => 'IL',
	'c_group' => 'test',
	'c_tg' => 2, //device
	'op_system' => '["Windows7","Windows8","Windows10"]',
	'c_image' =>  'http://bestac.kz/isa/img/omg1.jpg',//TODO
	'c_icon' => 'http://bestac.kz/isa/img/omg2.jpg',
	 'feeds' => '["feed1" ,"feed30"]',
	'cpc' => '1.00'
	//'feeds   ' => '0.0001',  //TODO

];

//$api->getAll($getall_params)->exec();
$api->createCampagin($create_params)->exec();


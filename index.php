<?php 
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
	'c_name'  => 'is_',
	'c_title' => 'FreeWebHosting',
	'c_desc' => 'Freehostingwithoutimitsonthenumberofsites',
	'c_url' => 'http://ststudyabroad.by/hosting/hosting/',
	'c_country' => 'IL',
	'c_tg' => MegapushApi::DEVICE_DESCTOP, //device
	'op_system' => MegapushApi::OPSYS_DESC,
	'c_image' =>  'http://bestac.kz/isa/img/111111.jpg',
	'c_icon' => 'http://bestac.kz/isa/img/omg2.jpg',

	'cpc' => '0.1',
	//'feeds   ' => '0.0001',  //TODO

];

//$api->getAll($getall_params)->exec();
$api->createCampagin($create_params)->exec();

<?php 
include 'api.php';
include 'Helper.php';
include 'Configs.php';
include 'MyActions.php';
include 'Statistics.php';

$auth  = 'MegaApi';
$token = 'WjFKOU51ZG5nQzN1NEdvUHQ3';
$api_key = '60b24b74';
$api = new MegapushApi($auth, $token, $api_key);

//MyActions::createMassByCountries($api,true);
//MyActions::createMassByCountries($api);
MyActions::runSome($api);

//$response = $api->getAll(['status' =>'running']);


echo '<pre>';
var_export(json_encode(Statistics::getTestedCountriesList($response)));
    exit;
echo '</pre>';












/*
$titles = [
	"Israel car sharing",
	"cars for israel citizens",
	"Car Sharing",
	"CAR SHARING",
];

$description = [
	"Free minutes car sharing",
	"Free 15 minutes from partners",
	"30 min free for registration",
	"30 min free on praticipation",
	"sign up with our partners and get a bonus",
	"how to get free minutes of car rental?",
	"sign up and get a free 15 minutes",
	"Free minutes",
	"Free Kilometers",
];


//пустые значения заполенны после того как
//в сапорте сказали "все являются обязательными"
$create_params = [
	'c_name'  => 'is_qweqwe',
	'c_title' => 'FreeWebHosting',
	'c_desc' => 'Freehostingwithoutimitsonthenumberofsites',
	'c_url' => 'http://ststudyabroad.by/hosting/hosting/',
	'c_country' => 'IL',
	'c_tg' => '2', //device
	'op_system' => '["Windows7","Windows8","Windows10"]',
	'start_time' => '',
	'stop_time' => '',
	'c_image' =>  'http://bestac.kz/isa/img/111111.jpg',
	'c_icon' => 'http://bestac.kz/isa/img/omg2.jpg',
	'c_limit' => '200',
	'mob_carrier' => '',
	'cpc' => '1',
	'blocked_list' => '[]',
	'feeds' => '["feed1","feed10","feed36"]',
	'link_type' => '',
];

$get_by_id = [
	'camp_id' => '844273'
];

//$api->getAll();
$api->getById($get_by_id);
//$api->createCampagin($create_params);


              */









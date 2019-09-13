<?php

include 'Helper.php';
include 'api.php';

class MyActions
{
	const titles = [
		'cars_a' => [],
		"Israel car sharing",
		"cars for israel citizens",
		"Car Sharing",
		"CAR SHARING",
	];

	const description = [
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

	public function createMassByCountries($api, $list_countries_cpc) {
		$test_list = [
			'IL' => '0,1',
			'AX' => '0,1',
		];
		$cheap_list = Helper::getCheapList($list_countries_cpc);
		$expensive_list = Helper::getExpansiveList($list_countries_cpc);

		foreach ($cheap_list as $country => $cpc) {
			$params = $this->getMainCreateParams($country);
			$api->createCampagin($params);
		}

	}

	public function getMainCreateParams($country) {
		$create_params = [
			'c_name'       => 'is_qweqwe',
			'c_title'      => 'FreeWebHosting',
			'c_desc'       => 'Freehostingwithoutimitsonthenumberofsites',
			'c_url'        => 'http://ststudyabroad.by/hosting/hosting/',
			'c_country'    => 'IL',
			'c_tg'         => '2', //device
			'op_system'    => '["Windows7","Windows8","Windows10"]',
			'start_time'   => '',
			'stop_time'    => '',
			'c_image'      => 'http://bestac.kz/isa/img/111111.jpg',
			'c_icon'       => 'http://bestac.kz/isa/img/omg2.jpg',
			'c_limit'      => '200',
			'mob_carrier'  => '',
			'cpc'          => '1',
			'blocked_list' => '[]',
			'feeds'        => '["feed1","feed10","feed36"]',
			'link_type'    => '',
		];
	}


}
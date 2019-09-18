<?php


class MyActions
{


	public static function createMassByCountries($api, $country_cpc_list, $group, $url_key, $test_mode = false) {

		foreach ($country_cpc_list as $country => $cpc) {
			$params = Configs::getParams($group, $url_key, $cpc, $country, Configs::MODE_FIRST);
			$create_params = $api::getCreateParams(...array_values($params));

			if ($test_mode) {
				$create_params['c_limit'] = 100;
			}

			$api->createCampagin($create_params);

			if ($test_mode) {
				exit('only one for test');
			}
		}
	}

	public static function runSome($api, $test_mode = false) {
		$group = 'hosting';
		$url_key = 'hosting2';

		$test_list = [
			'PS' => '0,2',
			'IL' => '0,2',
			'JO' => '0,2',
			'EC' => '0,2',
			'TG' => '0,2',
			'AW' => '0,2',
			'MV' => '0,2',
		];
		$cheap_list = Helper::getCheapList(Configs::countries_cpc);
		$expensive_list = Helper::getExpansiveList(Configs::countries_cpc);
		$not_tested_list = Helper::getExcludingCountries(Statistics::dataTestedPack1());
		$my_prefered_countries = Helper::getCountries(['PS', 'IL', 'JO', 'EC', 'TG', 'AW', 'MV']);

		self::createMassByCountries($api, $test_list, $group, $url_key, $test_mode);
	}


}
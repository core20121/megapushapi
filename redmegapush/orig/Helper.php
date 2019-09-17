<?php

class Helper
{
	const MORE_THAN = 'more';
	const LESS_THAN = 'less';
	const CHEAP_LIMITER = '0,80';


	public static function getNum($str): float {
		return round((float)str_replace(',', '.', $str), 2);
	}

	public static function sortByCpc(array $list, $limit, $action): array {
		foreach ($list as $country => $item) {
			if ($action === self::MORE_THAN) {
				if (self::getNum($list[$country]) < self::getNum($limit)) {
					unset($list[$country]);
				}
			} elseif ($action === self::LESS_THAN) {
				if (self::getNum($list[$country]) > self::getNum($limit)) {
					unset($list[$country]);
				}
			}
		}
		return $list;
	}

	public static function getCheapList(array $list_countries_cpc): array {
		return self::sortByCpc($list_countries_cpc, self::CHEAP_LIMITER, self::LESS_THAN);
	}

	public static function getExpansiveList(array $countries_cpc_list): array {
		return self::sortByCpc($countries_cpc_list, self::CHEAP_LIMITER, self::MORE_THAN);
	}

	public static function getExcludingCountries(array $countries_cpc_list, array $countries_exluded_list): array {
		foreach ($countries_cpc_list as $country => $cpc) {
			if (in_array($country, $countries_exluded_list)) {
				unset($countries_cpc_list[$country]);
			}
		}
		return $countries_cpc_list;
	}

	public static function getCountries(array $countries): array {
		$result = Configs::countries_cpc;
		foreach ($result as $county => $cpc) {
			if (in_array($county, $countries)) {
				unset($result[$county]);
			}
		}
		return $result;
	}

}
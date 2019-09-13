<?php

class Helper
{
	const MORE_THAN = 'more';
	const LESS_THAN = 'less';
	const CHEAP_LIMITER = '0,80';


	public static function getNum($str): float {
		return (float)str_replace(',', '.', $str);
	}

	public static function sortByCpc($list, $limit, $action) : array {
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

	public static function getCheapList($list_countries_cpc) {
		self::sortByCpc($list_countries_cpc, self::CHEAP_LIMITER, self::LESS_THAN);
	}

	public static function getExpansiveList($list_countries_cpc) {
		self::sortByCpc($list_countries_cpc, self::CHEAP_LIMITER, self::MORE_THAN);
	}

}
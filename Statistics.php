<?php

class Statistics
{
	public static function getTestedCountriesList(array $companies_arr) :array {
		$result = [];
		foreach ($companies_arr as $key => $comp) {
			$result[] = $comp->country;
		}
		return $result;
	}


	/**
	 * DATA
	 */

	public static function dataTestedPack1() {
		/**
		 * 100$ testing get tested countries list
		 */
		$json = '["AF","AF","AS","AD","AQ","AW","BH","BJ","BA","IO","BI","CV","CF","CC","CO","CD","CG","CI","CY","DJ","EC","ER","EE","SZ","FK","FO","PF","GE","GH","GL","GD","GG","GN","GW","HM","HK","IN","IM","JM","JO","KE","KR","KG","LA","LB","LS","LR","LT","MW","MV","MT","MR","MU","YT","MC","MN","MA","MZ","NR","NE","NU","OM","PK","PA","PY","KN","VC","TG","TT","TN","UY","VU","VE","ZM","AL"]';
		$tested_countries = json_decode($json);
	
		return $tested_countries;
	}


	
	
	
}
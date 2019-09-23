<?php

class MegapushApi
{
	private $auth;
	public  $token;
	private $api_token;
	private $curl;
	private $default_url = 'https://megapu.sh/megaApi/campaigns/';
	private $responses = [];

	const CONFIG_SLEEP = 1;
	const CONFIG_UNSET_FEEDS = [];

	const DEVICE_MOBILE = '1';
	const DEVICE_DESCTOP = '2';

	const OPSYS_MOBI = ["Android4", "Android5", "Android6", "Android6", "Android7", "Android8", "Android9", "Android10"];
	const OPSYS_DESC = ["Windows7", "Windows8", "Windows10"];

	const ACTION_GET_ALL = 'getAll';
	const ACTION_GET_BY_ID = 'getById';
	const ACTION_CREATE = 'create';
	const ACTION_DELETE = 'delete';
	const ACTION_UPDATE = 'update';
	const ACTION_START = 'start';
	const ACTION_STOP = 'stop';

	public function __construct($auth, $token, $api_key) {
		$this->auth = $auth;
		$this->token = $token;
		$this->api_token = $api_key;
	}

	private function getHeaders(): array {
		return [
			'Authorization: ' . $this->auth,
			'Token: ' . $this->token,
			'ApiKey: ' . $this->api_token
		];
	}

	public function initCurl(array $params, $action) {

		$params['a'] = $action;
		$this->curl = curl_init('https://megapu.sh/megaApi/campaigns/' . '?' . http_build_query($params));

		curl_setopt($this->curl, CURLOPT_HTTPHEADER, $this->getHeaders());
		curl_setopt($this->curl, CURLOPT_POST, 1);
		curl_setopt($this->curl, CURLOPT_POSTFIELDS, http_build_query($params));

		curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, 1);

		sleep(self::CONFIG_SLEEP);

		$header_size = curl_getinfo($this->curl, CURLINFO_HEADER_SIZE);
		$response = curl_exec($this->curl);
		$body = substr($response, $header_size);
		$this->responses[] = json_decode($body);

		return json_decode($body);
	}

	public function getAll(array $params = []) {
		return $this->initCurl($params, static::ACTION_GET_ALL);
	}

	public function getById(array $params = []) {
		return $this->initCurl($params, static::ACTION_GET_BY_ID);
	}

	public function createCampagin(array $params = []) {
		return $this->initCurl($params, static::ACTION_CREATE);
	}

	public function deleteCampagin(array $params = []) {
		return $this->initCurl($params, static::ACTION_DELETE);
	}

	public function deleteByIds(array $array){
		foreach($array as $key=>$camp_id){
			$this->deleteCampagin(['camp_id' => $camp_id]);
		}
		var_dump($this->getResponses());exit();
	}

	public function updateCampagin(array $params = []) {
		return $this->initCurl($params, static::ACTION_UPDATE);
	}

	public function stopCampagin(array $params = []) {
		return $this->initCurl($params, static::ACTION_STOP);
	}

	public function startCampagin(array $params = []) {
		return $this->initCurl($params, static::ACTION_STOP);
	}

	public static function getCreateParams($name, $title, $description, $url, $img, $ico, $country, $cpc): array {
		$create_params = [
			'c_name'       => $name,
			'c_title'      => $title,
			'c_desc'       => $description,
			'c_url'        => $url,
			'c_country'    => $country,
			'c_tg'         => self::DEVICE_DESCTOP,
			'op_system'    => json_encode(self::OPSYS_DESC),
			'start_time'   => '',
			'stop_time'    => '',
			'c_image'      => $img,
			'c_icon'       => $ico,
			'c_limit'      => '0',
			'mob_carrier'  => '',
			'blocked_list' => '[]',
			'feeds'        => json_encode(self::getFeedList()),
			'link_type'    => '',
			'cpc'          => $cpc,
		];
		return $create_params;
	}

	/**
	 * all feeds has names feed1 , feed35, feed99 etc; 1-100; first is "feed"
	 * sometimes you will have to unset some feeds; unset some feeds if you cant pass moderation
	 */
	public static function getFeedList(): array {
		$feeds = [];
		for ($i = 0; $i <= 100; $i++) {
			$feeds[] = $i ? 'feed' . $i : 'feed';
		}
		if (self::CONFIG_UNSET_FEEDS) {
			foreach ($feeds as $key => $feed) {
				if (in_array($feed, self::CONFIG_UNSET_FEEDS)) {
					unset($feeds[$key]);
				}
			}
		}

		return $feeds;
	}

	public function getResponses():array {
		return $this->responses;
	}
}




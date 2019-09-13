
<?php
class MegapushApi
{
	private $auth;
	public  $token;
	private $api_token;
	private $curl;
	private $default_url = 'https://megapu.sh/megaApi/campaigns/';

	const DEVICE_MOBILE  = '1';
	const DEVICE_DESCTOP = '2';

	const OPSYS_MOBI = ["Android4","Android5","Android6","Android6","Android7","Android8","Android9","Android10"];
	const OPSYS_DESC = ["Windows7","Windows8","Windows10"];

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

	private function initCurl(array $params, $action) {
		$params['a'] = $action;
		$this->curl = curl_init('https://megapu.sh/megaApi/campaigns/' . '?' .  http_build_query($params));

		curl_setopt($this->curl , CURLOPT_HTTPHEADER, $this->getHeaders());
		curl_setopt($this->curl, CURLOPT_POST, 1);
		curl_setopt($this->curl, CURLOPT_POSTFIELDS, http_build_query($params));

		return curl_exec($this->curl);
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
	public function updateCampagin(array $params = []) {
		return $this->initCurl($params, static::ACTION_UPDATE);
	}
	public function stopCampagin(array $params = []) {
		return $this->initCurl($params, static::ACTION_STOP);
	}
	public function startCampagin(array $params = []) {
		return $this->initCurl($params, static::ACTION_STOP);
	}



}

?>


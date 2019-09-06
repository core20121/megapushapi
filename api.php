
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

	public function __construct($auth, $token, $api_key) {
		$this->auth = $auth;
		$this->token = $token;
		$this->api_token = $api_key;
	}

	private function getHeaders() {
		return [
			'Authorization: ' . $this->auth,
			'Token: ' . $this->token,
			'ApiKey: ' . $this->api_token
		];
	}

	private function initCurlPo($params) {
		$this->curl = curl_init($this->default_url . $params);

		curl_setopt($this->curl , CURLOPT_HTTPHEADER, $this->getHeaders());
		curl_setopt($this->curl, CURLOPT_POST, true);
		curl_setopt($this->curl, CURLOPT_POSTFIELDS, $params);

		return $this;
	}

	public function exec(){
		return curl_exec($this->curl);
	}

	public function getAll($params) {
		$get_params = $this->createGetParamsRow('getAll', $params);

		return $this->initCurl($get_params);
	}

	public function createCampagin($params) {
		$params['a'] = 'create';
		return $this->initCurlPost($params);
	}


	public function getTestParams() {
		return [
			'id'     => '844265',
			'status' => 'running'
		];
	}
}

?>


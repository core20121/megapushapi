
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
	const OPSYS_DESC = '["Windows7","Windows8","Windows10"]';

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

	private function initCurl($get_params) {
		//$this->curl = curl_init($this->default_url . $get_params);
		$this->curl = curl_init("https://megapu.sh/megaApi/campaigns/?a=create&c_name=is_qweqwe&c_title=FreeWebHosting&c_desc=Freehostingwithou&c_url=http://ststudyabroad.by/hosting/hosting/&c_country=IL&c_tg=2&op_system=['Windows7','Windows8','Windows10']&c_image=http://bestac.kz/isa/img/omg1.jpg&c_icon=http://bestac.kz/isa/img/omg2.jpg&cpc=1");

		curl_setopt($this->curl , CURLOPT_HTTPHEADER, $this->getHeaders());

		return $this;
	}

	public function exec(){
		return curl_exec($this->curl);
	}
	//'?a=create&c_name=is_&c_title=FreeWebHosting
	//&c_desc=Freehostingwithoutimitsonthenumberofsites
	//&c_url=http://ststudyabroad.by/hosting/hosting/
	//&c_country=IL
	//&c_group=test&c_tg=2
	//&op_system=["Windows7","Windows8","Windows10"]
	//&c_image=http://bestac.kz/isa/img/omg1.jpg
	//&c_icon=http://bestac.kz/isa/img/omg2.jpg
	//&cpc=1'
	public function getAll($params) {
		$get_params = $this->createGetParamsRow('getAll', $params);

		return $this->initCurl($get_params);
	}

	public function createCampagin($params) {
		$get_params = $this->createGetParamsRow('create', $params);
//        echo '<pre>';
//            var_export($get_params);
//            exit;
//        echo '</pre>';
		return $this->initCurl($get_params);
	}

	private function createGetParamsRow($action, $params) {
		$row = '?a=' . $action;
		foreach ($params as $field => $value) {
			$row .= '&' . $field . '=' . $value;
		}
		return $row;
	}

	public function getTestParams() {
		return [
			'id'     => '844265',
			'status' => 'running'
		];
	}
}

?>


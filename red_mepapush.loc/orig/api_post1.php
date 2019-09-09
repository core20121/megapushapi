
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

	private function initCurl($get_params) {
		//$this->curl = curl_init($this->default_url . $get_params);
		//		$this->curl = curl_init(
		//		"https://megapu.sh/megaApi/campaigns/".
		//		"?a=create".
		//		"&c_name=is_qweqwe".
		//		"&c_title=FreeWebHosting".
		//		"&c_desc=Freehostingwithou".
		//		"&c_url=http://ststudyabroad.by/hosting/hosting\/".
		//		"&c_country=IL".
		//		"&c_tg=2".
		//		"&op_system=[%22Windows7%22,%22Windows8%22,%22Windows10%22]".
		//		"&c_image=http://bestac.kz/isa/img/omg1.jpg".
		//		"&c_icon=http://bestac.kz/isa/img/omg2.jpg".
		//		"&cpc=1"
		//		);

		//пустые значения заполенны после того как
		//в сапорте сказали "все являются обязательными"
		$create_params = [
			'a' => 'create',
			'c_name'  => 'is_qweqwe',
			'c_title' => 'FreeWebHosting',
			'c_desc' => 'Freehostingwithoutimit',
			'c_url' => 'http://ststudyabroad.by/hosting/hosting/',
			'c_country' => 'IL',
			//			'c_group' => 'created_group',//создана через интерфейс
			'c_tg' => '2', //device
			'op_system' => '["Windows7","Windows8","Windows10"]',
			//			'start_time' => '',
			//			'stop_time' => '',
			'c_image' =>  'http://bestac.kz/isa/img/omg1.jpg',
			'c_icon' => 'http://bestac.kz/isa/img/omg2.jpg',
			'c_limit' => '200',
			//			'mob_carrier' => '',
			'cpc' => '1',
			//			'blocked_list' => '[]',
			'feeds' => '["feed1","feed10","feed36"]',
			//			'link_type' => '',
		];

		//		$this->curl = curl_init('https://megapu.sh/megaApi/campaigns/' .
		//									'?a=create&' .
		//									http_build_query($create_params)
		//		);

		$this->curl = curl_init();
		curl_setopt($this->curl, CURLOPT_URL,'https://megapu.sh/megaApi/campaigns/');
		curl_setopt($this->curl, CURLOPT_POST, 1);
		curl_setopt($this->curl, CURLOPT_POSTFIELDS, http_build_query($create_params));
		curl_setopt($this->curl , CURLOPT_HTTPHEADER, $this->getHeaders());
		curl_setopt($this->curl, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($this->curl, CURLOPT_SSL_VERIFYHOST, 0);

		return curl_exec($this->curl);
	}

	public function exec(){

	}

	public function getAll($params) {
		$get_params = $this->createGetParamsRow('getAll', $params);

		return $this->initCurl($get_params);
	}

	public function createCampagin($params) {
		$get_params = $this->createGetParamsRow('create', $params);

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


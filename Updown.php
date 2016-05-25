<?php

class Updown {

	const BASE_URL = 'https://updown.io/api/checks';

	private $api_key;

	public function __construct($api_key)
	{
		$this->api_key = $api_key;
	}

	public function getChecks()
	{
		$url = self::BASE_URL;

		return self::_getRequest($url);
	}

	public function getCheck($token)
	{
		$url = self::BASE_URL . '/' . $token;

		return self::_getRequest($url);
	}

	public function getDowntimes($token, $params = [])
	{
		$url = self::BASE_URL . '/' . $token . '/downtimes';

		return self::_getRequest($url, $params);
	}

	public function getMetrics($token, $params = [])
	{
		$url = self::BASE_URL . '/' . $token . '/metrics';

		return self::_getRequest($url, $params);
	}

	private function _getRequest($url, $params = [])
	{
		$curl = curl_init();

		curl_setopt_array($curl, [
			CURLOPT_RETURNTRANSFER => 1,
			CURLOPT_URL            => empty($params) ? $url : $url . '?' . http_build_query($params),
			CURLOPT_HTTPHEADER     => [
				'X-API-KEY: ' . $this->api_key
			]
		]);

		$response = curl_exec($curl);

		curl_close($curl);

		return $response;
	}
}

$updown = new Updown('ro-3znwjgmx5bbzv6yeql1a');
$response1 = $updown->getChecks();
var_dump($response1);

$response2 = $updown->getCheck('1f5p');
var_dump($response2);

$response3 = $updown->getDowntimes('1f5p');
var_dump($response3);

$response4 = $updown->getMetrics('1f5p');
var_dump($response4);
<?php

class Updown {

	const BASE_URL = 'https://updown.io/api/checks';

	private $api_key;

	/**
	 * @param $api_key
	 */
	public function __construct($api_key)
	{
		$this->api_key = $api_key;
	}

	/**
	 * @return mixed
	 */
	public function checks()
	{
		$url = self::BASE_URL;

		return self::_getRequest($url);
	}

	/**
	 * @param $token
	 * @return mixed
	 */
	public function check($token)
	{
		$url = self::BASE_URL . '/' . $token;

		return self::_getRequest($url);
	}

	/**
	 * @param       $token
	 * @param array $params
	 * @return mixed
	 */
	public function downtimes($token, $params = [])
	{
		$url = self::BASE_URL . '/' . $token . '/downtimes';

		return self::_getRequest($url, $params);
	}

	public function metrics($token, $params = [])
	{
		$url = self::BASE_URL . '/' . $token . '/metrics';

		return self::_getRequest($url, $params);
	}

	/**
	 * @param       $url
	 * @param array $params
	 * @return mixed
	 */
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
<?php

namespace App\Services\Monobank\Features;

use App\Services\Monobank\Common\CurrencyMatcher;
use GuzzleHttp\Client as GuzzleHttpClient;
use Illuminate\Support\Facades\Log;


class FetchCurrency
{
	public function call()
	{
		return $this->getCurrencies();
	}

	private function getCurrencies()
	{
		// $client = new \GuzzleHttp\Client();
		// $response = $client->request('GET', "https://api.open-meteo.com/v1/forecast?latitude=52.52&longitude=13.41&current_weather=true&hourly=temperature_2m,relativehumidity_2m,windspeed_10m");

		// return $response->getBody()->getContents();

		$data = $this->fetchData();
		$result = $this->mapToCurrencyObjects($data);

		return $result;
	}

	private function fetchData()
	{
		// try {
			if (env('APP_ENV') == TEST) {
				return json_decode(file_get_contents(storage_path('app/public/mock.json')));
			}
			$client = new GuzzleHttpClient();
			$response = $client->request('GET', 'https://api.monobank.ua/bank/currency');
			return json_decode($response->getBody()->getContents());
		// } catch (\Exception $e) {
			// Log::error($e->getMessage());
		// }
	}

	private function mapToCurrencyObjects($data)
	{
		return (new CurrencyMatcher($data))->calculate();
	}
}

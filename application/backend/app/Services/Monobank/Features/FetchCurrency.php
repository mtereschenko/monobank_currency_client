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
		$data = $this->fetchData();
		$result = $this->mapToCurrencyObjects($data);

		return $result;
	}

	private function fetchData()
	{
		try {
			if (env('APP_ENV') == TEST) {
				return json_decode(file_get_contents(storage_path('mock.json')));
			}
			$client = new GuzzleHttpClient();
			$response = $client->request('GET', 'https://api.monobank.ua/bank/currency');
			return json_decode($response->getBody()->getContents());
		} catch (\Exception $e) {
			Log::error($e->getMessage());
		}
	}

	private function mapToCurrencyObjects($data)
	{
		return (new CurrencyMatcher($data))->calculate();
	}
}

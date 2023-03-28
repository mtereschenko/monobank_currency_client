<?php

namespace App\Providers;

use App\Services\Monobank\MonobankFacade;
use App\Services\Monobank\Monobank;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class MonobankServiceProvider extends ServiceProvider
{
	/**
	 * Register services.
	 *
	 * @return void
	 */
	public function register()
	{
		App::bind(MonobankFacade::SERVICE_ACCESS_KEY, function () {
			return new Monobank();
		});
	}

	/**
	 * Bootstrap services.
	 *
	 * @return void
	 */
	public function boot()
	{
	}
}

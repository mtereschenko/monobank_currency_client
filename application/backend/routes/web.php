<?php

use App\Http\Controllers\CurrenciesController;
use Illuminate\Support\Facades\Route;

Route::get('/api/currencies', [CurrenciesController::class, 'currencies'])->name('web.currencies');

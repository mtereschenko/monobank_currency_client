<?php

namespace App\Http\Controllers;

use App\Services\Monobank\Monobank;
use Illuminate\Http\Request;

class CurrenciesController extends Controller
{
    public function currencies(Monobank $monobank)
    {
        return $monobank->fetchCurrency();
    }
}

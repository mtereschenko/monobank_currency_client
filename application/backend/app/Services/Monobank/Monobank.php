<?php

namespace App\Services\Monobank;

use App\Services\Monobank\Features\FetchCurrency;

class Monobank
{
  private $fetchCurrency;
  public function __construct(FetchCurrency $fetchCurrency)
  {
    $this->fetchCurrency = $fetchCurrency;
  }

  public function fetchCurrency()
  {
    return $this->fetchCurrency->call();
  }
}

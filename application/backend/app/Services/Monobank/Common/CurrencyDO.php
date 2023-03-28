<?php

namespace App\Services\Monobank\Common;

use Illuminate\Support\Collection;

class CurrencyDO
{
  public $currencyLabelA = '';
  public $currencyLabelB = '';
  public $currencyCodeA = 0;
  public $currencyCodeB = 0;
  public $date = 0;
  public $rateBuy = 0;
  public $rateCross = 0;
  public $rateSell = 0;
  public function __construct(
    String $currencyLabelA,
    String $currencyLabelB,
    int $currencyCodeA,
    int $currencyCodeB,
    int $date,
    float $rateBuy,
    float $rateCross,
    float $rateSell
  ) {
    $this->currencyLabelA = $currencyLabelA;
    $this->currencyLabelB = $currencyLabelB;
    $this->currencyCodeA = $currencyCodeA;
    $this->currencyCodeB = $currencyCodeB;
    $this->date = $date;
    $this->rateBuy = $rateBuy;
    $this->rateCross = $rateCross;
    $this->rateSell = $rateSell;
  }
}

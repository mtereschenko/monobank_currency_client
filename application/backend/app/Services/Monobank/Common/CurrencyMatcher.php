<?php

namespace App\Services\Monobank\Common;

// use Illuminate\Support\Collection;

class CurrencyMatcher
{
  private $data = [];

  private $iso4217;

  public function __construct($data)
  {
    $this->data = collect($data);
    $this->setIso4217();
  }

  public function calculate()
  {
    return $this->data->map(function ($item) {
      $labelA = $this->iso4217[$item->currencyCodeA]->AlphabeticCode;
      $labelB = $this->iso4217[$item->currencyCodeB]->AlphabeticCode;
      return new CurrencyDO(
        $labelA,
        $labelB,
        $item->currencyCodeA,
        $item->currencyCodeB,
        $item->date,
        $item->rateBuy,
        $item->rateCross,
        $item->rateSell
      );
    });
  }

  private function setIso4217()
  {
    if (!$this->iso4217) {
      $this->iso4217 = collect(json_decode(file_get_contents(__DIR__ . '/ISO4217.json')))->keyBy('NumericCode');
    }
  }
}

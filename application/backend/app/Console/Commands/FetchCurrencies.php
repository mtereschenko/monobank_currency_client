<?php

namespace App\Console\Commands;

use App\Services\Monobank\Monobank;
use Illuminate\Console\Command;

class FetchCurrencies extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'currencies:fetch';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command is just an example of how we can schedule fetching currencies.';

    private $monobank;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(Monobank $monobank)
    {
        $this->monobank = $monobank;
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        event(new \App\Events\CurrenciesUpdatedEvent($this->monobank->fetchCurrency()));
    }
}

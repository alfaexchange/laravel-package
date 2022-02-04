<?php

namespace AlfaExchange\Api\Commands;

use AlfaExchange\Api\AlfaExchangeService;
use Illuminate\Console\Command;

/**
 * Class AlfaExchangeLatestCommand
 * @package AlfaExchange\Api\Commands
 */
class AlfaExchangeLatestCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'alfaexchange:latest {--from=USD} {--to=?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Latest Rates
                                     {--from : Base currency 3-letter symbol, example USD}
                                     {--to : Optional parameter. Target currency 3-letter symbol, example RUB}';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function handle(): void
    {
        $from   = mb_strtoupper($this->option('from'));
        $to     = mb_strtoupper($this->option('to'));
        try {
            $results = (new AlfaExchangeService())->latest(['from' => $from, 'to' => $to]);
            $body    = [];

            foreach ($results->rates as $currency => $amount) {
                array_push($body, [
                    sprintf('%s/%s', $results->base, $currency),
                    $amount,
                ]);
            }

            $this->table(['Pair', 'Amount'], $body);
        } catch (\Exception $exception) {
            $this->warn($exception->getMessage());
        }
    }
}

<?php

namespace App\Console\Commands;

use App\Services\SpeedtestService;
use Illuminate\Console\Command;
use Symfony\Component\Process\Process;

class Speedtest extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'speedtest';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Storing Speedtest results';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(SpeedtestService $service)
    {
        $process = new Process(['speedtest', '--format=json', '--output-header', '--progress=no']);
        $process->mustRun();

        if ($process->isSuccessful()) {
            $attributes = json_decode($process->getOutput(), true);
            $service->store($attributes);
        }

        return Command::SUCCESS;
    }
}

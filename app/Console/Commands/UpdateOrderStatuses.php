<?php

namespace App\Console\Commands;

use App\Models\Order;
use Illuminate\Console\Command;

class UpdateOrderStatuses extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'orders:update-status';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update order statuses based on elapsed time';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        \App\Models\Order::updateStatuses();
    }
}

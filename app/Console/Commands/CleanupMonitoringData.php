<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\DatabaseConnection;
use App\Models\DatabaseInteraction;
use Carbon\Carbon;

class CleanupMonitoringData extends Command
{
    protected $signature = 'monitor:cleanup {--days=30}';
    protected $description = 'Clean up old database monitoring data';

    public function handle()
    {
        $days = $this->option('days');
        $date = Carbon::now()->subDays($days);

        $connectionsDeleted = DatabaseConnection::where('created_at', '<', $date)->delete();
        $interactionsDeleted = DatabaseInteraction::where('created_at', '<', $date)->delete();

        $this->info("Cleaned up monitoring data older than {$days} days:");
        $this->line("- {$connectionsDeleted} connection records deleted");
        $this->line("- {$interactionsDeleted} interaction records deleted");

        return Command::SUCCESS;
    }
}
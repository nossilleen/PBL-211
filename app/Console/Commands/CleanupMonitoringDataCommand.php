<?php

namespace App\Console\Commands;

use App\Models\DatabaseConnection;
use App\Models\DatabaseInteraction;
use Illuminate\Console\Command;

class CleanupMonitoringDataCommand extends Command
{
    protected $signature = 'monitoring:cleanup {--days=30 : Number of days of data to keep}';
    protected $description = 'Clean up old database monitoring data';

    public function handle()
    {
        $cutoff = now()->subDays($this->option('days'));

        $connectionsDeleted = DatabaseConnection::where('created_at', '<', $cutoff)->delete();
        $interactionsDeleted = DatabaseInteraction::where('created_at', '<', $cutoff)->delete();

        $this->info("Cleaned up database monitoring data older than {$this->option('days')} days:");
        $this->line("- Deleted {$connectionsDeleted} old connections");
        $this->line("- Deleted {$interactionsDeleted} old interactions");

        return Command::SUCCESS;
    }
}
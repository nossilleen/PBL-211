<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class TelescopeSetupCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'telescope:setup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Setup Telescope configuration for PBL-211 project';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Setting up Telescope for PBL-211 project...');

        // 1. Pastikan direktori Commands ada
        if (!File::isDirectory(app_path('Console/Commands'))) {
            File::makeDirectory(app_path('Console/Commands'), 0755, true);
            $this->info('Created Commands directory');
        }

        // 2. Tambahkan env variables ke .env jika belum ada
        $envPath = base_path('.env');
        
        if (File::exists($envPath)) {
            $envContent = File::get($envPath);
            
            $telescopeConfig = "\n# TELESCOPE CONFIGURATION\n";
            $telescopeConfig .= "TELESCOPE_ENABLED=true\n";
            $telescopeConfig .= "TELESCOPE_PATH=telescope\n";
            $telescopeConfig .= "TELESCOPE_LOG_LEVEL=debug\n";
            $telescopeConfig .= "TELESCOPE_QUERY_SLOW=50\n";
            $telescopeConfig .= "TELESCOPE_RESPONSE_SIZE_LIMIT=128\n";
            
            // Periksa apakah konfigurasi telescope sudah ada
            if (!str_contains($envContent, 'TELESCOPE_ENABLED')) {
                File::append($envPath, $telescopeConfig);
                $this->info('Added Telescope configuration to .env file');
            } else {
                $this->info('Telescope configuration already exists in .env file');
            }
        } else {
            $this->error('.env file not found. Please create it first.');
        }

        // 3. Cache config
        $this->call('config:cache');
        
        $this->info('Telescope setup completed for PBL-211 project!');
        $this->info('You can access Telescope via /telescope in your local environment.');
        
        return Command::SUCCESS;
    }
} 
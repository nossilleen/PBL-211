<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Laravel\Telescope\IncomingEntry;
use Laravel\Telescope\Telescope;
use Laravel\Telescope\TelescopeApplicationServiceProvider;

class TelescopeServiceProvider extends TelescopeApplicationServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Mengaktifkan mode gelap Telescope
        Telescope::night();

        $this->hideSensitiveRequestDetails();

        $isLocal = $this->app->environment('local');

        // Filter entri Telescope
        Telescope::filter(function (IncomingEntry $entry) use ($isLocal) {
            return $isLocal ||
                   $entry->isReportableException() ||
                   $entry->isFailedRequest() ||
                   $entry->isFailedJob() ||
                   $entry->isScheduledTask() ||
                   $entry->isSlowQuery() ||
                   $entry->hasMonitoredTag();
        });

        // Menambahkan custom tagging untuk mempermudah filtering
        Telescope::tag(function (IncomingEntry $entry) {
            // Tambahkan tag status respons untuk requests
            if ($entry->type === 'request') {
                return [
                    'status:' . ($entry->content['response_status'] ?? 'unknown'),
                    'method:' . ($entry->content['method'] ?? 'unknown'),
                ];
            }

            // Tambahkan tag untuk models
            if ($entry->type === 'model') {
                $tags = [];
                
                if (isset($entry->content['model'])) {
                    $model = $entry->content['model'];
                    $tags[] = 'model:' . class_basename($model);
                }
                
                if (isset($entry->content['action'])) {
                    $tags[] = 'action:' . $entry->content['action'];
                }
                
                return $tags;
            }

            return [];
        });
    }

    /**
     * Prevent sensitive request details from being logged by Telescope.
     */
    protected function hideSensitiveRequestDetails(): void
    {
        if ($this->app->environment('local')) {
            return;
        }

        Telescope::hideRequestParameters([
            'password',
            'password_confirmation',
            '_token',
            'current_password',
        ]);

        Telescope::hideRequestHeaders([
            'cookie',
            'x-csrf-token',
            'x-xsrf-token',
            'authorization',
        ]);
    }

    /**
     * Register the Telescope gate.
     *
     * This gate determines who can access Telescope in non-local environments.
     */
    protected function gate(): void
    {
        Gate::define('viewTelescope', function ($user) {
            // Tambahkan email admin di sini
            return in_array($user->email, [
                // Contoh: 'admin@example.com',
            ]);
        });
    }
}

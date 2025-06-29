<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;

class PrivilegeChangeNotification extends Notification implements ShouldQueue
{
    use Queueable;

    protected $oldPermissions;
    protected $newPermissions;

    public function __construct(array $oldPermissions, array $newPermissions)
    {
        $this->oldPermissions = $oldPermissions;
        $this->newPermissions = $newPermissions;
    }

    public function via($notifiable): array
    {
        return ['database'];
    }

    public function toArray($notifiable): array
    {
        $changes = [];
        foreach ($this->newPermissions as $permission => $value) {
            if ($this->oldPermissions[$permission] !== $value) {
                $changes[$permission] = [
                    'old' => $this->oldPermissions[$permission],
                    'new' => $value
                ];
            }
        }

        return [
            'title' => 'Privilege Change Notification',
            'message' => 'Your account privileges have been updated.',
            'changes' => $changes,
            'timestamp' => now()
        ];
    }
}
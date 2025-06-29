<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\User;

class AccessChangedNotification extends Notification
{
    use Queueable;

    protected $operations;
    protected $admin;

    public function __construct(array $operations, User $admin)
    {
        $this->operations = $operations;
        $this->admin = $admin;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toArray($notifiable)
    {
        return [
            'message' => 'Hak akses produk Anda telah diubah oleh admin',
            'operations' => $this->operations,
            'admin_name' => $this->admin->nama,
            'admin_id' => $this->admin->user_id,
            'time' => now()->toDateTimeString()
        ];
    }
}

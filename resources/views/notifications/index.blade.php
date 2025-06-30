@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Notifications</h1>
        @if($notifications->count() > 0)
            <form method="POST" action="{{ route('notifications.mark-all-read') }}">
                @csrf
                <button type="submit" class="text-sm text-blue-600 hover:text-blue-800">
                    Mark all as read
                </button>
            </form>
        @endif
    </div>

    @if($notifications->count() > 0)
        <div class="space-y-4">
            @foreach($notifications as $notification)
                @if($notification->type === 'App\Notifications\PrivilegeChangeNotification')
                    <x-notifications.privilege-change :notification="$notification" />
                @else
                    <div class="bg-white p-4 rounded-lg shadow-sm">
                        <p class="text-gray-600">{{ $notification->data['message'] ?? 'No message content' }}</p>
                        <div class="mt-2 text-sm text-gray-500">
                            {{ $notification->created_at->diffForHumans() }}
                        </div>
                    </div>
                @endif
            @endforeach
        </div>

        <div class="mt-6">
            {{ $notifications->links() }}
        </div>
    @else
        <div class="text-center py-8">
            <div class="text-gray-400 text-lg">No notifications</div>
        </div>
    @endif
</div>
@endsection
@props(['notification'])

<div class="flex items-center p-4 mb-4 bg-white border-l-4 border-blue-500 shadow-sm">
    <div class="flex-shrink-0">
        <svg class="w-5 h-5 text-blue-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
        </svg>
    </div>
    <div class="ml-3">
        <h3 class="text-sm font-medium text-gray-900">{{ $notification->data['title'] }}</h3>
        <div class="mt-2 text-sm text-gray-600">
            <p>{{ $notification->data['message'] }}</p>
            @if(isset($notification->data['changes']))
                <div class="mt-2">
                    <p class="font-medium">Changes:</p>
                    <ul class="list-disc list-inside">
                        @foreach($notification->data['changes'] as $permission => $change)
                            <li>
                                {{ ucwords(str_replace('_', ' ', $permission)) }}:
                                <span class="{{ $change['new'] ? 'text-green-600' : 'text-red-600' }}">
                                    {{ $change['new'] ? 'Granted' : 'Revoked' }}
                                </span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
        <div class="mt-3">
            <div class="flex space-x-2">
                <span class="inline-flex text-xs text-gray-500">
                    {{ $notification->created_at->diffForHumans() }}
                </span>
                @unless($notification->read_at)
                    <form method="POST" action="{{ route('notifications.mark-as-read', $notification->id) }}">
                        @csrf
                        <button type="submit" class="text-xs text-blue-600 hover:text-blue-800">
                            Mark as read
                        </button>
                    </form>
                @endunless
            </div>
        </div>
    </div>
</div>
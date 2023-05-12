@props(['room', 'user', 'cleaningStatuses'])

<div class="room-item" data-room-details="{{ json_encode($room) }}">
    <div class="room-item-header">
        <h3>Nr. {{ $room->room_number }}</h3>
        <h3>{{ $room->base_price_per_night }} per night</h3>
    </div>
    <p>{{ $room->roomType->type }}</p>
    @if ($room->cleaningStatus->id !== 1)
        <p>{{ $room->cleaningStatus->status }} cleanup required</p>
    @else
        <p>Recently cleaned</p>
    @endif
    {{-- Temporary solution for routing to reservation create --}}
    @can('create', App\Models\Reservation::class)
        <form action="{{ route('reservation.contact', ['id' => $room->id]) }}" method="GET">
            @csrf
            <input type="hidden" name="roomId" value="{{ $room->id }}">
            <x-buttons.primary-button>Make reservation</x-buttons.primary-button>
        </form>
    @endcan
    @can('update', App\Models\CleaningStatus::class)
        <x-buttons.secondary-button class="cleaning-menu-button">Change cleaning status
        </x-buttons.secondary-button>
    @endcan
</div>

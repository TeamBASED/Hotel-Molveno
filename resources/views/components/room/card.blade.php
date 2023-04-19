@props(['room', 'user'])

<div class="room-item" data-room-details="{{ json_encode($room) }}">
    <div class="room-item-header">
        <h3>Nr. {{ $room->room_number }}</h3>
        <h3>{{ $room->base_price_per_night }} per night</h3>
    </div>
    <p>{{ $room->roomType->type }}</p>
    <p>{{ $room->cleaningStatus->status }}</p>
    {{-- Temporary solution for routing to reservation create --}}
    @can('create', App\Models\Reservation::class)
        <form action="{{ route('reservation.contact', ['id' => $room->id]) }}" method="GET">
            @csrf
            <input type="hidden" name="roomId" value="{{ $room->id }}">
            <x-buttons.primary-button>Make reservation</x-buttons.primary-button>
        </form>
    @else
        <x-buttons.tertiary-button class="" id="cleaning-status-button">Change cleaning status
        </x-buttons.tertiary-button>
        <x-select-cleaning-status :room='$room'></x-select-cleaning-status>
    @endcan

</div>

@props([
    'room'    
])

<div class="room-item" data-room-details="{{ json_encode($room) }}" data-room-type="{{ $room->roomType->type }}" data-room-view="{{ $room->roomView->type }}" data-cleaning-status="{{ $room->cleaningStatus->status }}">
    <div class="room-item-header">
        <h3>Nr. {{ $room->room_number }}</h3>
        <h3>{{ $room->base_price_per_night }} per night</h3>
    </div>
    <p>{{ $room->roomType->type }}</p>
    <p>available</p>
    {{-- Temporary solution for routing to reservation create--}}
    <form action="{{ route('reservation.contact', ['id' => $room->id]) }}" method="GET">
        <input type="hidden" name="roomId" value="{{ $room->id }}">
        <x-buttons.primary-button >Make reservation</x-buttons.primary-button>
    </form>
</div>
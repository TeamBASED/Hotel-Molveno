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
    <form action="{{ route('reservation.create') }}" method="GET">
        <input type="hidden" name="roomId" value="{{ $room->id }}">
        <x-buttons.primary-button class="button">Make reservation</x-buttons.primary-button></form>
    <x-buttons.primary-button :href="route('room.create', ['id' => $room->id])" >Go to info</x-buttons.primary-button>
</div>
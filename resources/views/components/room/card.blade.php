@props([
    'room'    
])

<div class="room-item">
    <div>
        <h3>Nr. {{ $room->room_number }}</h3>
        <h3>{{ $room->base_price_per_night }} per night</h3>
    </div>
    <p>{{ $room->roomType->type }}</p>
    <p class="margin-top">available</p>
    <x-buttons.primary-button :href="route('room.info', ['id' => $room->id])" >Go to info</x-buttons.primary-button>
</div>
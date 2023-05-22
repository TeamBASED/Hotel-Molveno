{{-- @props(['availableRooms']) --}}



<div class="allRooms">

    {{-- {{ dd($availableRooms) }} --}}


    @if (isset($currentRooms))
        <p class="input-label">Rooms in the reservation:</p>
        @foreach ($currentRooms as $currentRoom)
            <p><input type="checkbox" checked name="room[{{ $currentRoom->id }}]">{{ $currentRoom->room_number }}
            </p>
        @endforeach
    @endif


    @if (isset($availableRooms))
        <p class="input-label">Available rooms:</p>
        @foreach ($availableRooms as $availableRoom)
            <p><input type="checkbox" name="room[{{ $availableRoom->id }}]">{{ $availableRoom->room_number }}</p>
        @endforeach
    @endif

</div>


{{-- 


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
    <x-buttons.primary-button :href="route('room.info', ['id' => $room->id])" >Go to info</x-buttons.primary-button>
</div> --}}

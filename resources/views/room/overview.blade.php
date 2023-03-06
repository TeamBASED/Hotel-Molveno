<x-layout.base>
    <main id="room-overview">
        <div class="left-side">
            <div class="filter">

            </div>
            <h2>Rooms</h2>
            <div class="rooms-container">

                @foreach ($rooms as $room)

                    <x-room.card :room="$room" />
                    
                @endforeach
                    
            </div>
        </div>
        <div class="right-side">
            <h2>Details</h2>
            <p>Number</p>
            <p>Size</p>
            <p>Availability</p>
            <p>Cleaning status</p>
            <p>Bed configuration</p>
            <p>View</p>
            <p>Comments</p>
            <div class="margin-top">
                <x-buttons.secondary-button>Make reservation</x-buttons.secondary-button>
                <x-buttons.secondary-button>Open room info</x-buttons.secondary-button>
            </div>
        </div>
    </main>
</x-layout.base> 

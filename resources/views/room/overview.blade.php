<x-layout.base>
    <main id="room-overview">
        <div class="left-side">
            <div class="filter">

            </div>
            <h2>Rooms</h2>
            <div id="rooms-container">

                @foreach ($rooms as $room)

                    <x-room.card :room="$room" />
                    
                @endforeach
                    
            </div>
        </div>
        <div class="right-side">
            <h2>Details</h2>
            <p id="details-number">Number</p>
            <p id="details-type">Type</p>
            <p id="details-price-per-night">Price per night</p>
            <p id="details-capacity">Capacity</p>
            <p id="details-bed-configuration">Bed configuration</p>
            <p id="details-view">View</p>
            <p id="details-description">Description</p>
            <p id="details-cleaning-status">Cleaning status</p>
            <p id="details-status-comment">Comments</p>

            <div class="margin-top">
                <!-- <x-buttons.secondary-button id="details-reservation-button">Make reservation</x-buttons.secondary-button> -->
                <x-buttons.secondary-button id="details-info-button">Open room info</x-buttons.secondary-button>
            </div>
        </div>
    </main>
</x-layout.base> 

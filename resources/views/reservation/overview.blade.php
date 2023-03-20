<x-layout.base>

    <main id="reservation-overview">

    



<!-- 

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
        <div id="details-section" class="hidden">
            <h2>Details</h2>

            <p class="details-label">Number</p>
            <p id="details-number"></p>

            <p class="details-label">Type</p>
            <p id="details-type"></p>

            <p class="details-label">Capacity</p>
            <p id="details-capacity"></p>

            <p class="details-label">Price per night</p>
            <p id="details-price-per-night"></p>

            <p class="details-label">View</p>
            <p id="details-view"></p>

            <p class="details-label">Bed configuration</p>
            <p id="details-bed-configuration"></p>

            <p class="details-label">Description</p>
            <p id="details-description"></p>

            <p class="details-label">Cleaning status</p>
            <p id="details-cleaning-status"></p>

            <div class="bottom-buttons"> -->
                <!-- <x-buttons.secondary-button id="details-reservation-button">Make reservation</x-buttons.secondary-button> -->
            <!--    <x-buttons.secondary-button id="details-info-button" :href="route('room.info', ['id' => 1])">Open room info</x-buttons.secondary-button>
            </div>

            <p id="select-room-message">Click a room to view details.</p>
        </div>
    </main> -->
</x-layout.base> 

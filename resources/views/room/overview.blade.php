<x-layout.base>

    <x-slot:resources>
        @vite('resources/js/roomOverviewDetails.js')
    </x-slot>

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
        <div class="details-section">
            <h2>Details</h2>

            <p class="details-label">Number</p>
            <p id="details-number"></p>

            <p class="details-label">Type</p>
            <p id="details-type"></p>

            <p class="details-label">Price per night</p>
            <p id="details-price-per-night"></p>

            <p class="details-label">Capacity</p>
            <p id="details-capacity"></p>

            <p class="details-label">Bed configuration</p>
            <p id="details-bed-configuration"></p>

            <p class="details-label">View</p>
            <p id="details-view"></p>

            <p class="details-label">Description</p>
            <p id="details-description"></p>

            <p class="details-label">Cleaning status</p>
            <p id="details-cleaning-status"></p>

            <p class="details-label">Comments</p>
            <p id="details-status-comment"></p>

            <div class="margin-top">
                <!-- <x-buttons.secondary-button id="details-reservation-button">Make reservation</x-buttons.secondary-button> -->
                <x-buttons.secondary-button id="details-info-button">Open room info</x-buttons.secondary-button>
            </div>
        </div>
    </main>
</x-layout.base> 

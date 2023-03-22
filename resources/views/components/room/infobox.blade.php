@props([
    'room'    
])
<div class="room-info-box">
    <h3 class="white-text">Room Info</h3>
    <div class="reservations grid-two-columns">
        <div class="grid-two-columns">
            <p class="details-label">Room number</p>
            <p id="details-number" class="right-aligned">{{ $room->room_number }}</p>

            <p class="details-label">Room type</p>
            <p id="details-type" class="right-aligned">{{ $room->roomType->type }}</p>

            <p class="details-label">Capacity</p>
            <p id="details-capacity" class="right-aligned">{{ $room->capacity }}</p>

            <p class="details-label">Price per night</p>
            <p id="details-price-per-night" class="right-aligned">{{ $room->base_price_per_night }}</p>

            <p class="details-label">Room view</p>
            <p id="details-view" class="right-aligned">{{ $room->roomView->type }}</p>

            <p class="details-label">Bed configuration</p>
            <p id="details-bed-configuration" class="right-aligned"></p>

            <p class="details-label"></p>Cleaning status
            <p id="details-cleaning-status" class="right-aligned">{{ $room->cleaningStatus->status }}</p> 

            <p class="details-label" class="grid-span-2">Description</p>
            <p id="details-description" class="grid-span-2"></p>

            <p class="details-label" class="grid-span-2">Availability</p>
            <p id="details-availability" class="grid-span-2"></p> 
        </div>
    </div>
</div>
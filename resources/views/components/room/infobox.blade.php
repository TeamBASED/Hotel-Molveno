@props(['room'])

<div id="room-infobox" class="flex-column padding-block-1rem">
    <h3 class="white-text">Room Info</h3>
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

        <p class="details-label">Beds</p>
        <div id="details-bed-configuration" class="right-aligned">

            {{-- Display list of configurations e.g. '2x Single' --}}
            @foreach ($room->bedConfigurations as $bedConfig)
                <p>{{ $bedConfig->pivot->amount }}x {{ $bedConfig->configuration }}</p>
            @endforeach

        </div>

        <p class="details-label">Cleaning status</p>
        <p id="details-cleaning-status" class="right-aligned">{{ $room->cleaningStatus->status }}</p>


    </div>
</div>

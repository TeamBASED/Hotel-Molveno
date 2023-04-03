<x-layout.base>
    <main id="room-info" class="main-content">
        <h2>
            Room info
        </h2>

        <article class="flex-space-around">
            <div class="info-wrapper">
                <section class="info-section">

                    <div class="grid-two-columns margin-block">
                        <h4>Room no.&colon;</h4>
                        <p class="right-aligned"> {{ $room->room_number }}</p>
                        <h4>Capacity&colon;</h4>
                        <p class="right-aligned">{{ $room->capacity }}</p>
                        <h4>Price per night&colon;</h4>
                        <p class="right-aligned"> {{ $room->base_price_per_night }}</p>
                        <h4>View&colon;</h4>
                        <p class="right-aligned"> {{ $room->roomView->type }}</p>

                        <h4>Beds&colon;</h4>
                        <div class="right-aligned">

                            {{-- Display list of configurations e.g. '2x Single' --}}
                            @foreach ($room->bedConfigurations as $bedConfig)
                                <p>{{ $bedConfig->pivot->amount }}x {{ $bedConfig->configuration }}</p>
                            @endforeach

                        </div>

                    </div>


                    <x-buttons.primary-button :href="route('room.edit', ['id' => $room->id])">Edit</x-buttons.primary-button>

                </section>

                <x-buttons.primary-button :href="route('room.overview')">Back</x-buttons.primary-button>

            </div>
        </article>

    </main>
</x-layout.base>

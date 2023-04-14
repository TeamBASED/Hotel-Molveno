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
                        <h4>Type&colon;</h4>
                        <p class="right-aligned"> {{ $room->roomType->type }}</p>
                        <h4>Capacity&colon;</h4>
                        <p class="right-aligned">{{ $room->capacity }}</p>
                        <h4>Price per night&colon;</h4>
                        <p class="right-aligned"> {{ $room->base_price_per_night }}</p>
                        <h4>View&colon;</h4>
                        <p class="right-aligned"> {{ $room->roomView->view }}</p>

                        <h4>Beds&colon;</h4>
                        <div class="right-aligned">

                            {{-- Display list of configurations e.g. '2x Single' --}}
                            @foreach ($room->bedConfigurations as $bedConfig)
                                <p>{{ $bedConfig->pivot->amount }}x {{ $bedConfig->configuration }}</p>
                            @endforeach

                        </div>

                        <h4 class="grid-span-2">Description&colon;</h4>
                        <p class="grid-span-2"> {{ $room->description }}</p>
                    </div>

                    <x-buttons.secondary-button :href="route('room.edit', ['id' => $room->id])">Edit</x-buttons.secondary-button>

                </section>

                <x-buttons.primary-button :href="route('room.overview')">Back</x-buttons.primary-button>

            </div>
            <section class="reservation-schedule">

                <h3 class="white-text">Reservation Schedule</h3>
                <div class="reservations grid-two-columns">
                    <p class="white-background">Placeholder 23-05 - 28-05</p>

                    <x-buttons.edit-button>Edit</x-buttons.edit-button>

                    <p class="white-background">Placeholder 30-05 - 01-06</p>
                    <x-buttons.edit-button>Edit</x-buttons.edit-button>

                    <p class="white-background">Placeholder 03-06 - 10-06</p>
                    <x-buttons.edit-button>Edit</x-buttons.edit-button>

                    <p class="white-background">Placeholder 23-06 - 28-06</p>
                    <x-buttons.edit-button>Edit</x-buttons.edit-button>

                    <p class="white-background">Placeholder 23-07 - 27-07</p>
                    <x-buttons.edit-button>Edit</x-buttons.edit-button>

                    <p class="white-background">Placeholder 02-08 - 18-08</p>
                    <x-buttons.edit-button>Edit</x-buttons.edit-button>

                </div>

            </section>
        </article>
        </main>
</x-layout.base>

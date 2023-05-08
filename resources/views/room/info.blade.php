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

                            @foreach ($room->bedConfigurations as $bedConfig)
                                <p>{{ $bedConfig->pivot->amount }}x {{ $bedConfig->configuration }}</p>
                            @endforeach

                        </div>

                        <h4 class="grid-span-2">Description&colon;</h4>
                        <p class="grid-span-2"> {{ $room->description }}</p>

                    </div>

                    @can('update', $room)
                        <x-buttons.secondary-button :href="route('room.edit', ['id' => $room->id])">Edit</x-buttons.secondary-button>
                    @endcan

                </section>

                <x-buttons.primary-button :href="route('room.overview')">Back</x-buttons.primary-button>

            </div>

            <section class="reservation-schedule">

                <h3 class="white-text">Upcoming Reservations</h3>

                <div class="reservations grid-two-columns">


                    @foreach ($room->reservations as $reservation)
                        <p class="white-background flex-center flex-start">
                            <span>{{ $reservation->date_of_arrival }}<br>{{ $reservation->date_of_departure }}</span><span
                                style="align-self: center">
                                {{ $reservation->contact->first_name }}
                                {{ $reservation->contact->last_name }}</span>
                        </p>
                        <x-buttons.edit-button :href="route('reservation.edit', ['id' => $reservation->id])">Edit</x-buttons.edit-button>
                    @endforeach


                </div>

            </section>

        </article>
    </main>
</x-layout.base>

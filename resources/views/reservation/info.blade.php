<x-layout.base>
    <main id="reservation-info" class="main-content">
        <h2>Reservation info</h2>
        <article class="flex-space-around">
            <div class="info-wrapper">
                <section class="info-section">
                    <h3>Contact info</h3>

                    <div class="grid-two-columns margin-block">
                        <h4>First name&colon;</h4>
                        <p class="right-aligned">{{ $reservation->contact->first_name }}</p>
                        <h4>Last name&colon;</h4>
                        <p class="right-aligned">{{ $reservation->contact->last_name }}</p>
                        <h4>E-mail&colon;</h4>
                        <p class="right-aligned">{{ $reservation->contact->email }}</p>
                        <h4>Telephone&colon;</h4>
                        <p class="right-aligned">{{ $reservation->contact->telephone_number }}</p>
                        <h4>adress&colon;</h4>
                        <p class="right-aligned">{{ $reservation->contact->address }}</p>
                    </div>

                    <h3>Dates</h3>

                    <div class="grid-two-columns margin-block">
                        <h4>Date arrival&colon;</h4>
                        <p class="right-aligned">{{ $reservation->date_of_arrival }}</p>
                        <h4>Date departure&colon;</h4>
                        <p class="right-aligned">{{ $reservation->date_of_departure }}</p>
                    </div>

                    <x-buttons.secondary-button :href="route('reservation.edit', ['id' => $reservation->id])">Edit</x-buttons.secondary-button>
                </section>

                <x-buttons.primary-button :href="route('reservation.overview')">Back</x-buttons.primary-button>
            </div>

            <div class="info-wrapper">
                <section class="info-section">


                    <h3>Rooms in the reservation:</h3>
                    @foreach ($currentRooms as $currentRoom)
                        <p>{{ $currentRoom->room_number }}
                        </p>
                    @endforeach


                </section>
            </div>

            <section class="reservation-schedule">
                <h3 class="white-text">Guests</h3>
                <div class="reservations grid-two-columns">
                    <p class="white-background">Placeholder</p>
                    <x-buttons.edit-button>Edit</x-buttons.edit-button>

                    <p class="white-background">Placeholder</p>
                    <x-buttons.edit-button>Edit</x-buttons.edit-button>

                    <p class="white-background">Placeholder</p>
                    <x-buttons.edit-button>Edit</x-buttons.edit-button>

                    <p class="white-background">Placeholder</p>
                    <x-buttons.edit-button>Edit</x-buttons.edit-button>

                    <p class="white-background">Placeholder</p>
                    <x-buttons.edit-button>Edit</x-buttons.edit-button>

                    <p class="white-background">Placeholder</p>
                    <x-buttons.edit-button>Edit</x-buttons.edit-button>
                </div>
            </section>
        </article>
    </main>
</x-layout.base>

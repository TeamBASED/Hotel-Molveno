<x-layout.base>

    <main class="main-content" id="home-page">

        <h2>Hotel Molveno</h2>

        <div class="grid-three-columns">

            <div class="flex-column align-center home-page-entry">
                <h3>Reservations</h3>

                <x-buttons.primary-button href="reservation/overview">Reservation overview</x-buttons.primary-button>

                {{-- TODO: Make new route for date select --> room select --> route(reservation.create) --}}
                <x-buttons.primary-button href="reservation/create">Make new reservation</x-buttons.primary-button>


                <x-buttons.primary-button href="reservation/overview">View latest reservations</x-buttons.primary-button>
            </div>

            <div class="flex-column align-center home-page-entry">
                <h3>Reception</h3>
                <x-buttons.primary-button href="room/overview">Overview rooms</x-buttons.primary-button>

                {{-- TODO: Make new route for date select --> room overview --}}
                <x-buttons.primary-button href="room/overview">View availabele rooms</x-buttons.primary-button>
            </div>

            <div class="flex-column home-page-entry">
                <h3>Housekeeping</h3>

                {{-- TODO: Make routes/overviews for housekeeping --}}
                <x-buttons.primary-button href="room/overview">Overview rooms</x-buttons.primary-button>

            </div>

        </div>



    </main>


</x-layout.base>

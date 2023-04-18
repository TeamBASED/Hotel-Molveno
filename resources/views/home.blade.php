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

                <div class="dates flex-center">

                </div>
                {{-- TODO: Make new route for date select --> room overview --}}
                <form action="{{ route('room.overview') }}" id="view-available-rooms" method="GET">
                    @csrf
                    <div class="date-of-arrival">
                        <label for="dateOfArrival">Date of arrival</label>
                        <input type="date" name="dateOfArrival" id="dateOfArrival" form="view-available-rooms"
                            required value="{{ date('Y-m-d') }}">
                    </div>
                    <div class="dateOfDeparture">
                        <label for="dateOfDeparture">Date of departure</label>
                        <input type="date" name="dateOfDeparture" id="dateOfDeparture" form="view-available-rooms"
                            required>
                    </div>
                    <x-buttons.primary-button>View availabele rooms</x-buttons.primary-button>
                </form>
            </div>

            <div class="flex-column align-center home-page-entry">
                <h3>Housekeeping</h3>


                {{-- TODO: Make routes/overviews for housekeeping --}}
                <x-buttons.primary-button href="room/overview">Overview rooms</x-buttons.primary-button>

            </div>

        </div>



    </main>


</x-layout.base>

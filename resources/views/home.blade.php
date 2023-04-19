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

                {{-- <div class="dates flex-center">

                </div> --}}
                {{-- TODO: Make new route for date select --> room overview --}}

                <div class="dateOfArrival">
                    <label for="dateOfArrival">Date of arrival</label>
                    <input type="date" class="input-text" name="dateOfArrival" id="dateOfArrival"
                        form="view-available-rooms" required value="{{ date('Y-m-d') }}">
                </div>
                <div class="dateOfDeparture">
                    <label for="dateOfDeparture">Date of departure</label>
                    <input type="date" class="input-text" name="dateOfDeparture" id="dateOfDeparture"
                        form="view-available-rooms" required>
                </div>
                <form action="{{ route('room.overview') }}" class="flex-center-center" id="view-available-rooms"
                    method="GET">
                    @csrf
                    <x-buttons.primary-button class="flex-grow-1">View available rooms</x-buttons.primary-button>
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

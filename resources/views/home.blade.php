<x-layout.base>

    <main class="main-content" id="home-page">

        <h2>Hotel Molveno</h2>

        <div class="grid-three-columns">

            <div class="flex-column align-center home-page-entry">
                <h3>Reservations</h3>

                <x-buttons.primary-button :href="route('reservation.overview')">Reservation overview</x-buttons.primary-button>

                <div class="dateOfArrival">
                    <label for="dateOfArrival">Date of arrival</label>
                    <input type="date" class="input-text" name="dateOfArrival" id="dateOfArrival"
                        form="view-available-rooms" value="{{ date('Y-m-d') }}">
                </div>
                <div class="dateOfDeparture">
                    <label for="dateOfDeparture">Date of departure</label>
                    <input type="date" class="input-text" name="dateOfDeparture" id="dateOfDeparture"
                        form="view-available-rooms">
                </div>
                <form action="{{ route('home') }}" {{-- Route + controller maken voor home page
                    
                    if($_POST == "makeReservation") {
                        dd($_POST)
                    } else {
                    
                    } }}" --}} class="flex-center-center"
                    id="view-available-rooms" method="GET">
                    @csrf
                    <x-buttons.primary-button name="action" value="viewRooms" class="flex-grow-1">View available rooms
                    </x-buttons.primary-button>
                    <x-buttons.primary-button name="action" value="makeReservation">Make new reservation
                    </x-buttons.primary-button>
                </form>

                <div class="roomSelect">
                    <x-room.available-rooms />

                </div>

                {{-- TODO: Make new route for date select --> room select --> route(reservation.create) --}}


                {{-- 
                <x-buttons.primary-button href="reservation/overview">View latest reservations</x-buttons.primary-button> --}}
            </div>

            <div class="flex-column align-center home-page-entry">
                <h3>Rooms</h3>
                <x-buttons.primary-button :href="route('room.overview')">Room overview</x-buttons.primary-button>

                <x-buttons.primary-button :href="route('room.create')">Add new room</x-buttons.primary-button>

                {{-- <div class="dates flex-center">

                </div> --}}
                {{-- TODO: Make new route for date select --> room overview --}}

            </div>

            <div class="flex-column align-center home-page-entry">
                <h3>Users</h3>


                {{-- TODO: Make routes/overviews for housekeeping --}}
                <x-buttons.primary-button :href="route('user.overview')">User overview</x-buttons.primary-button>

                <x-buttons.primary-button :href="route('user.register')">Register user</x-buttons.primary-button>

            </div>

        </div>



    </main>


</x-layout.base>

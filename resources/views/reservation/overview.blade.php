<x-layout.base>
    <main id="reservation-overview">
        <h2>Reservations</h2>
        @if (isset($_GET['notification']))
            <p class="notification">{{ $_GET['notification'] }}</p>
        @endif

        <article class="flex-center">
            <div class="flex-column left-side padding-inline-1rem padding-block">
                <h3>Search reservation</h3>

                <form action="{{ route('reservation.overview') }}" method="GET">
                    @csrf
                    @method('GET')


                    <div class="filter-item">
                        <label for="room-number-filter">Room number:</label>
                        <select id="room-number-filter" class="filter-input input-text" type="text" name="room_id">
                            @foreach ($rooms as $room)
                                <option value="{{ $room->id }}" class="filter-field-option">{{ $room->room_number }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <x-buttons.secondary-button class="search-button">Search</x-buttons.secondary-button>
                </form>

                <p class="light-text">Hier komen zoekvelden.</p>
            </div>
            <div class="right-side padding-inline-5rem padding-block">
                <div class="grid-row">
                    <h3>Reservation</h3>
                    <h3>Date</h3>
                </div>

                @foreach ($reservations as $reservation)
                    <a class="grid-row reservation-item"
                        href="{{ route('reservation.info', ['id' => $reservation->id]) }}">
                        <div class="gray-background grid-span-2 grid-two-columns">
                            <p>{{ $reservation->contact->first_name }} {{ $reservation->contact->last_name }}</p>
                            <p>{{ date('d-m-Y', strtotime($reservation->date_of_arrival)) }}</p>
                            <p>
                                @foreach ($reservation->rooms as $room)
                                    {{ $room->room_number }}
                                @endforeach
                            </p>
                            <p>{{ date('d-m-Y', strtotime($reservation->date_of_departure)) }}</p>
                        </div>
                    </a>
                @endforeach

            </div>
        </article>
    </main>
</x-layout.base>

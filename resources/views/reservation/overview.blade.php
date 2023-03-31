<x-layout.base>
    <main id="reservation-overview">
    <h2>Reservations</h2>

    <article class="flex-center">
        <div class="flex-column left-side padding-inline-1rem padding-block">
            <h3>Search reservation</h3>
            Hier komen zoekvelden.
        </div>
        <div class="right-side padding-inline-5rem padding-block">
            <div class="grid-row">
                <h3>Reservation</h3>
                <h3>Date.</h3>
            </div>
            
            @foreach ($reservations as $reservation)

                <a class="grid-row gray-background reservation-item" href="{{ route('reservation.info', ['id' => $reservation->id]) }}">
                   <div class="gray-background grid-span-2 grid-two-columns"> 
                        <p>{{ $reservation->contact->first_name }} {{ $reservation->contact->last_name }}</p>
                        <p>{{ $reservation->date_of_arrival }}</p>
                        <p>
                            @foreach ($reservation->rooms as $room)
                                {{ $room->room_number }}
                            @endforeach
                        </p> 
                        <p>{{ $reservation->date_of_departure }}</p>
                    </div>
                </a>

            @endforeach

        </div>
    </article>
    </main>
</x-layout.base> 

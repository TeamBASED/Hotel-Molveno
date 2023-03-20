<x-layout.base>
    <main id="reservation-overview">
    <h2>Reservations</h2>

    <article class="flex-space-around">
        <div class="flex-column left-side">
            <h3>Search reservation</h3>
            Hier komen zoekvelden.
        </div>
        <div class="right-side">
            <div class="grid-two-columns no-horizontal-gap ">
            <h3>Contact</h3>
            <h3>Room Nr.</h3>


           
           
            @foreach ($reservations as $reservation)

                <p class="gray-background">{{ $reservation->contact->first_name }} {{ $reservation->contact->last_name }}</p>
                <p class="gray-background">
                    @foreach ($reservation->rooms as $room)
                        {{ $room->room_number }}
                    @endforeach
                    
                </p>
                        
            @endforeach
    


            </div>

        </div>
    
    </article>

    </main>
</x-layout.base> 

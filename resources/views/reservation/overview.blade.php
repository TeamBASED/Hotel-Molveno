<x-layout.base>
    <main id="reservation-overview">
    <h2>Reservations</h2>

    <article class="flex-space-around">
        <div class="flex-column left-side">
            <h3>Search reservation</h3>
            Hier komen zoekvelden.
        </div>
        <div class="right-side">
            <div class="grid-two-columns">
            <h3>Contact</h3>
            <h3>Room Nr.</h3>


            <div id="rooms-container">
           
            @foreach ($reservations as $reservation)

                    <p>{{ $reservation->contact_id }}</p>
                    <p>{{ $reservation->room_id }}</p>
                        
                    @endforeach
    
</div>

            </div>

        </div>
    
    </article>

    </main>
</x-layout.base> 

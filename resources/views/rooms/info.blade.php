<x-layout.base>
    <main id="room-info">
        <h2>
            Room info
        </h2>
        <article>
            <section class="info-section">
                <div class="info-box">
                    <div class="info-container"><p>Room no.&colon; {{ $room->room_number}}</p></div>
                    
                    <div class="info-container"><p>Capacity&colon; {{ $room->capacity }}</p></div>
                    
                    <div class="info-container"><p>Base price per night&colon; {{ $room->base_price_per_night }}</p></div>
                    
                    <div class="info-container"><p>View&colon; Mountain</p></div>

                    <div class="info-container container-long"><p>Bed configuration&colon; {{ $room->bed_configuration }}</p></div>
 
                    <div class="info-container container-long"><p>Description&colon; {{ $room->description }}</p></div>
                </div>
                <div class="button-container">
                    <x-buttons.primary-button>Edit</x-buttons.primary-button>
                </div>
            </section>
            <section class="roster-section">
                <div class="timeslot">
                    <p>Placeholder</p>
                    <button></button>
                </div>
                <div class="timeslot">
                    <p>Placeholder</p>
                    <button></button>
                </div>
                <div class="timeslot">
                    <p>Placeholder</p>
                    <button></button>
                </div>
                <div class="timeslot">
                    <p>Placeholder</p>
                    <button></button>
                </div>
                <div class="timeslot">
                    <p>Placeholder</p>
                    <button></button>
                </div>
                <div class="timeslot">
                    <p>Placeholder</p>
                    <button></button>
                </div>
            </section>
        </article>
        <div class="button-container">
            <x-buttons.primary-button>Back</x-buttons.primary-button>
        </div>
    </main>
</x-layout.base>
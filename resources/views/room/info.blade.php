<x-layout.base>
    <main id="room-info">
        <h2>
            Room info
        </h2>
        <article>
            <section class="info-section">
                <div class="info-box">
                    <div class="info-container"><h4>Room no.&colon;</h4><p> {{ $room->room_number}}</p></div>
                    
                    <div class="info-container"><h4>Capacity&colon;</h4><p>{{ $room->capacity }}</p></div>
                    
                    <div class="info-container"><h4>Price per night&colon;</h4><p> {{ $room->base_price_per_night }}</p></div>
                    
                    <div class="info-container"><h4>View&colon;</h4><p> {{ $room->roomView->type }}</p></div>

                    <div class="info-container"><h4>Bed configuration&colon;</h4><p> {{ $room->bed_configuration }}</p></div>
 
                    <div class="info-container"><h4>Description&colon;</h4><p> {{ $room->description }}</p></div>
                </div>
                <div class="button-container">
                    {{-- <x-buttons.primary-button>Edit</x-buttons.primary-button> --}}
                </div>
            </section>
            <section class="reservation-schedule">
                <h3>Reservation Schedule</h3>
                {{-- <div class="timeslot">
                    <p>Placeholder 23-05 - 28-05</p>
                    <x-buttons.edit-button>Edit</x-buttons.edit-button>
                </div>
                <div class="timeslot">
                    <p>Placeholder 30-05 - 01-06</p>
                    <x-buttons.edit-button>Edit</x-buttons.edit-button>
                </div>
                <div class="timeslot">
                    <p>Placeholder 03-06 - 10-06</p>
                    <x-buttons.edit-button>Edit</x-buttons.edit-button>
                </div>
                <div class="timeslot">
                    <p>Placeholder 23-06 - 28-06</p>
                    <x-buttons.edit-button>Edit</x-buttons.edit-button>
                </div>
                <div class="timeslot">
                    <p>Placeholder 23-07 - 27-07</p>
                    <x-buttons.edit-button>Edit</x-buttons.edit-button>
                </div>
                <div class="timeslot">
                    <p>Placeholder 02-08 - 18-08</p>
                    <x-buttons.edit-button>Edit</x-buttons.edit-button>
                </div> --}}
            </section>
        </article>
        <div class="button-container">
            <x-buttons.primary-button :href="route('room.overview')">Back</x-buttons.primary-button>
        </div>
    </main>
</x-layout.base>
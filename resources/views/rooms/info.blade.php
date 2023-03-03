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
                    
                    <div class="info-container"><p>Price per night&colon; {{ $room->base_price_per_night }}</p></div>
                    
                    <div class="info-container"><p>View&colon; Mountain</p></div>

                    <div class="info-container"><p>Bed configuration&colon; {{ $room->bed_configuration }}</p></div>
 
                    <div class="info-container"><p>Description&colon; {{ $room->description }}</p></div>
                </div>
                <div class="button-container">
                    <x-buttons.primary-button>Edit</x-buttons.primary-button>
                </div>
            </section>
            <section class="roster-section">
                <div class="timeslot">
                    <p>Placeholder</p>
                    <x-buttons.edit-button>Edit</x-buttons.edit-button>
                </div>
                <div class="timeslot">
                    <p>Placeholder</p>
                    <x-buttons.edit-button>Edit</x-buttons.edit-button>
                </div>
                <div class="timeslot">
                    <p>Placeholder</p>
                    <x-buttons.edit-button>Edit</x-buttons.edit-button>
                </div>
                <div class="timeslot">
                    <p>Placeholder</p>
                    <x-buttons.edit-button>Edit</x-buttons.edit-button>
                </div>
                <div class="timeslot">
                    <p>Placeholder</p>
                    <x-buttons.edit-button>Edit</x-buttons.edit-button>
                </div>
                <div class="timeslot">
                    <p>Placeholder</p>
                    <x-buttons.edit-button>Edit</x-buttons.edit-button>
                </div>
            </section>
        </article>
        <div class="button-container">
            <x-buttons.primary-button>Back</x-buttons.primary-button>
        </div>
    </main>
</x-layout.base>
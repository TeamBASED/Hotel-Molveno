<x-layout.base>
    <main id="reservation-edit">
        <form
            action="{{ route(
                'reservation.update',
                3,
                // $reservation->id
            ) }}"
            method="POST" class="">
            @csrf
            @method('PATCH')
            <div class="left">
                <h2>Edit Reservation</h2>
                <input type="text" class="input-text" required placeholder="First name" name="firstname">
                <input type="text" class="input-text" required placeholder="Last name" name="lastname">
                <input type="text" class="input-text" required placeholder="E-mail" name="email">
                <input type="text" class="input-text" required placeholder="Telephone" name="telephone">
                <input type="text" class="input-text" required placeholder="Adress" name="adress">
                <h3>Date of Arrival</h3>
                <input type="date" class="input-text" name="arrival">
                <h3>Date of Departure</h3>
                <input type="date" class="input-text" name="departure">
                {{-- <input type="hidden" name="id" value="{{ $reservation->id }}"> --}}
                <x-buttons.primary-button>Cancel</x-buttons.primary-button>
            </div>
            <div class="right">
                <x-buttons.primary-button class="button delete">Delete</x-buttons.primary-button>
                <div class="room-info">
                    <h2>Room info</h2>
                </div>
                <x-buttons.primary-button class="button bluebg">Confirm changes</x-buttons.primary-button>
            </div>
        </form>
    </main>
</x-layout.base>

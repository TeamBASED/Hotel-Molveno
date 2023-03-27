<x-layout.base>
    <main id="reservation-edit">
        <form action="{{ route('reservation.update', $reservation->id) }}" method="POST" class="">
            @csrf
            @method('PATCH')

            {{-- {{ dd($reservation) }} --}}

            <div class="left">
                <h2>Edit Reservation</h2>
                <input type="text" class="input-text" required value="{{ old('firstname', $contact->first_name) }}"
                    name="firstname">
                <input type="text" class="input-text" required value="{{ old('lastname', $contact->last_name) }}"
                    name="lastname">
                <input type="text" class="input-text" required value="{{ old('email', $contact->email) }}"
                    name="email">
                <input type="text" class="input-text" required
                    value="{{ old('telephone', $contact->telephone_number) }}" name="telephone">
                <input type="text" class="input-text" required value="{{ old('address', $contact->address) }}"
                    name="address">
                <h3>Date of Arrival</h3>
                <input type="date" class="input-text"
                    value="{{ old('date_of_arrival', $reservation->date_of_arrival) }}" name="date_of_arrival">
                <h3>Date of Departure</h3>
                <input type="date" class="input-text"
                    value="{{ old('date_of_departure', $reservation->date_of_departure) }}" name="date_of_departure">
                <input type="hidden" name="id" value="{{ $reservation->id }}">

                @foreach ($rooms as $room)
                    <input type="text" class="input-text" value="{{ old('room', $room->room_number) }}"
                        name="room[]">
                @endforeach
                <input type="text" class="input-text" placeholder="add room" name="room[]">

                <x-buttons.primary-button class="button bluebg">Confirm changes</x-buttons.primary-button>
            </div>
        </form>
        <div class="right">
            <form action="{{ route('reservation.delete', $reservation) }}" method="POST">
                @csrf
                @method('DELETE')
                <x-buttons.primary-button class="button delete">Delete</x-buttons.primary-button>
            </form>
            @foreach ($rooms as $room)
                <x-room.infobox :room="$room" />
            @endforeach
            <form action="" class="fix-right">
                <x-buttons.primary-button class="button graybg">Cancel</x-buttons.primary-button>
            </form>
        </div>
    </main>

</x-layout.base>

<x-layout.base>
    <main id="reservation-edit">
        <div class="flex-container">
            <form action="{{ route('reservation.update', $reservation->id) }}" method="POST" class="form-1">
                @csrf
                @method('PATCH')

                {{-- {{ dd($reservation) }} --}}

                <div class="left">
                    <h2>Edit Reservation</h2>
                    <h3>Firstname</h3>
                    <input type="text" class="input-text" required value="{{ old('firstname', $contact->first_name) }}"
                        name="firstname">
                    <h3>Lastname</h3>
                    <input type="text" class="input-text" required value="{{ old('lastname', $contact->last_name) }}"
                        name="lastname">
                    <h3>E-mail</h3>
                    <input type="text" class="input-text" required value="{{ old('email', $contact->email) }}"
                        name="email">
                    <h3>Telephone number</h3>
                    <input type="text" class="input-text" required
                        value="{{ old('telephone', $contact->telephone_number) }}" name="telephone">
                    <h3>Contact address</h3>
                    <input type="text" class="input-text" required value="{{ old('address', $contact->address) }}"
                        name="address">
                    <h3>Date of Arrival</h3>
                    <input type="date" class="input-text"
                        value="{{ old('date_of_arrival', $reservation->date_of_arrival) }}" name="date_of_arrival">
                    <h3>Date of Departure</h3>
                    <input type="date" class="input-text"
                        value="{{ old('date_of_departure', $reservation->date_of_departure) }}" name="date_of_departure">
                    <input type="hidden" name="id" value="{{ $reservation->id }}">

                    <h3>Room number</h3>
                    @foreach ($rooms as $room)
                        <input type="text" class="input-text" value="{{ old('room', $room->room_number) }}"
                            name="room[]">
                    @endforeach
                    <input type="text" class="input-text" placeholder="add room" name="room[]">

                    <x-buttons.primary-button class="button bluebg">Confirm changes</x-buttons.primary-button>
                </div>
            </form>
            <div class="right">
                <form action="">
                    <x-buttons.primary-button class="button delete">Delete</x-buttons.primary-button>
                </form>
                @foreach ($rooms as $room)
                    <x-room.infobox :room="$room" />
                @endforeach
                <form action="" class="fix-right">
                    <x-buttons.primary-button class="button graybg">Cancel</x-buttons.primary-button>
                </form>
            </div>
        </div>
    </main>

</x-layout.base>

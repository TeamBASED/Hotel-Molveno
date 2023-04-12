<x-layout.base>
    <main id="reservation-edit">
        <div class="flex-container">
            <form action="{{ route('reservation.update', $reservation->id) }}" method="POST" class="form-1">
                @csrf
                @method('PATCH')

                {{-- {{ dd($reservation) }} --}}
                <h2>Edit Reservation</h2>
                <div class="grid-two-columns">
                    <div class="left flex-column flex-center">

                        <h3>Firstname</h3>
                        <input type="text" class="input-text" required
                            value="{{ old('firstname', $contact->first_name) }}" name="firstname">
                        <h3>Lastname</h3>
                        <input type="text" class="input-text" required
                            value="{{ old('lastname', $contact->last_name) }}" name="lastname">
                        <h3>E-mail</h3>
                        <input type="text" class="input-text" required value="{{ old('email', $contact->email) }}"
                            name="email">
                        <h3>Telephone number</h3>
                        <input type="text" class="input-text" required
                            value="{{ old('telephone', $contact->telephone_number) }}" name="telephone">
                        <h3>Contact address</h3>
                        <input type="text" class="input-text" required
                            value="{{ old('address', $contact->address) }}" name="address">
                        <h3>Nationality</h3>
                        <input type="text" class="input-text" required placeholder="Nationality" name="nationality" value="{{  old('nationality', $contact->nationality)}}">
                        <h3>ID Checked</h3>
                        <input type="checkbox" name="passport_checked" value="1" {{ old('passport_checked', $contact->passport_checked == 1 ? 'checked' : '')}}>
                        <h3>Date of Arrival</h3>
                        <input type="date" class="input-text"
                            value="{{ old('date_of_arrival', $reservation->date_of_arrival) }}" name="date_of_arrival">
                        <h3>Date of Departure</h3>
                        <input type="date" class="input-text"
                            value="{{ old('date_of_departure', $reservation->date_of_departure) }}"
                            name="date_of_departure">
                        <input type="hidden" name="id" value="{{ $reservation->id }}">
                        <input type="hidden" name="contact_id" value="{{ $contact->id }}">

                        {{-- <h3>Room number</h3>
                        @foreach ($rooms as $room)
                            <input type="text" class="input-text" value="{{ old('room', $room->room_number) }}"
                                name="room[]">
                        @endforeach
                        <input type="text" class="input-text" placeholder="add room" name="room[]"> --}}

                        <x-buttons.primary-button class="button bluebg">Confirm changes</x-buttons.primary-button>

                    </div>
                    <div>
                        <x-room.available-rooms :currentRooms="$currentRooms" :availableRooms="$availableRooms" />
                    </div>
                </div>

            </form>
            <div class="right">
                <form action="{{ route('reservation.delete', $reservation->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <x-buttons.primary-button class="button delete">Delete</x-buttons.primary-button>
                </form>
                @foreach ($rooms as $room)
                    <x-room.infobox :room="$room" />
                @endforeach
                <x-buttons.primary-button :href="route('reservation.info', $reservation->id)" class="button graybg">Cancel</x-buttons.primary-button>
            </div>
    </main>

</x-layout.base>

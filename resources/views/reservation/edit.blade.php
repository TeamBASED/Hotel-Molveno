<x-layout.base>
    <main id="reservation-edit" class="main-content">

        @if (isset($_GET['notification']))
            <p class="notification">{{ $_GET['notification'] }}</p>
        @endif
        <div class="padding-inline-5rem">
            <div class="crud-header">
                <h2>Edit reservation</h2>

                <x-buttons.tertiary-button class="warning absolute-right" id="delete-button">Delete
                </x-buttons.tertiary-button>
                <x-delete-confirmation :removeId='$reservation->id' :removalRoute="route('reservation.delete', $reservation->id)"></x-delete-confirmation>

            </div>

            <div class="flex-space-between">
                <form action="{{ route('reservation.update', $reservation->id) }}" method="POST"
                    class="form-1 grid-two-columns" id="edit-form">
                    @csrf
                    @method('PATCH')

                    <div class="left flex-column">

                        <label class="input-label" for="first-name">First name:</label>
                        <input id="first-name" type="text" class="input-text" required
                            value="{{ old('firstname', $contact->first_name) }}" name="firstname">

                        <label class="input-label" for="last-name">Last name:</label>
                        <input id="last-name" type="text" class="input-text" required
                            value="{{ old('lastname', $contact->last_name) }}" name="lastname">

                        <label class="input-label" for="email">Email:</label>
                        <input id="email" type="text" class="input-text" required
                            value="{{ old('email', $contact->email) }}" name="email">

                        <label class="input-label" for="telephone-number">Telephone number:</label>
                        <input id="telephone-number" type="text" class="input-text" required
                            value="{{ old('telephone', $contact->telephone_number) }}" name="telephone">

                        <label class="input-label" for="address">Address:</label>
                        <input id="address" type="text" class="input-text" required
                            value="{{ old('address', $contact->address) }}" name="address">

                        <label class="input-label" for="nationality">Nationality:</label>
                        <input id="nationality" type="text" class="input-text" required placeholder="Nationality"
                            name="nationality" value="{{ old('nationality', $contact->nationality) }}">

                        <label class="input-label" for="passport-checked">ID Checked:</label>
                        <input id="passport-checked" type="checkbox" name="passport_checked" value="1"
                            {{ old('passport_checked', $contact->passport_checked == 1 ? 'checked' : '') }}>

                        <label class="input-label" for="date-of-arrival">Date of arrival:</label>
                        <input id="date-of-arrival" type="date" class="input-text"
                            value="{{ old('date_of_arrival', $reservation->date_of_arrival) }}" name="date_of_arrival">

                        <label class="input-label" for="date-of-departure">Date of departure:</label>
                        <input id="date-of-departure" type="date" class="input-text"
                            value="{{ old('date_of_departure', $reservation->date_of_departure) }}"
                            name="date_of_departure">

                        <input type="hidden" name="id" value="{{ $reservation->id }}">
                        <input type="hidden" name="contact_id" value="{{ $contact->id }}">
                    </div>
                    <div>
                        <x-room.available-rooms :currentRooms="$currentRooms" :availableRooms="$availableRooms" />
                    </div>

                </form>

                <div class="right">
                    @foreach ($rooms as $room)
                        <x-room.infobox :room="$room" />
                    @endforeach
                </div>
            </div>

            <div class="bottom-buttons flex-space-between">
                <x-buttons.secondary-button :href="route('reservation.info', $reservation->id)">Cancel</x-buttons.secondary-button>
                <x-buttons.primary-button form="edit-form">Save</x-buttons.primary-button>
            </div>


        </div>
    </main>
</x-layout.base>

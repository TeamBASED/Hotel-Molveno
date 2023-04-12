<x-layout.base>

    <main id="guest-edit" class="main-content">

        <h2>Edit guest</h2>
        <div class="grid-two-columns">

            <form id="guest-form" class="flex-column" action="{{ route('guest.update', ['reservation' => $reservation->id, 'guest' => $guest->id]) }}" method="POST">
                @csrf
                @method('PATCH')
                <div class="flex-center">
                    <div class="flex-column half-width">
                        <label for="first-name">First Name:</label>
                        <input class="input-text" type="text" id="first-name" name="first_name" required
                            placeholder="Guest's first name" value="{{old('first_name', $guest->first_name)}}">
                    </div>

                    <div class="flex-column half-width">
                        <label for="last-name">Last Name:</label>
                        <input class="input-text" type="text" id="last-name" name="last_name" required
                            placeholder="Guest's last name" value="{{old('last_name', $guest->last_name)}}">
                    </div>
                </div>

                <div class="flex-column">
                    <label for="nationality">Nationality:</label>
                    <input class="input-text" type="text" id="nationality" name="nationality" required
                        placeholder="Guest's nationality" value="{{old('nationality', $guest->nationality)}}">
                </div>

                <div class="flex-column">
                    <label for="passport-number">Passport Number:</label>
                    <input class="input-text half-width" type="text" id="passport-number" name="passport_number" required
                        placeholder="Guest's passport number" value="{{old('passport_number', $guest->passport_number)}}">
                </div>

                <div class="flex-column">
                    <label for="date-of-birth">Date of Birth:</label>
                    <input class="input-text half-width" type="date" id="date-of-birth" name="date_of_birth" required
                        placeholder="Guest's date of birth" value="{{old('date_of_birth', $guest->date_of_birth)}}">
                </div>

                <div class="flex-column">
                    <label for="date-of-birth">Passport checked?</label>
                    <input class="input-text half-width" type="checkbox" id="passport-checked" name="passport_checked"
                        value="1" {{ old('passport_checked', $guest->passport_checked == 1 ? 'checked' : '')}}>
                </div>

                <input type="hidden" name="reservation_id" value="{{ $reservation->id }}">

                <div class="flex-flex-end">
                </div>
            </form>

            <x-guest.overview-box :$reservation />

            <div>
                <x-buttons.secondary-button :href="route('room.overview')">Cancel</x-buttons.secondary-button>
            </div>

            <div class="flex-space-between">
                <x-buttons.primary-button form="guest-form">Confirm Changes</x-buttons.primary-button>
            </div>

        </div>

    </main>

</x-layout.base>

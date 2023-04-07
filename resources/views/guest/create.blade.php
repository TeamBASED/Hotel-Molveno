<x-layout.base>

    <main id="guest-create" class="main-content">

        <h2>Create guest</h2>
        <div class="grid-two-columns">

            <form id="guest-form" class="flex-column" action="{{ route('guest.store', ['id' => $reservation->id]) }}" method="POST">
                @csrf
                <div class="flex-center">
                    <div class="flex-column half-width">
                        <label for="firstname">First Name:</label>
                        <input class="input-text" type="text" id="firstname" name="firstname"
                            placeholder="Guest's first name">
                    </div>

                    <div class="flex-column half-width">
                        <label for="lastname">Last Name:</label>
                        <input class="input-text" type="text" id="lastname" name="lastname"
                            placeholder="Guest's last name">
                    </div>
                </div>

                <div class="flex-column">
                    <label for="nationality">Nationality:</label>
                    <input class="input-text" type="text" id="nationality" name="nationality"
                        placeholder="Guest's nationality">
                </div>

                <div class="flex-column">
                    <label for="passport-number">Passport Number:</label>
                    <input class="input-text half-width" type="text" id="passport-number" name="passport_number"
                        placeholder="Guest's passport number">
                </div>

                <div class="flex-column">
                    <label for="date-of-birth">Date of Birth:</label>
                    <input class="input-text half-width" type="date" id="date-of-birth" name="date_of_birth"
                        placeholder="Guest's date of birth">
                </div>

                <div class="flex-flex-end">
                    <x-buttons.primary-button class="button">Save</x-buttons.primary-button>
                </div>
            </form>

            <x-guest.overview-box :$reservation />

            <x-buttons.primary-button
                :href="route('room.overview')"
                class="button gray-background flex-center-center"
            >Cancel</x-buttons.primary-button>

            <x-buttons.primary-button
                :href="route('reservation.info', $reservation->id)"
                class="button gray-background flex-center-center"
            >Next</x-buttons.primary-button>


        </div>

    </main>

</x-layout.base>

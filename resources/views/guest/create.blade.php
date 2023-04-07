<x-layout.base>

    <main id="guest-create" class="main-content">

        <h2>Create guest</h2>
        <div class="grid-two-columns">

            <form id="guest-form" class="flex-column" action="{{ route('guest.store', ['id' => $reservation->id]) }}"
                method="POST">
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
                </div>
            </form>

            <x-guest.overview-box :$reservation />

            <div>
                <x-buttons.secondary-button :href="route('room.overview')">Cancel</x-buttons.secondary-button>
            </div>

            <div class="flex-space-between">
                <x-buttons.primary-button form="guest-form">Add Guest</x-buttons.primary-button>

                <x-buttons.primary-button>Complete</x-buttons.primary-button>
            </div>

        </div>

    </main>

</x-layout.base>

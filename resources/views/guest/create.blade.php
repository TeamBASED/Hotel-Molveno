<x-layout.base>

    <main id="guest-create" class="main-content">

        <h2>Create guest</h2>
        <div class="grid-two-columns">

            <form id="guest-form" class="flex-column" action="{{ route('guest.store', ['id' => $reservation->id]) }}"
                method="POST">
                @csrf
                {{-- {{ dd($_GET) }} --}}
                <div class="flex-center">
                    <div class="flex-column half-width">
                        <label for="firstname">First Name:</label>
                        <input class="input-text" type="text" id="firstname" name="firstname"
                            placeholder="Guest's first name"
                            @if (isset($_GET['showContact'])) value="{{ $reservation->contact->first_name }}" readonly @endif
                            required>
                    </div>

                    <div class="flex-column half-width">
                        <label for="lastname">Last Name:</label>
                        <input class="input-text" type="text" id="lastname" name="lastname"
                            placeholder="Guest's last name"
                            @if (isset($_GET['showContact'])) value="{{ $reservation->contact->last_name }}" readonly @endif
                            required>
                    </div>
                </div>

                <div class="flex-column">
                    <label for="nationality">Nationality:</label>
                    <input class="input-text" type="text" id="nationality" name="nationality"
                        placeholder="Guest's nationality"
                        @if (isset($_GET['showContact'])) value="{{ $reservation->contact->nationality }}" readonly @endif
                        required>
                </div>

                <div class="flex-column">
                    <label for="passport-number">Passport Number:</label>
                    <input class="input-text half-width" type="text" id="passport-number" name="passport_number"
                        placeholder="Guest's passport number" required>
                </div>

                <div class="flex-column">
                    <label for="date-of-birth">Date of Birth:</label>
                    <input class="input-text half-width" type="date" id="date-of-birth" name="date_of_birth"
                        placeholder="Guest's date of birth" required>
                </div>

                <div class="flex-space-between">
                    <label for="checked_in">Passport checked?</label>
                    <input type="checkbox" name="passport_checked" id="passport_checked">
                </div>

                @if (isset($_GET['showContact']))
                    <input type="text" value="{{ $reservation->contact->id }}" name="contact_id" hidden>
                @endif

                <div class="flex-flex-end">
                </div>
            </form>

            <x-guest.overview-box :$reservation />

            <div>
                <x-buttons.secondary-button :href="route('reservation.info', $reservation->id)">Cancel</x-buttons.secondary-button>
                @if (isset($_GET['showContact']))
                    <x-buttons.secondary-button :href="route('guest.create', ['id' => $reservation->id])">Remove Contact Information
                    </x-buttons.secondary-button>
                @else
                    <x-buttons.secondary-button :href="route('guest.create', ['id' => $reservation->id, 'showContact' => true])">Add Contact Information</x-buttons.secondary-button>
                @endif
            </div>

            <div class="flex-space-between">
                <x-buttons.primary-button form="guest-form">Add Guest</x-buttons.primary-button>
                <form action="{{ route('reservation.info', ['id' => $reservation->id]) }}">
                    <x-buttons.primary-button>Complete</x-buttons.primary-button>
                </form>

            </div>

        </div>

    </main>

</x-layout.base>

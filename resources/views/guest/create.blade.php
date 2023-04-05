<x-layout.base>

    <main id="guest-create" class="main-content">

        <h2>Create guest</h2>
        <div class="grid-two-columns">

            <div class="input">
                <form action="{{ route('guest.store', ['id' => $reservation->id]) }}" method="POST">
                    @csrf
                    <div class="flex-center">
                        <label for="first-name">First Name:</label>
                        <input class="input-text" type="text" id="firstname" name="firstname"
                            placeholder="Enter your first name">

                        <label for="last-name">Last Name:</label>
                        <input class="input-text" type="text" id="lastname" name="lastname"
                            placeholder="Enter your last name">
                    </div>

                    <div class="flex-center">
                        <label for="nationality">Nationality:</label>
                        <input class="input-text" type="text" id="nationality" name="nationality"
                            placeholder="Enter your nationality">
                    </div>

                    <div class="flex-center">
                        <label for="passport-number">Passport Number:</label>
                        <input class="input-text" type="text" id="passportnumber" name="passportnumber"
                            placeholder="Enter your passport number">
                    </div>
                    <div class="flex-center">

                        <label for="date-of-birth">Date of Birth:</label>
                        <input class="input-text" type="date" id="dateofbirth" name="dateofbirth"
                            placeholder="Enter your date of birth">
                    </div>

                    <x-buttons.primary-button>Submit</x-buttons.primary-button>
                </form>

                {{-- <input type="text" placeholder="first name" name="firstname">
                <input type="text" placeholder="last name" name="lastname">
                <input type="text" placeholder="nationality" name="nationality">
                <input type="text" placeholder="passport number" name="passportnumber">
                <input type="text" placeholder="date of birth" name="dateofbirth"> --}}


            </div>

            <div class="guestOverview">

                <h3>Current guests</h3>

                @foreach ($reservation->guests as $guest)
                    <div class="flex-space-between">
                        <p>{{ $guest->first_name }} {{ $guest->last_name }}</p>
                        <x-buttons.edit-button />
                    </div>
                @endforeach

            </div>

            <x-buttons.primary-button :href="route('reservation.info', $reservation->id)" class="button gray-background flex-center-center"> Next
            </x-buttons.primary-button>


        </div>

    </main>

</x-layout.base>

<x-layout.base>
    <main id="reservation-create" class="main-content">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <h2>Create reservation</h2>
        <div class="margin-block">
            <form action="{{ route('reservation.store') }}" method="POST" id="reservation-form"
                class="flex-column padding-block-1rem">
                @csrf
                <div class="flex-space-between">
                    <input type="hidden" required name="room" value="{{ isset($room) ? $room->id : '' }}">
                    <div id="input-box" class="flex-column padding-block-1rem">
                        <div class="flex-column">

                            <label class="input-label" for="first-name">First name:</label>
                            <input id="first-name" type="text" class="input-text" required placeholder="First Name"
                                name="firstname" value="{{ isset($contact) ? $contact->first_name : '' }}">

                            <label class="input-label" for="last-name">Last name:</label>
                            <input id="last-name" type="text" class="input-text" required placeholder="Last Name"
                                name="lastname" value="{{ isset($contact) ? $contact->last_name : '' }}">

                            <label class="input-label" for="email">Email:</label>
                            <input id="email" type="text" class="input-text" required placeholder="Email"
                                name="email" value="{{ isset($contact) ? $contact->email : $new_contact }}">

                            <label class="input-label" for="telephone-number">Telephone number:</label>
                            <input id="telephone-number" type="text" class="input-text" required
                                placeholder="Telephone Number" name="telephone"
                                value="{{ isset($contact) ? $contact->telephone_number : '' }}">

                            <label class="input-label" for="address">Address:</label>
                            <input id="address" type="text" class="input-text" required placeholder="Address"
                                name="address" value="{{ isset($contact) ? $contact->address : '' }}">

                            <label class="input-label" for="nationality">Nationality:</label>
                            <input id="nationality" type="text" class="input-text" required placeholder="Nationality"
                                name="nationality" value="{{ isset($contact) ? $contact->nationality : '' }}">

                            <label class="input-label" for="passport-checked">ID Checked:</label>
                            <input id="passport-checked" type="checkbox" name="id_checked" value="1"
                                {{ $contact?->id_checked == 1 ? 'checked' : '' }}>

                        </div>
                        <div class="flex-column">

                            <input type="hidden" name="contact" value="{{ isset($contact) ? $contact->id : '' }}">

                            <label class="input-label" for="date-of-arrival">Date of arrival:</label>
                            <input type="date" id="date-of-arrival" class="input-text" required name="arrival"
                                value="{{ $date_of_arrival }}">

                            <label class="input-label" for="date-of-departure">Date of departure:</label>
                            <input type="date" id="date-of-departure" class="input-text" required name="departure"
                                value="{{ $date_of_departure }}">

                        </div>
                    </div>
                    <x-room.infobox :room="$room" />
                </div>
                <div id="button-box" class="flex-space-between">
                    <x-buttons.secondary-button :href="route('room.overview')">Cancel</x-buttons.secondary-button>
                    <x-buttons.primary-button>Next</x-buttons.primary-button>
                </div>
            </form>

            {{-- <script>
                var date = new Date();
                var day = date.getDate() + 1;
                var month = date.getMonth() + 1;
                var nextMonth = date.getMonth() + 2;
                var year = date.getFullYear();

                if (month < 10) month = "0" + month;
                if (nextMonth < 10) nextMonth = "0" + nextMonth;
                if (day < 10) day = "0" + day;

                var arrival = year + "-" + month + "-" + day;
                var departure = year + "-" + nextMonth + "-" + day;

                document.getElementById("date-of-arrival").value = arrival;
                document.getElementById("date-of-departure").value = departure;
            </script> --}}
        </div>
    </main>
</x-layout.base>

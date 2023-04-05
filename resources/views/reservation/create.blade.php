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
            <form action="{{ route('reservation.store') }}" method="POST" id="reservation-form" class="flex-column padding-block-1rem">
                @csrf
                <div class="flex-space-between">
                    <input type="hidden" required name="room" value="{{ isset($room) ? $room->id : ''}}">
                    <div id="input-box" class="flex-column padding-block-1rem">
                        <div class="flex-column">
                            <input type="text" class="input-text" required placeholder="First Name" name="firstname" value="{{ isset($contact) ? $contact->first_name : ''}}">
                            <input type="text" class="input-text" required placeholder="Last Name" name="lastname" value="{{ isset($contact) ? $contact->last_name : ''}}">
                            <input type="text" class="input-text" required placeholder="Email" name="email" value="{{ isset($contact) ? $contact->email : $new_contact }}">
                            <input type="text" class="input-text" required placeholder="Telephone Number" name="telephone" value="{{ isset($contact) ? $contact->telephone_number : ''}}">
                            <input type="text" class="input-text" required placeholder="Address" name="address" value="{{ isset($contact) ? $contact->address : ''}}">
                            <input type="text" class="input-text" required placeholder="Nationality" name="nationality" value="{{ isset($contact) ? $contact->nationality : ''}}">
                            <input type="checkbox" required name="id_checked" value="1" {{ isset($contact) ? $contact->id_checked == 1 ? 'checked' : ''}}>
                        </div>
                        <div class="flex-column">
                            <input type="hidden" required name="contact" value="{{ isset($contact) ? $contact->id : ''}}">
                            <label for="arrival">Date of arrival&colon;</label>
                            <input type="date" id="arrival-date" class="input-text" required name="arrival">
                            <label for="departure">Date of departure&colon;</label>
                            <input type="date" id="departure-date" class="input-text" required name="departure">
                        </div>
                    </div>
                    <x-room.infobox :room="$room" />
                </div>
                <div id="button-box" class="flex-space-between">
                    <x-buttons.primary-button :href="route('room.overview')" class="button gray-background flex-center-center">Cancel</x-buttons.primary-button>
                    <x-buttons.primary-button type="submit">Save</x-buttons.primary-button>
                </div>
            </form>
            <script>
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

                document.getElementById("arrival-date").value = arrival;
                document.getElementById("departure-date").value = departure;
            </script>
        </div>
    </main>
</x-layout.base>
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
                    <div id="input-box" class="flex-column padding-block-1rem">
                        <div>
                            <input type="text" class="input-text" required placeholder="First Name" name="firstname">
                            <input type="text" class="input-text" required placeholder="Last Name" name="lastname">
                            <input type="text" class="input-text" required placeholder="Email" name="email">
                            <input type="text" class="input-text" required placeholder="Telephone Number" name="telephone">
                            <input type="text" class="input-text" required placeholder="Address" name="address">
                        </div>
                        <div>
                            <label for="arrival">Date of arrival&colon;</label>
                            <input type="date" class="input-text" required name="arrival">
                            <label for="departure">Date of departure&colon;</label>
                            <input type="date" class="input-text" required name="departure">
                        </div>
                    </div>
                    <x-room.infobox :room="$room" />
                </div>
                <div id="button-box" class="flex-space-between">
                    <x-buttons.primary-button :href="route('room.overview')" class="button gray-background flex-center-center">Cancel</x-buttons.primary-button>
                    <x-buttons.primary-button class="button">Save</x-buttons.primary-button>
                </div>
            </form>
        </div>
    </main>
</x-layout.base>
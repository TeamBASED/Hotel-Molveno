<div class="guest-overview">

    <h3>Current guests</h3>

    @foreach ($reservation->guests as $guest)
        <div class="flex-space-between">
            <p>{{ $guest->first_name }} {{ $guest->last_name }}</p>
            <x-buttons.edit-button>Edit</x-buttons.edit-button>
        </div>
    @endforeach

</div>
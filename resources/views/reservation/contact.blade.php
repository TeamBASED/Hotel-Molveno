<x-layout.base>
    <main id="contact-identification" class="main-content flex-center">
        <div>
            <p>Enter Email to verify if a contact already exists.</p>
            <form action="{{ route('reservation.verify', ['roomId' => $roomId]) }}" method="POST">
                @csrf

                @if (isset($request->dateOfArrival))
                    <input type="hidden" name="date_of_arrival" value="{{ $request->dateOfArrival }}">
                @endif

                @if (isset($request->dateOfDeparture))
                    <input type="hidden" name="date_of_departure" value="{{ $request->dateOfDeparture }}">
                @endif

                @if (isset($request->selectedRoom))
                    <input type="hidden" name="roomId" value="{{ $request->selectedRoom }}">
                @endif



                <input type="email" name="email" class="input-text" placeholder="Email" required>
                <x-buttons.primary-button>Verify</x-buttons.primary-button>
            </form>
        </div>
    </main>
</x-layout.base>

<x-layout.base>
    <main id="contact-identification" class="main-content flex-center">
        <div>
            <p>Enter Email to verify if a contact already exists.</p>
            <form action="{{ route('reservation.verify', ['roomId' => $roomId]) }}" method="POST">
                @csrf
                <input type="email" name="email" class="input-text" placeholder="Email" required>
                <x-buttons.primary-button>Verify</x-buttons.primary-button>
            </form>
        </div>
    </main>
</x-layout.base>

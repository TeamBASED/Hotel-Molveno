<x-layout.base>
    <main id="contact-identification">
        <p>Enter Email to verify if a contact already exists.</p>
        <form action="{{ route('reservation.create') }}" method="POST">
            @csrf
            <input type="email" name="email" id="" placeholder="Email">
            <x-buttons.primary-button class="button">Verify</x-buttons.primary-button>
        </form>
    </main>
</x-layout.base> 
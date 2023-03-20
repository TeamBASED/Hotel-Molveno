<x-layout.base>
    <main id="reservation-create">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="margin-block">
            <h1>Create room</h1>
            <form action="" method="POST">
                @csrf
                <div>
                    <input type="text" class="" required placeholder="Contact Name" name="contactname">
                    <label for="arrival">Date of arrival&colon;</label>
                    <input type="date" class="" required name="arrival">
                    <label for="departure">Date of departure&colon;</label>
                    <input type="date" class="input-text" required name="departure">
                </div>
                <x-buttons.primary-button class="button">Save</x-buttons.primary-button>
            </form>
        </div>
        <div></div>
        <div class="buttons">
            <x-buttons.primary-button :href="route('room.overview')" class="button gray-bg">Cancel</x-buttons.primary-button>
        </div>
    </main>
</x-layout.base>
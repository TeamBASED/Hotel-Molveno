<x-layout.base>
    <main id="room-create" class="main-content">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <h2>Create room</h2>

        <form action="{{ route('room.store') }}" method="POST" class="grid-three-columns padding-inline-5rem">
            @csrf

            <div class="flex-column">
                <input type="text" class="input-text" required placeholder="Room number" name="number">
                <input type="text" class="input-text" required placeholder="Capacity" name="capacity">
                <input type="text" class="input-text" required placeholder="Price per night" name="price">
                <div class="inline-input">
                    <label for="single-bed-configuration">Single beds</label>
                    <input id="single-bed-configuration" type="number" class="input-text" required name="singleBeds"
                        value="0">
                </div>
                <div class="inline-input">
                    <label for="double-bed-configuration">Double beds</label>
                    <input id="double-bed-configuration" type="number" class="input-text" required name="doubleBeds"
                        value="0">
                </div>

                <div class="flex-column">
                    <div class="flex-space-between">
                        <label for="baby-bed">Baby bed possible:</label>
                        <input type="checkbox" class="input-text" name="babybed" value="1">
                    </div>
                    <textarea class="input-text flex-grow-1" id="room-edit-description" placeholder="Room description" name="description"></textarea>
                </div>

                <div class="flex-column">
                    <select class="dropdown-select" name="type" required>
                        @foreach ($roomTypes as $option)
                            <option class="filter-field-option" value="{{ $option->id }}">{{ $option->type }}</option>
                        @endforeach
                    </select>
                    <select class="dropdown-select" name="view" required>
                        @foreach ($roomViews as $option)
                            <option class="filter-field-option" value="{{ $option->id }}">{{ $option->view }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="flex-space-between grid-span-3">
                    <x-buttons.secondary-button :href="route('room.overview')">Cancel</x-buttons.secondary-button>
                    <x-buttons.primary-button class="button">Save</x-buttons.primary-button>
                </div>
        </form>

    </main>
</x-layout.base>

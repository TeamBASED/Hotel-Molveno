<x-layout.base>
<main id="room-create">
    <div class="container-create">
        <h1>Create room</h1>
        <form action="/room/create" method="POST">
            @csrf
            <div class="left">
                <input type="text" class="input-text" required placeholder="Room number" name="number">
                <input type="text" class="input-text" required placeholder="Capacity" name="capacity">
                <input type="text" class="input-text" required placeholder="Price per night" name="price">
                <input type="text" class="input-text" required placeholder="Bed configuration" name="configuration">
                <!-- view = dropdown -->
            </div>
            <div class="middle">
                <div>
                    <label for="baby-bed">Baby bed possible:</label>
                    <input type="checkbox" class="input-text" name="babybed" value="1">
                </div>
                <input type="text" class="input-text" id="room-edit-description" placeholder="Room description" name="description">
            </div>
            <div class="right">
                <select class="dropdown-select" name="type" required>
                    @foreach ($roomViews as $option)
                        <option class="filter-field-option" value="{{$option->id}}">{{$option->type}}</option>
                    @endforeach
                </select>
                <select class="dropdown-select" name="view" required>
                    @foreach ($roomViews as $option)
                        <option class="filter-field-option" value="{{$option->id}}">{{$option->type}}</option>
                    @endforeach
                </select>
                {{-- <x-input-fields.dropdown-select :options="$roomTypes" name="type"/> --}}
                {{-- <x-input-fields.dropdown-select :options="$roomViews" name="view"/> --}}
            </div>
            <x-buttons.primary-button class="button">Save</x-buttons.primary-button>
        </form>
    </div>
    <div class="buttons">
        <x-buttons.primary-button class="button gray-bg">Cancel</x-buttons.primary-button>
    </div>
</main>
</x-layout.base>
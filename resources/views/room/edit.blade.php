<x-layout.base>
    <main id="room-edit" class="main-content">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (isset($_GET['notification']))
            <p class="notification">{{ $_GET['notification'] }}</p>
        @endif




        <div class="padding-inline-5rem">
            <div class="crud-header flex-center-center">
                <h2>Edit room</h2>
                <x-buttons.tertiary-button class="warning absolute-right" id="delete-button">Delete
                </x-buttons.tertiary-button>
                <x-delete-confirmation :removeId='$room->id' :removalRoute="route('room.delete', $room->id)"></x-delete-confirmation>
            </div>

            <form action="{{ route('room.update', $room->id) }}" method="POST" class="edit-room-form grid-three-columns">
                @csrf
                @method('PATCH')
                <div class="flex-column padding-block-1rem">
                    <label for="room-number">Room number:</label>
                    <input id="room-number" type="text" class="input-text" required placeholder="Room number"
                        name="number" value="{{ old('number', $room->room_number) }}">
                    <label for="capacity">Capacity:</label>
                    <input id="capacity" type="text" class="input-text" required placeholder="Capacity"
                        name="capacity" value="{{ old('capacity', $room->capacity) }}">
                    <label for="price-per-night">Price per night:</label>
                    <input id="price-per-night" type="text" class="input-text" required placeholder="Price per night"
                        name="price" value="{{ old('price', $room->base_price_per_night) }}">
                    <div class="inline-input">
                        <label for="single-bed-configuration">Single beds:</label>
                        <input id="single-bed-configuration" type="number" class="input-text" required
                            name="singleBeds" value="{{ old('configuration', $singleBeds) }}">
                    </div>
                    <div class="inline-input">
                        <label for="double-bed-configuration">Double beds</label>
                        <input id="double-bed-configuration" type="number" class="input-text" required
                            name="doubleBeds" value="{{ old('configuration', $doubleBeds) }}">
                    </div>
                    <!-- view = dropdown -->
                </div>
                <div class="flex-column padding-block-1rem">
                    <div class="flex-space-between flex-aling-center">
                        <label for="baby-bed">Baby bed possible:</label>
                        <input id="baby-bed" type="checkbox" class="input-text" name="babybed" value="1"
                            {{ $room->baby_bed_possible == 1 ? 'checked' : '' }}>
                    </div>
                    <label for="room-edit-description">Description:</label>
                    <textarea class="input-text flex-grow-1" id="room-edit-description" placeholder="Room description" name="description">{{ old('description', $room->description) }}</textarea>
                </div>



                <div class="flex-column padding-block-1rem">
                    <label for="room-type">Room type:</label>
                    <select id="room-type" class="dropdown-select" name="type" required>
                        @foreach ($roomTypes as $option)
                            <option class="filter-field-option" value="{{ $option->id }}"
                                @if ($option->id == old('type', $room->room_type_id)) selected="selected" @endif>{{ $option->type }}
                            </option>
                        @endforeach
                    </select>
                    <label for="room-view">Room view:</label>
                    <select id="room-view" class="dropdown-select" name="view" required>
                        @foreach ($roomViews as $option)
                            <option class="filter-field-option" value="{{ $option->id }}"
                                @if ($option->id == old('view', $room->room_view_id)) selected="selected" @endif>{{ $option->view }}
                            </option>
                        @endforeach
                    </select>
                    <input type="hidden" name="id" value="{{ $room->id }}">
                </div>

                <div class="flex-space-between grid-span-3">
                    <x-buttons.secondary-button :href="route('room.info', $room->id)">Cancel</x-buttons.secondary-button>
                    <x-buttons.primary-button>Save</x-buttons.primary-button>
                </div>
            </form>
        </div>
    </main>
</x-layout.base>

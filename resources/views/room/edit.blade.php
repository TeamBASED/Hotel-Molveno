<x-layout.base>
<main id="room-edit">

    <div class="container-edit">
        <div class="three-column-mid-stretch padding-inline-5rem">
            <div class="blank"></div>
            <h1>Edit room</h1>
            <form action="/room/{{$room->id}}/delete" method="POST" class="delete-form">
                @csrf
                @method('DELETE')
                <input type="hidden" name="id" value="{{ $room->id }}">
                <x-buttons.primary-button class="button gray-bg right-aligned">Delete</x-buttons.primary-button>
            </form>
        <div class="blank"></div>
        <form action="{{ route('room.update', $room->id) }}" method="POST" class="edit-room-form">
        @csrf
        @method('PATCH')
            <div class="left">
                <input type="text" class="input-text" required placeholder="Room number" name="number" value="{{old('number', $room->room_number)}}">
                <input type="text" class="input-text" required placeholder="Capacity" name="capacity" value="{{old('capacity', $room->capacity)}}">
                <input type="text" class="input-text" required placeholder="Price per night" name="price" value="{{old('price', $room->base_price_per_night)}}">
                <input type="text" class="input-text" required placeholder="Bed configuration" name="configuration" value="{{old('configuration', $room->bed_configuration)}}">
                <!-- view = dropdown -->
            </div>
            <div class="middle">
                <div class="babybed">
                    <label for="baby-bed">Baby bed possible:</label>
                    <input type="checkbox" class="input-text" name="babybed" value="1" {{$room->baby_bed_possible == 1 ? 'checked' : ''}}>
                </div>
                <input type="text" class="input-text" id="room-edit-description" placeholder="Room description" name="description" value="{{old('description', $room->description)}}">
            </div>
            <div class="right">
                <select class="dropdown-select" name="type" required>
                    @foreach ($roomTypes as $option)
                        <option class="filter-field-option" value="{{$option->id}}" 
                            @if ($option->id == old('type', $room->room_type_id))
                                selected="selected"
                            @endif
                                >{{$option->type}}</option>
                    @endforeach
                </select>
                <select class="dropdown-select" name="view" required>
                    @foreach ($roomViews as $option)
                        <option class="filter-field-option" value="{{$option->id}}" 
                            @if ($option->id == old('view', $room->room_view_id))
                                selected="selected"
                            @endif
                                >{{$option->type}}</option>
                    @endforeach
                </select>
                {{-- <x-input-fields.dropdown-select :options="$roomTypes" name="type"/> Doesn't quite work as expected or desired --}}
                {{-- <x-input-fields.dropdown-select :options="$roomViews" name="view"/> Doesn't quite work as expected or desired --}}
                <input type="hidden" name="id" value="{{ $room->id }}">
            </div>
            <x-buttons.primary-button class="button">Save</x-buttons.primary-button>
        </form>
        <div class="blank"></div>
    </div>
    <div class="flex-space-between buttons">
        <x-buttons.primary-button class="button gray-bg">Cancel</x-buttons.primary-button>
    </div>
</main>
</x-layout.base>
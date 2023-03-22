<x-layout.base>

    <x-slot:resources>
        @vite('resources/js/roomOverviewDetails.js')
    </x-slot>

    <main class="main-content" id="room-overview">
        <div class="left-side">
            <form class="filter" action="{{ route('room.overview') }}" method="GET">

                <label for="capacity-filter">Capacity</label>
                <input id="capacity-filter" type="number" name="capacity" value="{{ request('capacity') }}">
                
                <label for="number-filter">Number</label>
                <input id="number-filter" type="text" name="number" value="{{ request('number') }}">

                <label for="babybed-filter">Baby bed</label>
                @if (request('babybed'))
                    <input id="babybed-filter" type="checkbox" name="babybed" checked>
                @else
                    <input id="babybed-filter" type="checkbox" name="babybed">
                @endif
                
                <select class="filter-field" name="type">
                    <option value="">Select all</option>

                    @foreach ($roomTypes as $type)

                        @if (request('type') == $type->id)
                            <option class="filter-field-option" selected value={{$type->id}}>{{$type->type}}</option>
                        @else
                            <option class="filter-field-option" value={{$type->id}}>{{$type->type}}</option>
                        @endif

                    @endforeach
                </select>

                <select class="filter-field" name="view">
                    <option value="">Select all</option>

                    @foreach ($roomViews as $view)

                        @if (request('view') == $view->id)
                            <option class="filter-field-option" selected value={{$view->id}}>{{$view->type}}</option>
                        @else
                            <option class="filter-field-option" value={{$view->id}}>{{$view->type}}</option>
                        @endif

                    @endforeach
                </select>

                <x-buttons.secondary-button>Search</x-buttons.secondary-button>
                
            </form>
            <h2>Rooms</h2>
            <div id="rooms-container">

                @foreach ($rooms as $room)

                    <x-room.card :room="$room" />
                    
                @endforeach
                    
            </div>
        </div>
        <div id="details-section" class="hidden">
            <h2>Details</h2>

            <div class="grid-two-columns">
                <p class="details-label">Number</p>
                <p id="details-number" class="right-aligned"></p>

                <p class="details-label">Type</p>
                <p id="details-type" class="right-aligned"></p>

                <p class="details-label">Capacity</p>
                <p id="details-capacity" class="right-aligned"></p>

                <p class="details-label">Price per night</p>
                <p id="details-price-per-night" class="right-aligned"></p>

                <p class="details-label">View</p>
                <p id="details-view" class="right-aligned"></p>

                <p class="details-label">Bed configuration</p>
                <p id="details-bed-configuration" class="right-aligned"></p>

                <p class="details-label">Cleaning status</p>
                <p id="details-cleaning-status" class="right-aligned"></p> 

                <p class="details-label" class="grid-span-2">Description</p>
                <p id="details-description" class="grid-span-2"></p>

                <p class="details-label" class="grid-span-2">Availability</p>
                <p id="details-availability" class="grid-span-2"></p> 
            </div>
            

            <div class="bottom-buttons">
                <!-- <x-buttons.secondary-button id="details-reservation-button">Make reservation</x-buttons.secondary-button> -->
                <x-buttons.secondary-button id="details-info-button" :href="route('room.info', ['id' => 1])">Open room info</x-buttons.secondary-button>
            </div>

            <p id="select-room-message">Click a room to view details.</p>
        </div>
    </main>
</x-layout.base> 

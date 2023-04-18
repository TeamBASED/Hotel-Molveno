<x-layout.base>

    <x-slot:resources>
        @vite('resources/js/roomOverviewDetails.js')
        </x-slot>
        @if (isset($_GET['notification']))
            <p class="notification">{{ $_GET['notification'] }}</p>
        @endif
        <main class="main-content" id="room-overview">



            <div class="left-side">
                <form class="filter-section" action="{{ route('room.overview') }}" method="GET">

                    <div class="filter-options">

                        <div class="filter-row">
                            <div class="filter-item">
                                <label for="capacity-filter">Capacity</label>
                                <input id="capacity-filter" class="filter-input" type="number" name="capacity"
                                    min="0" value="{{ request('capacity') }}">
                            </div>

                            <div class="filter-item">
                                <label for="number-filter">Number</label>
                                <input id="number-filter" class="filter-input" type="text" name="number"
                                    value="{{ request('number') }}">
                            </div>

                            <div class="filter-item">
                                <select class="filter-field" name="type">
                                    <option value="">select all</option>

                                    @foreach ($roomTypes as $type)
                                        @if (request('type') == $type->id)
                                            <option class="filter-field-option" selected value={{ $type->id }}>
                                                {{ $type->type }}</option>
                                        @else
                                            <option class="filter-field-option" value={{ $type->id }}>
                                                {{ $type->type }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>

                            <div class="filter-item">
                                <select class="filter-field" name="view">
                                    <option value="">select all</option>

                                    @foreach ($roomViews as $view)
                                        @if (request('view') == $view->id)
                                            <option class="filter-field-option" selected value={{ $view->id }}>
                                                {{ $view->type }}</option>
                                        @else
                                            <option class="filter-field-option" value={{ $view->id }}>
                                                {{ $view->type }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="filter-row">
                            <div class="filter-item">
                                <label for="single-bed-filter">Single bed</label>
                                <input id="single-bed-filter" class="filter-input" type="number" name="singleBed"
                                    min="0" value="{{ request('singleBed') }}">
                            </div>

                            <div class="filter-item">
                                <label for="double-bed-filter">Double bed</label>
                                <input id="double-bed-filter" class="filter-input" type="number" name="doubleBed"
                                    min="0" value="{{ request('doubleBed') }}">
                            </div>

                            <div class="filter-item">
                                <label for="babybed-filter">Baby bed</label>
                                @if (request('babybed'))
                                    <input id="babybed-filter" type="checkbox" name="babybed" checked>
                                @else
                                    <input id="babybed-filter" type="checkbox" name="babybed">
                                @endif
                            </div>

                            <div class="filter-item">
                                <label for="date-of-arrival-filter">Date of arrival</label>
                                <input id="date-of-arrival-filter" class="filter-input-wide" type="date"
                                    name="dateOfArrival" value="{{ request('dateOfArrival') }}">
                            </div>

                            <div class="filter-item">
                                <label for="date-of-departure-filter">Date of departure</label>
                                <input id="date-of-departure-filter" class="filter-input-wide" type="date"
                                    name="dateOfDeparture" value="{{ request('dateOfDeparture') }}">
                            </div>
                        </div>

                    </div>

                    <x-buttons.secondary-button class="search-button">Search</x-buttons.secondary-button>

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

                    <p class="details-label">Beds</p>
                    <div id="details-bed-configuration" class="right-aligned"></div>

                    <p class="details-label">Cleaning status</p>
                    <p id="details-cleaning-status" class="right-aligned"></p>

                    {{-- TODO: vul availability met JS in --}}
                    {{-- <p class="details-label" class="grid-span-2">Availability</p>
                <p id="details-availability" class="grid-span-2"></p>  --}}
                </div>

                <div class="bottom-buttons">
                    <x-buttons.secondary-button id="details-info-button" :href="route('room.info', ['room' => 1])">Open room info
                    </x-buttons.secondary-button>
                    <x-buttons.secondary-button id="details-reservation-button" :href="route('reservation.contact', ['id' => 1])">Make reservation
                    </x-buttons.secondary-button>
                </div>

                <p id="select-room-message">Click a room to view details.</p>
            </div>
        </main>

</x-layout.base>

<x-layout.base/>
<main id="rooms-overview">
    <div class="left-side">
        <div class="filter">

        </div>
        <h2>Rooms</h2>
        <div class="rooms-container">
            <div class="room-item">
                <div>
                    <h3>Room nr.</h3>
                    <h3>Price</h3>
                </div>
                <p>room type</p>
                <p class="margin-top">available</p>
                <x-buttons.primary-button>Make reservation</x-buttons.primary-button>
            </div>
        </div>
    </div>
    <div class="right-side">
        <h2>Details</h2>
        <p>Number</p>
        <p>Size</p>
        <p>Availability</p>
        <p>Cleaning status</p>
        <p>Bed configuration</p>
        <p>View</p>
        <p>Comments</p>
        <div class="margin-top">
            <x-buttons.secondary-button>Make reservation</x-buttons.secondary-button>
            <x-buttons.secondary-button>Open room info</x-buttons.secondary-button>
        </div>
    </div>
</main>
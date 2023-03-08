<x-layout.base/>
<main id="room-edit">

    <div class="container-edit">
        <div class="three-column-mid-stretch padding-inline-5rem">
            <div class="blank"></div>
            <h1>Edit room</h1>
            <form action="" class="delete-form"><x-buttons.primary-button class="button gray-bg right-aligned">Delete</x-buttons.primary-button></form>
        <div class="blank"></div>
        <form action="" class="edit-room-form">
        @csrf
            <div class="left">
                <input type="text" class="input-text" placeholder="Room number" name="room-number">
                <input type="text" class="input-text" placeholder="Capacity" name="capacity">
                <input type="text" class="input-text" placeholder="Price per night" name="price-per-night">
                <input type="text" class="input-text" placeholder="Bed configuration" name="bed-configuration">
                <!-- view = dropdown -->
            </div>
            <div class="middle">
                <div class="babybed">
                    <label for="baby-bed">Baby bed possible:</label>
                    <input type="checkbox" class="input-text" name="baby-bed">
                </div>
                <input type="text" class="input-text" id="room-edit-description" placeholder="Room description" name="room-edit-description">
            </div>
            <div class="right">
                <select name="Room view" class="dropdown-select" name="room-view">
                        <option value="">Test</option>
                </select>
                <select name="Size" class="dropdown-select" name="size">
                        <option value="">Test</option>
                </select>
            </div>
        </form>
        <div class="blank"></div>
            

    </div>
    <div class="flex-space-between buttons">
                <x-buttons.primary-button class="button gray-bg">Cancel</x-buttons.primary-button>
        <x-buttons.primary-button class="button">Save</x-buttons.primary-button>
    </div>
    </div>
 

</main>
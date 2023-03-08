<x-layout.base>
<main id="room-edit">

    <div class="container-edit">
        <div class="three-column-mid-stretch padding-inline-5rem">
            <div class="blank"></div>
            <h1>Edit room</h1>
            <form action="" class="delete-form"><x-buttons.primary-button class="button gray-bg right-aligned">Delete</x-buttons.primary-button></form>
        <div class="blank"></div>
        <form action="" method="POST" class="edit-room-form">
        @csrf
            <div class="left">
                <input type="text" class="input-text" placeholder="Room number" name="number">
                <input type="text" class="input-text" placeholder="Capacity" name="capacity">
                <input type="text" class="input-text" placeholder="Price per night" name="price">
                <input type="text" class="input-text" placeholder="Bed configuration" name="configuration">
                <!-- view = dropdown -->
            </div>
            <div class="middle">
                <div class="babybed">
                    <label for="baby-bed">Baby bed possible:</label>
                    <input type="checkbox" class="input-text" name="babybed">
                </div>
                <input type="text" class="input-text" id="room-edit-description" placeholder="Room description" name="description">
            </div>
            <div class="right">
                <x-input-fields.dropdown-select :options="$roomTypes" name="type"/>
                <x-input-fields.dropdown-select :options="$roomViews" name="view"/>
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
</x-layout.base>
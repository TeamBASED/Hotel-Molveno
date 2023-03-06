<x-layout.base/>
<main id="room-edit">

    <div class="container-edit">
        <div class="delete-button-container">
            <h1>Edit room</h1>
            <form action=""><x-buttons.primary-button class="button gray-bg">Delete</x-buttons.primary-button></form>
        </div>
            <form action="">
            @csrf
                <div class="left">
                    <input type="text" class="input-text" placeholder="Room number">
                    <input type="text" class="input-text" placeholder="Size">
                    <select name="Room view" class="dropdown-select">
                            <option value="">Test</option>
                    </select>   
                    <input type="text" class="input-text" placeholder="Price per night">
                    <!-- view = dropdown -->
                </div>
                <div class="right">
                    <input type="text" class="input-text" placeholder="Bed configuration">
                    <input type="text" class="input-text" id="room-edit-description" placeholder="Room description">
                </div>
            </form>
    </div>
 
    <div class="buttons">
        <x-buttons.primary-button class="button gray-bg">Cancel</x-buttons.primary-button>
        <x-buttons.primary-button class="button">Save</x-buttons.primary-button>
    </div>
</main>
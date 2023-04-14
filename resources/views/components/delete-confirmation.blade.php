{{-- 
    This component can be inserted at an arbitrary position in the blade page file. 
    It is linked to the button that has the id #delete-button.

    The component uses 2 props:
        - removeId is the id of the element that you want to have removed (eg. $room->id)
        - removalRoute is the name of the route that has the delete functionality (eg. 'room.delete')
 --}}

@props(['removeId', 'removalRoute'])


<x-slot:resources>
    @vite('resources/js/deleteConfirmation.js')
    </x-slot>

    <div class="hidden padding-1rem" id="delete-confirmation">



        <input type="hidden" name="id" value="{{ $removeId }}">
        <label for="password">Please fill in your password:</label>
        <input type="text" name="password" id="password" class="input-text">
        <div class="flex-space-around margin-block">
            <x-buttons.primary-button class="button gray-background flex-center-center" id="cancel-delete">
                Cancel
            </x-buttons.primary-button>
            <form action="{{ route($removalRoute, $removeId) }}" method="POST" id="delete-confirmation">
                @csrf
                @method('DELETE')
                <x-buttons.primary-button class="button gray-background right-aligned flex-center-center">Delete
                </x-buttons.primary-button>
            </form>
        </div>
    </div>

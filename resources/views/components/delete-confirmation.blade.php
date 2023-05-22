{{-- 
    This component can be inserted at an arbitrary position in the blade page file. 
    It is linked to the button that has the id #delete-button.
    Make sure the main element in the HTML has a display property of relative

    The component uses 2 props:
        - removeId is the id of the element that you want to have removed (eg. $room->id)
        - removalRoute is the name of the route that has the delete functionality (eg. 'room.delete')
 --}}

@props(['removeId', 'removalRoute'])


<x-slot:resources>
    @vite('resources/js/deleteConfirmation.js')
    </x-slot>

    <div class="hidden padding-1rem modal" id="delete-confirmation">

        <input type="hidden" name="id" value="{{ $removeId }}">
        <label for="password">Please enter your password:</label>
        <x-text-input id="password" type="password" name="password" placeholder="Password" required
            autocomplete="current-password" form="delete-confirmation-form" />

        <x-input-error :messages="$errors->get('password')" />
        <div class="flex-space-around margin-block">
            <x-buttons.secondary-button id="cancel-delete">
                Cancel
            </x-buttons.secondary-button>
            <form action="{{ $removalRoute }}" method="POST" id="delete-confirmation-form">
                @csrf
                @method('DELETE')
                <x-buttons.tertiary-button class="warning">Delete
                </x-buttons.tertiary-button>
            </form>
        </div>
    </div>

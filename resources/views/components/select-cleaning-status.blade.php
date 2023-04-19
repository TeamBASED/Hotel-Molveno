@props(['cleaningStatuses', 'room'])

<x-slot:resources>
    @vite('resources/js/changeCleaningStatus.js')
    </x-slot>

    <div class="hidden padding-1rem modal" id="cleaning-status-panel">
        <div class="flex-space-around margin-block">
            <x-buttons.secondary-button id="cancel-status-change">
                Cancel
            </x-buttons.secondary-button>
            <form action="{{ route('room.status', ['id' => $room->id]) }}" method="POST">
                @csrf
                @method('PATCH')
                <select>
                    @foreach ($roomViews as $option)
                        <option class="filter-field-option" value="{{ $option->id }}"
                            @if ($option->id == old('view', $room->room_view_id)) selected="selected" @endif>{{ $option->view }}
                        </option>
                    @endforeach
                </select>
                <input type="hidden" name="roomId" value="{{ $room->id }}">
                <x-buttons.primary-button>Change cleaning status</x-buttons.primary-button>
            </form>
        </div>
    </div>

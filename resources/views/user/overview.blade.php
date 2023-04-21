<x-layout.base>
    <main id="user-overview">
        <h2>Users</h2>

        <article class="flex-center">
            <div class="flex-column left-side padding-inline-1rem padding-block">
                <h3>Search user</h3>
                <p class="light-text">Hier komen zoekvelden.</p>
            </div>
            <div class="right-side padding-inline-5rem padding-block">
                <div class="grid-three-columns no-horizontal-gap ">
                    <h3>User</h3>
                    <h3>Role</h3>
                    <x-buttons.primary-button :href="route('user.register')">Register User
                    </x-buttons.primary-button>
                    @foreach ($users as $user)
                        <p class="gray-background padding-inline-5rem">{{ $user->first_name }} {{ $user->last_name }}
                        </p>
                        <p class="gray-background padding-inline-5rem">{{ $user->role->title }} </p>
                        <x-buttons.edit-button :href="route('user.edit', ['user' => $user->id])">Edit
                        </x-buttons.edit-button>
                    @endforeach

                </div>
            </div>
        </article>
    </main>
</x-layout.base>

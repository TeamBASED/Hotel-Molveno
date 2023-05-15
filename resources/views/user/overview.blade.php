<x-layout.base>
    <main id="user-overview">
        <h2>Users</h2>

        <article class="flex-center">
            <div class="flex-column left-side padding-inline-1rem padding-block">
                <h3>Search user</h3>
                <form action="{{ route('user.overview') }}" method="GET">

                    <label for="username-filter">Username</label>
                    <input id="username-filter"type="text" name="username" value="{{ request('username') }}">

                    <label for="first-name-filter">First Name</label>
                    <input id="first-name-filter"type="text" name="first_name" value="{{ request('first_name') }}">

                    <label for="last-name-filter">Last Name</label>
                    <input id="last-name-filter"type="text" name="last_name" value="{{ request('last_name') }}">

                    <label for="role-filter">Role</label>
                    <select id="role-filter" name="role">
                        <option value="">Select All</option>
                        @foreach ($roles as $role)
                            @if (request('role') == $role->id)
                                <option class="filter-field-option" selected value="{{ $role->id }}">
                                    {{ $role->title }}
                                </option>
                            @else
                                <option class="filter-field-option" value="{{ $role->id }}">
                                    {{ $role->title }}
                                </option>
                            @endif
                        @endforeach
                    </select>

                    <x-buttons.secondary-button class="search-button">Search</x-buttons.secondary-button>
                </form>
            </div>
            <div class="right-side padding-inline-5rem padding-block">
                <div class="grid-four-columns no-horizontal-gap ">
                    <h3>Username
                        <x-buttons.sort-button :action="route('user.overview')" column="username"></x-buttons.sort-button>
                    </h3>
                    <h3>Name
                        <x-buttons.sort-button :action="route('user.overview')" column="last_name"></x-buttons.sort-button>
                    </h3>
                    <h3>Role
                        <x-buttons.sort-button :action="route('user.overview')" column="title"></x-buttons.sort-button>
                    </h3>
                    <x-buttons.primary-button :href="route('user.register')">Register User
                    </x-buttons.primary-button>
                    @foreach ($users as $user)
                        <p class="gray-background"> {{ $user->username }} </p>
                        <p class="gray-background"> {{ $user->last_name }}, {{ $user->first_name }}
                        </p>
                        <p class="gray-background">{{ $user->role->title }} </p>
                        <x-buttons.edit-button :href="route('user.edit', ['user' => $user->id])">Edit
                        </x-buttons.edit-button>
                    @endforeach
                </div>
            </div>
        </article>
    </main>
</x-layout.base>

<x-layout.base>
    <main id="user-overview">
        <h2>Users</h2>

        <article class="flex-center">
            <div class="flex-column left-side padding-inline-1rem padding-block">
                <h3>Search user</h3>
                <form action="{{ route('user.overview') }}" method="GET">

                    <label for="username-filter">Username</label>
                    <input id="username-filter"type="text" name="username">

                    <label for="first-name-filter">First Name</label>
                    <input id="first-name-filter"type="text" name="first_name">

                    <label for="last-name-filter">Last Name</label>
                    <input id="last-name-filter"type="text" name="last_name">

                    <label for="role-filter">Role</label>
                    <select id="role-filter" name="role">
                        <option value="">Select All</option>
                        @foreach ($roles as $option)
                            <option class="filter-field-option" value="{{ $option->id }}"
                                @if ($option->id == old('role')) selected="selected" @endif>{{ $option->title }}
                            </option>
                        @endforeach
                    </select>

                    <x-buttons.secondary-button class="search-button">Search</x-buttons.secondary-button>
                </form>
            </div>
            <div class="right-side padding-inline-5rem padding-block">
                <div class="grid-four-columns no-horizontal-gap ">
                    <h3>Username
                        <form class="sort-button" action="{{ route('user.overview') }}" method="GET">
                            <input type="hidden" name="column" value="username">
                            @if (!isset($_GET['order']))
                                <input type="hidden" name="order" value="asc">
                            @elseif ($_GET['order'] == 'asc')
                                <input type="hidden" name="order" value="desc">
                            @else
                                <input type="hidden" name="order" value="asc">
                            @endif
                            <div class="submit-container">
                                <input type="submit" value="&vArr;">
                            </div>
                        </form>
                    </h3>
                    <h3>Name
                        <form class="sort-button" action="{{ route('user.overview') }}" method="GET">
                            <input type="hidden" name="column" value="last_name">
                            @if (!isset($_GET['order']))
                                <input type="hidden" name="order" value="asc">
                            @elseif ($_GET['order'] == 'asc')
                                <input type="hidden" name="order" value="desc">
                            @else
                                <input type="hidden" name="order" value="asc">
                            @endif
                            <div class="submit-container">
                                <input type="submit" value="&vArr;">
                            </div>
                        </form>
                    </h3>
                    <h3>Role
                        <form class="sort-button" action="{{ route('user.overview') }}" method="GET">
                            <input type="hidden" name="column" value="title">
                            @if (!isset($_GET['order']))
                                <input type="hidden" name="order" value="asc">
                            @elseif ($_GET['order'] == 'asc')
                                <input type="hidden" name="order" value="desc">
                            @else
                                <input type="hidden" name="order" value="asc">
                            @endif
                            <div class="submit-container">
                                <input type="submit" value="&vArr;">
                            </div>
                        </form>
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

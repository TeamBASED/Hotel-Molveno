<x-layout.base>
    <main id="user-edit-page" class="main-content">
        <section id="form-container">
            <div id="heading-container">
                <h2>Edit User</h2>
            </div>
            <x-buttons.tertiary-button class="warning absolute-right" id="delete-button">Delete
            </x-buttons.tertiary-button>
            <x-delete-confirmation :removeId="$user->id" removalRoute='user.delete'></x-delete-confirmation>
            <form method="POST" action="{{ route('user.update', ['user' => $user->id]) }}">
                @csrf
                @method('PATCH')
                <!-- Name -->
                <div>
                    <x-input-label for="username" :value="__('Username:')" />
                    <x-text-input id="username" placeholder="Username" type="text" name="username" :value="old('username', $user->username)"
                        required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('username')" />
                </div>

                <!-- Email Address -->

                <div>
                    <x-input-label for="firstname" :value="__('First Name:')" />
                    <x-text-input id="firstname" placeholder="Firstname" type="text" name="firstname"
                        :value="old('firstname', $user->first_name)" required autocomplete="firstname" />
                    <x-input-error :messages="$errors->get('firstname')" />
                </div>

                <div>
                    <x-input-label for="lastname" :value="__('Last Name:')" />
                    <x-text-input id="lastname" placeholder="Lastname" type="text" name="lastname" :value="old('lastname', $user->last_name)"
                        required autocomplete="lastname" />
                    <x-input-error :messages="$errors->get('lastname')" />
                </div>

                <!-- Password -->
                <div>
                    <x-input-label for="password" :value="__('Password:')" />
                    <x-text-input id="password" placeholder="Password" type="password" name="password" />

                    <x-input-error :messages="$errors->get('password')" />
                </div>

                <!-- Confirm Password -->
                <div>
                    <x-input-label for="lastname" :value="__('Confirm Password:')" />
                    <x-text-input id="password_confirmation" placeholder="Confirm Password" type="password"
                        name="password_confirmation" />

                    <x-input-error :messages="$errors->get('password_confirmation')" />
                </div>

                <div>
                    <x-input-label for="role" :value="__('Role:')" />
                    <select class="dropdown-select" name="role" required>
                        @foreach ($roles as $option)
                            <option class="filter-field-option" value="{{ $option->id }}"
                                @if ($option->id == old('role', $user->role_id)) selected="selected" @endif>{{ $option->title }}
                            </option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('role')" />
                </div>

                <div>
                    {{-- <a href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a> --}}
                    <x-primary-button>
                        {{ __('Confirm Changes') }}
                    </x-primary-button>
                </div>
            </form>
        </section>
    </main>
</x-layout.base>

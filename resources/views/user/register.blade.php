<x-layout.base>
    <main id="user-register-page" class="main-content">
        <section id="form-container">
            <div id="heading-container">
                <h2>Register User</h2>
            </div>
            <form method="POST" action="{{ route('user.store') }}">
                @csrf

                <!-- Name -->
                <div>
                    <x-input-label for="username" :value="__('Username:')" />
                    <x-text-input id="username" placeholder="Username" type="text" name="username" :value="old('username')"
                        required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('username')" />
                </div>

                <!-- Email Address -->

                <div>
                    <x-input-label for="username" :value="__('First Name:')" />
                    <x-text-input id="firstname" placeholder="Firstname" type="text" name="firstname"
                        :value="old('firstname')" required autocomplete="firstname" />
                    <x-input-error :messages="$errors->get('firstname')" />
                </div>

                <div>
                    <x-input-label for="username" :value="__('Last Name:')" />
                    <x-text-input id="lastname" placeholder="Lastname" type="text" name="lastname" :value="old('lastname')"
                        required autocomplete="lastname" />
                    <x-input-error :messages="$errors->get('lastname')" />
                </div>

                <!-- Password -->
                <div>
                    <x-input-label for="username" :value="__('Password:')" />
                    <x-text-input id="password" placeholder="Password" type="password" name="password" required
                        autocomplete="new-password" />

                    <x-input-error :messages="$errors->get('password')" />
                </div>

                <!-- Confirm Password -->
                <div>
                    <x-input-label for="username" :value="__('Confirm Password:')" />
                    <x-text-input id="password_confirmation" placeholder="Confirm Password" type="password"
                        name="password_confirmation" required autocomplete="new-password" />

                    <x-input-error :messages="$errors->get('password_confirmation')" />
                </div>

                <div>
                    <x-input-label for="role" :value="__('Role:')" />
                    <select class="dropdown-select" name="role" required>
                        @foreach ($roles as $option)
                            <option class="filter-field-option" value="{{ $option->id }}"
                                @if ($option->id == old('role')) selected="selected" @endif>{{ $option->title }}
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
                        {{ __('Register') }}
                    </x-primary-button>
                </div>
            </form>
        </section>
    </main>
</x-layout.base>

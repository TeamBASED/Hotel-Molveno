<x-layout.base>
    <x-slot:resources>
        @vite('resources/js/passwordVisibilityToggle.js')
        </x-slot>
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
                        <x-text-input id="username" placeholder="Username" type="text" name="username"
                            :value="old('username')" required autofocus autocomplete="username" />
                        <x-input-error :messages="$errors->get('username')" />
                    </div>

                    <div>
                        <x-input-label for="username" :value="__('First Name:')" />
                        <x-text-input id="firstname" placeholder="Firstname" type="text" name="firstname"
                            :value="old('firstname')" required autocomplete="firstname" />
                        <x-input-error :messages="$errors->get('firstname')" />
                    </div>

                    <div>
                        <x-input-label for="username" :value="__('Last Name:')" />
                        <x-text-input id="lastname" placeholder="Lastname" type="text" name="lastname"
                            :value="old('lastname')" required autocomplete="lastname" />
                        <x-input-error :messages="$errors->get('lastname')" />
                    </div>

                    <!-- Password -->
                    <div>
                        <x-input-label for="username" :value="__('Password:')" />
                        <x-text-input id="password" placeholder="Password" type="password" name="password" required
                            autocomplete="new-password" />

                        <x-input-error :messages="$errors->get('password')" />

                        <button id="password-visibility-toggle" class="visibility-toggle">
                            <svg width="24" height="16" viewBox="0 0 24 16" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M12 0C14.7276 0 17.3357 1.43062 19.7663 3.78115C20.5955 4.58305 21.3457 5.43916 22.0061 6.29562C22.4046 6.81244 22.6875 7.21899 22.8425 7.4612L23.1871 8L22.8425 8.5388C22.6875 8.781 22.4046 9.18756 22.0061 9.70438C21.3457 10.5608 20.5955 11.417 19.7663 12.2189C17.3357 14.5694 14.7276 16 12 16C9.27247 16 6.66434 14.5694 4.23373 12.2189C3.40451 11.417 2.65433 10.5608 1.99393 9.70438C1.59543 9.18756 1.3125 8.781 1.15759 8.5388L0.812988 8L1.15759 7.4612C1.3125 7.21899 1.59543 6.81244 1.99393 6.29562C2.65433 5.43916 3.40451 4.58305 4.23373 3.78115C6.66434 1.43062 9.27247 0 12 0ZM20.4223 7.51688C19.8176 6.73272 19.1302 5.9482 18.376 5.21885C16.2825 3.19438 14.1051 2 12 2C9.89495 2 7.71751 3.19438 5.62406 5.21885C4.86986 5.9482 4.18241 6.73272 3.57777 7.51688C3.44718 7.68624 3.32651 7.84782 3.21619 8C3.32651 8.15218 3.44718 8.31376 3.57777 8.48312C4.18241 9.26728 4.86986 10.0518 5.62406 10.7811C7.71751 12.8056 9.89495 14 12 14C14.1051 14 16.2825 12.8056 18.376 10.7811C19.1302 10.0518 19.8176 9.26728 20.4223 8.48312C20.5529 8.31376 20.6735 8.15218 20.7839 8C20.6735 7.84782 20.5529 7.68624 20.4223 7.51688ZM8.00002 8C8.00002 10.2091 9.79088 12 12 12C14.2092 12 16 10.2091 16 8C16 5.79086 14.2092 4 12 4C9.79088 4 8.00002 5.79086 8.00002 8ZM14 8C14 9.10457 13.1046 10 12 10C10.8955 10 10 9.10457 10 8C10 6.89543 10.8955 6 12 6C13.1046 6 14 6.89543 14 8Z"
                                    fill="black" />
                            </svg>
                        </button>
                    </div>

                    <!-- Confirm Password -->
                    <div>
                        <x-input-label for="username" :value="__('Confirm Password:')" />
                        <x-text-input id="password_confirmation" placeholder="Confirm Password" type="password"
                            name="password_confirmation" required autocomplete="new-password" />

                        <x-input-error :messages="$errors->get('password_confirmation')" />

                        <button id="password-confirmation-visibility-toggle" class="visibility-toggle">
                            <svg width="24" height="16" viewBox="0 0 24 16" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M12 0C14.7276 0 17.3357 1.43062 19.7663 3.78115C20.5955 4.58305 21.3457 5.43916 22.0061 6.29562C22.4046 6.81244 22.6875 7.21899 22.8425 7.4612L23.1871 8L22.8425 8.5388C22.6875 8.781 22.4046 9.18756 22.0061 9.70438C21.3457 10.5608 20.5955 11.417 19.7663 12.2189C17.3357 14.5694 14.7276 16 12 16C9.27247 16 6.66434 14.5694 4.23373 12.2189C3.40451 11.417 2.65433 10.5608 1.99393 9.70438C1.59543 9.18756 1.3125 8.781 1.15759 8.5388L0.812988 8L1.15759 7.4612C1.3125 7.21899 1.59543 6.81244 1.99393 6.29562C2.65433 5.43916 3.40451 4.58305 4.23373 3.78115C6.66434 1.43062 9.27247 0 12 0ZM20.4223 7.51688C19.8176 6.73272 19.1302 5.9482 18.376 5.21885C16.2825 3.19438 14.1051 2 12 2C9.89495 2 7.71751 3.19438 5.62406 5.21885C4.86986 5.9482 4.18241 6.73272 3.57777 7.51688C3.44718 7.68624 3.32651 7.84782 3.21619 8C3.32651 8.15218 3.44718 8.31376 3.57777 8.48312C4.18241 9.26728 4.86986 10.0518 5.62406 10.7811C7.71751 12.8056 9.89495 14 12 14C14.1051 14 16.2825 12.8056 18.376 10.7811C19.1302 10.0518 19.8176 9.26728 20.4223 8.48312C20.5529 8.31376 20.6735 8.15218 20.7839 8C20.6735 7.84782 20.5529 7.68624 20.4223 7.51688ZM8.00002 8C8.00002 10.2091 9.79088 12 12 12C14.2092 12 16 10.2091 16 8C16 5.79086 14.2092 4 12 4C9.79088 4 8.00002 5.79086 8.00002 8ZM14 8C14 9.10457 13.1046 10 12 10C10.8955 10 10 9.10457 10 8C10 6.89543 10.8955 6 12 6C13.1046 6 14 6.89543 14 8Z"
                                    fill="black" />
                            </svg>
                        </button>
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

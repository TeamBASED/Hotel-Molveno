<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="username" :value="__('Username')" />
            <x-text-input id="username"  type="text" name="username" :value="old('username')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('username')" />
        </div>

        <!-- Email Address -->

        <div>
            <x-input-label for="firstname" :value="__('Firstname')" />
            <x-text-input id="firstname"  type="text" name="firstname" :value="old('firstname')" required autocomplete="firstname" />
            <x-input-error :messages="$errors->get('firstname')" />
        </div>

        <div>
            <x-input-label for="lastname" :value="__('Lastname')" />
            <x-text-input id="lastname"  type="text" name="lastname" :value="old('lastname')" required autocomplete="lastname" />
            <x-input-error :messages="$errors->get('lastname')" />
        </div>

        <!-- Password -->
        <div>
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" />
        </div>

        <!-- Confirm Password -->
        <div>
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" />
        </div>

        <div>
            <x-input-label for="role" :value="__('Role')" />
            <x-text-input id="role"  type="number" name="role" :value="old('role')" required autocomplete="role" />
            <x-input-error :messages="$errors->get('role')" />
        </div>

        <div>
            <a href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button>
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>

<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status :status="session('status')" />
    <header id="login-header">            
        <img src="\images\companyLogo.jpg" alt="hotel-molveno-logo">
        <h1>Hotel Molveno</h1>
    </header>
    <main id="login-page">
        <section id="login-form">
            <div id="heading-container">
                <h2>Login</h2>
            </div>
            <form method="POST" action="{{ route('login') }}">
                @csrf
        
                <!-- Email Address -->
                <div>
                    {{-- <x-input-label for="username" :value="__('Username')" /> --}}
                    <x-text-input id="username" type="username" placeholder="Username" name="username" :value="old('username')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('name')" />
                </div>
        
                <!-- Password -->
                <div>
                    {{-- <x-input-label for="password" :value="__('Password')" /> --}}
        
                    <x-text-input id="password"
                                    type="password"
                                    name="password"
                                    placeholder="Password"
                                    required autocomplete="current-password" />
        
                    <x-input-error :messages="$errors->get('password')" />
                </div>
        
                <!-- Remember Me -->
                <div>
                    <label for="remember_me">
                        <input id="remember_me" type="checkbox" name="remember">
                        <span>{{ __('Remember me') }}</span>
                    </label>
                </div>
        
                <div>
                    {{-- @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif --}}
        
                    <x-primary-button>
                        {{ __('Login') }}
                    </x-primary-button>
                </div>
            </form>
        </section>
    </main>
</x-guest-layout>

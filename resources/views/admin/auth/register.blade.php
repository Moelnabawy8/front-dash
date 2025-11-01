@extends('admin.auth.master.app')
@section('title', __('keywords.Register'))

@section('content')
    <div class="wrapper vh-100">
        <div class="row align-items-center h-100">
            <form method="POST" action="{{ route('admin.register') }}" class="col-lg-3 col-md-4 col-10 mx-auto text-center">
                @csrf
                <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="#">
                    <svg version="1.1" id="logo" class="navbar-brand-img brand-md" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 120 120">
                        <g>
                            <polygon class="st0" points="78,105 15,105 24,87 87,87" />
                            <polygon class="st0" points="96,69 33,69 42,51 105,51" />
                            <polygon class="st0" points="78,33 15,33 24,15 87,15" />
                        </g>
                    </svg>
                </a>

                <h1 class="h6 mb-3">{{ __('keywords.Create Account') }}</h1>

                {{-- Session Status --}}
                <x-auth-session-status class="mb-4" :status="session('status')" />

                {{-- Name --}}
                <div class="form-group">
                    <label for="name" class="sr-only">{{ __('keywords.Name') }}</label>
                    <input type="text" id="name" class="form-control form-control-lg"
                        placeholder="{{ __('keywords.Name') }}" name="name" value="{{ old('name') }}" required
                        autofocus>
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                {{-- Email --}}
                <div class="form-group">
                    <label for="email" class="sr-only">{{ __('keywords.Email address') }}</label>
                    <input type="email" id="email" class="form-control form-control-lg"
                        placeholder="{{ __('keywords.Email address') }}" name="email" value="{{ old('email') }}"
                        required>
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                {{-- Password --}}
                <div class="form-group">
                    <label for="password" class="sr-only">{{ __('keywords.Password') }}</label>
                    <input type="password" id="password" name="password" class="form-control form-control-lg"
                        placeholder="{{ __('keywords.Password') }}" required autocomplete="new-password">
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                {{-- Confirm Password --}}
                <div class="form-group">
                    <label for="password_confirmation" class="sr-only">{{ __('keywords.Confirm Password') }}</label>
                    <input type="password" id="password_confirmation" name="password_confirmation"
                        class="form-control form-control-lg" placeholder="{{ __('keywords.Confirm Password') }}" required>
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                {{-- Submit --}}
                <button class="btn btn-lg btn-primary btn-block" type="submit">
                    {{ __('keywords.Register') }}
                </button>

                <p class="mt-3 mb-0">
                    {{ __('keywords.Already have an account?') }}
                    <a href="{{ route('admin.login') }}">{{ __('keywords.Login') }}</a>
                </p>
            </form>
        </div>
    </div>
@endsection

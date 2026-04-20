@extends('layouts.app')

@section('content')
    <section class="section auth-section">
        <form class="auth-card reveal" method="POST" action="{{ route('login.submit', ['locale' => app()->getLocale()]) }}">
            @csrf
            <p class="eyebrow">{{ __('site.brand') }}</p>
            <h1>{{ __('site.auth.heading') }}</h1>

            @if ($errors->any())
                <div class="form-errors">
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <label>
                {{ __('site.auth.email') }}
                <input type="email" name="email" value="{{ old('email') }}" required autofocus>
            </label>
            <label>
                {{ __('site.auth.password') }}
                <input type="password" name="password" required>
            </label>
            <label class="checkbox-label">
                <input type="checkbox" name="remember" value="1">
                <span>{{ __('site.auth.remember') }}</span>
            </label>
            <button class="btn primary" type="submit">{{ __('site.auth.submit') }}</button>
        </form>
    </section>
@endsection
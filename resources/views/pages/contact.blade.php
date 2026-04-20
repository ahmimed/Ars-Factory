@extends('layouts.app')

@section('content')
    <section class="page-hero section reveal">
        <p class="eyebrow">{{ __('site.nav.contact') }}</p>
        <h1>{{ __('site.contact.title') }}</h1>
        <p>{{ __('site.contact.intro') }}</p>
    </section>

    <section class="section contact-layout">
        <form class="contact-form reveal" method="POST" action="{{ route('contact.send', ['locale' => app()->getLocale()]) }}">
            @csrf
            <label>
                {{ __('site.contact.name') }}
                <input type="text" name="name" value="{{ old('name') }}" required>
                @error('name') <small>{{ $message }}</small> @enderror
            </label>
            <label>
                {{ __('site.contact.email') }}
                <input type="email" name="email" value="{{ old('email') }}" required>
                @error('email') <small>{{ $message }}</small> @enderror
            </label>
            <label>
                {{ __('site.contact.message') }}
                <textarea name="message" rows="6" required>{{ old('message') }}</textarea>
                @error('message') <small>{{ $message }}</small> @enderror
            </label>
            <button class="btn primary" type="submit">{{ __('site.contact.send') }}</button>
        </form>

        <aside class="contact-card reveal">
            <div>
                <span>{{ __('site.contact.address_label') }}</span>
                <p>{{ __('site.contact.address') }}</p>
            </div>
            <div>
                <span>{{ __('site.contact.phone_label') }}</span>
                <p><a href="tel:0693007890">{{ __('site.contact.phone') }}</a></p>
            </div>
            <div>
                <span>{{ __('site.contact.email_label') }}</span>
                <p><a href="mailto:arsfactory75@gmail.com">{{ __('site.contact.email_value') }}</a></p>
            </div>
            <div>
                <span>{{ __('site.contact.instagram') }}</span>
                <p><a href="https://www.instagram.com/arsgroupe75" target="_blank" rel="noopener">@arsgroupe75</a></p>
            </div>
        </aside>
    </section>

    <section class="map-section">
        <iframe
            title="ARS Factory Tanger"
            loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"
            src="https://www.google.com/maps?q=Maroc%20Avenue%20Al%20Qods%20Lot%202%20Mag%2012%20Tanger&output=embed">
        </iframe>
    </section>
@endsection
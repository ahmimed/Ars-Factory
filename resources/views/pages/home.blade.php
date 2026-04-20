@extends('layouts.app')

@section('title', $metaTitle)
@section('description', $metaDescription)

@section('content')
    <section class="hero">
        <div class="hero-content reveal">
            <p class="eyebrow">{{ __('site.home.eyebrow') }}</p>
            <h1>{{ __('site.home.title') }}</h1>
            <p>{{ __('site.home.intro') }}</p>
            <div class="hero-actions">
                <a class="btn primary" href="{{ route('contact', ['locale' => app()->getLocale()]) }}">{{ __('site.home.cta') }}</a>
                <a class="btn ghost" href="{{ route('projects', ['locale' => app()->getLocale()]) }}">{{ __('site.home.secondary') }}</a>
            </div>
        </div>
        <div class="hero-card reveal">
            <div class="material-card dark-card">
                <span>01</span>
                <strong>{{ __('site.home.stats_projects') }}</strong>
            </div>
            <div class="material-card gold-card">
                <span>02</span>
                <strong>{{ __('site.home.stats_city') }}</strong>
            </div>
            <div class="material-card light-card">
                <span>03</span>
                <strong>{{ __('site.home.stats_quality') }}</strong>
            </div>
        </div>
    </section>

    <section class="section split reveal">
        <div>
            <p class="eyebrow">{{ __('site.brand') }}</p>
            <h2>{{ __('site.home.featured_title') }}</h2>
        </div>
        <p>{{ __('site.home.featured_text') }}</p>
    </section>

    @include('pages.partials.why')

    <section class="section reveal">
        <div class="section-heading">
            <p class="eyebrow">{{ __('site.nav.projects') }}</p>
            <h2>{{ __('site.projects.title') }}</h2>
            <a href="{{ route('projects', ['locale' => app()->getLocale()]) }}">{{ __('site.home.secondary') }} →</a>
        </div>
        @include('pages.partials.gallery', ['images' => $images])
    </section>

    <div class="cta-band reveal">
        <h2>{{ __('site.home.cta') }}</h2>
        <p>{{ __('site.home.intro') }}</p>
        <a class="btn primary" href="{{ route('contact', ['locale' => app()->getLocale()]) }}">{{ __('site.home.cta') }}</a>
    </div>
@endsection

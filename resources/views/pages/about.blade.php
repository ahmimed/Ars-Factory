@extends('layouts.app')

@section('title', $metaTitle)
@section('description', $metaDescription)

@section('content')
    <section class="page-hero section reveal">
        <p class="eyebrow">{{ __('site.nav.about') }}</p>
        <h1>{{ __('site.about.title') }}</h1>
        <p>{{ __('site.about.body') }}</p>
    </section>

    <section class="info-grid">
        <article class="info-card reveal">
            <span>Mission</span>
            <h2>{{ __('site.about.mission_title') }}</h2>
            <p>{{ __('site.about.mission') }}</p>
        </article>
        <article class="info-card reveal">
            <span>Process</span>
            <h2>{{ __('site.about.values_title') }}</h2>
            <p>{{ __('site.about.values') }}</p>
        </article>
    </section>

    @include('pages.partials.why')
@endsection

@extends('layouts.app')

@section('title', $metaTitle)
@section('description', $metaDescription)

@section('content')
    <section class="page-hero section reveal">
        <p class="eyebrow">{{ __('site.nav.services') }}</p>
        <h1>{{ __('site.services.title') }}</h1>
        <p>{{ __('site.services.intro') }}</p>
    </section>

    <div class="services-grid">
        @foreach (__('site.services.items') as $index => $service)
            <article class="service-card reveal">
                <span>{{ str_pad((string) ($index + 1), 2, '0', STR_PAD_LEFT) }}</span>
                <h2>{{ $service }}</h2>
                <p>{{ __('site.home.featured_text') }}</p>
            </article>
        @endforeach
    </div>
@endsection

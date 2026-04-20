@extends('layouts.app')

@section('title', $metaTitle)
@section('description', $metaDescription)

@section('content')
    <section class="page-hero section reveal">
        <p class="eyebrow">{{ __('site.nav.projects') }}</p>
        <h1>{{ __('site.projects.title') }}</h1>
        <p>{{ __('site.projects.intro') }}</p>
    </section>

    <section class="section reveal">
        @include('pages.partials.gallery', ['images' => $images])
    </section>
@endsection

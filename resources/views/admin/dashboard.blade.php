@extends('layouts.app')

@section('content')
    <section class="page-hero section reveal">
        <p class="eyebrow">{{ __('site.brand') }}</p>
        <h1>{{ __('site.admin.heading') }}</h1>
        <p>{{ __('site.admin.intro') }}</p>
        <form method="POST" action="{{ route('logout', ['locale' => app()->getLocale()]) }}">
            @csrf
            <button class="btn ghost" type="submit">{{ __('site.nav.logout') }}</button>
        </form>
    </section>

    <section class="section admin-layout">
        <form class="upload-card reveal" method="POST" action="{{ route('admin.images.store', ['locale' => app()->getLocale()]) }}" enctype="multipart/form-data">
            @csrf
            <label>
                {{ __('site.admin.upload_label') }}
                <input type="file" name="image" accept="image/jpeg,image/png,image/webp" required>
                <small>{{ __('site.admin.upload_help') }}</small>
                @error('image') <small>{{ $message }}</small> @enderror
            </label>
            <button class="btn primary" type="submit">{{ __('site.admin.upload') }}</button>
        </form>

        <div class="admin-gallery reveal">
            <h2>{{ __('site.admin.gallery') }}</h2>
            @if ($images->isEmpty())
                <div class="empty-state">{{ __('site.admin.empty') }}</div>
            @else
                <div class="admin-image-grid">
                    @foreach ($images as $image)
                        <article>
                            <img src="{{ asset('storage/' . $image->image_path) }}" alt="{{ __('site.admin.gallery') }}" loading="lazy">
                            <form method="POST" action="{{ route('admin.images.destroy', ['locale' => app()->getLocale(), 'image' => $image]) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit">{{ __('site.admin.delete') }}</button>
                            </form>
                        </article>
                    @endforeach
                </div>
            @endif
        </div>
    </section>
@endsection
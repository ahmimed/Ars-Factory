@if ($images->isEmpty())
    <div class="empty-state">{{ __('site.projects.empty') }}</div>
@else
    <div class="gallery-grid">
        @foreach ($images as $image)
            <button class="gallery-item reveal" type="button" data-lightbox-src="{{ asset('storage/' . $image->image_path) }}">
                <img src="{{ asset('storage/' . $image->image_path) }}" alt="{{ __('site.projects.open') }}" loading="lazy">
                <span>{{ __('site.projects.open') }}</span>
            </button>
        @endforeach
    </div>
@endif
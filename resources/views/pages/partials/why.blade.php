<section class="section why-section reveal">
    <div>
        <p class="eyebrow">ARS Factory</p>
        <h2>{{ __('site.why.title') }}</h2>
    </div>
    <div class="why-grid">
        @foreach (__('site.why.items') as $item)
            <article>
                <span></span>
                <strong>{{ $item }}</strong>
            </article>
        @endforeach
    </div>
</section>
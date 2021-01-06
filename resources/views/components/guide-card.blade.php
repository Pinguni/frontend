<a class="no-inherit" href='{{ route('guides.show', ['id' => $guide->id, 'slug' => $guide->slug]) }}'>
    <div class="card resource-card guide-card">
        <div class="card-image">
            <img src="{{ $guide->cover_image }}" />
        </div>
        <div class="card-content">
            <p class="eyebrow">{{ $guide->type }}</p>
            <h5>{{ $guide->title }}</h5>
            <p>{{ $guide->excerpt }}</p>
        </div>
    </div>
</a>
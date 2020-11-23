<a href='{{ url("/courses/$course->id/$course->title") }}'>
    <div class="card">
        <div class="card-image">
            <img src="{{ $course->card_image }}" />
        </div>
        <div class="card-content">
            <p class="eyebrow">{{ $course->type }}</p>
            <h5>{{ $course->title }}</h5>
            <p>{{ $course->excerpt }}</p>
        </div>
    </div>
</a>
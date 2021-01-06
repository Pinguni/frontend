@extends('layouts.app')

@section('title', "$guide->title")

@section('content')
<main class="wide guide">
    <aside class="guide-sidebar">
        <div>
            <p><strong>Guides</strong></p>
        </div>
        <div>
            <a><p>Link</p></a>
        </div>
    </aside>

    <div class="guide-main shadow">
        <div class="guide-cover-image">
            <img src="{{ $guide->cover_image }}" />
        </div>
    
        <div class="guide-content">
            <h1>{{ $guide->title }}</h1>
            <section>
                {!! $guide->content !!}
            </section>
        </div>
    </div>
</main>
@endsection
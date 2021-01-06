@extends('layouts.app')

@section('title', 'Guides')

@section('content')
<main class="wide guide">
    <aside class="guide-sidebar">

    </aside>
    
    <div class="guide-main">
        @if ($admin)
            <button class="dark" onclick="window.location='{{ route('guides.create') }}'" style="margin-bottom:2rem">
                Create New
            </button>
        @endif

        <section class="guide-grid">
            @foreach($guides as $guide)
                <x-guide-card
                    :guide="$guide">
                </x-guide-card>
            @endforeach
        </section>
    </div>
</main>
@endsection
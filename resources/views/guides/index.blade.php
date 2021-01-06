@extends('layouts.app')

@section('title', 'Guides')

@section('content')
<main class="wide">
    <h1>Guides</h1>

    <section>
        
    </section>
        @if ($admin)
            <button class="dark" onclick="window.location='{{ route('guides.create') }}'" style="margin-bottom:2rem">
                Create New
            </button>
        @endif
</main>
@endsection
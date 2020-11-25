@extends('layouts.app')

@section('title', "$guide->title")

@section('content')
<main class="wide">
    <h1>{{ $guide->title }}</h1>

    <aside>

    </aside>

    <section>
        {{ $guide->description }}
    </section>
</main>
@endsection
@extends('layouts.app')

@section('title', "$course->title")

@section('content')
<main class="wide">
    <h1>{{ $course->title }}</h1>

    <aside>

    </aside>

    <section>
        {{ $course->description }}
    </section>
</main>
@endsection
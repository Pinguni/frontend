@extends('layouts.app')

@section('title', "$course->title")

@section('content')
<main class="wide">
    <div class="card">
        <div class="card-image-banner">
            <img src="{{ $course->cover_image }}">
        </div>
    </div>

    <aside class="course-details-sidebar card">
        <div class="card-content">
            <p>{{ $course->excerpt }}</p>
            <p>authors</p>
            <p>requisites</p>
            <p>otpics</p>
            <p>age</p>
            <p>tags</p>
            <button class="dark">Take This Course</button>
        </div>
    </aside>

    <h1 class="resource-title">{{ $course->title }}</h1>

    <section>
        {{ $course->description }}
    </section>
</main>
@endsection
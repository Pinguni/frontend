@extends('layouts.app')

@section('title', "$course->title")

@section('content')
<div class="banner">
    <img class="banner-image" src="{{ $course->cover_image }}">
</div>
<main class="wide">
    <aside class="course-details-sidebar card">
        <div class="card-image">
            <img src={{ $course->card_image }} />
        </div>
        <div class="card-content">
            <p>{{ $course->excerpt }}</p>
            <p>authors</p>
            <p>requisites</p>
            <p>otpics</p>
            <p>age</p>
            <p>tags</p>
            <form class="single-button-form" action={{ route('courses.take') }} method="POST">
                @csrf
                <input type="hidden" name="course_id" value={{ $course->id }} />
                <button type="submit" class="dark">Take This Course</button>
            </form>
        </div>
    </aside>

    <button class="dark" onclick="window.location='{{ route('courses.edit', ['course' => $course]) }}'">
        Edit
    </button>

    <h1 class="resource-title">{{ $course->title }}</h1>

    <section class="course-description">
        {!! $course->description !!}
    </section>
</main>
@endsection
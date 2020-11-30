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
            <button class="dark">Take This Course</button>
        </div>
    </aside>

    <h1 class="resource-title">{{ $course->title }}</h1>

    <section class="course-description">
        {{ $course->description }}
    </section>
</main>
@endsection
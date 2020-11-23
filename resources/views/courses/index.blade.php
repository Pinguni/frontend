@extends('layouts.app')

@section('title', 'Courses')

@section('content')
<main class="wide">
    <h1>Courses</h1>

    <section class="course-grid-wide">
        @foreach($courses as $course)
            <x-course-card
                :course="$course">
            </x-course-card>
        @endforeach
    </section>
</main>
@endsection
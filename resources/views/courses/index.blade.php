@extends('layouts.app')

@section('title', 'Courses')

@section('content')
<main class="wide">
    @if ($admin)
        <button class="dark" onclick="window.location='{{ route('courses.create') }}'" style="margin-bottom:2rem">
            Create
        </button>
    @endif

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
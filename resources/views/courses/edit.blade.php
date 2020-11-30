@extends('layouts.app')

@section('title', "Edit $course->title")

@section('head')
    <!-- Laraberg -->
    <script src="https://unpkg.com/react@16.8.6/umd/react.production.min.js"></script>
    <script src="https://unpkg.com/react-dom@16.8.6/umd/react-dom.production.min.js"></script>
    <script src="{{ asset('vendor/laraberg/js/laraberg.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('vendor/laraberg/css/laraberg.css') }}">
@endsection


@section('content')
<form class="form-laraberg" action={{ route("$action", ['course' => $course->id]) }} method="POST">
    @csrf
    <!-- PUT Method -->
    <input type="hidden" name="_method" value="PUT">
    <!-- Laraberg -->
    <textarea id="description" name='description' hidden>{{ $course->description }}</textarea>
    <!-- Laraberg Sidebar -->
    <div class="laraberg-sidebar">
        <input id="title" type="text" name="title" placeholder="Title" value='{{ $course->title }}' />
        <input id="slug" type="text" name="slug" placeholder="Slug" value='{{ $course->slug }}' />
        <input id="card_image" type="text" name="card_image" placeholder="Card Image" value='{{ $course->card_image }}' />
        <input id="cover_image" type="text" name="cover_image" placeholder="Cover Image" value='{{ $course->cover_image }}' />
        <textarea id="excerpt" name="excerpt" placeholder="Excerpt">{{ $course->excerpt }}</textarea>
        <input id="type" type="text" name="type" placeholder="Type" value='{{ $course->type }}' />
        <input id="status" type="text" name="status" placeholder="Status" value='{{ $course->status }}' />
    </div>
    <button type="submit" class="dark">Update</button>
</form>
@endsection


@section('scripts')
<script>
    window.addEventListener('DOMContentLoaded', () => {
        Laraberg.init('description', { sidebar: true })
    })
</script>
@endsection
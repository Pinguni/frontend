@extends('layouts.app')

@section('title', "Create New Course")

@section('head')
    @include('layouts.laraberg')
@endsection


@section('content')
<form class="form-laraberg" action={{ route("$action") }} method="POST">
    @csrf
    <!-- Laraberg -->
    <textarea id="description" name='description' hidden>{{ old('description') }}</textarea>
    <!-- Laraberg Sidebar -->
    <div class="laraberg-sidebar">
        <input id="title" type="text" name="title" placeholder="Title" value='{{ old('title') }}' />
        <input id="slug" type="text" name="slug" placeholder="Slug" value='{{ old('slug') }}' />
        <input id="card_image" type="text" name="card_image" placeholder="Card Image" value='{{ old('card_image') }}' />
        <input id="cover_image" type="text" name="cover_image" placeholder="Cover Image" value='{{ old('cover_image') }}' />
        <textarea id="excerpt" name="excerpt" placeholder="Excerpt">{{ old('excerpt') }}</textarea>
        <input id="type" type="text" name="type" placeholder="Type" value='{{ old('type') }}' />
        <input id="status" type="text" name="status" placeholder="Status" value='{{ old('status') }}' />
    </div>
    <button type="submit" class="dark">Create</button>
</form>
@endsection


@section('scripts')
<script>
    window.addEventListener('DOMContentLoaded', () => {
        Laraberg.init('description', { sidebar: true })
    })
</script>
@endsection
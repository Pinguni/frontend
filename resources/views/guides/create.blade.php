@extends('layouts.app')

@section('title', "Create New Guide")

@section('head')
    @include('layouts.laraberg')
@endsection


@section('content')
<form class="form-laraberg" action={{ route("$action") }} method="POST">
    @csrf
    <!-- Laraberg -->
    <textarea id="content" name='content' hidden>{{ old('content') }}</textarea>
    <!-- Laraberg Sidebar -->
    <div class="laraberg-sidebar">
        <input required id="title" type="text" name="title" placeholder="Title" value='{{ old('title') }}' />
        <input id="slug" type="text" name="slug" placeholder="Slug" value='{{ old('slug') }}' />
        <input id="cover_image" type="text" name="cover_image" placeholder="Cover Image" value='{{ old('cover_image') }}' />
        <textarea required id="excerpt" name="excerpt" placeholder="Excerpt">{{ old('excerpt') }}</textarea>
        <textarea id="topics" name="topics" placeholder="Topics">{{ old('topics') }}</textarea>
        <textarea id="tags" name="tags" placeholder="Tags">{{ old('tags') }}</textarea>
        <input required id="type" type="text" name="type" placeholder="Type" value='{{ old('type') }}' />
        <input required id="status" type="text" name="status" placeholder="Status" value='{{ old('status') }}' />
    </div>
    <button type="submit" class="dark">Create</button>
</form>
@endsection


@section('scripts')
<script>
    window.addEventListener('DOMContentLoaded', () => {
        Laraberg.init('content', { sidebar: true })
    })
</script>
@endsection
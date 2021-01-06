@extends('layouts.app')

@section('title', "Edit $guide->title")

@section('head')
    @include('layouts.laraberg')
@endsection


@section('content')
<form class="form-laraberg" action={{ route("$action", ['guide' => $guide->id]) }} method="POST">
    @csrf
    <!-- PUT Method -->
    <input type="hidden" name="_method" value="PUT">
    <!-- Laraberg -->
    <textarea id="content" name='content' hidden>{{ $guide->content }}</textarea>
    <!-- Laraberg Sidebar -->
    <div class="laraberg-sidebar">
        <input required id="title" type="text" name="title" placeholder="Title" value='{{ $guide->title }}' />
        <input id="slug" type="text" name="slug" placeholder="Slug" value='{{ $guide->slug }}' />
        <input id="cover_image" type="text" name="cover_image" placeholder="Cover Image" value='{{ $guide->cover_image }}' />
        <textarea required id="excerpt" name="excerpt" placeholder="Excerpt">{{ $guide->excerpt }}</textarea>
        <textarea id="topics" name="topics" placeholder="Topics">{{ $guide->topics }}</textarea>
        <textarea id="tags" name="tags" placeholder="Tags">{{ $guide->tags }}</textarea>
        <input required id="type" type="text" name="type" placeholder="Type" value='{{ $guide->type }}' />
        <input required id="status" type="text" name="status" placeholder="Status" value='{{ $guide->status }}' />
    </div>
    <button type="submit" class="dark">Update Guide</button>
</form>
@endsection


@section('scripts')
<script>
    window.addEventListener('DOMContentLoaded', () => {
        Laraberg.init('content', { sidebar: true })
    })
</script>
@endsection
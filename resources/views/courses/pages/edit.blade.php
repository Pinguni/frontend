@extends('layouts.app')

@section('title', "Edit Page $page->title")

@section('head')
    @include('layouts.laraberg')
@endsection


@section('content')
<form class="form-laraberg" action={{ route("courses.sections.pages.update", ['course' => $course_id, 'section' => $section_id, 'page' => $page]) }} method="POST">
    @csrf
    <!-- PUT Method -->
    <input type="hidden" name="_method" value="PUT">
    <!-- Laraberg -->
    <textarea id="content" name='content' hidden>{{ $page->content }}</textarea>
    <!-- Laraberg Sidebar -->
    <div class="laraberg-sidebar">
        <input id="title" type="text" name="title" placeholder="Title" value='{{ $page->title }}' />
        <input id="slug" type="text" name="slug" placeholder="Slug" value='{{ $page->slug }}' />
        <input id="status" type="text" name="status" placeholder="Status" value='{{ $page->status }}' />
    </div>
    <button type="submit" class="dark">Update</button>
</form>
@endsection


@section('scripts')
<script>
    window.addEventListener('DOMContentLoaded', () => {
        Laraberg.init('content', { sidebar: true })
    })
</script>
@endsection
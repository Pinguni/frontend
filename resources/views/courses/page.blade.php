@extends('layouts.app')

@section('title', "$page->title")

@include('layouts.laraberg')
@include('layouts.jqueryui')

@section('content')
<style>
    @media (min-width: 768px) {
        #nav-main,
        footer {
            margin-left: 250px;
            width: calc(100% - 250px);
        }
    }
    @media (min-width: 1280px) {
        #nav-main,
        footer {
            margin-left: 320px;
            width: calc(100% - 320px);
        }
    }
</style>
<!--
    Course Sidebar
-->
<aside class="course-sidebar-left">
    @php
        $count = 0;
    @endphp
    @foreach ($sections as $section_item)
        <!--
            Course Section
        -->
        <div data-id="{{ $count }}" class="course-sidebar-section-title @if($section->id == $section_item->id) selected @php $selected = $count; @endphp @endif">
            <p>{{ $section_item->title }}</p>
        </div>
        <!--
            Course Pages
        -->
        <div class="course-sidebar-pages">
            @foreach ($section_item->pages()->orderBy('sort', 'ASC')->get() as $page_item)
                <a 
                    class="@if($page->id == $page_item->id) selected @endif"
                    href="{{ route('courses.sections.pages.show', ['course' => $course->id, 'section' => $section_item->id, 'page' => $page_item->id]) }}"
                >
                    {{ $page_item->title }}
                </a>
            @endforeach
        </div>
        @php
            $count++;
        @endphp
    @endforeach
</aside>
<!--
    Page Content
-->
<div class="sidebar-content">
    <main class="wide">
        <div class="breadcrumbs">
            <a href="{{ route('courses.show', ['id' => $course->id, 'slug' => $course->slug]) }}">{{ $course->title }}</a> > {{ $section->title }}
        </div>
        <div class="course-page-content">
            @if ($admin)
                <button class="dark" onclick="window.location='{{ route('courses.sections.pages.edit', ['course' => $course->id, 'section' => $section->id, 'page' => $page->id]) }}'">
                    Edit
                </button>
                <br /><br />
            @endif
            <div class="gutenberg__content wp-embed-responsive">
                {!! VanOns\Laraberg\Helpers\BlockHelper::renderBlocks(
                        VanOns\Laraberg\Helpers\EmbedHelper::renderEmbeds($page->content)
                    )
                !!}
            </div>
        </div>
    </main>
</div>
@endsection

@section('scripts')
<script>
    $(function() {
        $(".course-sidebar-left").accordion({
            collapsible: true,
            active: {{ $selected }},
            heightStyle: "content"
        });
    });
</script>
@endsection
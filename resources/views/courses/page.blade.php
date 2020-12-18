@extends('layouts.app')

@section('title', "$page->title")

@include('layouts.laraberg')

@section('content')
<!--
    Course Sidebar
-->
<aside class="course-sidebar-left">
    @foreach ($sections as $section_item)
        <!--
            Course Section
        -->
        <div class="course-sidebar-section">
            <div class="course-sidebar-section-title @if($section->id == $section_item->id) selected @endif">
                <p>{{ $section_item->title }}</p>
            </div>
            <!--
                Course Pages
            -->
            <div class="course-sidebar-pages">
                @foreach ($section_item->pages()->orderBy('sort', 'ASC')->get() as $page_item)
                    <a 
                        class="@if($page->id == $page_item->id) selected @endif"
                        href="{{ route('courses.sections.pages.show', ['course' => $course, 'section' => $section_item, 'page' => $page_item]) }}"
                    >
                        {{ $page_item->title }}
                    </a>
                    <br /><br />
                @endforeach
            </div>
        </div>
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
                        VanOns\Laraberg\Helpers\EmbedHelper::renderEmbeds( $page->content )
                    )
                !!}
            </div>
        </div>
    </main>
</div>
@endsection
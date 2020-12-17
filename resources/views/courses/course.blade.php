@extends('layouts.app')

@section('title', "$course->title")

@include('layouts.jqueryui')
@include('layouts.feathericons')


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
            <form class="single-button-form" action={{ route('courses.take') }} method="POST">
                @csrf
                <input type="hidden" name="course_id" value={{ $course->id }} />
                <button type="submit" class="dark">Take This Course</button>
            </form>
        </div>
    </aside>

    @if ($admin)
        <button class="dark" onclick="window.location='{{ route('courses.edit', ['course' => $course]) }}'">
            Edit
        </button>
    @endif

    <h1 class="resource-title">{{ $course->title }}</h1>

    <section class="course-description">
        {!! $course->description !!}
    </section>

    <section class="course-sections">
        <h2>Course Content</h2>
        <!--
            Add Section Form
        -->
        @if ($admin)
            <form class="single-line-form" method="POST" action={{ route('courses.sections.store', ['course' => $course->id]) }}>
                @csrf
                <input type="hidden" name="slug" value={{ $course->slug }} />
                <div>
                    <input type="text" name="title" placeholder="Section Title" />
                    <button type="submit" class="dark">Add Section</button>
                </div>
            </form>
        @endif
        <!-- 
            Course Sections 
        -->
        <div id="sections">
            @foreach ($course->sections()->orderBy('sort', 'ASC')->get() as $section)
                <div>
                    <!--
                        Course Section Title
                    -->
                    <h3>
                        {{ $section->title }}
                        <!--
                            Delete Section
                        -->
                        @if ($admin)
                            <form class="form-inline" action={{ route('courses.sections.destroy', ['course' => $course->id, 'section' => $section->id]) }} method="POST">
                                @csrf
                                <input type="hidden" name="_method" value="DELETE" />
                                <button type="submit"><i data-feather="trash"></i></button>
                            </form>
                        @endif
                    </h3>
                    <div class="course-pages ui-state-default" data-id={{ $section->id }}>
                        <!--
                            Add Course Page Form
                        -->
                        @if ($admin)
                            <form class="single-line-form" method="POST" action={{ route('courses.sections.pages.store', ['course' => $course->id, 'section' => $section->id]) }}>
                                @csrf
                                <input type="hidden" name="slug" value={{ $course->slug }} />
                                <div>
                                    <input type="text" name="title" placeholder="Page Title" />
                                    <button type="submit" class="dark">Add Page</button>
                                </div>
                            </form>
                        @endif
                        <!--
                            Course Pages
                        -->
                        <div class="course-pages-list">
                            @foreach ($section->pages()->orderBy('sort', 'ASC')->get() as $page)
                                <div data-id={{ $page->id }}>
                                    <p>{{ $page->title }}</p>
                                    <!--
                                        Edit Page
                                    -->
                                    @if ($admin)
                                        <a href={{ route('courses.sections.pages.edit', ['course' => $course->id, 'section' => $section->id, 'page' => $page->id]) }}>
                                            <i data-feather="edit"></i>
                                        </a>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
</main>
@endsection


@section('scripts')
    <script>
        $(function() {
            $('#sections')
                .accordion({
                    collapsible: true,
                    header: "> div > h3"
                })
                .sortable({
                    axis: "y",
                    handle: "h3",
                    stop: function( event, ui ) {
                        // IE doesn't register the blur when sorting
                        // so trigger focusout handlers to remove .ui-state-focus
                        ui.item.children("h3").triggerHandler("focusout");
                
                        // Refresh accordion to handle new order
                        $(this).accordion("refresh");
                    },
                    update: function() {
                        updateSectionOrder()
                    }
                })
            $('#sections').disableSelection();

            $('.course-pages-list')
                .sortable({
                    update: function() {
                        updatePageOrder()
                    }
                })
            $('.course-pages-list').disableSelection();

            function updateSectionOrder() {
                var order = [];
                $('.course-pages').each(function(index, element) {
                    order.push({
                        id: $(this).attr('data-id'),
                        position: index + 1
                    });
                });
                $.ajax({
                    type: "POST", 
                    dataType: "json", 
                    url: "{{ route('courses.sections.updateOrder') }}",
                    data: {
                        order: order,
                        _token: '{{csrf_token()}}'
                    },
                    success: function(response) {
                        if (response.status == "success") {
                            console.log(response);
                        } else {
                            console.log(response);
                        }
                    }
                });
            }

            function updatePageOrder() {
                var order = [];
                $('.course-pages-list > div').each(function(index, element) {
                    order.push({
                        id: $(this).attr('data-id'),
                        position: index + 1
                    });
                });
                $.ajax({
                    type: "POST", 
                    dataType: "json", 
                    url: "{{ route('courses.sections.pages.updateOrder') }}",
                    data: {
                        order: order,
                        _token: '{{csrf_token()}}'
                    },
                    success: function(response) {
                        if (response.status == "success") {
                            console.log(response);
                        } else {
                            console.log(response);
                        }
                    }
                });
            }
        });
    </script>
    <script>
        feather.replace()
    </script>
@endsection
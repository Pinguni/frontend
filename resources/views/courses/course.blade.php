@extends('layouts.app')

@section('title', "$course->title")

@include('layouts.jqueryui')

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
                <div class="course-sections-section ui-state-default" data-id={{ $section->id }}>
                    <p>{{ $section->title }}</p>
                </div>
            @endforeach
        </div>
    </section>
</main>
@endsection

@section('scripts')
    <script>
        $(function() {
            $('#sections').sortable({
                update: function() {
                    sendToServer()
                }
            });
            $('#sections').disableSelection();

            function sendToServer() {
                var order = [];
                $('.course-sections-section').each(function(index, element) {
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
        });
    </script>
@endsection
@extends('layouts.app.main')
@section('content')
 <section class="course-header" style="background-size: cover;background-image: url('{{ $course->image }}')">
        <div class="container">
            <div class="course-content-area">
                <div class="course-content">
                    <h3 class="mb-4">{{ $course->title }}</h3>
                </div>
            </div>
        </div>
    </section>

    <!-- course more detail section -->
    <section class="course-detailed-content-area">
        <div class="container course-description-top-margin">
            <div class="course-detailed-content">
                <h3>Description</h3>
                <p class="my-3">{{ $course->description }}</p>
            </div>
        </div>
    </section>
    @endsection
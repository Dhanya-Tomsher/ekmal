@extends('layouts.admin.app', ['body_class' => '', 'title' => 'Course'])
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1>Course</h1>
                <div class="text-zero top-right-button-container">
                    <a href="{{ route('admin.course.create') }}"
                        class="btn btn-primary btn-lg top-right-button mr-1 text-uppercase">ADD NEW
                        course</a>
                </div>
                <div class="separator mb-5"></div>
            </div>
        </div>

        <div class="rpw">
            <div class="col-12">
                <x-status />
                <x-errors />
            </div>
        </div>

        <div class="row">
            @if ($course)
                <div class="col-lg-12 col-md-12 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col" class="text-center">Sl No.</th>
                                        <th scope="col">Name</th>
                                        <th scope="col" class="text-center">Image</th>
                                        <th scope="col" class="text-center">Sort Order</th>
                                        <th scope="col" class="text-center">Status</th>
                                        <th scope="col" class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(isset($course[0]))
                                        @foreach ($course as $key=>$courses)
                                            <tr>
                                                <td class="text-center">{{ $key + 1 + ($course->currentPage() - 1) * $course->perPage() }}</td>
                                                <td>{{ $courses->title }}</td>
                                                <td class="text-center">
                                                    <img class="courses-image" src="{{ $courses->getImage() }}" alt="" width="100">
                                                </td>
                                                <td class="text-center">{{ $courses->sort_order }}</td>
                                                <td class="text-center">
                                                    <b>{!! $courses->status == 1 ? '<span class="text-success">Enabled</span>' : '<span class="text-danger">Disabled</span>' !!}</b>
                                                </td>
                                                <td class="text-center">
                                                    <a href="{{ route('admin.course.edit', $courses) }}"
                                                        class="btn btn-secondary mb-1">Edit</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="4" class="text-center">No data found.</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                            <div class="aiz-pagination float-right">
                                {{ $course->appends(request()->input())->links('pagination::bootstrap-5') }}
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection

@push('header')
@endpush

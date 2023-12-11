@extends('layouts.admin.app', ['body_class' => '', 'title' => 'Slider'])
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1>Home Slider</h1>
                <!-- <div class="text-zero top-right-button-container">
                    <a href="{{ route('admin.slider.create') }}"
                        class="btn btn-primary btn-lg top-right-button mr-1 text-uppercase">ADD NEW
                        slider</a>
                </div> -->
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
            @if ($slider)
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
                                    @if(isset($slider[0]))
                                        @foreach ($slider as $key=>$sliders)
                                            <tr>
                                                <td class="text-center">{{ $key + 1 + ($slider->currentPage() - 1) * $slider->perPage() }}</td>
                                                <td>{{ $sliders->title }}</td>
                                                <td class="text-center">
                                                    <img class="slider-image" src="{{ $sliders->getImage() }}" alt="" width="200">
                                                </td>
                                                <td class="text-center">{{ $sliders->sort_order }}</td>
                                                <td class="text-center">
                                                    <b>{!! $sliders->status == 1 ? '<span class="text-success">Enabled</span>' : '<span class="text-danger">Disabled</span>' !!}</b>
                                                </td>
                                                <td class="text-center">
                                                    <a href="{{ route('admin.slider.edit', $sliders) }}"
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
                                {{ $slider->appends(request()->input())->links('pagination::bootstrap-5') }}
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

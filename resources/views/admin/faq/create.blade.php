@extends('layouts.admin.app', ['body_class' => 'nav-md', 'title' => 'Create FAQ'])
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1>Create FAQ</h1>
                <div class="separator mb-5"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-8 offset-2">

                <x-status />

                <div class="card mb-4">
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.faq.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Title</label>
                                <input type="text" name="title" class="form-control" value="{{ old('title') }}">
                                <x-input-error name='title' />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Description</label>
                                <input type="text" name="description" class="form-control" value="{{ old('description') }}">
                                <x-input-error name='description' />
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Sort Order</label>
                                <input type="number" name="sort_order" class="form-control"
                                    value="{{ old('sort_order') }}">
                                <x-input-error name='sort_order' />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Status</label>
                                <select name="status" class="form-control select2-single mb-3">
                                    <option {{ old('status') == '1' ? 'selected' : '' }} value="1">
                                        Enabled
                                    </option>
                                    <option {{ old('status') == '0' ? 'selected' : '' }} value="0">
                                        Disabled
                                    </option>
                                </select>
                                <x-input-error name='status' />
                            </div>

                            <button type="submit" class="btn btn-primary mb-0">Submit</button>
                            <a href="{{ route('admin.faq.index') }}" class="btn btn-info mb-0"> Cancel</a>
                        </form>
                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection


@push('header')
    <link rel="stylesheet" href="{{ adminAsset('css/vendor/select2.min.css') }}" />
    <link rel="stylesheet" href="{{ adminAsset('css/vendor/select2-bootstrap.min.css') }}" />
@endpush
@push('footer')
    <script src="{{ adminAsset('js/vendor/select2.full.js') }}"></script>

    <script>
        $('#img').on('change', function() {
            if (this.files[0]) {
                $('#imgname').text(this.files[0].name)
            } else {
                $('#imgname').text('Choose file')
            }
        });
    </script>
@endpush

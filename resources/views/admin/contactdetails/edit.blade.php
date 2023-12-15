@extends('layouts.admin.app', ['body_class' => 'nav-md', 'title' => 'Edit Contact Details'])
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1>Edit Contactdetails Details</h1>
                <div class="separator mb-5"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-8 offset-2">

                <x-status />

                <div class="card mb-4">
                    <div class="card-body">
                        <form method="POST"
                            action="{{ route('admin.contactdetails.update', [
                                'contactdetail' => $contactdetail,
                            ]) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <label for="exampleInputEmail1">Name</label>
                                <input type="text" name="name" class="form-control"
                                    value="{{ old('name', $contactdetail->name) }}" required>
                                <x-input-error name='name' />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="text" name="email" class="form-control"
                                    value="{{ old('email', $contactdetail->email) }}" required>
                                <x-input-error name='email' />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Phone</label>
                                <input type="text" name="phone" class="form-control"
                                    value="{{ old('name', $contactdetail->phone) }}" required>
                                <x-input-error name='phone' />
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Address</label>
                                <input id="bannerEditor" type="text" name="address" class="form-control"
                                    value="{{ old('address', $contactdetail->address) }}" required>
                                <x-input-error name='address' />
                            </div>
                            
                            <div class="form-group">
                                <label for="exampleInputEmail1">Sort Order</label>
                                <input type="number" name="sort_order" class="form-control"
                                    value="{{ old('sort_order', $contactdetail->sort_order) }}">
                                <x-input-error name='sort_order' />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Status</label>
                                <select name="status" class="form-control select2-single mb-3">
                                    <option {{ old('status', $contactdetail->status) == '1' ? 'selected' : '' }} value="1">
                                        Enabled
                                    </option>
                                    <option {{ old('status', $contactdetail->status) == '0' ? 'selected' : '' }} value="0">
                                        Disabled
                                    </option>
                                </select>
                                <x-input-error name='status' />
                            </div>

                            <button type="submit" class="btn btn-primary mb-0">Update</button>
                            <a href="{{ route('admin.contactdetails.index') }}" class="btn btn-info mb-0"> Cancel</a>
                            <button type="button" id="delete" class="btn btn-danger mb-0 float-right">Delete</button>
                        </form>
                    </div>
                </div>

                <form id="deleteForm" method="POST"
                    action="{{ route('admin.contactdetails.destroy', [
                        'contactdetail' => $contactdetail,
                    ]) }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('DELETE')
                </form>

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

    <script src="{{ adminAsset('js/tinymce/tinymce.min.js') }}"></script>
    <script>
        tinymce.init({
            selector: '#bannerEditor',
            plugins: "autosave",
            autosave_ask_before_unload: false
        });

        tinymce.init({
            selector: '#descEditor',
            plugins: "autosave",
            autosave_ask_before_unload: false
        });
        $('#img').on('change', function() {
            if (this.files[0]) {
                $('#imgname').text(this.files[0].name)
            } else {
                $('#imgname').text('Choose file')
            }
        });

        $('#delete').on('click', function() {
            if (confirm('Are you sure you want to remove this item?')) {
                $('#deleteForm').submit();
            }
        });
    </script>
@endpush

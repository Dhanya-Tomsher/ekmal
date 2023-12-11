@extends('layouts.admin.app', ['body_class' => 'nav-md', 'title' => 'Create Services'])
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1>Create Services</h1>
                <div class="separator mb-5"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-8 offset-2">

                <x-status />

                <div class="card mb-4">
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.services.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Name</label>
                                <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                                <x-input-error name='name' />
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Description</label>
                                <input type="text" name="description" class="form-control" value="{{ old('description') }}">
                                <x-input-error name='description' />
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Main Image <span class="text-info">(Please upload an image with size less than 200 KB and dimensions 150x45 pixels)</span></label>
                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <input name="image" id="img" type="file" class="custom-file-input"
                                            id="inputGroupFile02" accept="image/*">
                                        <label class="custom-file-label" id="imgname" for="inputGroupFile02">Choose
                                            file</label>
                                    </div>
                                </div>
                                <x-input-error name='image' />
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Details Page Image <span class="text-info">(Please upload an image with size less than 200 KB and dimensions 150x45 pixels)</span></label>
                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <input name="detailspage_image" id="img" type="file" class="custom-file-input"
                                            id="inputGroupFile02" accept="image/*">
                                        <label class="custom-file-label" id="imgname" for="inputGroupFile02">Choose
                                            file</label>
                                    </div>
                                </div>
                                <x-input-error name='detailspage_image' />
                            </div>





                            <div class="repeater_s1 repData col-12  p-10 mb-2">
                                                    <h6 class="p-10"><u>Servicelist</u></h6>
                                                    <div data-repeater-list="s1_data" class="col-12">
                                                        <div data-repeater-item class="row">
                                                            <div class="form-group col-sm-6">
                                                                <label for="s1_name">Title</label>
                                                                <input type="text" class="form-control"  name="s1_name" placeholder="Enter Service content Title" value="{{ old('s1_title') }}">
                                                            </div>

                                                            <div class="form-group col-sm-6">
                                                                <label for="s1_description">Description</label>
                                                                <input type="text" class="form-control" name="s1_description" placeholder="Enter Service content Description" value="{{ old('s1_content') }}">
                                                            </div>

                                                            <div class="form-group col-sm-6">
                                                                <label for="s1_position">Position</label>
                                                                <input type="text" class="form-control" name="s1_position" placeholder="Enter Service content Position" value="{{ old('s1_position') }}">
                                                            </div> 

                                                            <div class="form-group col-sm-6">
                                                                <label for="s1_sort_order">Sort Order</label>
                                                                <input type="text" class="form-control" name="s1_sort_order" placeholder="Enter Service content Sort Order" value="{{ old('s1_sort_order') }}">
                                                            </div> 

                                                            <div class="text-right col-sm-12 d-block">
                                                                <input data-repeater-delete class="btn btn-danger d-initial" type="button" value="Delete"  style="background-color: #ff4d4f !important; border-color: #ff4d4f;"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 mb-10">
                                                        <input data-repeater-create class="btn btn-primary" type="button" value="Add New List"  style="background-color: #5f63f2 !important;border-color: #5f63f2;"/>
                                                    </div>
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
                            <a href="{{ route('admin.clients.index') }}" class="btn btn-info mb-0"> Cancel</a>
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
    <script src="{{ adminAsset('js/jquery.repeater.min.js') }}"></script>
    <script src="{{ adminAsset('js/jquery/jquery.validate.min.js') }}"></script>
    <script>
        $('#img').on('change', function() {
            if (this.files[0]) {
                $('#imgname').text(this.files[0].name)
            } else {
                $('#imgname').text('Choose file')
            }
        });
    </script>
<script type="text/javascript">
    $(document).ready(function() {
let rep_count = 0;

$('.repeater_s1').repeater({
    initEmpty: false,
    show: function(e) {
        $(this).slideDown();
        rep_count = parseInt(rep_count) + 1;
    },
    hide: function(deleteElement) {
        if (confirm('Are you sure you want to delete this element?')) {
            $(this).slideUp(deleteElement);
        }
    },
    isFirstItemUndeletable: true
})

});
</script>
@endpush

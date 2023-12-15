@extends('layouts.admin.app', ['body_class' => 'nav-md', 'title' => 'Edit Service Details'])
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1>Edit Service Details</h1>
                <div class="separator mb-5"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-8 offset-2">

                <x-status />

                <div class="card mb-4">
                    <div class="card-body">
                        <form method="POST" class="repeater"
                            action="{{ route('admin.services.update', [
                                'service' => $service,
                            ]) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PATCH') 
                            <div class="form-group">
                                <label for="exampleInputEmail1">Name</label>
                                <input type="text" name="name" class="form-control"
                                    value="{{ old('name', $service->name) }}" required>
                                <x-input-error name='name' />
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Description</label>
                                <input type="text" id="bannerEditor" name="description" class="form-control"
                                    value="{{ old('name', $service->description) }}" required>
                                <x-input-error name='description' />
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Image <span class="text-info">(Please upload an image with size less than 200 KB and dimensions 150x45 pixels)</span></label>
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
                                <label for="exampleInputEmail1">Current Image</label>
                                <img class="w-100" src="{{ $service->getImage() }}" alt="">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Details Page Image <span class="text-info">(Please upload an image with size less than 200 KB and dimensions 150x45 pixels)</span></label>
                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <input name="detailspage_image" id="dimg" type="file" class="custom-file-input"
                                            id="inputGroupFile02d" accept="image/*">
                                        <label class="custom-file-label" id="imgname" for="inputGroupFile02d">Choose
                                            file</label>
                                    </div>
                                </div>
                                <x-input-error name='detailspage_image' />
                            </div> 

                            <div class="form-group">
                                <label for="exampleInputEmail1">Current Detailspage Image</label>
                                <img class="w-100" src="{{ $service->getDetailspageimage() }}" alt="">
                            </div>

                            <!-- <div class="repeater_s1 repData col-12  p-10 mb-2"> -->
                                
                                                    <h6 class="p-10"><u>Servicelist</u></h6>
                                                    <div data-repeater-list="s1_data" class="col-12">
                                                        <div data-repeater-item class="row">
                                                            <div class="form-group col-sm-6">
                                                                <label for="name">Title</label>
                                                                <input type="text" class="form-control"  name="name" value="">
                                                            </div>

                                                            <div class="form-group col-sm-6">
                                                                <label for="description">Description</label>
                                                                <input type="text" id="addDesc" class="form-control" name="description" value="">
                                                            </div>

                                                            <div class="form-group col-sm-6">
                                                                <label for="position">Position</label>
                                                                <select name="position" class="form-control select2-single mb-3">
                                                                <option {{ old('position') == '1' ? 'selected' : '' }} value="1">Top</option>
                                                                <option {{ old('position') == '2' ? 'selected' : '' }} value="2">Bottom</option>
                                                                </select>
                                                                <!-- <input type="text" class="form-control" name="position" value=""> -->
                                                            </div> 

                                                            <div class="form-group col-sm-6">
                                                                <label for="sort_order">Sort Order</label>
                                                                <input type="text" class="form-control" name="sort_order" value="">
                                                            </div> 

                                                            <div class="text-right col-sm-12 d-block">
                                                                <input data-repeater-delete class="btn btn-danger d-initial" type="button" value="Delete"  style="background-color: #ff4d4f !important; border-color: #ff4d4f;"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 mb-10">
                                                        <input data-repeater-create class="btn btn-primary" type="button" value="Add New List"  style="background-color: #5f63f2 !important;border-color: #5f63f2; margin-bottom:20px;"/>
                                                    </div>
                                                <!-- </div> -->


                            <div class="form-group">
                                <label for="exampleInputEmail1">Sort Order</label>
                                <input type="number" name="sort_order" class="form-control"
                                    value="{{ old('sort_order', $service->sort_order) }}">
                                <x-input-error name='sort_order' />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Status</label>
                                <select name="status" class="form-control select2-single mb-3">
                                    <option {{ old('status', $service->status) == '1' ? 'selected' : '' }} value="1">
                                        Enabled
                                    </option>
                                    <option {{ old('status', $service->status) == '0' ? 'selected' : '' }} value="0">
                                        Disabled
                                    </option>
                                </select>
                                <x-input-error name='status' />
                            </div>

                            <button type="submit" class="btn btn-primary mb-0">Update</button>
                            <a href="{{ route('admin.services.index') }}" class="btn btn-info mb-0"> Cancel</a>
                            <button type="button" id="delete" class="btn btn-danger mb-0 float-right">Delete</button>
                        </form>
                    </div>
                </div>

                <form id="deleteForm" method="POST"
                    action="{{ route('admin.services.destroy', [
                        'service' => $service,
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
<script src="{{ adminAsset('js/vendor/select2.full.js') }}"></script>
    <script src="{{ adminAsset('js/jquery.repeater.min.js') }}"></script>
    <script src="{{ adminAsset('js/jquery/jquery.validate.min.js') }}"></script>
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
<script type="text/javascript">
        $(document).ready(function() {
            var repItems = $("div[data-repeater-item]");
            var repCount = repItems.length;
            let count = 0 ;
        
        var repeater =  $('.repeater').repeater({
            initEmpty: true,
            show: function(e) {
                $(this).slideDown();
                var repeaterItems = $("div[data-repeater-item]");
                var repeatCount = repeaterItems.length;
                var cnt = parseInt(repeatCount) - 1;

                count = parseInt(count) + 1;
            },
            hide: function(deleteElement) {
                if (confirm('Are you sure you want to delete this element?')) {
                    $(this).slideUp(deleteElement);
                }
            },
            isFirstItemUndeletable: false
        });

        

        var s1Data = {!! $s1Data !!};
        console.log(s1Data);
        repeater.setList(s1Data);       
      
    });
   
    
</script>
@endpush

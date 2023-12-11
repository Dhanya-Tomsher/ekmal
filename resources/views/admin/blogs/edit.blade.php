@extends('layouts.admin.app', ['body_class' => 'nav-md', 'title' => 'Edit blogs Details'])
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1>Edit blogs Details</h1>
                <div class="separator mb-5"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-8 offset-2">

                <x-status />

                <div class="card mb-4">
                    <div class="card-body">
                        <form method="POST"
                            action="{{ route('admin.blogs.update', [
                                'blog' => $blog,
                            ]) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <label for="exampleInputEmail1">Title</label>
                                <input type="text" name="title" class="form-control"
                                    value="{{ old('title', $blog->title) }}" required>
                                <x-input-error name='title' />
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Description</label>
                                <input type="text" name="description" class="form-control"
                                    value="{{ old('name', $blog->description) }}" required>
                                <x-input-error name='description' />
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Blog Date</label>
                                <input type="text" name="blog_date" class="form-control" value="{{ old('name', $blog->blog_date) }}">
                                <x-input-error name='blog_date' />
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
                                <img class="w-100" src="{{ $blog->getImage() }}" alt="">
                            </div>


                            <div class="form-group">
                                <label for="exampleInputEmail1">Sort Order</label>
                                <input type="number" name="sort_order" class="form-control"
                                    value="{{ old('sort_order', $blog->sort_order) }}">
                                <x-input-error name='sort_order' />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Status</label>
                                <select name="status" class="form-control select2-single mb-3">
                                    <option {{ old('status', $blog->status) == '1' ? 'selected' : '' }} value="1">
                                        Enabled
                                    </option>
                                    <option {{ old('status', $blog->status) == '0' ? 'selected' : '' }} value="0">
                                        Disabled
                                    </option>
                                </select>
                                <x-input-error name='status' />
                            </div>

                            <button type="submit" class="btn btn-primary mb-0">Update</button>
                            <a href="{{ route('admin.blogs.index') }}" class="btn btn-info mb-0"> Cancel</a>
                            <button type="button" id="delete" class="btn btn-danger mb-0 float-right">Delete</button>
                        </form>
                    </div>
                </div>

                <form id="deleteForm" method="POST"
                    action="{{ route('admin.blogs.destroy', [
                        'blog' => $blog,
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
    <script>

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
        let rep_count = 0;

        var s1_repeater = $('.repeater_s1').repeater({
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
                            });    
      
    });
   
    
</script>
@endpush

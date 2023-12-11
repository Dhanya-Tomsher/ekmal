@extends('layouts.admin.app', ['body_class' => 'nav-md', 'title' => 'General Settings'])
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1>General Settings</h1>
                <div class="separator mb-5"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-8 offset-2">

                <x-status />

                <div class="card mb-4">
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.store-settings') }}" enctype="multipart/form-data">
                            @csrf
                            
                            <div class="form-group">
                                <h4> Social Links</h4>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Facebook</label>
                                <input class="form-control" type="text" value="{{ old('facebook',$data['facebook'] ?? '') }}" name="facebook" id="facebook">
                                <x-input-error name='facebook' />
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Instagram</label>
                                <input class="form-control" type="text" value="{{ old('instagram',$data['instagram'] ?? '') }}" name="instagram" id="instagram">
                                <x-input-error name='instagram' />
                            </div>

                            <div class="form-group d-none">
                                <label for="exampleInputEmail1">Twitter</label>
                                <input class="form-control" type="text" value="{{ old('twitter',$data['twitter'] ?? '' )}}" name="twitter" id="twitter">
                                <x-input-error name='twitter' />
                            </div>

                            <div class="form-group d-none">
                                <label for="exampleInputEmail1">Linkedin</label>
                                <input class="form-control" type="text" value="{{ old('linkedin',$data['linkedin'] ?? '' )}}" name="linkedin" id="linkedin">
                                <x-input-error name='linkedin' />
                            </div>

                            <button type="submit" class="btn btn-primary mb-0">Update</button>
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
    <style>
        .img-custom{
            width: 350px !important;
            height: 200px !important;
        }
    </style>
@endpush
@push('footer')
    <script src="{{ adminAsset('js/vendor/select2.full.js') }}"></script>

    <script>
        $('.img').on('change', function() {
            var text = 'Choose file';

            if (this.files[0]) {
                text = this.files[0].name
            }
            console.log($(this));
            $(this).siblings('label').text(text)
        });

    </script>



    <script src="{{ adminAsset('js/tinymce/tinymce.min.js') }}"></script>
    <x-tiny-script :editors="[
        ['id' => '#engDescription', 'dir' => 'ltr'],
        ['id' => '#arDescription', 'dir' => 'rtl'],
        ['id' => '#engContent', 'dir' => 'ltr'],
        ['id' => '#arContent', 'dir' => 'rtl'],


        ['id' => '#engSubDescription', 'dir' => 'ltr'],
        ['id' => '#arSubDescription', 'dir' => 'rtl'],

    ]" />
@endpush

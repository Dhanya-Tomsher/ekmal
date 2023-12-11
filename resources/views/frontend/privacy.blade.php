@extends('layouts.app.main')
@section('content')
<section class="page-banner" style="background-image: url('{{ $banner->image }}');">
         <div class="container position-relative h-100">
            <div class="row">
               <div class="col-md-12">
                  <h3 class="page-banner-title">{{ $banner->title }}</h3>
               </div>
            </div>
         </div>
      </section>

      <section class="aboutpage-intro">
           <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <p>{{ $banner->description }}</p>
               </div>
            </div>
           </div>
      </section>
      <section class="company-overview">
         <div class="container">
            <div class="col-md-12">
               <h3 class="innerpage-banner-title">{{ $dyn25->title }}</h3>
               <p>{{ $dyn25->description }}</p>
            </div>
         </div>
      </section>

@endsection
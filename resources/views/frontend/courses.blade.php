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

      <section class="servicepage-intro">
           <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <p>{{ $banner->description }}</p>
               </div>
            </div>
           </div>
      </section>   

      <section class="main-courses">
         <div class="container">
            <h3 class="innerpage-banner-title text-white mb-4">We are providing courses</h3>
            <div class="row g-3">
            @if($cou1)
         @foreach ($cou1 as $cou1s)
               <div class="col-md-4">
                  <div class="course-warpper">
                     <img src="{{ $cou1s->image }}" class="img-fluid" alt="">
                         <div class="course-warpper-content">
                         <a href="{{ route('course-details', ['slug' => $cou1s->slug]) }}"> <h4>{{ $cou1s->title }}</h4></a>
                           <p>{{ $cou1s->description }}</p>
                         </div>
                  </div>
               </div>
               @endforeach
                        @endif
            </div>
         </div>
      </section>

      <section class="course-features course-features-page">
         <div class="container">
            <div class="row g-0">
               <div class="col-md-6">
                  <div class="course-features-content">
                     <h3 class="innerpage-banner-title mb-4">{{ $dyn8->title }}</h3>
           <p>{{ $dyn8->description }}</p>
                  </div>
               </div>
               <div class="col-md-6">
                  <img src="{{ $dyn8->image }}" class="img-fluid course-features-img" alt="">
               </div>
            </div>
         </div>
      </section>

  
      <section class="our-approach">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="our-approach-content">
                     <h3 class="innerpage-banner-title">{{ $dyn9->title }}</h3>
                     <p>{{ $dyn9->description }}</p>
                  </div>
               </div>
            </div>
         </div>
      </section>
@endsection
@extends('layouts.app.main')
@section('content')
<section class="page-bannerrrr service-page-video" style="background-image: url('{{ $slider->image }}');">
         <div class="video-warpper">
            <div class="dddd">
             <video class="video-atr" src="{{ $slider->video_link }}" loop muted autoplay type="video/mp4">
             </video>
            </div>
          
                   </div>
      </section>

     

      <section class="our-capabilities">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <h3 class="innerpage-banner-title">{{ $slider->title }}</h3>
               </div>
            </div>
            <div class="row">
               <div class="col-md-12">
                  <p>{{ $slider->description }}</p>
               </div>
            </div>
         </div>
      </section>
      <section class="service-listing">
         <div class="container">
            <h3 class="innerpage-banner-title text-white mb-4">Our Core Services</h3>
            <div class="row g-3">
            @if($serv)
         @foreach ($serv as $servs)
               <div class="col-md-6">
                  <div class="service-listing-warpper">
                     <div class="service-list-img">
                        <img src="{{ $servs->image }}" class="img-fluid" alt="">
                     </div>
                     <div class="service-listi-content">
                        <h3>{{ $servs->name }}</h3>
                           <a href="{{ route('service-details', ['slug' => $servs->slug]) }}" class="btn btn-primary-stroke">
                              <span> Explore Now</span> 
                              <svg width="31px" height="31px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                 <path d="M7 17L17 7M17 7H7M17 7V17" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                              </svg>
                           </a>
                     </div>
                  </div>
               </div>
               @endforeach
                @endif               

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
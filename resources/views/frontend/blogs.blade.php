@extends('layouts.app.main')
@section('content')
<section class="insights-slier-section">
         <div class="insights-slider owl-carousel owl-theme">
         @if($banner)
         @foreach ($banner as $banners)
            <div class="slider-item">
               <img src="{{ $banners->image }}" class="img-fluid" alt="">
               <div class="slider-caption">
                  <h3 class="page-banner-title">{{ $banners->title }}</h3>
                  <p>{{ $banners->description }}</p>
               </div>
            </div>
            @endforeach
            @endif
         </div>
      </section>

      <section class="faq-section pt-5">
         <div class="container">
            <div class="faq-head">
               <h3 class="featured-title mb-0">Frequently Asked Questions</h3>
               <a href="{{ route('faq') }}" class="btn btn-primary-stroke">
                  <span> View More FAQS?</span> 
                  <svg width="31px" height="31px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                     <path d="M7 17L17 7M17 7H7M17 7V17" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                  </svg>
               </a>
            </div>
            <div class="row">
               <div class="col-md-12">
                  <div class="accordion accordion-flush" id="accordionFlushExample">
                  @if($faq)
                     @foreach ($faq as $faqs)
                     <div class="accordion-item">
                        <h2 class="accordion-header">
                           <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse{{ $faqs->id }}" aria-expanded="false" aria-controls="flush-collapse{{ $faqs->id }}">
                           {{ $faqs->title }}                          </button>
                        </h2>
                        <div id="flush-collapse{{ $faqs->id }}" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                           <div class="accordion-body">{{ $faqs->description }}</div>
                        </div>
                     </div>
                     @endforeach
                        @endif

                  </div>
               </div>
            
            </div>
         </div>
      </section>


      <section class="insights-section">
         <div class="container">
            <div class="row g-5">
            @if($blog)
                     @foreach ($blog as $blogs)
               <div class="col-md-4">
                  <div class="insights-content-warpper">
                         <img src="{{ $blogs->image }}" class="img-fluid" alt="">
                         <div class="insights-content-block">
                           <h4>{{ $blogs->title }}</h4>
                           <p>{{ date('d M Y', strtotime($blogs->blog_date)) }} — {{ $blogs->description }}</p>
                           <a href="{{ route('blog-details', ['slug' => $blogs->slug]) }}">Read More</a>
                         </div>
                  </div>
               </div>
               @endforeach
                        @endif

            </div>
         </div>
      </section>

      <section class="sercice-chart-section sercice-chart-insights">
         <section class="service-chart-upper">
            <div class="container-fluid">
                 <div class="row">
                  
                  <div class="col-12 col-md-6 chart-upper-block">
                     <h3>{{ $dyn4->title }} </h3>
                     <p>{{ $dyn4->description }}</p>
                     <a href="{{ $dyn4->video_link }}" class="btn btn-primary-stroke">
                        <span> {{ $dyn4->link }}</span> 
                        <svg width="31px" height="31px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                           <path d="M7 17L17 7M17 7H7M17 7V17" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                     </a>
                  </div>
                  <div class="col-12 col-md-6 chart-upper-block">
                     <h3>{{ $dyn5->title }}  </h3>
                     <p>{{ $dyn5->description }}</p>
                     <a href="{{ $dyn5->video_link }}" class="btn btn-primary-stroke">
                        <span> {{ $dyn5->link }}</span> 
                        <svg width="31px" height="31px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                           <path d="M7 17L17 7M17 7H7M17 7V17" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                     </a>
                  </div>
                 </div>
            </div>
         </section>
         <section class="service-chart">
             <div class="container">
               <div class="row align-items-center">
                  <div class="col-md-6"> 
                     <img src="assets/images/sercice-chart.png" class="img-fluid w-75" alt="">
                  </div>
                  <div class="col-md-6">
                     <h3>{{ $dyn5->title }}  </h3>
                     <p>{{ $dyn5->description }}</p>
                     <a href="{{ $dyn6->video_link }}" class="btn btn-primary-stroke">
                        <span> {{ $dyn6->link }}</span> 
                        <svg width="31px" height="31px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                           <path d="M7 17L17 7M17 7H7M17 7V17" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                     </a>
                  </div>
               </div>
             </div>
         </section>
         
      </section>

      <section class="course-features p-0 py-5 p-md-5">
         <div class="container-fluid">
            <div class="row g-0">
               <div class="col-md-6">
                  <div class="course-features-content">
                     <h3 class="innerpage-banner-title mb-4">{{ $dyn7->title }}</h3>
                     <p>{{ $dyn7->description }}</p>
                  </div>
               </div>
               <div class="col-md-6">
                  <img src="{{ $dyn7->image }}" class="img-fluid course-features-img" alt="">
               </div>
            </div>
         </div>
      </section>
@endsection
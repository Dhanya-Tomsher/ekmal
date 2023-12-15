@extends('layouts.app.main')
@section('content')           
      <!-- banner -->
      <section class="banner-video-section">
         <div class="video-warpper">         
            <div class="dddd">
            <video class="video-atr" src="{{ $sliders->video_link }}" loop muted autoplay type="video/mp4">
            </video>
            </div>
            <div class="banner-video-content">
               <h1>{!! $sliders->description ?? '' !!}</h1>
            </div>
         </div>
      </section>
      <!-- featured -->
      <section class="featured-section overflow-hidden">
         <div class="container-fluid p-0">
         @if($dyn1)
            <div class="row align-items-center g-0 featured-start-block">
                              <div class="col-md-6 order-1 order-lg-1">
                  <div class="featured-block-content">
                     <h3 class="featured-title">{{$dyn1->title}}</h3>
                     <p class="featured-description">{{$dyn1->description}}</p>
                     <a href="{{ $dyn1->link }}" class="btn btn-primary-stroke mt-4 mb-5 mb-md-0">
                        <span> {{ $dyn1->video_link }}</span> 
                        <svg width="31px" height="31px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                           <path d="M7 17L17 7M17 7H7M17 7V17" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                     </a>
                  </div>
               </div>
               <div class="col-md-6 order-2 order-lg-2">
                  <div class="featured-img-warpper">
                     <img src="{{ $dyn1->image }}" class="img-fluid w-100"  alt="">
                  </div>
               </div>
            </div>
            @endif
            @if($dyn2)
            <div class="row align-items-center g-0 featured-end-block">
               <div class="col-md-6 order-2 order-md-1">
                  <div class="featured-img-warpper">
                     <img src="{{ $dyn2->image }}" class="img-fluid w-100"  alt="">
                  </div>
               </div>
               <div class="col-md-6 order-1 order-md-2">
                  <div class="featured-block-content p-3 p-md-5">
                     <h3 class="featured-title">{{$dyn2->title}}</h3>
                     <p class="featured-description">{{$dyn2->description}}</p>
                     <a href="#" class="btn btn-primary-stroke mt-4">
                        <span> {{ $dyn2->video_link }}</span> 
                        <svg width="31px" height="31px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                           <path d="M7 17L17 7M17 7H7M17 7V17" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                     </a>
                  </div>
               </div>

            </div>
            @endif
         </div>
      </section>
      <section class="portfolio_area pt-0 wow fadeInUp position-relative">
         <div class="container-fluid gx-0">
            <h3 class="featured-title service-title">Our Services</h3>
            <div class="row gx-0">
               <div class="col-xxl-12">
                  <div class="portfolio__slider-8 p-relative fix">
                     <div id="portfolio-bg-img" class="portfolio-img-1">
                     @if($serv)
                    @foreach ($serv as $servs1)
                    
                        <div class="portfolio-bg portfolio-img-{{ $servs1->id }}" data-background="{{ $servs1->image }}"></div>
                        @endforeach
                    @endif
                     </div>
                     <div class="portfolio__slider-active-8 swiper-container">
                        <div class="swiper-wrapper">
                        <?php
                            $k=1;
                            ?>
                        @if($serv)
                            @foreach ($serv as $servs)                            
                           <div class="portfolio__item-8 swiper-slide active" rel="portfolio-img-{{ $servs->id }}">
                              <div class="portfolio__content-8" style="background-color: transparent;">
                                 <h3 class="portfolio__title-8">
                                    <a href="{{ route('service-details', ['slug' => $servs->slug]) }}">{{ $servs->name }}</a>
                                 </h3>
                                 <svg width="50px" height="50px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M7 17L17 7M17 7H7M17 7V17" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                 </svg>
                                 <div class="branches-block">
                                    <p style="color: #fff;">                                    
                                </p>
                                 </div>
                              </div>
                           </div>                           
                           @endforeach
                        @endif
                           

                        </div>
                        <div class="portfolio__nav-8">
                           <button type="button" class="portfolio-button-prev-8"><i class="bi bi-arrow-left"></i></button>
                           <button type="button" class="portfolio-button-next-8"><i class="bi bi-arrow-right"></i></button>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>


      <section class="achievements-section">
         <div class="container-fluid">
            <div class="row justify-content-center align-items-start">
            @if($dyn3)
               <div class="col-md-5">
                  <div class="video-description">                  
            <h4>{{ $dyn3->title }}</h4>
            {!! $dyn3->description !!}            
                  </div>
               </div>
               <div class="col-md-7">
                  <div class="video-block-content">
                     <video src="{{ $dyn3->video_link }}" width="100%" loop muted autoplay type="video/mp4">
                     </video>
                  </div>
               </div>
                        @endif
            </div>
         </div>
      </section>

      <section class="sercice-chart-section">

         <section class="service-chart-upper">
            <div class="container-fluid">
                 <div class="row">
                 @if($dyn4)
                  <div class="col-12 col-md-6 chart-upper-block">
                     <h3>{{ $dyn4->title }} </h3>
                     {{ $dyn4->description }}
                     <a href="{{ $dyn4->video_link }}" class="btn btn-primary-stroke">
                        <span> {{ $dyn4->link }}</span> 
                        <svg width="31px" height="31px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                           <path d="M7 17L17 7M17 7H7M17 7V17" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                     </a>
                  </div>
                        @endif
                  @if($dyn5)
                  <div class="col-12 col-md-6 chart-upper-block">
                     <h3>{{ $dyn5->title }}  </h3>
                    {{ $dyn5->description }} 
                     <a href="{{ $dyn5->video_link }}" class="btn btn-primary-stroke">
                        <span> {{ $dyn5->link }}</span> 
                        <svg width="31px" height="31px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                           <path d="M7 17L17 7M17 7H7M17 7V17" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                     </a>
                  </div>
                        @endif
                 </div>
            </div>
         </section>
         <section class="service-chart">
             <div class="container">
             @if($dyn6)
               <div class="row align-items-center">
                  <div class="col-md-6"> 
                     <img src="{{ $dyn6->image }}" class="img-fluid w-75" alt="">
                  </div>
                  <div class="col-md-6">
                     <h3>{{ $dyn6->title }}</h3>
                     {{ $dyn6->description }}
                     <a href="{{ $dyn6->video_link }}" class="btn btn-primary-stroke">
                        <span> {{ $dyn6->link }}</span> 
                        <svg width="31px" height="31px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                           <path d="M7 17L17 7M17 7H7M17 7V17" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                     </a>
                  </div>
               </div>
                        @endif
             </div>
         </section>
         
      </section>




      <section class="online-courses">
         <div class="container">
            <h3 class="featured-title mb-3">Courses</h3>
            <div class="row g-2">
            @if($cou1)
         @foreach ($cou1 as $cou1s)
               <div class="col-md-8">
                  <div class="course-block course-block-1" style="background-image: url('{{ $cou1s->image }}');">
                     <h3 class="featured-title">{{ $cou1s->title }}</h3>
                     <p class="featured-description">{!! substr($cou1s->description, 0, 205) !!}...</p>
                     <a href="{{ route('course-details', ['slug' => $cou1s->slug]) }}" class="btn btn-primary-fill mt-4">
                        <span> Free Case Evaluation</span> 
                        <svg width="31px" height="31px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                           <path d="M7 17L17 7M17 7H7M17 7V17" stroke="#000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                     </a>
                  </div>
               </div>
               @endforeach
                        @endif
                        @if($cou2)
         @foreach ($cou2 as $cou2s)
               <div class="col-md-4">
                  <div class="course-block course-block-2" style="background-image: url('{{ $cou2s->image }}');">
                     <h3 class="featured-title">{{ $cou2s->title }}
                     </h3>
                     <p class="featured-description">{!! substr($cou2s->description, 0, 205) !!}...</p>
                     <a href="{{ route('course-details', ['slug' => $cou2s->slug]) }}" class="btn btn-primary-stroke mt-4">
                        <span> Free Case Evaluation</span> 
                        <svg width="31px" height="31px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                           <path d="M7 17L17 7M17 7H7M17 7V17" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                     </a>
                  </div>
               </div>
               @endforeach
                        @endif
                        @if($cou3)
         @foreach ($cou3 as $cou3s)
               <div class="col-md-4">
                  <div class="course-block course-block-3" style="background-image: url('{{ $cou3s->image }}');">
                     <h3 class="featured-title">{{ $cou3s->title }}
                     </h3>
                     <p class="featured-description">{!! substr($cou3s->description, 0, 205) !!}...</p>
                     <a href="{{ route('course-details', ['slug' => $cou3s->slug]) }}" class="btn btn-primary-stroke mt-4">
                        <span> Free Case Evaluation</span> 
                        <svg width="31px" height="31px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                           <path d="M7 17L17 7M17 7H7M17 7V17" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                     </a>
                  </div>
               </div>
               @endforeach
                        @endif
                        @if($cou4)
         @foreach ($cou4 as $cou4s)
               <div class="col-md-8">
                  <div class="course-block course-block-4" style="background-image: url('{{ $cou4s->image }}');background-repeat: no-repeat; background-size: cover;">
                     <h3 class="featured-title">{{ $cou4s->title }}

                     </h3>
                     <p class="featured-description">{!! substr($cou4s->description, 0, 205) !!}...</p>
                     <a href="{{ route('course-details', ['slug' => $cou4s->slug]) }}" class="btn btn-primary-stroke mt-4">
                        <span> Free Case Evaluation</span> 
                        <svg width="31px" height="31px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                           <path d="M7 17L17 7M17 7H7M17 7V17" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                     </a>
                  </div>
               </div>
               @endforeach
                        @endif
            </div>
         </div>
      </section>
      <section class="news-section">
         <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-between mb-5">
               <h3 class="featured-title">Blogs</h3>
            </div>
            <div class="row">
            @if($blog)
         @foreach ($blog as $blogs)
               <div class="col-md-4 mb-4 mb-lg-0">
                  <div class="card">
                     <img src="{{ $blogs->image }}" class="card-img-top" alt="...">
                     <div class="card-body">
                        <span class="card-date">{{ date('d M Y',strtotime($blogs->blog_date)) }}</span>
                        <a href="{{ route('blog-details', ['slug' => $blogs->slug]) }}">
                        <h5 class="card-title">{{ $blogs->title }}</h5>
                        <p class="card-text">{!! substr($blogs->description, 0, 105) !!}...
                        </a>
                        </p>
                     </div>
                  </div>
               </div>
               @endforeach
                        @endif
            </div>
         </div>
      </section>

      <section class="contact__discover">
         <div class="container">
            <div class="row">
               <div class="col-md-6">
                  <div class="discover-more-inner">
                     <h3 class="featured-title mb-3 text-white">Discover more</h3>
                     <hr>
                     <p class="text-white mb-3">Where Engineering and Integrated Technology Converge for Superior Solutions 
                     </p>
                     <form method="GET" action="{{ route('search-blog') }}">
                        <div class="mb-3 position-relative">
                        <input type="text" name="keyword" class="form-control" placeholder="Search here...">
                           <a href="#"> <i class="bi bi-search search-icon"></i></a>
                        </div>
                     </form>
                     <h6>Popular quick links</h6>
                     <ul>
                    
                     @if($allc)
                     @foreach ($allc as $allcs)
                        <li>
                           <a href="{{ route('course-details', ['slug' => $allcs->id]) }}">{{ $allcs->keyword }}</a>
                        </li>
                        @endforeach
                        @endif  
                     </ul>
                  </div>
                  </div>
               <div class="col-md-6" id="formDiv">
                  <div class="contact__discover__inner">
                     <div class="newsletter-start">
                        <h3 class="featured-title text-white">Get in Touch</h3>
                        <hr>
                        @if ($message = Session::get('status'))
                                            <div class="col-12">
                                                <div class="col-12">
                                                    <div
                                                        class="items-center justify-between bg-success-1 pl-30 pr-20 py-30 rounded-8">
                                                        <div class="text-success-2 lh-14 fw-300">
                                                            <div class="text-18 fw-700">
                                                                {!! $message !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                     </div>
                     <div class="enquiry-form">
                     
                        <form method="POST" action="{{ route('store-contact') }}">
                        @csrf
                           <div class="row">
         
                              <div class="col-md-12 m-auto">
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="mb-3">
                                          <input type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}">
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="mb-3">
                                          <input type="text" class="form-control" placeholder="Phone" name="phone" value="{{ old('phone') }}">
                                       </div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                       <textarea class="form-control" id="exampleFormControlTextarea1" name="message" rows="2" placeholder="Type your message"></textarea>
                                    </div>
                                 </div>
            
                                    <button type="submit" class="btn btn-primary-stroke">
                                       <span> Submit Now</span> 
                                       <svg width="31px" height="31px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                          <path d="M7 17L17 7M17 7H7M17 7V17" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                       </svg>
</button>
                                  </form>
                     </div>
                  </div>
               </div>
               </div>
            </div>
      
            </div>
         </div>
      </section>

      <section class="faq-section">
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
      @endsection
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
               <h3 class="innerpage-banner-title">{{ $dyn13->title }}</h3>
               <p>{{ $dyn13->description }}</p>

                  <img src="{{ $dyn13->image }}" class="img-fluid" alt="">
            </div>
         </div>
      </section>

      <section class="what-believe" id="whoweare">
         <div class="container">
    <div class="row">
      <div class="col-md-6 bg-white p-4 p-md-5">
         <h3 class="innerpage-banner-title pb-3">{{ $dyn14->title }}</h3>
<p>{{ $dyn14->description }}</p>                    </div>
                     <div class="col-md-6">
                        <img src="{{ $dyn14->image }}" class="img-fluid believe-img" alt="">
                     </div>
    </div>
         </div>
      </section>

      <section class="global-presence">
        <div class="container-fluid g-0">
         <div class="row g-0">
            <div class="col-md-4">
               <div class="global-presence-content">
                  <h3 class="innerpage-banner-title">{{ $dyn15->title }}</h3>
               <p>{{ $dyn15->description }}</p>
               </div>
            </div>
            <div class="col-md-8">
               <img src="{{ $dyn15->image }}" class="img-fluid global-presence-mp" alt="">
            </div>
         </div>
        </div>
      </section>

      <section class="our-values"  id="values">
         <div class="container">
            <h3 class="innerpage-banner-title">{{ $dyn16->title }}</h3>
            <p class="py-4">{{ $dyn16->title }}</p>
            <div class="row g-3">
               <div class="col-md-4">
                  <div class="values-content-warpper">
                     <div class="values-connt">
                      <span>  {{ $dyn19->title }}</span>
                     </div>
                     <div class="values-description">
                        <p>{{ $dyn19->description }}</p>
                     </div>
                  </div>
               </div>
               <div class="col-md-4">     <div class="values-content-warpper">
                  <div class="values-connt">
                     <span> {{ $dyn20->title }}</span>
                  </div>
                  <div class="values-description">
                     <p>{{ $dyn20->description }}</p>
                  </div>
               </div></div>
               <div class="col-md-4">     <div class="values-content-warpper">
                  <div class="values-connt">
                     <span>  {{ $dyn21->title }}</span>
                  </div>
                  <div class="values-description">
                     <p>{{ $dyn21->description }}</p>
                  </div>
               </div></div>
               <div class="col-md-6">     <div class="values-content-warpper">
                  <div class="values-connt">
                     <span>  {{ $dyn22->title }}</span>
                  </div>
                  <div class="values-description">
                     <p>{{ $dyn22->description }}</p>
                  </div>
               </div></div>
               <div class="col-md-6">     <div class="values-content-warpper">
                  <div class="values-connt">
                     <span> {{ $dyn23->title }}</span>
                  </div>
                  <div class="values-description">
                     <p>{{ $dyn23->description }}</p>
                  </div>
               </div></div>
            </div>
         </div>
      </section>

      <section class="vision-mission" id="vision">
         <div class="container">
           <div class="row">
            <div class="col-md-6">
               <div class="vision-mission-warpper">
                  <img src="{{ $dyn17->image }}" class="img-fluid" alt="">
                  <div class="vision-mission-content">
                     <h3 class="innerpage-banner-title">{{ $dyn17->title }}</h3>
                     <p>{{ $dyn17->description }}</p>
                  </div>
               </div>
            </div>
            <div class="col-md-6">
               <div class="vision-mission-warpper">
                  <img src="{{ $dyn18->image }}" class="img-fluid" alt="">
                  <div class="vision-mission-content">
                     <h3 class="innerpage-banner-title">{{ $dyn18->title }}</h3>
                     <p>{{ $dyn18->description }}</p>
                  </div>
               </div>
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
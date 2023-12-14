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

      <section class="world-where">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <h3 class="innerpage-banner-title">{{ $dyn10->title }}</h3>
                  <p>{{ $dyn10->description }}</p>
               </div>
            </div>
         </div>
      </section>

      <section class="career-fulfillment">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="career-fulfillment-content" >
<img src="{{ $dyn10->image }}" class="img-fluid" alt="">
<div class="fulfillment-content-block">
   <p>{{ $dyn10->video_link }}</p>
</div>
                  </div>
               </div>
            </div>
         </div>
      </section>

      <section class="job-openings">
         <div class="container">
            <h3 class="innerpage-banner-title text-white">{{ $dyn11->title }}</h3>
            <p class="text-white py-2">{{ $dyn11->description }}</p>
            <div class="row mt-4 g-3">
            @if($carr)
         @foreach ($carr as $carrs)
               <div class="col-md-3">
                  <div class="job-card">
                     <h4>{{ $carrs->title }}</h4> 
                     <span>&nbsp;</span>                    
                     <div class="job-description">
                        <p>{{ $carrs->description }}</p>
                     </div>
                     <span>Last Date: {{ date('d M Y', strtotime($carrs->last_date)) }}</span>
                     <a href="{{ route('careers.apply') }}" class="apply-btn">Apply Now</a>
                  </div>
               </div>
               @endforeach
                        @endif

            </div>
         </div>
      </section>

      <section class="why-teams">
          <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <h3 class="innerpage-banner-title mb-4">{{ $dyn12->title }}</h3>
               </div>
            </div>
            <div class="row">
               <div class="col-md-12">
                  <p>{{ $dyn12->description }}</p>
               </div>               
            </div>
          </div>
      </section>
@endsection

<style>
   section.job-openings .job-card .job-description{
      padding-bottom: 0px !important;
   }
</style>
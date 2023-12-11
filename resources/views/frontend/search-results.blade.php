@extends('layouts.app.main')
@section('content')
<section class="page-banner" style="background-image: url(assets/images/about-banner.jpg);">
         <div class="container position-relative h-100">
            <div class="row">
               <div class="col-md-12">
                  <h3 class="page-banner-title">Search results</h3>
               </div>
            </div>
         </div>
      </section>
      <section class="insights-section">
         <div class="container">
            <div class="row g-5">
            @if (isset($blogs[0]))
                    @foreach ($blogs as $item)
                    <div class="col-md-4">
                  <div class="insights-content-warpper">
                  
                         <img src="{{ $item->image }}" class="img-fluid" alt="">
                         <div class="insights-content-block">
                           <h4><a href="{{ route('blog-details', ['slug' => $item->slug]) }}">{{ $item->title }}</a></h4>
                           <p>{{ $item->description }}</p>
                         </div>
                    
                  </div>
               </div>
               @endforeach
                        @endif 
            </div>
         </div>
      </section>
      @endsection
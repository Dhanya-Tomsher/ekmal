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
      <section class="faq-section pt-5">
         <div class="container">
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
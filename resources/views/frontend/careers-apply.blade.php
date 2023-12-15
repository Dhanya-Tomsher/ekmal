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


      <section class="aboutpage-intro">
           <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <p>We are dedicated to
                     delivering consulting
                     and developing
                     services that enhance
                     the quality and impact
                     of your choices,
                     pathways, and
                     valuable assets.</p>
               </div>
            </div>
           </div>
      </section>

      <section class="contact-form">
         <div class="container">
            <div class="row">
               <div class="col-md-12" id="formDiv">
               @if ($message = Session::get('error'))
                                <div class="col-12 mt-4">
                                    <div class="col-12">
                                        <div
                                            class="items-center justify-between bg-error-1 pl-30 pr-20 py-30 rounded-8">
                                            <div class="text-error-2 lh-14 fw-700">
                                                {{$message}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            
                            @if ($message = Session::get('status'))
                                <div class="col-12 mt-4">
                                    <div class="col-12">
                                        <div
                                            class="items-center justify-between bg-success-1 pl-30 pr-20 py-30 rounded-8">
                                            <div class="text-info-2 lh-14 fw-300">
                                                <x-status />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                  <div class="form-warpper">
                     <h3 class="innerpage-banner-title text-white mb-4">Apply Now</h3>
                     <form name="frm" method="POST" action="{{ route('store-career') }}" enctype="multipart/form-data">
                     @csrf
                        <div class="row g-3">
                           <div class="col-md-6">
                             <input type="text" required name="name" class="form-control" placeholder="First Name" aria-label="First name">
                           </div>
                           <div class="col-md-6">
                             <input type="email" required name="email" class="form-control" placeholder="Email Address" aria-label="Email Address">
                           </div>
                           <div class="col-md-6">
                              <input type="text" required name="phone" class="form-control" placeholder="Phone Number" aria-label="Phone Number (optional)">
                            </div>
                            <div class="col-md-6">
                              <textarea class="form-control" required name="description" id="exampleFormControlTextarea1" placeholder="Description" rows="3"></textarea>
                            </div>
                            <div class="col-md-12">
                            <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Upload CV* (Please upload PDF file with size less than 500 KB)</label>
                            
                                            <input class="form-control" type="file" name="resume" accept=".pdf" id="resume" placeholder="cv.pdf">
                            
                            </div>
                            <div class="col-md-12">
                            <button type="submit" class="btn btn-primary-stroke">
                                 <span> Submit Now</span> 
                                 <svg width="31px" height="31px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M7 17L17 7M17 7H7M17 7V17" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                 </svg>
                            </button>
                            </div>
                         </div>
                     </form>

                     
                  </div>

               </div>
            </div>
         </div>
      </section>
      
@endsection
@push('footer')
<script>
        var message = "{{ Session::get('status') }}";

        if (message != '') {
            $('html, body').animate({
                scrollTop: $("#formDiv").offset().top
            }, 1000);
        }
</script>
@endpush
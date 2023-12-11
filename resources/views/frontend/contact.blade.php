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
                  <div class="form-warpper">
                     <h3 class="innerpage-banner-title text-white mb-4">Send a message</h3>
                     <form name="frm" method="POST" action="{{ route('store-contact') }}">
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
                              <input type="text" name="subject" class="form-control" placeholder="Subject" aria-label="Subject">
                            </div>
                            <div class="col-md-12">
                              <textarea class="form-control" required name="message" id="exampleFormControlTextarea1" placeholder="Your Message / Inquiry / Request" rows="3"></textarea>
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
      <section class="contact-address">
         <div class="container">
            <div class="row g-3">
            @if($contact)
         @foreach ($contact as $contacts)
               <div class="col-md-4"> 
                  <div class="address-detail-block">
                     <h4>{{ $contacts->name }}</h4>                    
                     <ul>
                        <li>
                           <i class="bi bi-telephone"></i> <a href="tel:{{ $contacts->phone }}">{{ $contacts->phone }}</a>
                        </li>
                        <li>
                           <i class="bi bi-envelope-at"></i>
                           <a href="mailto:{{ $contacts->email }}">{{ $contacts->email }}</a>
                        </li>
                        <li>
                           <i class="bi bi-map"></i>
                           <p>{{ $contacts->address }}</p>
                        </li>
                     </ul>
                  </div>
               </div>
               @endforeach
                @endif       
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
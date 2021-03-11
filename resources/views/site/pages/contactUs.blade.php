@extends('site.layouts.app')
@section('content')

      <!-- start layout -->

        <!-- start map -->
        <div class="container-fluid">
            <div class="row">
              <div class="col-md-12">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d867267.5926862772!2d34.33157839907367!3d31.885832272679675!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x151cf2d28866bdd9%3A0xee17a001d166f686!2sPalestine!5e0!3m2!1sen!2seg!4v1614611998182!5m2!1sen!2seg" width="100%" height="600" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
              </div>
            </div>
          </div>
          <!-- end map -->

          <!-- strat contact div -->

            <div class="container contact_div">
              <div class="row">
                <div class="col-md-5">
                  <div class="visit">
                    <h2>visit us :</h2>
                    <p>
                      <i class="fas fa-map-marker-alt"></i>
                      palestine
                    </p>
                    <p>
                      salfeet - beddya
                    </p>
                    <p>
                      western junction 00970
                    </p>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="conactborder"></div>
                </div>
                <div class="col-md-5">
                  <div class="contact">
                    <h2>contact us :</h2>
                    <p><i class="fas fa-phone-alt"></i> <span style="margin-left: 4px;">09 299 5184</span> </p>
                    <p><i class="fas fa-mobile-alt"></i> <span style="margin-left: 12px;">056 883 0132</span> </p>
                    <p>
                      <img src="img/phone.svg" alt="">
                      <span style="margin-left: 27px;">+972 5 688 30132</span>
                  </p>
                  </div>
                </div>
              </div>
            </div>

          <!-- end contact div -->





        <!-- end layout -->


@endsection

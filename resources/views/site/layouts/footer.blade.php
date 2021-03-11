   <!-- start footer -->

   <div class="footer">
    <div class="row">
        <div class="col-lg-5">
            <div class="row">
                <div class="col-md-12 text-center">
                    <img class="footer-img1" src="{{ asset('site/assets/img/logo.svg') }}" alt="logo">
                </div>
                <div class="col-md-12 text-center">
                    <img class="footer-img2" src="{{ asset('site/assets/img/footerimg2.svg') }}" alt="">
                </div>
            </div>

        </div>
        <div style="position: relative;" class="col-lg-7 text-center">
            <div class="right">
                <!-- <img src="{{ asset('site/assets/img/footerbacground.svg') }}" alt=""> -->
            </div>
            <div class="footer-pr">
                <p class="footer-location">
                    <label class="footer-location-labelfather">
                        aser al-diyaa for marble
                        <br>
                        <label class="footer-location-labelperant">{{ $contactUs[0]->adress }} - {{ $contactUs[0]->city }} - {{ $contactUs[0]->Country }}</label><br>
                        <label class="footer-location-labelperant">
                            <span class="fa-stack fa-2x" style="vertical-align: top;">
                                <i class="far fa-circle fa-stack-2x"></i>
                                <i style="font-size: 13px;" class="fas fa-phone-alt fa-stack-1x"></i>
                            </span>
                            {{ $contactUs[0]->whatsApp_number }}
                        </label>
                    </label>
                </p>
            </div>

        </div>
    </div>
</div>

<!-- end footer -->


<!-- start scripts -->

<script src="{{ asset('site/assets/js/jquery-3.4.1.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<script src="https://use.fontawesome.com/releases/v5.15.2/js/all.js" data-auto-replace-svg="nest"></script>
<script src="{{ asset('site/assets/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('site/assets/js/main.js') }}"></script>

</body>
</html>

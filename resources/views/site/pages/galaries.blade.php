@extends('site.layouts.app')
@section('content')
<!-- start layout -->

<!-- start gallary img -->
<div class="container-fluid">
    <div class="bacgroundgallary">
        <img class="bacgroundgallaryoverlayimg" src="{{ asset('admin/img/gallery_logo_header/logo.svg') }}" alt="">
        <h1>
            <span class="textG">G</span>
            <span class="scondtext">allary</span>
            <span class="thirdtext">explore more ..</span>
        </h1>
    </div>
</div>

<!-- end gallary img -->

<!-- start product imgs -->
<div class="container-fluid gallaryimegs">
    @if ($allproductImgs_code)
    @foreach ($allproductImgs_code as $img_code)

    <div class="row">
        <div class="col-lg-9 col-md-8 col-sm-12">
            <div class="gallaryimdcontent">
                <img src="{{ asset('admin/img/max/'.$img_code->max_img ) }}" alt="">
                <a href="#" class="but3 detailsimggallary2">see more</a>
            </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-12">
            <div class="gallaryimdcontent">
                <img src="{{ asset('admin/img/max/'.$img_code->tiny_img ) }}" alt="">
                <span class="detailsimggallary1">#{{$img_code->code_img }}</span>
            </div>
        </div>

    </div>

    @endforeach

    @endif



</div>
<!-- end product imgs -->


<!-- end layout -->
@endsection


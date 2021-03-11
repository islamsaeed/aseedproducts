@extends('site.layouts.app')

@section('content')
<!-- start layout -->
<div class="aboutimg1">
    <img class="overlayimg" src="img/aboutoverlay.svg" alt="">
    <h1>
        <span>A</span> bout <br>
        Us <span>..</span>
    </h1>
    <p>
        <img class="qutes1" src="img/qutes2.svg" alt="">
        Lorem ipsum dolor sit amet consectetur adipiscing elit magnis, mi eleifend eget risus cras felis nullam sociosqu
        vehicula, morbi nisi sapien sed lectus congue mauris. Quisque cum ridiculus potenti penatibus turpis, curabitur
        torquent facilisis metus.
        <img class="qutes2" src="img/qutes2.svg" alt="">
    </p>
    <div class="overlay">
    </div>
</div>

<div class="aboutimg2 row">
    <div class="col-lg-5 text-center">
        <img class="aboutlogowhie" src="img/aboutlogowhit.svg" alt="">
    </div>
    <div class="col-lg-7">
        <p>
            <img class="qutes1" src="img/qutes2.svg" alt="">
            Lorem ipsum dolor sit amet consectetur adipiscing elit magnis, mi eleifend eget risus cras felis nullam
            sociosqu vehicula, morbi nisi sapien sed lectus congue mauris.
            <img class="qutes2" src="img/qutes2.svg" alt="">
        </p>
    </div>
    <div class="overlay">
    </div>
</div>

<!-- start detailes -->

<!-- end detailes -->


<!-- start top products -->

<div class="products">
    <div class="container">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <h1 class="head2">top products</h1>
                <div class="owl-carousel owl-theme">


                    @if ($topproducts)
                    @foreach ($topproducts as $topproduct)

                    <div class="item">
                        <div class="content-img">
                            <img src="{{ asset('admin/img/max/' .$topproduct->productImage->pluck('tiny_img')->implode(','))  }}"
                                alt="">
                        </div>
                    </div>
                    @endforeach

                    @endif





                </div>
            </div>
            <div class="col-md-1"></div>
        </div>
    </div>
</div>

<!-- end top products -->

<!-- end layout -->

@endsection

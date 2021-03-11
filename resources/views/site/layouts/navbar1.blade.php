<!-- start nav 1-->
<nav class="fixed-nav Nav1 main-direction-ltr navbar navbar-expand-lg navbar-light ">
    <div class="container-fluid">
        <!-- <a class="navbar-brand" href="index.html">Aser Aldiaa For Marble</a> -->
        <button class="navbar-toggler openallmenuenav navbar-toggler1 navbar-toggler1" type="button"
            data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="our-button">
                <span class="the-bar"></span>
                <span class="the-bar"></span>
                <span class="the-bar"></span>
            </span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav  mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link  active" aria-current="page" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('aboutUs') }}">about</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        products
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @php
                        $products = App\Models\Product::all();
                        @endphp
                        @foreach ($products as $product)
                        <li><a class="dropdown-item"
                                href="{{ route('products',$product->id) }}">{{ $product->name }}</a></li>

                        @endforeach



                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('galaries') }}">gallary</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('contactUs') }}">contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#search-nav-modal"><i
                            class="fas fa-search"></i></a>
                </li>
                <li class="nav-item dropdown navlanguage">
                    {{-- <a style="color: #fff !important;
                font-size: 16px;
                background: #2f3548;
                margin-top: 10px;
                padding: 3px 10px;
                font-weight: normal !important;" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                en
                </a>
                <ul class="dropdown-menu " aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="#">en</a></li>
                <li><a class="dropdown-item" href="#">ar</a></li>
                </ul> --}}

                    <div class="btn-group mb-1">
                        <button type="button" class="btn btn-light btn-sm dropdown-toggle" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            @if (App::getLocale() == 'ar')
                            {{ LaravelLocalization::getCurrentLocaleName() }}
                            <img src="{{ URL::asset('assets/images/flags/EG.png') }}" alt="">
                            @else
                            {{ LaravelLocalization::getCurrentLocaleName() }}
                            <img src="{{ URL::asset('assets/images/flags/US.png') }}" alt="">
                            @endif
                        </button>
                        <div class="dropdown-menu">
                            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                            <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}"
                                href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                {{ $properties['native'] }}
                            </a>
                            @endforeach
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- start modal for search -->
<div class="modal fade" id="search-nav-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <p class="headmodel">search hare .....</p>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row main-direction-ltr">
                        <div class="col-md-12">
                            <input placeholder="input words......" class="inputform" type="text">
                        </div>
                        <div class="col-md-12 text-center custom_margin15">
                            <button class="but2"><i class="fas fa-search"></i> search...</button>
                            <button data-bs-dismiss="modal" aria-label="Close" class="butred"><i
                                    class="fas fa-times"></i> Close</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<!-- end modal for search -->

<!-- end nav -->

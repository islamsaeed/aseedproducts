<!-- start nav 2-->
<nav class="unfixednav   navbar navbar-expand-lg navbar-light ">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.html"><img src="{{ asset('site/assets/img/logo.svg') }}" alt=""></a>
        <button class="navbar-toggler openallmenuenav" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="our-button">
                <span class="the-bar"></span>
                <span class="the-bar"></span>
                <span class="the-bar"></span>
            </span>
        </button>
        <div class="collapse navbar-collapse main-direction-ltr" id="navbarSupportedContent">
            <ul class="navbar-nav  mb-2 mb-lg-0">
                <li style="margin-left: 0;" class="nav-item">
                    <a class="nav-link  active" aria-current="page" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href={{ route('aboutUs') }}>about</a>
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
                    <a style="color: #fff !important;
            font-size: 16px;
            background: #e88823;
            margin-top: 10px;
            padding: 3px 10px;
            font-weight: normal !important;" class="navlanguage_A1 nav-link dropdown-toggle" href="#"
                        id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        en
                    </a>
                    <ul class="dropdown-menu " aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#">en</a></li>
                        <li><a class="dropdown-item" href="#">ar</a></li>
                    </ul>
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

<!-- end nav2 -->

@extends('admin.layouts.master')
@section('css')
@toastr_css
@section('title')
صور لون المنتج
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
اضافه صور ولون المنتج
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">


    @if ($errors->any())
    <div class="error">{{ $errors->first('name') }}</div>
    @endif



    <div class="col-xl-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">

                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif


                <div class="modal-header">
                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title">
                        اضافه صور و كود و لون المنتج جديد
                    </h5>

                </div>
                <div class="modal-body">



                    <form action="{{ route('product_img.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="form-group col-6">

                                <label>كود المنتج:</label>
                                <input type="number" class="form-control" placeholder="ادخل كود المنتج" id="phone"
                                    name="code_img" required autocomplete="off">
                            </div>


                        </div>

                        <div class="row">

                            <div class="form-group col-6">

                                <label> لون المنتج بالعربيه</label>
                                <input name="color_name_ar" class="form-control" type="text" required
                                    placeholder=" ادخل لون المنتج بالعربيه">


                            </div>

                            <div class="form-group col-6">

                                <label> لون المنتج بالانجليزيه</label>
                                <input name="color_name_en" class="form-control" type="text" required
                                    placeholder="ادخل لون المنتج بالانجليزيه">


                            </div>
                        </div>

                        <br>
                        <div class="row">
                            <div class="form-group col-md-6 col-sm-12">

                                <label style="display: block; margin-bottom:5px">صوره منتج</label>
                                <input type="file" name="tiny_img[]" multiple required>
                            </div>

                            <div class="form-group col-6 col-sm-12">

                                <label style="display: block; margin-bottom:5px">صوره لمعرض الاعمال </label>
                                <input type="file" name="max_img[]" required>

                            </div>
                        </div>





                        <button type="submit" class="btn btn-success ">اضافه صور المنتج</button>
                    </form><br><br>

                    <a href="{{ route('products.index') }}">
                        <button class="btn btn-primary">
                            صفحة المنتجات
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- row closed -->
@endsection
@section('js')
@toastr_js
@toastr_render
@endsection

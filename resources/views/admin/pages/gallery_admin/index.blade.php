@extends('admin.layouts.master')
@section('css')
@toastr_css
@section('title')
صور المنتج
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
عرض صور المنتج
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




                <br><br>
                <div class="card-deck">
                    @if ($productImgs)
                    @foreach ($productImgs as $productImg )

                    <div class="col-md-3">
                        <td>
                        <td>
                            <div class="card">
                                <h5 style="padding: 10px;
                background-color: aquamarine;" class="card-title text-center">لون :
                                    {{$productImg->getTranslation('color_name','ar')}}
                        </td>
                        </h5>
                        <img class="img-responsive mb-1" src="{{ asset('admin/img/min/' . $productImg->max_img )}}"
                            style="height:150px">

                        <img class="img-responsive" src="{{ asset('admin/img/min/' . $productImg->tiny_img )}}"
                            style="height:150px">
                        <div class="card-footer badge-info" style="overflow: hidden">



                            <div style="background-color: #17a2b8;font-size: 22px;" class=" badge-info text-center">
                                #{{ $productImg->code_img }} </div>

                        </div>
                    </div>
                </div>

                @endforeach







                @endif
                <div class="alert alert-warning m-2 mt-3" role="alert" style="width: 100%;
                                        text-align: center;
                                        font-weight: 900;
                                        font-size: 20px;">
                    اذا لما تضف صور المنتجات من فضلك اضف
                </div>
            </div>




















            {{-- <div class="row">
                    <div class="col-md-4">
                        <div class="card-deck">

                            <div class="card">
                                <h5 class="card-title">اللون{{  $productImg->color_name}}</h5>
            <img src="{{ asset('admin/img/min/' . $productImg->max_img )}}" style="height:150px" width="110px">
            <div class="card-body">
                {{-- <h5 class="card-title">اللون{{  $productImg->color_name}}</h5> --}}
                {{--
                                </div>
                                <div class="card-footer">
                                    <img src="{{ asset('admin/img/min/' . $productImg->tiny_img )}}"
                style="height:150px" width="110px">
            </div>
        </div>
    </div>
</div>
</div> --}}






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

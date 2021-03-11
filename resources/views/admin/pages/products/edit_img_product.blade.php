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




                    @foreach ($productImgs as $pro)
                    <form action="{{ route('update_product_main_imgs','test') }}" method="POST"
                        enctype="multipart/form-data">

                        @csrf
                        @method('patch')




                        <input type="hidden" name="id" value="{{ $pro->id }}">
                        <input type="hidden" name="product_id" value="{{ $pro->product_id }}">

                        <div class="row">

                            {{-- IMG CODE  --}}
                            <div class="form-group col-3">
                                <label>كود المنتج:</label>
                                <input type="number" class="form-control" placeholder="ادخل كود المنتج" id="phone"
                                    name="code_img" required autocomplete="off" value="{{ $pro->code_img }}">
                            </div>

                            {{-- IMG COLOR --}}
                            <div class="form-group col-3">
                                <label>اختر لون المنتج</label>
                                <input name="color_name" class="form-control" type="text" required
                                    placeholder="ادخل لون المنتج" value="{{ $pro->color_name }}">


                            </div>

                            {{-- IMG COLOR PHOTO --}}
                            <div class="form-group col-md-3">
                                @foreach ([$pro->tiny_img] as $img)
                                <img style="height:90px; width:100px;" src="{{ asset('admin/img/min/'.$img) }}" alt="">
                                @endforeach
                                <br>
                                <label style="display: block; margin-bottom:5px">صوره منتج</label>
                                <input type="file" name="tiny_img">
                                <a href="">
                                    <button class="btn btn-danger deleteBTN1" value="{{ $pro->id }}">
                                        Delete
                                    </button>
                                </a>
                            </div>

                            {{-- PREVIOUS WORK FOR THIS COLOR --}}
                            <div class="form-group col-3">
                                <img style="height:90px; width:100px;" src="{{ asset('admin/img/max/'.$pro->max_img) }}"
                                    alt="">
                                <br>
                                <label style="display: block; margin-bottom:5px">صوره لمعرض الاعمال </label>
                                <input type="file" name="max_img">
                                <a href="">
                                    <button class="btn btn-danger deleteBTN2" value="{{ $pro->id }}">
                                        Delete
                                    </button>
                                </a>

                            </div>
                        </div>

                        <br>

                        @endforeach
                        <button type="submit" class="btn btn-success ">تعديل صور المنتج</button>
                    </form>
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

<script>
    $(document).ready(function()
        {
            $('.deleteBTN1').on('click',function(e)
            {
                e.preventDefault();
                // alert($(this).attr('value'));

                var imgId = $(this).attr('value');

                if(imgId)
                 {
                     $.ajax(
                         {
                             url:"{{ url('/admin/deleteImgColor/product/') }}/" + imgId,
                             type:"GET",
                             dataType:"json",
                             success:function(data)
                             {
                                if (data.status == true)
                                {
                                    data.msg.show();

                                }
                             }
                         });
                 }else
                 {
                     alert('Error');
                 }

            });
        });
</script>


<script>
    $(document).ready(function()
        {
            $('.deleteBTN2').on('click',function(e)
            {
                e.preventDefault();

                var imgId = $(this).attr('value');

                if(imgId)
                 {
                     $.ajax(
                         {
                             url:"{{ url('/admin/deleteImgWork/product/') }}/" + imgId,
                             type:"GET",
                             dataType:"json",
                             success:function(data)
                             {
                                if (data.status == true)
                                {
                                    data.msg.show();

                                }
                             }
                         });
                 }else
                 {
                     alert('Error');
                 }

            });
        });
</script>
@endsection

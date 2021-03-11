@extends('admin.layouts.master')
@section('css')
@toastr_css
@section('title')
سلايدر صفحه المنتجات
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
اضافه سلايدر
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

                <button type="button" class="button x-small" data-toggle="modal" data-target="#exampleModal">
                    اضافه سلايدر صفحه المنتجات
                </button>
                <br><br>

                <div class="table-responsive">
                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                        style="text-align: center">
                        <thead>
                            <tr>
                                <th>#</th>

                                <th> سلايدر صفحه المنتجات</th>
                                <th>الوصف</th>
                                <th>تاريخ الاضافه</th>
                                <th>الاجرائات</th>



                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 0; ?>
                            @foreach ($productsliders as $slider)
                            <tr>
                                <?php $i++; ?>
                                <td>{{ $i }}</td>
                                <td><img class="img-responsive mb-1"
                                        src="{{ asset('admin/img/productslider/' . $slider->image )}}"
                                        style="height:150px"></td>

                                <td>{{ $slider->description }}</td>

                                <td>{{ \Carbon\Carbon::parse($slider->created_at)->diffForhumans() }}</td>

                                <td>
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                        data-target="#edit{{ $slider->id }}" title="{{ trans('Grades_trans.Edit') }}"><i
                                            class="fa fa-edit"></i></button>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                        data-target="#delete{{ $slider->id }}"
                                        title="{{ trans('Grades_trans.Delete') }}"><i class="fa fa-trash"></i></button>
                                </td>
                            </tr>

                            <!-- edit_modal_Grade -->
                            <div class="modal fade" id="edit{{ $slider->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                id="exampleModalLabel">
                                                تعديل سلايدر المنتجات
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- add_form -->
                                            <form action="{{ route('pro_slider_update','test') }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                @method('patch')


                                                <input type="hidden" name="slider_id" value="{{ $slider->id }}">
                                                <div class="row">

                                                    <div class="col">


                                                        <label class="form-control" for="Name_en" class="mr-sm-2">اضافه
                                                            سلايدر المنتجات
                                                            :</label>

                                                        <img class="img-responsive mb-1"
                                                            src="{{ asset('admin/img/productslider/' . $slider->image )}}"
                                                            style="height:150px">
                                                        <input type="file" class="form-control" name="slider_img"
                                                            required>


                                                    </div>

                                                </div>

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <label class="form-control" for="Name_en" class="mr-sm-2">ادخل
                                                            الوصف بالعربيه
                                                            :</label>
                                                        <textarea class="form-control" name="description_ar" id=""
                                                            cols="10" rows="10"
                                                            required>{{$slider->getTranslation('description','ar')}}</textarea>

                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <label class="form-control" for="Name_en" class="mr-sm-2">ادخل
                                                            الوصف بالانجليزيه
                                                            :</label>
                                                        <textarea class="form-control" name="description_en" id=""
                                                            cols="10" rows="10"
                                                            required>{{$slider->getTranslation('description','en')}}</textarea>
                                                    </div>
                                                </div>

                                                <br><br>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">غلق</button>
                                            <button type="submit" class="btn btn-success">اضافه قسم</button>
                                        </div>
                                        </form>

                                    </div>
                                </div>
                            </div>

                            <!-- delete_modal_Grade -->
                            <div class="modal fade" id="delete{{ $slider->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                id="exampleModalLabel">
                                                حذف القسم
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('pro_slider_delete', 'test') }}" method="post">
                                                {{ method_field('Delete') }}
                                                @csrf
                                                {{ trans('Grades_trans.Warning_Grade') }}
                                                <input id="id" type="hidden" name="slider_id" class="form-control"
                                                    value="{{ $slider->id }}">
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">{{ trans('Grades_trans.Close') }}</button>
                                                    <button type="submit"
                                                        class="btn btn-danger">{{ trans('Grades_trans.submit') }}</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>


    <!-- add_modal_Grade -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                        اضافه سلايدر المنتجات
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- add_form -->
                    <form action="{{ route('pro_slider_add') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">

                            <div class="col">
                                <label for="Name_en" class="mr-sm-2">اضافه سلايدر المنتجات
                                    :</label>
                                <input type="file" class="form-control" name="slider_img" required>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <label class="form-control" for="Name_en" class="mr-sm-2">ادخل الوصف بالعربيه
                                    :</label>
                                <textarea class="form-control" name="description_ar" id="" cols="10" rows="10"
                                    required></textarea>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <label class="form-control" for="Name_en" class="mr-sm-2">ادخل الوصف بالانجليزيه
                                    :</label>
                                <textarea class="form-control" name="description_en" id="" cols="10" rows="10"
                                    required></textarea>
                            </div>
                        </div>

                        <br><br>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">غلق</button>
                    <button type="submit" class="btn btn-success">اضافه قسم</button>
                </div>
                </form>

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

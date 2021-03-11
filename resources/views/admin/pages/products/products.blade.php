@extends('admin.layouts.master')
@section('css')
@toastr_css
@section('title')
الاقسام
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
اضافه منتجات للاقسام
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


                <a href="{{ route('products.create') }}" class="button x-small">

                    اضافه منتج
                </a>

                <br><br>

                <div class="table-responsive">
                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                        style="text-align: center">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>اسم المنتج بالعربيه</th>
                                <th>اسم المنتج بالانجليزيه</th>
                                <th> قسم المنتج</th>
                                <th>كود المنتج</th>
                                <th>لون المنتج</th>
                                <th>تفاصيل المنتج</th>

                                <th> تاريخ الاضافه</th>

                                <th>الاجراءات</th>

                            </tr>
                        </thead>
                        <tbody>

                            <?php $i = 0; ?>

                            @if ($products)


                            @foreach ($products as $product)


                            <tr>
                                <?php $i++; ?>
                                <td>{{ $i }}</td>


                                <td>{{$product->getTranslation('name','ar')}}</td>
                                <td>{{$product->getTranslation('name','en')}}</td>
                                <td>{{$product->categories->pluck('name')->implode(',')}}</td>

                                <td>{{$product->productImage->pluck('code_img')->implode(',')}}</td>

                                <td>{{$product->productImage->pluck('color_name')->implode(',')}}</td>


                                <td>
                                    <a href="{{ route('all_ProductImg',$product->id) }}"
                                        class="btn btn-outline-info x-small btn-sml">

                                        صور المنتج
                                    </a>
                                </td>




                                <td>{{ \Carbon\Carbon::parse($product->created_at)->diffForhumans() }}</td>

                                <td>
                                    <a href="{{ route('products.edit',$product->id) }}" type="button"
                                        class="btn btn-info btn-sm" title="{{ trans('Grades_trans.Edit') }}"><i
                                            class="fa fa-edit"></i></a>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                        data-target="#delete{{ $product->id }}"
                                        title="{{ trans('Grades_trans.Delete') }}"><i class="fa fa-trash"></i></button>
                                </td>
                            </tr>

                            <!-- delete_modal_Grade -->
                            <div class="modal fade" id="delete{{ $product->id }}" tabindex="-1" role="dialog"
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
                                            <form action="{{ route('deleteAll','test') }}" method="post">
                                                {{ method_field('Delete') }}
                                                @csrf
                                                {{ trans('Grades_trans.Warning_Grade') }}
                                                <input type="hidden" name="product_id" class="form-control"
                                                    value="{{ $product->id }}">
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">{{ trans('Grades_trans.Close') }}</button>
                                                    <button type="submit" class="btn btn-danger">حذف البيانات</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @endif

                        </tbody>
                </div>




                {{-- @endforeach --}}

                </table>
            </div>
        </div>
    </div>
</div>


<!-- add_modal_Grade -->
{{-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                    اضافه قسم جديد
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- add_form -->
                <form action="{{ route('products.store') }}" method="POST">
@csrf
<div class="row">
    <div class="col">
        <label for="Name" class="mr-sm-2">ادخل اسم المنتح بالعربيه
            :</label>
        <input type="text" name="name_ar" class="form-control" required>
    </div>
    <div class="col">
        <label for="Name_en" class="mr-sm-2">ادخل اسم المنتح بالانجليزيه
            :</label>
        <input type="text" class="form-control" name="name_en" required>
    </div>
    <div class="col-md-12">
        <label>اختر قسم المنتج :</label>
        <select name="category_id" class="form-control" id="" required style="height: 55px;">
            <option value="" disabled selected>--اخترقسم المنتج--</option>
            @foreach ($categories as $category)
            <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-4">
        <label>اختر لون المنتج :</label>
        <select name="color_id" class="form-control" id="" required style="height: 38px;
                          padding: 0; ">
            <option value="" disabled selected>-اختر لون المنتج-</option>
            @foreach ($colors as $color)
            <option value="{{$color->id}}">{{$color->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-4">
        <label> كود المنتج</label>
        <input type="number" class="form-control" name="code" required>
    </div>
    <div class="col-md-4">
        <label>صوره المننج</label>
        <input type="file">
    </div>
    <div class="col-md-4">
        <label>صوره العمل</label>
        <input type="file">
    </div>
    <div class="col-md-4">
        <button type="button" class="btn btn-secondary btn-sml btn-block" data-dismiss="modal">حفظ</button>
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
</div> --}}

</div>

<!-- row closed -->
@endsection
@section('js')
@toastr_js
@toastr_render
@endsection

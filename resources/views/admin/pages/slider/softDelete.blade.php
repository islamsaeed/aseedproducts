@extends('admin.layouts.master')
@section('css')
    @toastr_css
@section('title')
    بيانات الشركة المحزوفة
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    {{trans('main_trans.Grades')}}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">

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



                    <div class="table-responsive">
                        <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                               data-page-length="50"
                               style="text-align: center">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>الصورة</th>
                                <th>الوصف بالعربي</th>
                                <th>الوصف بالانجليزية</th>
                                <th>الاجرائات</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i = 0; ?>
                            @foreach ($slider as $value)
                                <tr>
                                    <?php $i++; ?>
                                    <td>{{ $i }}</td>
                                    <td>{{ $value->getTranslation('descreption','ar') }}</td>
                                    <td>{{ $value->getTranslation('descreption','en') }}</td>
                                    <td style="height: 50px; width: 50px;">
                                        <img src="{{ asset('assets/images/'.$value->logo) }}" alt="">
                                    </td>
                                    <td>

                                       <div class="row">
                                           <div class="col-sm-3">
                                            <form action="{{ route('slider.restore',$value->id) }}" method="post">
                                                @csrf

                                                <input type="submit" value="Restore" class="btn btn-info btn-sm">


                                            </form>
                                           </div>

                                           <div class="col-sm-3">
                                            <form action="{{ route('slider.forceDelete',$value->id) }}" method="post">
                                                @csrf

                                                <input type="submit" value="Delete" class="btn btn-danger btn-sm">
                                            </form>
                                           </div>
                                       </div>

                                    </td>
                                </tr>
                            @endforeach
                        </table>
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

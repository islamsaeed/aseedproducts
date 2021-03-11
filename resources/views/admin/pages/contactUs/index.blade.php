@extends('admin.layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{ trans('Grades_trans.title_page') }}
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

                    <button type="button" class="button x-small" data-toggle="modal" data-target="#exampleModal">
                       اضافة تفاصيل للتواصل
                    </button>
                    <br><br>

                    <div class="table-responsive">
                        <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                               data-page-length="50"
                               style="text-align: center">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>الدولة بالعربي</th>
                                <th>الدولة بالانجليزية</th>
                                <th>المدينة بالعربي</th>
                                <th>المدينة بالانجليزية</th>
                                <th>العنوان بالعربي</th>
                                <th>العنوان بالانجليزية</th>
                                <th> رقم الهاتف المحمول الاول</th>
                                <th> رقم الهاتف المحمول الثاني</th>
                                <th>رقم الهاتف</th>
                                <th>رقم الواتس اب</th>
                                <th>الاجرائات</th>
                            </tr>
                            </thead>
                            <tbody>
                           @if ($contactUs && $contactUs->count() > 0)
                                <?php $i = 0; ?>
                                @foreach ($contactUs as $value)
                                    <tr>
                                        <?php $i++; ?>
                                        <td>{{ $i }}</td>
                                        <td>{{ $value->getTranslation('Country','ar') }}</td>
                                        <td>{{ $value->getTranslation('Country','en') }}</td>
                                        <td>{{ $value->getTranslation('city','ar') }}</td>
                                        <td>{{ $value->getTranslation('city','en') }}</td>
                                        <td>{{ $value->getTranslation('adress','ar') }}</td>
                                        <td>{{ $value->getTranslation('adress','en') }}</td>
                                        <td>{{ $value->phone_number }}</td>
                                        <td>{{ $value->mobile_number1 }}</td>
                                        <td>{{ $value->mobile_number2 }}</td>
                                        <td>{{ $value->whatsApp_number }}</td>

                                        <td>
                                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                                    data-target="#edit{{ $value->id }}"
                                                    title="{{ trans('Grades_trans.Edit') }}"><i
                                                    class="fa fa-edit"></i>
                                            </button>
                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                    data-target="#delete{{ $value->id }}"
                                                    title="{{ trans('Grades_trans.Delete') }}"><i
                                                    class="fa fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>

                                    @include('admin.pages.contactUs.edit')
                                    @include('admin.pages.contactUs.delete')




                                @endforeach
                            @else
                            <h3 class="text-center">
                                لا يوجد بيانات
                            </h3>
                           @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>


        @include('admin.pages.contactUs.create')

    </div>

    <!-- row closed -->
@endsection
@section('js')
    @toastr_js
    @toastr_render
@endsection

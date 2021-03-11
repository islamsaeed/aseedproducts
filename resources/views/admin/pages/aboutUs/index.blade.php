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

                   @if ($aboutUs->count() < 2)
                    <button type="button" class="button x-small" data-toggle="modal" data-target="#exampleModal">
                        اضافة وصف
                    </button>
                   @endif
                    <br><br>

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
                            @foreach ($aboutUs as $value)
                                <tr>
                                    <?php $i++; ?>
                                    <td>{{ $i }}</td>
                                    <td>{{ $value->getTranslation('descreption','ar') }}</td>
                                    <td>{{ $value->getTranslation('descreption','en') }}</td>

                                    <td style="height: 50px; width: 50px;">
                                        <img src="{{ asset('assets/images/'.$value->logo) }}" alt="">
                                    </td>
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

                              @include('admin.pages.aboutUs.edit')
                              @include('admin.pages.aboutUs.delete')




                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>


        @include('admin.pages.aboutUs.create')

    </div>

    <!-- row closed -->
@endsection
@section('js')
    @toastr_js
    @toastr_render
@endsection

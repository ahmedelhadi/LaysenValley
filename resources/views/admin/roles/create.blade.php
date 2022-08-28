@extends('layouts.admin')

@section('content')

<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>

    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">{{trans('admin.roles')}}</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin.admin.index')}}">{{trans('admin.home')}}</a>
                                </li>
                                <li class="breadcrumb-item active">{{trans('admin.roles')}}
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-header-right text-md-end col-md-3 col-12 d-md-block d-none">
                <div class="mb-1 breadcrumb-right">
                    @can('roles create')
                    <a class="btn btn-primary" href="{{ route('admin.roles.create') }}">{{ trans('admin.create') }}</a>
                    @endcan


                    @if(Request::has('trashed'))
                        <a class="btn btn-secondary" href="{{ route('admin.roles.index') }}">{{ trans('admin.items') }}</a>
                    @else
                        @can('roles forceDelete')
                        <a class="btn btn-secondary" href="{{ route('admin.roles.index') }}?trashed">{{ trans('admin.deleted_items') }}</a>
                        @endcan
                    @endif
                </div>
            </div>
        </div>
        <div class="content-body">
            <div class="row" id="basic-table">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">{{trans('admin.roles')}}</h4>
                        </div>

                        <div class="card-body">


                        @if (Session::has('message'))
                        <div class="p-1">
                            <div class="alert alert-{{ Session::get('status') }}" role="alert">
                                <div class="alert-body">
                                    {{ Session::get('message') }}
                                </div>
                            </div>
                        </div>
                        @endif


                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <div class="alert-body">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                </div>
                            </div>
                        @endif


                        {!! Form::open(['route' => 'admin.roles.store', 'method' => 'POST']) !!}
                        <div class="row">
                            <div class="mb-2">
                                {!! Form::label('title', trans('admin.title') , ['class' => 'form-label'] ) !!}

                                {!! Form::text('name', null, ['placeholder' => trans('admin.title'), 'class' => 'form-control']) !!}
                            </div>
                            <div class="mb-2">
                                {!! Form::label('title', trans('admin.permissions') , ['class' => 'form-label'] ) !!}

                                <div class="row">
                                    @foreach ($permissions as $value)
                                        <div class="col-12 col-sm-3 mb-2">
                                            <label>{{ Form::checkbox('permissions[]', $value->id, false, ['class' => 'name']) }}
                                            

                                                {{ Str::of($value->name)->swap([
                                                        'view' => 'مشاهدة',
                                                        'create' => 'إنشاء',
                                                        'edit' => 'تعديل',
                                                        'delete' => 'حذف',
                                                        'forceDelete' => 'حذف فعلي',
                                                        'restore' => 'إرجاع',
                                                        'admin' => 'الإدارة - ',
                                                        'profile' => 'الملف الشخصي -',
                                                        'language' => 'اللغة  -',
                                                        'forms' => 'النماذج  -',
                                                        'fields' => 'الحقول  -',
                                                        'partners' => 'الجهات  -',
                                                        'projects' => 'المشاريع  -',
                                                        'dnas' => 'dnas  -',
                                                        'flags' => 'التعقيبات  -',
                                                        'pages' => 'الصفحات  -',
                                                        'settings' => 'الإعدادات  -',
                                                        'statuses' => 'الحالات  -',
                                                        'users' => 'الاعضاء  -',
                                                        'subjects' => 'المجالات  -',
                                                        'levels' => 'المستويات  -',
                                                        'types' => 'انواع المعلومة  -',
                                                        'kinds' => 'أنواع الجهات  -',
                                                        'objectives' => 'الاهداف التعليمية  -',
                                                        'dna-types' => 'انواع DNA  -',
                                                        'beneficiaries' => 'الفئات المستفيدة  -',
                                                        'hints' => 'التعليمات  -',
                                                        'covers' => 'الفئات التعليمية المستفيدة  -',
                                                        'domains' => 'نطاقات المشروع  -',
                                                        'rubrics' => 'المعايير  -',
                                                        'ideatypes' => 'انواع افكار DNA   -',
                                                        'referencetypes' => 'انواع المراجع  -',
                                                        'design-levels' => 'مستويات التصميم  -',
                                                        'objective-levels' => 'مستويات الاهداف التعليمية  -',
                                                        'inquiries' => 'الاستفسارات  -',
                                                        'replays' => 'تعليقات المساحات  -',
                                                        'roles' => 'الصلاحيات  -',
                                                        'notifications' => 'التنبيهات  -',
                                                    ])
                                                }}

                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">{{trans('admin.create')}}</button>
                            </div>
                        </div>
                        {!! Form::close() !!}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
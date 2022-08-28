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
                        <h2 class="content-header-title float-start mb-0">{{trans('admin.permissions')}}</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin.admin.index')}}">{{trans('admin.home')}}</a>
                                </li>
                                <li class="breadcrumb-item active">{{trans('admin.permissions')}}
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

                </div>
            </div>
        </div>
        <div class="content-body">
            <div class="row" id="basic-table">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">{{trans('admin.permissions')}}</h4>
                        </div>


                        @if (Session::has('message'))
                        <div class="p-1">
                            <div class="alert alert-{{ Session::get('status') }}" role="alert">
                                <div class="alert-body">
                                    {{ Session::get('message') }}
                                </div>
                            </div>
                        </div>
                        @endif

                            <div class="container">
                                <div class="col-12 mb-3">
                                    <input class="form-control" type="text" id="search" placeholder="{{trans('admin.search')}}" />
                                </div>
                            </div>

                            {!! Form::open(['route' => 'admin.roles.massiveUpdate', 'method' => 'POST']) !!}


                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>{{ trans('admin.role') }}</th>

                                                @foreach ($roles as $key => $role)
                                                <th>

                                                {{ Str::of($role->name)->swap([
                                                        'Project Coordinator' => 'منسق مشاريع',
                                                        'Project Manager' => 'مدير مشاريع',

                                                        'NLEC Manager' => 'مدير المركز',

                                                        'Admin' => 'الإدارة',
                                                    ])
                                                }}


                                                @endforeach
                                            </tr>
                                        </thead>



                                        @foreach ($permissions as $key => $permission)
                                            <tr>
                                                <td>
                                                {{ Str::of($permission->name)->swap([
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



                                                </td>
                                                @foreach ($roles as $key => $role)
                                                <td>


                                                    <label>{{ Form::checkbox('permissions['.$role->id.'][]', $permission->id,  in_array($permission->id, $role->permissions->pluck('id')->toArray()) ? true : false, ['class' => 'name']) }}

                                                        </label>


                                                </td>
                                                @endforeach
                                            </tr>
                                        @endforeach

                                    </table>
                                    <div class="m-2 col-12">
                                        <button type="submit" class="btn btn-primary">{{ trans('admin.submit') }} </button>
                                    </div>
                            {!! Form::close() !!}






                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

@section('jquery')

    <script type="text/javascript">
        $("#search").keyup(function () {
            var value = this.value.toLowerCase().trim();

            $("table tr").each(function (index) {
                if (!index) return;
                $(this).find("td").each(function () {
                    var id = $(this).text().toLowerCase().trim();
                    var not_found = (id.indexOf(value) == -1);
                    $(this).closest('tr').toggle(!not_found);
                    return not_found;
                });
            });
        });    
    </script>

@endsection
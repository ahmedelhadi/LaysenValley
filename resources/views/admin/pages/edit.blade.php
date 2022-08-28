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
                        <h2 class="content-header-title float-start mb-0">{{trans('admin.pages')}}</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin.admin.index')}}">{{trans('admin.home')}}</a>
                                </li>
                                <li class="breadcrumb-item active">{{trans('admin.pages')}}
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-header-right text-md-end col-md-3 col-12 d-md-block d-none">
                <div class="mb-1 breadcrumb-right">
                    @can('pages create')
                    <a class="btn btn-primary" href="{{ route('admin.pages.create') }}">{{ trans('admin.create') }}</a>
                    @endcan
                </div>
            </div>
        </div>
        <div class="content-body">

            <section id="basic-horizontal-layouts">
                <div class="row">
                    <div class="col-md-12 col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">{{trans('admin.pages')}}</h4>
                            </div>
                            <div class="card-body">


                                {{ Form::model($page, ['route' => ['admin.pages.update', $page->id], 'method' => 'PUT', 'files' => true]) }}



                                @include('admin.pages.parts._fields')

                                <div class="form-group">
                                    {!! Form::submit(trans('admin.save'), ['class' => 'btn btn-primary']) !!}
                                </div>


                                {{ Form::close() }}

                            </div>
                        </div>

                    </div>
                </div>
            </section>
        </div>
    </div>
</div>

@endsection

@section('jquery')
<script type="text/javascript">
    $(document).ready(function() {

        tinymce.init({
            selector: ".ckeditor",
            height: 200,
            //menubar: true,
            toolbar_items_size: 'small',
            directionality : 'rtl',
            language: 'ar',

              plugins: 'print preview paste importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern noneditable help charmap quickbars emoticons',
              imagetools_cors_hosts: ['picsum.photos'],
              menubar: 'file edit view insert format tools table help',
              toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media template link anchor codesample | ltr rtl',
              toolbar_sticky: true,
              autosave_ask_before_unload: true,
              autosave_interval: '30s',
              autosave_prefix: '{path}{query}-{id}-',
              autosave_restore_when_empty: false,
              autosave_retention: '2m',
              image_advtab: true,

        });
    });
</script>
@endsection
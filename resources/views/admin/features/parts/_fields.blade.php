

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


<div class="mb-2">
    {!! Form::label('title-ar', trans('admin.title') , ['class' => 'form-label'] ) !!}
    {!! Form::text('title['.App::getLocale().']', $feature->title[App::getLocale()] ?? '', ['required', 'class' => 'form-control', 'autocomplete' => 'off', 'id' => 'title_ar']) !!}

</div>

<div class="mb-2">
    {!! Form::label('sub_title-ar', trans('admin.title') , ['class' => 'form-label'] ) !!}
    {!! Form::text('sub_title['.App::getLocale().']', $feature->sub_title[App::getLocale()] ?? '', ['required', 'class' => 'form-control', 'autocomplete' => 'off', 'id' => 'title_ar']) !!}
</div>


<div class="mb-2">

    {!! Form::label('desc-ar' , trans('admin.desc')  , ['class' => 'form-label']) !!}
    {!! Form::textarea('desc['.App::getLocale().']', $feature->desc[App::getLocale()]  ?? '' , [ 'class' => 'textarea form-control ckeditor', 'id' => 'ckeditor', 'placeholder' => trans('admin.desc'), 'rows' => 5 ]) !!}
</div>

{{--

<ul class="nav nav-tabs" id="myPillTab" role="tablist">

    @foreach (Config::get('languages') as $lang => $language)
        <li class="nav-item">
            <a class="nav-link @if ($lang==App::getLocale()) active show @endif" id="{{ $lang }}-tab" data-bs-toggle="tab" href="#{{ $lang }}" aria-controls="{{ $lang }}" role="tab" aria-selected="false">{{ $language }}</a>
        </li>
    @endforeach

</ul>
<div class="tab-content  mt-2" id="myPillTabContent">


    @foreach (Config::get('languages') as $lang => $language)

        <div class="tab-pane @if ($lang==App::getLocale()) fade active show @endif" id="{{ $lang }}" aria-labelledby="{{ $lang }}-tab" role="tabpanel">

            <div class="mb-2">
                {!! Form::label('title-' . $lang, trans('admin.title') . ' - ' . $language, ['class' => 'form-label'] ) !!}
                {!! Form::text('title[' . $lang . ']', $feature->title[$lang] ?? '', ['required', 'class' => 'form-control', 'autocomplete' => 'off', 'id' => 'title_' . $lang]) !!}
            </div>


            <div class="mb-2">
                {!! Form::label('desc-' . $lang, trans('admin.body') . ' - ' . $language , ['class' => 'form-label']) !!}
                {!! Form::textarea('desc[' . $lang . ']', $feature->desc[$lang] ?? '' , [ 'class' => 'textarea form-control ckeditor', 'id' => 'ckeditor', 'placeholder' => trans('admin.desc'), 'rows' => 5 ]) !!}
            </div>

        </div>


    @endforeach

</div>
--}}

<div class="mb-2">
    {!! Form::label('image', trans('admin.image') , ['class' => 'form-label'] ) !!}
    @if(isset($feature->image))
        <div class="row">
            <div class="col-1">
                <a href="" data-bs-toggle="modal" data-bs-target="#image">
                    <img src="{{ url($feature->image) }}" class="img-fluid rounded-lg">
                </a>

                @include('admin.parts.modal',['id' => 'image','url' => url($feature->image) ])

                
            </div>
            <div class="col-11">
                {!! Form::file('image', ['id' => 'inputGroupFile01', 'class' => 'form-control']) !!}

            </div>
        </div> 

    @else 
        {!! Form::file('image', ['id' => 'inputGroupFile01', 'class' => 'form-control']) !!}
    @endif
</div>

<div class="mb-2">
    {!! Form::label('icon', trans('admin.icon') , ['class' => 'form-label'] ) !!}
    @if(isset($feature->icon))
        <div class="row">
            <div class="col-1">
                <a href="" data-bs-toggle="modal" data-bs-target="#icon">
                    <img src="{{ url($feature->icon) }}" class="img-fluid rounded-lg">
                </a>

                @include('admin.parts.modal',['id' => 'icon','url' => url($feature->icon) ])

                
            </div>
            <div class="col-11">
                {!! Form::file('icon', ['id' => 'inputGroupFile01', 'class' => 'form-control']) !!}

            </div>
        </div> 

    @else 
        {!! Form::file('icon', ['id' => 'inputGroupFile01', 'class' => 'form-control']) !!}
    @endif
</div>



<div class="mb-2">
    {!! Form::label('page_id', trans('admin.page') , ['class' => 'form-label'] ) !!}
    {!! Form::select('page_id', $pages->pluck('title.'.App::getLocale(),'id'), $cover->page_id ?? Request::get('page_id'), ['required', 'class' => 'form-control','placeholder'=>trans('admin.choose')]) !!}
</div>


<div class="mb-2">
    {!! Form::label('sort', trans('admin.sort') , ['class' => 'form-label'] ) !!}
    {!! Form::text('sort', $feature->sort ?? 1, ['required', 'class' => 'form-control']) !!}
</div>






<div class="mb-2">
    {!! Form::label('is_active', trans('admin.status') , ['class' => 'form-label'] ) !!}
    {!! Form::select('is_active', ['1' => trans('admin.yes'), '0' => trans('admin.no')], $feature->is_active ?? 1, ['required', 'class' => 'form-control']) !!}
</div>

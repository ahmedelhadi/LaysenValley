

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
    {!! Form::text('title[ar]', $status->title['ar'] ?? '', ['required', 'class' => 'form-control', 'autocomplete' => 'off', 'id' => 'title_ar']) !!}
</div>

<div class="mb-2">
    {!! Form::label('desc-ar' , trans('admin.desc')  , ['class' => 'form-label']) !!}
    {!! Form::textarea('desc[ar]', $status->desc['ar']  ?? '' , [ 'class' => 'textarea form-control ckeditor', 'id' => 'ckeditor', 'placeholder' => trans('admin.desc'), 'rows' => 5 ]) !!}
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
                {!! Form::text('title[' . $lang . ']', $status->title[$lang] ?? '', ['required', 'class' => 'form-control', 'autocomplete' => 'off', 'id' => 'title_' . $lang]) !!}
            </div>


            <div class="mb-2">
                {!! Form::label('desc-' . $lang, trans('admin.desc') . ' - ' . $language , ['class' => 'form-label']) !!}
                {!! Form::textarea('desc[' . $lang . ']', $status->desc[$lang] ?? '' , ['required', 'class' => 'textarea form-control ckeditor', 'id' => 'ckeditor', 'placeholder' => trans('admin.desc'), 'rows' => 5 ]) !!}
            </div>

        </div>


    @endforeach

</div>
--}}

<div class="mb-2">
    {!! Form::label('image', trans('admin.image') , ['class' => 'form-label'] ) !!}
    @if(isset($status->image))
        <div class="row">
            <div class="col-1">
                <a href="" data-bs-toggle="modal" data-bs-target="#image">
                    <img src="{{ url($status->image) }}" class="img-fluid rounded-lg">
                </a>

                @include('admin.parts.modal',['id' => 'image','url' => url($status->image) ])

                
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
    {!! Form::label('color', trans('admin.color') , ['class' => 'form-label'] ) !!}
    {!! Form::color('color', $status->color ?? '', ['required', 'class' => 'form-control']) !!}
</div>

<div class="mb-2">
    {!! Form::label('type', trans('admin.type') , ['class' => 'form-label'] ) !!}
    {!! Form::select('type', ['step' => trans('admin.step') , 'project' => trans('admin.project')], $status->type ?? '', ['required', 'class' => 'form-control']) !!}
</div>


<div class="mb-2">
    {!! Form::label('sort', trans('admin.sort') , ['class' => 'form-label'] ) !!}
    {!! Form::text('sort', $status->sort ?? '', ['required', 'class' => 'form-control']) !!}
</div>

<div class="mb-2">
    {!! Form::label('is_active', trans('admin.status') , ['class' => 'form-label'] ) !!}
    {!! Form::select('is_active', ['1' => trans('admin.yes'), '0' => trans('admin.no')], $status->is_active ?? '', ['required', 'class' => 'form-control']) !!}
</div>

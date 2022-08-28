

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
    {!! Form::label('fname', trans('admin.fname') , ['class' => 'form-label'] ) !!}
    {!! Form::text('fname', $inquiry->fname ?? '', ['required', 'class' => 'form-control', 'autocomplete' => 'off', 'id' => 'title_ar']) !!}
</div>

<div class="mb-2">
    {!! Form::label('lname', trans('admin.lname') , ['class' => 'form-label'] ) !!}
    {!! Form::text('lname', $inquiry->lname ?? '', ['required', 'class' => 'form-control', 'autocomplete' => 'off', 'id' => 'title_ar']) !!}
</div>


<div class="mb-2">
    {!! Form::label('email', trans('admin.email') , ['class' => 'form-label'] ) !!}
    {!! Form::email('email', $inquiry->email ?? '', ['required', 'class' => 'form-control', 'autocomplete' => 'off', 'id' => 'title_ar']) !!}
</div>

<div class="mb-2">
    {!! Form::label('phone', trans('admin.phone') , ['class' => 'form-label'] ) !!}
    {!! Form::text('phone', $inquiry->phone ?? '', ['required', 'class' => 'form-control', 'autocomplete' => 'off', 'id' => 'title_ar']) !!}
</div>


<div class="mb-2">
    {!! Form::label('body', trans('admin.body') , ['class' => 'form-label'] ) !!}
    {!! Form::textarea('body', $inquiry->body ?? '', ['required', 'class' => 'form-control', 'autocomplete' => 'off', 'id' => 'title_ar']) !!}
</div>


<div class="mb-2">
    {!! Form::label('is_active', trans('admin.status') , ['class' => 'form-label'] ) !!}
    {!! Form::select('is_active', ['1' => trans('admin.yes'), '0' => trans('admin.no')], $inquiry->is_active ?? 1, ['required', 'class' => 'form-control']) !!}
</div>
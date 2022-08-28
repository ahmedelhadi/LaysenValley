

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
    {!! Form::label('name', trans('admin.name') , ['class' => 'form-label'] ) !!}
    {!! Form::text('name', $order->name ?? '', ['required', 'class' => 'form-control', 'autocomplete' => 'off', 'id' => 'title_ar']) !!}
</div>

<div class="mb-2">
    {!! Form::label('company', trans('admin.company') , ['class' => 'form-label'] ) !!}
    {!! Form::text('company', $order->company ?? '', ['required', 'class' => 'form-control', 'autocomplete' => 'off', 'id' => 'title_ar']) !!}
</div>

<div class="mb-2">
    {!! Form::label('email', trans('admin.email') , ['class' => 'form-label'] ) !!}
    {!! Form::email('email', $order->email ?? '', ['required', 'class' => 'form-control', 'autocomplete' => 'off', 'id' => 'title_ar']) !!}
</div>

<div class="mb-2">
    {!! Form::label('mobile', trans('admin.mobile') , ['class' => 'form-label'] ) !!}
    {!! Form::text('mobile', $order->mobile ?? '', ['required', 'class' => 'form-control', 'autocomplete' => 'off', 'id' => 'title_ar']) !!}
</div>

<div class="mb-2">
    {!! Form::label('body', trans('admin.body') , ['class' => 'form-label'] ) !!}
    {!! Form::textarea('body', $order->body ?? '', ['required', 'class' => 'form-control', 'autocomplete' => 'off', 'id' => 'title_ar']) !!}
</div>


<div class="mb-2">
    {!! Form::label('start_date', trans('admin.start_date') , ['class' => 'form-label'] ) !!}
    {!! Form::text('start_date', $order->start_date ?? '', [ 'class' => 'form-control datepicker','id' => 'start_date']) !!}
</div>


<div class="mb-2">
    {!! Form::label('end_date', trans('admin.end_date') , ['class' => 'form-label'] ) !!}
    {!! Form::text('end_date', $order->end_date ?? '', ['class' => 'form-control datepicker', 'id' => 'end_date']) !!}
</div>

<div class="mb-2">
    {!! Form::label('is_active', trans('admin.status') , ['class' => 'form-label'] ) !!}
    {!! Form::select('is_active', ['1' => trans('admin.yes'), '0' => trans('admin.no')], $order->is_active ?? 1, ['required', 'class' => 'form-control']) !!}
</div>

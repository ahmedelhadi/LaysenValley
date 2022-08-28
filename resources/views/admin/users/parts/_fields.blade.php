
<div class="mb-2">
    {!! Form::label('name_ar', trans('admin.name_ar') ,array('class'=>'form-label')) !!}
    {!! Form::text('name_ar', $user->name_ar  ?? '', array('placeholder' => trans('admin.name_ar'),'class' => 'form-control')) !!}
</div>


<div class="mb-2">
    {!! Form::label('name_en', trans('admin.name_en') ,array('class'=>'form-label')) !!}
    {!! Form::text('name_en', $user->name_en  ?? '', array('placeholder' => trans('admin.name_en'),'class' => 'form-control')) !!}
</div>



<div class="mb-2">
    {!! Form::label('email', trans('admin.email'),array('class'=>'form-label')) !!}
    {!! Form::text('email', $user->email ?? '', array('placeholder' => trans('admin.email'),'class' => 'form-control')) !!}
</div>


<div class="mb-2">
    {!! Form::label('mobile', trans('admin.mobile'),array('class'=>'form-label')) !!}
    {!! Form::text('mobile',  $user->mobile ?? '', array('placeholder' => trans('admin.mobile'),'class' => 'form-control')) !!}
</div>

<div class="mb-2">
    {!! Form::label('password', trans('admin.password'),array('class'=>'form-label')) !!}
    {!! Form::password('password', array('placeholder' => trans('admin.password'),'class' => 'form-control')) !!}
</div>
<div class="mb-2">
    {!! Form::label('confirm_password', trans('admin.confirm_password'),array('class'=>'form-label')) !!}
    {!! Form::password('password_confirmation', array('placeholder' => trans('admin.confirm_password'),'class' => 'form-control')) !!}
</div>



<div class="mb-2">
    {!! Form::label('avatar', trans('admin.avatar'),array('class'=>'form-label')) !!}
            {!! Form::file('avatar', array('id' =>'inputGroupFile01', 'class' => 'custom-file-input')) !!}
</div>

<div class="mb-2">
    {!! Form::label('roles', trans('admin.roles'),array('class'=>'form-label')) !!}

        <ul class="list-inline">
        @foreach ($roles as $key => $role)
            <li class="list-inline-item">
            <label>{{ Form::checkbox('roles[]', $role,  in_array($role, $user->getRoleNames()->toArray()) ? true : false, ['class' => 'name']) }} {{$role}}
            </label>

            </li>
        @endforeach
        </ul>
</div>

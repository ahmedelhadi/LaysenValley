<div>
    <div class="container h-75 ">
        {!! Form::open(['wire:submit.prevent' => 'SendInquiry', 'id' => 'myform']) !!}

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
    
        <div class="row ">

            <div class="col-12 col-sm-4">
                <div class="row g-2 align-items-center">
                    <div class="col-6">
                        <label for="fname" class="col-form-label text-uppercase">{{trans('file.fname')}}*</label>
                        <input type="text" wire:model="fname" id="fname" class="form-control" aria-describedby="fname">
                    </div>
                    <div class="col-6">
                        <label for="lname" class="col-form-label text-uppercase">{{trans('file.lname')}}*</label>
                        <input type="text"  wire:model="lname" id="lname" class="form-control" aria-describedby="lname">
                    </div>
                    <div class="col-12">

                        <label for="email" class="col-form-label text-uppercase">{{trans('file.email')}}*</label>
                        <input type="email"  wire:model="email" id="email" class="form-control" aria-describedby="email">
                    </div>
                    <div class="col-12">

                        <label for="phone" class="col-form-label text-uppercase">{{trans('file.phone')}}*</label>
                        <input type="text" wire:model="phone" id="phone" class="form-control" aria-describedby="phone">
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-8">
                <div class="col-12">

                    <label for="body" class="col-form-label text-uppercase">{{trans('file.body')}}</label>
                    <textarea class="form-control" wire:model="body" id="body" rows="8"></textarea>
                </div>
                <div class="col-12 mt-4">
                    {!! Form::submit(trans('file.submit'), ['class' => 'btn btn-secondary text-uppercase']) !!}
                </div>
            </div>

            {{ Form::close() }}

        </div>
    </div>

</div>


@push('scripts')


<script>
   
        window.addEventListener('new-action', event => {
            $('.modal').modal('hide');
            $('.modal-backdrop').remove();
            swal(event.detail.message, "", event.detail.status);
        });    

</script>
@endpush

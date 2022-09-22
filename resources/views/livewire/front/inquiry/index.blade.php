<div>
    <div class="mt-4">
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
    
        <div class="row">
            <div class="col-12 col-sm-10">
                <div class=" mb-3">
                    <input type="text" wire:model="fname" id="fname" class="form-control" aria-describedby="fname" placeholder="{{trans('file.fullname')}} *">
                </div>
                <div class=" mb-3">

                    <input type="email"  wire:model="email" id="email" class="form-control" aria-describedby="email" placeholder="{{trans('file.email')}} *">
                </div>
                <div class=" mb-3">

                    <input type="text" wire:model="phone" id="phone" class="form-control" aria-describedby="phone" placeholder="{{trans('file.phone')}} *">
                </div>

                <div class=" mb-3">

                    <textarea class="form-control" wire:model="body" id="body" rows="3" placeholder="{{trans('file.message')}} *"></textarea>
                </div>
                <div class=" mb-3">
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

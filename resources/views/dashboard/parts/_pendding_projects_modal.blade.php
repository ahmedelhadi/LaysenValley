<div>
    @if (Auth::user()->penddingProjects->count())
        <div class="modal fade" id="_pendding_projects" tabindex="-1" aria-hidden="true" wire:ignore.self>
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content  bg-white">

                    <div class="modal-header bg-transparent">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <i class="far fa-times"></i>
                        </button>
                    </div>

                    <div class="modal-body border-success">
                        <div class="modal-title">
                            {{ trans('admin.invitations') }}
                        </div>
                        <div class="col-md-12 p-3" wire:ignore.self>
                            <div class="table-responsive">
                                <table class="table table-borderless">
                                    <thead>
                                        <tr class="text-center bg-light">
                                            <th>{{ trans('admin.project_name') }}</th>
                                            <th>{{ trans('admin.partner') }}</th>
                                            <th>{{ trans('admin.date') }}</th>
                                            <th>{{ trans('admin.role') }}</th>
                                            <th>{{ trans('admin.dnas_count') }}</th>
                                            <th>{{ trans('admin.tbl_action') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach (Auth::user()->penddingProjects as $project)
                                            <tr class="text-center">
                                                <td> {{ $project->getTitle() }} </td>
                                                <td> {{ $project->partner->getTitle() }} </td>
                                                <td> {{ $project->pivot->type }} </td>
                                                <td> {{ Auth::user()->getPositionTitle($project->pivot->type) }}</td>
                                                <td> {{ count($project->dnas) }} </td>
                                                <td>

                                                    <a href="{{route('dashboard.invitations.index')}}"
                                                        class="btn btn-outline-primary">{{ trans('admin.details') }}</button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>


@push('scripts')
    <script>
        console.log('elmgdad');
        $(document).ready(function() {
            $('.modal').modal('show');
        });
    </script>
@endpush

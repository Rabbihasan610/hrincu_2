@extends('web.layouts.master', ['title' => 'Resume View'])
@section('content')
    <div class="row">
        <div class="pb-3 col-12 col-lg-12">
            <div class="dashboard-content-area bg-white card p-1">
                <div class="card-body">
                    <div class="table-responsive text-nowrap">
                        <h6 class="mb-3 mt-4">@lang('Resume View')
                            <a href="{{ route('user.upload.resume') }}" class="btn btn-primary float-end mb-2">
                                <i class="fa fa-plus"></i> @lang('Upload Resume')
                            </a>
                        </h6>
                        <table class="table ss table-hover table-responsive table-striped">
                            <thead class="text-light">
                                <tr>
                                    <th>@lang('Sl')</th>
                                    <th>@lang('Resume')</th>
                                    <th>@lang('Video Link')</th>
                                    <th>@lang('Created At')</th>
                                    <th>@lang('Edit')</th>
                                    <th>@lang('Delete')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($resumes as $res)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td class="d-flex align-items-start text-start justify-content-md-start">
                                            {{ $res->resume }}
                                            <button class="btn btn-primary btn-sm ms-2" data-bs-toggle="modal" data-bs-target="#ExternalResumeModal" data-id="{{ $res->id }}">
                                                <i class="fa-solid fa-file-pdf"></i>
                                            </button>
                                        </td>

                                        <td>{{ $res->video_link }}</td>
                                        <td>{{ Carbon\Carbon::parse($res->created_at)->diffForHumans() }}</td>
                                        <td>
                                            <a href="{{ route('user.external.resume.edit', $res->id) }}" class="btn btn-primary btn-sm">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <button class="btn btn-danger btn-sm confirmationBtn" data-question="@lang('Are you sure to delete this resume?')" data-action="{{ route('user.external.resume.delete', $res->id) }}    ">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6">
                                            <h6 class="text-center">@lang('No Active Jobs')</h6>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="ExternalResumeModal" tabindex="-1" aria-labelledby="ExternalResumeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ExternalResumeModalLabel">Resume Preview</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <embed src="" width="100%" height="500px" type="application/pdf">

                </div>
            </div>
        </div>
    </div>

    <x-confirmation-modal />
@endsection

@push('script')
    <script>
       $(document).ready(function () {
        $('#ExternalResumeModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var id = button.data('id');
            var modal = $(this);
            var embed = modal.find('embed');

            if (!id) {
                console.error('No ID provided for the resume preview.');
                return;
            }

            var url = "{{ route('user.external.resume.view', ':id') }}".replace(':id', id);

            $.ajax({
                type: "GET",
                url: url,
                success: function (res) {
                    embed.attr('src', res.url);
                },
                error: function (xhr, status, error) {
                    console.error('Error loading resume:', error);
                    embed.replaceWith('<p class="text-danger">Failed to load resume preview.</p>');
                }
            });
        });

        $('#ExternalResumeModal').on('hidden.bs.modal', function () {
            $(this).find('embed').attr('src', '');
        });
    });
</script>
@endpush

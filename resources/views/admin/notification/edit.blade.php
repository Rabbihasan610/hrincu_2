@extends('admin.layouts.app',['title'=>$template->name])
@section('panel')
    <div class="row">
        <div class="col-md-12">
            <div class="overflow-hidden card">
                <div class="card-body">
                    <div class="table-responsive table-responsive--sm">
                        <table class="table">
                            <thead class="table-light">
                            <tr>
                                <th>@lang('Short Code')</th>
                                <th>@lang('Description')</th>
                            </tr>
                            </thead>
                            <tbody class="list">
                                @forelse($template->shortcodes as $shortcode => $key)
                                <tr>
                                    {{-- blade-formatter-disable --}}
                                    <th><span class="short-codes">@php echo "{{". $shortcode ."}}"  @endphp</span></th>
                                    {{-- blade-formatter-enable --}}
                                    <td>{{ __($key) }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="100%" class="text-center text-muted">{{ __($emptyMessage) }}</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div><!-- card end -->

            <h6 class="mt-4 mb-2">@lang('Global Short Codes')</h6>
            <div class="overflow-hidden card">
                <div class="card-body">
                    <div class="table-responsive table-responsive--sm">
                        <table class="table ">
                            <thead class="table-light">
                            <tr>
                                <th>@lang('Short Code') </th>
                                <th>@lang('Description')</th>
                            </tr>
                            </thead>
                            <tbody class="list">
                            @foreach($general->global_shortcodes as $shortCode => $codeDetails)
                            <tr>
                                {{-- blade-formatter-disable --}}
                                <td><span class="short-codes">@{{@php echo $shortCode @endphp}}</span></td>
                                {{-- blade-formatter-enable --}}
                                <td>{{ __($codeDetails) }}</td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <form action="{{ route('admin.setting.notification.template.update',$template->id) }}" method="post">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="mt-4 card">
                    <div class="card-header bg-primary">
                        <h5 class="text-white card-title">@lang('Email Template')</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="mb-3 form-group">
                                    <label class="form-label">@lang('Subject')</label>
                                    <input type="text" class="form-control" placeholder="@lang('Email subject')" name="subject" value="{{ $template->subj }}" required/>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3 form-group">
                                    <label class="form-label">@lang('Status') <span class="text-danger">*</span></label>
                                    <input type="checkbox" data-height="46px" data-width="100%" data-onstyle="success"
                                       data-offstyle="danger" data-bs-toggle="toggle" data-on="@lang('Send Email')"
                                       data-off="@lang("Don't Send")" name="email_status"
                                       @if($template->email_status) checked @endif>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3 form-group">
                                    <label class="form-label">@lang('Message') <span class="text-danger">*</span></label>
                                    <textarea name="email_body" rows="10" class="form-control nicEdit" placeholder="@lang('Your message using short-codes')">{{ $template->email_body }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="mt-4 card">
                    <div class="card-header bg-primary">
                        <h5 class="text-white card-title">@lang('SMS Template')</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3 form-group">
                                    <label class="form-label">@lang('Status') <span class="text-danger">*</span></label>
                                    <input type="checkbox" data-height="46px" data-width="100%" data-onstyle="success"
                                       data-offstyle="danger" data-bs-toggle="toggle" data-on="@lang('Send SMS')"
                                       data-off="@lang("Don't Send")" name="sms_status"
                                       @if($template->sms_status) checked @endif>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3 form-group">
                                    <label class="form-label">@lang('Message')</label>
                                    <textarea name="sms_body" rows="10" class="form-control" placeholder="@lang('Your message using short-codes')" required>{{ $template->sms_body }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button type="submit" class="mt-4 btn btn-primary w-100 h-45">@lang('Submit')</button>
    </form>
@endsection


@push('breadcrumb-plugins')
    <x-back route="{{ route('admin.setting.notification.templates') }}" />
@endpush

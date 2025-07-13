@extends('admin.layouts.app', ['title' => 'Service Requests'])
@section('panel')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">@lang('Service Request Details')</h3>
                    <div class="card-tools">
                        <a href="{{ route('admin.our-services-request.index') }}" class="btn btn-sm btn-primary">
                            <i class="fas fa-arrow-left"></i> @lang('Back')
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="text-bold">@lang('Service')</label>
                                <p class="form-control-static">{{ $serviceRequest->ourService->lang('title') }}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="text-bold">@lang('Organization Name')</label>
                                <p class="form-control-static">{{ $serviceRequest->organization_name }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="text-bold">@lang('Submitted At')</label>
                                <p class="form-control-static">{{ $serviceRequest->created_at->format('d M Y H:i') }}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="text-bold">@lang('Status')</label>
                                <p class="form-control-static">
                                    <span class="badge bg-{{
                                        $serviceRequest->status == 'pending' ? 'warning' :
                                        ($serviceRequest->status == 'approved' ? 'success' :
                                        'danger')
                                    }}">
                                        {{ ucfirst($serviceRequest->status) }}
                                    </span>
                                </p>
                            </div>
                        </div>
                    </div>

                    @if($serviceRequest->form_data)
                        <div class="card mt-4">
                            <div class="card-header">
                                <h6 class="card-title">@lang('Form Data')</h6>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <tbody>
                                        @foreach($serviceRequest->form_data as $key => $value)
                                            @php
                                                // Find the field label from the service's form_extra_fields
                                                $fieldLabel = $key;
                                                $extraFields = json_decode($serviceRequest->ourService->form_extra_fields, true);
                                                if ($extraFields && isset($extraFields[$key]) && isset($extraFields[$key]['label'])) {
                                                    $fieldLabel = $extraFields[$key]['label'];
                                                }
                                            @endphp
                                            <tr>
                                                <th width="30%">{{ $fieldLabel }}</th>
                                                <td>
                                                    @if(is_array($value))
                                                        {{ implode(', ', $value) }}
                                                    @else
                                                        {{ $value ?? 'N/A' }}
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @endif

                    <div class="form-group mt-4">
                        <label class="text-bold">@lang('Additional Notes')</label>
                        <p class="form-control-static">{{ $serviceRequest->additional_notes ?? 'N/A' }}</p>
                    </div>

                    <div class="card mt-4">
                        <div class="card-header">
                            <h6 class="card-title">@lang('Update Status')</h6>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.our-services-request.update', $serviceRequest) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group my-3">
                                    <label for="status">@lang('Status')</label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="pending" {{ $serviceRequest->status == 'pending' ? 'selected' : '' }}>@lang('Pending')</option>
                                        <option value="approved" {{ $serviceRequest->status == 'approved' ? 'selected' : '' }}>@lang('Approved')</option>
                                        <option value="rejected" {{ $serviceRequest->status == 'rejected' ? 'selected' : '' }}>@lang('Rejected')</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary">@lang('Update')</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

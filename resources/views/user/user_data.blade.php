@extends('web.layouts.frontend',['title'=> __('User Data')])

@section('content')
<div class="container">
    <div class="py-5 row justify-content-center">
        <div class="col-md-8 col-lg-7 col-xl-5">
            <div class="card custom--card">
                <div class="card-header">
                    <h5 class="card-title">@lang('User Data')</h5>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('user.data.submit') }}">
                        @csrf
                        <div class="row">
                            <div class="pb-3 form-group col-sm-12">
                                <label class="form-label">@lang('Full Name')</label>
                                <input type="text" class="form-control " name="name" value="{{ old('name') }}" required>
                            </div>
                            <div class="pb-3 form-group col-sm-12">
                                <label class="form-label">@lang('Country')</label>
                                <select name="country_id" class="form-control">
                                    @foreach ($countries as $country)
                                        <option value="{{ $country->id }}" {{ old('country') == $country->id ? 'selected' : '' }}>{{ $country->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="pb-3 form-group col-sm-12">
                                <label class="form-label">@lang('Location')</label>
                                <input type="text" class="form-control " name="location" value="{{ old('location') }}" required>
                            </div>

                            <div class="pb-3 form-group col-sm-12">
                                <label class="form-label">@lang('About')</label>
                                <input type="text" class="form-control " name="about" value="{{ old('about') }}" required>
                            </div>

                            <div class="pb-3 form-group col-sm-12">
                                <label class="form-label">@lang('Website')</label>
                                <input type="text" class="form-control " name="website" value="{{ old('website') }}" required>
                            </div>
                        </div>
                        <div class="pb-3 form-group">
                            <button type="submit" class="btn btn-base w-100">
                                @lang('Submit')
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

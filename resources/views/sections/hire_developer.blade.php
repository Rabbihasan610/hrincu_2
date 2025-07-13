
@push('style')
<style>
 .card-container {
            background: #330066;
            padding: 30px;
            border-radius: 10px;
            text-align: center;
            background-size: cover;
            background-position: center;
            color: #fff;
        }
        .title {
            font-size: 28px;
            font-weight: bold;
        }
        .highlight {
            color: #ffc107;
        }
        .dropdown-icon {
            font-size: 18px;
        }
        .description {
            font-size: 14px;
            margin-top: 15px;
            color: #ddd;
        }
        .btn-custom {
            background-color: #ffc107;
            color: black;
            padding: 10px 20px;
            border: none;
            font-weight: bold;
            border-radius: 5px;
            text-transform: uppercase;
            margin-top: 20px;
        }
        .btn-custom:hover {
            background-color: #e0a800;
            color: black;
        }
</style>
@endpush

@php
    $section_seekers = \App\Models\User::where('user_type', 'job_seeker')->latest()->take(4)->get();
@endphp

<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-12">
                <div class="card-container" style="background-image: url({{ asset('assets/images/hire_developer.png') }});">
                    <h1 class="title">@lang('Hire Best Expert') <br><span class="highlight">@lang('Developer')</span> <span class="dropdown-icon">&#9662;</span></h1>
                    <p class="description">@lang('Hire expert developer')</p>
                    <a href="{{ route('user.register') }}"  class="btn btn-custom">@lang('Sign Up')</a>
                </div>
            </div>
        </div>
    </div>
</section>

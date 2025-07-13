@extends('web.layouts.frontend', ['title' => 'Contact Us'])

@section('content')

@include('sections.page_banner', ['title' => 'Contact Us'])


@php
    $contactUsSection = getContent('contact_us.content', true);
@endphp

<section class="my-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="contact-us-box">
                    <p>
                      {{ @$contactUsSection?->lang('message') ?? __('Hello, this form is intended only for employers/companies interested in doing business and not for job seekers. At Jobincu, we always strive to make a difference and provide the best services to our partners. Complete the form below and explain to us in detail how we can help you, and one of our representatives will contact you as soon as possible.') }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="my-5">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-8 offset-md-2">
                <div class="contact-form row">
                    <div class="col-6 col-md-6 col-lg-6 col-xxl-6">
                        @include('web.includes.contact_form')
                    </div>
                    <div class="col-6 col-md-6 col-lg-6 col-xxl-6">
                        @include('web.includes.contact_info')
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="my-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="contact-us-box-registration">
                    <p>
                        {{ @$contactUsSection?->lang('message_2') ?? __('Registration form on the site. At Jobincu, we always strive to make a difference and provide the best services to our work team, and to improve the work environment. We realize that no job is ever perfect. Therefore, to avoid any unexpected problems, we have created this service for employees. We communicate with your employees to dispel what worries you and help solve the problem.') }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="my-5">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-12">
                <div class="row">
                    <div class="col-md-1 col-lg-1 col-xxl-1">
                    </div>
                    <div class="col-6 col-md-5 col-lg-4 col-xxl-4">
                        @include('web.includes.contact_registration_form')
                    </div>
                    <div class="col-6 col-md-6 col-lg-6 col-xxl-6">
                        @include('web.includes.google_map')
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@if (@$sections->secs != null)
@foreach (json_decode($sections->secs) as $sec)
    @include('sections.' . $sec)
@endforeach
@endif
@endsection

@push('style')
<style>
    .contact-us-box {
        width: 100%;
        height: auto;
        background: #3566FB;
        overflow: hidden;
        padding: 20px 20px 5px 20px;
    }

    .contact-us-box p{
        color: #fff;
        font-size: 18px;
        font-weight: 500;
        line-height: 24px;
    }

    .contact-us-box-registration {
        width: 100%;
        height: auto;
        background: #330066;
        overflow: hidden;
        padding: 20px 20px 5px 20px;
    }


    .contact-us-box-registration p{
        color: #fff;
        font-size: 18px;
        font-weight: 500;
        line-height: 24px;
    }

</style>
@endpush

@extends('admin.layouts.app',['title'=> 'Templates'])

@section('panel')

    <div class="row gy-4">


        @foreach($templates as $temp)

            <div class="col-xl-4 col-md-6">
                <div class="card">
                    <div class="flex-wrap card-header bg--primary d-flex justify-content-between">
                        <h4 class="text-white card-title"> {{ __(keyToTitle($temp['name'])) }} </h4>
                        @if($general->active_template == $temp['name'])
                        <button type="submit" name="name" value="{{$temp['name']}}" class="btn btn--info">
                            @lang('SELECTED')
                        </button>
                        @else
                        <form action="" method="post">
                            @csrf
                            <button type="submit" name="name" value="{{$temp['name']}}" class="btn btn--success w-100">
                                @lang('SELECT')
                            </button>
                        </form>
                        @endif
                    </div>
                    <div class="card-body">
                        <img src="{{$temp['image']}}" alt="@lang('Template')" class="w-100">
                    </div>
                </div>
            </div>

        @endforeach


        @if($extraTemplates)
            @foreach($extraTemplates as $temp)
                <div class="col-lg-3">
                    <div class="card">
                        <div class="card-header bg--primary"><h4 class="text-white card-title"> {{ __(keyToTitle($temp['name'])) }} </h4></div>
                        <div class="card-body">
                            <img src="{{$temp['image']}}" alt="@lang('Template')" class="w-100">
                        </div>
                        <div class="card-footer">
                            <a href="{{$temp['url']}}" target="_blank" class="btn btn--primary w-100">@lang('Get This')</a>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif

    </div>

@endsection

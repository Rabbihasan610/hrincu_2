@extends('admin.layouts.app',['title'=> 'Manage Section of '.$pdata->name])
@section('panel')
@if($pdata->is_default == Status::NO)
<div class="mb-4 row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.frontend.manage.pages.update')}}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{ $pdata->id }}">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3 form-group">
                                <label class="form-label">@lang('Page Name')</label>
                                <input type="text" class="form-control" name="name" value="{{ $pdata->name }}"
                                required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3 form-group">
                                <label class="form-label">@lang('Page Slug')</label>
                                <input type="text" class="form-control" name="slug" value="{{ $pdata->slug }}"
                                required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3 form-group">
                                <label class="form-label">&nbsp;</label>
                                <button type="submit" class="btn btn-primary w-100">@lang('Submit')</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endif



<div class="row">
    <div class="col-md-7">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">{{__($pdata->name)}} @lang('Page')</h5>
            </div>

            <div class="card-body">
                <form action="{{route('admin.frontend.manage.section.update',$pdata->id)}}" method="post">
                    @csrf
                    <ol class="simple_with_drop vertical sec-item">
                        @if($pdata->secs != null)
                        @foreach(json_decode($pdata->secs) as $sec)
                        <li class="highlight icon-move item">
                            <i class=" fa fa-arrows-alt"></i>
                            <span class="text-white d-inline-block me-auto ms-2"> {{ __(@$sections[$sec]['name']) }}</span>
                            <i class="ms-auto d-inline-block remove-icon fa fa-times"></i>
                            <input type="hidden" name="secs[]" value="{{$sec}}">
                        </li>
                        @endforeach
                        @endif
                    </ol>
                    <button type="submit" class="btn btn-primary w-100 h-45">@lang('Update Now')</button>
                </form>

            </div>
        </div>



    </div>
    <div class="mt-3 col-md-5 mt-md-0">

        <div class="card">
            <div class="card-header">
                <h5 class="card-title">@lang('Sections')</h5>
                <small class="text--primary">@lang('Drag the section to the left side you want to show on the page.')</small>
            </div>
            <div class="card-body">
                <ol class="p-0 simple_with_no_drop vertical">
                    @foreach($sections as $k => $secs)
                    @if(!@$secs['no_selection'])
                    <li class="clearfix highlight icon-move">
                            <i class="mt-2 fa fa-arrows-alt"></i>
                            <span class="text-white d-inline-block me-auto ms-2"> {{__($secs['name'])}}</span>
                            <i class="ms-auto d-inline-block remove-icon fa fa-times"></i>
                            <input type="hidden" name="secs[]" value="{{$k}}">
                            @if($secs['builder'])
                                <div class="float-end d-inline-block manage-content">
                                    <a href="{{ route('admin.frontend.sections',$k) }}" target="_blank" class="text-center text-white btn btn-outline-light cog-btn btn-sm" title="@lang('Manage Content')">
                                        <i class="p-0 m-0 fa fa-cog"></i>
                                    </a>
                                </div>
                            @endif
                    </li>
                    @endif
                    @endforeach
                </ol>
            </div>
        </div>

    </div>
</div>
@stop

@push('script-lib')
<script src="{{asset('assets/admin/js/jquery-sortable.js')}}"></script>
@endpush

@push('script')
<script>
    (function($) {
        "use strict";
        $("ol.simple_with_drop").sortable({
            group: 'no-drop',
            handle: '.icon-move',
            onDragStart: function ($item, container, _super) {
                    if(!container.options.drop){
                        $item.clone().insertAfter($item);
                    }
                    _super($item, container);
                }
            });
        $("ol.simple_with_no_drop").sortable({
            group: 'no-drop',
            drop: false
        });
        $("ol.simple_with_no_drag").sortable({
            group: 'no-drop',
            drag: false
        });

        $(document).on('click',".remove-icon",function(){
            $(this).parent('.highlight').remove();
        });

    })(jQuery);
</script>
@endpush


@push('breadcrumb-plugins')
    <x-back route="{{route('admin.frontend.manage.pages')}}" />
@endpush

@push('style')
<style>
    .span4 {
        width: 300px;
    }

    ol li.highlight {
        background: #000;
        color: #999999;
    }

    ol.vertical {
        margin: 0 0 9px 0;
        min-height: 10px;
        padding-left: 0;
    }
    li {
        line-height: 18px;
    }

    .icon-move {
        background-position: -168px -72px;
    }
    ol i.icon-move {
        cursor: pointer;
    }

    ol {
        display: block;
        list-style-type: decimal;
        margin-block-start: 1em;
        margin-block-end: 1em;
        margin-inline-start: 0px;
        margin-inline-end: 0px;
    }
    .vertical li i {
        color: #000000;
        padding-right: 15px;
    }

    .sec-item li i {
        color: #000000;
        padding-right: 15px;
    }

    .sec-item li i.fa-times{
        color: #ea5455;
        padding-right: 15px;
    }

    ol.vertical li {
        display: block;
        margin: 10px 0;
        padding: 10px;
        color: #e0e0e0;
        background: #7f7ff7;
        font-size: 16px;
        font-weight: 600;
    }


    ol.sec-item li {
        margin: 10px 0;
        padding: 10px;
        color: #fff;
        background: #2e49cc;
        font-size: 24px;
        font-weight: 600;
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        align-items: center;
    }
    .ol.sec-item li.d-none {
        display: none !important;}
        [class*="span"] {
            float: left;
            margin-left: 20px;
        }

        .row {
            *zoom: 1;
        }
        .row {
            position: relative;
        }
        .dragged {
            position: absolute;
            top: 0;
            opacity: 0.5;
            z-index: 2000;
            background: #333333;
            color: #999999;
        }

        ol.vertical li i.remove-icon{
            display: none !important;
        }

        ol.sec-item li i.remove-icon{
            display: block !important;
        }
        ol.sec-item li .manage-content{
            display: none !important;
        }
        ol.vertical li span {
            font-size: 18px;
        }
        .cog-btn i {
            color: #fff!important
        }
        .cog-btn:hover i {
            color: #000!important
        }

</style>
@endpush

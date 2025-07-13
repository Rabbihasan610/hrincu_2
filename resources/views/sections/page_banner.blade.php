
<section class="page-banner">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="p-0 m-0 text-center"> {{  $title ? __(@$title) : __('Page Not Found')  }}</h1>
                <ul>
                    <li><a href="/">@lang('Home')</a></li>
                    <li><span>/</span></li>
                    <li><a href="javascript:void(0)">{{  $title ? __(@$title) : __('Page Not Found')  }}</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>

@push('style')
<style>
    .page-banner{
       background: #fff;
       background-size: cover;
       background-position: center;
       height: 100px;
       padding-top: 10px;
    }

    .page-banner h1{
        font-size: 30px;
        font-weight: 600;
        line-height: 50px;
        margin-bottom: 20px;
        color: #000;
    }

    .page-banner ul{
        padding: 0;
        margin: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-wrap: wrap;
    }

    .page-banner ul li{
        list-style: none;
        display: inline-block;
        margin: 0 5px;
    }

    .page-banner ul li{
        list-style: none;
        display: inline-block;
        margin: 0 5px;
    }

    .page-banner ul li a{
        color: #000;
    }

    .page-banner ul li span{
        color: #000;
    }

</style>
@endpush

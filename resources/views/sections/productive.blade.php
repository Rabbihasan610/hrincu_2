@php
    $productiveContent = getContent('productive.content', true);
@endphp


<!----------- Productive section start ------------>
<section class="Productive-bg py-5 my-5" style="background: url({{ getImage('assets/images/frontend/productive/' . @$productiveContent?->data_values->image) }})">
    <div class="container">
        <div class="row py-5">
            <div class="col-12">
                <div class="productive text-center py-3">
                    <h2>{{ @$productiveContent?->lang('title') }}</h2>
                    <h2>{{ @$productiveContent?->lang('description') }}</h2>
                </div>
                <div class="text-center">

                    <a href="{{ url(@$productiveContent?->data_values?->job_search_url) }}" class="btn btn-primary text-center">@lang('Search Cv') <i
                            class="fa-solid fa-arrow-right"></i></a>
                    <a href="{{ url(@$productiveContent?->data_values?->job_apply_url) }}" class="btn btn-warning ">@lang('Job Apply')</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!----------- Productive section End --------------->

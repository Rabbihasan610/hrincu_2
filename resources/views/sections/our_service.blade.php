@php
    $ourServiceContent = getContent('our_service.content', true);
    $category_count = DB::table('job_categories')->count();
@endphp

<section class="service-section">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="our-service-img">
                    <img src="{{ getImage('assets/images/frontend/our_service/' . $ourServiceContent?->data_values?->image) }}" alt=""  class="img-fluid" />
                    <!---- category card section start ------>
                    <div class="category-card">
                        <div class="number">
                            {{ $category_count }} <span>+</span></div>
                        <div class="content">
                            <h3>@lang('Job Categories')</h3>
                            <p>@lang('Available')</p>
                        </div>
                    </div>
                    <!---- category card section end ------>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="our-service">
                    <h3>@lang('Our Services')</h3>
                    <p class="text" @if (session('lang') == 'ar') style="text-align: right !important;" @endif>
                        @php echo @$ourServiceContent?->lang('description') @endphp
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

@php
    use App\Models\Service;
    use App\Enums\Status;

    $servicesQuery = Service::where('status', 1);

    if (!empty($limit)) {
        $services = $servicesQuery->take($limit)->get();
    } else {
        $services = $servicesQuery->paginate(20);
    }
@endphp

<section class="our-service-request">
    <div class="container">
        <div class="row justify-content-center">
            @if ($services->isNotEmpty())
                @foreach ($services as $service)
                    <div class="col-6 col-md-4 col-lg-3 col-xl-3 my-3">
                        <div class="service-request-card rounded shadow d-flex flex-column h-100">
                            <div class="service-category-img">
                                <img src="{{ getImage(getFilePath('service') . '/' . $service->image) }}" alt="{{ $service?->lang('title') }}">
                            </div>
                            <div class="card-body service-request-content flex-grow-1">
                                <h5 class="card-title text-center">{{ $service?->lang('title') }}</h5>
                            </div>
                            <div class="text-center mt-3">

                                @php
                                    $uniqueSlug = Str::slug($service->lang('title')) . '-' . Str::random(20) . '-' . 'service' . '-' . $service->id;
                                @endphp

                                <a href="{{ route('user.service.request', ['service_id' => $service->id, 'slug' => $uniqueSlug]) }}" class="btn primary-btn">@lang('Request Service')</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>

        @if ($services instanceof \Illuminate\Pagination\LengthAwarePaginator && $services->hasPages())
            <div class="row my-3">
                <div class="col-12">
                    <div class="text-center">
                        {{ $services->links() }}
                    </div>
                </div>
            </div>
        @endif
    </div>
</section>


@push('style')
<style>
    @media only screen and (max-width: 600px) {
        .service-request-content {
            padding: 5px !important;
        }

        .primary-btn {
            width: 100% !important;
            padding: 10px 0px !important;
        }
    }
</style>
@endpush

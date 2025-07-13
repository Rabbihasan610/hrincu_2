@php
    $blogContent = getContent('blog.content', true);
    $blogs = App\Models\Blog::active()->limit(3)->get();
@endphp

<section>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="latest-news text-center mb-5">
                    <h2>{{ @$blogContent->data_values->title }}</h2>
                    <p>{{ @$blogContent->data_values->sub_title }}</p>
                </div>
            </div>
            <div class="row">
                @foreach ($blogs as $blog)
                <div class="col-12 col-md-4 my-3">
                    <div class="card news-card rounded shadow h-100">
                        <img src="{{ getImage(getFilePath('blog') . '/' . $blog->image) }}" alt="">
                        <div class="card-body">
                            <small><span>{{ $blog->created_at->format('M d, Y') }}</span> <span class="dotted"></span> <span>37 Comment</span></small>
                            <h5>{{ $blog->lang('title') }} </h5>
                            <p> {{ strLimit(strip_tags($blog?->lang('description')), 100) }}</p>
                            <a href="{{ route('blog.details', $blog->slug) }}">@lang('Read more')</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

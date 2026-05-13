@foreach($blogs as $i => $blog)
    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
        <div class="blogGrid-wrap d-flex flex-column h-100">
            <div class="blogGrid-pics">
                <a href="{{ url('/blog/'.$blog->slug) }}" class="d-block">
                    <img src="{{ @$domain.'/'.$blog->b_c_photo }}" class="img-fluid rounded" alt="Blog image">
                </a>
            </div>
            <div class="blogGrid-caps pt-3">
                <div class="d-flex align-items-center mb-1">
                    <span class="label text-success bg-light-success">{{ $blog->b_category }}</span>
                </div>
                <h4 class="fw-bold fs-6 lh-base">
                    <a href="{{ url('/blog/'.$blog->slug) }}" class="text-dark">{{ $blog->b_title }}</a>
                </h4>
                <p class="mb-3" style="text-align: justify;">
                    {{ substr($blog->s_description, 0, 200) . '...' }}
                </p>
                <a class="text-primary fw-medium" href="{{ url('/blog/'.$blog->slug) }}">
                    Read More<i class="fa-solid fa-arrow-trend-up ms-2"></i>
                </a>
            </div>
        </div>
    </div>
@endforeach

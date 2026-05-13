@extends('mainLayout.layout')

@section('title','Edit E-Book')
@section('ebook','active')
@section('academy','active')
@section('academyMenu','menu-open')

@section('content')
<div class="content-wrapper">

{{-- ================= HEADER ================= --}}
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Edit E-Book</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('ebook-management') }}">E-Book Management</a></li>
                    <li class="breadcrumb-item active">Edit</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">
<div class="container-fluid">

<div class="card card-warning">
    <div class="card-header">
        <h3 class="card-title">Update E-Book</h3>
    </div>

<form method="POST" action="{{ url('ebook-update') }}" enctype="multipart/form-data">
@csrf
<input type="hidden" name="id" value="{{ $ebook->id }}">

<div class="card-body">
{{-- ================= VALIDATION ERRORS ================= --}}
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> Please fix the following errors:
                        <ul class="mb-0 mt-2">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
{{-- ================= BASIC INFO ================= --}}
<div class="row">
    <div class="col-sm-4">
        <label>Title</label>
        <input type="text" name="title" value="{{ $ebook->title }}"
               class="form-control" placeholder="Enter E-Book Title">
    </div>

    <div class="col-sm-4">
        <label>Slug</label>
        <input type="text" name="slug" value="{{ $ebook->slug }}"
               class="form-control" placeholder="ebook-slug">
    </div>

    <div class="col-sm-4">
        <label>Course Link</label>
        <input type="text" name="course_link" value="{{ $ebook->course_link }}"
               class="form-control" placeholder="Access link after purchase">
    </div>

    <div class="col-sm-4">
        <label>Star</label>
        <input type="text" name="star" value="{{ $ebook->star }}"
               class="form-control" placeholder="4.8">
    </div>

    <div class="col-sm-4">
        <label>Price</label>
        <input type="number" name="price" value="{{ $ebook->price }}"
               class="form-control" placeholder="Price">
    </div>

    <div class="col-sm-4">
        <label>Discount Price</label>
        <input type="number" name="discount_price"
               value="{{ $ebook->discount_price }}"
               class="form-control" placeholder="Discounted Price">
    </div>

    <div class="col-sm-3">
        <label>Cover Photo</label><br>
        @if($ebook->cover_photo)
            <img src="{{ asset('/public/'.$ebook->cover_photo) }}" width="90" class="img-thumbnail mb-1">
        @endif
        <input type="file" name="cover_photo" class="form-control">
    </div>

    <div class="col-sm-3">
        <label>Page Photo</label><br>
        @if($ebook->page_photo)
            <img src="{{ asset('/public/'.$ebook->page_photo) }}" width="90" class="img-thumbnail mb-1">
        @endif
        <input type="file" name="page_photo" class="form-control">
    </div>

    <div class="col-sm-12">
        <label>Description</label>
        <textarea name="description" class="form-control"
                  placeholder="E-Book Description">{{ json_decode($ebook->description) }}</textarea>
    </div>

    <div class="col-sm-12">
        <label>YouTube Link</label>
        <input type="text" name="youtube_link"
               value="{{ $ebook->youtube_link }}"
               class="form-control" placeholder="Youtube video link">
    </div>
</div>

{{-- ================= AUTHOR ================= --}}
@php
    $authors = json_decode($ebook->authors, true);
@endphp

<div class="card card-info mt-3">
    <div class="card-header">
        <h3 class="card-title">Author</h3>
    </div>

    <div class="card-body author-wrapper">

        @if(!empty($authors))
            @foreach($authors as $index => $a)
                <div class="row mb-2 align-items-center">

                    {{-- AUTHOR NAME --}}
                    <div class="col-sm-4">
                        <input type="text"
                               name="author_name[]"
                               value="{{ $a['name'] }}"
                               class="form-control"
                               placeholder="Enter Author Name">
                    </div>

                    {{-- AUTHOR PHOTO --}}
                    <div class="col-sm-4">

                        {{-- OLD PHOTO PREVIEW --}}
                        @if(!empty($a['photo']))
                            <div class="mb-1">
                                <img src="{{ asset('/public/'.$a['photo']) }}"
                                     width="70"
                                     class="img-thumbnail">
                            </div>
                        @endif

                        {{-- KEEP OLD PHOTO --}}
                        <input type="hidden"
                               name="author_old_photo[]"
                               value="{{ $a['photo'] ?? '' }}">

                        {{-- NEW PHOTO --}}
                        <input type="file"
                               name="author_photo[]"
                               class="form-control">
                    </div>

                    {{-- BUTTON --}}
                    <div class="col-sm-2">
                        @if($index == 0)
                            <button type="button"
                                    class="btn btn-success add-author-btn">
                                Add More
                            </button>
                        @else
                            <button type="button"
                                    class="btn btn-danger remove-btn">
                                Remove
                            </button>
                        @endif
                    </div>

                </div>
            @endforeach
        @else
            {{-- DEFAULT ROW --}}
            <div class="row align-items-center">
                <div class="col-sm-4">
                    <input type="text"
                           name="author_name[]"
                           class="form-control"
                           placeholder="Enter Author Name">
                </div>

                <div class="col-sm-4">
                    <input type="file"
                           name="author_photo[]"
                           class="form-control">
                </div>

                <div class="col-sm-2">
                    <button type="button"
                            class="btn btn-success add-author-btn">
                        Add More
                    </button>
                </div>
            </div>
        @endif

    </div>
</div>


{{-- ================= CURRICULUM ================= --}}
@php $curriculum = json_decode($ebook->ebook_curriculum,true); @endphp
<div class="card card-info mt-3">
    <div class="card-header"><h3 class="card-title">E-Book Curriculum</h3></div>
    <div class="card-body curriculum-wrapper">

        @if(!empty($curriculum))
            @foreach($curriculum as $i=>$c)
                <div class="row mb-2">
                    <div class="col-sm-5">
                        <input type="text" name="curriculum_title[]"
                               value="{{ $c['title'] }}"
                               class="form-control" placeholder="Curriculum Title">
                    </div>
                    <div class="col-sm-5">
                        <input type="text" name="curriculum_details[]"
                               value="{{ $c['details'] }}"
                               class="form-control" placeholder="Curriculum Details">
                    </div>
                    <div class="col-sm-2">
                        @if($i==0)
                            <button type="button" class="btn btn-success add-cur-btn">Add More</button>
                        @else
                            <button type="button" class="btn btn-danger remove-btn">Remove</button>
                        @endif
                    </div>
                </div>
            @endforeach
        @else
            <div class="row">
                <div class="col-sm-5">
                    <input type="text" name="curriculum_title[]" class="form-control" placeholder="Curriculum Title">
                </div>
                <div class="col-sm-5">
                    <input type="text" name="curriculum_details[]" class="form-control" placeholder="Curriculum Details">
                </div>
                <div class="col-sm-2">
                    <button type="button" class="btn btn-success add-cur-btn">Add More</button>
                </div>
            </div>
        @endif

    </div>
</div>

{{-- ================= YOU GET ================= --}}
@php $gets = json_decode($ebook->ebook_get,true); @endphp
<div class="card card-info mt-3">
    <div class="card-header"><h3 class="card-title">In the E-Book You Get</h3></div>
    <div class="card-body get-wrapper">

        @if(!empty($gets))
            @foreach($gets as $i=>$g)
                <div class="row mb-2">
                    <div class="col-sm-10">
                        <input type="text" name="get_details[]"
                               value="{{ $g }}"
                               class="form-control" placeholder="What will user get">
                    </div>
                    <div class="col-sm-2">
                        @if($i==0)
                            <button type="button" class="btn btn-success add-get-btn">Add More</button>
                        @else
                            <button type="button" class="btn btn-danger remove-btn">Remove</button>
                        @endif
                    </div>
                </div>
            @endforeach
        @else
            <div class="row">
                <div class="col-sm-10">
                    <input type="text" name="get_details[]" class="form-control" placeholder="What will user get">
                </div>
                <div class="col-sm-2">
                    <button type="button" class="btn btn-success add-get-btn">Add More</button>
                </div>
            </div>
        @endif

    </div>
</div>

{{-- ================= REVIEW ================= --}}
@php
    $reviews = json_decode($ebook->ebook_review, true);
@endphp

<div class="card card-info mt-3">
    <div class="card-header">
        <h3 class="card-title">E-Book Review</h3>
    </div>

    <div class="card-body review-wrapper">

        @if(!empty($reviews))
            @foreach($reviews as $i => $r)
                <div class="row mb-2 align-items-center">

                    {{-- REVIEWER NAME --}}
                    <div class="col-sm-3">
                        <input type="text"
                               name="reviewer_name[]"
                               value="{{ $r['name'] }}"
                               class="form-control"
                               placeholder="Reviewer Name">
                    </div>

                    {{-- REVIEW TEXT --}}
                    <div class="col-sm-5">
                        <input type="text"
                               name="review[]"
                               value="{{ $r['review'] }}"
                               class="form-control"
                               placeholder="Reviewer Feedback">
                    </div>

                    {{-- REVIEWER PHOTO --}}
                    <div class="col-sm-2">

                        {{-- OLD PHOTO PREVIEW --}}
                        @if(!empty($r['photo']))
                            <div class="mb-1">
                                <img src="{{ asset('/public/'.$r['photo']) }}"
                                     width="60"
                                     class="img-thumbnail">
                            </div>
                        @endif

                        {{-- KEEP OLD PHOTO --}}
                        <input type="hidden"
                               name="reviewer_old_photo[]"
                               value="{{ $r['photo'] ?? '' }}">

                        {{-- NEW PHOTO --}}
                        <input type="file"
                               name="reviewer_photo[]"
                               class="form-control">
                    </div>

                    {{-- BUTTON --}}
                    <div class="col-sm-2">
                        @if($i == 0)
                            <button type="button"
                                    class="btn btn-success add-review-btn">
                                Add More
                            </button>
                        @else
                            <button type="button"
                                    class="btn btn-danger remove-btn">
                                Remove
                            </button>
                        @endif
                    </div>

                </div>
            @endforeach
        @else
            {{-- DEFAULT ROW --}}
            <div class="row align-items-center">
                <div class="col-sm-3">
                    <input type="text"
                           name="reviewer_name[]"
                           class="form-control"
                           placeholder="Reviewer Name">
                </div>

                <div class="col-sm-5">
                    <input type="text"
                           name="review[]"
                           class="form-control"
                           placeholder="Reviewer Feedback">
                </div>

                <div class="col-sm-2">
                    <input type="file"
                           name="reviewer_photo[]"
                           class="form-control">
                </div>

                <div class="col-sm-2">
                    <button type="button"
                            class="btn btn-success add-review-btn">
                        Add More
                    </button>
                </div>
            </div>
        @endif

    </div>
</div>


</div>

<div class="card-footer">
    <button class="btn btn-warning float-right">Update E-Book</button>
</div>

</form>
</div>

</div>
</section>
</div>
@endsection

@section('js')
<script>
/* AUTHOR ADD */
$(document).on('click','.add-author-btn',function(){
    $('.author-wrapper').append(`
        <div class="row mt-2 author-row">
            <div class="col-sm-4">
                <input type="text" name="author_name[]" class="form-control" placeholder="Enter Author Name">
            </div>
            <div class="col-sm-4">
                <input type="file" name="author_photo[]" class="form-control" accept="image/*">
            </div>
            <div class="col-sm-2">
                <button type="button" class="btn btn-danger remove-btn">Remove</button>
            </div>
        </div>
    `);
});


/* YOU GET */
$(document).on('click','.add-get-btn',function(){
    $('.get-wrapper').append(`
        <div class="row mt-2 get-row">
            <div class="col-sm-10">
                <input type="text" name="get_details[]" class="form-control" placeholder="What will user get">
            </div>
            <div class="col-sm-2">
                <button type="button" class="btn btn-danger remove-btn">Remove</button>
            </div>
        </div>
    `);
});

/* CURRICULUM */
$(document).on('click','.add-cur-btn',function(){
    $('.curriculum-wrapper').append(`
        <div class="row mt-2 cur-row">
            <div class="col-sm-5">
                <input type="text" name="curriculum_title[]" class="form-control" placeholder="Curriculum Title">
            </div>
            <div class="col-sm-5">
                <input type="text" name="curriculum_details[]" class="form-control" placeholder="Curriculum Details">
            </div>
            <div class="col-sm-2">
                <button type="button" class="btn btn-danger remove-btn">Remove</button>
            </div>
        </div>
    `);
});

/* REVIEW ADD */
$(document).on('click','.add-review-btn',function(){
    $('.review-wrapper').append(`
        <div class="row mt-2 review-row">
            <div class="col-sm-3">
                <input type="text" name="reviewer_name[]" class="form-control" placeholder="Reviewer Name">
            </div>
            <div class="col-sm-5">
                <input type="text" name="review[]" class="form-control" placeholder="Reviewer Feedback">
            </div>
            <div class="col-sm-2">
                <input type="file" name="reviewer_photo[]" class="form-control" accept="image/*">
            </div>
            <div class="col-sm-2">
                <button type="button" class="btn btn-danger remove-btn">Remove</button>
            </div>
        </div>
    `);
});

/* REMOVE */
$(document).on('click','.remove-btn',function(){
    $(this).closest('.row').remove();
});
</script>
@endsection

@extends('mainLayout.layout')

@section('title','E-Book Management')
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
                <h1>E-Book Management</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item active">E-Book Management</li>
                </ol>
            </div>
        </div>
    </div>
</section>

{{-- ================= MAIN CONTENT ================= --}}
<section class="content">
    <div class="container-fluid">

    {{-- ================= ADD EBOOK ================= --}}
        <div class="card card-warning">
            <div class="card-header">
                <h3 class="card-title">Add New E-Book</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-plus"></i>
                    </button>
                </div>
            </div>

            <div class="card-body" style="display:none;">
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
                <form method="POST" action="{{ url('ebook-store') }}" enctype="multipart/form-data">
                    @csrf

                    {{-- BASIC INFO --}}
                    <div class="row">
                        <div class="col-sm-4">
                            <label>Title</label>
                            <input type="text" name="title" class="form-control" placeholder="Enter E-Book Title" required>
                        </div>
                        <div class="col-sm-4">
                            <label>Slug</label>
                            <input type="text"
                                name="slug"
                                value="{{ old('slug') }}"
                                class="form-control @error('slug') is-invalid @enderror"
                                placeholder="ebook-slug-example">

                            @error('slug')
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-sm-4">
                            <label>Course Link (After Purchase)</label>
                            <input type="text" name="course_link" class="form-control" placeholder="Access link after purchase" required>
                        </div>

                        <div class="col-sm-4">
                            <label>Star</label>
                            <input type="text" name="star" class="form-control" value="4.8">
                        </div>

                        <div class="col-sm-3">
                            <label>Price</label>
                            <input type="number" name="price" class="form-control" placeholder="Original Price" required>
                        </div>

                        <div class="col-sm-3">
                            <label>Discount Price</label>
                            <input type="number" name="discount_price" class="form-control" placeholder="Discounted Price">
                        </div>

                        <div class="col-sm-3">
                            <label>Cover Photo</label>
                            <input type="file" name="cover_photo" class="form-control">
                        </div>

                        <div class="col-sm-3">
                            <label>Page Photo</label>
                            <input type="file" name="page_photo" class="form-control">
                        </div>

                        <div class="col-sm-12">
                            <label>Description</label>
                            <textarea name="description" class="form-control" placeholder="E-Book Description"></textarea>
                        </div>

                        <div class="col-sm-12">
                            <label>YouTube Link</label>
                            <input type="text" name="youtube_link" class="form-control" placeholder="Promo / Overview Video Link">
                        </div>
                    </div>

                    {{-- ================= AUTHOR ================= --}}
                    <div class="card card-info mt-3">
                        <div class="card-header">
                            <h3 class="card-title">Author (Add More)</h3>
                        </div>

                        <div class="card-body author-wrapper">
                            <div class="row author-row">
                                <div class="col-sm-4">
                                    <input type="text"
                                        name="author_name[]"
                                        class="form-control"
                                        placeholder="Enter Author Name">
                                </div>

                                <div class="col-sm-4">
                                    <input type="file"
                                        name="author_photo[]"
                                        class="form-control"
                                        accept="image/*">
                                </div>

                                <div class="col-sm-2">
                                    <button type="button"
                                            class="btn btn-success add-author-btn">
                                        Add More
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>


                    {{-- ================= YOU GET ================= --}}
                    <div class="card card-info mt-3">
                        <div class="card-header">
                            <h3 class="card-title">In the E-Book You Get</h3>
                        </div>

                        <div class="card-body get-wrapper">
                            <div class="row get-row">
                                <div class="col-sm-10">
                                    <input type="text" name="get_details[]" class="form-control" placeholder="What will user get">
                                </div>
                                <div class="col-sm-2">
                                    <button type="button" class="btn btn-success add-get-btn">Add More</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- ================= CURRICULUM ================= --}}
                    <div class="card card-info mt-3">
                        <div class="card-header">
                            <h3 class="card-title">E-Book Curriculum</h3>
                        </div>

                        <div class="card-body cur-wrapper">
                            <div class="row cur-row">
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
                        </div>
                    </div>

                    {{-- ================= REVIEW ================= --}}
                    <div class="card card-info mt-3">
                        <div class="card-header">
                            <h3 class="card-title">E-Book Review</h3>
                        </div>

                        <div class="card-body review-wrapper">
                            <div class="row review-row">
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
                                        class="form-control"
                                        accept="image/*">
                                </div>

                                <div class="col-sm-2">
                                    <button type="button"
                                            class="btn btn-success add-review-btn">
                                        Add More
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="card-footer">
                        <button class="btn btn-warning float-right">Save E-Book</button>
                    </div>

                </form>
            </div>
        </div>
        {{-- ================= TABLE / LIST ================= --}}
        <div class="card card-info mt-3">
            <div class="card-header">
                <h3 class="card-title">E-Book List</h3>
            </div>

            <div class="card-body">
                <table class="table table-bordered table-hover text-center">
                    <thead class="bg-info text-white">
                        <tr>
                            <th>#</th>
                            <th>Cover</th>
                            <th>Title</th>
                            <th>Price</th>
                            <th>Status</th>
                            <th width="160">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($ebooks as $i => $ebook)
                        <tr>
                            <td>{{ $i+1 }}</td>
                            <td>
                                @if($ebook->cover_photo)
                                    <img src="{{ url('/public/'.$ebook->cover_photo) }}" width="70">
                                @endif
                            </td>
                            <td>{{ $ebook->title }}</td>
                            <td>
                                {{ $ebook->price }} <br>
                                <span class="text-danger">{{ $ebook->discount_price }}</span>
                            </td>
                            <td>
                                @if($ebook->status)
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-danger">Inactive</span>
                                @endif
                            </td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-info btn-sm">Action</button>
                                    <button type="button"
                                            class="btn btn-info btn-sm dropdown-toggle dropdown-icon"
                                            data-toggle="dropdown">
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>

                                    <div class="dropdown-menu dropdown-menu-right">

                                        {{-- EDIT --}}
                                        <a class="dropdown-item"
                                        href="{{ url('ebook-edit?id=' . $ebook->id) }}">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>

                                        {{-- STATUS TOGGLE --}}
                                        <a class="dropdown-item"
                                        href="{{ url('ebook-status-toggle/' . $ebook->id) }}">
                                            <i class="fas fa-toggle-{{ $ebook->status ? 'off text-danger' : 'on text-success' }}"></i>
                                            {{ $ebook->status ? 'Deactivate' : 'Activate' }}
                                        </a>

                                        {{-- DELETE --}}
                                        <a class="dropdown-item delete text-danger"
                                        data-id="{{ $ebook->id }}"
                                        data-toggle="modal"
                                        data-target="#modal-danger"
                                        href="javascript:void(0)">
                                            <i class="fas fa-trash"></i> Delete
                                        </a>

                                    </div>
                                </div>
                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<div class="modal fade" id="modal-danger" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <form method="POST" action="{{ url('ebook-delete') }}">
            @csrf
            <input type="hidden" name="id" class="delete-id">

            <div class="modal-content bg-danger">
                <div class="modal-header">
                    <h5 class="modal-title">Confirm Delete</h5>
                </div>

                <div class="modal-body">
                    Are you sure you want to delete this e-book?
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-light">Yes, Delete</button>
                    <button type="button"
                            class="btn btn-outline-light"
                            data-dismiss="modal">
                        Cancel
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

</div>
@endsection

{{-- ================= JS ================= --}}
@section('js')
<script>
    $(document).on('click','.delete',function(){
    let id = $(this).data('id');
    $('.delete-id').val(id);
});
$('input[name="title"]').on('keyup', function () {
    let slug = $(this).val()
        .toLowerCase()
        .replace(/[^a-z0-9]+/g, '-')
        .replace(/(^-|-$)/g, '');
    $('input[name="slug"]').val(slug);
});
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
    $('.cur-wrapper').append(`
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

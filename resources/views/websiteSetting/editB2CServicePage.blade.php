@extends('mainLayout.layout')
@section('title','Trip Designer || Manpower Management')
@section('webSettings','active')
@section('b2cServiceManagement','active')
@section('websiteMenu','menu-open')
@section('css')
    <!-- summernote -->
    <link rel="stylesheet" href="{{url('/public/plugins/summernote/summernote-bs4.min.css')}}">
    <!-- CodeMirror -->
    <link rel="stylesheet" href="{{url('/public/plugins/codemirror/codemirror.css')}}">
    <link rel="stylesheet" href="{{url('/public/plugins/codemirror/theme/monokai.css')}}">
    <!-- SimpleMDE -->
    <link rel="stylesheet" href="{{url('/public/plugins/simplemde/simplemde.min.css')}}">
@endsection
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Service Management</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <a href="{{url('/')}}">Home</a>
                            </li>
                            <li class="breadcrumb-item active">Service Management</li>
                        </ol>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-warning">
                            <div class="card-header">
                                <h3 class="card-title">Service Package </h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                    </button>
                                </div>
                                <!-- /.card-tools -->
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body" style="display: block;">
                                {{ Form::open(array('url' => 'editB2CService',  'method' => 'post' ,'class' =>'form-horizontal' ,'enctype'=>"multipart/form-data")) }}
                                {{ csrf_field() }}
                                <div class="card-body row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Service Name</label>
                                            <input type="text" class="form-control" id="name" value="{{@$package->name}}" name="name" placeholder="Enter Service Name" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Service Title</label>
                                            <input type="text" class="form-control" id="title" value="{{@$package->title}}"  name="title" placeholder="Enter Service Title" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Cover Photo</label>
                                            <input type="file" class="form-control" id="c_photo" accept="image/*"  name="c_photo" placeholder="Enter Package Cover Photo" <?php if($package->c_photo) echo ''; else echo 'required'; ?>>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Slug</label>
                                            <input type="text" class="form-control" id="slug" value="{{@$package->slug}}" name="slug" placeholder="Enter Slug" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select class="form-control select2bs4" name="status" id="status" style="width: 100%;" <?php if($package->c_photo) echo ''; else echo 'required'; ?>>
                                                <option value="">Select Status</option>
                                                <option value="1" <?php if($package->status == 1) echo 'selected'; ?>>Active</option>
                                                <option value="0" <?php if($package->status == 0) echo 'selected'; ?>>In Active</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12" >
                                        <div class="form-group">
                                            <label>Service Details</label>
                                            <textarea class="summernote" name="s_details"> {{json_decode($package->s_details)}}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12" >
                                        <div class="form-group">
                                            <label>Payment Method</label>
                                            <textarea class="summernote" name="p_method"> {{json_decode($package->p_method)}} </textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12" >
                                        <div class="form-group">
                                            <label>Package  Exclusion</label>
                                            <textarea class="summernote" name="exclusion"> {{json_decode($package->exclusion)}}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12" >
                                        <div class="form-group">
                                            <label>Terms & Conditions</label>
                                            <textarea class="summernote" name="tnt">{{json_decode($package->tnt)}} </textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="card card-info">
                                            <div class="card-header">
                                                <h3 class="card-title">Consultant Information</h3>
                                            </div>
                                            <div class="card-body consultant-section">
                                                @php
                                                    $consultants = $package->consultant_info ?? [];
                                                @endphp

                                                @if(!empty($consultants))
                                                    @foreach($consultants as $index => $c)
                                                        <div class="row col-sm-12 add-more-consultant mt-2">
                                                            <div class="col-sm-2">
                                                                <div class="form-group">
                                                                    <label>Consultant Name</label>
                                                                    <input type="text" class="form-control" name="consultant_name[]" value="{{ $c['name'] ?? '' }}" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-3">
                                                                <div class="form-group">
                                                                    <label>Consultant Designation</label>
                                                                    <input type="text" class="form-control" name="consultant_designation[]" value="{{ $c['designation'] ?? '' }}" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-3">
                                                                <div class="form-group">
                                                                    <label>Consultant Institute</label>
                                                                    <input type="text" class="form-control" name="consultant_institute[]" value="{{ $c['institute'] ?? '' }}" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-2">
                                                                <div class="form-group">
                                                                    <label>Consultant Photo</label>
                                                                    <input type="file" class="form-control" name="consultant_photo[]" accept="image/*">
                                                                    @if(!empty($c['photo']))
                                                                        <img src="{{ url($c['photo']) }}" width="80" class="mt-2">
                                                                        <input type="hidden" name="old_consultant_photo[]" value="{{ $c['photo'] }}">
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-2" style="margin-top: 30px;">
                                                                <button type="button" class="btn btn-danger float-right remove-consultant">Remove</button>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @else
                                                    <!-- Default empty one row if no consultant data -->
                                                    <div class="row col-sm-12 add-more-consultant mt-2">
                                                        <div class="col-sm-2">
                                                            <div class="form-group">
                                                                <label>Consultant Name</label>
                                                                <input type="text" class="form-control" name="consultant_name[]" placeholder="Enter Consultant Name" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <div class="form-group">
                                                                <label>Consultant Designation</label>
                                                                <input type="text" class="form-control" name="consultant_designation[]" placeholder="Enter Consultant Designation" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <div class="form-group">
                                                                <label>Consultant Institute</label>
                                                                <input type="text" class="form-control" name="consultant_institute[]" placeholder="Enter Consultant Institute" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-2">
                                                            <div class="form-group">
                                                                <label>Consultant Photo</label>
                                                                <input type="file" class="form-control" name="consultant_photo[]" accept="image/*" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-2" style="margin-top: 30px;">
                                                            <div class="form-group">
                                                                <button type="button" class="btn btn-danger float-right remove-consultant">Remove</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif

                                                <div class="col-sm-12 mt-2">
                                                    <button type="button" class="btn btn-success float-right add-more-btn">Add More</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 mt-4">
                                        <div class="card card-info">
                                            <div class="card-header">
                                                <h3 class="card-title">Service Review</h3>
                                            </div>
                                            <div class="card-body review-section">
                                                @php
                                                    $reviews = $package->review_info ?? [];
                                                @endphp

                                                @if(!empty($reviews))
                                                    @foreach($reviews as $index => $r)
                                                        <div class="row col-sm-12 add-more-review mt-2">
                                                            <div class="col-sm-3">
                                                                <div class="form-group">
                                                                    <label>Student Name</label>
                                                                    <input type="text" class="form-control" name="student_name[]" value="{{ $r['name'] ?? '' }}" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-5">
                                                                <div class="form-group">
                                                                    <label>Review</label>
                                                                    <input type="text" class="form-control" name="student_review[]" value="{{ $r['review'] ?? '' }}" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-2">
                                                                <div class="form-group">
                                                                    <label>Student Photo</label>
                                                                    <input type="file" class="form-control" name="student_photo[]" accept="image/*">
                                                                    @if(!empty($r['photo']))
                                                                        <img src="{{ url($r['photo']) }}" width="80" class="mt-2">
                                                                        <input type="hidden" name="old_student_photo[]" value="{{ $r['photo'] }}">
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-2" style="margin-top: 30px;">
                                                                <button type="button" class="btn btn-danger float-right remove-review">Remove</button>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @else
                                                    <!-- Default empty one row if no review data -->
                                                    <div class="row col-sm-12 add-more-review mt-2">
                                                        <div class="col-sm-3">
                                                            <div class="form-group">
                                                                <label>Student Name</label>
                                                                <input type="text" class="form-control" name="student_name[]" placeholder="Enter Student Name" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-5">
                                                            <div class="form-group">
                                                                <label>Review</label>
                                                                <input type="text" class="form-control" name="student_review[]" placeholder="Enter Review" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-2">
                                                            <div class="form-group">
                                                                <label>Student Photo</label>
                                                                <input type="file" class="form-control" name="student_photo[]" accept="image/*" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-2" style="margin-top: 30px;">
                                                            <button type="button" class="btn btn-danger float-right remove-review">Remove</button>
                                                        </div>
                                                    </div>
                                                @endif

                                                <div class="col-sm-12 mt-2">
                                                    <button type="button" class="btn btn-success float-right add-more-review-btn">Add More</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                                <div class="card-footer">
                                    <input type="hidden" name="id" value="{{@$package->id}}">
                                    <button type="submit" class="btn btn-warning float-right">Save</button>
                                </div>
                                {{ Form::close() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('js')
    <script src="{{url('/public/plugins/summernote/summernote-bs4.min.js')}}"></script>
    <!-- CodeMirror -->
    <script src="{{url('/public/plugins/codemirror/codemirror.js')}}"></script>
    <script src="{{url('/public/plugins/codemirror/mode/css/css.js')}}"></script>
    <script src="{{url('/public/plugins/codemirror/mode/xml/xml.js')}}"></script>
    <script src="{{url('/public/plugins/codemirror/mode/htmlmixed/htmlmixed.js')}}"></script>
    <script>
        $(document).on('click', '.delete', function(e){
            e.preventDefault();
            var id = $(this).data('id');
            $('.id').val(id);
        });
        $(function () {
            $('.summernote').summernote()
            CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
                mode: "htmlmixed",
                theme: "monokai"
            });
        })
    </script>
    <script>
        $(document).ready(function() {

            // ==========================
            // 🧑‍💼 Consultant Section
            // ==========================
            $(document).on('click', '.add-more-btn', function() {
                let html = `
                    <div class="row col-sm-12 add-more-consultant mt-2">
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label>Consultant Name</label>
                                <input type="text" class="form-control" name="consultant_name[]" placeholder="Enter Consultant Name" required>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Consultant Designation</label>
                                <input type="text" class="form-control" name="consultant_designation[]" placeholder="Enter Consultant Designation" required>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Consultant Institute</label>
                                <input type="text" class="form-control" name="consultant_institute[]" placeholder="Enter Consultant Institute" required>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label>Consultant Photo</label>
                                <input type="file" class="form-control" name="consultant_photo[]" accept="image/*" required>
                            </div>
                        </div>
                        <div class="col-sm-2" style="margin-top: 30px;">
                            <div class="form-group">
                                <button type="button" class="btn btn-danger float-right remove-consultant">Remove</button>
                            </div>
                        </div>
                    </div>`;
                $('.add-more-consultant:last').after(html);
            });

            $(document).on('click', '.remove-consultant', function() {
                $(this).closest('.add-more-consultant').remove();
            });



            // ==========================
            // 🎓 Review Section
            // ==========================
            $(document).on('click', '.add-more-review-btn', function() {
                let html = `
        <div class="row col-sm-12 add-more-review mt-2">
            <div class="col-sm-3">
                <div class="form-group">
                    <label>Student Name</label>
                    <input type="text" class="form-control" name="student_name[]" placeholder="Enter Student Name" required>
                </div>
            </div>
            <div class="col-sm-5">
                <div class="form-group">
                    <label>Review</label>
                    <input type="text" class="form-control" name="student_review[]" placeholder="Enter Review" required>
                </div>
            </div>
            <div class="col-sm-2">
                <div class="form-group">
                    <label>Student Photo</label>
                    <input type="file" class="form-control" name="student_photo[]" accept="image/*" required>
                </div>
            </div>
            <div class="col-sm-2" style="margin-top: 30px;">
                <div class="form-group">
                    <button type="button" class="btn btn-danger float-right remove-review">Remove</button>
                </div>
            </div>
        </div>`;
                $('.add-more-review:last').after(html);
            });

            $(document).on('click', '.remove-review', function() {
                $(this).closest('.add-more-review').remove();
            });

        });
    </script>

@endsection

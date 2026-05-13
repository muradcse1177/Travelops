@extends('mainLayout.layout')
@section('title','Trip Designer || Education University Management')
@section('websiteMenu','menu-open')
@section('webSettings','active')
@section('webEducationMenu','menu-open')
@section('WebEducation','active')
@section('webEduUniversityManagement','active')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Education University Management</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                        <li class="breadcrumb-item active">Education University Management</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">

            <!-- ============= Add New University ============= -->
            <div class="card card-warning collapsed-card">
                <div class="card-header">
                    <h3 class="card-title">Add New University</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button>
                    </div>
                </div>
                <div class="card-body">

                    {{-- ✅ Show success or error messages --}}
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {{ Form::open(['url'=>'webEduUniversity/store','method'=>'post','enctype'=>'multipart/form-data']) }}
                    {{ csrf_field() }}

                    <div class="row">
                        <div class="col-md-4">
                            <label>Country</label>
                            <select name="edu_country_id" class="form-control select2bs4" required>
                                <option value="">Select Country</option>
                                @foreach($countries as $country)
                                    <option value="{{ $country->id }}">{{ $country->country_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label>University Name *</label>
                            <input type="text" name="university_name" class="form-control" placeholder="Enter University Name" value="{{ old('university_name') }}">
                        </div>

                        <div class="col-md-4">
                            <label>Slug (optional)</label>
                            <input type="text" name="slug" class="form-control" placeholder="custom-slug-optional" value="{{ old('slug') }}">
                        </div>

                        <div class="col-md-4">
                            <label>Logo</label>
                            <input type="file" name="logo" class="form-control">
                        </div>

                        <div class="col-md-4">
                            <label>Cover Photo</label>
                            <input type="file" name="cover_photo" class="form-control">
                        </div>

                        <div class="col-md-4">
                            <label>International Students</label>
                            <input type="text" name="international_students" class="form-control" placeholder="e.g. 40,000+" value="{{ old('international_students') }}">
                        </div>

                        <div class="col-md-4">
                            <label>QS Ranking</label>
                            <input type="text" name="qs_ranking" class="form-control" placeholder="e.g. #125" value="{{ old('qs_ranking') }}">
                        </div>

                        <div class="col-md-4">
                            <label>Acceptance Rate</label>
                            <input type="text" name="acceptance_rate" class="form-control" placeholder="e.g. 60%" value="{{ old('acceptance_rate') }}">
                        </div>

                        <div class="col-md-4">
                            <label>Employability Rate</label>
                            <input type="text" name="employability_rate" class="form-control" placeholder="e.g. 95%" value="{{ old('employability_rate') }}">
                        </div>

                        <div class="col-md-4">
                            <label>Tuition Fee</label>
                            <input type="text" name="tuition_fee" class="form-control" placeholder="e.g. $10,000/year" value="{{ old('tuition_fee') }}">
                        </div>
                    </div>

                    <div class="form-group mt-3">
                        <label>Overview</label>
                        <textarea name="overview" class="form-control" rows="2" placeholder="Brief university overview">{{ old('overview') }}</textarea>
                    </div>

                    <div class="form-group">
                        <label>Student Life</label>
                        <textarea name="student_life" class="form-control" rows="2" placeholder="Describe student activities">{{ old('student_life') }}</textarea>
                    </div>

                    <div class="form-group">
                        <label>Accommodation</label>
                        <textarea name="accommodation" class="form-control" rows="2" placeholder="Accommodation information">{{ old('accommodation') }}</textarea>
                    </div>

                    <div class="form-group">
                        <label>Facilities</label>
                        <textarea name="facilities" class="form-control" rows="2" placeholder="Library, Labs, Sports, etc.">{{ old('facilities') }}</textarea>
                    </div>

                    <div class="form-group">
                        <label>Campus Details</label>
                        <textarea name="campus_details" class="form-control" rows="2" placeholder="Campus info and environment">{{ old('campus_details') }}</textarea>
                    </div>

                    <div class="form-group">
                        <label>Employability</label>
                        <textarea name="employability" class="form-control" rows="2" placeholder="Graduate job opportunities">{{ old('employability') }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-warning float-right">Save</button>
                    {{ Form::close() }}
                </div>
            </div>

            <!-- ============= University List ============= -->
            <div class="card card-info mt-4">
                <div class="card-header">
                    <h3 class="card-title">All Universities</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
               <div class="card-body bg-light pt-3 pb-1">
                    <form method="GET" action="{{ url('webEduUniversityManagement') }}">
                        <div class="form-row align-items-end">
                            <div class="form-group col-md-4">
                                <label><strong>Filter by Country</strong></label>
                                <select name="country_id" class="form-control select2bs4">
                                    <option value="">-- Select Country --</option>
                                    @foreach($countries as $country)
                                        <option value="{{ $country->id }}" 
                                            {{ (isset($filter_country) && $filter_country == $country->id) ? 'selected' : '' }}>
                                            {{ $country->country_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-md-4">
                                <label><strong>Search University</strong></label>
                                <input type="text" name="university_name" class="form-control" 
                                    value="{{ $filter_university ?? '' }}" 
                                    placeholder="Enter university name">
                            </div>

                            <div class="form-group col-md-4 text-right">
                                <button type="submit" class="btn btn-warning mt-4">
                                    <i class="fas fa-filter"></i> Apply Filter
                                </button>
                                <a href="{{ url('webEduUniversityManagement') }}" class="btn btn-secondary mt-4">
                                    <i class="fas fa-sync-alt"></i> Reset
                                </a>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="card-body table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Logo</th>
                                <th>University</th>
                                <th>Country</th>
                                <th>Students</th>
                                <th>QS Rank</th>
                                <th>Tuition</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i= ($universities->currentPage() - 1) * $universities->perPage() + 1; @endphp
                            @foreach($universities as $u)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>@if($u->logo)<img src="{{ asset($u->logo) }}" style="width:60px;height:auto;border-radius:5px;">@endif</td>
                                    <td>{{ $u->university_name }}</td>
                                    <td>{{ $u->country_name }}</td>
                                    <td>{{ $u->international_students }}</td>
                                    <td>{{ $u->qs_ranking }}</td>
                                    <td>{{ $u->tuition_fee }}</td>
                                    <td>
                                        <a href="{{ url('webEduUniversity/edit/'.$u->id) }}" class="btn btn-sm btn-info"><i class="fas fa-edit"></i></a>
                                        <button type="button" class="btn btn-sm btn-danger delete-btn"
                                                data-id="{{ $u->id }}"
                                                data-name="{{ $u->university_name }}"
                                                data-toggle="modal"
                                                data-target="#deleteModal">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- ✅ Pagination -->
                <div class="card-footer clearfix">
                    <div class="float-right">
                        {{ $universities->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>

            <!-- ============= Delete Modal ============= -->
            <div class="modal fade" id="deleteModal">
                <div class="modal-dialog">
                    <div class="modal-content bg-danger">
                        <div class="modal-body text-center">
                            <p>Are you sure you want to delete this university?</p>
                            <h5 class="uniName text-white font-weight-bold"></h5>
                        </div>
                        {{ Form::open(['url'=>'webEduUniversity/delete','method'=>'post']) }}
                        {{ csrf_field() }}
                        <div class="modal-footer justify-content-between">
                            <input type="hidden" name="id" class="uniId">
                            <button type="button" class="btn btn-outline-light" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-outline-light">Yes, Delete</button>
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>

        </div>
    </section>
</div>
@endsection

@section('js')
<script>
$('.select2').select2()
$('.select2bs4').select2({
    theme: 'bootstrap4',
})
$(document).on('click','.delete-btn',function(){
    $('.uniId').val($(this).data('id'));
    $('.uniName').text($(this).data('name'));
});
</script>

<style>
.pagination { margin: 0; float: right; }
.page-item.active .page-link { background-color: #17a2b8; border-color: #17a2b8; }
</style>
@endsection

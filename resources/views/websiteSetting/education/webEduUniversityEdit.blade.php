@extends('mainLayout.layout')
@section('title','Trip Designer || Edit University')
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
                    <h1>Edit University - {{ $university->university_name }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{url('webEduUniversityManagement')}}">University Management</a></li>
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
                    <h3 class="card-title">Update University Info</h3>
                </div>
                <div class="card-body">

                    {{-- ✅ Show Messages --}}
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

                    {{ Form::open(['url'=>'webEduUniversity/update/'.$university->id,'method'=>'post','enctype'=>'multipart/form-data']) }}
                    {{ csrf_field() }}

                    <div class="row">
                        <div class="col-md-4">
                            <label>Country</label>
                            <select name="edu_country_id" class="form-control" required>
                                <option value="">Select Country</option>
                                @foreach($countries as $country)
                                    <option value="{{ $country->id }}" {{ $country->id == $university->edu_country_id ? 'selected' : '' }}>
                                        {{ $country->country_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label>University Name *</label>
                            <input type="text" name="university_name" class="form-control"
                                   value="{{ $university->university_name }}" placeholder="Enter University Name">
                        </div>

                        <div class="col-md-4">
                            <label>Slug (optional)</label>
                            <input type="text" name="slug" class="form-control"
                                   value="{{ $university->slug }}" placeholder="custom-slug-optional">
                        </div>

                        <div class="col-md-6 mt-2">
                            <label>Current Logo</label><br>
                            @if($university->logo)
                                <img src="{{ asset($university->logo) }}" style="width:100px;height:auto;border-radius:5px;">
                            @else
                                <span class="text-muted">No logo uploaded</span>
                            @endif
                            <input type="file" name="logo" class="form-control mt-2">
                        </div>

                        <div class="col-md-6 mt-2">
                            <label>Current Cover Photo</label><br>
                            @if($university->cover_photo)
                                <img src="{{ asset($university->cover_photo) }}" style="width:120px;height:auto;border-radius:5px;">
                            @else
                                <span class="text-muted">No cover photo uploaded</span>
                            @endif
                            <input type="file" name="cover_photo" class="form-control mt-2">
                        </div>

                        <div class="col-md-4 mt-2">
                            <label>International Students</label>
                            <input type="text" name="international_students" class="form-control"
                                   value="{{ $university->international_students }}" placeholder="e.g. 40,000+">
                        </div>

                        <div class="col-md-4 mt-2">
                            <label>QS Ranking</label>
                            <input type="text" name="qs_ranking" class="form-control"
                                   value="{{ $university->qs_ranking }}" placeholder="e.g. #125">
                        </div>

                        <div class="col-md-4 mt-2">
                            <label>Acceptance Rate</label>
                            <input type="text" name="acceptance_rate" class="form-control"
                                   value="{{ $university->acceptance_rate }}" placeholder="e.g. 60%">
                        </div>

                        <div class="col-md-4 mt-2">
                            <label>Employability Rate</label>
                            <input type="text" name="employability_rate" class="form-control"
                                   value="{{ $university->employability_rate }}" placeholder="e.g. 95%">
                        </div>

                        <div class="col-md-4 mt-2">
                            <label>Tuition Fee</label>
                            <input type="text" name="tuition_fee" class="form-control"
                                   value="{{ $university->tuition_fee }}" placeholder="e.g. $10,000/year">
                        </div>
                    </div>

                    <div class="form-group mt-3">
                        <label>Overview</label>
                        <textarea name="overview" class="form-control" rows="2"
                                  placeholder="Brief university overview">{{ $university->overview }}</textarea>
                    </div>

                    <div class="form-group">
                        <label>Student Life</label>
                        <textarea name="student_life" class="form-control" rows="2"
                                  placeholder="Describe student activities">{{ $university->student_life }}</textarea>
                    </div>

                    <div class="form-group">
                        <label>Accommodation</label>
                        <textarea name="accommodation" class="form-control" rows="2"
                                  placeholder="Accommodation information">{{ $university->accommodation }}</textarea>
                    </div>

                    <div class="form-group">
                        <label>Facilities</label>
                        <textarea name="facilities" class="form-control" rows="2"
                                  placeholder="Library, Labs, Sports, etc.">{{ $university->facilities }}</textarea>
                    </div>

                    <div class="form-group">
                        <label>Campus Details</label>
                        <textarea name="campus_details" class="form-control" rows="2"
                                  placeholder="Campus info and environment">{{ $university->campus_details }}</textarea>
                    </div>

                    <div class="form-group">
                        <label>Employability</label>
                        <textarea name="employability" class="form-control" rows="2"
                                  placeholder="Graduate job opportunities">{{ $university->employability }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-warning float-right">Update</button>
                    <a href="{{ url('webEduUniversityManagement') }}" class="btn btn-secondary float-left">Back</a>

                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

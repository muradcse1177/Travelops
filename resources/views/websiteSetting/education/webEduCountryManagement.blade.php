@extends('mainLayout.layout')
@section('title','Trip Designer || Education Country Management')

@section('websiteMenu','menu-open')
@section('webSettings','active')

@section('webEducationMenu','menu-open')
@section('WebEducation','active')
@section('webEduCountryManagement','active')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Education Country Management</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                        <li class="breadcrumb-item active">Education Country Management</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">

            <!-- ================= Add Country (Collapsed by default) ================= -->
            <div class="card card-warning collapsed-card">
                <div class="card-header">
                    <h3 class="card-title">Add New Country</h3>
                    <div class="card-tools">
                        <!-- Collapse toggle button -->
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>
                </div>

                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    {{ Form::open(['url' => 'webEduCountryManagement/store', 'method' => 'post', 'enctype' => 'multipart/form-data']) }}
                    {{ csrf_field() }}

                    <div class="row">
                        <div class="col-md-4">
                            <label>Country Name *</label>
                            <input type="text" name="country_name" class="form-control" placeholder="Enter Country Name" value="{{ old('country_name') }}">
                        </div>

                        <div class="col-md-4">
                            <label>Slug (auto optional)</label>
                            <input type="text" name="slug" class="form-control" placeholder="custom-slug-optional" value="{{ old('slug') }}">
                        </div>

                        <div class="col-md-4">
                            <label>International Students</label>
                            <input type="text" name="international_students" class="form-control" placeholder="e.g. 50,000+" value="{{ old('international_students') }}">
                        </div>

                        <div class="col-md-4">
                            <label>Happiness Ranking</label>
                            <input type="text" name="happiness_ranking" class="form-control" placeholder="#12" value="{{ old('happiness_ranking') }}">
                        </div>

                        <div class="col-md-4">
                            <label>Employment Rate</label>
                            <input type="text" name="employment_rate" class="form-control" placeholder="95%" value="{{ old('employment_rate') }}">
                        </div>

                        <div class="col-md-4">
                            <label>Start Date</label>
                            <input type="text" name="start_date" class="form-control" placeholder="Feb, Oct" value="{{ old('start_date') }}">
                        </div>

                        <div class="col-md-4">
                            <label>Minimum Wage</label>
                            <input type="text" name="min_wage" class="form-control" placeholder="$1000/month" value="{{ old('min_wage') }}">
                        </div>

                        <div class="col-md-4">
                            <label>Max Work Hours</label>
                            <input type="text" name="max_work_hours" class="form-control" placeholder="40 hrs/week" value="{{ old('max_work_hours') }}">
                        </div>

                        <div class="col-md-6">
                            <label>Cover Photo</label>
                            <input type="file" name="cover_photo" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label>Page Photo</label>
                            <input type="file" name="page_photo" class="form-control">
                        </div>
                    </div>

                    <div class="form-group mt-3">
                        <label>Cost of Living</label>
                        <textarea name="cost_of_living" class="form-control" rows="2" placeholder="Describe cost of living">{{ old('cost_of_living') }}</textarea>
                    </div>

                    <div class="form-group">
                        <label>Visa & Work Permit</label>
                        <textarea name="visa_work_permit" class="form-control" rows="2" placeholder="Visa and work permit details">{{ old('visa_work_permit') }}</textarea>
                    </div>

                    <div class="form-group">
                        <label>Employment Opportunities</label>
                        <textarea name="employment_opportunities" class="form-control" rows="2" placeholder="Describe job opportunities">{{ old('employment_opportunities') }}</textarea>
                    </div>

                    <div class="form-group">
                        <label>Why Study</label>
                        <textarea name="why_study" class="form-control" rows="2" placeholder="Reasons to study here">{{ old('why_study') }}</textarea>
                    </div>

                    <div class="form-group">
                        <label>Best Universities</label>
                        <textarea name="best_universities" class="form-control" rows="2" placeholder="Top universities">{{ old('best_universities') }}</textarea>
                    </div>

                    <div class="form-group">
                        <label>Popular Programs</label>
                        <textarea name="popular_programs" class="form-control" rows="2" placeholder="Popular programs">{{ old('popular_programs') }}</textarea>
                    </div>

                    <div class="form-group">
                        <label>What Sets Apart</label>
                        <textarea name="what_sets_apart" class="form-control" rows="2" placeholder="Special qualities">{{ old('what_sets_apart') }}</textarea>
                    </div>

                    <div class="form-group">
                        <label>Student Life</label>
                        <textarea name="student_life" class="form-control" rows="2" placeholder="Student experience">{{ old('student_life') }}</textarea>
                    </div>

                    <!-- ✅ Dynamic FAQ -->
                    <div class="form-group">
                        <label>FAQ Section</label>
                        <div id="faq-wrapper">
                            <div class="faq-item border p-3 mb-2 rounded">
                                <div class="form-group">
                                    <label>Question</label>
                                    <input type="text" name="faq_question[]" class="form-control" placeholder="Enter Question">
                                </div>
                                <div class="form-group">
                                    <label>Answer</label>
                                    <textarea name="faq_answer[]" class="form-control" rows="2" placeholder="Enter Answer"></textarea>
                                </div>
                                <button type="button" class="btn btn-danger btn-sm remove-faq">Remove</button>
                            </div>
                        </div>
                        <button type="button" class="btn btn-success btn-sm mt-2" id="add-faq">+ Add More FAQ</button>
                    </div>

                    <button type="submit" class="btn btn-warning float-right">Save</button>
                    {{ Form::close() }}
                </div>
            </div>

            <!-- ================= Country List ================= -->
            <div class="card card-info mt-4">
                <div class="card-header">
                    <h3 class="card-title">All Countries</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Country</th>
                                <th>Employment Rate</th>
                                <th>Happiness Rank</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i = 1; @endphp
                            @foreach($countries as $c)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $c->country_name }}</td>
                                    <td>{{ $c->employment_rate }}</td>
                                    <td>{{ $c->happiness_ranking }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-info btn-sm">Action</button>
                                            <button type="button" class="btn btn-info btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                                <span class="sr-only">Toggle Dropdown</span>
                                            </button>
                                            <div class="dropdown-menu" role="menu">
                                                <a class="dropdown-item" href="{{ url('webEduCountryManagement/edit/'.$c->id) }}">
                                                    <i class="fas fa-edit"></i> Edit
                                                </a>
                                                <a class="dropdown-item delete" href="#" data-id="{{ $c->id }}" data-toggle="modal" data-target="#modal-danger">
                                                    <i class="fas fa-trash-alt text-danger"></i> Delete
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


            <!-- Delete Modal -->
            <div class="modal fade" id="modal-danger">
                <div class="modal-dialog">
                    <div class="modal-content bg-danger">
                        <div class="modal-body text-center"><p>Are you sure to delete this country?</p></div>
                        {{ Form::open(['url' => 'webEduCountryManagement/delete', 'method' => 'post']) }}
                        {{ csrf_field() }}
                        <div class="modal-footer justify-content-between">
                            <input type="hidden" name="id" class="id">
                            <button type="submit" class="btn btn-outline-light">Delete</button>
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
$(document).on('click','.delete',function(){
    $('.id').val($(this).data('id'));
});

// ✅ Dynamic FAQ add/remove
$('#add-faq').click(function() {
    let faqHtml = `
        <div class="faq-item border p-3 mb-2 rounded">
            <div class="form-group">
                <label>Question</label>
                <input type="text" name="faq_question[]" class="form-control" placeholder="Enter Question">
            </div>
            <div class="form-group">
                <label>Answer</label>
                <textarea name="faq_answer[]" class="form-control" rows="2" placeholder="Enter Answer"></textarea>
            </div>
            <button type="button" class="btn btn-danger btn-sm remove-faq">Remove</button>
        </div>`;
    $('#faq-wrapper').append(faqHtml);
});
$(document).on('click','.remove-faq',function(){
    $(this).closest('.faq-item').remove();
});
</script>
@endsection

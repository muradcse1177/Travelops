@extends('mainLayout.layout')
@section('title','Trip Designer || Edit Education Country')
@section('webEduCountryManagement','active')
@section('WebEducation','menu-open')
@section('webEducationMenu','active')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Country: {{ $country->country_name }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{url('webEduCountryManagement')}}">Education Country Management</a></li>
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
                    <h3 class="card-title">Update Country Info</h3>
                </div>

                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
                        </div>
                    @endif

                    {{ Form::open(['url' => 'webEduCountryManagement/update/'.$country->id, 'method' => 'post', 'enctype' => 'multipart/form-data']) }}
                    {{ csrf_field() }}

                    <div class="row">
                        <div class="col-md-4">
                            <label>Country Name *</label>
                            <input type="text" name="country_name" class="form-control" value="{{ $country->country_name }}">
                        </div>

                        <div class="col-md-4">
                            <label>Slug</label>
                            <input type="text" name="slug" class="form-control" value="{{ $country->slug }}">
                        </div>

                        <div class="col-md-4">
                            <label>International Students</label>
                            <input type="text" name="international_students" class="form-control" value="{{ $country->international_students }}">
                        </div>

                        <div class="col-md-4">
                            <label>Happiness Ranking</label>
                            <input type="text" name="happiness_ranking" class="form-control" value="{{ $country->happiness_ranking }}">
                        </div>

                        <div class="col-md-4">
                            <label>Employment Rate</label>
                            <input type="text" name="employment_rate" class="form-control" value="{{ $country->employment_rate }}">
                        </div>

                        <div class="col-md-4">
                            <label>Start Date</label>
                            <input type="text" name="start_date" class="form-control" value="{{ $country->start_date }}">
                        </div>

                        <div class="col-md-4">
                            <label>Min Wage</label>
                            <input type="text" name="min_wage" class="form-control" value="{{ $country->min_wage }}">
                        </div>

                        <div class="col-md-4">
                            <label>Max Work Hours</label>
                            <input type="text" name="max_work_hours" class="form-control" value="{{ $country->max_work_hours }}">
                        </div>

                        <div class="col-md-6">
                            <label>Current Cover Photo</label><br>
                            @if($country->cover_photo)
                                <img src="{{ url($country->cover_photo) }}" style="width:100px;height:auto;border-radius:8px;">
                            @endif
                            <input type="file" name="cover_photo" class="form-control mt-2">
                        </div>

                        <div class="col-md-6">
                            <label>Current Page Photo</label><br>
                            @if($country->page_photo)
                                <img src="{{ url($country->page_photo) }}" style="width:100px;height:auto;border-radius:8px;">
                            @endif
                            <input type="file" name="page_photo" class="form-control mt-2">
                        </div>
                    </div>

                    <div class="form-group mt-3">
                        <label>Cost of Living</label>
                        <textarea name="cost_of_living" class="form-control" rows="2">{{ $country->cost_of_living }}</textarea>
                    </div>

                    <div class="form-group">
                        <label>Visa & Work Permit</label>
                        <textarea name="visa_work_permit" class="form-control" rows="2">{{ $country->visa_work_permit }}</textarea>
                    </div>

                    <div class="form-group">
                        <label>Employment Opportunities</label>
                        <textarea name="employment_opportunities" class="form-control" rows="2">{{ $country->employment_opportunities }}</textarea>
                    </div>

                    <div class="form-group">
                        <label>Why Study</label>
                        <textarea name="why_study" class="form-control" rows="2">{{ $country->why_study }}</textarea>
                    </div>

                    <div class="form-group">
                        <label>Best Universities</label>
                        <textarea name="best_universities" class="form-control" rows="2">{{ $country->best_universities }}</textarea>
                    </div>

                    <div class="form-group">
                        <label>Popular Programs</label>
                        <textarea name="popular_programs" class="form-control" rows="2">{{ $country->popular_programs }}</textarea>
                    </div>

                    <div class="form-group">
                        <label>What Sets Apart</label>
                        <textarea name="what_sets_apart" class="form-control" rows="2">{{ $country->what_sets_apart }}</textarea>
                    </div>

                    <div class="form-group">
                        <label>Student Life</label>
                        <textarea name="student_life" class="form-control" rows="2">{{ $country->student_life }}</textarea>
                    </div>

                    <!-- ✅ FAQ Edit -->
                    <div class="form-group">
                        <label>FAQ Section</label>
                        <div id="faq-wrapper">
                            @if(!empty($faqs))
                                @foreach($faqs as $faq)
                                    <div class="faq-item border p-3 mb-2 rounded">
                                        <div class="form-group">
                                            <label>Question</label>
                                            <input type="text" name="faq_question[]" class="form-control" value="{{ $faq['question'] }}">
                                        </div>
                                        <div class="form-group">
                                            <label>Answer</label>
                                            <textarea name="faq_answer[]" class="form-control" rows="2">{{ $faq['answer'] }}</textarea>
                                        </div>
                                        <button type="button" class="btn btn-danger btn-sm remove-faq">Remove</button>
                                    </div>
                                @endforeach
                            @else
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
                            @endif
                        </div>
                        <button type="button" class="btn btn-success btn-sm mt-2" id="add-faq">+ Add More FAQ</button>
                    </div>

                    <button type="submit" class="btn btn-warning float-right">Update</button>
                    {{ Form::close() }}
                </div>
            </div>

        </div>
    </section>
</div>
@endsection

@section('js')
<script>
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

$(document).on('click', '.remove-faq', function() {
    $(this).closest('.faq-item').remove();
});
</script>
@endsection

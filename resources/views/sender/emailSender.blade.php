@extends('mainLayout.layout')
@section('title','Trip Designer || Email Management ')
@section('sender','active')
@section('senderMenu','menu-open')
@section('emailSender','active')
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

    <!-- Page Header -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Email Management</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                        <li class="breadcrumb-item active">Email Sender</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <section class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-12">

                    <!-- Email Form Card -->
                    <div class="card card-warning">
                        <div class="card-header">
                            <h3 class="card-title">Send New Email</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>

                        <div class="card-body">

                            <!-- Email Form -->
                            <form action="{{ url('sendEmail') }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                                @csrf

                                <div class="row card-body">

                                    <!-- Select Email Type -->
                                    <div class="col-sm-4">
                                        <label>Email Type</label>
                                        <select class="form-control select2bs4 emailType" name="email_type" required>
                                            <option value="" selected>Select Type</option>
                                            <option value="single">Send to Single Email</option>
                                            <option value="multiple">Send to Multiple Emails</option>
                                            <option value="excel">Upload XLS (Excel)</option>
                                        </select>
                                    </div>

                                    <!-- Single or Multiple Email Input -->
                                    <div class="col-sm-12 email-input" style="display:none;">
                                        <label>Email Address (Comma separated for multiple)</label>
                                        <input type="text" class="form-control" name="emails"
                                               placeholder="example@mail.com, test@mail.com">
                                    </div>

                                    <!-- Excel Upload -->
                                    <div class="col-sm-12 excel-upload" style="display:none;">
                                        <label>Upload Excel File (.xls, .xlsx)</label>
                                        <input type="file" class="form-control" name="excel_file" accept=".xls,.xlsx">
                                    </div>

                                    <!-- Email Subject -->
                                    <div class="col-sm-12 mt-3">
                                        <label>Email Subject</label>
                                        <input type="text" class="form-control" name="subject" placeholder="Enter Email Subject" required>
                                    </div>

                                    <!-- Email Body -->
                                    <div class="col-sm-12 mt-3">
                                        <label>Email Body</label>
                                        <textarea class="form-control summernote" name="message" rows="6" placeholder="Write your email body here..." required>Write your email body here...</textarea>
                                    </div>
                                    <div class="col-sm-12 mt-3">
                                        <label>Email Attachment (You can upload multiple files)</label>
                                        <input type="file" class="form-control" name="attachments[]" multiple>
                                        <small class="text-muted">You can upload PDF, DOCX, JPG, PNG, XLSX, etc.</small>
                                    </div>
                                </div>

                                <!-- Submit -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-warning">Send Email</button>
                                </div>

                            </form>
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
        $(function () {
            $('.summernote').summernote()
            CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
                mode: "htmlmixed",
                theme: "monokai"
            });
        })
    </script>
<script>
    // Enable Select2
    $('.select2bs4').select2({ theme: 'bootstrap4' });

    // Email Type Handler
    $('.emailType').change(function() {
        let type = $(this).val();

        $('.email-input').hide();
        $('.excel-upload').hide();

        if (type === 'single' || type === 'multiple') {
            $('.email-input').show();
        }

        if (type === 'excel') {
            $('.excel-upload').show();
        }
    });
</script>
@endsection

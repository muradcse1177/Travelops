@extends('mainLayout.layout')
@section('title', 'Role & Permission Assignment')

@section('hr','active')
@section('hrMenu','menu-open')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><i class="fas fa-user-shield"></i> Role & Permission Assignment</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item active">Role Assign</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">

            <!-- Main Card -->
            <div class="card card-outline card-primary shadow-sm">
                <div class="card-header bg-gradient-primary text-white">
                    <h3 class="card-title">
                        <i class="fas fa-key"></i> Assign Menu Permissions
                    </h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{ route('role.assign.store') }}" method="POST" id="permissionForm">
                        @csrf

                        <!-- Select Designation -->
                        <div class="row mb-4">
                            <div class="col-lg-5">
                                <label class="font-weight-bold text-primary">
                                    <i class="fas fa-user-tag"></i> Select Designation <span class="text-danger">*</span>
                                </label>
                                <select name="designation" class="form-control form-control-lg select2bs4" required style="width: 100%;">
                                    <option value="">Choose a designation</option>
                                    @foreach($designations as $des)
                                        <option value="{{ $des->name }}">{{ $des->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-3 mt-4 pt-2">
                                <button type="button" id="selectAllBtn" class="btn btn-success btn-sm">
                                    <i class="fas fa-check-double"></i> Select All
                                </button>
                                <button type="button" id="deselectAllBtn" class="btn btn-danger btn-sm">
                                    <i class="fas fa-times"></i> Clear All
                                </button>
                            </div>
                        </div>

                        <hr class="bg-primary">

                        <!-- Menu Permissions -->
                        <div class="row">
                            @foreach($menus as $menu)
                                <div class="col-lg-6 col-xl-4 mb-4">
                                    <div class="card border-left-primary shadow-sm h-100">
                                        <div class="card-body p-2  rounded-lg" style="background-color: rgb(224, 224, 224);">
                                            <!-- Parent Menu -->
                                            <div class="form-group mb-2">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input parent-check" 
                                                           id="menu-{{ $menu->id }}" name="menus[]" value="{{ $menu->id }}">
                                                    <label class="custom-control-label font-weight-bold text-primary" for="menu-{{ $menu->id }}">
                                                        <i class="{{ $menu->icon ?: 'fas fa-folder' }}"></i> {{ $menu->name }}
                                                    </label>
                                                </div>
                                            </div>

                                            <!-- Children -->
                                            @if($menu->children->count())
                                                <div class="ml-4">
                                                    @foreach($menu->children as $child)
                                                        <div class="form-group mb-2">
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input child-check" 
                                                                       id="child-{{ $child->id }}" name="menus[]" value="{{ $child->id }}"
                                                                       data-parent="{{ $menu->id }}">
                                                                <label class="custom-control-label text-success" for="child-{{ $child->id }}">
                                                                    <i class="far fa-circle"></i> {{ $child->name }}
                                                                </label>
                                                            </div>

                                                            <!-- Grand Children -->
                                                            @if($child->children->count())
                                                                <div class="ml-4 mt-2">
                                                                    @foreach($child->children as $grand)
                                                                        <div class="custom-control custom-checkbox mb-1">
                                                                            <input type="checkbox" class="custom-control-input grand-check" 
                                                                                   id="grand-{{ $grand->id }}" name="menus[]" value="{{ $grand->id }}"
                                                                                   data-parent="{{ $child->id }}">
                                                                            <label class="custom-control-label text-info" for="grand-{{ $grand->id }}">
                                                                                <i class="far fa-dot-circle"></i> {{ $grand->name }}
                                                                            </label>
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            @endif
                                                        </div>
                                                    @endforeach
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <!-- Save Button -->
                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-lg btn-primary shadow px-5">
                                <i class="fas fa-save"></i> Save Permissions
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Current Roles Summary -->
            <div class="card card-info mt-5 shadow-sm">
                <div class="card-header bg-gradient-info text-white">
                    <h3 class="card-title"><i class="fas fa-list-alt"></i> Current Role Permissions</h3>
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped table-hover mb-0">
                        <thead class="bg-light">
                            <tr>
                                <th width="5%">#</th>
                                <th>Designation</th>
                                <th width="60%">Assigned Menus</th>
                                <th width="10%">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $sl = 1 @endphp
                            @foreach(DB::table('roles')->orderBy('designation')->get() as $role)
                                <tr>
                                    <td>{{ $sl++ }}</td>
                                    <td><strong class="text-primary">{{ $role->designation }}</strong></td>
                                    <td>
                                        @php $perms = is_null($role->details) ? [] : json_decode($role->details, true) @endphp
                                        @if($role->designation === 'Super Admin' || is_null($role->details))
                                            <span class="badge badge-danger">ALL ACCESS (Super Admin)</span>
                                        @elseif(is_array($perms) && count($perms))
                                            @foreach($perms as $id)
                                                @php $m = DB::table('menu_items')->where('id', $id)->first() @endphp
                                                @if($m)
                                                    <span class="badge badge-success mr-1 mb-1">{{ $m->name }}</span>
                                                @endif
                                            @endforeach
                                        @else
                                            <span class="text-muted">No menu assigned</span>
                                        @endif
                                    </td>
                                    <td>
                                        <span class="badge badge-lg badge-warning">
                                            {{ $role->designation === 'Super Admin' ? '∞' : (is_array($perms) ? count($perms) : 0) }}
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </section>
</div>
@endsection

@section('js')
<script>
    $(document).ready(function() {
        $('.select2bs4').select2({
            theme: 'bootstrap4',
            placeholder: "Select designation"
        });

        // Parent → Child → Grand Auto Check
        $('.parent-check').on('change', function() {
            let checked = this.checked;
            $('.child-check[data-parent="' + this.value + '"], .grand-check[data-parent="' + this.value + '"]')
                .prop('checked', checked);
        });

        // Child → Grand Auto Check
        $('.child-check').on('change', function() {
            let checked = this.checked;
            $('.grand-check[data-parent="' + this.value + '"]').prop('checked', checked);
            if (!checked) {
                $('#menu-' + $(this).data('parent')).prop('checked', false);
            }
        });

        // Select All / Clear All
        $('#selectAllBtn').click(function() {
            $('input[type="checkbox"]').prop('checked', true);
        });
        $('#deselectAllBtn').click(function() {
            $('input[type="checkbox"]').prop('checked', false);
        });

        // Load existing permissions when designation selected
        $('select[name="designation"]').on('change', function() {
            let des = $(this).val();
            $('input[type="checkbox"]').prop('checked', false);

            @foreach(DB::table('roles')->get() as $role)
                if (des === '{{ $role->designation }}') {
                    let perms = {!! is_null($role->details) ? '[]' : $role->details !!};
                    if (Array.isArray(perms)) {
                        perms.forEach(id => {
                            $('input[value="' + id + '"]').prop('checked', true);
                        });
                    }
                }
            @endforeach
        });
    });
</script>
@endsection
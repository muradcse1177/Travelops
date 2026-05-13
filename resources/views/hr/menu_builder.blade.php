@extends('mainLayout.layout')
@section('title', 'Menu Builder')
@section('hr','active')
@section('hrMenu','menu-open')

@section('content')
<div class="content-wrapper">
    <!-- Content Header -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><i class="fas fa-sitemap"></i> Menu Builder</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item active">Menu Builder</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <!-- ==================== ADD / EDIT FORM ==================== -->
            <div class="card card-outline card-primary shadow-sm mb-4">
                <div class="card-header bg-primary text-white">
                    <h3 class="card-title font-weight-bold">
                        <i class="fas fa-plus-circle"></i>
                        {{ isset($editMenu) ? 'Edit Menu Item' : 'Add New Menu / Submenu' }}
                    </h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{ isset($editMenu) ? route('menu.update', $editMenu->id) : route('menu.store') }}" method="POST">
                        @csrf
                        @if(isset($editMenu)) @method('PUT') @endif

                        <div class="row">
                            <!-- Menu Name -->
                            <div class="col-lg-5">
                                <div class="form-group">
                                    <label class="font-weight-bold text-primary">
                                        <i class="fas fa-tag"></i> Menu Name <span class="text-danger">*</span>
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-primary text-white"><i class="fas fa-heading"></i></span>
                                        </div>
                                        <input type="text" name="name" class="form-control" 
                                               value="{{ old('name', $editMenu->name ?? '') }}" 
                                               placeholder="e.g. Air Ticket, Reports, Settings" required>
                                    </div>
                                </div>
                            </div>

                            <!-- Route Name -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="font-weight-bold text-info">
                                        <i class="fas fa-route"></i> Route Name
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-info text-white"><i class="fas fa-link"></i></span>
                                        </div>
                                        <input type="text" name="route" class="form-control" 
                                               value="{{ old('route', $editMenu->route ?? '') }}"
                                               placeholder="e.g. newAirTicket (leave blank for parent menu)">
                                    </div>
                                </div>
                            </div>

                            <!-- Icon -->
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label class="font-weight-bold text-success">
                                        <i class="fas fa-icons"></i> Icon Class
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-success text-white"><i class="fas fa-image"></i></span>
                                        </div>
                                        <input type="text" name="icon" class="form-control" 
                                               value="{{ old('icon', $editMenu->icon ?? '') }}"
                                               placeholder="e.g. fas fa-plane">
                                    </div>
                                    <small class="text-muted">
                                        <a href="https://fontawesome.com/v5/search" target="_blank" class="text-success">Find Icon →</a>
                                    </small>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <!-- Parent Menu -->
                            <div class="col-lg-5">
                                <div class="form-group">
                                    <label class="font-weight-bold text-warning">
                                        <i class="fas fa-sitemap"></i> Parent Menu
                                    </label>
                                    <select name="parent_id" class="form-control select2bs4" style="width: 100%;">
                                        <option value="none">Main Menu (No Parent)</option>
                                        @foreach($menus as $m)
                                            <option value="{{ $m->id }}" {{ (old('parent_id', $editMenu->parent_id ?? '') == $m->id) ? 'selected' : '' }}>
                                                {{ $m->name }}
                                            </option>
                                            @foreach($m->children as $c)
                                                <option value="{{ $c->id }}" {{ (old('parent_id', $editMenu->parent_id ?? '') == $c->id) ? 'selected' : '' }}>
                                                    └─ {{ $c->name }}
                                                </option>
                                                @foreach($c->children as $g)
                                                    <option value="{{ $g->id }}" {{ (old('parent_id', $editMenu->parent_id ?? '') == $g->id) ? 'selected' : '' }}>
                                                        &nbsp;&nbsp;&nbsp;└─ {{ $g->name }}
                                                    </option>
                                                @endforeach
                                            @endforeach
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <!-- Sort Order -->
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label class="font-weight-bold text-danger">
                                        <i class="fas fa-sort-numeric-up"></i> Sort Order
                                    </label>
                                    <input type="number" name="order" class="form-control text-center" 
                                           value="{{ old('order', $editMenu->order ?? 0) }}" 
                                           placeholder="0">
                                </div>
                            </div>

                            <!-- External Link Switch -->
                            <div class="col-lg-2">
                                <div class="form-group mt-4">
                                    <div class="custom-control custom-switch custom-switch-on-success">
                                        <input type="checkbox" class="custom-control-input" id="isExternal" name="is_external"
                                               {{ old('is_external', $editMenu->is_external ?? false) ? 'checked' : '' }}>
                                        <label class="custom-control-label font-weight-bold" for="isExternal">External Link</label>
                                    </div>
                                </div>
                            </div>

                            <!-- External URL -->
                            <div class="col-lg-3" id="urlField" style="display: {{ old('is_external', $editMenu->is_external ?? false) ? 'block' : 'none' }};">
                                <div class="form-group">
                                    <label class="font-weight-bold text-purple">
                                        <i class="fas fa-external-link-alt"></i> External URL
                                    </label>
                                    <input type="url" name="url" class="form-control" 
                                           value="{{ old('url', $editMenu->url ?? '') }}"
                                           placeholder="https://example.com">
                                </div>
                            </div>
                        </div>

                        <div class="text-right mt-4">
                            <button type="submit" class="btn btn-lg btn-success shadow-sm px-5">
                                <i class="fas fa-save"></i>
                                {{ isset($editMenu) ? 'Update Menu' : 'Add Menu' }}
                            </button>
                            @if(isset($editMenu))
                                <a href="{{ route('menu.builder') }}" class="btn btn-lg btn-secondary ml-2">
                                    <i class="fas fa-times"></i> Cancel
                                </a>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
            <!-- ==================== END FORM ==================== -->

            <!-- ==================== MENU LIST ==================== -->
            <div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">Designation Management</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <div class="card-body">
        <table id="example11" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th width="5%">S.L</th>
                    <th width="30%">Menu Name</th>
                    <th width="20%">Route</th>
                    <th width="15%">Icon</th>
                    <th width="10%">Type</th>
                    <th width="10%">Order</th>
                    <th width="10%">Action</th>
                </tr>
            </thead>
            <tbody>
                @php $sl = 1; @endphp
                @forelse($menus as $menu)
                    <!-- Main Menu -->
                    <tr style="background-color: #d4edda;">
                        <td>{{ $sl++ }}</td>
                        <td><strong>{{ $menu->name }}</strong></td>
                        <td>{{ $menu->route ?? '-' }}</td>
                        <td><i class="{{ $menu->icon }}"></i></td>
                        <td><span class="badge badge-success">Main Menu</span></td>
                        <td>{{ $menu->order }}</td>
                        <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-info btn-sm">Action</button>
                                <button type="button" class="btn btn-info btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <div class="dropdown-menu" role="menu">
                                    <a href="{{ route('menu.edit', $menu->id) }}" class="dropdown-item">Edit</a>
                                    <div class="dropdown-divider"></div>
                                    <form action="{{ route('menu.delete', $menu->id) }}" method="POST" style="display:inline">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="dropdown-item text-danger" 
                                                onclick="return confirm('Delete this menu and all submenus?')">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>

                    <!-- Submenu Level 1 -->
                    @foreach($menu->children as $child)
                        <tr style="background-color: #fff3cd;">
                            <td>{{ $sl++ }}</td>
                            <td>&nbsp;&nbsp;&nbsp;└─ {{ $child->name }}</td>
                            <td>{{ $child->route ?? '-' }}</td>
                            <td></td>
                            <td><span class="badge badge-warning">Submenu</span></td>
                            <td>{{ $child->order }}</td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-info btn-sm">Action</button>
                                    <button type="button" class="btn btn-info btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <div class="dropdown-menu" role="menu">
                                        <a href="{{ route('menu.edit', $child->id) }}" class="dropdown-item">Edit</a>
                                        <div class="dropdown-divider"></div>
                                        <form action="{{ route('menu.delete', $child->id) }}" method="POST" style="display:inline">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="dropdown-item text-danger" 
                                                    onclick="return confirm('Delete this submenu?')">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>

                        <!-- Nested Level 2 -->
                        @foreach($child->children as $grand)
                            <tr style="background-color: #f8d7da;">
                                <td>{{ $sl++ }}</td>
                                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;└─ {{ $grand->name }}</td>
                                <td>{{ $grand->route ?? '-' }}</td>
                                <td></td>
                                <td><span class="badge badge-danger">Nested</span></td>
                                <td>{{ $grand->order }}</td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-info btn-sm">Action</button>
                                        <button type="button" class="btn btn-info btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                            <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <div class="dropdown-menu" role="menu">
                                            <a href="{{ route('menu.edit', $grand->id) }}" class="dropdown-item">Edit</a>
                                            <div class="dropdown-divider"></div>
                                            <form action="{{ route('menu.delete', $grand->id) }}" method="POST" style="display:inline">
                                                @csrf @method('DELETE')
                                                <button type="submit" class="dropdown-item text-danger" 
                                                        onclick="return confirm('Delete this nested menu?')">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @endforeach
                @empty
                    <tr>
                        <td colspan="7" class="text-center text-muted">No menu items found. Please add your first menu.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
            <!-- ==================== END MENU LIST ==================== -->

        </div>
    </section>
</div>
@endsection

@section('js')
<script>
    $(document).ready(function() {
        $('.select2bs4').select2({
            theme: 'bootstrap4',
            placeholder: "Select Parent Menu",
            allowClear: true
        });

        $('#isExternal').change(function() {
            if(this.checked) {
                $('#urlField').slideDown(300);
            } else {
                $('#urlField').slideUp(300);
                $('input[name="url"]').val('');
            }
        });
    });
</script>
@endsection
@extends('mainLayout.layout')
@section('title','Trip Designer || Inventory Product Management')
@section('productManagement','active')
@section('inventoryMenu','menu-open')
@section('inventory','active')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6"><h1>Product Management</h1></div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                            <li class="breadcrumb-item active">Product Management</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">

                <!-- Add Product -->
                <div class="card card-warning">
                    <div class="card-header">
                        <h3 class="card-title">Add New Product</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        {{ Form::open(['url' => 'inventory/createProduct', 'method' => 'post', 'class' => 'form-horizontal', 'enctype'=>'multipart/form-data']) }}
                        {{ csrf_field() }}
                        <div class="card-body row">
                            <div class="col-sm-3">
                                <label>Category</label>
                                <select class="form-control" name="category_id" required>
                                    <option value="">Select Category</option>
                                    @foreach($categories as $cat)
                                        <option value="{{$cat->id}}">{{$cat->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-3">
                                <label>Assign To (Employee)</label>
                                <select class="form-control" name="employee_id">
                                    <option value="">Not Assigned</option>
                                    @foreach($employees as $emp)
                                        <option value="{{$emp->id}}">{{$emp->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-3">
                                <label>Product Name</label>
                                <input type="text" name="name" class="form-control" placeholder="Enter Product Name" required>
                            </div>
                            <div class="col-sm-3">
                                <label>Vendor Name</label>
                                <input type="text" name="vendor_name" class="form-control" placeholder="Vendor Name">
                            </div>
                            <div class="col-sm-3">
                                <label>Quantity</label>
                                <input type="number" name="quantity" class="form-control" value="1" min="1">
                            </div>
                            <div class="col-sm-3">
                                <label>Buy Price</label>
                                <input type="number" step="0.01" name="price" class="form-control" placeholder="Enter Price">
                            </div>
                            <div class="col-sm-3">
                                <label>Warranty Expire Date</label>
                                <input type="date" name="warranty_expire" class="form-control">
                            </div>
                            <div class="col-sm-3">
                                <label>Buy File (Invoice)</label>
                                <input type="file" name="buy_file" class="form-control" accept=".jpg,.jpeg,.png,.pdf">
                            </div>
                            <div class="col-sm-12">
                                <label>Description</label>
                                <textarea name="description" class="form-control" rows="2" placeholder="Product Details"></textarea>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-warning float-right">Save</button>
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>

                <!-- Product List -->
                <div class="card card-info mt-3">
                    <div class="card-header">
                        <h3 class="card-title">All Products</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Category</th>
                                    <th>Name</th>
                                    <th>Vendor</th>
                                    <th>Price</th>
                                    <th>Qty</th>
                                    <th>Employee</th>
                                    <th>Warranty</th>
                                    <th>File</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $i=1; @endphp
                                @foreach($products as $p)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$p->category_name}}</td>
                                        <td>{{$p->name}}</td>
                                        <td>{{$p->vendor_name}}</td>
                                        <td>{{number_format($p->price,2)}}</td>
                                        <td>{{$p->quantity}}</td>
                                        <td>{{$p->employee_name ?? 'Not Assigned'}}</td>
                                        <td>{{$p->warranty_expire}}</td>
                                        <td>
                                            @if($p->buy_file)
                                                <a href="{{asset(''.$p->buy_file)}}" target="_blank" class="btn btn-sm btn-secondary">View</a>
                                            @endif
                                        </td>
                                        <td>
                                            @if($p->status==1)
                                                <span class="badge bg-success">Active</span>
                                            @else
                                                <span class="badge bg-danger">Inactive</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-info">Action</button>
                                                <button type="button" class="btn btn-info dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                                    <span class="sr-only">Toggle Dropdown</span>
                                                </button>
                                                <div class="dropdown-menu" role="menu">
                                                    <!-- 🟡 Edit button -->
                                                    <a class="dropdown-item" href="{{ url('inventory/editProductPage?id=' . $p->id) }}">Edit</a>

                                                    <!-- 🟢 PDF Slip Download -->
                                                    <a class="dropdown-item" href="{{ url('inventory/downloadAcknowledgementSlip?id=' . $p->id) }}" target="_blank">
                                                        Download Slip (PDF)
                                                    </a>

                                                    <!-- 🔴 Delete button -->
                                                    <a class="dropdown-item delete" href="#" data-id="{{ $p->id }}" data-toggle="modal" data-target="#modal-danger">Delete</a>
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
                                <div class="modal-body">
                                    <p style="text-align:center;font-size:18px;">Are You Sure?</p>
                                </div>
                                {{ Form::open(['url' => 'inventory/deleteProduct', 'method' => 'post']) }}
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

            </div>
        </section>
    </div>
@endsection

@section('js')
    <script>
        $(document).on('click','.delete',function(e){
            e.preventDefault();
            $('.id').val($(this).data('id'));
        });
    </script>
@endsection

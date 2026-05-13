@extends('mainLayout.layout')
@section('title','Trip Designer || Edit Product')
@section('productManagement','active')
@section('inventoryMenu','menu-open')
@section('inventory','active')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6"><h1>Edit Product</h1></div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{url('inventory/productManagement')}}">Product Management</a></li>
                            <li class="breadcrumb-item active">Edit Product</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">

                <div class="card card-warning">
                    <div class="card-header">
                        <h3 class="card-title">Edit Product Information</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                        </div>
                    </div>

                    <div class="card-body">
                        {{ Form::open(['url' => 'inventory/updateProduct', 'method' => 'post', 'class' => 'form-horizontal', 'enctype'=>'multipart/form-data']) }}
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{ $product->id }}">

                        <div class="card-body row">
                            <div class="col-sm-3">
                                <label>Category</label>
                                <select name="category_id" class="form-control" required>
                                    @foreach($categories as $cat)
                                        <option value="{{ $cat->id }}" {{ $product->category_id == $cat->id ? 'selected' : '' }}>
                                            {{ $cat->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-sm-3">
                                <label>Assign To (Employee)</label>
                                <select name="employee_id" class="form-control">
                                    <option value="">Not Assigned</option>
                                    @foreach($employees as $emp)
                                        <option value="{{ $emp->id }}" {{ $product->employee_id == $emp->id ? 'selected' : '' }}>
                                            {{ $emp->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-sm-3">
                                <label>Product Name</label>
                                <input type="text" name="name" class="form-control" value="{{ $product->name }}" required>
                            </div>

                            <div class="col-sm-3">
                                <label>Vendor Name</label>
                                <input type="text" name="vendor_name" class="form-control" value="{{ $product->vendor_name }}">
                            </div>

                            <div class="col-sm-3">
                                <label>Quantity</label>
                                <input type="number" name="quantity" class="form-control" min="1" value="{{ $product->quantity }}">
                            </div>

                            <div class="col-sm-3">
                                <label>Buy Price</label>
                                <input type="number" step="0.01" name="price" class="form-control" value="{{ $product->price }}">
                            </div>

                            <div class="col-sm-3">
                                <label>Warranty Expire Date</label>
                                <input type="date" name="warranty_expire" class="form-control" value="{{ $product->warranty_expire }}">
                            </div>

                            <div class="col-sm-3">
                                <label>Buy File (Invoice)</label>
                                <input type="file" name="buy_file" class="form-control" accept=".jpg,.jpeg,.png,.pdf">
                                @if($product->buy_file)
                                    <div class="mt-2">
                                        <a href="{{ url($product->buy_file) }}" target="_blank" class="btn btn-sm btn-secondary">View Current File</a>
                                    </div>
                                @endif
                            </div>

                            <div class="col-sm-12">
                                <label>Description</label>
                                <textarea name="description" class="form-control" rows="2">{{ $product->description }}</textarea>
                            </div>

                            <div class="col-sm-3 mt-2">
                                <label>Status</label>
                                <select name="status" class="form-control">
                                    <option value="1" {{ $product->status == 1 ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ $product->status == 0 ? 'selected' : '' }}>Inactive</option>
                                </select>
                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-warning float-right">Update</button>
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>

            </div>
        </section>
    </div>
@endsection

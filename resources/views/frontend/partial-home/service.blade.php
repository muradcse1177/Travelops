<div class="tab-pane show" id="services">
    {{ Form::open(array('url' => 'service',  'method' => 'get' ,'class' =>'form-horizontal')) }}
    <div class="row gy-3 gx-md-3 gx-sm-2">
        <div class="col-xl-8 col-lg-7 col-md-12">
            <div class="row gy-3 gx-md-3 gx-sm-2">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 position-relative">
                    <div class="form-group hdd-arrow mb-0">
                        <select class=" form-control fw-bold">
                            <option value="Bangladesh" selected>Bangladesh</option>
                        </select>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                    <div class="form-group hdd-arrow mb-0">
                        <select class="gointo form-control fw-bold select2" name="name" required>
                            @foreach($services as $servi)
                                <option value="{{$servi->name}}">{{$servi->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-5 col-md-12">
            <div class="row gy-3 gx-md-3 gx-sm-2">
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                    <div class="form-group mb-0">
                        <button type="submit" class="btn btn-primary full-width fw-medium"><i class="fa-solid fa-magnifying-glass me-2"></i>Search</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{ Form::close() }}
</div>

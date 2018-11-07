@extends('admin.layout')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Edit Worker
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
        {{Form::open([
        'route'=>['workers.update', $worker->id],
        'files'=>'true',
        'method'=>'put'
        ])}}
        <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Updating</h3>
                    @include('admin.errors')
                </div>
                <div class="box-body">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">First Name</label>
                            <input type="text" name="firstName" class="form-control" id="exampleInputEmail1" placeholder="" value="{{$worker->firstName}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Middle Name</label>
                            <input type="text" name="middleName" class="form-control" id="exampleInputEmail1" placeholder="" value="{{$worker->middleName}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Last Name</label>
                            <input type="text" name="lastName" class="form-control" id="exampleInputEmail1" placeholder="" value="{{$worker->lastName}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Image</label>
                            <input type="file" id="exampleInputFile" name="image">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Phone</label>
                            <input type="text" name="phone" class="form-control" id="exampleInputEmail1" placeholder="" value="{{$worker->phone}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Address</label>
                            <input type="text" name="address" class="form-control" id="exampleInputEmail1" placeholder="" value="{{$worker->address}}">
                        </div>
                        <div class="form-group">
                            <label>Subdivision</label>
                            {{Form::select('subdivision_id',
                            $subdivisions,
                            $worker->getSubId(),
                            ['class' => 'form-control select2'])}}
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button class="btn btn-warning pull-right">Edit</button>
                </div>
                <!-- /.box-footer-->
            </div>
            <!-- /.box -->
        </section>
        <!-- /.content -->
    </div>
@endsection
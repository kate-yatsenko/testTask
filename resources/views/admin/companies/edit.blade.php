@extends('admin.layout')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Edit company</h1>
        </section>

        <!-- Main content -->
        <section class="content">
        {{Form::open([
        'route'=>['companies.update', $company->id],
        'files'=>'true',
        'method'=>'put'
        ])}}
        <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Update company</h3>
                    @include('admin.errors')
                </div>
                <div class="box-body">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Title</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder=""
                                   value="{{$company->title}}" name="title">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">City</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder=""
                                   value="{{$company->city}}" name="city">
                        </div>

                        <div class="form-group">
                            <img src="{{$company->getImage()}}" alt="" class="img-responsive" width="200">
                            <label for="exampleInputFile">Image</label>
                            <input type="file" id="exampleInputFile" name="image">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Description</label>
                            <textarea name="description" id="" cols="30" rows="10" class="form-control">{{$company->description}}</textarea>
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
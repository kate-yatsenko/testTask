@extends('admin.layout')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Blank page
                <small>it all starts here</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i>Home</a></li>
                <li><a href="#">Companies</a></li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="form-group">
                        <a href="{{route('companies.create')}}" class="btn btn-success">Add</a>

                    </div>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>City</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($companies as $company)
                            <tr id="company{{$company->id}}">
                                <td>{{$company->id}}</td>
                                <td>{{$company->title}}</td>
                                <td>{{$company->city}}</td>
                                <td>{{$company->description}}</td>
                                <td>
                                    <img src="{{$company->getImage()}}" alt="" height="150">
                                </td>
                                <td>
                                    <a href="{{route('companies.edit', $company->id)}}" class="fa fa-pencil"></a>
                                    <button class="fa fa-remove delete-company"
                                            value="{{$company->id}}">
                                    </button>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>
@endsection

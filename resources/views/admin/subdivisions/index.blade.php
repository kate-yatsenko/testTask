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
                <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Subdivisions</a></li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="form-group">
                        <a href="{{route('subdivisions.create')}}" class="btn btn-success">Add</a>
                    </div>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Company</th>
                            <th>Address</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($subdivisions as $subdivision)
                            <tr id="subdivision{{$subdivision->id}}">
                                <td>{{$subdivision->id}}</td>
                                <td>{{$subdivision->title}}</td>
                                <td>{{$subdivision->description}}</td>
                                <td>{{$subdivision->getCompanyTitle()}}</td>
                                <td>{{$subdivision->address}}</td>
                                <td><a href="{{route('subdivisions.edit', $subdivision->id)}}" class="fa fa-pencil"></a>
                                    <button class="fa fa-remove delete-sub"
                                            value="{{$subdivision->id}}">
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
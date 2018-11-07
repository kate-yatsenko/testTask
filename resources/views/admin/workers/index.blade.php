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
                <li><a href="#">Workers</a></li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="form-group">
                        <a href="{{route('workers.create')}}" class="btn btn-success">Add</a>
                    </div>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>First Name</th>
                            <th>Middle Name</th>
                            <th>Last Name</th>
                            <th>Subdivision</th>
                            <th>Image</th>
                            <th>Address</th>
                            <th>Phone</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($workers as $worker)
                            <tr id="worker{{$worker->id}}">
                                <td>{{$worker->id}}</td>
                                <td>{{$worker->firstName}}</td>
                                <td>{{$worker->middleName}}</td>
                                <td>{{$worker->lastName}}</td>
                                <td>{{$worker->getSubTitle()}}</td>
                                <td>
                                    <img src="{{$worker->getImage()}}" alt="" height="150">
                                </td>
                                <td>{{$worker->address}}</td>
                                <td>{{$worker->phone}}</td>
                                <td><a href="{{route('workers.edit', $worker->id)}}" class="fa fa-pencil"></a>
                                    <button class="fa fa-remove delete-worker"
                                            value="{{$worker->id}}">
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
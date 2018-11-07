@extends('pages.layout')

@section('content')
    <div class="main-content">
        <div class="container">
            @foreach($companies as $company)
                <div class="row">
                    <div class="col-md-6">
                        <div class="card-img-left company-img"><img src="{{$company->getImage()}}" alt=""></div>
                    </div>
                    <div class="col-md-4">
                        <div class="card-body">
                            <h3 class="card-title">{{$company->title}}</h3>
                            <h4 class="card-title">{{$company->city}}</h4>
                            <p class="card-text">{{$company->description}}</p>
                        </div>
                    </div>
                </div>
            @endforeach
            {{$companies->links()}}
        </div>
    </div>
@endsection

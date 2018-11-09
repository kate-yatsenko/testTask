@extends('pages.layout')

@section('content')
    <div class="main-content">
        <div class="container">
            @foreach($companies as $company)
                    <div id="company{{$company->id}}" class="row company">
                        <div class="col-md-6">
                            <div class="card-img-left company-img"><img class='img-fluid' src="{{$company->getImage()}}" alt=""></div>
                        </div>
                        <div class="col-md-6">
                            <div class="card-body">
                                <h3 class="card-title">{{$company->title}}</h3>
                                <h4 class="card-title">City: {{$company->city}}</h4>
                                <p class="card-text">{{$company->description}}</p>
                            </div>
                            <button class="getSub btn btn-info" value="{{$company->id}}">See Subdivision<i id="plusSubToggle{{$company->id}}" class="fa fa-plus ml-3"></i>
                            </button>
                        </div>
                        <div class="subdiv">
                        </div>
                    </div>

            @endforeach
            {{$companies->links()}}
        </div>
    </div>
@endsection

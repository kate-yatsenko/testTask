@extends('pages.layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="main-content" id="jstree">
                    <ul>
                        @foreach($companies as $company)
                            <li>
                                <button type="button" class="none-button getInfoCompany" id="company{{$company->id}}"
                                        value="{{$company->id}}">{{$company->title}}</button>
                                <ul>
                                    @foreach($company->subdivisions as $sub)
                                        <li>
                                            <button type="button" class="none-button getInfoSub" id="sub{{$sub->id}}"
                                                    value="{{$sub->id}}">{{$sub->title}}</button>
                                            <ul>
                                                @foreach($sub->workers as $worker)
                                                    <li>
                                                        <button type="button" class="none-button getInfoWorkers"
                                                                id="worker{{$worker->id}}"
                                                                value="{{$worker->id}}">{{$worker->firstName . ' ' . $worker->lastName}}</button>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        @endforeach

                    </ul>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="information"></div>
            </div>
        </div>
    </div>
@endsection

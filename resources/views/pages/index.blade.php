<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{!! csrf_token() !!}"/>

    <!-- favicon icon -->

    <title>Companies</title>

    <!-- common css -->
    <link rel="stylesheet" href="/css/front.css">

    <!-- HTML5 shim and Respond.js IE9 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <!--<script src="assets/js/html5shiv.js"></script>-->
    <!--<script src="assets/js/respond.js"></script>-->
    {{--<![endif]-->--}}

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="/img/favicon.png">

</head>

<body>
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
<script type="text/javascript" src="/js/front.js"></script>
</body>
</html>
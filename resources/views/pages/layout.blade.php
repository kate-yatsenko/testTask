<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{!! csrf_token() !!}"/>

    <!-- favicon icon -->

    <title>Companies</title>
    <!-- common css -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/themes/default/style.min.css"/>
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
<div class="header">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="/">companies community</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                @if(Auth::check() && Auth::user()->is_admin)
                    <a class="nav-item nav-link" href="{{route('home')}}">Admin Panel</a>
                    <a class="nav-item nav-link" href="/profile">My profile</a>
                    <a class="nav-item nav-link" href="/logout">Logout</a>
                @elseif(Auth::check())
                    <a class="nav-item nav-link" href="/profile">My profile</a>
                    <a class="nav-item nav-link" href="/logout">Logout</a>
                @else
                    <a class="nav-item nav-link" href="/register">Register</a>
                    <a class="nav-item nav-link" href="/login">Login</a>
                @endif
            </div>
        </div>
    </nav>
</div>
@yield('content')


{{--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>--}}
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>--}}
{{--<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>--}}
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
<script type="text/javascript" src="/js/front.js"></script>
<script>
    $(function () {

        $('#jstree').jstree();
        $('.getSub').on('click', function () {
            console.log(1);
        });
        $('.getInfoCompany').on({
            'mouseover': function () {
                var company_id = $(this).val();
                var data = {
                    action: 'showComp'
                };
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'GET',
                    url: '/showComp/' + company_id,
                    data: data,
                    success: function (data) {
                        $('.information').append(`<div class="hov"><div class="card-img-left company-img"><img class='img-fluid' src="/uploads/${data.image}" alt=""></div><h3 class="card-title">` + data.title + `</h3>
                             <h4 class="card-title">City:` + data.city + `</h4>
                                <p class="card-text">` + data.description + `</p>
</div> `);
                    }
                });
            },
            'mouseout': function () {
                $('.information').find('.hov').remove();
            }
        });


        // 'mouseover': function () {
        //     console.log(1);
        //     var sub_id = $(this).val();
        //     var data = {
        //         action: 'showSub'
        //     };
        //     $.ajax({
        //         headers: {
        //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //         },
        //         type: 'GET',
        //         url: '/showSub/' + sub_id,
        //         data: data,
        //         success: function (data) {
        //             $('.information').append(`<div class="hov">` +
        //                 `<div class="card-body">` +
        //                 `<h4 class="title">` + data.title + `</h4>` +
        //                 `<p class="info">address: ` + data.address + `</p>` +
        //                 `<p class="text">` + data.description + `</p>` +
        //                 `</div></div> `);
        //         }
        //     });
        // },
        // 'mouseout': function () {
        //     $('.information').find('.hov').remove();
        // }
        // });
    });


</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/jstree.min.js"></script>


</body>
</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{!! asset('frontend/images/throwing-trash.png') !!}">
    <title>IMT</title>

    <!-- General CSS Files -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- Template CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="{!! asset('assets/css/style.css') !!}">
    <link rel="stylesheet" href="{!! asset('assets/css/components.css') !!}">

    <style>
        .container-login100 {
            width: 100%;
            min-height: 100vh;
            display: -webkit-box;
            display: -webkit-flex;
            display: -moz-box;
            display: -ms-flexbox;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            padding: 15px;

            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
            position: relative;
            z-index: 1;
        }

        .container-login100::before {
            content: "";
            display: block;
            position: absolute;
            z-index: -1;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            background-color: rgba(0, 0, 0, 0.5);
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
            <ul class="navbar-nav mr-3">
            </ul>
        </form>
        <ul class="navbar-nav navbar-right">
            <li class="nav-item">
                <a class="nav-link" href="/">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/popular">Popular</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/word-of-the-day">Word Of The Day</a>
            </li>
        </ul>
    </nav>
    <div class="limiter">
        <div class="container-login100" style="background-image: url(assets/img/background.jpg);">
            <div class="container">
                <div class="row intro-text align-items-center">
                    <div class="col-md-12 mb-4">  <br />  <br />  <br />  <br />  <br />
                        <h3 style="color: white;">Word Of The Day</h3>
                        <br />
                        <div class="row">
                            @if(@empty($random))
                            <h6 style="color: white;">data not available</h6>
                            @else
                            @foreach ($random as $rd)
                            <div class="col-md-4 mb-4">
                                    <div class="card">
                                        <div class="card-header">
                                            {{ $rd->kata }}
                                        </div>
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $rd->terminology }}</h5>
                                            <p class="card-text">{{ $rd->deskripsi }}</p>
                                            <a href="/detail/{{ $rd->id }}" class="btn btn-success">Go
                                                somewhere</a>
                                        </div>
                                    </div>
                            </div>
                            @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

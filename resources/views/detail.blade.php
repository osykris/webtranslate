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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
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
            background-color: rgba(0, 0, 0, 0.8);
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
        <div class="container-login100" style="background-image: url(../assets/img/background.jpg);">
            <div class="container mt-5">
                <div class="row intro-text align-items-center justify-content-center">
                    @foreach ($detail as $details)
                        <div>
                            <h1
                                style="color: white; font-weight: 600; font-size: 48px; font-family: 'Arial Black', 'Arial Bold', Gadget, sans-serif;">
                                <strong>{{ $details->terminology }}</strong>
                            </h1>
                            <br>
                            <button onclick="gambar('{{ $details->id }}')"
                                class="btn btn-icon icon-left btn-success mb-4"><i class="fas fa-check"></i>
                                Marker</button>
                                <div class="row mt-3">
                                    <div class="col">
                                        <h6>English</h6>
                                        <div class="card">
                                            <div class="card-body" >
                                                <p class="card-text">{{ $details->deskripsi}}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <h6>Indonesian</h6>
                                        <div class="card">
                                            <div class="card-body" >
                                                <b>{{ $details->kata }}</b>
                                                <p class="card-text">{{ $details->deskripsi_indo }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                           
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- General JS Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <script>
        function gambar(id) {
            $("#gambar-src").remove();
            $.ajax({
                type: "GET",
                url: "/marker",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    id: id
                },
                success: function(response) {
                    console.log(response);
                    // show modal
                    $('#modalMarker').modal('show');
                    // fill form in modal
                    var html = `<img src="/img/` + response.data.gambar +
                        `" alt="" width="100%" id="gambar-src">`;
                    $('#bukti').append(html);
                },
            });
        }
    </script>
</body>

</html>
<div class="modal fade" id="modalMarker" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Marker</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="bukti">


                <a rel='nofollow' href='https://www.qr-code-generator.com' border='0' style='cursor:default'>
                    <img style="display: block; margin-left: auto; margin-right: auto;"
                        src='https://chart.googleapis.com/chart?cht=qr&chl=https%3A%2F%2Fshare.fectar.com%2FTYRXK&chs=180x180&choe=UTF-8&chld=L|2'
                        alt=''></a>
            </div>
        </div>
    </div>
</div>

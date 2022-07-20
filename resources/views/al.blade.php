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
            background-color: rgba(0, 0, 0, 0.7);
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
                    <div class="col-md-10 mb-5">
                        <div class="row mb-4">
                            <div class="col-1">
                                <a href="/search_au">
                                <img src="{{ url('../assets/img/Lambang_TNI_AU.png') }}" width="60" alt="...">
                                </a>
                            </div>
                            <div class="col-1">
                                <a href="/search_ad">
                                <img src="{{ url('../assets/img/Lambang_TNI_AD.png') }}" width="55" alt="...">
                                </a>
                            </div>
                            <div class="col-1">
                                <a href="/search_al">
                                <img src="{{ url('../assets/img/Lambang_TNI_AL.png') }}" width="75" alt="...">
                                </a>
                            </div>
                        </div>
                        <h3 style="color: white;"> Augmented Reality Terminologi Alutsista (ARTA)</h3>
                        <!-- <form class="form-inline mr-auto"> -->
                        <div class="search-element">
                            <input class="form-control" name="search" id="search" type="text"
                                placeholder="Search" aria-label="Search" data-width="550">
                            <!-- <button class="btn btn-success" type="submit"><i class="fas fa-search"></i></button> -->
                        </div>
                        <!-- </form> -->
                        <br />
                        <div class="table-responsive mt-4">
                            <table class="table table-striped" style="border-color: white;">
                                <thead>
                                    <tr>
                                        <th style="color: white;">Indonesian</th>
                                        <th style="color: white;">English</th>
                                        <th style="color: white;">More Information</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {

            $('#search').on('keyup', function() {
                var strcari = $('#search').val();
                if (strcari != "") {
                    $.ajax({
                        type: 'get',
                        url: "/al",
                        data: {
                            'search': strcari
                        },
                        success: function(data) {
                            $('tbody').html(data);
                        }
                    });
                } else {
                    readData()
                }

            });
        });

        function readData() {
            $.get("{{ url('read') }}", {},
                function(data, status) {
                    $('tbody').html(data);
                });
        }
    </script>

    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'csrftoken': '{{ csrf_token() }}'
            }
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
</body>

</html>

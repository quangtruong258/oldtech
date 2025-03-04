<!DOCTYPE html>
<html>

<head>
    <base href="{{'http://localhost:8080/oldtech.com/public/'}}">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin Panel Control</title>

    <link href="backend/css/bootstrap.min.css" rel="stylesheet">
    <link href="backend/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="backend/css/animate.css" rel="stylesheet">
    <link href="backend/css/style.css" rel="stylesheet">
    <link href="backend/css/customize.css" rel="stylesheet">

</head>

<body class="gray-bg">

    <div class="loginColumns animated fadeInDown">
        <div class="row">

            <div class="col-md-6">
                <h2 class="font-bold">Welcome to Oldtech</h2>

                <p>
                    Perfectly designed and precisely prepared admin theme with over 50 pages with extra new web app
                    views.
                </p>

                <p>
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                    industry's standard dummy text ever since the 1500s.
                </p>

                <p>
                    When an unknown printer took a galley of type and scrambled it to make a type specimen book.
                </p>

                <p>
                    <small>It has survived not only five centuries, but also the leap into electronic typesetting,
                        remaining essentially unchanged.</small>
                </p>

            </div>
            <div class="col-md-6">
                <div class="ibox-content">
                    {{-- @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif --}}
                    <form method="POST" class="m-t" role="form" action="{{ route('admin.auth.login') }}">
                        @csrf
                        <div class="form-group">
                            @if ($errors->has('email'))
                                <span class="error-message"> {{ $errors->first('email') }}</span>
                            @endif
                            <input name="email" type="email" class="form-control" placeholder="Email">
                        </div>
                        <div class="form-group">
                            @if ($errors->has('password'))
                                <span class="error-message">{{ $errors->first('password') }}</span>
                            @endif
                            <input name="password" type="password" class="form-control" placeholder="Password">
                        </div>
                        <button type="submit" class="btn btn-primary block full-width m-b">Login</button>

                        <a href="#">
                            <small>Forgot password?</small>
                        </a>

                        <p class="text-muted text-center">
                            <small>Do not have an account?</small>
                        </p>
                        <a class="btn btn-sm btn-white btn-block" href="register.html">Create an account</a>
                    </form>
                    <p class="m-t">
                        {{-- <small>Inspinia we app framework base on Bootstrap 3 &copy; 2024</small> --}}
                    </p>
                </div>
            </div>
        </div>
        <hr />
        <div class="row">
            <div class="col-md-6">
                Oltech Company
            </div>
            <div class="col-md-6 text-right">
                <small>© 2024</small>
            </div>
        </div>
    </div>

</body>

</html>

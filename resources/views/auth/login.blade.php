<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{('admin')}}/assets/images/favicon-32x32.png" type="image/png" />
    <!-- Bootstrap CSS -->
    <link href="{{('admin')}}/assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="{{('admin')}}/assets/css/bootstrap-extended.css" rel="stylesheet" />
    <link href="{{('admin')}}/assets/css/style.css" rel="stylesheet" />
    <link href="{{('admin')}}/assets/css/icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <!-- loader-->
    <link href="{{('admin')}}/assets/css/pace.min.css" rel="stylesheet" />

    <title>Login</title>
</head>

<body>

    <!--start wrapper-->
    <div class="wrapper">

        <!--start content-->
        <main class="authentication-content">
            <div class="container-fluid">
                <div class="authentication-card ">
                    <div class="row g-0 d-flex justify-content-center">
                        <div class="col-lg-6">
                            <div class="card shadow rounded-0 overflow-hidden">

                                <div class="card-body p-4 p-sm-5">
                                    <h5 class="card-title text-center">Sign In</h5>
                                    <h4 class="text-center">Rental Management</h4>
                                    <p class="card-text mb-5 text-center">See your growth and get consulting support!</p>
                                    @if (session('status'))
                                        <div class="mb-4 font-medium text-sm text-green-600">
                                            {{ session('status') }}
                                        </div>
                                    @endif
                                    @if (session('error'))
                                        <div class="alert alert-danger">
                                            {{ session('error') }}
                                        </div>
                                    @endif
                                    <form class="form-body" method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="row g-3">
                                            <div class="col-12">
                                                <label for="inputEmailAddress" class="form-label">Email Address</label>
                                                <div class="ms-auto position-relative">
                                                    <div
                                                        class="position-absolute top-50 translate-middle-y search-icon px-3">
                                                        <i class="bi bi-envelope-fill"></i></div>
                                                    <input type="email" class="form-control radius-30 ps-5"
                                                        id="inputEmailAddress" placeholder="Email Address" name="email"
                                                        required autofocus autocomplete="username" >
                                                </div>
                                                @error('email')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                            <div class="col-12">
                                                <label for="inputChoosePassword" class="form-label">Password</label>
                                                <div class="ms-auto position-relative">
                                                    <div
                                                        class="position-absolute top-50 translate-middle-y search-icon px-3">
                                                        <i class="bi bi-lock-fill"></i></div>
                                                    <input type="password" class="form-control radius-30 ps-5"
                                                        id="inputChoosePassword" placeholder="Password" name="password"
                                                        required autocomplete="current-password">
                                                </div>
                                                @error('password')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                            <div class="col-6">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox"
                                                        id="flexSwitchCheckChecked" checked="" name="remember">
                                                    <label class="form-check-label"
                                                        for="flexSwitchCheckChecked">Remember Me</label>
                                                </div>
                                            </div>
                                            {{-- <div class="col-6 text-end"> <a
                                                    href="authentication-forgot-password.html">Forgot Password ?</a>
                                            </div> --}}
                                            <div class="col-12">
                                                <div class="d-grid">
                                                    <button type="submit" class="btn btn-primary radius-30">Sign
                                                        In</button>
                                                </div>
                                            </div>
                                            {{-- <div class="col-12">
                                                <p class="mb-0">Don't have an account yet? <a
                                                        href="authentication-signup.html">Sign up here</a></p>
                                            </div> --}}
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <!--end page main-->

    </div>
    <!--end wrapper-->


    <!--plugins-->
    <script src="{{('admin')}}/assets/js/jquery.min.js"></script>
    <script src="{{('admin')}}/assets/js/pace.min.js"></script>


</body>

</html>

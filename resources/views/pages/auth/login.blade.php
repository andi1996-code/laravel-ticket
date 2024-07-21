<!DOCTYPE html>
<html lang="en">

<head>
    @include('template.head')
</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block my-auto">
                                <img src="{{ asset('sbadmin/img/login.png') }}" alt="login" style="width: 100%; height: 100%;">
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>

                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif

                                    <form class="user" method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user" name="email"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Enter Email Address..." value="{{ old('email') }}">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Password" name="password">
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>
                                    </form>

                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="{{ route('password.request') }}">Forgot Password?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="{{ route('register') }}">Create an Account!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    @include('template.script')

</body>

</html>

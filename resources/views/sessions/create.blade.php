<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</head>
<body>
<section class="vh-100" style="background-color: #eee;">
    <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-12 col-xl-11">
                <div class="card text-black" style="border-radius: 25px;">
                    <div class="card-body p-md-5">
                        <div class="row justify-content-center">
                            <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Login!</p>

                                <form method="post" action="/login">
                                    @csrf
                                    <!-- Email input -->
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="email">Email address</label>
                                        <input type="email" name="email" id="email"
                                               class="form-control"
                                               placeholder="Enter Tour Email"
                                               required
                                               autofocus
                                               value="{{old('email')}}"
                                        />

                                        @error('email')
                                        <p class="text-red-500 text-sm mt-1">{{$message}}</p>
                                        @enderror
                                    </div>

                                    <!-- Password input -->
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="password">Password</label>
                                        <input type="password" name="password" id="password" class="form-control"
                                               required
                                               placeholder="Enter Your Password"/>
                                        @error('password')
                                        <p class="text-red-500 text-sm mt-1">{{$message}}</p>
                                        @enderror
                                    </div>

                                    <!-- Submit button -->
                                    <button type="submit" class="btn btn-primary btn-block mb-4 bg-info">Sign in
                                    </button>
                                        <!-- Register buttons -->
                                        <div class="text-center">
                                            <p><a class="text-info" href="/forgot-password">Forgot Password?</a></p>
                                            <p class="mt-1">Not a member? <a class="text-info" href="/register">Register</a>
                                            </p>
                                        </div>
                                </form>

                            </div>
                            <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                                <img
                                    src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/draw1.webp"
                                    class="img-fluid" alt="Sample image">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if(\Illuminate\Support\Facades\Session::has('success'))

        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
</section>
</body>
</html>

<!DOCTYPE html>
<html>
<head>
    <title>Forgot Password</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <link rel="stylesheet"
          href="https://use.fontawesome.com/releases/v5.1.0/css/all.css"
          integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt"
          crossorigin="anonymous"/>

</head>
<body style="background-color: #eee;">
<div>
    <div class="container mt-10 w-50">
        <div class="card">
            <div class="card-header">
                Reset Password!
            </div>
            <div class="card-body">
                <form method="post" action="/password/reset">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">
                    <h5 class="card-title text-secondary">Reset your password</h5>
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control" id="email" name="email"
                               autofocus
                               placeholder="Enter your email"
                               value="{{$email ?? old('email')}}"
                        >
                        @error('email')
                        <p class="text-red-500 text-sm mt-1">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" autofocus
                               placeholder="New password">
                        @error('password')
                        <p class="text-red-500 text-sm mt-1">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">Confirm Password</label>
                        <input type="password" class="form-control" id="password_confirmation"
                               name="password_confirmation" autofocus placeholder="Password confirmation">
                    </div>
                    <button type="submit" class="btn btn-primary bg-primary mb-2">Reset Password</button>
                </form>
                @if(\Illuminate\Support\Facades\Session::has('fail'))

                    <div class="alert alert-success">
                        {{ session('fail') }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
</body>
</html>

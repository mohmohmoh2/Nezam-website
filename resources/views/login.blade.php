

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Sign In | Nezam</title>
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('assist/assists/bootstrap/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="{{ asset('assist/assists/css/signUp.css') }}" rel="stylesheet">
</head>
<body>
    <main class="d-flex">
        <div class="form-signin d-flex flex-column align-items-center">
            @if (isset($_COOKIE['mail']))
            <div class="alert alert-danger" role="alert"> This Email Is Already Exist !</div>
            @endif
            @if (isset($_COOKIE['pass']))
                <div class="alert alert-danger" role="alert">The Password Less Than 6 Character !</div>
            @endif
            @isset($_COOKIE['not'])
                <div class="alert alert-danger" role="alert"> Email Or Password is Wrong Please Try Again Or Sign Up </div>
            @endisset
            <form action="{{ route('admin.login') }}" method="post" class="form d-flex flex-column align-items-center" enctype="multipart/form-data">
                @csrf
                <img class="mb-4" src="{{ asset('assist/assists/img/logo.jpg') }}" alt="" width="95" height="95">
                <h1 class="h3 mb-3 fw-normal">Sign in To Nezam</h1>
                <div class="form-floating m-1 w-100">
                    <input type="email" name="email" class="form-control" id="user-email" placeholder="Email address" required>
                    <label for="user-email">Email address</label>
                </div>
                <div class="form-floating m-1 w-100">
                    <input type="password" name="password" class="form-control" id="user-password" placeholder="Password" required>
                    <label for="user-password">Password</label>
                </div>
                <button class="w-100 btn btn-lg btn-primary" id="sub" name="login" type="submit">Sign In</button>
                <a href="/auth/google/redirect" class="m-2 d-flex justify-content-center"><img src="{{ asset('assist/assists/img/google-signin-button-1024x260.png') }}" class="gbutton" alt=""></a>
                <h6 class="m-2">If you Have No Account Please <a href="{{ route('admin.signUp') }}">Sign Up</a> </h6>
                <h6 class="m-2">Go To <a href="{{ route('front.homepage') }}">Home</a> </h6>
                <h6 class="m-2">Go To <a href="{{ route('admin.reset') }}">Reset Password</a> </h6>
            </form>
        </div>
        <div class="img-half ">
            <img src="{{ asset('assist/assists/img/home-office-1867761.jpg') }}" class="hal" alt="">
        </div>
    </main>
    <script src="{{ asset('assist/assists/bootstrap/bootstrap.bundle.min.js') }}"></script>
</body>
</html>

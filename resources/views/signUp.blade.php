

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Sign Up | Nezam</title>
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
            <form action="{{ route('admin.signUp') }}" method="post" class="form d-flex flex-column align-items-center" enctype="multipart/form-data">
                @csrf
                <img class="mb-4" src="{{ asset('assist/assists/img/logo.jpg') }}" alt="" width="95" height="95">
                <h1 class="h3 mb-3 fw-normal">Sign Up To Nezam</h1>
                <div class="form-floating m-1 w-100">
                    <input type="text" name="name" class="form-control" id="first-name" placeholder="First Name" required>
                    <label for="first-name">First Name</label>
                </div>
                <div class="form-floating m-1 w-100">
                    <input type="text" name="lName" class="form-control" id="last-name" placeholder="Last Name" required>
                    <label for="last-name">Last Name</label>
                </div>
                <div class="form-floating m-1 w-100">
                    <input type="email" name="email" class="form-control" id="user-email" placeholder="Email address" required>
                    <label for="user-email">Email address</label>
                </div>
                <div class="form-floating m-1 w-100">
                    <input type="password" name="password" class="form-control" id="user-password" placeholder="Password" required>
                    <label for="user-password">Password</label>
                </div>

                <button class="w-100 btn btn-lg btn-primary" id="sub" name="login" type="submit">Sign Up</button>
                <a href="/auth/google/redirect" class="m-2 d-flex justify-content-center"><img src="{{ asset('assist/assists/img/GButton.png') }}" class="gbutton" alt=""></a>
                <h6>If you Have Account Please <a href="{{ route('admin.login') }}">Sign In</a> </h6>
                <h6 class="m-3">Go To <a href="{{ route('front.homepage') }}">Home</a> </h6>
            </form>
        </div>
        <div class="img-half ">
            <img src="{{ asset('assist/assists/img/job-5382501.jpg') }}" class="hal" alt="">
        </div>
    </main>
    <script src="{{ asset('assist/assists/bootstrap/bootstrap.bundle.min.js') }}"></script>
</body>
</html>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">

        <title>Reset | </title>
        <!-- Bootstrap core CSS -->
        <link href="{{ asset('assist/assists/bootstrap/bootstrap.min.css') }}" rel="stylesheet">
        <!-- Custom styles for this template -->
        <link href="{{ asset('assist/assists/css/signin.css') }}" rel="stylesheet">
    </head>
    <body class="text-center">
        <main class="form-signin">
            <form action="{{ route('admin.ereset') }}" method="get" class="form">
                <h2>Reset Password</h2>
                <img class="mb-4" src="../assists/img/logo.jpg" alt="" width="72" height="72">
                <div class="form-floating">
                    <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com" required>
                    <label for="floatingInput">Email address</label>
                </div>
                <button class="w-100 btn btn-lg btn-primary my-3" type="submit">Submit Code</button>
                <h6 class="my-1">Try<a href="index.php" id="reset"> Login</a></h6>
            </form>
        </main>


    </body>
</html>

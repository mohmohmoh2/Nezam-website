

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
            <form action="../login/check.php" method="post" class="form">
                <img class="mb-4" src="../assists/img/logo.jpg" alt="" width="72" height="72">
                <div class="form-floating">
                    <input type="text" name="new" class="form-control" id="floatingInput" placeholder="name@example.com">
                    <label for="floatingInput">New Password</label>
                </div>
                <button class="w-100 btn btn-lg btn-primary" name="Save" type="submit">Save New Password</button>
            </form>
        </main>
    </body>
</html>
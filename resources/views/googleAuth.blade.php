<!DOCTYPE html>

<html>

<head>

    <title>Laravel 5.8 Login with Google Account Example</title>

</head>

<body>

    <div class=”container”>

        <div class=”row”>

            <div class=”col-md-12 row-block”>

                <a href="{{ route('auth.redirect', "google") }}" class=”btn bth-lg-primaty btn-block ”>

                    <strong>Login With Google</strong>

                </a>

                <a href="{{ route('auth.redirect', "github") }}" class=”btn bth-lg-primaty btn-block ”>

                    <strong>Login With Github</strong>

                </a>

                <a href="{{ route('auth.redirect', "facebook") }}" class=”btn bth-lg-primaty btn-block ”>

                    <strong>Login With Facebook</strong>

                </a>

            </div>

        </div>

    </div>

</body>

</html>

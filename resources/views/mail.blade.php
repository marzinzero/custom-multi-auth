<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mail</title>
</head>

<body>

     <h3>We have received a request to password reset, associated with {{ $email }}. Click the below link and reset your password</h3>
     <a href="{{ route('admin.reset.password.form', ['token'=> $token, 'email'=> $email]) }}">reset link</a>
</body>

</html>
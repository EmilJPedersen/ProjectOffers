
<!DOCTYPE html>
<html>
<head>
    <title>Laravel Login with Google Account Example</title>
    @include('../partials/navbar')
</head>
<body>
    <div class="container">
       <div class="row">
         <div class="col-md-12 row-block">
          <a href="{{ url('auth/google') }}" class="btn btn-lg btn-primary btn-block">
          <strong>Login With Google</strong>
          </a>
         </div>
       </div>
    </div>
</body>

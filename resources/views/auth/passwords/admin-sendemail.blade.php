<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
</head>
<body>
          
    <a class="nav-link" href="{{ url('en/admin/reset-password/'. $token ) }}">Reset Your Password</a>
                            
</body>
</html>

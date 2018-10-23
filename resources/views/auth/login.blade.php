<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" href="/admin/img/ers_fav.ico" type="image/x-icon"/>
    <title>Erstream Yayıncılık</title><meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/admin/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/admin/css/bootstrap-responsive.min.css" />
    <link rel="stylesheet" href="/admin/css/matrix-login.css" />
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>

</head>
<body>
<div id="loginbox">
    <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
        @csrf
        <div class="control-group normal_text"> <h3><img src="/admin/img/ers.png" alt="Logo" /></h3></div>
        <div class="control-group">
            <div class="controls">
                <div class="main_input_box">
                    <span class="add-on bg_lg"><i class="icon icon-user-md"> </i></span><input type="text" id="email" name="email" placeholder="E-Mail" />
                </div>
            </div>
        </div>
        <div class="control-group">
            <div class="controls">
                <div class="main_input_box">
                    <span class="add-on bg_ly"><i class="icon-lock"></i></span><input type="password" id="password" name="password" placeholder="Şifreniz" />
                </div>
            </div>
        </div>
        <div class="form-actions">
            <span class="pull-right"><button class="btn btn-success" type="submit"> Giriş</button></span>
        </div>
    </form>
</div>

<script src="/admin/js/jquery.min.js"></script>
<script src="/admin/js/matrix.login.js"></script>
</body>

</html>

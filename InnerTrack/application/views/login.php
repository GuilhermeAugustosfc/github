<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>InnerTrack</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" media="screen" href="<?=base_url("assets/Libs/bootstrap/css/bootstrap.min.css")?>" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="<?=base_url("assets/css/login/login.css")?>" />
    
</head>
<body>
<div class="container-fluid justify-content-center">
    <div class="row justify-content-center align-items-center corpo">
        <div class="col-lg-5 col-md-7 col-sm-8 col-xs-10 col-12">
            <div class="login-tela" >
                <div class="login-logo">
                    <img class="img-fluid d-block" src="<?=base_url("img/login-logo.jpg")?>" alt="FotoLogo">
                </div>
                <h2 class="text-center login-titulo">InnerTrack</h2>
                
                <div class="login-form" id='form'>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span for="nome" class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                        </div>
                        <input id="nome" name="nome" type="text" placeholder="Nome..." class="form-control">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span for="senha" class="input-group-text" id="basic-addon1"><i class="fas fa-key"></i></span>
                        </div>
                        <input id="senha" name="senha" type="password" placeholder="Senha..." class="form-control">
                    </div>
                    <small class="form-text text-muted text-center">login: Edson</small>
                    <small class="form-text text-muted text-center">senha: 002455</small>
                    
                </div>
                <div class= "d-flex justify-content-center">
                    <button class="btn text-center botao-confirma" id="btn-confirmar">Confirmar</button>
                </div>
                <small id="emailHelp" class="form-text text-muted text-center">Caso tenho esquecido, cadastre-se <a href="#">Aqui</a></small>
                
                <input type="hidden" id="input-hidden" url="login/autenticar">
            </div>
        </div>
    </div>
</div>
    <script src="<?=base_url("assets/Libs/jquery/jquery.js")?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js"></script>
    <script src="<?=base_url("assets/js/login/login.js")?>"></script>
</body>
</html>
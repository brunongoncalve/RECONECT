<!DOCTYPE html>
<html>

<head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Register</title>
    
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    
</head>

<body class="gray-bg" style="position: relative;"> 
    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>
                <h1 class="logo-name">BT</h1>   
            </div>

                <h4 class="h1-registro">Registre-se em nosso portal.</h4>
                    <form class="m-t" 
                          action="{{ route('register') }}"
                          enctype="multpart/form-data"
                          method="POST">
                        @csrf
            
                        @if(session('mensagem'))
                            <div class="alert alert-success">
                                <p align='center'>{{session('mensagem')}}</p>
                            </div>
                        @endif 
   
                        <div class="form-group">
                            <input type="text" 
                                   class="form-control" 
                                   placeholder="Informe seu primeiro nome..."
                                   id="name"
                                   name="name"
                                   value="{{ old('name') }}" 
                                   required>
                        </div>
                        <div class="form-group">
                            <input type="email" 
                                   class="form-control" 
                                   placeholder="Informe seu email..." 
                                   type="email"
                                   id="email"
                                   name="email"
                                   value="{{ old('email') }}"
                                   required>
                        </div>
                        <div class="form-group">
                            <input type="password" 
                                   class="form-control" 
                                   placeholder="********" 
                                   id="password"
                                   name="password"
                                   required>
                        </div>
                        <button type="submit" 
                                class="btn btn-primary block full-width m-b">Salve seu Cadastro
                        </button>
                        <a href="{{ route('login') }}"
                           type="submit" 
                           class="btn btn-success block full-width m-b">Realize seu Login
                        </a>
    
                    </form>

                    <p class="m-t"> <small>Reconect Company &copy; 2022</small></p>

    </div>
</div>

<script src="js/jquery-3.1.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.js"></script>

</body>
</html>

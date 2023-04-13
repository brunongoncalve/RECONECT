<!DOCTYPE html>
<html>

<head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Reconect | Login</title>
    
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    
</head>

<body class="gray-bg">
    
<div class="middle-box text-center loginscreen animated fadeInDown">
    <div>
        <div>

<form class="m-t" role="form" 
      action="{{ route('login')}}" 
      method="POST">
    @csrf
                                
</div>
    <h4 class="h1-registro">Bem vindo</h4>
        <h5>Realize seu login.</h5>
            
@if ($errors->any())
    <div class="alert alert-danger m-b">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
            
<div class="form-group">
    <input type="email"
           class="form-control" 
           id="email" 
           name="email"
           value="{{ old('email') }}" 
           placeholder="Informe seu email...">
</div>
            
<div class="form-group">
    <input type="password" 
           class="form-control" 
           id="password" 
           name="password" 
           placeholder="********">
</div>
            
<button type="submit" 
        class="btn btn-primary block full-width m-b">Entrar
</button>
        
</form>

<a href="{{ route('register') }}"
   type="submit" 
   class="btn btn-success block full-width m-b">Registre-se
</a>

<p class="m-t"> <small>Reconect Company &copy; {{ date('Y') }}</small></p>

</div>
</div>

<script src="js/jquery-3.1.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.js"></script>

</body>
</html>

<html>
    <head>
        <title>Inicio de sesion</title>
    </head>
    <body>
        <form method="POST" action="{{ route('authenticate') }}">
            @csrf
            <input id="email" type="email" name="email" value="{{ old('email') }}">
            <input id="password" name="password" type="password">
            <button type="submit" class="btn btn-dark btn-block">Enviar</button>
            @if ($errors->has('email'))
                <span class="text-danger">{{ $errors->first('email') }}</span>
            @endif
        </form>
        admin@hoteles-app.com
    </body>
</html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Bienvenido a Hoteles Fiesta</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <style>
            
        </style>
    </head>

    <body class="gradient" style=""><!-- background-color:var(--color2) -->
    
        <div class="">
            <div class="flex flex-col xl:flex-row h-full xl:flex-row-reverse"> 
                <div class="flex flex-col xl:w-2/3 xl:pt-36">
                    <div>
                        <img class="xl:mx-auto py-8 xl:w-9/12 w-full" src="{{ asset('images/logo-color.png') }}"></img>
                    </div>
                    
                </div>
                <div class="flex flex-col xl:w-1/3 xl:pt-36">
                    
                    <div class="mr-12 ml-12 pb-12">
                        <p class="xl:text-xl" > ¡Bienvenido a Hoteles fiesta!, tu web para encontrar habitaciones en los mejores hoteles 
                            para descansar o continuar la fiesta. </p>
                    </div>
                    <div class="mx-auto flex flex-col xl:flex-row">
                        <div class="mt-12 mx-auto xl:pr-8">
                            <a class="a-btn py-4 px-4 rounded-xl text-xl"  href="{{ route('login') }}" >Iniciar sesión</a>
                        </div>
                        <div class="mt-12 mx-auto">
                            <a class="a-btn py-4 px-4 rounded-xl text-xl" href="{{ route('register') }}">Registrarse</a>
                        </div>
                    </div>
                    
                </div>
            
                </div>
        </div>
    </body>
</html>
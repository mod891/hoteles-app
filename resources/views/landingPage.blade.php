<html>
    <head>
        <title>Bienvenido a Hoteles Fiesta</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <style>
            .a-btn {
                font-weight: 600;
                color: white;
                background-color: #2096bd;
            }
            .a-btn:hover {
                background-color: #2546f0;
            }
        </style>
    </head>

    <body style="background-color:var(--color2)"><!-- background-color:var(--color2) -->
    
        <div class="w-full">
            <div class="flex flex-col lg:flex-row h-full lg:flex-row-reverse"> 
                <div class="flex flex-col lg:w-2/3 justify-center">
                    <div>
                        <img class="lg:mx-auto py-8 lg:w-9/12" src="{{ asset('images/logo.svg') }}"></img>
                    </div>
                    
                </div>
                <div class="flex flex-col lg:w-1/3 justify-center">
                    
                    <div class="mr-12 ml-12 pb-12">
                        <p class="text-2xl" > Bienvenido a Hoteles fiesta, tu web para encontrar habitaciones en los mejores hoteles 
                            para descansar o continuar la fiesta. </p>
                    </div>
                    <div class="mx-auto flex flex-col lg:flex-row">
                        <div class="mt-12 mx-auto lg:pr-8">
                            <a class="a-btn py-4 px-4 rounded-lg text-xl"  href="{{ route('login') }}" >Iniciar sesión</a>
                        </div>
                        <div class="mt-12 mx-auto">
                            <a class="a-btn py-4 px-4 rounded-lg text-xl" href="{{ route('register') }}">Registrarse</a>
                        </div>
                    </div>
                    
                </div>
            
                </div>
        </div>
    </body>
</html>
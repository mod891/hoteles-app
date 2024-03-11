<html>
<head>
    <style>
        .flex {
            display: flex;
        }
        .flex-col {
            flex-direction: column;
        }
        .flex-row {
            flex-direction: row;
        }
        .w-1\/2 {
            width: 50%;
        }
        .w-1\/3 {
            width: 33%;
        }
        .w-full {
            width: 100%;
        }
        .self-center {
            align-self: center;
        }
        .mt-56 {
            margin-top: 6rem;
        }
        .mt-3r {
            margin-top: 3rem;
        }
        .css-table {
            border: solid 2px black;
        }
        .css-table tr {
            border: solid 2px black; 
        }
        .css-table td {
            border: solid 2px black; 
        }
        .css-table th {
            border: solid 2px black; 
        }
        .text-xl {
            font-weight: 800;
            font-size: 20px;
        }
        .mr-3r {
            margin-right: 3rem;
            padding-right: 3rem;
        }
    </style>
</head>
<body>
    <div class="flex flex-col">
        <div class="flex flex-row">
            <div class="w-full self-center">
                <img class="" src="images/logo.svg"></img>
            </div>
        </div>
        <div class="flex flex-row mt-3r ">
            <div class="flex flex-col w-1/2 self-center">
                <table>
                    <tr><td class="mr-3r">Nº de reserva</td><td>&emsp;&emsp;5657{{ $data['id']}}</td></tr>
                    <tr><td class="mr-3r">Creada reserva el</td><td>&emsp;&emsp;{{ (new \DateTime($data['created_at']))->format('d/m/Y'); }}</td></tr>
                    <tr><td class="mr-3r">Entrada al hotel</td><td>&emsp;&emsp;{{ (new \DateTime($data['fecha_ini']))->format('d/m/Y'); }}</td></tr>
                    <tr><td class="mr-3r">Salida del hotel</td><td>&emsp;&emsp;{{ (new \DateTime($data['fecha_fin']))->format('d/m/Y'); }}</td></tr>
                </table>
            </div>
            <div class="flex flex-col w-1/2 mt-3r">
                <table>
                    <thead>
                        <th > Cliente </th>
                    </thead>
                    <tbody>
                        <tr><td class="mr-3r">Nombre</td><td>&emsp;&emsp;{{ $data['user']['nombre']; }}</td></tr>
                        <tr><td class="mr-3r">Apellidos</td><td>&emsp;&emsp;{{ $data['user']['apellidos']; }}</td></tr>
                        <tr><td class="mr-3r">Email</td><td>&emsp;&emsp;{{ $data['user']['email']; }}</td></tr>
                        <tr><td class="mr-3r">Teléfono</td><td>&emsp;&emsp;{{ $data['user']['telefono']; }}</td></tr>
                    </tbody>
                </table>
            </div>
        </div>
        
        <div class="flex flex-row mt-56 w-full">
            <table class="css-table">
                <thead>
                    <th>Hotel</th>
                    <th>Habitacion</th>
                    <th>Características</th>
                    <th>Precio/noche</th>
                    <th>Dias</th>
                </thead>
                <tbody>
                    <tr>
                        <td>&emsp;Hotel {{$data['hotel']['nombre']; }}&emsp;</td>
                        <td>&emsp;Habitacion {{$data['room']['id']; }}&emsp;</td>
                        <td>&emsp;{{$data['room']['fumadores'].$data['room']['balcon'].$data['room']['minibar'].$data['room']['cama_matrimonio'].$data['room']['minicadena_wifi']; }}&emsp;</td>
                        <td>&emsp;{{$data['room']['precio']; }}&emsp;</td>
                        <td>&emsp;{{ $data['dias'] }}&emsp;</td>
                    </tr>
                </tbody>    
            </table>
        </div>

        <div class="flex flex-row mt-3r ">
            <div class="w-1/2"></div>
            <div class="w-1/2 text-xl">TOTAL: {{$data['precio']}} € IVA no incluido</div>

            
        </div>
    </div>
</body>

</html>
<div style="background-color:var(--color6)" class="border rounded-xl px-4 shadow-2xl mt-8">
    <div class="flex mt-12 flex-row justify-end">
        <a href="{{ route('admin.hotel.new') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-building-add" viewBox="0 0 16 16">
                <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0"/>
                <path d="M2 1a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v6.5a.5.5 0 0 1-1 0V1H3v14h3v-2.5a.5.5 0 0 1 .5-.5H8v4H3a1 1 0 0 1-1-1z"/>
                <path d="M4.5 2a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm3 0a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm3 0a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm-6 3a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm3 0a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm3 0a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm-6 3a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm3 0a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5z"/>
            </svg>
        </a>
    </div>
    <div class="flex flex-row justify-center">
    
        <div class="xl:mt-16 mt-12" id="table">
            <table class="">
                <thead>
                    <th class="xl:pr-12 pr-2">Nombre</th>
                    <!--<th class=" xl:pr-4 hidden xl:inline pr-2">Dirección</th>-->
                    <th class=" xl:pr-12 hidden xl:inline pr-2">Teléfono</th>
                    <th class="xl:pr-12 hidden xl:inline pr-2">Municipio</th>
                    <th class="xl:pr-12 hidden xl:inline pr-2">Provincia</th>
                    <th class="xl:pr-12 pr-2">Acción</th>
                </thead>
                <tbody id='tbodyHotel'>
                    <tr>

                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="flex flex-row justify-center xl:mt-16 mt-12">
        <div id="paginacionHotel">
        </div>
    </div>
    <br><br>
</div>

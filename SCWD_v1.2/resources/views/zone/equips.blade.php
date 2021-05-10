<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estudis</title>
    @livewireStyles
    @livewire('css-imports')
</head>
<body>
    @livewire('zone-navbar')

    <!-- Equips -->
    <div class="container mt-5 mb-3">
        <!-- Equips Tittle -->
        <div class="col-xs-12 mb-4 border-bottom">
            <h2>Equips</h2>
        </div>
        <!-- Equips where User has a Role -->
        <div class="container row justify-content-center"> 
        </div>
    </div>

    <!-- Team Options -->
    <div class="container">
        <div class=" row">
            <!-- Iteration for every Participation Option -->
            @foreach($Participacions as $Participacio)
                <div class="col-xs-12 col-sm-7 col-md-5 col-lg-4 col-xl-3 m-2 p-4 shadow rounded">
                    <div class="row justify-content-center mb-3 categoria_partits">
                        <p class="m-2">{{ $Categories[($loop->iteration)-1] }} {{ $Groups[($loop->iteration)-1] }}</p>
                    </div>
                    <div class="row justify-content-center mb3">
                        <a href="{{route('estudis', ['id_equip' => $Teams[($loop->iteration)-1]])}}" class="btn btn-primary stretched-link px-4">Entrar</a>
                    </div>
                </div>
            @endforeach
        </div>
        <!-- Errors Return -->
        <div class="results mt-3">
            @if(Session::get('fail'))
                <div class="alert alert-danger">
                    {{ Session::get('fail') }}
                </div>
            @endif
            @if($Participacions == NULL)
                <div class="alert alert-danger">
                    No estas participant en cap equip!
                </div>
            @endif
        </div>
    </div>
    
    
    <br>
    <br>
    @livewire('footer')

    @livewireScripts
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
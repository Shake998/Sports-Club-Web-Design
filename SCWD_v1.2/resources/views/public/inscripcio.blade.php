<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @livewireStyles
    @livewire('css-imports')
</head>
<body>
    @livewire('navbar')

    <!-- Inscripcions -->
    <div class="container mt-5 mb-3">
        <!--Inscripció Tittle -->
        <div class="inscripcio-title col-xs-12 mb-4 border-bottom">
            <h2>Inscripcions</h2>
        </div>
        <div class="inscripcio-media container-fluid row justify-content-center">
            <div class="inscripcio-col col-xs-12 col-sm-5 col-md-4 col-lg-3 m-2 shadow-lg rounded" style="">
                <div class="inscripcio-info justify-content-center align-items-center p-3 m-2" style="">
                    <h3 class="mt-4">Jocs Escolars</h3>
                    <p>< 2012</p>
                </div>
            </div>
            <div class="inscripcio-col col-xs-12 col-sm-5 col-md-4 col-lg-3 m-2 shadow-lg rounded">
                <div class="inscripcio-info justify-content-center align-items-center p-3">
                    <h3 class="mt-4">Pre-Benjamí</h3>
                    <p>2012</p>
                </div>
            </div>
            <div class="inscripcio-col col-xs-12 col-sm-5 col-md-4 col-lg-3 m-2 shadow-lg rounded">
                <div class="inscripcio-info justify-content-center align-items-center p-3">
                    <h3 class="mt-4">Benjamí</h3>
                    <p>2010-2011</p>
                </div>
            </div>
            <div class="inscripcio-col col-xs-12 col-sm-5 col-md-4 col-lg-3 m-2 shadow-lg rounded">
                <div class="inscripcio-info justify-content-center align-items-center p-3">
                    <h3 class="mt-4">Aleví</h3>
                    <p>2008-2009</p>
                </div>
            </div>
            <div class="inscripcio-col col-xs-12 col-sm-5 col-md-4 col-lg-3 m-2 shadow-lg rounded">
                <div class="inscripcio-info justify-content-center align-items-center p-3">
                    <h3 class="mt-4">Infantil</h3>
                    <p>2006-2007</p>
                </div>
            </div>
            <div class="inscripcio-col col-xs-12 col-sm-5 col-md-4 col-lg-3 m-2 shadow-lg rounded">
                <div class="inscripcio-info justify-content-center align-items-center p-3">
                    <h3 class="mt-4">Cadet</h3>
                    <p>2004-2005</p>
                </div>
            </div>
            <div class="inscripcio-col col-xs-12 col-sm-5 col-md-4 col-lg-3 m-2 shadow-lg rounded">
                <div class="inscripcio-info justify-content-center align-items-center p-3">
                    <h3 class="mt-4">Juvenil</h3>
                    <p>2002-2003</p>
                </div>
            </div>
            <div class="inscripcio-col col-xs-12 col-sm-5 col-md-4 col-lg-3 m-2 shadow-lg rounded">
                <div class="inscripcio-info justify-content-center align-items-center p-3">
                    <h3 class="mt-4">Senior</h3>
                    <p>Senior</p>
                </div>
            </div>
            </div>
        </div>
    </div>



    @livewire('footer')

    @livewireScripts
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
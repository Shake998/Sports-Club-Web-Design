<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    @livewireStyles
    @livewire('css-imports')
</head>
<body>
    @livewire('zone-navbar')
    
    <!-- Profile -->
    <div class="container mt-5 mb-3">
        <!-- Profile Tittle -->
        <div class="resultats-title col-xs-12 mb-4 border-bottom">
            <h2>Informació Personal</h2>
        </div>
    
        <div class="row py-5 px-4">
            <!-- Widgets -->
            <div class=" col-12 col-sm-12 col-md-9 col-lg-8 col-xl-8 mx-auto">
                <!-- Profile Widget -->
                <div class="bg-white shadow rounded overflow-hidden mb-3">
                    <!-- Profile Info -->
                    <div class="px-4 pt-3 pb-4 bg-dark">
                        <div class="media align-items-end profile-header">
                            <div class="profile mr-4">
                                <img src="{{ $User->persona->img }}" alt="profile picture" width="130" class="rounded mb-2 img-thumbnail">
                                <a href="#" class="btn btn-dark btn-sm btn-block">Edit profile</a>
                            </div>
                            <div class="media-body mb-5 text-white">
                                <h4 class="mt-0 mb-0">{{ $User->persona->nom }} {{ $User->persona->cognom }} {{ $User->persona->cognom2 }}</h4>
                                <p class="small mb-4"> <i class="fa fa-map-marker mr-2"><td>{{ $User->persona->data_naixement }}</td></i> </p>
                            </div>
                        </div>
                    </div>
                    <!-- Profile Stats -->
                    <div class="d-flex bg-light">
                        <div class="p-4 d-flex justify-content-start text-center">
                            <ul class="list-inline mb-0">
                                <li class="list-inline-item">
                                    <h5 class="font-weight-bold mb-0 d-block">{{ $Jugador->gols }}</h5><small class="text-muted"> <i class="fa fa-picture-o mr-1"></i>Gols</small>
                                </li>
                                <li class="list-inline-item">
                                    <h5 class="font-weight-bold mb-0 d-block">134</h5><small class="text-muted"> <i class="fa fa-user-circle-o mr-1"></i>Partits</small>
                                </li>
                                <li class="list-inline-item">
                                    <h5 class="font-weight-bold mb-0 d-block">5 Anys</h5><small class="text-muted"> <i class="fa fa-picture-o mr-1"></i>Linier</small>
                                </li>
                                <li class="list-inline-item">
                                    <h5 class="font-weight-bold mb-0 d-block">15</h5><small class="text-muted"> <i class="fa fa-user-circle-o mr-1"></i>Assistencies</small>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Stat Widget -->
                <div class="bg-white shadow rounded overflow-hidden mb-3">
                    <!-- Stats -->
                    <div class="d-flex">
                        <div class="p-4 d-flex justify-content-start text-center">
                            <ul class="list-inline mb-0">
                                <li class="list-inline-item">
                                    <h5 class="font-weight-bold mb-0 d-block">More</h5><small class="text-muted"> <i class="fa fa-picture-o mr-1"></i>Gols</small>
                                </li>
                                <li class="list-inline-item">
                                    <h5 class="font-weight-bold mb-0 d-block">Info</h5><small class="text-muted"> <i class="fa fa-user-circle-o mr-1"></i>Partits</small>
                                </li>
                                <li class="list-inline-item">
                                    <h5 class="font-weight-bold mb-0 d-block">Here</h5><small class="text-muted"> <i class="fa fa-picture-o mr-1"></i>Linier</small>
                                </li>
                                <li class="list-inline-item">
                                    <h5 class="font-weight-bold mb-0 d-block"></h5><small class="text-muted"> <i class="fa fa-user-circle-o mr-1"></i>Asistencies</small>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Stat Widget -->
                <div class="bg-white shadow rounded overflow-hidden mb-3">
                    <!-- Stats -->
                    <div class="d-flex bg-light">
                        <div class="p-4 d-flex justify-content-start text-center">
                            <ul class="list-inline mb-0">
                                <li class="list-inline-item">
                                    <h5 class="font-weight-bold mb-0 d-block">More</h5><small class="text-muted"> <i class="fa fa-picture-o mr-1"></i>Gols</small>
                                </li>
                                <li class="list-inline-item">
                                    <h5 class="font-weight-bold mb-0 d-block">Info</h5><small class="text-muted"> <i class="fa fa-user-circle-o mr-1"></i>Partits</small>
                                </li>
                                <li class="list-inline-item">
                                    <h5 class="font-weight-bold mb-0 d-block">Here</h5><small class="text-muted"> <i class="fa fa-picture-o mr-1"></i>Linier</small>
                                </li>
                                <li class="list-inline-item">
                                    <h5 class="font-weight-bold mb-0 d-block"></h5><small class="text-muted"> <i class="fa fa-user-circle-o mr-1"></i>Asistencies</small>
                                </li>
                            </ul>
                        </div>
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estudis</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.0/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
    @livewireStyles
    @livewire('css-imports')
</head>
<body>
    @livewire('zone-navbar')

    <!-- Estudis -->
    <div class="container mt-5 mb-3">
        <!-- Estudis Title -->
        <div class="col-xs-12 mb-4 border-bottom">
            <h2>Estudis</h2>
        </div>
        <!-- Estudis Posts -->
        <div class="container row justify-content-center"> 
        </div>
    </div>
    <!-- Role Title -->
    <div class="container">
        <p class="text-center m-2 p-3 h4 rounded bg-light mb-5">{{ $Role->name }}</p>
    </div>
    <!-- Tabs and Pills -->
    <div class="container-fluid px-5">
        <div class="row">
            <!-- Title of Tabs -->
            <div class="col-12 col-xs-12 col-sm-12 col-md-3 col-lg-2">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active" id="v-pills-general-tab" data-toggle="pill" href="#v-pills-general" role="tab" aria-controls="v-pills-general" aria-selected="true">General</a>
                    <a class="nav-link" id="v-pills-plantilla-tab" data-toggle="pill" href="#v-pills-plantilla" role="tab" aria-controls="v-pills-plantilla" aria-selected="false">Plantilla</a>
                    <a class="nav-link" id="v-pills-estudis-tab" data-toggle="pill" href="#v-pills-estudis" role="tab" aria-controls="v-pills-estudis" aria-selected="false">Estudis</a>
                    <a class="nav-link" id="v-pills-entrenaments-tab" data-toggle="pill" href="#v-pills-entrenaments" role="tab" aria-controls="v-pills-entrenaments" aria-selected="false">Entrenaments</a>
                    <a class="nav-link" id="v-pills-ranking-tab" data-toggle="pill" href="#v-pills-ranking" role="tab" aria-controls="v-pills-ranking" aria-selected="false">Ranking</a>
                    <a class="nav-link" id="v-pills-calendari-tab" data-toggle="pill" href="#v-pills-calendari" role="tab" aria-controls="v-pills-calendari" aria-selected="false">Calendari</a>
                    <a class="nav-link" id="v-pills-ajustaments-tab" data-toggle="pill" href="#v-pills-ajustaments" role="tab" aria-controls="v-pills-ajustaments" aria-selected="false">Ajustaments</a>
                </div>
            </div>
            <!-- Content of Tabs -->
            <div class="col-12 col-xs-12 col-sm-12 col-md-9 col-lg-10 rounded bg-light">
                <div class="tab-content p-4" id="v-pills-tabContent">
                    <!-- General Tabs -->
                    <div class="tab-pane fade show active" id="v-pills-general" role="tabpanel" aria-labelledby="v-pills-general-tab">
                        <div class="row">
                        <div class="col-12 col-xs-6 col-sm-4 col-md-4 col-lg-2 m-2 rounded border">
                                <div class="p-2 text-center">
                                    {{ $Equip->nom }}
                                </div>
                            </div>
                            <div class="col-12 col-xs-6 col-sm-6 col-md-6 col-lg-4 col-xl-3 m-2 rounded border">
                                <div class="p-2 text-center">
                                    {{ $Categoria->nom }} {{ $Grup->nom }}
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <!-- Plantilla Tabs -->
                    <div class="tab-pane fade" id="v-pills-plantilla" role="tabpanel" aria-labelledby="v-pills-plantilla-tab">
                        <div class="row ">
                            @foreach($Plantilla as $Juga)
                                <div class="card m-3" style="width: 10rem;">
                                    <img class="card-img-top border-bottom" src="{{ $Juga->img }}" alt="Card profile image">
                                    <div class="card-body my-0">
                                        <h5 class="card-title">{{ $Juga->nom_dorsal }}</h5>
                                        <p class="card-text">{{ $Juga->dorsal }}</p>
                                        @if( $Role->name  == 'Entrenador Tecnic' || $Role->name  == 'Delegat')
                                        <a href="#" class="btn btn-primary py-0 my-0 w-100">Veure més</a>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- Estudis Tabs -->
                    <div class="tab-pane fade" id="v-pills-estudis" role="tabpanel" aria-labelledby="v-pills-estudis-tab"></div>
                    <!-- Entrenaments Tabs -->
                    <div class="tab-pane fade" id="v-pills-entrenaments" role="tabpanel" aria-labelledby="v-pills-entrenaments-tab"></div>
                    <!-- Ranking Tabs -->
                    <div class="tab-pane fade" id="v-pills-ranking" role="tabpanel" aria-labelledby="v-pills-ranking-tab" style="overflow-x:auto;">
                        <table id="rankingDatatable" class="table table-sm text-center">
                            <thead>
                                <tr>
                                    <th scope="col">Posició</th>
                                    <th scope="col">Club</th>
                                    <th scope="col">Equip</th>
                                    <th scope="col">Puntuació</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Loop for each instance of Ranking Equips -->
                                @foreach($ParticipacionsRanking as $ParticipacioRanking)
                                    <tr>
                                        <!-- TODO - Add 1 to posicion -->
                                        <td scope="row">{{ $loop->index+1 }}º</td>
                                        <td><img src="{{ $ClubsRanking[$loop->index]->img }}" alt="" class="matches_logos"></td>
                                        <td>{{ $EquipsRanking[$loop->index]->nom }}</td>
                                        <td>{{ $ParticipacioRanking->puntuacio }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- Calendari Tabs -->
                    <div class="tab-pane fade" id="v-pills-calendari" role="tabpanel" aria-labelledby="v-pills-calendari-tab" style="overflow-x:auto;">
                        <!-- TODO - Make hoverable rows and link to another page to show match statistics -->
                        <table id="datatable" class="table table-sm text-center">
                            @if( $Role->name  == 'Entrenador Tecnic' || $Role->name  == 'Delegat')
                                <div class="d-flex flex-row-reverse">
                                    <button id="createButton" class="btn btn-light p-1" data-toggle="modal" data-target="#createModal"><img src="../img/icons/plus.png" alt="plus" style="max-width: 20px;"></button>
                                </div>
                            @endif
                            <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Jornada</th>
                                    <th scope="col">Local</th>
                                    <th scope="col">Visitant</th>
                                    <th scope="col">Data</th>
                                    <th scope="col">Resultat</th>
                                    <th scope="col"></th>
                                    @if( $Role->name  == 'Entrenador Tecnic'|| $Role->name  == 'Delegat')
                                        <th scope="col">Editar</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Loop for each instance of Partit -->
                                @foreach($Partits as $Partit)
                                    <tr>
                                        <td>{{ $Partit->id_partit }}</td>
                                        <td scope="row">{{ $Partit->jornada }}</td>
                                        <td><img src="{{ $Partit->img_club_local }}" alt="" class="matches_logos"></td>
                                        <td><img src="{{ $Partit->img_club_visitant }}" alt="" class="matches_logos"></td>
                                        <td>{{ $Partit->data }}</td>
                                        <td>{{ $Partit->gols_local }} - {{ $Partit->gols_visitant }}</td>
                                        <td>
                                            @if($Partit->finalitzat)
                                                @if($Partit->is_guanyat)
                                                    <svg height="20" width="20">
                                                        <circle cx="10" cy="7" r="6" stroke="black" stroke-width="1" fill="green" />
                                                    </svg>
                                                @else
                                                    <svg height="20" width="20">
                                                        <circle cx="10" cy="7" r="6" stroke="black" stroke-width="1" fill="red" />
                                                    </svg>
                                                @endif
                                            @else
                                                <svg height="20" width="20">
                                                    <circle cx="10" cy="7" r="6" stroke="black" stroke-width="1" fill="gray" />
                                                </svg>
                                            @endif
                                        </td>
                                        @if( $Role->name  == 'Entrenador Tecnic' || $Role->name  == 'Delegat')
                                            <td>
                                                <a id="updateButton" href="" class="edit btn-light p-1 px-2 rounded" data-toggle="modal" data-target="#updateModal"><img src="../img/icons/edit.png" alt="Edit Button" style="max-width: 15px;"></a>
                                                <a id="deleteButton" href="" class="btn-light p-1 px-2 rounded" data-toggle="modal" data-target="#deleteModal"><img src="../img/icons/delete.png" alt="Delete Button" style="max-width: 15px;"></a> 
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- Ajustaments Tabs -->
                    <div class="tab-pane fade" id="v-pills-ajustaments" role="tabpanel" aria-labelledby="v-pills-ajustaments-tab"></div>
                </div>
            </div>
        </div>
    </div>
        <!-- TODO CRUD Return -->
        <div class="row">
            <div class="col-12 results mt-3">
                @if(Session::get('fail'))
                    <div class="alert alert-danger alert-dismissible">
                        <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        {{ Session::get('fail') }}
                    </div>
                @elif(Session::get('success'))
                    <div class="alert alert-success alert-dismissible">
                        <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        {{ Session::get('success') }}
                    </div>
                @endif
            </div>
        </div>

    <!-- Modal HTML Markup -->
    @if( $Role->name  == 'Entrenador Tecnic' || $Role->name  == 'Delegat')
        <!-- Create Modal -->
        <div id="createModal" class="modal fade">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Crear un nou partit</h4>
                    </div>

                    <!-- Modal Form -->
                    <form id="createForm" action="/createPartitModal" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('POST') }}

                        <div class="modal-body">
                            <!-- Input Jornada -->
                            <div class="form-group">
                                <label>Jornada</label>
                                <input type="number" name="create_jornada" id="create_jornada" class="form-control" placeholder="Jornada del partit">
                            </div>
                            <!-- Selector Equip Local -->
                            <div class="form-group d-flex flex-column">
                                <label>Equip Local</label>
                                <select name="create_participa_local" class="form-control" id="create_participa_local">
                                    @foreach($ClubsRanking as $clubOption)
                                        <option value={{ $ParticipacionsRanking[$loop->index]->id_participa }}>
                                            <p>{{ $EquipsRanking[$loop->index]->nom }}</p>
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <!-- Selector Equip Visitant -->
                            <div class="form-group d-flex flex-column">
                                <label>Equip Visitant</label>
                                <select name="create_participa_visitant" class="form-control" id="create_participa_visitant">
                                    @foreach($ClubsRanking as $clubOption)
                                        <option value={{ $ParticipacionsRanking[$loop->index]->id_participa }}>
                                            <p>{{ $EquipsRanking[$loop->index]->nom }}</p>
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <!-- Input Date -->
                            <div class="form-group">
                                <label>Data</label>
                                <input type="date" name="create_data" id="create_data" class="form-control" placeholder="Data del partit">
                            </div>
                        </div>

                        <!-- Modal Footer -->
                        <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Acceptar</button>
                            <a type="button" class="btn btn-secondary" href="" data-dismiss="modal">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Update Modal -->
        <div id="updateModal" class="modal fade">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Modificar partit</h4>
                    </div>

                    <!-- Modal Form -->
                    <form id="updateForm" action="/updatePartitModal" method="POST">

                        {{ csrf_field() }}
                        {{ method_field('POST') }}

                        <div class="modal-body">
                            <!-- Input Id READONLY -->
                            <div class="form-group">
                                <input readonly="readonly" name="update_id" id="update_id" class="form-control" placeholder="Insereix les dades a modificar">
                            </div>
                            <!-- Input Gols Equip Local -->
                            <div class="form-group">
                                <label>Gols Equip Local</label>
                                <input type="text" name="update_glocal" id="update_glocal" class="form-control" placeholder="Gols de l'Equip Local">
                            </div>
                            <!-- Input Gols Equip Visitant -->
                            <div class="form-group">
                                <label>Gols Equip Visitant</label>
                                <input type="text" name="update_gvisitant" id="update_gvisitant" class="form-control" placeholder="Gols de l'Equip Visitant">
                            </div>
                            <!-- Input Date -->
                            <div class="form-group">
                                <label>Data</label>
                                <input type="date" name="update_data" id="update_data" class="form-control" placeholder="Data del partit">
                            </div>
                        </div>

                        <!-- Modal Footer -->
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">Acceptar</button>
                            <a type="button" class="btn btn-secondary" href="" data-dismiss="modal">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Delete Modal -->
        <div id="deleteModal" class="modal fade">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Estas segur de que vols eliminar el partit?</h4>
                    </div>

                    <!-- Modal Form -->
                    <form id="deleteForm" action="/deletePartitModal" method="POST">

                        {{ csrf_field() }}
                        {{ method_field('POST') }}

                        <div class="modal-body">
                            <!-- Input Id READONLY -->
                            <div class="form-group">
                                <input readonly="readonly" name="delete_id" id="delete_id" class="form-control">
                            </div>
                            <!-- Input Gols Equip Local -->
                            <div class="form-group">
                                <label>Gols Equip Local</label>
                                <input readonly="readonly" name="delete_glocal" id="delete_glocal" class="form-control" placeholder="Gols de l'Equip Local">
                            </div>
                            <!-- Input Gols Equip Visitant -->
                            <div class="form-group">
                                <label>Gols Equip Visitant</label>
                                <input readonly="readonly" name="delete_gvisitant" id="delete_gvisitant" class="form-control" placeholder="Gols de l'Equip Visitant">
                            </div>
                            <!-- Input Date -->
                            <div class="form-group">
                                <label>Data</label>
                                <input readonly="readonly" name="delete_data" id="delete_data" class="form-control" placeholder="Data del partit">
                            </div>
                        </div>

                        <!-- Modal Footer -->
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">Eliminar</button>
                            <a type="button" class="btn btn-secondary" href="" data-dismiss="modal">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif




    
    <br>
    <br>
    
    <br>
    <br>
    

    @livewire('footer')

    @livewireScripts
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/modal.js') }}"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>

    <!-- Modal Scripts -->
    <script type="text/javascript">
        //Create Modal Functionality
        $(document).ready(function () {
            var table = $('#datatable').DataTable();

            //Start Create Record
            table.on('click', '#createButton', function () {
                
                $('#createForm').attr('action', '/createPartitModal/');
                $('#createModal').modal('show');

            });
        });

        //Update Modal Functionality
        $(document).ready(function () {
            var table = $('#datatable').DataTable();

            //Start Update Record
            table.on('click', '#updateButton', function () {

                $tr = $(this).closest('tr');
                var data = $tr.children("td").map(function(){
                    return $(this).text();
                }).get();
                
                console.log(data);
                console.log(data[0]);
                
                $('#update_id').val(data[0]);
                $('#update_glocal').val(data[5].charAt(0));
                $('#update_gvisitant').val(data[5].slice(-1));
                $('#update_data').val(data[4]);
                

                $('#updateForm').attr('action', '/updatePartitModal');
                $('#updateModal').modal('show');

            });
        });

        //Delete Modal Functionality
        $(document).ready(function () {
            var table = $('#datatable').DataTable();

            //Start Delete Record
            table.on('click', '#deleteButton', function () {

                $tr = $(this).closest('tr');
                var data = $tr.children("td").map(function(){
                    return $(this).text();
                }).get();
                
                console.log(data);
                console.log(data[0]);
                
                $('#delete_id').val(data[0]);
                $('#delete_glocal').val(data[5].charAt(0));
                $('#delete_gvisitant').val(data[5].slice(-1));
                $('#delete_data').val(data[4]);
                

                $('#deleteForm').attr('action', '/deletePartitModal');
                $('#deleteModal').modal('show');

            });
        });
    </script>
</body>
</html>
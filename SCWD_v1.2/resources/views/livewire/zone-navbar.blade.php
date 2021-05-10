<div class="container.fluid sticky-top mb-5">
    <nav class="navbar navbar-expand-md navbar-light bg-light border-bottom mt-3 mb-3" role="navigation">
            <!--Navbar Logo -->
            <a class="navbar-brand" href="/">
                <img src="../img/logos/linia22hc.png" width="80" height="40" />
            </a>
            <!--Navbar Button Toggler-->
            <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarContent">
            <span class="navbar-toggler-icon"></span>
            </button>
            <!--Navbar Links-->
            <div class="collapse navbar-collapse" id="navbarContent">
                <div class="container-fluid">
                    <ul class="nav navbar-nav">
                        <li class="nav-item">   
                            <a class="nav-link" href="/">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active-nav" href="/perfil">Personal</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/equips">Equips</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="">Resultats</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="">Events</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="">Novetats</a>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="/perfil"><img class="profile-photo rounded-circle border" src="{{ $LoggedUserInfo->persona->img }}"  alt="profile photo" style="width: 38px; height: 40px;"></a>
                        </li>
                        <li class="nav-item my-auto">
                            <a href="/logout" class="nav-link">
                                <img src="https://img.icons8.com/ios/50/000000/exit.png" width="15" height="15"/> Logout
                            </a>
                        </li>
                    </ul>
                </div>
                
            </div>
    </nav>
</div>

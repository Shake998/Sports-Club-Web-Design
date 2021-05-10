<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    @livewireStyles
    @livewire('css-imports')
</head>
<body>
    @livewire('navbar')

    <!-- Login -->
    <div class="container mb-3">
        <div class="row mt-5">
            <div class="col-md-3"></div>
            <div class="col-md-6 col-md-offset-6">
                <h4>User Login</h4>
                <form action="{{ route('auth.check') }}" method="post">
                @csrf
                    <div class="results">
                        @if(Session::get('fail'))
                            <div class="alert alert-danger">
                                {{ Session::get('fail') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="email">Username</label>
                        <input type="text" class="form-control" name="username" placeholder="Enter username" value="{{ old('username') }}">
                        <span class="text-danger">@error('username') {{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Enter password">
                        <span class="text-danger">@error('password') {{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-block btn-primary">Login</button>
                    </div>
                    <br>
                    <a href="register">No recordo l'usuari o la contrasenya!</a>
                </form>
            </div>
        </div>
    </div>


    @livewire('footer')

    @livewireScripts
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
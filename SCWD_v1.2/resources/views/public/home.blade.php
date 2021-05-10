<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    @livewireStyles
    @livewire('css-imports')
</head>
<body>
    @livewire('navbar')



    @livewire('footer')

    @livewireScripts
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
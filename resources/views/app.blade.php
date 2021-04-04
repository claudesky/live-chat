<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Live Chat</title>
    <link rel="stylesheet" href="{{ mix('css/app.css', config('app.manifest_path')) }}">
</head>
<body>
    <div id="app">
        <App/>
    </div>
    <script src="{{ mix('js/app.js', config('app.manifest_path')) }}"></script>
</body>
</html>

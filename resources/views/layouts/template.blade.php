<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite([
    'resources/sass/app.scss',
    'resources/sass/default.scss',
    'resources/sass/forms.scss',
    'resources/sass/button.scss',
    'resources/sass/table.scss',
    'resources/sass/text.scss',
    'resources/sass/message.scss',
    'resources/js/app.js'
    ])
</head>

<body>
    <header>
        <div class="site-title"> {{ $title }} </div>
    </header>
    @if (session('success'))
    <div class="message success">
        {{ session('success') }}
    </div>
    @endif
    @yield('contents')
    <footer>
        Laravel Test
    </footer>
</body>

</html>
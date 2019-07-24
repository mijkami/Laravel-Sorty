<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script type="text/javascript"> (function() { var css = document.createElement('link'); css.href = 'https://use.fontawesome.com/releases/v5.1.0/css/all.css'; css.rel = 'stylesheet'; css.type = 'text/css'; document.getElementsByTagName('head')[0].appendChild(css); })(); </script>
    <script src="https://cdn.tiny.cloud/1/yw2alpvctek8wufoxpxk8yffewrm15kpefdwcxbq1phsmq9a/tinymce/5/tinymce.min.js"></script>
    <script>
        tinymce.init({
        selector: "textarea.editme",
        selector : "textarea:not(.mceNoEditor)",
        height: 180,
        width: 800,
        menubar: false,
        plugins: ' link ',
        toolbar: 'bold italic underline forecolor  fontsizeselect | alignleft aligncenter alignright | link removeformat |',
        forced_root_block : false,
        });
    </script>
</head>

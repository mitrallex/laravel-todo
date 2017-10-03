<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Learn Vue</title>
    <link rel="stylesheet" type="text/css" href="css/app.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>
        window.Laravel = { csrfToken: '{{ csrf_token() }}' }
    </script>
</head>
<body>
    <nav class="navbar">
        <div class="navbar-brand">
            <a class="navbar-item" href="{{ url('/test') }}">
                <img src="images/logo.png" alt="ToDo application" width="112" height="28">
            </a>
            <div class="navbar-item is-hidden-desktop">
                <p class="control">
                    <a class="button is-primary" href="#">
                            <span class="icon">
                                <i class="fa fa-calendar"></i>
                            </span>
                        <span>Date</span>
                    </a>
                </p>
            </div>
        </div>
        <div class="navbar-menu">
            <div class="navbar">

                <div class="navbar-item" id="date_picker">
                    <datepicker v-model="date" input-class="input"></datepicker>
                </div>

            </div>
        </div>
    </nav>

    <div id='app' class="container">
        <task-list></task-list>
    </div>

    <script src="js/app.js"></script>
</body>
</html>

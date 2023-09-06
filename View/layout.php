<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/assets/css/style.css">
    <title>Movies Critical Project</title>
</head>
<body>
    <header>
        <img src="/assets/image/drawing.png" alt="drawing">
        <p class="normal"><a href="/home" title="presentation" class="link">Presentation</a></p>
        <p class="normal"><a href="/biography" title="biography" class="link">Biography</a></p>
        <p class="normal"><a href="/movies" title="movies" class="link">Movies</a></p>
        <?php
        //We store the "login" button in a variable.
        $connect = "
               <p class='normal'><a href='/contact' title='contact' class='link'>Contact</a></p>
        ";

        //We store the "disconnect" button in a variable.
        $disconnect = "
               <p class='normal'><a href='/contactReceived' title='contact received' class='link'>Contact received</a></p>
               <p class='normal'><a href='/users' title='user list' class='link'>User list</a></p>
        ";

        //The connexion() function is invoked to make the "log out" button appear only to the administrator and the "login" button only to users.
        $admin = new \App\Controller\LoginController();
        $admin->connect($connect, $disconnect);

        //We store the "login" button in a variable.
        $connect = "
               <p class='normal'><a href='/identification' title='identification' class='link'>Sign in</a></p>
        ";

        //We store the "disconnect" button in a variable.
        $disconnect = "
               <p class='normal'><a href='/session' title='delete session' class='link'>Sign out</a></p>
        ";

        //The connexion() function is invoked to make the "log out" button appear only to the user and the "login" button only to users.
        $admin = new \App\Controller\LoginController();
        $admin->disconnect($connect, $disconnect);
        ?>
        <div id="menu">
            <div class="band"></div>
            <div class="band"></div>
            <div class="band"></div>
        </div>
    </header>
    <div id="list">
        <p id="close"><a>x</a></p>
        <p class="script"><a href="/home" title="presentation" class="link">Presentation</a></p>
        <p class="script"><a href="/biography" title="biography" class="link">Biography</a></p>
        <p class="script"><a href="/movies" title="movies" class="link">Movies</a></p>
        <?php
        //We store the "login" button in a variable.
        $connect = "
               <p class='script'><a href='/contact' title='contact' class='link'>Contact</a></p>
        ";

        //We store the "disconnect" button in a variable.
        $disconnect = "
               <p class='script'><a href='/contactReceived' title='contact received' class='link'>Contact received</a></p>
               <p class='script'><a href='/users' title='user list' class='link'>User list</a></p>
        ";

        //The connexion() function is invoked to make the "log out" button appear only to the administrator and the "login" button only to users.
        $admin = new \App\Controller\LoginController();
        $admin->connect($connect, $disconnect);

        //We store the "login" button in a variable.
        $connect = "
               <p class='script'><a href='/identification' title='identification' class='link'>Sign in</a></p>
        ";

        //We store the "disconnect" button in a variable.
        $disconnect = "
               <p class='script'><a href='/session' title='delete session' class='link'>Sign out</a></p>
        ";

        //The connexion() function is invoked to make the "log out" button appear only to the user and the "login" button only to users.
        $admin = new \App\Controller\LoginController();
        $admin->disconnect($connect, $disconnect);
        ?>
    </div>

    <?= $html ?>

    <script src="/assets/js/method.js"></script>
</body>
</html>

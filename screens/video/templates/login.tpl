<!DOCTYPE html>
<html lang="es-ES">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="video, streaming" />
    
    <title>PHPFlix</title>
    
    <link rel="stylesheet" href="./css/materialdesignicons.min.css" defer>
    <link rel="stylesheet" href="./css/style.css" defer/>
</head>

<body>
    <header>
        <h1>
            <a class="mdi mdi-light mdi-video-vintage" href="videos.php">PHPFlix</a>
        </h1>
    </header>

    <main>       
        <form action="#" method="POST" id="form" class="login" autocomplete="off">
            <p class="error">{$txt}</p>
            <div>
                <label for="user">DNI</label>
                <input type="text" name="dni" id="dni" placeholder="DNI del usuario" maxlength="9"/>
            </div>
            
            <div>
                <label for="pass">Contraseña</label>
                <input type="password" name="pass" id="pass" placeholder="Contraseña" maxlength="20"/>
            </div>
            
            <button type="submit">Login</button>            
        </form>
    </main>   

</body>

</html>

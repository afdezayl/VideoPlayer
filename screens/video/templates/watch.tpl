<!DOCTYPE html>
<html lang="es-ES">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="video, streaming" />
    
    <title>Plataforma de streaming</title>
    
    <link rel="stylesheet" href="./css/style.css" />
    <link rel="stylesheet" href="./css/materialdesignicons.min.css">
    
    <script src="./js/watch.js" defer></script>    
</head>

<body>    
    {include file="header.tpl"}

    <main>
        <h2>{$video.titulo}</h2>
        <div class="videoWrapper">
            <video src="{$urlVideo}" class="videoPlayer" poster="./img/{$video.cartel}" type="video/mp4" preload="none" controls="controls" controlsList="nodownload" oncontextmenu="return false;"></video>
        </div>
        
        <section class="description">            
            <img src="./img/{$video.cartel}" alt="Cartel {$video.titulo}">            
            <p>{$video.sinopsis}</p>
            <div>
                {if $video.descargable == 'S'}
                    <button id="download" class="mdi mdi-download icon" data-codigo="{$video.codigo}"></button>
                {/if}                
            </div>      
        </section>        
    </main>   

    <footer>aaaaaaaaa</footer>
</body>

</html>

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
    <script src="./js/menu.js" defer></script>   
</head>

<body>    
    {include file="header.tpl"}

    <main>        
        <div class="videoWrapper">
            <video src="{$urlVideo}" class="videoPlayer" poster="./img/{$video.cartel}" type="video/mp4" preload="none" controls="controls" controlsList="nodownload" oncontextmenu="return false;"></video>
        </div>
        
        <section class="description">            
            <img src="./img/{$video.cartel}" alt="Cartel {$video.titulo}">
            <h2>{$video.titulo}</h2>
            {if $video.descargable == 'S'}
                <span id="download" class="mdi mdi-36px mdi-light mdi-download btn" data-codigo="{$video.codigo}">Descargar</span>
            {/if}           
            <p>{$video.sinopsis}</p>                  
        </section>        
    </main>   

    {include file="footer.tpl"}
</body>

</html>

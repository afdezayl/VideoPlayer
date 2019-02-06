<!DOCTYPE html>
<html lang="es-ES">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="video, streaming" />
    
    <title>Plataforma de streaming</title>
    
    <link rel="stylesheet" href="./css/materialdesignicons.min.css">
    <link rel="stylesheet" href="./css/style.css" />    
    
    <script src="./js/videos.js" defer></script>
    <script src="./js/menu.js" defer></script>
</head>

<body>
    {include file="header.tpl"}

    <main>        
        <button id="showCat" class="mdi mdi-24px mdi-filter-outline">Categorías</button>
        <div class="GENERAL category">
            <h2>GENERAL</h2>
            <section class="movies">            
                {foreach $videos as $video}
                    <article class="movie" data-categories="{$video.category}">                    
                        <figure>
                            <img src="./img/{$video.cartel}" alt="{$video.titulo}" data-id="{$video.codigo}">
                        </figure>
                        <div class="movieInfo"> 
                            {if $video.viewCount}
                                <div class="views">
                                    <i class="mdi mdi-24px mdi-eye-check-outline"></i>
                                </div>                                                                
                            {/if} 
                            <button class="mdi mdi-play-circle-outline" data-id="{$video.codigo}">Ver</button>                     
                        </div>                        
                    </article>
                {/foreach}
            </section>
        </div>         
    </main>

    {include file="footer.tpl"}      
</body>

</html>

<!DOCTYPE html>
<html lang="es-ES">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="video, streaming" />
    
    <title>PHPFlix</title>
    
    <link rel="stylesheet" href="./css/materialdesignicons.min.css" defer>
    <link rel="stylesheet" href="./css/style.css" defer/>    
    
    <script src="./js/videos.js" defer></script>
    <script src="./js/menu.js" defer></script>
</head>

<body>
    {include file="header.tpl"}

    <nav>        
        <label for="title">Filtrar:</label>
        <input type="text" name="title" id="title" placeholder="Buscar por título">
        <button id="showCat" class="mdi mdi-24px mdi-light mdi-filter-outline btn">Categorías</button>
    </nav>

    <main>        
        <div class="GENERAL category">
            <h2>GENERAL</h2>
            <section class="movies">            
                {foreach $videos as $video}
                    <article class="movie" data-title="{$video.titulo}" data-categories="{$video.category}">                    
                        <figure>
                            <img src="./img/{$video.cartel}" alt="{$video.titulo}" data-id="{$video.codigo}">
                        </figure>
                        <div class="movieInfo"> 
                            {if $video.viewCount}
                                <div class="views">
                                    <i class="mdi mdi-24px mdi-light mdi-eye-check-outline"></i>
                                </div>                                                                
                            {/if} 
                            <button class="mdi mdi-play-circle-outline btn" data-id="{$video.codigo}">Ver</button>                     
                        </div>                        
                    </article>
                {/foreach}
            </section>
        </div>         
    </main>

    {include file="footer.tpl"}      
</body>

</html>

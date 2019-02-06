<?php
/* Smarty version 3.1.33, created on 2019-02-06 18:15:18
  from 'C:\UwAmp\screens\video\templates\videos.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c5b24368b99a8_33798470',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'da9b6a89187afd4d16de02f00c96c6b6831805e3' => 
    array (
      0 => 'C:\\UwAmp\\screens\\video\\templates\\videos.tpl',
      1 => 1549476828,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_5c5b24368b99a8_33798470 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="es-ES">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="video, streaming" />
    
    <title>PHPFlix</title>
    
    <link rel="stylesheet" href="./css/materialdesignicons.min.css" defer>
    <link rel="stylesheet" href="./css/style.css" defer/>    
    
    <?php echo '<script'; ?>
 src="./js/videos.js" defer><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="./js/menu.js" defer><?php echo '</script'; ?>
>
</head>

<body>
    <?php $_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

    <nav>        
        <label for="title">Filtrar:</label>
        <input type="text" name="title" id="title" placeholder="Buscar por título">
        <button id="showCat" class="mdi mdi-24px mdi-light mdi-filter-outline btn">Categorías</button>
    </nav>

    <main>        
        <div class="GENERAL category">
            <h2>GENERAL</h2>
            <section class="movies">            
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['videos']->value, 'video');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['video']->value) {
?>
                    <article class="movie" data-title="<?php echo $_smarty_tpl->tpl_vars['video']->value['titulo'];?>
" data-categories="<?php echo $_smarty_tpl->tpl_vars['video']->value['category'];?>
">                    
                        <figure>
                            <img src="./img/<?php echo $_smarty_tpl->tpl_vars['video']->value['cartel'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['video']->value['titulo'];?>
" data-id="<?php echo $_smarty_tpl->tpl_vars['video']->value['codigo'];?>
">
                        </figure>
                        <div class="movieInfo"> 
                            <?php if ($_smarty_tpl->tpl_vars['video']->value['viewCount']) {?>
                                <div class="views">
                                    <i class="mdi mdi-24px mdi-light mdi-eye-check-outline"></i>
                                </div>                                                                
                            <?php }?> 
                            <button class="mdi mdi-play-circle-outline btn" data-id="<?php echo $_smarty_tpl->tpl_vars['video']->value['codigo'];?>
">Ver</button>                     
                        </div>                        
                    </article>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </section>
        </div>         
    </main>

    <?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>      
</body>

</html>
<?php }
}

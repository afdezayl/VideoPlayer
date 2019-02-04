<?php
/* Smarty version 3.1.33, created on 2019-02-04 08:27:32
  from 'C:\UwAmp\screens\video\templates\watch.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c57f7742948c9_38750818',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '578a22727dd36c8bdbaaec6cf9817e7d2fa431b5' => 
    array (
      0 => 'C:\\UwAmp\\screens\\video\\templates\\watch.tpl',
      1 => 1549268846,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
  ),
),false)) {
function content_5c57f7742948c9_38750818 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="es-ES">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="video, streaming" />
    
    <title>Plataforma de streaming</title>
    
    <link rel="stylesheet" href="./css/style.css" />
    <link rel="stylesheet" href="./css/materialdesignicons.min.css">
    
    <?php echo '<script'; ?>
 src="./js/watch.js" defer><?php echo '</script'; ?>
>    
</head>

<body>    
    <?php $_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

    <main>
        <h2><?php echo $_smarty_tpl->tpl_vars['video']->value['titulo'];?>
</h2>
        <div class="videoWrapper">
            <video src="<?php echo $_smarty_tpl->tpl_vars['urlVideo']->value;?>
" class="videoPlayer" type="video/mp4" controls="controls" controlsList="nodownload nofullscreen" oncontextmenu="return false;"></video>
        </div>
        
        <section class="description">            
            <img src="./img/<?php echo $_smarty_tpl->tpl_vars['video']->value['cartel'];?>
" alt="Cartel <?php echo $_smarty_tpl->tpl_vars['video']->value['titulo'];?>
">            
            <p><?php echo $_smarty_tpl->tpl_vars['video']->value['sinopsis'];?>
</p>
            <div>
                <?php if ($_smarty_tpl->tpl_vars['video']->value['descargable'] == 'S') {?>
                    <button id="download" class="mdi mdi-download icon" data-codigo="<?php echo $_smarty_tpl->tpl_vars['video']->value['codigo'];?>
"></button>
                <?php }?>                
            </div>      
        </section>        
    </main>   

    <footer>aaaaaaaaa</footer>
</body>

</html>
<?php }
}

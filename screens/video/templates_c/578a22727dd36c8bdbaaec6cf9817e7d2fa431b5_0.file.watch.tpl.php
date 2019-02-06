<?php
/* Smarty version 3.1.33, created on 2019-02-06 18:14:18
  from 'C:\UwAmp\screens\video\templates\watch.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c5b23fa490338_75539995',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '578a22727dd36c8bdbaaec6cf9817e7d2fa431b5' => 
    array (
      0 => 'C:\\UwAmp\\screens\\video\\templates\\watch.tpl',
      1 => 1549476839,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_5c5b23fa490338_75539995 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="es-ES">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="video, streaming" />
    
    <title>PHPFlix</title>
    
    <link rel="stylesheet" href="./css/style.css" defer/>
    <link rel="stylesheet" href="./css/materialdesignicons.min.css" defer>
    
    <?php echo '<script'; ?>
 src="./js/watch.js" defer><?php echo '</script'; ?>
> 
    <?php echo '<script'; ?>
 src="./js/menu.js" defer><?php echo '</script'; ?>
>   
</head>

<body>    
    <?php $_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

    <main>        
        <div class="videoWrapper">
            <video src="<?php echo $_smarty_tpl->tpl_vars['urlVideo']->value;?>
" class="videoPlayer" poster="./img/<?php echo $_smarty_tpl->tpl_vars['video']->value['cartel'];?>
" type="video/mp4" preload="none" controls="controls" controlsList="nodownload" oncontextmenu="return false;"></video>
        </div>
        
        <section class="description">            
            <img src="./img/<?php echo $_smarty_tpl->tpl_vars['video']->value['cartel'];?>
" alt="Cartel <?php echo $_smarty_tpl->tpl_vars['video']->value['titulo'];?>
">
            <h2><?php echo $_smarty_tpl->tpl_vars['video']->value['titulo'];?>
</h2>
            <p>Categorías: 
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['video']->value['categories'], 'category');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['category']->value) {
?>
                    <em><?php echo $_smarty_tpl->tpl_vars['category']->value;?>
</em>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </p>
            <?php if ($_smarty_tpl->tpl_vars['video']->value['descargable'] == 'S') {?>
                <span id="download" class="mdi mdi-36px mdi-light mdi-download btn" data-codigo="<?php echo $_smarty_tpl->tpl_vars['video']->value['codigo'];?>
">Descargar</span>
            <?php }?>                       
            <p><?php echo $_smarty_tpl->tpl_vars['video']->value['sinopsis'];?>
</p>                  
        </section>        
    </main>   

    <?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
</body>

</html>
<?php }
}

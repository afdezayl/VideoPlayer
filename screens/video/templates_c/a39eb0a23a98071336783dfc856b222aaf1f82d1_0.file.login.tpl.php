<?php
/* Smarty version 3.1.33, created on 2019-02-01 18:36:28
  from 'C:\UwAmp\screens\video\templates\login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c5491ac8ae824_37046635',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a39eb0a23a98071336783dfc856b222aaf1f82d1' => 
    array (
      0 => 'C:\\UwAmp\\screens\\video\\templates\\login.tpl',
      1 => 1549046186,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c5491ac8ae824_37046635 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="es-ES">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="video, streaming" />
    
    <title>Login</title>
    
    <link rel="stylesheet" href="./css/style.css" />
</head>

<body>
    <header>
        <h1>Plataforma streaming</h1>
    </header>

    <main>       
        <form action="#" method="POST" id="form" class="login" autocomplete="off">
            <p class="error"><?php echo $_smarty_tpl->tpl_vars['txt']->value;?>
</p>
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
<?php }
}

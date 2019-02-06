<?php
/* Smarty version 3.1.33, created on 2019-02-06 07:44:18
  from 'C:\UwAmp\screens\video\templates\header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c5a9052a1c1f0_43308853',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fc71e6082a05f432085a4ef15b4feae4f140693a' => 
    array (
      0 => 'C:\\UwAmp\\screens\\video\\templates\\header.tpl',
      1 => 1549439039,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c5a9052a1c1f0_43308853 (Smarty_Internal_Template $_smarty_tpl) {
?><header>
    <h1>
        <a class="mdi mdi-light mdi-video-vintage" href="videos.php">&nbsp;PHPFlix</a>
    </h1>
    
    <i id="btn_menu" class="mdi mdi-36px mdi-light mdi-menu btn"></i>
</header>

<ul id="user_menu" class="hidden">
    <li >
        <a class="mdi mdi-24px mdi-light mdi-account-circle">Nombre</a>
    </li>
    <li>
        <a class="mdi mdi-24px mdi-light mdi-settings-outline">Ajustes</a>
    </li>
    <li>
        <a href="closeSession.php" class="mdi mdi-24px mdi-light mdi-logout" aria-label="logout">Cerrar sesión</a>
    </li>
</ul><?php }
}

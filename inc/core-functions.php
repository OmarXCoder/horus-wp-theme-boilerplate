<?php


function ox_theme_assets_url()
{
    return defined('WP_DEBUG') && WP_DEBUG === true ? OX_THEME_URL . 'src/' : OX_THEME_URL . 'dist/';
}

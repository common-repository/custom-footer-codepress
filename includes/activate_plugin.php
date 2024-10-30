<?php
function codepress_activate_plugin(){

    //Verifica a versao do WP
    if(version_compare(get_bloginfo('version'), '0.1', '<')){
        wp_die(__('Você precisa ter o Wordpress atualizado com no mínimo a versão versão 6.1'));
    }
}
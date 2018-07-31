<?php

    function account_area(){

        ob_start();
        include 'shortcodes/account-area.php';
        $html = ob_get_clean();

        return $html;

    }

    add_shortcode('meridian-account-area' , 'account_area');

    function login_form(){

        ob_start();
        include 'shortcodes/login-form.php';
        $html = ob_get_clean();

        return $html;

    }

    add_shortcode('meridian-login-form' , 'login_form');

?>
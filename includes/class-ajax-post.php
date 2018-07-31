<?php

    function application_form(){

        print_r($_POST);

    }

    add_action('wp_ajax_application_form', 'application_form');
    add_action('wp_ajax_nopriv_application_form', 'application_form');

?>
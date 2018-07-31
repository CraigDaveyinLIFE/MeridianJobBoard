<?php

    function register_meridian_jobs_post_types(){

        register_post_type(
            'meridian_job',
            array(
                'label' => 'Jobs',
                'public' => true,
                'show_in_menu' => false,
                'rewrite' => array(
                    'slug' => 'job'
                ),
                'supports' => array(
                    'title',
                    'thumbnail'
                )
            )
        );

        register_post_type(
            'meridian_apps',
            array(
                'label' => 'Applications',
                'public' => false,
                'show_ui' => true,
                'show_in_menu' => false,
                'supports' => array(
                    'title',
                    'thumbnail'
                )
            )
        );

    }

    add_action('init' , 'register_meridian_jobs_post_types');

?>
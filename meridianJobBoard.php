<?php

    /**
     *
     * Plugin Name: Meridian Job Board
     * Plugin URI: https://www.inlife.co.uk/
     * Version: 1.0
     * Description: This is the official plugin for the Meridian Website job system
     * Author: inLIFE Design LTD
     * Author URI: https://www.inlife.co.uk/
     *
     */

    include plugin_dir_path(__FILE__).'includes/class-custom-actions.php';
    include plugin_dir_path(__FILE__).'includes/class-sub-pages.php';
    include plugin_dir_path(__FILE__).'includes/class-post-types.php';
    include plugin_dir_path(__FILE__).'includes/class-meta-boxes.php';
    include plugin_dir_path(__FILE__).'includes/class-custom-columns.php';
    include plugin_dir_path(__FILE__).'includes/class-save-posts.php';
    include plugin_dir_path(__FILE__).'includes/class-shortcodes.php';

    function add_meridian_job_board_main_page(){

        add_menu_page(
            'Meridian Jobs',
            'Meridian Jobs',
            'manage_options',
            'meridian-jobs',
            'add_meridian_job_board_main_page_html',
            plugin_dir_url(__FILE__).'assets/images/icon.svg',
            5
        );

    }
    function add_meridian_job_board_main_page_html(){}

    add_action('admin_menu' , 'add_meridian_job_board_main_page');

    function add_meridian_job_styles(){
        wp_enqueue_style('Meridian Job Board CSS' , plugin_dir_url(__FILE__).'assets/css/meridian-job.css');
    }

    add_action('admin_enqueue_scripts' , 'add_meridian_job_styles');

    function add_meridian_job_frontend_styles(){
        wp_enqueue_style('Meridian Job Board CSS' , plugin_dir_url(__FILE__).'assets/css/meridian_job_frontend.css');
    }

    add_action('wp_enqueue_scripts' , 'add_meridian_job_frontend_styles');

    add_action('wp_logout','unlog');

    function unlog(){
        wp_redirect( site_url() );
        exit();
    }

    function meridian_custom_template($template) {

        global $post;

        $plugin_file =  plugin_dir_path(__FILE__).'templates/single-meridian_job.php';
        $template_file = get_template_directory().'/meridianJobMaster/single-meridian_job.php';

        if ( $post->post_type == 'meridian_job' ) {
            if(file_exists($template_file)){
                return $template_file;
            }else{
                return $plugin_file;
            }
        }

        return $template;

    }

    add_filter('single_template', 'meridian_custom_template');

?>
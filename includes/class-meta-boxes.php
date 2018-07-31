<?php

    function add_meridian_job_meta_boxes(){

        add_meta_box(
            'meridian_job_details' ,
            'Job Details' ,
            'job_details_html' ,
            'meridian_job' ,
            'normal' ,
            'default'
        );

        add_meta_box(
            'meridian_job_descriptions' ,
            'Job Description' ,
            'meridian_job_descriptions_html' ,
            'meridian_job' ,
            'normal' ,
            'high'
        );

        add_meta_box(
            'meridian_job_small_desc' ,
            'Small Description' ,
            'meridian_job_small_desc_html' ,
            'meridian_job' ,
            'normal' ,
            'default'
        );

        add_meta_box(
            'meridian_job_expiry_date' ,
            'Expiry date' ,
            'meridian_job_expiry_date_html' ,
            'meridian_job' ,
            'side' ,
            'default'
        );

        add_meta_box(
            'meridian_job_featured' ,
            'Featured' ,
            'meridian_job_featured_html' ,
            'meridian_job' ,
            'side' ,
            'default'
        );

        add_meta_box(
            'meridian_job_filled' ,
            'Position Filled' ,
            'meridian_job_filled_html' ,
            'meridian_job' ,
            'side' ,
            'default'
        );

    }

    add_action('add_meta_boxes' , 'add_meridian_job_meta_boxes');

    function job_details_html($post){

        ob_start();
        include 'metabox-templates/metabox-job-details.php';
        $html = ob_get_clean();

        echo $html;

    }

    function meridian_job_small_desc_html($post){
        $content = get_post_meta($post->ID , '_meridian-small-description' , true);
        echo wp_editor($content , '_meridian-small-description' , array("media_buttons" => true));
    }

    function meridian_job_descriptions_html($post){
        $content = get_post_meta($post->ID , '_meridian-description' , true);
        echo wp_editor($content , '_meridian-description' , array("media_buttons" => true));
    }

    function meridian_job_expiry_date_html($post){

        $value = get_post_meta($post->ID , '_meridian-expiry-date' , true);
        echo '<input type="date" class="widefat" name="_meridian-expiry-date" value="'.$value.'">';
    }

    function meridian_job_featured_html($post){
        $value = get_post_meta($post->ID , '_meridian-featured' , true);
        echo '<div style="background: #eaff005e; padding: 10px; margin-bottom: 10px;">Please note that only one job can be featured at any one time.</div>';
        if($value == 'on') {
            echo '<input type="checkbox" name="_meridian-featured" checked>';
        }else{
            echo '<input type="checkbox" name="_meridian-featured">';
        }
    }

    function meridian_job_filled_html($post){
        $value = get_post_meta($post->ID , '_meridian-filled' , true);
        if($value == 'on'){
            echo '<input type="checkbox" name="_meridian-filled" checked>';
        }else{
            echo '<input type="checkbox" name="_meridian-filled">';
        }
    }

    function add_meridian_app_meta_boxes(){

        add_meta_box(
            'meridian_app_details' ,
            'Application Details' ,
            'meridian_app_details_html' ,
            'meridian_apps' ,
            'normal' ,
            'default'
        );

    }

    add_action('add_meta_boxes' , 'add_meridian_app_meta_boxes');

    function meridian_app_details_html($post){

        ob_start();
        include 'metabox-templates/metabox-application-details.php';
        $html = ob_get_clean();

        echo $html;

    }

?>
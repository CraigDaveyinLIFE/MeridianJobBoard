<?php

    /**
 * Created by PhpStorm.
 * User: craig
 * Date: 27/07/2018
 * Time: 18:51
 */

    function my_edit_meridian_job_columns($columns){
        $columns = array(
            'cb' => '<input type="checkbox">',
            'title' => 'Job Title',
            'location' => 'Location',
            'filled' => 'Position Filled',
            'exp_date' => 'Expiry Date',
            'featured' => 'Featured',
            'date' => 'Date'
        );
        return $columns;
    }

    function my_manage_meridian_job_columns($column , $post_id){

        switch ($column){
            case 'location':
                echo get_post_meta($post_id , '_meridian-job-location' , true);
                break;
            case 'filled':
                if(get_post_meta($post_id , '_meridian-filled' , true) == 'on'){
                    echo '&#10004;';
                }else{
                    echo '&#10008;';
                }
                break;
            case 'exp_date':
                echo get_post_meta($post_id , '_meridian-expiry-date' , true);
                break;
            case 'featured':
                if(get_post_meta($post_id , '_meridian-featured' , true) == 'on'){
                    echo '&#10004;';
                }else{
                    echo '&#10008;';
                }
                break;
        }

    }

    add_filter( 'manage_edit-meridian_job_columns', 'my_edit_meridian_job_columns' ) ;
    add_action( 'manage_meridian_job_posts_custom_column', 'my_manage_meridian_job_columns', 10, 2 );

?>
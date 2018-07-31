<?php

    if(isset($_POST['application_form'])){

        $_SESSION['errors'] = '';

        $name = $_POST['_meridian_application_name'];
        $email = $_POST['_meridian_application_email'];
        $phone = $_POST['_meridian_application_phone'];
        $cover_letter = $_POST['_meridian_application_cover_letter'];

        if(isset($name) && $name == ''){ $_SESSION['errors'] .= '<li>The name field is required</li>'; }
        if(isset($email) && $email == ''){ $_SESSION['errors'] .= '<li>The email field is required</li>'; }
        if(isset($phone) && $phone == ''){ $_SESSION['errors'] .= '<li>The phone field is required</li>'; }

        $allowed_types = array(
            'application/pdf',
            'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
            'application/msword'
        );

        if(isset($_FILES['_meridian_application_cv']) && $_FILES['_meridian_application_cv']['name'] == ''){
            $_SESSION['errors'] .= '<li>A CV is required please select a document</li>';
        }else{

            if(!in_array($_FILES['_meridian_application_cv']['type'] , $allowed_types)){
                $_SESSION['errors'] .= '<li>The file you have chosen isnt one of the following types (pdf,doc,docx)</li>';
            }

        }

        if($_SESSION['errors'] == ''){

            $post_id = wp_insert_post(array(
                'post_type' => 'post',
                'post_title' => wp_strip_all_tags('Application: '.$name),
                'post_content' => $cover_letter,
                'post_status'  => 'publish',
                'comment-status' => 'closed',
                'ping-status' => 'closed',
                'post_author' => 1
            ));

            if($post_id){

                $user = wp_get_current_user();

                add_post_meta($post_id , '_meridian_application_name' , $name);
                add_post_meta($post_id , '_meridian_application_email' , $email);
                add_post_meta($post_id , '_meridian_application_phone' , $phone);
                add_post_meta($post_id , '_meridian_application_user' , $user->ID);

            }

        }

        $location = $_SERVER['HTTP_REFERER'];
        wp_safe_redirect($location);
        exit();

    }

?>
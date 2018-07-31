<?php

    function save_meridian_job(){

        global $post;

        if($post->post_type == 'meridian_job'){

            $array['_meridian-job-location'] = $_POST['_meridian-job-location'];
            $array['_meridian-application-email'] = $_POST['_meridian-application-email'];
            $array['_meridian-company-tagline'] = $_POST['_meridian-company-tagline'];
            $array['_meridian-company-name'] = $_POST['_meridian-company-name'];
            $array['_meridian-company-twitter'] = $_POST['_meridian-company-twitter'];
            $array['_meridian-company-facebook'] = $_POST['_meridian-company-facebook'];
            $array['_meridian-company-linkedin'] = $_POST['_meridian-company-linkedin'];

            $array['_meridian-small-description'] = $_POST['_meridian-small-description'];
            $array['_meridian-description'] = $_POST['_meridian-description'];

            $array['_meridian-expiry-date'] = $_POST['_meridian-expiry-date'];

            if($_POST['_meridian-featured']){
                $array['_meridian-featured'] = 'on';
            }else{
                $array['_meridian-featured'] = 'off';
            }

            if($_POST['_meridian-filled']){
                $array['_meridian-filled'] = 'on';
            }else{
                $array['_meridian-filled'] = 'off';
            }

            foreach($array as $key => $value){
                update_post_meta($post->ID , $key , $value);
            }

        }

    }

    add_action('save_post' , 'save_meridian_job');

?>
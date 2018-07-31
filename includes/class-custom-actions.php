<?php

function meridian_job_listing_before()
{

    global $post;

    ?>

    <div class="meridian_job_details">
        <i class="fa fa-map-marker"
           aria-hidden="true"></i> <?php echo get_post_meta($post->ID, '_meridian-job-location', true) ?>
        <span>|</span>
        <i class="fa fa-calendar-o"
           aria-hidden="true"></i> <?php echo date('dS F Y', strtotime(get_post_meta($post->ID, '_meridian-expiry-date', true))) ?>
        <span>|</span>
        <i class="fa fa-briefcase"
           aria-hidden="true"></i> <?php echo get_post_meta($post->ID, '_meridian-company-name', true) ?>
        <div class="social">
            <?php if (get_post_meta($post->ID, '_meridian-company-facebook', true) != '') { ?> <a href=""><i
                        class="fa fa-facebook-square" aria-hidden="true"></i></a> <?php } ?>
            <?php if (get_post_meta($post->ID, '_meridian-company-linkedin', true) != '') { ?> <a href=""><i
                        class="fa fa-linkedin-square" aria-hidden="true"></i></a> <?php } ?>
            <?php if (get_post_meta($post->ID, '_meridian-company-twitter', true) != '') { ?> <a href=""><i
                        class="fa fa-twitter-square" aria-hidden="true"></i></a> <?php } ?>
        </div>
    </div>

    <?php

}

add_action('meridian-job-page-before', 'meridian_job_listing_before');

function meridian_job_listing_title()
{

    global $post;

    ?>

    <div class="meridian_job_title">
        <h2><?php echo get_the_title($post->ID) ?></h2>
    </div>

    <?php

}

add_action('meridian-job-page-title', 'meridian_job_listing_title');

function meridian_job_page_content()
{

    ?>

    <div class="row">
        <div class="col-md-7">

            <?php do_action('meridian-job-page-description') ?>

        </div>
        <div class="col-md-5">
            <?php do_action('meridian-job-page-image') ?>
            <?php do_action('meridian-job-page-application-form') ?>
        </div>
    </div>

    <?php

}

add_action('meridian-job-page-content', 'meridian_job_page_content');

function meridian_job_page_description()
{

    global $post;

    ?>

    <p><?php echo get_post_meta($post->ID, '_meridian-description', true) ?></p>

    <?php

}

add_action('meridian-job-page-description', 'meridian_job_page_description');

function meridian_job_page_image()
{

    global $post;

    ?>

    <img src="<?php echo get_the_post_thumbnail_url($post->ID) ?>" alt="">

    <?php

}

add_action('meridian-job-page-image', 'meridian_job_page_image');


function meridian_job_page_application_form(){

    remove_all_actions('save_post');

    global $post;

    if(isset($_POST['application_form'])){

        $errors = '';

        $name = $_POST['_meridian_application_name'];
        $email = $_POST['_meridian_application_email'];
        $phone = $_POST['_meridian_application_phone'];
        $cover_letter = $_POST['_meridian_application_cover_letter'];

        if(isset($name) && $name == ''){ $errors .= '<li>The name field is required</li>'; }
        if(isset($email) && $email == ''){ $errors .= '<li>The email field is required</li>'; }
        if(isset($phone) && $phone == ''){ $errors .= '<li>The phone field is required</li>'; }

        $allowed_types = array(
            'application/pdf',
            'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
            'application/msword'
        );

        if(isset($_FILES['_meridian_application_cv']) && $_FILES['_meridian_application_cv']['name'] == ''){
            $errors .= '<li>A CV is required please select a document</li>';
        }else{

            if(!in_array($_FILES['_meridian_application_cv']['type'] , $allowed_types)){
                $errors .= '<li>The file you have chosen isnt one of the following types (pdf,doc,docx)</li>';
            }

        }

        if($errors == ''){

            $post_id = wp_insert_post(array(
                'post_type' => 'meridian_apps',
                'post_title' => wp_strip_all_tags('Application: '.$name),
                'post_status'  => 'publish',
                'filter' => true
            ));

            if($post_id){

                $extension = pathinfo($_FILES['_meridian_application_cv']['name'], PATHINFO_EXTENSION);
                $filename = sanitize_title($name).'_'.time().''.$post->ID.'_'.rand(0,10000).'.'.$extension;
                $destination = plugin_dir_path(__FILE__).'../uploads/cvs/'.$filename;

                move_uploaded_file($_FILES['_meridian_application_cv']['tmp_name'] , $destination);

                $user = wp_get_current_user();

                add_post_meta($post_id , '_meridian_application_name' , $name);
                add_post_meta($post_id , '_meridian_application_email' , $email);
                add_post_meta($post_id , '_meridian_application_phone' , $phone);
                add_post_meta($post_id , '_meridian_application_cover_letter' , $cover_letter);
                add_post_meta($post_id , '_meridian_application_file_url' , plugin_dir_url(__FILE__).'../uploads/cvs/'.$filename);
                add_post_meta($post_id , '_meridian_application_job_id' , $post->ID);
                add_post_meta($post_id , '_meridian_application_user_id' , $user->ID);

            }

        }

    }

    ?>

    <?php if($errors != ''){ ?>
        <ul class="form-errors" style="background: rgba(255,0,0,0.6); padding: 10px 10px 20px; margin: 10px 0 -10px; list-style-position: inside; color: #FFF;">
            <?php echo $errors ?>
        </ul>
    <?php } ?>

    <form action="" method="post" class="application-form" enctype="multipart/form-data">
        <?php wp_nonce_field( 'post_nonce', 'post_nonce_field' ); ?>
        <label for="">Name*</label>
        <input type="text" name="_meridian_application_name" value="<?=($errors != '' && isset($_POST['_meridian_application_name'])) ? $_POST['_meridian_application_name'] : ''?>">
        <label for="">Email*</label>
        <input type="email" name="_meridian_application_email" value="<?=($errors != '' && isset($_POST['_meridian_application_email'])) ? $_POST['_meridian_application_email'] : ''?>">
        <label for="">Contact Number*</label>
        <input type="tel" name="_meridian_application_phone" value="<?=($errors != '' && isset($_POST['_meridian_application_phone'])) ? $_POST['_meridian_application_phone'] : ''?>">
        <label for="">Cover Letter</label>
        <textarea id="" name="_meridian_application_cover_letter"><?=($errors != '' && isset($_POST['_meridian_application_cover_letter'])) ? $_POST['_meridian_application_cover_letter'] : ''?></textarea>
        <label for="">Upload CV* (pdf,doc,docx)</label>
        <input type="file" name="_meridian_application_cv"><br/><br/>
        <button type="submit" class="meridian-btn green" name="application_form">Submit</button>
    </form>

    <?php

}

add_action('meridian-job-page-application-form', 'meridian_job_page_application_form');

?>
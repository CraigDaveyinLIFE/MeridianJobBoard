<div class="meridian-job-meta-box">

    <p class="form-field">
        <label for="">Name</label>
        <input type="text" class="widefat" name="_meridian_application_name" value="<?php echo get_post_meta($post->ID , '_meridian_application_name' , true) ?>">
    </p>

    <p class="form-field">
        <label for="">Email</label>
        <input type="text" class="widefat" name="_meridian_application_email" value="<?php echo get_post_meta($post->ID , '_meridian_application_email' , true) ?>">
    </p>

    <p class="form-field">
        <label for="">Phone Number</label>
        <input type="text" class="widefat" name="_meridian_application_phone" value="<?php echo get_post_meta($post->ID , '_meridian_application_phone' , true) ?>">
    </p>

    <p class="form-field">
        <label for="">Job</label>
        <a href="<?php echo get_the_permalink(get_post_meta($post->ID , '_meridian_application_job_id' , true)) ?>"><?php echo get_the_title(get_post_meta($post->ID , '_meridian_application_job_id' , true)) ?></a>
    </p>

    <br clear="all">

</div>
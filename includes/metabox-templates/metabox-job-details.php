<div class="meridian-job-meta-box">

    <p class="form-field">
        <label for="">Location</label>
        <input type="text" class="widefat" name="_meridian-job-location" value="<?php echo get_post_meta($post->ID , '_meridian-job-location' , true) ?>">
    </p>

    <p class="form-field">
        <label for="">Application Email</label>
        <input type="email" class="widefat" name="_meridian-application-email" value="<?=(get_post_meta($post->ID , '_meridian-application-email' , true)) ? get_post_meta($post->ID , '_meridian-application-email' , true) : get_option('admin_email')?>">
    </p>

    <p class="form-field">
        <label for="">Company Name</label>
        <input type="text" class="widefat" name="_meridian-company-name" value="<?php echo get_post_meta($post->ID , '_meridian-company-name' , true) ?>">
    </p>

    <p class="form-field">
        <label for="">Company Tagline</label>
        <input type="text" class="widefat" name="_meridian-company-tagline" value="<?php echo get_post_meta($post->ID , '_meridian-company-tagline' , true) ?>">
    </p>

    <p class="form-field">
        <label for="">Company Website</label>
        <input type="text" class="widefat" name="_meridian-company-website" value="<?php echo get_post_meta($post->ID , '_meridian-company-website' , true) ?>">
    </p>

    <p class="form-field">
        <label for="">Company Twitter</label>
        <input type="text" class="widefat" name="_meridian-company-twitter" value="<?php echo get_post_meta($post->ID , '_meridian-company-twitter' , true) ?>">
    </p>

    <p class="form-field">
        <label for="">Company Facebook</label>
        <input type="text" class="widefat" name="_meridian-company-facebook" value="<?php echo get_post_meta($post->ID , '_meridian-company-facebook' , true) ?>">
    </p>

    <p class="form-field">
        <label for="">Company Linkedin</label>
        <input type="text" class="widefat" name="_meridian-company-linkedin" value="<?php echo get_post_meta($post->ID , '_meridian-company-linkedin' , true) ?>">
    </p>

    <br clear="all">

</div>
<?php get_header() ?>
<?php
if(have_posts()){
    while(have_posts()){ the_post();

        ?>

        <div class="meridian_job">
            <div class="col-12">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">

                        <?php do_action('meridian-job-page-before') ?>
                        <?php do_action('meridian-job-page-title') ?>
                        <?php do_action('meridian-job-page-content') ?>

                    </div>
                    <div class="col-md-2"></div>
                </div>
            </div>
        </div>

        <?php

    }
}
?>
<?php get_footer() ?>
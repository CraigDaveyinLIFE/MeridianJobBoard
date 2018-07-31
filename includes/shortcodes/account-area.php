<?php

    if(!is_user_logged_in()){
        wp_redirect(get_site_url().'/login');
    }

?>

<div class="meridian_account_area">
    <div class="meridian_account_area_header">
        <a href="">Logout</a>
        <a href="">My Applications</a>
    </div>
</div>

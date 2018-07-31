<div class="meridian-login-form">
    <?php
        wp_login_form(
            array(
                'label_username' => 'Email',
                'label_password' => 'Password',
                'redirect' => get_site_url().'/account-area'
            )
        )
    ?>
</div>
<?php
// Help Menu //
function scurf_add_help() {
    add_submenu_page(
        'user-referral-free-settings',
        'Support Center',
        'Help',
        'manage_options',
        'user-referral-free-help',
        'scurf_render_help'
    );
}
add_action('admin_menu', 'scurf_add_help');

// Referral Help //
function scurf_render_help() { ?>
    <div class="section-divider">
        <?php require_once plugin_dir_path(__FILE__)."../core/referral-premium.php"; ?>

        <div class="referral-system">
            <h2><?php _e('Support Center', 'user-referral-free'); ?></h2>

            <p>If you need any help or support with the referral system, please email us at <a href="mailto:plugins@softclever.com">plugins@softclever.com</a></p>

            <p>If you require urgent assistance, please call us at <a href="tel:+8801710-900622">+8801710-900622</a> (WhatsApp)</p>
        </div>
    </div>
<?php } ?>

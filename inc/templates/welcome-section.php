<?php 

$current_user = wp_get_current_user();
$username = $current_user->display_name;

echo '<div class="welcome-section wp-block-columns is-layout-flex wp-container-core-columns-layout-1 wp-block-columns-is-layout-flex">';

echo '<div class="wp-block-column is-layout-flow wp-block-column-is-layout-flow" style="flex-basis:50%">';
echo '<h2 class="wp-block-heading card-title">Welcome ' . ucfirst($username) . '</h2>';
echo '<div class="card">';
echo '<figure class="wp-block-image size-large"><img decoding="async" width="46" height="47" src="' . get_home_url() . '/wp-content/themes/workshoppro-childtheme/assets/images/heart-icon.svg" alt="" class="wp-image-60"></figure>';
echo '<p class="text-small">Welcome to the Workshop Manager MVP! While we are new to the market, we want to offer the most user-friendly workshop management solution. We still have a lot to learn and would appreciate any ideas you can provide us to increase our efficiency. <a href="https://workshopmanager.africa/feedback/" target="_blank" > Click here </a> to provide feedback and help define the future of Workshop Manager.</p>';
echo '</div>';
echo '</div>';

echo '<div class="wp-block-column is-layout-flow wp-block-column-is-layout-flow" style="flex-basis:50%">';
echo '<h2 class="wp-block-heading card-title">Need help getting started?</h2>';
echo '<div class="card">';
echo '<figure class="wp-block-image size-large"><img decoding="async" width="46" height="47" src="' . get_home_url() . '/wp-content/themes/workshoppro-childtheme/assets/images/question-icon.svg" alt="" class="wp-image-61"></figure>';
echo '<p class="text-small">We understand that learning new things can be difficult and frustrating. Relax, we are here for you! <a href="https://www.youtube.com/@WorkshopManager.Africa" target="_blank" > Click here </a> to visit our training channel, or contact us at <a href="mailto:support@workshopmanager.africa">support@workshopmanager.africa</a>. We look forward to hearing from you! </p>';
echo '</div>';
echo '</div>';

echo '</div>'; 

?>
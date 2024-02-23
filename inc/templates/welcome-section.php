<?php 

$current_user = wp_get_current_user();
$username = $current_user->user_nicename;
// echo '<pre>'.print_r($current_user, true).'</pre>';

echo '<div class="welcome-section wp-block-columns is-layout-flex wp-container-core-columns-layout-1 wp-block-columns-is-layout-flex">';

echo '<div class="wp-block-column is-layout-flow wp-block-column-is-layout-flow" style="flex-basis:50%">';
echo '<h2 class="wp-block-heading card-title">Welcome ' . ucfirst($username) . '</h2>';
echo '<div class="card">';
echo '<figure class="wp-block-image size-large"><img decoding="async" width="46" height="47" src="' . get_home_url() . '/wp-content/themes/workshoppro-childtheme/assets/images/heart-icon.svg" alt="" class="wp-image-60"></figure>';
echo '<p class="text-small">Lorem ipsum dolor sit amet consectetur. Dictum leo laoreet pulvinar tristique sagittis.</p>';
echo '</div>';
echo '</div>';

echo '<div class="wp-block-column is-layout-flow wp-block-column-is-layout-flow" style="flex-basis:50%">';
echo '<h2 class="wp-block-heading card-title">Need help getting started?</h2>';
echo '<div class="card">';
echo '<figure class="wp-block-image size-large"><img decoding="async" width="46" height="47" src="' . get_home_url() . '/wp-content/themes/workshoppro-childtheme/assets/images/question-icon.svg" alt="" class="wp-image-61"></figure>';
echo '<p class="text-small">Lorem ipsum dolor sit amet consectetur. Dictum leo laoreet pulvinar tristique sagittis <a href="mailto:support@workshoppro.co.za">support@workshoppro.co.za</a></p>';
echo '</div>';
echo '</div>';

echo '</div>'; 

?>
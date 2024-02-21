<?php 

$current_user = wp_get_current_user();

echo '<div class="wp-block-columns is-layout-flex wp-container-core-columns-layout-1 wp-block-columns-is-layout-flex">';

echo '<div class="wp-block-column is-layout-flow wp-block-column-is-layout-flow" style="flex-basis:50%">';
echo '<h2 class="wp-block-heading card-title">Welcome ' . $current_user . '</h2>';
echo '<div class="wp-block-group card is-nowrap is-layout-flex wp-container-core-group-layout-3 wp-block-group-is-layout-flex">';
echo '<figure class="wp-block-image size-large"><img decoding="async" width="46" height="47" src="http://workshoppro.local/wp-content/uploads/2024/02/heart-icon.svg" alt="" class="wp-image-60"></figure>';
echo '<p>Lorem ipsum dolor sit amet consectetur. Dictum leo laoreet pulvinar tristique sagittis.</p>';
echo '</div>';
echo '</div>';

echo '<div class="wp-block-column is-layout-flow wp-block-column-is-layout-flow" style="flex-basis:50%">';
echo '<h2 class="wp-block-heading card-title">Need help getting started?</h2>';
echo '<div class="wp-block-group card is-nowrap is-layout-flex wp-container-core-group-layout-4 wp-block-group-is-layout-flex">';
echo '<figure class="wp-block-image size-large"><img decoding="async" width="46" height="47" src="http://workshoppro.local/wp-content/uploads/2024/02/question-icon.svg" alt="" class="wp-image-61"></figure>';
echo '<p>Lorem ipsum dolor sit amet consectetur. Dictum leo laoreet pulvinar tristique sagittis <a href="mailto:support@workshoppro.co.za">support@workshoppro.co.za</a></p>';
echo '</div>';
echo '</div>';

echo '</div>'; 
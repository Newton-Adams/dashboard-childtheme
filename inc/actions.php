<?php 

// 
add_filter('wp_nav_menu_items', 'do_shortcode');

// Add burger menu 
add_action('generate_before_header_content', 'burger_menu');  
function burger_menu() {
    echo '<div id="burger-menu">';
	echo '<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M0.600098 3.49961C0.600098 3.14062 0.891113 2.84961 1.2501 2.84961H15.0001C15.3591 2.84961 15.6501 3.14062 15.6501 3.49961C15.6501 3.85859 15.3591 4.14961 15.0001 4.14961H1.2501C0.891113 4.14961 0.600098 3.85859 0.600098 3.49961ZM0.600098 8.24961C0.600098 7.89062 0.891113 7.59961 1.2501 7.59961H15.0001C15.3591 7.59961 15.6501 7.89062 15.6501 8.24961C15.6501 8.60859 15.3591 8.89961 15.0001 8.89961H1.2501C0.891113 8.89961 0.600098 8.60859 0.600098 8.24961ZM1.2501 12.3496C0.891113 12.3496 0.600098 12.6406 0.600098 12.9996C0.600098 13.3586 0.891113 13.6496 1.2501 13.6496H15.0001C15.3591 13.6496 15.6501 13.3586 15.6501 12.9996C15.6501 12.6406 15.3591 12.3496 15.0001 12.3496H1.2501Z" fill="#7A7A9D"/></svg>';
	echo '</div>';
}

// 
add_action('generate_after_header_content', 'main_menu'); 
function main_menu() {
    echo '<div class="header-scroll-content-outer">';
    echo '<div class="header-scroll-content">';
    echo '<span class="mobile-close">';
	echo '<svg width="14" height="15" viewBox="0 0 14 15" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M0.292893 0.630784C0.683417 0.24026 1.31658 0.24026 1.70711 0.630784L7 5.92368L12.2929 0.630784C12.6834 0.24026 13.3166 0.24026 13.7071 0.630784C14.0976 1.02131 14.0976 1.65447 13.7071 2.045L8.41421 7.33789L13.7071 12.6308C14.0976 13.0213 14.0976 13.6545 13.7071 14.045C13.3166 14.4355 12.6834 14.4355 12.2929 14.045L7 8.7521L1.70711 14.045C1.31658 14.4355 0.683417 14.4355 0.292893 14.045C-0.0976311 13.6545 -0.0976311 13.0213 0.292893 12.6308L5.58579 7.33789L0.292893 2.045C-0.0976311 1.65447 -0.0976311 1.02131 0.292893 0.630784Z" fill="#7A7A9D"/></svg>';
	echo '</span>';
    echo wp_nav_menu( array( 'menu' => 'Main Menu' ) );
	echo '</div>';
	echo '<span class="mobile-overlay"></span>';
    echo '</div>';
	echo '<a class="log-out-link" href="'.get_home_url().'/logout/">';
	echo '<svg width="16" height="21" viewBox="0 0 16 21" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M14 7H13V5C13 2.24 10.76 0 8 0C5.24 0 3 2.24 3 5V7H2C0.9 7 0 7.9 0 9V19C0 20.1 0.9 21 2 21H14C15.1 21 16 20.1 16 19V9C16 7.9 15.1 7 14 7ZM8 16C6.9 16 6 15.1 6 14C6 12.9 6.9 12 8 12C9.1 12 10 12.9 10 14C10 15.1 9.1 16 8 16ZM5 7V5C5 3.34 6.34 2 8 2C9.66 2 11 3.34 11 5V7H5Z" fill="#A3D0B0"/></svg>';
	echo '<p>Log out</p>';
	echo '</a>';
    echo '</div>';
}
<?php
//Save form shortcode
add_shortcode('post_form','save_form_callback');
function save_form_callback() {
    ob_start();
    echo '<form name="job-fields" >
            <input type="text" name="Title" placeholder="Give Title" >
            <input type="text" name="Customer" placeholder="Give Customer" >
         </form>
         
         <button id="save-button" >Save</button>
         <br>
         <select id="select-customer" >
            <option class="default" >Select Customer</option>
         </select>';
    return ob_get_clean();
}

//Top Page Title
add_shortcode('page_title','page_title_callback');
function page_title_callback() {
   return '<h1>'.get_the_title().'</h1>';
}

//Menu Icons
add_shortcode('menu_icons','menu_icons_callback');
function menu_icons_callback($atts) {
   $atts = shortcode_atts(
		array(
			'icon' => 'blank',
		), $atts, 'menu_icons' );
   ob_start();
   
      switch ($atts['icon']) {
         case 'dashboard':
            echo '<svg width="14" height="15" viewBox="0 0 14 15" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M0 1.66211C0 0.833682 0.671573 0.162109 1.5 0.162109L4.5 0.162109C5.32843 0.162109 6 0.833682 6 1.66211V4.66211C6 5.49054 5.32843 6.16211 4.5 6.16211H1.5C0.671573 6.16211 0 5.49054 0 4.66211L0 1.66211ZM1.5 1.16211C1.22386 1.16211 1 1.38597 1 1.66211V4.66211C1 4.93825 1.22386 5.16211 1.5 5.16211H4.5C4.77614 5.16211 5 4.93825 5 4.66211V1.66211C5 1.38597 4.77614 1.16211 4.5 1.16211H1.5ZM8 1.66211C8 0.833682 8.67157 0.162109 9.5 0.162109L12.5 0.162109C13.3284 0.162109 14 0.833682 14 1.66211V4.66211C14 5.49054 13.3284 6.16211 12.5 6.16211H9.5C8.67157 6.16211 8 5.49054 8 4.66211V1.66211ZM9.5 1.16211C9.22386 1.16211 9 1.38597 9 1.66211V4.66211C9 4.93825 9.22386 5.16211 9.5 5.16211H12.5C12.7761 5.16211 13 4.93825 13 4.66211V1.66211C13 1.38597 12.7761 1.16211 12.5 1.16211H9.5ZM0 9.66211C0 8.83368 0.671573 8.16211 1.5 8.16211H4.5C5.32843 8.16211 6 8.83368 6 9.66211V12.6621C6 13.4905 5.32843 14.1621 4.5 14.1621H1.5C0.671573 14.1621 0 13.4905 0 12.6621L0 9.66211ZM1.5 9.16211C1.22386 9.16211 1 9.38597 1 9.66211V12.6621C1 12.9383 1.22386 13.1621 1.5 13.1621H4.5C4.77614 13.1621 5 12.9383 5 12.6621V9.66211C5 9.38597 4.77614 9.16211 4.5 9.16211H1.5ZM8 9.66211C8 8.83368 8.67157 8.16211 9.5 8.16211H12.5C13.3284 8.16211 14 8.83368 14 9.66211V12.6621C14 13.4905 13.3284 14.1621 12.5 14.1621H9.5C8.67157 14.1621 8 13.4905 8 12.6621V9.66211ZM9.5 9.16211C9.22386 9.16211 9 9.38597 9 9.66211V12.6621C9 12.9383 9.22386 13.1621 9.5 13.1621H12.5C12.7761 13.1621 13 12.9383 13 12.6621V9.66211C13 9.38597 12.7761 9.16211 12.5 9.16211H9.5Z" fill="#A0AEC0"/>
            </svg>';
            break;
         case 'jobs':
            echo '<svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M5 11.6621C5 11.386 5.22386 11.1621 5.5 11.1621H14.5C14.7761 11.1621 15 11.386 15 11.6621C15 11.9383 14.7761 12.1621 14.5 12.1621H5.5C5.22386 12.1621 5 11.9383 5 11.6621Z" fill="black"/>
            <path fill-rule="evenodd" clip-rule="evenodd" d="M5 7.66211C5 7.38597 5.22386 7.16211 5.5 7.16211H14.5C14.7761 7.16211 15 7.38597 15 7.66211C15 7.93825 14.7761 8.16211 14.5 8.16211H5.5C5.22386 8.16211 5 7.93825 5 7.66211Z" fill="black"/>
            <path fill-rule="evenodd" clip-rule="evenodd" d="M5 3.66211C5 3.38597 5.22386 3.16211 5.5 3.16211H14.5C14.7761 3.16211 15 3.38597 15 3.66211C15 3.93825 14.7761 4.16211 14.5 4.16211H5.5C5.22386 4.16211 5 3.93825 5 3.66211Z" fill="black"/>
            <path d="M2.24158 2.35566C2.32012 2.09759 2.67988 2.09759 2.75842 2.35566L2.91999 2.88651C2.95501 3.00158 3.05979 3.08006 3.17841 3.08006H3.72899C3.98772 3.08006 4.09879 3.41346 3.89319 3.57294L3.42479 3.93626C3.33471 4.00613 3.2971 4.12562 3.33057 4.23558L3.50391 4.80514C3.58166 5.06061 3.29055 5.26679 3.08128 5.10446L2.6642 4.78095C2.56726 4.70575 2.43274 4.70575 2.3358 4.78095L1.91872 5.10446C1.70945 5.26679 1.41834 5.06061 1.49609 4.80514L1.66943 4.23558C1.7029 4.12562 1.66529 4.00613 1.57521 3.93626L1.10681 3.57294C0.901213 3.41346 1.01228 3.08006 1.27101 3.08006H1.82159C1.94021 3.08006 2.04499 3.00158 2.08002 2.88651L2.24158 2.35566Z" fill="black"/>
            <path d="M2.24158 6.35566C2.32012 6.09759 2.67988 6.09759 2.75842 6.35566L2.91999 6.88651C2.95501 7.00158 3.05979 7.08006 3.17841 7.08006H3.72899C3.98772 7.08006 4.09879 7.41346 3.89319 7.57294L3.42479 7.93626C3.33471 8.00613 3.2971 8.12562 3.33057 8.23558L3.50391 8.80514C3.58166 9.06061 3.29055 9.26679 3.08128 9.10446L2.6642 8.78095C2.56726 8.70575 2.43274 8.70575 2.3358 8.78095L1.91872 9.10446C1.70945 9.26679 1.41834 9.06061 1.49609 8.80514L1.66943 8.23558C1.7029 8.12562 1.66529 8.00613 1.57521 7.93626L1.10681 7.57294C0.901213 7.41346 1.01228 7.08006 1.27101 7.08006H1.82159C1.94021 7.08006 2.04499 7.00158 2.08002 6.88651L2.24158 6.35566Z" fill="black"/>
            <path d="M2.24158 10.3557C2.32012 10.0976 2.67988 10.0976 2.75842 10.3557L2.91999 10.8865C2.95501 11.0016 3.05979 11.0801 3.17841 11.0801H3.72899C3.98772 11.0801 4.09879 11.4135 3.89319 11.5729L3.42479 11.9363C3.33471 12.0061 3.2971 12.1256 3.33057 12.2356L3.50391 12.8051C3.58166 13.0606 3.29055 13.2668 3.08128 13.1045L2.6642 12.7809C2.56726 12.7058 2.43274 12.7058 2.3358 12.7809L1.91872 13.1045C1.70945 13.2668 1.41834 13.0606 1.49609 12.8051L1.66943 12.2356C1.7029 12.1256 1.66529 12.0061 1.57521 11.9363L1.10681 11.5729C0.901213 11.4135 1.01228 11.0801 1.27101 11.0801H1.82159C1.94021 11.0801 2.04499 11.0016 2.08002 10.8865L2.24158 10.3557Z" fill="black"/>
            </svg>';
            break;
         case 'customers':
            echo '<svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M8 5.16211C8 6.26668 7.10457 7.16211 6 7.16211C4.89543 7.16211 4 6.26668 4 5.16211C4 4.05754 4.89543 3.16211 6 3.16211C7.10457 3.16211 8 4.05754 8 5.16211ZM6 8.16211C7.65685 8.16211 9 6.81896 9 5.16211C9 3.50526 7.65685 2.16211 6 2.16211C4.34315 2.16211 3 3.50526 3 5.16211C3 6.81896 4.34315 8.16211 6 8.16211ZM12 13.1621C12 14.1621 11 14.1621 11 14.1621H1C1 14.1621 0 14.1621 0 13.1621C0 12.1621 1 9.16211 6 9.16211C11 9.16211 12 12.1621 12 13.1621ZM11 13.1586C10.9986 12.9118 10.8462 12.1726 10.1679 11.4942C9.51563 10.842 8.2891 10.1621 5.99999 10.1621C3.71088 10.1621 2.48435 10.842 1.8321 11.4942C1.15375 12.1726 1.00142 12.9118 1 13.1586H11Z" fill="#A0AEC0"/>
            <path fill-rule="evenodd" clip-rule="evenodd" d="M13.5 5.16211C13.7761 5.16211 14 5.38597 14 5.66211V7.16211H15.5C15.7761 7.16211 16 7.38597 16 7.66211C16 7.93825 15.7761 8.16211 15.5 8.16211H14V9.66211C14 9.93825 13.7761 10.1621 13.5 10.1621C13.2239 10.1621 13 9.93825 13 9.66211V8.16211H11.5C11.2239 8.16211 11 7.93825 11 7.66211C11 7.38597 11.2239 7.16211 11.5 7.16211H13V5.66211C13 5.38597 13.2239 5.16211 13.5 5.16211Z" fill="#A0AEC0"/>
            </svg>';
            break;
         case 'vehicles':
            echo '<svg width="18" height="17" viewBox="0 0 18 17" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M3.30639 5.06271C3.83671 4.23729 4.7396 3.74414 5.72048 3.74414H9.74011C10.7088 3.74414 11.3506 4.16486 11.8964 4.71956C12.1365 4.9635 12.3616 5.23712 12.5865 5.51052L12.5866 5.51053L12.668 5.60941C12.9063 5.89825 13.149 6.18626 13.4229 6.45484H15.3319C16.362 6.45484 17.1998 7.29267 17.1998 8.32276V10.1233C17.1998 10.5947 16.8167 10.9777 16.3453 10.9777H14.715C14.4775 11.8977 13.6426 12.5802 12.6482 12.5802C11.6541 12.5802 10.8193 11.8977 10.5817 10.9777H7.13054C6.89299 11.8977 6.0582 12.5802 5.06406 12.5802C4.06972 12.5802 3.23482 11.8977 2.99726 10.9777H2.66773C1.63763 10.9777 0.799805 10.1399 0.799805 9.10982V6.98843C0.799805 6.69381 1.03849 6.45484 1.33339 6.45484H2.41283L3.30639 5.06271ZM4.20454 5.63953L3.68086 6.45484H7.34119V4.81131H5.72048C5.10385 4.81131 4.53785 5.12065 4.20454 5.63953ZM8.40835 4.81131V6.45484H11.9821C11.8736 6.33279 11.7714 6.21016 11.673 6.09088L11.6123 6.01715L11.6123 6.01714C11.441 5.809 11.2813 5.61506 11.1119 5.4427C10.7408 5.06532 10.342 4.81131 9.74011 4.81131H8.40835ZM15.3319 7.52201H1.86697V9.10982C1.86697 9.55121 2.22634 9.91057 2.66773 9.91057H2.99725C3.23479 8.99048 4.06962 8.30796 5.06406 8.30796C6.05822 8.30796 6.89301 8.9905 7.13054 9.91057H10.5817C10.8193 8.9905 11.6541 8.30796 12.6482 8.30796C13.6427 8.30796 14.4775 8.99048 14.715 9.91057H16.1439L16.1326 8.32418L16.1326 8.32276C16.1326 7.88137 15.7733 7.52201 15.3319 7.52201ZM3.99542 10.4265C3.99589 10.432 3.99618 10.4379 3.99618 10.4442C3.99618 10.4504 3.99589 10.4563 3.99542 10.4618C4.00496 11.0428 4.48076 11.513 5.06406 11.513C5.65333 11.513 6.13292 11.0333 6.13292 10.4442C6.13292 9.85483 5.65332 9.37513 5.06406 9.37513C4.48077 9.37513 4.00496 9.84531 3.99542 10.4265ZM12.6482 9.37513C12.059 9.37513 11.5794 9.85483 11.5794 10.4442C11.5794 11.0333 12.0589 11.513 12.6482 11.513C13.2336 11.513 13.7108 11.0396 13.7171 10.4559C13.7169 10.4522 13.7168 10.4483 13.7168 10.4442C13.7168 10.44 13.7169 10.4361 13.7171 10.4324C13.7108 9.8485 13.2336 9.37513 12.6482 9.37513Z" fill="#A0AEC0"/>
            </svg>';
            break;
         case 'quotes':
            echo '<svg width="14" height="15" viewBox="0 0 14 15" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M3 10.1621H1V13.1621H3V10.1621ZM8 6.16211H6V13.1621H8V6.16211ZM13 1.16211L11 1.16211V13.1621H13V1.16211ZM11 0.162109C10.4477 0.162109 10 0.609825 10 1.16211V13.1621C10 13.7144 10.4477 14.1621 11 14.1621H13C13.5523 14.1621 14 13.7144 14 13.1621V1.16211C14 0.609825 13.5523 0.162109 13 0.162109H11ZM5 6.16211C5 5.60982 5.44772 5.16211 6 5.16211H8C8.55228 5.16211 9 5.60982 9 6.16211V13.1621C9 13.7144 8.55228 14.1621 8 14.1621H6C5.44772 14.1621 5 13.7144 5 13.1621V6.16211ZM0 10.1621C0 9.60983 0.447715 9.16211 1 9.16211H3C3.55228 9.16211 4 9.60983 4 10.1621V13.1621C4 13.7144 3.55228 14.1621 3 14.1621H1C0.447715 14.1621 0 13.7144 0 13.1621V10.1621Z" fill="#A0AEC0"/>
            </svg>';
            break;
         case 'invoices':
            echo '<svg width="14" height="16" viewBox="0 0 14 16" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M0.919909 0.668572C1.07856 0.642827 1.23991 0.694915 1.35355 0.808562L2 1.45501L2.64645 0.808562C2.84171 0.6133 3.15829 0.6133 3.35355 0.808562L4 1.45501L4.64645 0.808562C4.84171 0.6133 5.15829 0.6133 5.35355 0.808562L6 1.45501L6.64645 0.808562C6.84171 0.6133 7.15829 0.6133 7.35355 0.808562L8 1.45501L8.64645 0.808562C8.84171 0.6133 9.15829 0.6133 9.35355 0.808562L10 1.45501L10.6464 0.808562C10.8417 0.6133 11.1583 0.6133 11.3536 0.808562L12 1.45501L12.6464 0.808562C12.7601 0.694915 12.9214 0.642827 13.0801 0.668572C13.2387 0.694316 13.3753 0.794755 13.4472 0.938509L13.9472 1.93851C13.9819 2.00794 14 2.08449 14 2.16212V14.1621C14 14.2397 13.9819 14.3163 13.9472 14.3857L13.4472 15.3857C13.3753 15.5295 13.2387 15.6299 13.0801 15.6557C12.9214 15.6814 12.7601 15.6293 12.6464 15.5157L12 14.8692L11.3536 15.5157C11.1583 15.7109 10.8417 15.7109 10.6464 15.5157L10 14.8692L9.35355 15.5157C9.15829 15.7109 8.84171 15.7109 8.64645 15.5157L8 14.8692L7.35355 15.5157C7.15829 15.7109 6.84171 15.7109 6.64645 15.5157L6 14.8692L5.35355 15.5157C5.15829 15.7109 4.84171 15.7109 4.64645 15.5157L4 14.8692L3.35355 15.5157C3.15829 15.7109 2.84171 15.7109 2.64645 15.5157L2 14.8692L1.35355 15.5157C1.23991 15.6293 1.07856 15.6814 0.919909 15.6557C0.761262 15.6299 0.624663 15.5295 0.552786 15.3857L0.0527864 14.3857C0.0180725 14.3163 0 14.2397 0 14.1621V2.16212C0 2.08449 0.0180725 2.00794 0.0527864 1.93851L0.552786 0.938509C0.624663 0.794755 0.761262 0.694316 0.919909 0.668572ZM1.13698 2.0062L1 2.28015V14.0441L1.13698 14.318L1.64645 13.8086C1.84171 13.6133 2.15829 13.6133 2.35355 13.8086L3 14.455L3.64645 13.8086C3.84171 13.6133 4.15829 13.6133 4.35355 13.8086L5 14.455L5.64645 13.8086C5.84171 13.6133 6.15829 13.6133 6.35355 13.8086L7 14.455L7.64645 13.8086C7.84171 13.6133 8.15829 13.6133 8.35355 13.8086L9 14.455L9.64645 13.8086C9.84171 13.6133 10.1583 13.6133 10.3536 13.8086L11 14.455L11.6464 13.8086C11.8417 13.6133 12.1583 13.6133 12.3536 13.8086L12.863 14.318L13 14.0441V2.28015L12.863 2.0062L12.3536 2.51567C12.1583 2.71093 11.8417 2.71093 11.6464 2.51567L11 1.86922L10.3536 2.51567C10.1583 2.71093 9.84171 2.71093 9.64645 2.51567L9 1.86922L8.35355 2.51567C8.15829 2.71093 7.84171 2.71093 7.64645 2.51567L7 1.86922L6.35355 2.51567C6.15829 2.71093 5.84171 2.71093 5.64645 2.51567L5 1.86922L4.35355 2.51567C4.15829 2.71093 3.84171 2.71093 3.64645 2.51567L3 1.86922L2.35355 2.51567C2.15829 2.71093 1.84171 2.71093 1.64645 2.51567L1.13698 2.0062Z" fill="#A0AEC0"/>
            <path fill-rule="evenodd" clip-rule="evenodd" d="M2 4.66212C2 4.38597 2.22386 4.16212 2.5 4.16212H8.5C8.77614 4.16212 9 4.38597 9 4.66212C9 4.93826 8.77614 5.16212 8.5 5.16212H2.5C2.22386 5.16212 2 4.93826 2 4.66212ZM2 6.66212C2 6.38597 2.22386 6.16212 2.5 6.16212H8.5C8.77614 6.16212 9 6.38597 9 6.66212C9 6.93826 8.77614 7.16212 8.5 7.16212H2.5C2.22386 7.16212 2 6.93826 2 6.66212ZM2 8.66212C2 8.38597 2.22386 8.16212 2.5 8.16212H8.5C8.77614 8.16212 9 8.38597 9 8.66212C9 8.93826 8.77614 9.16212 8.5 9.16212H2.5C2.22386 9.16212 2 8.93826 2 8.66212ZM2 10.6621C2 10.386 2.22386 10.1621 2.5 10.1621H8.5C8.77614 10.1621 9 10.386 9 10.6621C9 10.9383 8.77614 11.1621 8.5 11.1621H2.5C2.22386 11.1621 2 10.9383 2 10.6621Z" fill="#A0AEC0"/>
            <path fill-rule="evenodd" clip-rule="evenodd" d="M10 4.66212C10 4.38597 10.2239 4.16212 10.5 4.16212H11.5C11.7761 4.16212 12 4.38597 12 4.66212C12 4.93826 11.7761 5.16212 11.5 5.16212H10.5C10.2239 5.16212 10 4.93826 10 4.66212ZM10 6.66212C10 6.38597 10.2239 6.16212 10.5 6.16212H11.5C11.7761 6.16212 12 6.38597 12 6.66212C12 6.93826 11.7761 7.16212 11.5 7.16212H10.5C10.2239 7.16212 10 6.93826 10 6.66212ZM10 8.66212C10 8.38597 10.2239 8.16212 10.5 8.16212H11.5C11.7761 8.16212 12 8.38597 12 8.66212C12 8.93826 11.7761 9.16212 11.5 9.16212H10.5C10.2239 9.16212 10 8.93826 10 8.66212ZM10 10.6621C10 10.386 10.2239 10.1621 10.5 10.1621H11.5C11.7761 10.1621 12 10.386 12 10.6621C12 10.9383 11.7761 11.1621 11.5 11.1621H10.5C10.2239 11.1621 10 10.9383 10 10.6621Z" fill="#A0AEC0"/>
            </svg>';
            break;
         
         default:
            # code...
            break;
      }

   return ob_get_clean();
}

//New Account Checklist
add_shortcode('new_account_checklist','new_account_checklist_callback');
function new_account_checklist_callback() {
   //Checks
   $create_account = "checked";
   $has_job = wp_count_posts( 'jobs' )->publish > 0 ? "checked" : "";
   $has_logo = get_custom_logo();
   $completed_count = !empty($has_job) + !empty($create_account) + !empty($has_logo);
   ob_start();
      echo '<div class="checklist-outer" >
               <div class="title-and-count" ><h6>Get started checklist</h6> <div class="fraction">'.$completed_count.'/7</div></div>
               <p>'.(round(100 / $completed_count)).'%</p>
               <div id="checklist-percentage" >';
               for ($i=0; $i < 6 ; $i++) { 
                  echo '<span class="'. ($completed_count > $i ? 'active' : ' ') . ($completed_count - 1 == $i ? ' final' : ' ') .'" ></span>';
               }
      echo '   </div>
            </div>';
      echo '
         <form id="account-checklist" >
            <label for="has-account" >
               Create an account
               <input type="checkbox" id="has-jobs" name="has-account" checked="true" >
            </label>
            <label for="has-logo" >
               Add your company logo
               <input type="checkbox" name="has-logo" >
            </label>
            <label for="has-job" >
               Create your first job
               <input type="checkbox" id="has-jobs" name="has-jobs" '.$has_job.' >
            </label>
         </form>
      ';
   return ob_get_clean();
}
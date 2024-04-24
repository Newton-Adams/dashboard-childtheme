<?php 
$customers = get_posts( array(
    'post_type' => 'customers',
    'posts_per_page' => -1,
    'post_status' => 'publish',
    'author' => get_current_user_id()
) );
$jobs = get_posts( array(
    'post_type' => 'jobs',
    'posts_per_page' => -1,
    'post_status' => 'publish',
    'author' => get_current_user_id()
) );

$add_person_icon = '<svg width="60" height="61" viewBox="0 0 60 61" fill="none" xmlns="http://www.w3.org/2000/svg">
<rect y="0.662109" width="60" height="60" rx="30" fill="#EDFFEB"/>
<path fill-rule="evenodd" clip-rule="evenodd" d="M30 26.1621C30 27.819 28.6569 29.1621 27 29.1621C25.3431 29.1621 24 27.819 24 26.1621C24 24.5053 25.3431 23.1621 27 23.1621C28.6569 23.1621 30 24.5053 30 26.1621ZM27 30.6621C29.4853 30.6621 31.5 28.6474 31.5 26.1621C31.5 23.6768 29.4853 21.6621 27 21.6621C24.5147 21.6621 22.5 23.6768 22.5 26.1621C22.5 28.6474 24.5147 30.6621 27 30.6621ZM36 38.1621C36 39.6621 34.5 39.6621 34.5 39.6621H19.5C19.5 39.6621 18 39.6621 18 38.1621C18 36.6621 19.5 32.1621 27 32.1621C34.5 32.1621 36 36.6621 36 38.1621ZM34.5 38.1569C34.4978 37.7867 34.2693 36.6778 33.2518 35.6603C32.2734 34.6819 30.4336 33.6621 27 33.6621C23.5663 33.6621 21.7265 34.6819 20.7481 35.6603C19.7306 36.6778 19.5021 37.7867 19.5 38.1569H34.5Z" fill="#009026"/>
<path fill-rule="evenodd" clip-rule="evenodd" d="M38.25 26.1621C38.6642 26.1621 39 26.4979 39 26.9121V29.1621H41.25C41.6642 29.1621 42 29.4979 42 29.9121C42 30.3263 41.6642 30.6621 41.25 30.6621H39V32.9121C39 33.3263 38.6642 33.6621 38.25 33.6621C37.8358 33.6621 37.5 33.3263 37.5 32.9121V30.6621H35.25C34.8358 30.6621 34.5 30.3263 34.5 29.9121C34.5 29.4979 34.8358 29.1621 35.25 29.1621H37.5V26.9121C37.5 26.4979 37.8358 26.1621 38.25 26.1621Z" fill="#009026"/>
</svg>';
$list_icon = '<svg width="60" height="61" viewBox="0 0 60 61" fill="none" xmlns="http://www.w3.org/2000/svg">
<rect y="0.162109" width="60" height="60" rx="30" fill="#EDFFEB"/>
<path fill-rule="evenodd" clip-rule="evenodd" d="M21 21.9121C20.5858 21.9121 20.25 22.2479 20.25 22.6621V24.1621C20.25 24.5763 20.5858 24.9121 21 24.9121H22.5C22.9142 24.9121 23.25 24.5763 23.25 24.1621V22.6621C23.25 22.2479 22.9142 21.9121 22.5 21.9121H21ZM22.5 22.6621H21V24.1621H22.5V22.6621Z" fill="#009026"/>
<path d="M25.5 23.4121C25.5 22.9979 25.8358 22.6621 26.25 22.6621H39.75C40.1642 22.6621 40.5 22.9979 40.5 23.4121C40.5 23.8263 40.1642 24.1621 39.75 24.1621H26.25C25.8358 24.1621 25.5 23.8263 25.5 23.4121Z" fill="#009026"/>
<path d="M26.25 28.6621C25.8358 28.6621 25.5 28.9979 25.5 29.4121C25.5 29.8263 25.8358 30.1621 26.25 30.1621H39.75C40.1642 30.1621 40.5 29.8263 40.5 29.4121C40.5 28.9979 40.1642 28.6621 39.75 28.6621H26.25Z" fill="#009026"/>
<path d="M26.25 34.6621C25.8358 34.6621 25.5 34.9979 25.5 35.4121C25.5 35.8263 25.8358 36.1621 26.25 36.1621H39.75C40.1642 36.1621 40.5 35.8263 40.5 35.4121C40.5 34.9979 40.1642 34.6621 39.75 34.6621H26.25Z" fill="#009026"/>
<path fill-rule="evenodd" clip-rule="evenodd" d="M20.25 28.6621C20.25 28.2479 20.5858 27.9121 21 27.9121H22.5C22.9142 27.9121 23.25 28.2479 23.25 28.6621V30.1621C23.25 30.5763 22.9142 30.9121 22.5 30.9121H21C20.5858 30.9121 20.25 30.5763 20.25 30.1621V28.6621ZM21 28.6621H22.5V30.1621H21V28.6621Z" fill="#009026"/>
<path fill-rule="evenodd" clip-rule="evenodd" d="M21 33.9121C20.5858 33.9121 20.25 34.2479 20.25 34.6621V36.1621C20.25 36.5763 20.5858 36.9121 21 36.9121H22.5C22.9142 36.9121 23.25 36.5763 23.25 36.1621V34.6621C23.25 34.2479 22.9142 33.9121 22.5 33.9121H21ZM22.5 34.6621H21V36.1621H22.5V34.6621Z" fill="#009026"/>
</svg>';
$check_icon = '<svg width="60" height="61" viewBox="0 0 60 61" fill="none" xmlns="http://www.w3.org/2000/svg">
<rect y="0.662109" width="60" height="60" rx="30" fill="#009026"/>
<path fill-rule="evenodd" clip-rule="evenodd" d="M37.6854 23.9755C38.0841 24.4299 38.0841 25.1666 37.6854 25.6209L29.5173 37.2555C29.1185 37.7099 28.4721 37.7099 28.0733 37.2555L22.6692 31.0975C22.2704 30.6431 22.2704 29.9064 22.6692 29.4521C23.0679 28.9977 23.7144 28.9977 24.1131 29.4521L28.7953 34.7875L36.2415 23.9755C36.6402 23.5212 37.2867 23.5212 37.6854 23.9755Z" fill="white"/>
<path fill-rule="evenodd" clip-rule="evenodd" d="M35.7025 23.8726C36.2819 23.2209 37.2214 23.2209 37.8008 23.8726C38.3731 24.5163 38.3802 25.5551 37.8219 26.2086L29.924 37.3126C29.9126 37.3286 29.9004 37.3439 29.8875 37.3584C29.3081 38.0102 28.3687 38.0102 27.7892 37.3585L22.5537 31.4697C21.9743 30.818 21.9743 29.7613 22.5537 29.1096C23.1332 28.4579 24.0726 28.4579 24.652 29.1096L28.7937 33.768L35.6631 23.9225C35.6753 23.905 35.6885 23.8883 35.7025 23.8726Z" fill="white"/>
</svg>';

?>
<div class="get-started-guide "> 
    
    <h3 class="wp-block-heading mb-2">Get started guide</h3> 

    <div class="card add-business-info"> 
        <div class="info-header"> 
            <figure class="icon-col wp-block-image size-large"> 
                <img src="<?php echo get_home_url(); ?>/wp-content/themes/workshoppro-childtheme/assets/images/world-icon.svg" />
            </figure> 
            <div class="step-text-col"> 
                <div class="context">
                    <p class="caption mb-0">Step 1</p> 
                    <h3 class="wp-block-heading">Add your business info</h3> 
                    <p class="small-text mb-0">Upload your logo, add your VAT number and address to invoices, add contact information and more</p> 
                </div>
                <div class="add-business-btn"> 
                    <svg width="18" height="19" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg"> 
                        <path d="M8.15286 13.1945L2.7571 7.02793C2.12062 6.30052 2.6372 5.16211 3.60375 5.16211H14.3953C15.3618 5.16211 15.8784 6.30052 15.2419 7.02793L9.84616 13.1945C9.39795 13.7068 8.60108 13.7068 8.15286 13.1945Z" fill="#7A7A9D"/> 
                    </svg>
                </div> 
            </div> 
        </div> 

        <div class="add-business-form">

            <?php profile_form() ?>
            
        </div>
    </div> 

    
    <div class="card import-customer-data <?php if( count($customers) > 0 ) { echo 'completed'; } ?>"> 

        <div class="info-header"> 

            <figure class="icon-col wp-block-image size-large"> 
                <?php 
                    if( count($customers) > 0 ) {
                        echo $check_icon;
                    } else {
                        echo $add_person_icon;
                    }
                ?>
            </figure> 
            
            <div class="step-text-col"> 
                <div class="wp-block-columns is-layout-flex wp-container-core-columns-layout-1 wp-block-columns-is-layout-flex">

                    <div class="wp-block-column is-layout-flow wp-block-column-is-layout-flow" style="flex-basis:50%">
                        <p class="caption mb-0">Step 2</p> 
                        <h3 class="wp-block-heading">Import your customer data</h3> 
                        <p class="small-text mb-2">Download the customer import csv template, populate the template with your customer details and add it to the “Upload customers CSV” box to the right</p> 
                        <div class="wp-block-buttons is-layout-flex wp-block-buttons-is-layout-flex mb-2">
                            <div class="wp-block-button is-style-outline">
                                <a class="wp-block-button__link wp-element-button">Download Customer Import Template</a>
                            </div>
                        </div>
                        <p>Need help importing customers? <a href="#">Get help now</a></p>
		
                    </div>

                    <div class="wp-block-column is-layout-flow wp-block-column-is-layout-flow" style="flex-basis:50%">
                        <?php include( get_stylesheet_directory() . "/inc/templates/customers/upload-csv.php" ); ?>
                    </div>

                </div>

            </div> 
        </div>

    </div> 

    <div class="card start-first-job <?php if( count($jobs) > 0 ) { echo 'completed'; } ?>">

        <div class="info-header"> 

            <figure class="icon-col wp-block-image size-large"> 
                <?php 
                    if( count($jobs) > 0 ) {
                        echo $check_icon;
                    } else {
                        echo $list_icon;
                    }
                ?>
            </figure> 
            
            <div class="step-text-col">  
                <div class="context">
                    <p class="caption mb-0">Step 3</p> 
                    <h3 class="wp-block-heading">Start your first job</h3> 
                    <p class="small-text mb-0">Get started creating a job, quoting customers and invoicing.</p> 
                </div>
                <?php 
                    if( count($jobs) < 0 ) {
                        echo '<div class="add-business-btn"> 
                            <div class="wp-block-button">
                                <a href="/job" class="wp-block-button__link wp-element-button">+ Start First Job</a>
                            </div>
                        </div> ';
                    }
                ?>
            </div> 

        </div>

    </div> 
</div>
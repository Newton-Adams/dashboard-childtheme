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
            <div style="height:20px" aria-hidden="true" class="wp-block-spacer"></div>
            <?php echo do_shortcode('[ultimatemember form_id="52"]'); ?>
        </div>
    </div> 

    <div class="card import-customer-data"> 

        <div class="info-header"> 

            <figure class="icon-col wp-block-image size-large"> 
                <img src="<?php echo get_home_url(); ?>/wp-content/themes/workshoppro-childtheme/assets/images/add-person-icon.svg" />
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

    <div class="card start-first-job">

        <div class="info-header"> 

            <figure class="icon-col wp-block-image size-large"> 
                <img src="<?php echo get_home_url(); ?>/wp-content/themes/workshoppro-childtheme/assets/images/list-icon.svg" />
            </figure> 
            
            <div class="step-text-col">  
                <div class="context">
                    <p class="caption mb-0">Step 3</p> 
                    <h3 class="wp-block-heading">Start your first job</h3> 
                    <p class="small-text mb-0">Get started creating a job, quoting customers and invoicing.</p> 
                </div>
                <div class="add-business-btn"> 
                    <div class="wp-block-button">
                        <a class="wp-block-button__link wp-element-button">+ Start First Job</a>
                    </div>
                </div> 
            </div> 

        </div>

    </div> 
</div>
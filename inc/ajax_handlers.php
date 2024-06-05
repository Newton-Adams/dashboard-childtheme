<?php
// Profile Form
add_action('wp_ajax_update_profile', 'profile_form');
add_action('wp_ajax_nopriv_update_profile', 'profile_form');
function profile_form() {
    
    $user = wp_get_current_user();
    $user_avatar = get_avatar_url( $user->ID, array( 'size' => 48 ) );
    $user_name = $user->display_name;
    $user_id = get_current_user_id();
    $company_name = esc_attr(get_user_meta($user_id, 'company_name', true));
    $firstname = esc_attr(get_user_meta($user_id, 'first_name', true));
    $lastname = esc_attr(get_user_meta($user_id, 'last_name', true));
    $user_email = esc_attr( wp_get_current_user()->user_email );
    $admin_email = esc_attr(get_user_meta($user_id, 'admin_email', true));
    $user_phone = esc_attr(get_user_meta($user_id, 'cell_number', true));
    $userWhatsAppNumber = esc_attr(get_user_meta($user_id, 'whatsapp_number', true));
    $vatNumber = esc_attr(get_user_meta($user_id, 'vat_number', true));
    $companyRegistrationNumber = esc_attr(get_user_meta($user_id, 'company_registration_number', true));
    $miwaMember = esc_attr(get_user_meta($user_id, 'miwa_member', true));
    $hourlyLabourRate = get_user_meta($user_id, 'hourly_labour_rate', true) ? esc_attr(get_user_meta($user_id, 'hourly_labour_rate', true)) : '';
    $currency = get_user_meta($user_id, 'currency', true) ? esc_attr(get_user_meta($user_id, 'currency', true)) : 'ZAR';
    $vatRate = get_user_meta($user_id, 'vat_rate', true) ? esc_attr(get_user_meta($user_id, 'vat_rate', true)) : 15;
    $parts_markup = get_user_meta( $user_id, 'parts_markup', true ) ? esc_attr( get_user_meta($user_id, 'parts_markup', true) ) : '';
    $latest_job_number = get_user_meta( $user_id, 'job_number', true ) ? esc_attr( get_user_meta($user_id, 'job_number', true) ) : 0;
    $job_prefix = get_user_meta( $user_id, 'job_prefix', true ) ? esc_attr( get_user_meta($user_id, 'job_prefix', true) ) : '';
    $customer_prefix = get_user_meta( $user_id, 'customer_prefix', true ) ? esc_attr( get_user_meta($user_id, 'customer_prefix', true) ) : "";
    $latest_customer_number = get_user_meta( $user_id, 'customer_number', true ) ? esc_attr( get_user_meta($user_id, 'customer_number', true) ) : 1;
    //Address
    $user_physical_address = get_user_meta( $user_id, 'user_physical_address', true ) ? esc_attr(get_user_meta($user_id, 'user_physical_address', true)) : "";
    $user_suburb = get_user_meta( $user_id, 'user_suburb', true ) ? esc_attr(get_user_meta($user_id, 'user_suburb', true)) : "";
    $user_city = get_user_meta( $user_id, 'user_city', true ) ? esc_attr(get_user_meta($user_id, 'user_city', true)) : "";
    $user_postal_code = get_user_meta( $user_id, 'user_postal_code', true ) ? esc_attr(get_user_meta($user_id, 'user_postal_code', true)) : "";
    $user_province = get_user_meta( $user_id, 'user_province', true ) ? esc_attr(get_user_meta($user_id, 'user_province', true)) : "";

    // Handle form submission
    if (isset($_POST['formData'])) {
        // Verify nonce
        // if (!isset($_POST['profile_form_nonce']) || !wp_verify_nonce($_POST['profile_form_nonce'], 'profile_form_nonce_action')) {
        //     wp_send_json_error('Nonce verification failed', 400);
        //     return;
        // }

        parse_str($_POST['formData'], $form_data);
        
        // Sanitize and update each form field
        foreach ($form_data as $key => $value) {
            $sanitized_value = ($key === 'user_email') ? sanitize_email($value) : sanitize_text_field($value);
            if ($key === 'user_email') {
                wp_update_user(array('ID' => $user_id, 'user_email' => $sanitized_value));
            } else {
                update_user_meta($user_id, $key, $sanitized_value);
            }
        }
        
        // Handle the MIWA member checkbox
        if (isset($form_data['miwa_member'])) {
            update_user_meta($user_id, 'miwa_member', 'is_miwa_member');
        } else {
            delete_user_meta($user_id, 'miwa_member');
        }

        wp_send_json_success('Profile updated successfully');
    }

    ?>

    <form id="profile-form" class="form" action="" method="post">

        <?php wp_nonce_field('profile_form_nonce_action', 'profile_form_nonce'); ?>
    
        <div style="height:20px" aria-hidden="true" class="wp-block-spacer"></div>

        <!-- Profile Image and Company name -->
        <div class="form-row">
            <div class="input-label-wrapper" >
                <div class="profile-form-header d-flex flex-align-center">
                    <div class="d-flex flex-align-center">
                        <div class="profile-image">
                            <?php 
                            if ( $user_avatar ) {
                                echo '<img src="' . esc_url( $user_avatar ) . '" />';
                            } else {
                                echo '<img src="' . get_stylesheet_directory_uri() . '/assets/images/default-avatar.png" />';
                            }
                            ?>
                        </div>
                        <div class="">
                            <div class="profile-name"><?php echo $company_name; ?></div>
                            <div class="upload-note">PNG or JPG no bigger than 1000px wide and tall.</div>
                        </div>
                    </div>

                    <div class="image-uploader">
                        <input type="file" name="profile_picture" id="profile_picture" accept="image/png, image/jpeg">
                        <label for="profile_picture" class="custom-file-upload">
                            <svg width="12" height="13" viewBox="0 0 12 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M0.375 6.55984C0.582107 6.55984 0.75 6.71289 0.75 6.90169V9.29466C0.75 9.67226 1.08579 9.97837 1.5 9.97837H10.5C10.9142 9.97837 11.25 9.67226 11.25 9.29466V6.90169C11.25 6.71289 11.4179 6.55984 11.625 6.55984C11.8321 6.55984 12 6.71289 12 6.90169V9.29466C12 10.0499 11.3284 10.6621 10.5 10.6621H1.5C0.671573 10.6621 0 10.0499 0 9.29466V6.90169C0 6.71289 0.167893 6.55984 0.375 6.55984Z" fill="#18181A"/>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M3.74999 4.40859C3.89644 4.5421 4.13388 4.5421 4.28032 4.40859L5.99999 2.84093L7.71967 4.40861C7.86611 4.54211 8.10355 4.54211 8.24999 4.40861C8.39644 4.27511 8.39644 4.05866 8.24999 3.92516L6.26516 2.11575C6.11871 1.98225 5.88128 1.98225 5.73483 2.11575L3.74999 3.92514C3.60355 4.05864 3.60355 4.27509 3.74999 4.40859Z" fill="#18181A"/>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M6 2.4576C6.20711 2.4576 6.375 2.61066 6.375 2.79946V8.2691C6.375 8.4579 6.20711 8.61095 6 8.61095C5.79289 8.61095 5.625 8.4579 5.625 8.2691V2.79946C5.625 2.61066 5.79289 2.4576 6 2.4576Z" fill="#18181A"/>
                            </svg> 
                            <div class="caption mb-0">Upload</div>
                        </label>
                    </div>
                </div>

            </div> 
        </div>

        <h5 class="mb-0">Business information</h5>

        <div style="height:20px" aria-hidden="true" class="wp-block-spacer"></div>

        <!-- First name -->
        <div class="form-row" >
            <div class="input-label-wrapper" >
                <label for="company_name" >Company name</label>
                <input type="text" name="company_name" id="company_name" value="<?= $company_name; ?>" class="required" />
            </div>
        </div>

        <!-- Last name -->
        <div class="form-row" >
            <div class="input-label-wrapper" >
                <label for="first_name" >First name</label>
                <input type="text" name="first_name" id="first_name" value="<?= $firstname; ?>" placeholder="Firstname" class="required"  />
            </div>
            <div class="input-label-wrapper" >
                <label for="last_name" >Last name</label>
                <input type="text" name="last_name" id="last_name" value="<?= $lastname ?>" placeholder="Lastname" class="required"  />
            </div>
        </div>

        <!-- Cell number, Whatsapp number -->
        <div class="form-row" >
            <div class="input-label-wrapper" >
                <label for="email" >Account Email </label>
                <input type="email" name="user_email" id="email" value="<?= $user_email ?>" placeholder="" class="required"  />
            </div>
            <div class="input-label-wrapper" >
                <label for="email" >Admin/Accounts Email</label>
                <input type="email" name="admin_email" id="email" value="<?= $admin_email ?>" placeholder="" class="required"  />
            </div>
        </div>
        
        <!-- Cell number, Whatsapp number -->
        <div class="form-row" >
            <div class="input-label-wrapper" >
                <label for="cellnumber" >Cell number</label>
                <input type="tel" name="cell_number" id="cell_number" value="<?= $user_phone ?>" class="required" />
            </div>
            <div class="input-label-wrapper" >
                <label for="whatsapp_number" >WhatsApp number</label>
                <input type="text" name="whatsapp_number" id="whatsapp_number" value="<?= $userWhatsAppNumber ?>" />
            </div>
        </div>
                            
        <!-- Address -->
        <h5 class="mb-0">Business Address</h5>
        <div style="height:20px" aria-hidden="true" class="wp-block-spacer"></div>
        <div class="form-row" >
            <div class="input-label-wrapper" >
                <label for="user-physical-address" >Physical address</label>
                <input type="text" id="user_physical_address" name="user_physical_address" value="<?= isset($user_physical_address) ? $user_physical_address : ''; ?>" >
            </div>
            <div class="input-label-wrapper" >
                <label for="user-suburb" >Suburb</label>
                <input type="text" id="user_suburb" name="user_suburb" value="<?= isset($user_suburb) ? $user_suburb : ''; ?>" >
            </div>                
        </div>
        <div class="form-row" >
            <div class="input-label-wrapper" >
                <label for="user-city" >City</label>
                <input type="text" id="user_city" name="user_city" value="<?= isset($user_city) ? $user_city : ''; ?>" >
            </div>
            <div class="input-label-wrapper" >
                <label for="user-province" >Province</label>
                <input type="text" id="user_province" name="user_province" value="<?= isset($user_province) ? $user_province : ''; ?>" >
            </div>
            <div class="input-label-wrapper" >
                <label for="user-postal-code" >Postal code</label>
                <input type="text" id="user_postal_code" name="user_postal_code" value="<?= isset($user_postal_code) ? $user_postal_code : ''; ?>" >
            </div>
        </div>

        <!-- VAT number, Company registration number -->
        <div style="height:20px" aria-hidden="true" class="wp-block-spacer"></div>

        <div class="form-row" >
            <div class="input-label-wrapper" >
                <label for="vat_number" >VAT number (Optional)</label> 
                <input type="text" name="vat_number" id="vat_number" value="<?= $vatNumber ?>" placeholder="" > 
            </div>
            <div class="input-label-wrapper" >
                <label for="company_registration_number" >Company registration number (Optional)</label>
                <input type="text" name="company_registration_number" id="company_registration_number" value="<?= $companyRegistrationNumber ?>" placeholder="" > 
            </div>
        </div>

        <div class="form-row" >
            <div class="input-label-wrapper" >
                <div class="d-flex flex-align-center">
                    <div class="toggle-button-cover mr-2">
                        <div class="button-cover">
                            <div id="button-1" class="checkbox-button r">
                                <input id="miwa_member" type="checkbox" class="checkbox" name="miwa_member" value="<?= $miwaMember ?>" <?php echo $miwaMember == 'is_miwa_member' ? 'checked' : ''; ?> />
                                <div class="knobs"></div>
                                <div class="layer"></div>
                            </div>
                        </div>
                    </div>
                    <label for="miwa_member" class="mb-0">MIWA Member</label>
                </div>
            </div>
        </div>
        
        <div class="form-row" >
            <div class="input-label-wrapper" >
                <label for="customer_prefix" >Customer Prefix</label>
                <input type="text" name="customer_prefix" id="customer_prefix" value="<?= $customer_prefix ?>" placeholder= />
                <div class="description">Example: <span class="customer-prefix-box"><?= $customer_prefix ?></span>-0001</div>
            </div>
            <div class="input-label-wrapper" >
                <label for="job_prefix" >Job Prefix</label>
                <input type="text" name="job_prefix" id="job_prefix" value="<?= $job_prefix ?>" placeholder= />
                <div class="description">Example: <span class="job-prefix-box"><?= $job_prefix ?></span>-0001</div>
            </div>
            <div class="input-label-wrapper" >
                <label for="job_number" >Created Jobs</label>
                <input type="text" name="job_number" id="job_number" value="<?= ltrim($latest_job_number, '0') ?>" placeholder= />
            </div>
        </div>

        <div class="form-row" >
            <div class="input-label-wrapper" >
                <label for="hourly_labour_rate" >Hourly labour rate</label>
                <input type="number" name="hourly_labour_rate" id="hourly_labour_rate" value="<?= $hourlyLabourRate ?>" placeholder="" />
            </div>
            <div class="input-label-wrapper" >
                <label for="currency" >Currency</label>
                <select name="currency" id="currency" class="required" >
                    <option value="R" <?php echo $currency == 'R' ? 'selected' : ''; ?> >ZAR</option>
                    <option value="$" <?php echo $currency == '$' ? 'selected' : ''; ?> >USD</option>
                    <option value="€" <?php echo $currency == '€' ? 'selected' : ''; ?> >EUR</option>
                </select>
                </select>
            </div>
            <div class="input-label-wrapper" >
                <label for="vat_rate" >VAT rate</label>
                <input type="number" name="vat_rate" id="vat_rate" value="<?= $vatRate ?>" placeholder="" />
            </div>
            <div class="input-label-wrapper" >
                <label for="parts_markup" >Parts markup</label>
                <input type="number" name="parts_markup" id="parts_markup" value="<?= $parts_markup ?>" placeholder="%" />
            </div>
        </div>
        
        <!-- Bank details -->

        <h5 class="mb-2">Bank details</h5>

        <div class="form-row">
            <div class="input-label-wrapper fw-100">
                <label for="account-name">Account name</label>
                <input type="text" name="account_name" id="account-name" value="<?php echo esc_attr(get_user_meta(get_current_user_id(), 'account_name', true)); ?>" placeholder="" class="">
            </div>
            <div class="input-label-wrapper fw-100">
                <label for="account-number">Account number</label>
                <input type="text" name="account_number" id="account-number" value="<?php echo esc_attr(get_user_meta(get_current_user_id(), 'account_number', true)); ?>" placeholder="" class="">
            </div>
        </div>

        <div class="form-row">
            <div class="input-label-wrapper fw-100">
                <label for="bank">Bank</label>
                <input type="text" name="bank_name" id="bank" value="<?php echo esc_attr(get_user_meta(get_current_user_id(), 'bank_name', true)); ?>" placeholder="" class="">
            </div>
            <div class="input-label-wrapper fw-100">
                <label for="account-type">Account type</label>
                <input type="text" name="account_type" id="account-type" value="<?php echo esc_attr(get_user_meta(get_current_user_id(), 'account_type', true)); ?>" placeholder="" class="">
            </div>
        </div>

        <div class="form-row">
            <div class="input-label-wrapper fw-100">
                <label for="branch">Branch</label>
                <input type="text" name="branch_name" id="branch" value="<?php echo esc_attr(get_user_meta(get_current_user_id(), 'branch_name', true)); ?>" placeholder="" class="">
            </div>
            <div class="input-label-wrapper fw-100">
                <label for="branch-code">Branch code</label>
                <input type="text" name="branch_code" id="branch-code" value="<?php echo esc_attr(get_user_meta(get_current_user_id(), 'branch_code', true)); ?>" placeholder="" class="">
            </div>
        </div>
    
        <div style="height:10px" aria-hidden="true" class="wp-block-spacer"></div>

        <!-- Save button -->
        <div class="form-row" >
            <div class="input-label-wrapper" >
                <div class="wp-block-buttons is-content-justification-right is-layout-flex wp-container-core-buttons-layout-1 wp-block-buttons-is-layout-flex">
                    <div class="wp-block-button">
                        <input type="submit" name="update_info" value="Save changes" class="wp-block-button__link wp-element-button" />
                    </div>
                </div>
            </div>
        </div>

    </form>

    <?php 
    
    if(wp_doing_ajax()) {
        die();
    };

}

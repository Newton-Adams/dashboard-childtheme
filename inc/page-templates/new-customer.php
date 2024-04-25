<?php
include( get_stylesheet_directory() . "/inc/templates/customers/customer-data.php"); 

echo '<span class="'.$editing.'" >
         <div class="controls" >
            <input type="hidden" id="customer-post-id" name="customer-post-id" value="'.$customer_edit_id.'" >';
            include( get_stylesheet_directory() . "/inc/templates/customers/controls.php");          
   echo '</div>';  
   echo '<div class="forms-container" >
            <div class="contact-container" >';            
               include( get_stylesheet_directory() . "/inc/templates/customers/customer-details.php"); 
      echo '</div>
      </div>';
echo '<div class="forms-container" >
        <div class="details-container" >';
            include( get_stylesheet_directory() . "/inc/templates/customers/company-details.php");         
   echo '</div>
      </div>';
echo '<div class="forms-container" >
         <div class="vehicle-container" >'; 
         include( get_stylesheet_directory() . "/inc/templates/customers/vehicles.php"); 
   echo '</div>
      </div>';
   if(isset($customer_edit_id) && $customer_edit_id != "") {      
      echo '<div class="forms-container" >
               <div class="notes-container" >'; 
               include( get_stylesheet_directory() . "/inc/templates/customers/customer-jobs.php"); 
               include( get_stylesheet_directory() . "/inc/templates/popups/add-vehicle-popup.php" ); 
         echo '</div>
            </div>';
   }
echo '
   <div class="forms-container" >
      <div class="notes-container" >'; 
          include( get_stylesheet_directory() . "/inc/templates/customers/customer-notes.php"); 
echo '</div> 
    </div>';
echo '<span class="'.$editing.'" ><div class="controls" >
         <input type="hidden" id="customer-id" name="customer-id" value="">';
         include( get_stylesheet_directory() . "/inc/templates/customers/controls.php");          
echo '</div>';  
include( get_stylesheet_directory() . "/inc/templates/popups/unsaved-data-popup.php");      
include( get_stylesheet_directory() . "/inc/templates/popups/ajax-error-popup.php");      
    
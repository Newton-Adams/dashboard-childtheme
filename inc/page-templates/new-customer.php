<?php
include( get_stylesheet_directory() . "/inc/templates/customers/customer-data.php"); 

echo '<span class="'.$editing.'" ><div class="controls" >
         <input type="hidden" id="customer-id" name="customer-id" value="">';
         include( get_stylesheet_directory() . "/inc/templates/customers/controls.php");          
echo '</div>';  
echo '<div class="forms-container" >
        <div class="details-container" >';
            include( get_stylesheet_directory() . "/inc/templates/customers/customer-details.php");         
  echo '</div>
    </div>
      <div class="forms-container" >
         <div class="contact-container" >';            
            include( get_stylesheet_directory() . "/inc/templates/customers/customer-contact.php"); 
   echo '</div>
   </div>
   <div class="forms-container" >
      <div class="vehicle-container" >'; 
          include( get_stylesheet_directory() . "/inc/templates/customers/vehicles.php"); 
          include( get_stylesheet_directory() . "/inc/templates/customers/customer-vehicle-attachments.php"); 

echo '</div>
   </div>
   <div class="forms-container" >
      <div class="notes-container" >'; 
          include( get_stylesheet_directory() . "/inc/templates/customers/customer-notes.php"); 
echo '</div>
    </div>';
echo '<span class="'.$editing.'" ><div class="controls" >
         <input type="hidden" id="customer-id" name="customer-id" value="">';
         include( get_stylesheet_directory() . "/inc/templates/customers/controls.php");          
echo '</div>';  
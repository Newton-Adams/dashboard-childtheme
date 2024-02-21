<?php
echo '
    <div class="customer-card" >';
        include( get_stylesheet_directory() . "/inc/templates/customers/customer-card-number.php");         
echo '</div>
    <div class="forms-container" >
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
echo '</div>
   </div>
   <div class="forms-container" >
      <div class="notes-container" >'; 
          include( get_stylesheet_directory() . "/inc/templates/customers/customer-notes.php"); 
echo '</div>
    </div>
   <div class="forms-container" >
      <button id="save-post" class="customer-save" >Save</button>
   </div>';
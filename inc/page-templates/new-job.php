<?php
echo '<div class="forms-container" >
            <div class="jobno-customer-vehicle" >';
                  include( get_stylesheet_directory() . "/inc/templates/jobs/job-number.php");         
                  include( get_stylesheet_directory() . "/inc/templates/customer-select.php");   
                  include( get_stylesheet_directory() . "/inc/templates/vehicle-select.php");
      echo '</div>
   </div>
   <div class="forms-container" >
         <div class="section jobs-container" >';            
         include( get_stylesheet_directory() . "/inc/templates/jobs/labour-row.php");
         include( get_stylesheet_directory() . "/inc/templates/subtotal.php");
   echo '</div>
         <div class="section parts-container" >';
            include( get_stylesheet_directory() . "/inc/templates/jobs/parts-row.php");
            include( get_stylesheet_directory() . "/inc/templates/subtotal.php");
            include( get_stylesheet_directory() . "/inc/templates/total.php");
   echo '</div>
         <div class="section notes&attachments-container" >';
            include( get_stylesheet_directory() . "/inc/templates/jobs/job-notes-&-attachments.php");
   echo '</div>
   </div>
   <div class="forms-container" >
      <div class="parts-container" >'; 
         include( get_stylesheet_directory() . "/inc/templates/jobs/booking.php");
echo '</div>
   </div>
   <div class="forms-container" >
      <button id="save-post" class="job-save" >Save</button>
   </div>';
   // include( get_stylesheet_directory() . "/inc/page-templates/staff-template.php");
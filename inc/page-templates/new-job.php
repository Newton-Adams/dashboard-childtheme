<?php
include( get_stylesheet_directory() . "/inc/templates/jobs/job-data.php"); 

echo '<span class="'.$editing.'" ><div class="controls" >
         <input type="hidden" id="job-id" name="job-id" value="'.$job_edit_id.'">';
         include( get_stylesheet_directory() . "/inc/templates/jobs/controls.php");          
echo '</div>';
echo '<div class="forms-container" >
            <div class="jobno-customer-vehicle" >';      
                  include( get_stylesheet_directory() . "/inc/templates/jobs/customer-select.php");   
                  include( get_stylesheet_directory() . "/inc/templates/jobs/vehicle-select.php");
      echo '</div>
   </div>
   <div class="forms-container" >
         <div class="section labour-container" >';            
         include( get_stylesheet_directory() . "/inc/templates/jobs/labour-row.php");
         include( get_stylesheet_directory() . "/inc/templates/jobs/subtotal.php");
   echo '</div>
         <div class="section parts-container" >';
            include( get_stylesheet_directory() . "/inc/templates/jobs/parts-row.php");
            include( get_stylesheet_directory() . "/inc/templates/jobs/subtotal.php");
            include( get_stylesheet_directory() . "/inc/templates/jobs/total.php");
   echo '</div>
         <div class="section notes&attachments-container" >';
            include( get_stylesheet_directory() . "/inc/templates/jobs/job-notes-attachments.php");
   echo '</div>
   </div>
   <div class="forms-container" >
      <div class="parts-container" >'; 
         include( get_stylesheet_directory() . "/inc/templates/jobs/booking.php");
echo '</div>
   </div>';
echo '<div class="controls" >';
   include( get_stylesheet_directory() . "/inc/templates/jobs/controls.php");          
echo '</div></span>';
include( get_stylesheet_directory() . "/inc/templates/global/unsaved-data-popup.php");      
 
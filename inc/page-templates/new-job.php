<?php
echo '<div class="forms-container" >
            <div class="jobno-customer-vehicle" >';
                  include( get_stylesheet_directory() . "/inc/templates/job-number.php");         
                  include( get_stylesheet_directory() . "/inc/templates/customer-select.php");   
                  include( get_stylesheet_directory() . "/inc/templates/vehicle-select.php");
      echo '</div>
          </div>
          <div class="forms-container" >
             <div class="jobs-container" >';            
             include( get_stylesheet_directory() . "/inc/templates/labour-row.php");
          echo '<div class="add-row-button-outer" >
                   <button class="add-row-button" type="button" >
                      <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" clip-rule="evenodd" d="M8 15C11.866 15 15 11.866 15 8C15 4.13401 11.866 1 8 1C4.13401 1 1 4.13401 1 8C1 11.866 4.13401 15 8 15ZM8 16C12.4183 16 16 12.4183 16 8C16 3.58172 12.4183 0 8 0C3.58172 0 0 3.58172 0 8C0 12.4183 3.58172 16 8 16Z" fill="#009026"/>
                      <path fill-rule="evenodd" clip-rule="evenodd" d="M8 4C8.27614 4 8.5 4.22386 8.5 4.5V7.5H11.5C11.7761 7.5 12 7.72386 12 8C12 8.27614 11.7761 8.5 11.5 8.5H8.5V11.5C8.5 11.7761 8.27614 12 8 12C7.72386 12 7.5 11.7761 7.5 11.5V8.5H4.5C4.22386 8.5 4 8.27614 4 8C4 7.72386 4.22386 7.5 4.5 7.5H7.5V4.5C7.5 4.22386 7.72386 4 8 4Z" fill="#009026"/>
                      </svg>
                      <span>Add Labour Row</span>
                   </button>
                </div>';
                include( get_stylesheet_directory() . "/inc/templates/subtotal.php");
          echo '</div>
      </div>
    <div class="forms-container" >
        <button id="save-post" >Save</button>
    </div>';

<?php 
/**
 * Add Vehicle Form
 * 
 * @package GeneratePress
 */
?>
<form id="add-vehicle-form" class="" action="" method="post">

   <h2 class="mb-0">Add Vehicle</h2>

   <div style="height:20px" aria-hidden="true" class="wp-block-spacer"></div>

   <!-- Customer -->
   <h5 class="mb-0">Customer</h5>

   <div style="height:20px" aria-hidden="true" class="wp-block-spacer"></div>

   <div class="form-row" >
      <div class="input-label-wrapper" >
            <input type="text" name="customer" id="customer" value="" placeholder="Find a customer by name, vehicle or registration" class="required" />
      </div>
   </div>

   <!-- Customer -->
   <h5 class="mb-0">Vehicle Details</h5>

   <div style="height:20px" aria-hidden="true" class="wp-block-spacer"></div>

   <div class="form-row" >
      <div class="input-label-wrapper" >
            <label for="make" >Make</label>
            <input type="text" name="make" id="make" value="" placeholder="Make" class="required"  />
      </div>
      <div class="input-label-wrapper" >
            <label for="model" >Model</label>
            <input type="text" name="model" id="model" value="" placeholder="Model" class="required" />               
      </div>
      <div class="input-label-wrapper" >
            <label for="year" >Year</label>
            <input type="text" name="year" id="year" value="" placeholder="Year" class="required" />
      </div>
   </div>

   <div class="form-row" >
      <div class="input-label-wrapper" > 
         <label for="colour" >Colour</label> 
         <input type="text" name="colour" id="colour" value="" placeholder="Colour" class="required" />
      </div>
      <div class="input-label-wrapper" > 
         <label for="mileage" >Mileage</label>  
         <input type="text" name="mileage" id="mileage" value="" placeholder="Mileage" class="required" />
      </div>
   </div>
   
   <div class="form-row" >
      <div class="input-label-wrapper" >
            <label for="registration" >Registration</label>
            <input type="text" name="registration" id="registration" value="" placeholder="Registration" class="required" />
      </div>
      <div class="input-label-wrapper" >
            <label for="vin" >VIN</label>
            <input type="text" name="vin" id="vin" value="" placeholder="VIN" class="required" />
      </div>
   </div>

   <div class="form-row" > 
      <div class="input-label-wrapper" > 
         <label for="attachments" >Attachments</label>
         <input type="file" name="attachments" id="attachments" value="" placeholder="Attachments" class="required" />
      </div> 
   </div>

   <div class="form-row" >
      <div class="input-label-wrapper" >
            <label for="vehicle-description" >Vehicle Description</label> 
            <textarea name="vehicle-description" id="vehicle-description" value="" placeholder="Vehicle Description" class="required" ></textarea>
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



<div class="job-select-wrapper vehicle" >
    <h3>Vehicle</h3>
    <p class="no-customer-selected" >Please select or add a customer</p>
    <div class="vehicle-select" style="<?= !isset($vehicle) ? "display: none;" : ""; ?>" >
        <span class="pre-vehicle-selection" style="<?= isset($vehicle) ? "display: none;" : ""; ?>" >
            <div class="header" >
                <h3>Select a vehicle</h3>
                <span class="add-new-vehicle" > <?php include( get_stylesheet_directory() . "/assets/images/add-small-button.svg"); ?>Add new vehicle</span>
            </div>
            <div class="table-header" >
                <span>VEHICLE</span>
                <span>REGISTRATION</span>
            </div>
            <ul class="options" >
                <?php 
                    if(isset($vehicle)) {
                        echo "<li 
                                data-vin=".$vehicle->VIN." 
                                data-mileage=".$vehicle->mileage." 
                                data-make=".$vehicle->make." 
                                data-model=".$vehicle->model." 
                                data-vehicle-all='".$vehicle_json."'
                            >
                                <p class='make-model' > ".$vehicle->make." / ".$vehicle->model." / ".$vehicle->colour." </p>
                                <p class='registration' > ".$vehicle->registration." </p>
                            </li>";
                    }
                ?>
            </ul>
        </span>
        <div class="selected-vehicle-outer" style="<?= !isset($vehicle) ? "display: none;" : ""; ?>" >
            <div class="vehicle-name-outer" >
                <span class="vehicle-name" >
                    <p class="make-model-val" ><?= $vehicle->make . "/" . $vehicle->model; ?></p>
                    <span class="change-vehicle" >
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M8 15C11.866 15 15 11.866 15 8C15 4.13401 11.866 1 8 1C4.13401 1 1 4.13401 1 8C1 11.866 4.13401 15 8 15ZM8 16C12.4183 16 16 12.4183 16 8C16 3.58172 12.4183 0 8 0C3.58172 0 0 3.58172 0 8C0 12.4183 3.58172 16 8 16Z" fill="#425466"/>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M4.64645 4.64645C4.84171 4.45118 5.15829 4.45118 5.35355 4.64645L8 7.29289L10.6464 4.64645C10.8417 4.45118 11.1583 4.45118 11.3536 4.64645C11.5488 4.84171 11.5488 5.15829 11.3536 5.35355L8.70711 8L11.3536 10.6464C11.5488 10.8417 11.5488 11.1583 11.3536 11.3536C11.1583 11.5488 10.8417 11.5488 10.6464 11.3536L8 8.70711L5.35355 11.3536C5.15829 11.5488 4.84171 11.5488 4.64645 11.3536C4.45118 11.1583 4.45118 10.8417 4.64645 10.6464L7.29289 8L4.64645 5.35355C4.45118 5.15829 4.45118 4.84171 4.64645 4.64645Z" fill="#425466"/>
                        </svg>
                    </span>
                </span>
                <span class="add-new-vehicle" >
                    <span class="small-add-icon" ></span>
                    Add new vehicle
                </span>
            </div>
            <div class="vehicle-details" >
                <span>
                    <p>Details</p>
                    <p class="mileage-val" ><?= isset($vehicle->mileage) ? $vehicle->mileage : ""; ?></p>
                    <p class="vin-val" ><?= isset($vehicle->VIN) ? $vehicle->VIN : ""; ?></p>
                    <p class="registration-val" ><?= isset($vehicle->registration) ? $vehicle->registration : ""; ?></p>
                </span>
                <span class="vehicle-make-model" >
                    <p>Make/Model</p>
                    <p class="make-model-val" ><?= isset($vehicle->make) ? $vehicle->make . "/" . $vehicle->model . "/" . $vehicle->colour : ""; ?></p>
                </span>
            </div>
        </div>
    </div>
    
    <!-- //Hidden fields -->
    <input type="hidden" name="vehicle-registration" value="<?= isset($vehicle->registration) ? $vehicle->registration : ""; ?>" >
    <input type="hidden" name="vehicle-vin" value="<?= isset($vehicle->VIN) ? $vehicle->VIN : ""; ?>" >
    <input type="hidden" name="vehicle-data" value="<?=  isset($vehicle_json) ? $vehicle_json : ""; ?>" >

</div>
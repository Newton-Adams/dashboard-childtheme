<?php $status = isset($status) ? ucwords($status) : "Draft"; ?>
<div class="select-wrapper job-status" >
    <div class="selected" > 
        <label>Status</label> 
        <span class="control-status value" ><?= $status; ?></span> 
    </div>
    <div class="options" >
        <?php
        if(isset( $status_options )) {
            foreach ($status_options as $key => $option) {
                echo "<span data-value=".$key." >".$option."</span>";
            }
        } 
        ?>
    </div>
</div> 
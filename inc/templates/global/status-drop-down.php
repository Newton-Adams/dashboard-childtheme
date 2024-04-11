<div class="select-wrapper job-status" >
    <p class="selected" > Status <div class="control-status" >Draft</div> </p>
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
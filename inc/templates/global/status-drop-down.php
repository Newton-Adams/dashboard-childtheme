<div class="select-wrapper job-status" >
    <p class="selected" > Status <div class="value" >All</div> </p>
    <div class="options" >
        <?php
        echo "<span data-value='' >All</span>";
        if(isset( $status_options )) {
            foreach ($status_options as $key => $option) {
                echo "<span data-value=".$option." >".$key."</span>";
            }
        } 
        ?>
    </div>
</div>
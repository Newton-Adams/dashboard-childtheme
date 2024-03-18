<div class="select-wrapper date-range" >
    <p class="selected" >Date Range <div class="value" >All</div></p>
    <div class="options" >
        <?php
        echo "<span data-value='0' >All</span>"; 
        foreach ($date_options as $key => $option) {
            echo "<span data-value=".$option." >".$key."</span>";
        }
        ?>
    </div>
</div>
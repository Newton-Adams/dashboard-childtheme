<div class="select-wrapper date-range" >
    <div class="selected" >
        <label>Date Range</label> 
        <span class="value" >All</span>
    </div>
    <div class="options" >
        <?php
        echo "<span data-value='0' >All</span>"; 
        foreach ($date_options as $key => $option) {
            echo "<span data-value=".$option." >".$key."</span>";
        }
        ?>
    </div>
</div> 
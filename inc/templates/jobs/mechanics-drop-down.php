<div class="select-wrapper mechanics" >
    <div class="selected" > 
        <label>Assign staff members:</label> 
        <?php 
            echo isset($mechanics) ? '<span class="value" >'.$mechanics.'</span> ' : '<span class="value" >No staff selected</span>';
        ?>
        
    </div>
    <div class="options" >
        <?php
        if(isset( $mechanic_options )) {
            foreach ($mechanic_options as $key => $option) {
                echo "<span><span data-value=".$key." >".$option[0]->{"name-0"}."</span></span>";
            }
        } 
        ?>
    </div>
    <input type="hidden" id="selected-mechanics" name="selected-mechanics" value="Brittney" >
</div> 
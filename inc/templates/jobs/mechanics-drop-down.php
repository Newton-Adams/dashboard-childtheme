<span class="select-wrapper-outer" >
    <div class="assigned-mechanics-outer">
        <p>Assign staff members</p>
        <?php 
            if(isset($mechanics_decoded)) {
                echo '<span class="assigned-mechanics" >';
                    foreach ($mechanics_decoded as $key => $mechanic) {
                        echo "<span class='mechanic-inner'>
                                    <span class='mechanic' data-mechanic=".$mechanic." >
                                        ".$mechanic."
                                        <span class='close'></span>
                                    </span>
                                </span>";
                    }
                echo '</span>';
            } else {
                echo '<span class="assigned-mechanics" ></span>';
            }
        ?>
    </div>
    <div class="select-wrapper mechanics" >
        <div class="selected" > 
            <span>
                <span class="value" >Select staff</span>
            </span>
        </div>
        <div class="options" >
            <?php
            if(isset( $mechanic_options )) {
                foreach ($mechanic_options as $key => $option) {
                    if(isset($mechanics_decoded)) {
                        $style = in_array( $option[0]->{"name-0"},$mechanics_decoded ) ? 'display:none;' : '';
                    } else {
                        $style = '';
                    }
                        echo "<span class='mechanic-outer' data-mechanic=".$option[0]->{"name-0"}." style=".$style." >
                                <span class='mechanic-inner'>
                                    <span class='mechanic' data-mechanic=".$option[0]->{"name-0"}." >
                                        ".$option[0]->{"name-0"}."
                                        <span class='close'></span>
                                    </span>
                                 </span>
                              </span>";
                 
                }
            } 
            ?>
        </div>
        <input type="hidden" id="selected-mechanics" name="selected-mechanics" value='<?= isset($mechanics) ? $mechanics : ''; ?>' >
    </div> 
</span>
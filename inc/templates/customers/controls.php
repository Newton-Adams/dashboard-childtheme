<?php 
echo'<form class="control-fields" >
        <div class="form-row" >';
            include( get_stylesheet_directory() . "/inc/templates/customers/customer-card-number.php"); 
            echo isset($Controls["change_warning"]) ? '<input type="checkbox" class="content-changed" name="content-changed" style="visibility: collapse;" >' : '';
            echo isset($Controls["save"]) ? '<button id="save-post" class="customer-save" >Save</button>' : '';
            echo isset($Controls["send"]) ? '<button class="outline" >print</button>' : '';
    echo '</div>
</form>';
?>
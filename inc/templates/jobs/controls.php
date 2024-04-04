<?php 
echo'
    <form class="control-fields" >
        <div class="form-row" >
            <h3>New job</h3>';
            isset($Controls["status"]) ? include( get_stylesheet_directory() . "/inc/templates/global/status-drop-down.php") : '';
            echo isset($Controls["save"]) ? '<button id="save-post" class="job-save" >Save</button>' : '';
            echo isset($Controls["status"]) ? '<p>Status</p>' : '';
            echo isset($Controls["send"]) ? '<button>Send</button>' : '';
            echo isset($Controls["change_warning"]) ? '<input type="checkbox" class="name-changed" name="content-changed" >' : '';
   echo '</div>
    </form>';
?>
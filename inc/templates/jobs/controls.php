<?php 
$status_text = isset($status) ? ucwords($status) : 'Draft';
echo'
    <form class="control-fields" >
        <div class="form-row" >';
            isset($Controls["job_number"]) ? include( get_stylesheet_directory() . "/inc/templates/jobs/job-number.php") : '';
            isset($Controls["status"]) ? include( get_stylesheet_directory() . "/inc/templates/jobs/status-drop-down.php") : '';
            echo isset($Controls["change_warning"]) ? '<input type="checkbox" class="content-changed" name="content-changed" style="visibility: collapse;" >' : '';
            echo isset($Controls["save"]) ? '<button id="save-post" class="job-save outline" >Save</button>' : '';
            echo isset($Controls["send"]) ? '<button>Send</button>' : '';
     echo '</div>
    </form>';
?>
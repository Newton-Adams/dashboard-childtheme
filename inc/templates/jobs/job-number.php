<?php
//If editing, get existing title else create new job number
if($job_edit_id) {
    $job_number = get_the_title($job_edit_id);
} else {    
    switch (true) {
        case strlen($job_count) < 2:
            $job_number = '0000' . $job_count;  
            break;    
        case strlen($job_count) < 3:
            $job_number = '000' . $job_count;  
            break;    
        case strlen($job_count) < 4:
            $job_number = '00' . $job_count; 
            break;
        case strlen($job_count) < 5:
            $job_number = '0' . $job_count; 
            break;    
        default:
            $job_number = $job_count; 
            break;
    }
}
?>

<div class="job-number-outer" >
    <div class="job-number-wrapper" >
        <h3>Job Number: wp-<?php echo $job_number; ?></h3>
    </div>
    <input id="job-number" type="hidden" value="<?php echo $job_number; ?>" >
    <input id="job-status" type="hidden" value="<?php echo isset($status) ? ucwords($status) : 'draft'; ?>" >
</div>
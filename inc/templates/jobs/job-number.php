<?php
$job_count = wp_count_posts( 'jobs' )->publish; 
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

?>

<div class="job-number-outer" >
    <div class="job-number-wrapper" >
        <p>Job Number </p><input id="job-number" type="text" value="WP-<?php echo $job_number; ?>" >
    </div>
</div>
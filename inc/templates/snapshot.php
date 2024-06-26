<?php 

$loggedInUser = get_current_user_id();

// Get date from 30 days ago 
$date = new DateTime();
$date->sub(new DateInterval('P30D'));
$thirty_days_ago = $date->format('Y-m-d');


// Fetch all posts by current user
$args = array(
    'post_type' => array('jobs'),
    'numberposts' => -1,
    'author' => $loggedInUser,
    'orderby' => 'date',
    'order' => 'DESC', 
    'date_query' => array(
        array(
            'after' => $thirty_days_ago,
            'inclusive' => true,
        ),
    ),
);

$posts = get_posts($args);

$drafts = 0;
$quote_sent = 0;
$quote_accepted = 0;
$in_progress = 0;
$awaiting_parts = 0;
$completed = 0;
$awaiting_payment = 0;
$paid_closed = 0;

// Loop through jobs posts
foreach ($posts as $post) {
    if ($post->post_type == 'jobs') {
        $job_status = get_post_meta($post->ID, 'status', true);  
        switch ($job_status) {
            case 'draft':
                $drafts++;
                break;
            case 'quote-sent':
                $quote_sent++;
                break;
            case 'quote-accepted':
                $quote_accepted++;
                break;
            case 'in-progress':
                $in_progress++;
                break;
            case 'awaiting-parts':
                $awaiting_parts++;
                break;
            case 'completed':
                $completed++;
                break;
            case 'awaiting-payment':
                $awaiting_payment++;
                break;
            case 'paid-&-closed':
                $paid_closed++;
                break; 
            default:
                break;
        }
    } 
}

$chart_job_total = $in_progress + $completed + $awaiting_parts;

if( $posts ) {
?>

<div class="snapshot-section">
    
    <div class="d-flex flex-align-center justified-between mb-3">
        <h2 class="wp-block-heading card-title mb-0">Your Snapshot</h2>
        <div class="reveal-snapshot-btn active"> 
            <svg width="18" height="19" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg"> 
                <path d="M8.15286 13.1945L2.7571 7.02793C2.12062 6.30052 2.6372 5.16211 3.60375 5.16211H14.3953C15.3618 5.16211 15.8784 6.30052 15.2419 7.02793L9.84616 13.1945C9.39795 13.7068 8.60108 13.7068 8.15286 13.1945Z" fill="#7A7A9D"></path> 
            </svg>
        </div>
    </div>

    <div class="snapshot-items">
        <div class="wp-block-columns is-layout-flex wp-container-core-columns-layout-1 wp-block-columns-is-layout-flex">

            <div class="wp-block-column is-layout-flow wp-block-column-is-layout-flow" style="flex-basis:25%">

                <div class="card">

                    <h5 class="wp-block-heading">Workshop Chart</h5>

                    <div class="text-center mb-1">
                        <canvas id="workshopChart" width="111px" height="111px" ></canvas>
                    </div>

                    <div class="wp-block-columns is-not-stacked-on-mobile is-layout-flex wp-container-core-columns-layout-1 wp-block-columns-is-layout-flex mb-0">

                        <div class="wp-block-column is-layout-flow wp-block-column-is-layout-flow">
                            <div class="d-flex flex-align-center active">
                                <div class="pie-chart-key" style="background-color: var(--active)"></div>
                                <div class="extra-small-text">
                                    <span class="chart-value"><?php echo round($in_progress / $chart_job_total * 100); ?> </span>%
                                </div>
                            </div>
                            <div class="caption">Active</div>
                        </div>

                        <div class="wp-block-column is-layout-flow wp-block-column-is-layout-flow">
                            <div class="d-flex flex-align-center complete">
                                <div class="pie-chart-key" style="background-color: var(--complete)"></div>
                                <div class="extra-small-text">
                                    <span class="chart-value"><?php echo round($completed / $chart_job_total * 100); ?> </span>%
                                </div>
                            </div>
                            <div class="caption">Complete</div>
                        </div>

                        <div class="wp-block-column is-layout-flow wp-block-column-is-layout-flow">
                            <div class="d-flex flex-align-center awaiting">
                                <div class="pie-chart-key" style="background-color: var(--awaiting)"></div>
                                <div class="extra-small-text">
                                    <span class="chart-value"><?php echo round($awaiting_parts / $chart_job_total * 100); ?> </span>%
                                </div>
                            </div>
                            <div class="caption">Waiting</div>
                        </div>

                    </div> 

                </div>
            </div>

            <div class="wp-block-column is-layout-flow wp-block-column-is-layout-flow" style="flex-basis:25%">

                <div class="card active">
                    <div class="d-flex">
                        <div class="card-icon">
                            <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M15.6163 3.58961C15.8636 3.78881 15.9595 4.12365 15.8543 4.42395C15.7492 4.72426 15.4666 4.9252 15.1495 4.9252C12.6524 4.9252 10.8878 5.81921 9.74627 6.70325L8.2119 8.27125V9.97787C8.2119 10.1764 8.13348 10.3668 7.99384 10.5074L6.07266 12.4416C5.93248 12.5827 5.74212 12.6621 5.54359 12.6621C5.34506 12.6621 5.1547 12.5827 5.01452 12.4416L1.17216 8.57322C0.881418 8.28051 0.881415 7.80683 1.17215 7.51411L3.09333 5.57986C3.23352 5.43872 3.42389 5.3594 3.62243 5.35941L5.19876 5.35945C7.68609 2.50381 10.2422 1.9539 12.2467 2.22296C13.2534 2.3581 14.0867 2.69469 14.6665 2.99487C14.9575 3.14554 15.1882 3.28887 15.349 3.39683L15.6163 3.58961Z" fill="white"/>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M9.93829 5.91234C10.1428 5.91747 10.3364 6.0066 10.4736 6.15893L24.1407 19.1286C24.4078 19.425 24.3965 19.8795 24.115 20.1621L21.8736 22.4121C21.7198 22.5665 21.5067 22.6459 21.2898 22.6297C21.0729 22.6135 20.8738 22.5032 20.7445 22.3276L7.82455 8.6079C7.60473 8.30936 7.63557 7.89429 7.89708 7.63178L9.39133 6.13178C9.53602 5.98653 9.73372 5.90721 9.93829 5.91234Z" fill="white"/>
                            </svg> 
                        </div>
                        <div class="card-text"> 
                            <div class="d-flex flex-wrap justified-between">
                                <div class="label">
                                    <h6 class="wp-block-heading card-heading">Active Jobs</h6>
                                    <h5><?php echo $in_progress; ?></h5>
                                </div>
                                <p class="mb-0 extra-small-text">Past 30 Days</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card drafts">
                    <div class="d-flex">
                        <div class="card-icon">
                            <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_4638_36976)">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M6.07725 2.91211H4.36954C2.48324 2.91211 0.954102 4.25525 0.954102 5.91211V21.6621C0.954102 23.319 2.48324 24.6621 4.36954 24.6621H21.4467C23.333 24.6621 24.8621 23.319 24.8621 21.6621V5.91211C24.8621 4.25525 23.333 2.91211 21.4467 2.91211H19.739V4.41211H21.4467C22.3899 4.41211 23.1544 5.08368 23.1544 5.91211V21.6621C23.1544 22.4905 22.3899 23.1621 21.4467 23.1621H4.36954C3.42639 23.1621 2.66182 22.4905 2.66182 21.6621V5.91211C2.66182 5.08368 3.42639 4.41211 4.36954 4.41211H6.07725V2.91211Z" fill="white"/>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M15.4697 2.16211H10.3465C9.87497 2.16211 9.49269 2.4979 9.49269 2.91211V4.41211C9.49269 4.82632 9.87497 5.16211 10.3465 5.16211H15.4697C15.9413 5.16211 16.3236 4.82632 16.3236 4.41211V2.91211C16.3236 2.4979 15.9413 2.16211 15.4697 2.16211ZM10.3465 0.662109C8.93183 0.662109 7.78497 1.66947 7.78497 2.91211V4.41211C7.78497 5.65475 8.93183 6.66211 10.3465 6.66211H15.4697C16.8844 6.66211 18.0313 5.65475 18.0313 4.41211V2.91211C18.0313 1.66947 16.8844 0.662109 15.4697 0.662109H10.3465Z" fill="white"/>
                                </g>
                                <defs>
                                <clipPath id="clip0_4638_36976">
                                <rect width="23.908" height="24" fill="white" transform="translate(0.954102 0.662109)"/>
                                </clipPath>
                                </defs>
                            </svg> 
                        </div>
                        <div class="card-text"> 
                            <div class="d-flex flex-wrap justified-between">
                                <div class="label">
                                    <h6 class="wp-block-heading card-heading">Drafts</h6>
                                    <h5><?php echo $drafts; ?></h5>
                                </div>
                                <p class="mb-0 extra-small-text">Past 30 Days</p>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>

            <div class="wp-block-column is-layout-flow wp-block-column-is-layout-flow" style="flex-basis:25%">


                <div class="card awaiting-parts">
                    <div class="d-flex">
                        <div class="card-icon">
                            <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M3.27539 2.91211C3.27539 2.4979 3.60989 2.16211 4.02252 2.16211H20.4593C20.8719 2.16211 21.2064 2.4979 21.2064 2.91211C21.2064 3.32632 20.8719 3.66211 20.4593 3.66211H18.965V5.16211C18.965 7.84727 17.4031 10.1647 15.1449 11.2517C14.7117 11.4602 14.4823 11.8174 14.4823 12.1359V13.1884C14.4823 13.5069 14.7117 13.8641 15.1449 14.0726C17.4031 15.1595 18.965 17.477 18.965 20.1621V21.6621L20.4593 21.6621C20.8719 21.6621 21.2064 21.9979 21.2064 22.4121C21.2064 22.8263 20.8719 23.1621 20.4593 23.1621L4.02252 23.1621C3.60989 23.1621 3.27539 22.8264 3.27539 22.4121C3.27539 21.9979 3.60989 21.6621 4.02252 21.6621H5.51677V20.1621C5.51677 17.477 7.07868 15.1595 9.3369 14.0726C9.77009 13.8641 9.99953 13.5069 9.99953 13.1884V12.1359C9.99953 11.8174 9.77009 11.4602 9.3369 11.2517C7.07868 10.1647 5.51677 7.84727 5.51677 5.16211V3.66211H4.02252C3.60989 3.66211 3.27539 3.32632 3.27539 2.91211ZM7.01102 3.66211V5.16211C7.01102 7.24857 8.22344 9.05223 9.98295 9.89914C10.7793 10.2825 11.4938 11.0856 11.4938 12.1359V13.1884C11.4938 13.1884 11.7627 13.4121 12.2409 13.4121C12.7191 13.4121 12.988 13.1884 12.988 13.1884V12.1359C12.988 11.0856 13.7025 10.2825 14.4989 9.89914C16.2584 9.05223 17.4708 7.24857 17.4708 5.16211V3.66211H7.01102Z" fill="white"/>
                            </svg> 
                        </div>
                        <div class="card-text"> 
                            <div class="d-flex flex-wrap justified-between">
                                <div class="label">
                                    <h6 class="wp-block-heading card-heading">Awaiting Parts</h6>
                                    <h5><?php echo  $awaiting_parts; ?></h5>
                                </div>
                                <p class="mb-0 extra-small-text">Past 30 Days</p>
                            </div>
                        </div>
                    </div>
                </div>
                

                <div class="card invoice">
                    <div class="d-flex">
                        <div class="card-icon">
                            <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M3.15583 1.4218C3.39288 1.38319 3.63398 1.46132 3.8038 1.63179L4.76976 2.60146L5.73571 1.63179C6.02748 1.3389 6.50054 1.3389 6.79231 1.63179L7.75826 2.60146L8.72422 1.63179C9.01599 1.3389 9.48904 1.3389 9.78081 1.63179L10.7468 2.60146L11.7127 1.63179C12.0045 1.3389 12.4775 1.3389 12.7693 1.63179L13.7353 2.60146L14.7012 1.63179C14.993 1.3389 15.466 1.3389 15.7578 1.63179L16.7238 2.60146L17.6897 1.63179C17.9815 1.3389 18.4546 1.3389 18.7463 1.63179L19.7123 2.60146L20.6782 1.63179C20.8481 1.46132 21.0892 1.38319 21.3262 1.4218C21.5633 1.46042 21.7674 1.61108 21.8748 1.82671L22.6219 3.32671C22.6738 3.43085 22.7008 3.54568 22.7008 3.66212V21.6621C22.7008 21.7786 22.6738 21.8934 22.6219 21.9975L21.8748 23.4975C21.7674 23.7132 21.5633 23.8638 21.3262 23.9024C21.0892 23.941 20.8481 23.8629 20.6782 23.6924L19.7123 22.7228L18.7463 23.6924C18.4546 23.9853 17.9815 23.9853 17.6897 23.6924L16.7238 22.7228L15.7578 23.6924C15.466 23.9853 14.993 23.9853 14.7012 23.6924L13.7353 22.7228L12.7693 23.6924C12.4775 23.9853 12.0045 23.9853 11.7127 23.6924L10.7468 22.7228L9.78081 23.6924C9.48904 23.9853 9.01599 23.9853 8.72422 23.6924L7.75826 22.7228L6.79231 23.6924C6.50054 23.9853 6.02748 23.9853 5.73571 23.6924L4.76976 22.7228L3.8038 23.6924C3.63398 23.8629 3.39288 23.941 3.15583 23.9024C2.91877 23.8638 2.71465 23.7132 2.60725 23.4975L1.86013 21.9975C1.80825 21.8934 1.78125 21.7786 1.78125 21.6621V3.66212C1.78125 3.54568 1.80825 3.43085 1.86013 3.32671L2.60725 1.82671C2.71465 1.61108 2.91877 1.46042 3.15583 1.4218ZM3.48018 3.42824L3.2755 3.83917V21.4851L3.48018 21.896L4.24146 21.1318C4.53323 20.8389 5.00628 20.8389 5.29805 21.1318L6.26401 22.1015L7.22996 21.1318C7.52173 20.8389 7.99479 20.8389 8.28656 21.1318L9.25251 22.1015L10.2185 21.1318C10.5102 20.8389 10.9833 20.8389 11.2751 21.1318L12.241 22.1015L13.207 21.1318C13.4987 20.8389 13.9718 20.8389 14.2636 21.1318L15.2295 22.1015L16.1955 21.1318C16.4872 20.8389 16.9603 20.8389 17.2521 21.1318L18.218 22.1015L19.184 21.1318C19.4758 20.8389 19.9488 20.8389 20.2406 21.1318L21.0019 21.896L21.2065 21.4851V3.83917L21.0019 3.42824L20.2406 4.19245C19.9488 4.48534 19.4758 4.48534 19.184 4.19245L18.218 3.22278L17.2521 4.19245C16.9603 4.48534 16.4872 4.48534 16.1955 4.19245L15.2295 3.22278L14.2636 4.19245C13.9718 4.48534 13.4987 4.48534 13.207 4.19245L12.241 3.22278L11.2751 4.19245C10.9833 4.48534 10.5102 4.48534 10.2185 4.19245L9.25251 3.22278L8.28656 4.19245C7.99479 4.48534 7.52173 4.48534 7.22996 4.19245L6.26401 3.22278L5.29805 4.19245C5.00628 4.48534 4.53323 4.48534 4.24146 4.19245L3.48018 3.42824Z" fill="white"/>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M4.76976 7.41212C4.76976 6.99791 5.10425 6.66212 5.51688 6.66212H14.4824C14.895 6.66212 15.2295 6.99791 15.2295 7.41212C15.2295 7.82633 14.895 8.16212 14.4824 8.16212H5.51688C5.10425 8.16212 4.76976 7.82633 4.76976 7.41212ZM4.76976 10.4121C4.76976 9.9979 5.10425 9.66212 5.51688 9.66212H14.4824C14.895 9.66212 15.2295 9.9979 15.2295 10.4121C15.2295 10.8263 14.895 11.1621 14.4824 11.1621H5.51688C5.10425 11.1621 4.76976 10.8263 4.76976 10.4121ZM4.76976 13.4121C4.76976 12.9979 5.10425 12.6621 5.51688 12.6621H14.4824C14.895 12.6621 15.2295 12.9979 15.2295 13.4121C15.2295 13.8263 14.895 14.1621 14.4824 14.1621H5.51688C5.10425 14.1621 4.76976 13.8263 4.76976 13.4121ZM4.76976 16.4121C4.76976 15.9979 5.10425 15.6621 5.51688 15.6621H14.4824C14.895 15.6621 15.2295 15.9979 15.2295 16.4121C15.2295 16.8263 14.895 17.1621 14.4824 17.1621H5.51688C5.10425 17.1621 4.76976 16.8263 4.76976 16.4121Z" fill="white"/>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M16.7238 7.41212C16.7238 6.99791 17.0583 6.66212 17.4709 6.66212H18.9652C19.3778 6.66212 19.7123 6.99791 19.7123 7.41212C19.7123 7.82633 19.3778 8.16212 18.9652 8.16212H17.4709C17.0583 8.16212 16.7238 7.82633 16.7238 7.41212ZM16.7238 10.4121C16.7238 9.9979 17.0583 9.66212 17.4709 9.66212H18.9652C19.3778 9.66212 19.7123 9.9979 19.7123 10.4121C19.7123 10.8263 19.3778 11.1621 18.9652 11.1621H17.4709C17.0583 11.1621 16.7238 10.8263 16.7238 10.4121ZM16.7238 13.4121C16.7238 12.9979 17.0583 12.6621 17.4709 12.6621H18.9652C19.3778 12.6621 19.7123 12.9979 19.7123 13.4121C19.7123 13.8263 19.3778 14.1621 18.9652 14.1621H17.4709C17.0583 14.1621 16.7238 13.8263 16.7238 13.4121ZM16.7238 16.4121C16.7238 15.9979 17.0583 15.6621 17.4709 15.6621H18.9652C19.3778 15.6621 19.7123 15.9979 19.7123 16.4121C19.7123 16.8263 19.3778 17.1621 18.9652 17.1621H17.4709C17.0583 17.1621 16.7238 16.8263 16.7238 16.4121Z" fill="white"/>
                            </svg> 
                        </div>
                        <div class="card-text"> 
                            <div class="d-flex flex-wrap justified-between">
                                <div class="label">
                                    <h6 class="wp-block-heading card-heading">Invoice</h6>
                                    <h5><?php echo $awaiting_payment; ?></h5>
                                </div>
                                <p class="mb-0 extra-small-text">Past 30 Days</p>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>

            <div class="wp-block-column is-layout-flow wp-block-column-is-layout-flow" style="flex-basis:25%">
                

                <div class="card complete">
                    <div class="d-flex">
                        <div class="card-icon">
                            <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M20.3214 6.00382C20.721 6.45943 20.721 7.19812 20.3214 7.65373L12.1365 19.3204C11.7369 19.776 11.0891 19.776 10.6895 19.3204L5.27429 13.1454C4.87474 12.6897 4.87474 11.9511 5.27429 11.4954C5.67384 11.0398 6.32164 11.0398 6.7212 11.4954L11.413 16.8455L18.8745 6.00382C19.274 5.54821 19.9218 5.54821 20.3214 6.00382Z" fill="white"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M18.3334 5.90214C18.9139 5.24877 19.8551 5.24877 20.4357 5.90214C21.0091 6.54751 21.0161 7.58893 20.4568 8.24401L12.5441 19.3761C12.5327 19.3922 12.5205 19.4075 12.5076 19.4221C11.9271 20.0755 10.9858 20.0755 10.4053 19.4221L5.16 13.5185C4.57948 12.8651 4.57948 11.8058 5.16 11.1524C5.74052 10.499 6.68173 10.499 7.26225 11.1524L11.4117 15.8225L18.294 5.95219C18.3062 5.93463 18.3194 5.91792 18.3334 5.90214Z" fill="white"/>
                            </svg> 
                        </div>
                        <div class="card-text"> 
                            <div class="d-flex flex-wrap justified-between">
                                <div class="label">
                                    <h6 class="wp-block-heading card-heading">Complete</h6>
                                    <h5><?php echo $completed; ?></h5>
                                </div>
                                <p class="mb-0 extra-small-text">Past 30 Days</p>
                            </div>
                        </div>
                    </div>
                </div>
                

                <div class="card quotes">
                    <div class="d-flex">
                        <div class="card-icon">
                            <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M14.6211 3.66211H2.62109L1.62109 3.66211C1.62109 3.10982 2.06881 2.66211 2.62109 2.66211H14.6211C15.1734 2.66211 15.6211 3.10982 15.6211 3.66211H14.6211Z" fill="white"/>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M23.0349 8.16211H2.11535V20.1621H23.0349V8.16211ZM2.11535 6.66211C1.29009 6.66211 0.621094 7.33368 0.621094 8.16211V20.1621C0.621094 20.9905 1.29009 21.6621 2.11535 21.6621H23.0349C23.8601 21.6621 24.5291 20.9905 24.5291 20.1621V8.16211C24.5291 7.33368 23.8601 6.66211 23.0349 6.66211H2.11535Z" fill="white"/>
                                <path d="M20.0464 8.16211C20.0464 9.81896 21.3844 11.1621 23.0349 11.1621V8.16211H20.0464Z" fill="white"/>
                                <path d="M5.10385 8.16211C5.10385 9.81896 3.76585 11.1621 2.11535 11.1621V8.16211H5.10385Z" fill="white"/>
                                <path d="M20.0464 20.1621C20.0464 18.5053 21.3844 17.1621 23.0349 17.1621V20.1621H20.0464Z" fill="white"/>
                                <path d="M5.10385 20.1621C5.10385 18.5053 3.76585 17.1621 2.11535 17.1621V20.1621H5.10385Z" fill="white"/>
                                <path d="M15.5636 14.1621C15.5636 15.819 14.2256 17.1621 12.5751 17.1621C10.9246 17.1621 9.58661 15.819 9.58661 14.1621C9.58661 12.5053 10.9246 11.1621 12.5751 11.1621C14.2256 11.1621 15.5636 12.5053 15.5636 14.1621Z" fill="white"/>
                            </svg>  
                        </div>
                        <div class="card-text"> 
                            <div class="d-flex flex-wrap justified-between">
                                <div class="label">
                                    <h6 class="wp-block-heading card-heading">Quotes</h6>
                                    <h5><?php echo $quote_sent; ?></h5>
                                </div>
                                <p class="mb-0 extra-small-text">Past 30 Days</p>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>

        </div> 
    </div>
</div>

<?php 
}
?>
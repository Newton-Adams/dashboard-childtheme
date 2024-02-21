<?php
$customer_count = wp_count_posts( 'customers' )->publish; 
switch (true) {
    case strlen($customer_count) < 2:
        $customer_number = '0000' . $customer_count;  
        break;    
    case strlen($customer_count) < 3:
        $customer_number = '000' . $customer_count;  
        break;    
    case strlen($customer_count) < 4:
        $customer_number = '00' . $customer_count; 
        break;
    case strlen($customer_count) < 5:
        $customer_number = '0' . $customer_count; 
        break;    
    default:
        $customer_number = $customer_count; 
        break;
}

?>

<div class="customer-card-number-outer" >
    <div class="customer-card-number-wrapper" >
        <p>Customer card: WPC-<?= $customer_number; ?></p>
    </div>
</div>
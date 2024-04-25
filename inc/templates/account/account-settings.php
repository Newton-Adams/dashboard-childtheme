<div class="card max-w-750 mx-auto">
    <div class="welcome-section wp-block-columns is-layout-flex wp-container-core-columns-layout-1 wp-block-columns-is-layout-flex">
        <div class="wp-block-column is-layout-flow wp-block-column-is-layout-flow" style="flex-basis:55%">
            <h2 class="wp-block-heading card-title">Password</h2>
            <p class="text-small">Lorem ipsum dolor sit amet consectetur. Dictum leo laoreet pulvinar tristique sagittis.</p>
            <?php 
                echo do_shortcode( '[ultimatemember_password]' ); 
            ?>
            <!-- Ultimate members Password -->
        </div>
        <div class="wp-block-column is-layout-flow wp-block-column-is-layout-flow" style="flex-basis:45%"> 
            <h2 class="wp-block-heading card-title">Rules for passwords</h2>
            <p>To create a new password, you have to meet all of the following requirements:</p>
            <ul> 
                <li>Minimum 8 character</li>
                <li>At least one special character</li>
                <li>At least one number</li>
                <li>Can’t be the same as a previous </li>
            </ul>
        </div>
    </div>
</div>


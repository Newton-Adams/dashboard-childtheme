<div class="account-tabs tab-container">

    <!-- Tab Buttons -->
    <div class="tabs">
        <button class="tab-button" data-tab="profile-tab">Profile</button>
        <button class="tab-button" data-tab="settings-tab">Settings</button>
        <button class="tab-button" data-tab="subscriptions-tab">Subscriptions</button>
        <button class="tab-button" data-tab="messaging-tab">Messaging</button>
        <button class="tab-button" data-tab="staff-tab">Staff</button>
    </div>

    <!-- Tab Content -->
    <div class="tab-content">
        <div id="profile-tab" class="tab-item">
            <?php include( get_stylesheet_directory() . "/inc/templates/account/account-profile.php" ); ?>
        </div>
        <div id="settings-tab" class="tab-item">
            <?php include( get_stylesheet_directory() . "/inc/templates/account/account-settings.php" ); ?>
        </div>
        <div id="subscriptions-tab" class="tab-item">
            <?php include( get_stylesheet_directory() . "/inc/templates/account/account-subscriptions.php" ); ?>
        </div>
        <div id="messaging-tab" class="tab-item">
            <?php include( get_stylesheet_directory() . "/inc/templates/account/account-messaging.php" ); ?>
        </div>
        <div id="staff-tab" class="tab-item">
            <?php include( get_stylesheet_directory() . "/inc/templates/account/account-staff.php" ); ?>
        </div>
    </div>
</div>
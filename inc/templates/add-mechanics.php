<?php
// do_action( 'generate_before_main_content' ); 

?>
<div class="add-staff-outer" >
    <h3>Add staff members</h3>
    <form id="add-staff" >
        <div class="form-row" >
            <div class="input-label-wrapper" >
                <label for="name-0" >Staff member name</label>
                <input type="text" id="name-0" name="name-0" >
            </div>
            <div class="input-label-wrapper" >
                <label for="contact-number-0" >Contact number</label>
                <input type="text" id="contact-number-0" name="contact-number-0" >
            </div>
            <div class="input-label-wrapper" >
                <label for="role-0" >Role</label>
                <input type="text" id="role-0" name="role-0" >
            </div>
        </div>
    </form>
    <div class="add-row-button-outer" >
        <button id="save-post" class="technicians-save" type="button" >
            <span>Add New Technician</span>
        </button>
    </div>
    <div class="forms-container staff-list" >
        <?php 
        //Get existing mechanics
        $existing_mechanics = array();
        !empty(get_user_meta( um_profile_id(),  'mechanics' )) && $existing_mechanics = json_decode(get_user_meta( um_profile_id(),  'mechanics' )[0], true);
        //Mechanics Table
        ?>
        <h3>Staff list</h3>
        <table id="staff-table" class="data-table" >
            <thead>
                <tr>
                    <th>NAME</th>
                    <th>CONTACT</th>
                    <th>ROLE</th>
                    <th>DELETE</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    if(!empty($existing_mechanics)) {
                        // Iterate through each entry in the data array
                        foreach ($existing_mechanics as $mechanic) {
                            // Initialize an empty associative array to store name, contact number, and role
                            $info = [];

                            // Extract name, contact number, and role
                            foreach ($mechanic as $mechanic_detail) {
                                foreach ($mechanic_detail as $key => $value) {
                                    if (strpos($key, 'name-0') !== false) {
                                        $info['name'] = $value;
                                    } elseif (strpos($key, 'contact-number-0') !== false) {
                                        $info['contact-number'] = $value;
                                    } elseif (strpos($key, 'role-0') !== false) {
                                        $info['role'] = $value;
                                    }
                                }
                            }

                            // Create a table row
                            echo '<tr>';
                            echo '<td>' . $info['name'] . '</td>';
                            echo '<td>' . $info['contact-number'] . '</td>';
                            echo '<td>' . $info['role'] . '</td>';
                            echo '<td>'.file_get_contents( get_stylesheet_directory() . "/assets/images/bin.svg" ).'</td>';
                            echo '</tr>';
                        }
                        // foreach ($existing_mechanics as $mechanickey => $mechanic) {
                        // }
                        //     echo '<tr>';
                        //         foreach ($mechanic as $key => $value) {
                        //             if(!empty($value["name-0"])) {
                        //                 echo '<td class="name" >'.$value["name-0"].'</td>';
                        //             }
                        //             if(!empty($value["contact-number-0"])) {
                        //                 echo  '<td class="contact-number" >'.$value["contact-number-0"].'</td>';
                        //             }
                        //             if(!empty($value["role-0"])) {
                        //                 echo '<td class="role" >'.$value["role-0"].'</td>';
                        //             }
                        //         }
                        //         echo '<td>'.file_get_contents( get_stylesheet_directory() . "/assets/images/bin.svg" ).'</td>';
                        //     echo '</tr>';
                        // }
                    }
                ?>                    
            </tbody>
        </table>
    </div>
</div>

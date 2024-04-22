<?php
if(isset($customer_edit_id) && !$customer_edit_id == "") { 
    echo '<h3 class="mb-3" >Customer Jobs</h3>
            </form>
                <div class="datatable-wrapper">
                <table id="customer-jobs-table" class="dt-table">
                    <thead>
                        <tr>
                            <th>Customer</th>
                            <th>Date</th>
                            <th>Job No.</th>
                            <th>Vehicle</th>
                            <th>Registration</th>
                            <th>Status</th>
                            <th>Notes</th>
                            <th>Total</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <body>
                    
                    </body>
                </table>
            </div>';
}
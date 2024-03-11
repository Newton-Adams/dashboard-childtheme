'use strict'
jQuery(document).ready(function ($) {

    //Mechanics Table
    new DataTable('#staff-table', {
        layout: {
            topStart: 'info',
            bottom: 'paging',
            bottomStart: null,
            bottomEnd: null
        }
    });
    
    

    //Delete upload file
    function instantiateJobsTable() {
        $.ajax({
            type: "POST",
            url: workshop_pro_obj.ajaxurl,
            data: {
                'action': 'get_all_jobs',
            },
            success: function (response) {
                const tableData = JSON.parse(response)
                console.log(tableData);
                //Create Table
                new DataTable('#jobs-table', { 
                    ajax: response,
                    layout: { 
                        ordering: true,
                        select: true,
                        topStart: 'info',
                        bottom: 'paging', 
                        bottomStart: null,
                        bottomEnd: null,
                    }
                })
            }
        });
    }
    instantiateJobsTable()

});
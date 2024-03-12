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
              
                //Create Table
                let jobsTable = new DataTable('#jobs-table', { 
                    data: tableData,
                    pageLength: 2,
                    columns: [
                        { data: 'name' },
                        { data: 'date' },
                        { data: 'job_no' },
                        { data: 'vehicle' },
                        { data: 'registration' },
                        { data: 'status' },
                        { data: 'notes' },
                        { data: 'total' },
                        { data: 'actions' },
                    ],
                    layout: { 
                        ordering: true,
                        select: true,
                        topStart: 'info',
                        bottom: 'paging', 
                        bottomStart: null,
                        bottomEnd: null,
                    }
                })

                //Filter Table
                $(document).on('click','.table-filter',function() {
                    const value = $(this).val()
                    filterTable(5,value)
                })
                function filterTable(colNumb,filterValue) { 
                    let row
                    jobsTable
                    .rows()
                    .data()
                    .each(function(ele,index) {
                        const status = ele['status']
                        console.log(ele);
                        console.log(filterValue,status,status.toLowerCase().indexOf(filterValue));
                    })
                    // .filter(function (value, index) {
                    //     if(value.toLowerCase().indexOf(filterValue) > 0) {
                    //         row = jobsTable.row( $(this).closest('tr') )                            
                    //         console.log( $(this)[index],filterValue,value.toLowerCase(),row.child );
                    //         // if (row.child.isShown()) {
                    //         //     row.child.hide();
                    //         // }
                    //     } else {
                    //         console.log( value.indexOf('complete') );
                    //         $(this).closest('tr')
                    //     }
                    // });                           
                }

                //Expand/COllapse Job Extra Info
                $(document).on('click', '#jobs-table tbody tr', function () {
                    const jobID = $(this).text()
                    let tr = $(this)
                    let row = jobsTable.row( tr )
                
                    if (row.child.isShown()) {
                        row.child.hide();
                        tr.removeClass('shown');
                    } else {
                        // Open row.
                        get_job_content(jobID,row)
                        row.child('<span class="loading" >Loading...</span>').show()
                        tr.addClass('shown')
                    }
                   
                });
                
                //Get Job Content Ajax
                function get_job_content(jobID,row) {
                    $.ajax({
                        type: "POST",
                        url: workshop_pro_obj.ajaxurl,
                        data: {
                            'action': 'get_job_content',
                            'job_id': jobID,
                        },
                        success: function (response) {
                            row.child(response)
                        }
                    })
                }

            }
        });
    }
    instantiateJobsTable()    

});
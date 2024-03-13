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
                    pageLength: 7,
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

                //Filter Status
                $(document).on('click','.table-filter',function() {
                    const filterValue = $(this).val()
                    jobsTable.columns(5).search(filterValue).draw()  
                })
                
                //Filter Date
                let order = 'default'
                $(document).on('click','.last-7',function() {
                    const dayCount = 10
                    let validDates = []
                    let currentDate = new Date()
                    for (let i = 0; i < dayCount; i++) {
                        currentDate.setDate(currentDate.getDate()-1)
                        const searchString = currentDate.toLocaleDateString('en-US', {
                            day: '2-digit',
                            month: '2-digit',
                            year: 'numeric'
                        })
                        validDates.push(searchString)                    
                    }
                                        
                    // Assuming you want to retrieve the text from the second column (index 1)
                    let columnData = jobsTable.column(1).nodes();
                    
                    for (let i = 0; i < columnData.length; i++) {
                        const date = $(columnData[i]).text()
                        !validDates.includes(date) && $(columnData[i]).closest('tr').hide()  
                    }

                })

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
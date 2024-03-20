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
                $(document).on('click','.table-filters .job-status span',function() {
                    //Selected option
                    $('.select-wrapper.job-status > .value').text($(this).text())

                    //Selected value
                    const filterValue = $(this).data('value')
                    jobsTable.columns(5).search(filterValue).draw() 
                    $(this).closest('.select-wrapper').removeClass('active')
                    
                    //Count Rows
                    let allRows = $('#jobs-table tbody > tr:not([style="display: none;"])')
                    let rowCount = 0
                    for (let i = 0; i < allRows.length; i++) {
                        $(allRows[i]).find('.dt-empty').length == 0 && rowCount++
                    }
                
                    countVisibleRows(rowCount)
                })
                
                //Filter Date
                $(document).on('click','.select-wrapper.date-range .options > span',function() {
                    //Selected option
                    $('.select-wrapper.date-range > .value').text($(this).text())

                    //Selected value
                    const dayCount = $(this).data('value')
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
                                        
                    let columnData = jobsTable.column(1).nodes();
                    
                    for (let i = 0; i < columnData.length; i++) {
                        const date = $(columnData[i]).text()
                        if(!validDates.includes(date) && dayCount > 0) { 
                            $(columnData[i]).closest('tr').hide()
                        } else {
                            $(columnData[i]).closest('tr').show() 
                        }
                    }   

                    //Count Rows
                    const rows = $('#jobs-table tbody tr:not([style="display: none;"]):not(.dt-empty)')
                    let rowCount = rows.length
                    
                    //Close drop down
                    $(this).closest('.select-wrapper').removeClass('active')
                    countVisibleRows(rowCount)
                    
                })

                //Hide/Show Columns
                $(document).on('click','.table-filters .column-states input',function() {
                    const columnNo = $(this).attr('value')
                    let column = jobsTable.column(columnNo);
                
                    // Toggle the visibility
                    column.visible(!column.visible());                    
                })
              
                //Search Tables
                $(document).on('keyup','.table-filters input.search',function() {
                    const searchValue = $(this).val()
                    jobsTable.search(searchValue).draw()
                    //Count Rows
                    let allRows = $('#jobs-table tbody > tr:not([style="display: none;"])')
                    let rowCount = 0
                    for (let i = 0; i < allRows.length; i++) {
                        $(allRows[i]).find('.dt-empty').length == 0 && rowCount++
                    }
                
                    countVisibleRows(rowCount)
                })

                //Expand/Collapse Job Extra Info
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

                //Get visible row count
                function countVisibleRows(rowCount=undefined) {
                    const tableRows = $('#jobs-table tbody tr td').length && rowCount === undefined ? $('#jobs-table tbody tr').length : rowCount 
                    $('#jobs-table_wrapper > .dt-layout-row:last-child').text(`${tableRows} of ${jobsTable.rows().count()} results`)
                }

                //Result Count
                const loadRows = $('#jobs-table tbody tr').length
                $('#jobs-table_wrapper > .dt-layout-row:last-child').prepend(`<p class="row-count" >Showing ${loadRows} of ${jobsTable.rows().count()} results found</p>`)
                countVisibleRows()

            }
        });
    }
    instantiateJobsTable()    

    //Drop down open
    $(document).on('click','.select-wrapper:not(.active)',function() {
        $(this).closest('.select-wrapper').addClass('active')
    })
});

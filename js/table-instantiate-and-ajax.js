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
    
    

    // Jobs Table 
    if($('#jobs-table').length > 0) {

        let jobsToShow = $('body').hasClass('home') ? 5 : 20;

        var jobsTable = $('#jobs-table').DataTable({
            ajax: {
                url: workshop_pro_obj.ajaxurl + '?action=get_all_jobs'
            },
            pageLength: jobsToShow,  
            pagingType: 'simple_numbers',                 
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
                topStart: null,  
                topEnd: null, 
                bottomEnd: {
                    paging: {
                        numbers: 3
                    }
                }
            }, 
            language: {
                paginate: {
                    first: '', 
                    last: '', 
                    next: 'Next', 
                    previous: 'Prev'
                }
            }, 
            order: [1, 'desc'],
            responsive: true, 
            columnDefs: [
                { 
                    responsivePriority: 2, 
                    targets: 0 
                },
                { 
                    responsivePriority: 3, 
                    targets: 1 
                },
                { 
                    responsivePriority: 4, 
                    targets: 2 
                },
                { 
                    responsivePriority: 5, 
                    targets: 3 
                }, 
                { 
                    responsivePriority: 6, 
                    targets: 4 
                }, 
                { 
                    responsivePriority: 7, 
                    targets: 5 
                }, 
                { 
                    responsivePriority: 8, 
                    targets: 6 
                }, 
                { 
                    responsivePriority: 9, 
                    targets: 7 
                }, 
                { 
                    responsivePriority: 1, 
                    targets: 8, 
                    className: 'actions', 
                    "render": function (data, type, row) {
                        let actions = '';
                        actions += '<div class="action-ellipses" data-id="' + row['job_post_id'] + '"><span></span><span></span><span></span></div>';
                        actions += '<ul style="display:none;">';
                        actions += '<li><a href="/workshoppro/job/?edit=' + row['job_post_id'] + '" class="">Edit</a></li>';
                        actions += '<li><a href="#" data-delete-post="' + row['job_post_id'] + '">Delete</a></li>';
                        actions += '<li>Send Quote</li>';
                        actions += '<li>Send Invoice</li>';
                        actions += '</ul>';
                        return actions;
                    },
                },
            ], 
            createdRow: function (row, data, index) {
                $(row).addClass('post-id-'+data.job_post_id);
            }, 
            drawCallback: function(settings) {
                setTimeout(() => {
                    if( settings.aoData.length <= 20 ) {
                        $('.dt-paging').hide();
                    }
                }, 1500);
            }
        });

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
            $('.select-wrapper.date-range .value').text($(this).text())

            //Selected value
            const dayCount = $(this).data('value')
            let validDates = []
            let currentDate = new Date()
            
            for (let i = 0; i < dayCount; i++) {
                const searchString = currentDate.toLocaleDateString('en-US', {
                    day: '2-digit',
                    month: '2-digit',
                    year: 'numeric'
                })
                validDates.push(searchString)                    
                currentDate.setDate(currentDate.getDate()-1)
            }
                                
            let columnData = jobsTable.column(1).nodes();
            // console.log(validDates);
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
        $(document).on('click', '#jobs-table tbody tr td:not(.actions)', function () {
            const jobID = $(this).closest('tr').find('.action-ellipses').data('id')
            let tr = $(this)
            let row = jobsTable.row( tr )

            $(this).closest('tr').css('background-color',"#f7fafc")
        
            if (row.child.isShown()) {
                row.child.hide();
                tr.removeClass('shown');
                $(this).closest('tr').css('background-color',"#ffffff")
            } else {
                // Open row.
                get_job_content(jobID,row)
                row.child('<span class="loading" >Loading...</span>').show()
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
            $('#jobs-table_wrapper > .dt-layout-row:last-child .row-count .showing').text(tableRows)
        }

        //Result Count
        // const loadRows = $('#jobs-table tbody tr').length
        // $('#jobs-table_wrapper > .dt-layout-row:last-child').prepend(`<p class="row-count" >Showing <span class="showing">${loadRows}</span> of <span class="results" >${jobsTable.rows().count()}</span> results found</p>`)
      
    }
    
    // Vehicle Table 
    if($('#vehicleTable').length > 0) {
        var vehicleTable = $('#vehicleTable').DataTable({
            ajax: {
              url: workshop_pro_obj.ajaxurl + '?action=get_user_vehicles'
            },
            pagingType: 'simple_numbers', 
            columns: [
                { data: 'vehicle_customer' }, 
                { data: 'vehicle_make' }, 
                { data: 'vehicle_model' }, 
                { data: 'vehicle_registration' }, 
                { data: 'vehicle_vin' }, 
                { data: 'actions' }
            ],
            layout: { 
                ordering: true,
                select: true, 
                topStart: null,  
                topEnd: null, 
                bottomEnd: {
                    paging: {
                        numbers: 3
                    }
                }
            }, 
            language: {
                paginate: {
                    first: '', 
                    last: '', 
                    next: 'Next', 
                    previous: 'Prev'
                }
            }, 
            order: [1, 'asc'],
            responsive: true,
            columnDefs: [
                {
                    targets: '_all', 
                    width: "16.666%"
                }, 
                { 
                    responsivePriority: 2, 
                    targets: 0 
                },
                { 
                    responsivePriority: 2, 
                    targets: 1 
                },
                { 
                    responsivePriority: 3, 
                    targets: 2 
                },
                { 
                    responsivePriority: 4, 
                    targets: 3 
                },
                { 
                    responsivePriority: 5, 
                    targets: 4 
                },
                { 
                    responsivePriority: 1, 
                    targets: 5, 
                    className: 'actions', 
                    "render": function (data, type, row) {
                        let actions = '';
                        actions += '<div class="action-ellipses" data-id="' + row['vehicle_post_id'] + '"><span></span><span></span><span></span></div>';
                        actions += '<ul style="display:none;">';
                        actions += '<li><a href="#" data-popup="add-vehicle-popup" class="popup-btn edit-vehicle-action">Edit</a></li>';
                        actions += '<li><a href="#" data-delete-post="' + row['vehicle_post_id'] + '">Delete</a></li>';
                        actions += '<li>Send Quote</li>';
                        actions += '<li>Send Invoice</li>';
                        actions += '</ul>';
                        return actions;
                    },
                },
            ], 
            createdRow: function (row, data, index) {
                $(row).addClass('post-id-'+data.vehicle_post_id);
            }
        });

        //Hide/Show Columns
        $(document).on('click','.table-filters .column-states input',function() {
            const columnNo = $(this).attr('value')
            let column = vehicleTable.column(columnNo);
        
            // Toggle the visibility
            column.visible(!column.visible());                    
        });
    }

    // Customer Table 
    if($('#customerTable').length > 0) {
        var customerTable = $('#customerTable').DataTable({
            ajax: {
                url: workshop_pro_obj.ajaxurl + '?action=get_user_customers'
            },
            pagingType: 'simple_numbers', 
            columns: [
                { data: 'customer_name' }, 
                { data: 'customer_contact' }, 
                { data: 'customer_email' }, 
                { data: 'customer_vehicle' },
                { data: 'customer_address' }, 
                { data: 'actions' }
            ],
            layout: { 
                ordering: true,
                select: true, 
                topStart: null,  
                topEnd: null, 
                bottomEnd: {
                    paging: {
                        numbers: 3
                    }
                }
            }, 
            language: {
                paginate: {
                    first: '', 
                    last: '', 
                    next: 'Next', 
                    previous: 'Prev'
                }
            }, 
            order: [1, 'asc'],
            responsive: true,
            columnDefs: [
                {
                    targets: '_all', 
                    width: "16.666%"
                }, 
                { 
                    responsivePriority: 2, 
                    targets: 0 
                },
                { 
                    responsivePriority: 2, 
                    targets: 1 
                },
                { 
                    responsivePriority: 3, 
                    targets: 2 
                },
                { 
                    responsivePriority: 4, 
                    targets: 3 
                },
                { 
                    responsivePriority: 5, 
                    targets: 4 
                },
                { 
                    responsivePriority: 1, 
                    targets: 5, 
                    className: 'actions', 
                    "render": function (data, type, row) { 
                        console.log(row)
                        let actions = '';
                        actions += '<div class="action-ellipses" data-id="' + row['customer_post_id'] + '"><span></span><span></span><span></span></div>';
                        actions += '<ul style="display:none;">';
                        actions += '<li><a href="#" data-popup="add-customer-popup" class="popup-btn edit-customer-action">Edit</a></li>';
                        actions += '<li><a href="#" data-delete-post="' + row['customer_post_id'] + '">Delete</a></li>';
                        actions += '<li>Send Quote</li>'; 
                        actions += '<li>Send Invoice</li>'; 
                        actions += '</ul>'; 
                        return actions; 
                    }
                }
            ],
            createdRow: function (row, data, index) {
                $(row).addClass('post-id-'+data.customer_post_id);
            }
        });
    }

    //Hide datatable columns
    if($('.column-states').length > 0) {
        let colStateVis = true
        $(document).on('click','.hide-columns',function() {
            if(colStateVis) {
                $(this).closest('.table-filters').find('.column-states').fadeOut() 
                colStateVis = false
            } else {
                $(this).closest('.table-filters').find('.column-states').fadeIn()
                colStateVis = true
            } 
        })
    }

    //Drop down open
    $(document).on('click','.select-wrapper:not(.active)',function(e) {
        $(this).closest('.select-wrapper').addClass('active')
    })
    $(document).on('click','.select-wrapper.active',function(e) {
        $(this).closest('.select-wrapper').removeClass('active')
    })
    // click anywhere then remove active from select-wrapper 
    $(document).on('click',function(e) {
        if(!$(e.target).closest('.select-wrapper').length) {
            $('.select-wrapper').removeClass('active')
        }
    })

    //Actions popup 
    let actionOpen = false
    $(document).on('click','table tbody td.actions',function() {
        if(!actionOpen) {
            $(this).find('ul').fadeIn()
            actionOpen = true
        } else {
            $('table tbody td.actions').find('ul').fadeOut()
            actionOpen = false
        }
    })

});

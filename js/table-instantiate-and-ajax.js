'use strict'
jQuery(document).ready(function ($) {

    //Mechanics Table
    var staffTable = $('#staff-table').DataTable({
        ajax: { 
            url: dashboard_obj.ajaxurl + '?action=get_user_mechanics',
        },
        pagingType: 'simple_numbers', 
        columns: [
            { data: 'mechanic_name' }, 
            { data: 'mechanic_contact_number' }, 
            { data: 'mechanic_role' }, 
            { data: 'delete' }
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
                responsivePriority: 1, 
                targets: 3, 
                className: 'actions text-right', 
                "render": function (data, type, row) {
                    let actions = '<a href="#" class="delete-staff-member"><svg width="14" height="17" viewBox="0 0 14 17" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M4.30769 6.36667C4.60508 6.36667 4.84615 6.60545 4.84615 6.9V13.3C4.84615 13.5946 4.60508 13.8333 4.30769 13.8333C4.01031 13.8333 3.76923 13.5946 3.76923 13.3V6.9C3.76923 6.60545 4.01031 6.36667 4.30769 6.36667Z" fill="#7A7A9D"></path><path d="M7 6.36667C7.29738 6.36667 7.53846 6.60545 7.53846 6.9V13.3C7.53846 13.5946 7.29738 13.8333 7 13.8333C6.70262 13.8333 6.46154 13.5946 6.46154 13.3V6.9C6.46154 6.60545 6.70262 6.36667 7 6.36667Z" fill="#7A7A9D"></path><path d="M10.2308 6.9C10.2308 6.60545 9.98969 6.36667 9.69231 6.36667C9.39492 6.36667 9.15385 6.60545 9.15385 6.9V13.3C9.15385 13.5946 9.39492 13.8333 9.69231 13.8333C9.98969 13.8333 10.2308 13.5946 10.2308 13.3V6.9Z" fill="#7A7A9D"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M14 3.7C14 4.2891 13.5178 4.76667 12.9231 4.76667H12.3846V14.3667C12.3846 15.5449 11.4203 16.5 10.2308 16.5H3.76923C2.57969 16.5 1.61538 15.5449 1.61538 14.3667V4.76667H1.07692C0.482155 4.76667 0 4.2891 0 3.7V2.63333C0 2.04423 0.482155 1.56667 1.07692 1.56667H4.84615C4.84615 0.977563 5.32831 0.5 5.92308 0.5H8.07692C8.67169 0.5 9.15385 0.977563 9.15385 1.56667H12.9231C13.5178 1.56667 14 2.04423 14 2.63333V3.7ZM2.81942 4.76667L2.69231 4.82962V14.3667C2.69231 14.9558 3.17446 15.4333 3.76923 15.4333H10.2308C10.8255 15.4333 11.3077 14.9558 11.3077 14.3667V4.82962L11.1806 4.76667H2.81942ZM1.07692 3.7V2.63333H12.9231V3.7H1.07692Z" fill="#7A7A9D"></path></svg></a>';
                    return actions;
                },
            },
        ], 
        createdRow: function (row, data, index) {
        }, 
        drawCallback: function(settings) {
            setTimeout(() => {
                if( settings.aoData.length <= settings._iDisplayLength ) {
                    $('.dt-paging').hide();
                }
            }, 1000);
        }
    });

    // Jobs Table 
    if($('#jobs-table').length > 0) {
        
        let isHomeDashboard = $('body').hasClass('home') ? true : false;
        let pageLength = isHomeDashboard ? 5 : 20;

        var jobsTable = $('#jobs-table').DataTable({
            ajax: {
                url: dashboard_obj.ajaxurl + '?action=get_all_jobs'
            },
            pageLength: pageLength,  
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
            order: [1, 'desc'],
            layout: { 
                ordering: true,
                select: true, 
                topStart: null,  
                topEnd: null, 
                bottomEnd: isHomeDashboard ? null : {
                    paging: {
                        numbers: 3
                    }
                }
            }, 
            language: {
                info: isHomeDashboard ? '<div class="text-right"><a class="view-btn" href="jobs/">View all</a></div>' : "Showing _START_ to _END_ of _TOTAL_ results found", 
                paginate: {
                    first: '', 
                    last: '', 
                    next: 'Next', 
                    previous: 'Prev'
                }
            }, 
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
                        actions += '<div class="d-flex flex-align-center justified-end">';
                        actions += '<a href="/workshoppro/jobs/add-job?edit=' + row['job_post_id'] + '" class="edit-customer-action mt-1 mr-2">Edit</a>';
                        actions += '<div class="action-wrap">';
                        actions += '<div class="action-btn" data-id="' + row['job_post_id'] + '"><span></span><span></span><span></span></div>';
                        actions += '<ul style="display:none;">';
                        actions += '<li><a href="#" data-delete-post="' + row['job_post_id'] + '">Delete</a></li>';
                        // actions += '<li><a href="#">Send Quote</a></li>'; 
                        // actions += '<li><a href="#">Send Invoice</a></li>'; 
                        actions += '</ul>'; 
                        actions += '</div>';
                        actions += '</div>';
                        return actions;
                    },
                },
            ], 
            createdRow: function (row, data, index) {
                $(row).addClass('post-id-'+data.job_post_id);
            }, 
            drawCallback: function(settings) {
                setTimeout(() => {
                    if( settings.aoData.length <= settings._iDisplayLength ) {
                        $('.dt-paging').hide();
                    }
                }, 1000);
            }
        });

        // Filter Status
        $(document).on('click','.table-filters .job-status span',function() {
            //Selected option
            $('.select-wrapper.job-status > .value').text($(this).text())

            //Selected value
            const filterValue =  $(this).data('value') !== "all" ? $(this).data('value') : ""
            // console.log(filterValue);
            jobsTable.columns(5).search(filterValue).draw() 
            // $(this).closest('.select-wrapper').removeClass('active')
            
            //Count Rows
            let allRows = $('#jobs-table tbody > tr:not([style="display: none;"])')
            let rowCount = 0
            for (let i = 0; i < allRows.length; i++) {
                $(allRows[i]).find('.dt-empty').length == 0 && rowCount++
            }
        
            countVisibleRows(rowCount)
        })

        $('.select-wrapper.date-range .options > span').on('click', function() {
            
            //Selected option
            $('.select-wrapper.date-range .selected > .value').text( $(this).text() ).addClass('selected-active')

            var value = $(this).data('value');
            filterByDateRange(value);

        });

        // Custom filtering function
        function parseDate(dateStr) {
            // Parse date in "d/m/Y" format
            var dateParts = dateStr.split('/');
            if (dateParts.length === 3) {
                // Create a new Date object with (year, month (0-based), day)
                return new Date(dateParts[2], dateParts[1] - 1, dateParts[0]);
            }
            // If the date is invalid, return an Invalid Date object
            return new Date(dateStr);
        }

        function filterByDateRange(days) {
            $.fn.dataTable.ext.search.push(function(settings, data, dataIndex) {
                var dateStr = data[1]; // Assuming the date is in the second column
                // console.log('Row Date:', dateStr); // Log the date string
                var date = parseDate(dateStr);
                // console.log('Parsed Date:', date); // Log the parsed date
                if (isNaN(date.getTime())) {
                    // console.error('Invalid Date:', dateStr);
                    return false; // Skip invalid dates
                }

                var now = new Date();
                var diff = (now - date) / (1000 * 60 * 60 * 24); // Difference in days
                // console.log('Date Difference:', diff); // Log the date difference

                if (days == 0) {
                    return true;
                } else {
                    return diff <= days;
                }
            });

            jobsTable.draw();
            $.fn.dataTable.ext.search.pop();
        }

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
            // let allRows = $('#jobs-table tbody > tr:not([style="display: none;"])')
            // let rowCount = 0
            // for (let i = 0; i < allRows.length; i++) {
            //     $(allRows[i]).find('.dt-empty').length == 0 && rowCount++
            // }
        
            // countVisibleRows(rowCount)
        }) 

        //Expand/Collapse Job Extra Info
        $(document).on('click', '#jobs-table tbody tr td:not(.actions):not([colspan="9"])', function () {
            const jobID = $(this).closest('tr').find('.action-btn').data('id')
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
                url: dashboard_obj.ajaxurl,
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
            console.log(rowCount);
            const tableRows = $('#jobs-table tbody tr td').length && rowCount === undefined ? $('#jobs-table tbody tr').length : rowCount 
            $('#jobs-table_wrapper > .dt-layout-row:last-child .row-count .showing').text(tableRows)
        }

    }
    
     // Jobs Table 
     if($('#customer-jobs-table').length > 0) {
        let customerID = $('input#customer-post-id').val().length > 0 ? $('input#customer-post-id').val() : ""
      
        var jobsTable = $('#customer-jobs-table').DataTable({
            ajax: {
                url: dashboard_obj.ajaxurl + '?action=get_customer_jobs',
                data: {
                    'customer-id': customerID,
                }
            },
            pageLength: 7,  
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
            order: [0, 'desc'],
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
                        actions += '<div class="d-flex flex-align-center justified-end">';
                        actions += '<a href="/workshoppro/jobs/add-job?edit=' + row['job_post_id'] + '" class="edit-customer-action mr-2">Edit</a>';
                        actions += '<a href="#" data-delete-post="' + row['job_post_id'] + '">Delete</a>';
                        actions += '</div>';
                        return actions;
                    },
                },
            ], 
            createdRow: function (row, data, index) {
                console.log(data);
                $(row).addClass('post-id-'+data.job_post_id);
            }, 
            drawCallback: function(settings) {
                setTimeout(() => {
                    if( settings.aoData.length <= 20 ) {
                        $('.dt-paging').hide();
                    }
                }, 1000);
            }
        })
     };

    // Vehicle Table 
    if($('#vehicleTable').length > 0) {
        var vehicleTable = $('#vehicleTable').DataTable({
            ajax: {
              url: dashboard_obj.ajaxurl + '?action=get_user_vehicles'
            },
            pagingType: 'simple_numbers', 
            columns: [
                { data: 'customer' }, 
                { data: 'make' }, 
                { data: 'model' }, 
                { data: 'registration' }, 
                { data: 'vin' }, 
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
            order: [0, 'asc'],
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
                        actions += '<div class="d-flex flex-align-center justified-end">';
                        actions += '<a href="#" data-popup="add-vehicle-popup" class="popup-btn edit-vehicle-action mt-1 mr-2">Edit</a>';
                        actions += '<div class="action-wrap">';
                        actions += '<div class="action-btn" data-id="' + row['vehicle_post_id'] + '"><span></span><span></span><span></span></div>';
                        actions += '<ul style="display:none;">';
                        actions += '<li><a href="#" data-delete-post="' + row['vehicle_post_id'] + '" data-delete-vehicle="' + row['vehicle_post_id'] + '">Delete</a></li>';
                        actions += '</ul>'; 
                        actions += '</div>';
                        actions += '</div>';
                        return actions;
                    },
                },
            ], 
            createdRow: function (row, data, index) {
                console.log(data,row)
                $(row).addClass('post-id-'+data['vehicle_post_id']);
            }, 
            drawCallback: function(settings) {
                setTimeout(() => {
                    if( settings.aoData.length <= settings._iDisplayLength ) {
                        $('.dt-paging').hide();
                    }
                }, 1000);
            }
        });

        //Hide/Show Columns
        $(document).on('click','.table-filters .column-states input',function() {
            const columnNo = $(this).attr('value')
            let column = vehicleTable.column(columnNo);
        
            // Toggle the visibility
            column.visible(!column.visible());                    
        });

        // Customer Search Tables
        $(document).on('keyup','.table-filters input.search',function() {
            const searchValue = $(this).val()
            vehicleTable.search(searchValue).draw()
            //Count Rows
            let allRows = $('#jobs-table tbody > tr:not([style="display: none;"])')
            let rowCount = 0
            for (let i = 0; i < allRows.length; i++) {
                $(allRows[i]).find('.dt-empty').length == 0 && rowCount++
            }
        
            countVisibleRows(rowCount)
        })
    }

    // Customer Table 
    if($('#customerTable').length > 0) {
        var customerTable = $('#customerTable').DataTable({
            ajax: {
                url: dashboard_obj.ajaxurl + '?action=get_user_customers'
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
                ordering: false,
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
            responsive: true,
            order: [0, 'asc'],
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
                        actions += '<div class="d-flex flex-align-center justified-end">';
                        actions += '<a href=/workshoppro/customers/add-customer/?edit=' + row['customer_post_id'] + ' class="edit-customer-action mt-1 mr-2">Edit</a>';
                        actions += '<div class="action-wrap">';
                        actions += '<div class="action-btn" data-id="' + row['customer_post_id'] + '"><span></span><span></span><span></span></div>';
                        actions += '<ul style="display:none;">';
                        actions += '<li><a href="#" data-delete-post="' + row['customer_post_id'] + '">Delete</a></li>';
                        actions += '</ul>'; 
                        actions += '</div>';
                        actions += '</div>';
                        return actions; 
                    }
                }
            ],
            createdRow: function (row, data, index) {
                console.log(data);
                $(row).addClass('post-id-'+data.customer_post_id);
            }, 
            drawCallback: function(settings) {
                if(settings.aoData.length) {
                    if( settings.aoData.length <= settings._iDisplayLength ) {
                        $('.dt-paging').hide();
                    }
                }
            }
        }); 
        //Hide/Show Columns 
        $(document).on('click','.table-filters .column-states input',function() { 
            const columnNo = $(this).attr('value') 
            let column = customerTable.column(columnNo); 
            // Toggle the visibility 
            column.visible(!column.visible()); 
        });

        // Customer Search Tables
        $(document).on('keyup','.table-filters input.search',function() {
            const searchValue = $(this).val()
            customerTable.search(searchValue).draw()
            //Count Rows
            let allRows = $('#jobs-table tbody > tr:not([style="display: none;"])')
            let rowCount = 0
            for (let i = 0; i < allRows.length; i++) {
                $(allRows[i]).find('.dt-empty').length == 0 && rowCount++
            }
        
            countVisibleRows(rowCount)
        })
    }

    // Customer Vehicle Table 
    if($('#customerVehicleTable').length > 0) {
        let customerID = $('input#customer-post-id').val(); 

        var customerTable = $('#customerVehicleTable').DataTable({
            ajax: {
                url: dashboard_obj.ajaxurl + '?action=get_customer_vehicles',
                data: {
                    'customer-id': customerID,
                }
            },
            pagingType: 'simple_numbers', 
            columns: [
                { data: 'make' }, 
                { data: 'model' }, 
                { data: 'registration' },
                { data: 'vin' }, 
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
                    targets: 4, 
                    className: 'actions', 
                    "render": function (data, type, row) {
                        let actions = '';
                        actions += '<div class="d-flex flex-align-center justified-end">';
                        actions += '<a href="#" data-popup="add-vehicle-popup" class="popup-btn edit-vehicle-action mr-2">Edit</a>';
                        actions += '<a href="#" data-delete-post="' + row['vehicle_post_id'] + '">Delete</a>';
                        actions += '</div>';
                        return actions;
                    },
                }
            ],
            createdRow: function (row, data, index) {
                // console.log("Custoemr",data,row);
                $(row).addClass('post-id-'+data.vehicle_post_id);
            },
            initComplete: function(settings, json) {
                // Extract data from the received JSON
                // $(row).addClass('post-id-'+row.vehicle_post_id);
                var rowData = [];
                for (var vehicleID in json.data) {
                    if (json.data.hasOwnProperty(vehicleID)) {
                        var vehicleData = json.data[vehicleID];
                        rowData.push({
                            'vehicle_post_id': vehicleData.customer_vehicle_id,
                            'make': vehicleData.make,
                            'model': vehicleData.model,
                            'registration': vehicleData.registration,
                            'vin': vehicleData.vin,
                            'actions': vehicleData.actions
                        });
                    }
                }
                // Set the data for the DataTable
                this.api().clear().rows.add(rowData).draw();
            }, 
            drawCallback: function(settings) {
                if(settings.aoData.length) {
                    if( settings.aoData.length <= settings._iDisplayLength ) {
                        $('.dt-paging').hide();
                    }
                }
            }
        }); 
        
        //Hide/Show Columns 
        $(document).on('click','.table-filters .column-states input',function() { 
            const columnNo = $(this).attr('value') 
            let column = customerTable.column(columnNo); 
            // Toggle the visibility 
            column.visible(!column.visible()); 
        });
    }

    // Invoices Table 
    if($('#invoicesTable').length > 0) {
        var invoiceTable = $('#invoicesTable').DataTable({
            ajax: {
                url: dashboard_obj.ajaxurl + '?action=get_user_invoices'
            },
            pagingType: 'simple_numbers', 
            columns: [
                { data: 'invoice_no' },
                { data: 'customer' },  
                { data: 'date' }, 
                { data: 'amount' }, 
                { data: 'status' }, 
                { data: 'actions' },
                { data: 'invoice_url' }
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
            order: [2, 'asc'],
            responsive: true,
            columnDefs: [ 
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
                        actions += '<div class="d-flex flex-align-center justified-end">';
                        actions += '<a class="mt-1 mr-2" href="' + row['invoice_url'] + '" target="_blank" >Print</a>';
                        actions += '<div class="action-wrap">';
                        actions += '<div class="action-btn" data-id="' + row['invoice_post_id'] + '"><span></span><span></span><span></span></div>';
                        actions += '<ul style="display:none;">';
                        actions += '';
                        actions += '<li><a href="/workshoppro/jobs/add-job?edit=' + row['invoice_post_id'] + '" >Edit</a></li>';
                        actions += '</ul>'; 
                        actions += '</div>';
                        actions += '</div>';
                        return actions;
                    },
                }
            ],
            createdRow: function (row, data, index) {
                $(row).addClass('post-id-'+data.invoice_post_id);
            }, 
            drawCallback: function(settings) {
                setTimeout(() => {
                    if( settings.aoData.length <= settings._iDisplayLength ) {
                        $('.dt-paging').hide();
                    }
                }, 1000);
            }
        });

        //Hide/Show Columns
        $(document).on('click','.table-filters .column-states input',function() {
            const columnNo = $(this).attr('value')
            let column = invoiceTable.column(columnNo);
        
            // Toggle the visibility
            column.visible(!column.visible());                    
        });
    }

    // Quotes Table  
    if($('#quotesTable').length > 0) { 
        var quotesTable = $('#quotesTable').DataTable({
            ajax: {
                url: dashboard_obj.ajaxurl + '?action=get_user_quotes'
            },
            pagingType: 'simple_numbers', 
            columns: [
                { data: 'quote_no' },
                { data: 'customer' },  
                { data: 'date' }, 
                { data: 'amount' }, 
                { data: 'status' }, 
                { data: 'actions' },
                { data: 'quote_url' },
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
            order: [2, 'asc'],
            responsive: true,
            columnDefs: [ 
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
                        actions += '<div class="d-flex flex-align-center justified-end">';
                        actions += '<a class="mt-1 mr-2" href="' + row['quote_url'] + '" target="_blank" >Print</a>';
                        actions += '<div class="action-wrap">';
                        actions += '<div class="action-btn" data-id="' + row['quote_post_id'] + '"><span></span><span></span><span></span></div>';
                        actions += '<ul style="display:none;">';
                        actions += '';
                        actions += '<li><a href="/workshoppro/jobs/add-job?edit=' + row['quote_post_id'] + '" >Edit</a></li>';
                        actions += '</ul>'; 
                        actions += '</div>';
                        actions += '</div>';
                        return actions;
                    },
                }
            ],
            createdRow: function (row, data, index) {
                $(row).addClass('post-id-'+data.quote_post_id);
                console.log('row: ', row);
                console.log('data: ', data);
            }, 
            drawCallback: function(settings) {
                setTimeout(() => {
                    if( settings.aoData.length <= settings._iDisplayLength ) {
                        $('.dt-paging').hide();
                    }
                }, 1000);
            }
        });

        //Hide/Show Columns
        $(document).on('click','.table-filters .column-states input',function() {
            const columnNo = $(this).attr('value')
            let column = quotesTable.column(columnNo);
        
            // Toggle the visibility
            column.visible(!column.visible());                    
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
    $(document).on('click','table tbody td.actions .action-btn',function() {
        if(!actionOpen) {
            $(this).addClass('active').closest('.actions').find('ul').fadeIn()
            actionOpen = true
        } else {
            $('table tbody td.actions').find('ul').fadeOut()
            $(this).removeClass('active');
            actionOpen = false
        }
    })

    // click anywhere except action-btn then remove active from action-btn
    $(document).on('click',function(e) {
        if(!$(e.target).closest('.action-btn').length) {
            $('table tbody td.actions').find('ul').fadeOut()
            $('table tbody td.actions .action-btn').removeClass('active');
            actionOpen = false
        }
    })

    if($('td.dt-empty').length > 0) { 
        $('td.dt-empty').attr('colspan', '100%');
    }

});

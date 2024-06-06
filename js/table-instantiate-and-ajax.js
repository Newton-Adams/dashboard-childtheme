'use strict'
jQuery(document).ready(function ($) {

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

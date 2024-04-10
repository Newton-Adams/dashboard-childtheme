'use strict'

jQuery(document).ready(function ($) {

    //Unsaved changes warning
    if( $('input[name="content-changed"]').length > 0 ) {

        //Check if page has changed before navigating away
        let navURL
        $(document).on('click','a:not([target="_blank"]):not(.save-changes-button)', function(e) {
            console.log($(e.target).closest('a:not([target="_blank"])').attr('href')  );
            navURL = $(e.target).closest('a:not([target="_blank"])').attr('href')            
            if($('input[name="content-changed"]').prop('checked')) {
                e.preventDefault()
                $('.unsaved-data-popup-outer').fadeIn()                    
            } 
        })     

        //Yes/No event leave page popup
        $(document).on('click','.unsaved-data-popup-outer a.wp-block-button__link',function(e) {  
            console.log(navURL);         
            if( $(this).attr('value') !== 'false' && navURL.length > 0 ) {     
                $('.unsaved-data-popup-outer').fadeOut(function() {
                    window.location.href = navURL
                })  
            } else {
                $('.unsaved-data-popup-outer').fadeOut()                  
            }
        })

        $(document).on('keyup','input', pageChanged)
        $(document).on('change','#attachment', pageChanged)
        $(document).on('click','.delete', pageChanged)
        function pageChanged() {
            $('input[name="content-changed"]').prop('checked',true)
        }

    }

    //Toggle Sidebar View
    $(document).on('click','#burger-menu svg, .mobile-close, .mobile-overlay', function() {
        $('body').toggleClass('menu-closed')
    })

    // Mobi search 
    $(document).on('click','.mobi-search-icon', function() { 

        $('.mobi-search').toggleClass('show');

        if( $('.mobi-search').hasClass('show') ) {
            $('.mobi-search-input').slideDown('slow');
        }else{
            $('.mobi-search-input').slideUp('slow');
        }

    })

    // Check if system is dark mode (currently set colors to light if it is)
    if (window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches) {
        // Dark mode is preferred
        document.documentElement.style.setProperty('--accent','#009026')
        document.documentElement.style.setProperty('--heading','#27272E')
        document.documentElement.style.setProperty('--body','#425466')
        document.documentElement.style.setProperty('--muted','#7A7A9D')
        document.documentElement.style.setProperty('--background-secondary','#ffffff')
        document.documentElement.style.setProperty('--background-primary','#F7FAFC')
    } 

    //Forms
    //Add Job Form Row
    $(document).on('click','.jobs-container .add-row-button',function(e) {
        const rowCount = $('#job-fields').children().length
        const jobRow = `<div class="form-row" >
                            <div class="input-label-wrapper labour-name-wrapper" >
                                <label for="labour-name-${rowCount}" >Labour Name</label>
                                <input type="text" id="labour-name-${rowCount}" name="labour-name-${rowCount}" >
                            </div>
                                <div class="input-label-wrapper description-wrapper" >
                                <label for="description-${rowCount}" >Description</label>
                            <input type="text" id="description-${rowCount}" name="description-${rowCount}" >
                            </div>
                                <div class="input-label-wrapper unit-price-wrapper" >
                                <label for="unit-price-${rowCount}" >Unit price </label>
                            <input type="text" id="unit-price-${rowCount}" name="unit-price-${rowCount}" >
                            </div>
                                <div class="input-label-wrapper quantity-wrapper" >
                                <label for="qty-${rowCount}" >Quantity</label>
                            <input type="text" id="qty-${rowCount}" name="qty-${rowCount}" >
                            </div>
                                <div class="input-label-wrapper vat-wrapper" >
                                <label for="vat-${rowCount}" >Vat </label>
                            <input type="text" id="vat-${rowCount}" name="vat-${rowCount}" >
                            </div>
                                <div class="input-label-wrapper line-total-wrapper" >
                                <label for="line-total-${rowCount}" >Line Total </label>
                            <input type="text" id="line-total-${rowCount}" name="line-total-${rowCount}" >
                            </div>
                            <div class="input-label-wrapper delete-row" >
                                <svg width="14" height="17" viewBox="0 0 14 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M4.30769 6.36667C4.60508 6.36667 4.84615 6.60545 4.84615 6.9V13.3C4.84615 13.5946 4.60508 13.8333 4.30769 13.8333C4.01031 13.8333 3.76923 13.5946 3.76923 13.3V6.9C3.76923 6.60545 4.01031 6.36667 4.30769 6.36667Z" fill="#7A7A9D"/>
                                    <path d="M7 6.36667C7.29738 6.36667 7.53846 6.60545 7.53846 6.9V13.3C7.53846 13.5946 7.29738 13.8333 7 13.8333C6.70262 13.8333 6.46154 13.5946 6.46154 13.3V6.9C6.46154 6.60545 6.70262 6.36667 7 6.36667Z" fill="#7A7A9D"/>
                                    <path d="M10.2308 6.9C10.2308 6.60545 9.98969 6.36667 9.69231 6.36667C9.39492 6.36667 9.15385 6.60545 9.15385 6.9V13.3C9.15385 13.5946 9.39492 13.8333 9.69231 13.8333C9.98969 13.8333 10.2308 13.5946 10.2308 13.3V6.9Z" fill="#7A7A9D"/>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M14 3.7C14 4.2891 13.5178 4.76667 12.9231 4.76667H12.3846V14.3667C12.3846 15.5449 11.4203 16.5 10.2308 16.5H3.76923C2.57969 16.5 1.61538 15.5449 1.61538 14.3667V4.76667H1.07692C0.482155 4.76667 0 4.2891 0 3.7V2.63333C0 2.04423 0.482155 1.56667 1.07692 1.56667H4.84615C4.84615 0.977563 5.32831 0.5 5.92308 0.5H8.07692C8.67169 0.5 9.15385 0.977563 9.15385 1.56667H12.9231C13.5178 1.56667 14 2.04423 14 2.63333V3.7ZM2.81942 4.76667L2.69231 4.82962V14.3667C2.69231 14.9558 3.17446 15.4333 3.76923 15.4333H10.2308C10.8255 15.4333 11.3077 14.9558 11.3077 14.3667V4.82962L11.1806 4.76667H2.81942ZM1.07692 3.7V2.63333H12.9231V3.7H1.07692Z" fill="#7A7A9D"/>
                                </svg>
                            </div>
                        </div>`

        $('#job-fields').append(jobRow)
        $(document).on('change','#job-fields .quantity-wrapper input, #job-fields .unit-price-wrapper input, #job-fields .vat-wrapper input',calculateLineTotal)
    })
   
    //Add Parts Form Row
    $(document).on('click','.parts-container .add-row-button',function(e) {
        const rowCount = $('#parts-fields').children().length
        const jobRow = `<div class="form-row" >
                            <div class="input-label-wrapper part-name-wrapper" >
                                <label for="part-name-${rowCount}" >Part Name</label>
                                <input type="text" id="part-name-${rowCount}" name="part-name-${rowCount}" >
                            </div>
                            <div class="input-label-wrapper warranty-wrapper" >
                                <label for="warranty-${rowCount}" >Warranty</label>
                                <input type="text" id="warranty-${rowCount}" name="warranty-${rowCount}" >
                            </div>
                            <div class="input-label-wrapper cost-price-wrapper" >
                                <label for="cost-price-${rowCount}" >Cost Price</label>
                                <input type="text" id="cost-price-${rowCount}" name="cost-price-${rowCount}" >
                            </div>
                            <div class="input-label-wrapper markup-wrapper" >
                                <label for="markup-${rowCount}" >Markup (%)</label>
                                <input type="text" id="markup-${rowCount}" name="markup-${rowCount}" >
                            </div>
                            <div class="input-label-wrapper unit-price-wrapper" >
                                <label for="unit-price-${rowCount}" >Unit price</label>
                                <input type="text" id="unit-price-${rowCount}" name="unit-price-${rowCount}" >
                            </div>
                            <div class="input-label-wrapper quantity-wrapper" >
                                <label for="qty-${rowCount}" >Qty</label>
                                <input type="text" id="qty-${rowCount}" name="qty-${rowCount}" >
                            </div>
                            <div class="input-label-wrapper vat-wrapper" >
                                <label for="vat-${rowCount}" >Vat</label>
                                <input type="text" id="vat-${rowCount}" name="vat-${rowCount}" >
                            </div>
                            <div class="input-label-wrapper line-total-wrapper" >
                                <label for="line-total-${rowCount}" >Line Total</label>
                                <input type="text" id="line-total-${rowCount}" name="line-total-${rowCount}" >
                            </div>
                            <div class="input-label-wrapper delete-row" >
                                <svg width="14" height="17" viewBox="0 0 14 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M4.30769 6.36667C4.60508 6.36667 4.84615 6.60545 4.84615 6.9V13.3C4.84615 13.5946 4.60508 13.8333 4.30769 13.8333C4.01031 13.8333 3.76923 13.5946 3.76923 13.3V6.9C3.76923 6.60545 4.01031 6.36667 4.30769 6.36667Z" fill="#7A7A9D"/>
                                <path d="M7 6.36667C7.29738 6.36667 7.53846 6.60545 7.53846 6.9V13.3C7.53846 13.5946 7.29738 13.8333 7 13.8333C6.70262 13.8333 6.46154 13.5946 6.46154 13.3V6.9C6.46154 6.60545 6.70262 6.36667 7 6.36667Z" fill="#7A7A9D"/>
                                <path d="M10.2308 6.9C10.2308 6.60545 9.98969 6.36667 9.69231 6.36667C9.39492 6.36667 9.15385 6.60545 9.15385 6.9V13.3C9.15385 13.5946 9.39492 13.8333 9.69231 13.8333C9.98969 13.8333 10.2308 13.5946 10.2308 13.3V6.9Z" fill="#7A7A9D"/>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M14 3.7C14 4.2891 13.5178 4.76667 12.9231 4.76667H12.3846V14.3667C12.3846 15.5449 11.4203 16.5 10.2308 16.5H3.76923C2.57969 16.5 1.61538 15.5449 1.61538 14.3667V4.76667H1.07692C0.482155 4.76667 0 4.2891 0 3.7V2.63333C0 2.04423 0.482155 1.56667 1.07692 1.56667H4.84615C4.84615 0.977563 5.32831 0.5 5.92308 0.5H8.07692C8.67169 0.5 9.15385 0.977563 9.15385 1.56667H12.9231C13.5178 1.56667 14 2.04423 14 2.63333V3.7ZM2.81942 4.76667L2.69231 4.82962V14.3667C2.69231 14.9558 3.17446 15.4333 3.76923 15.4333H10.2308C10.8255 15.4333 11.3077 14.9558 11.3077 14.3667V4.82962L11.1806 4.76667H2.81942ZM1.07692 3.7V2.63333H12.9231V3.7H1.07692Z" fill="#7A7A9D"/>
                                </svg>
                            </div>
                        </div>`

        $('#parts-fields').append(jobRow)
        $(document).on('change','#parts-fields .quantity-wrapper input, #parts-fields .unit-price-wrapper input, #parts-fields .vat-wrapper input',calculateLineTotal)
    })

    //Delete form row & trigger input change to update calculations
    $(document).on('click','.delete-row',function(e) {
        const form = $(this).closest('form')
        $(this).closest('.form-row').remove()
        form.find('.form-row:first-child .quantity-wrapper input').change()  
        if(form.children().length === 0) {
            form.closest('.section').find('.sub-total-outer > p > .value').text('R0.00')
            updateTotalCosts('.section.jobs-container','.section.parts-container')
        }
        console.log(form.children().length);
        
    })
    
    //Calculate Line Total
    $(document).on('change','.quantity-wrapper input, .unit-price-wrapper input, .vat-wrapper input',calculateLineTotal)
    function calculateLineTotal() {
        const quantity = Number($(this).closest('.form-row').find('.quantity-wrapper input').val().replace(',','.'))
        const unitPrice = Number($(this).closest('.form-row').find('.unit-price-wrapper input').val().replace(',','.'))
        const vat = quantity * unitPrice / 100 * 14
        $(this).closest('.form-row').find('.vat-wrapper input').val( vat.toFixed(2) )
        $(this).closest('.form-row').find('.line-total-wrapper input').val( (quantity * unitPrice).toFixed(2) )

        //Update Subtotals & Totals
        let lineSubtotal = 0
        let vatSubtotal = 0
        $(this).closest('form').find('.form-row').each(function(index,ele) {
            const lineTotal = $(ele).find('.line-total-wrapper input').val()
            const vat = $(ele).find('.vat-wrapper input').val()
            lineSubtotal += Number(lineTotal)
            vatSubtotal += Number(vat)
        })
        $(this).closest('.section').find('.sub-total-outer .sub-total .value').text(`R${lineSubtotal.toFixed(2)}`)
        $(this).closest('.section').find('.sub-total-outer .vat .value').text(`R${vatSubtotal.toFixed(2)}`)
        $(this).closest('.section').find('.sub-total-outer .total .value').text(`R${(lineSubtotal + vatSubtotal).toFixed(2)}`)
        updateTotalCosts('.section.jobs-container','.section.parts-container')
    }
    
    //Update Total
    function updateTotalCosts(subtotal1,subtotal2) {
        const total1 = Number($(subtotal1).find('.total .value').text().replace('R',''))
        const vat1 = Number($(subtotal1).find('.vat .value').text().replace('R',''))
        const total2 = Number($(subtotal2).find('.total .value').text().replace('R',''))
        const vat2 = Number($(subtotal2).find('.vat .value').text().replace('R',''))
       
        $('.total-outer .total-vat .value').text(`R${(vat1 + vat2).toFixed(2)}`)
        $('.total-outer .grand-total .value').text(`R${(total1 + total2).toFixed(2)}`)
    }

    if ($(".onboarding-aside-slider").length) {
		$(".onboarding-aside-slider .wp-block-group__inner-container").slick({
			infinite: true,
			slidesToShow: 1,
			slidesToScroll: 1,
            dots: true,
            arrows: false
		});
	}
    
    $(document).on('change','#csvFile', function(e) {
        var file = e.target.files[0];
        if (!file) return;
        var reader = new FileReader();
        reader.onload = function(e){
            var contents = e.target.result;
            var rows = contents.split('\n');
            var data = [];

            for (var i = 0; i < rows.length; i++) {
                const columns = rows[i].split(',')
                if(columns.length === 2) { 
                    i != 0 && data.push(columns)                    
                } else {
                    $('#csvData .csv-table').html('<h5>Your CSV format does not look right, please download the template</h5>')
                    return 
                }   
            }
            
            //Create winow object
            window.customerCsv = data
            
            // Example: Display CSV data in a table
            var table = '<table border="1">';
            for (var i = 0; i < 11; i++) {
                table += '<tr>';
                for (var j = 0; j < data[i].length; j++) {
                    table += '<td>' + data[i][j] + '</td>';
                }
                table += '</tr>';
            }
            table += `<tr><td colspan="2" >And ${data.length} more rows... </td></tr></table>`;
            $('#csvData .csv-table').html(table);
            
            //Create progress bar
            let progresSegments = []
            for (let i = 0; i < (rows.length / 20); i++) {
                progresSegments += `<span class="segment" ></span>`
            }
       

            $('#csvData .csv-table').append(`<p>Customers upload progress <span class="loading-elipses" style="opacity:0;" ><span>.</span><span>.</span><span>.</span><span>.</span><span>.</span><span>.</span></span> <span class="bar" ><span class="segment" ></span></span></p>`)
            $('#csvData button').removeAttr('disabled')
            $('.csv-upload-popup').addClass('show')
        };

        reader.readAsText(file);
    });

    // CSV Popup Close 
    $(document).on('click','.csv-upload-popup .close-popup, .csv-upload-popup .overlay',function() {
        $('.csv-upload-popup').removeClass('show')
    })
    
    //Ts&Cs Checkbox
    if( $(".um-field-type_terms_conditions").length ) {
        $(".um-field-type_terms_conditions").find(".um-field-checkbox-option").each(function() {
            $(this).addClass("custom-checkbox");
            $(this).html('By creating an account means you agree to the <a href="/terms-and-conditions" target="_blank">Terms and Conditions</a>, and our <a href="/privacy-policy" target="_blank">Privacy Policy</a>');
        } );
    }

    //Mechanics
    //Add Mechanics Form Row
    $(document).on('click','.add-staff-outer .add-row-button',function(e) {
        const rowCount = $('#add-staff').children().length
        const jobRow = `<div class="form-row" >
                            <div class="input-label-wrapper" >
                                <label for="name-${rowCount}" >Staff member name</label>
                                <input type="text" id="name-${rowCount}" name="name-${rowCount}" >
                            </div>
                            <div class="input-label-wrapper" >
                                <label for="contact-number-${rowCount}" >Contact number</label>
                                <input type="text" id="contact-number-${rowCount}" name="contact-number-${rowCount}" >
                            </div>
                            <div class="input-label-wrapper" >
                                <label for="role-${rowCount}" >Role</label>
                                <input type="text" id="role-${rowCount}" name="role-${rowCount}" >
                            </div>
                        </div>`
    
        $('#add-staff').append(jobRow)    
    })

    // Get started guide 
    if($('.get-started-guide').length) { 
        
        $(document).on('click','.add-business-info .add-business-btn',function() {
            $(this).toggleClass('active')
            $('.add-business-form').toggleClass('show');
            
            if($('.add-business-form').hasClass('show')) {
                $('.add-business-form').slideToggle('slow');
            } else {
                $('.add-business-form').slideUp('slow');
            }
        })
    }

    //Toggle snapshot
    if($('.snapshot-section').length)  { 
        $(document).on('click','.snapshot-section .reveal-snapshot-btn',function() {
            $(this).toggleClass('active')
            $('.snapshot-items').slideToggle('slow');
        })
    }

    // Workshop Doughnut Chart 
    if( $('#workshopChart').length ) {
        var activeVal = $('.active .chart-value').text();
        var completeVal = $('.complete .chart-value').text();
        var awaitingVal = $('.awaiting .chart-value').text();

        var ctx = document.getElementById('workshopChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Active', 'Complete', 'Waiting'],
                datasets: [{
                    label: '',
                    data: [ 
                        activeVal, 
                        completeVal, 
                        awaitingVal
                    ],
                    backgroundColor: [
                        '#68DBF2',
                        '#2ECF88',
                        '#F7936F'
                    ],
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                cutoutPercentage: 90,
                title: {
                    display: true,
                    text: 'Workshop Chart',
                    fontSize: 16,
                    fontWeight: 700, 
                },
                tooltips: {
                    display: false
                },
                plugins: {
                    legend: { 
                        display: false, 
                        position: 'bottom', 
                        align: 'center',
                    }
                }

            }
        });

    }

    // Popup 
    $(document).on('click','.popup-btn',function() { 
        const popup = '#'+$(this).attr('data-popup')
        $(popup).fadeIn('fast', function() {
            $(popup).addClass('show');
            $('body').css('overflow','hidden');
        });
    });

    $(document).on('click','.popup-overlay, .close-popup, .cancel-popup',function() { 
        $('.popup').fadeOut('fast', function() {
            $(this).removeClass('show');
            $('body').css('overflow','auto');
        });
        $(this).closest('form').clearForm();
    });

})

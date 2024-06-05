'use strict'

jQuery(document).ready(function ($) {

    //Make sidebar collapsed by default on tablet/mobile
    if(window.innerWidth < 992) {
        $('body').addClass('menu-closed')
    }

    //Change date format to dd-mm-yy when selecting date
    if($(`input[type="date"]`).length > 0) {
        $(document).on('change',`.wm-date-picker`,function() {
            const mmddyyVal = new Date($(this).val())
            const newDateFormat = mmddyyVal.toLocaleDateString('en-GB', {
                day: '2-digit',
                month: '2-digit',
                year: 'numeric'
            })                  
           
            // $(this).closest('.input-label-wrapper').find('input[type="text"]').focus()
            $(this).closest('.input-label-wrapper').find('input[type="text"]').val(newDateFormat)
            validateInput( $(this).closest('.input-label-wrapper').find('input[type="text"]') )
        })
    }

    //Unsaved changes warning
    if( $('input[name="content-changed"]').length > 0 ) {

        //Check if page has changed before navigating away
        let navURL
        $(document).on('click','a:not([target="_blank"]):not(.save-changes-button, [data-popup="add-vehicle-popup"])', function(e) {
            navURL = $(e.target).closest('a:not([target="_blank"])').attr('href')            
            if($('input[name="content-changed"]').prop('checked')) {
                e.preventDefault()
                $('.alert-popup-outer.unsaved').fadeIn()                    
            } 
        })     

        //Accept/Reject event leave page popup
        $(document).on('click','.alert-popup-outer.unsaved button',function(e) {        
            if( $(this).attr('value') !== 'false' && navURL.length > 0 ) {     
                $('.alert-popup-outer.unsaved').fadeOut(function() {
                    window.location.href = navURL
                })  
            } else {
                $('.alert-popup-outer.unsaved').fadeOut()                  
            }
        })
        
        //Close error popup
        $(document).on('click','.alert-popup-outer.error button',function(e) {        
            $('.alert-popup-outer.error').fadeOut() 
        })

        $(document).on('keyup','input', pageChanged)
        $(document).on('change','#attachment', pageChanged)
        $(document).on('click','.delete', pageChanged)
        function pageChanged() {
            $("#job-status").val("draft")
            $(".controls .select-wrapper.job-status .selected .control-status").text("Draft")
            $(".controls .job-send").attr("data-state","quote-sent")
            $(".controls .select-wrapper.job-status .selected .control-status").closest(".control-fields").find(".job-send").text("Send Quote")
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

    //Add Labour Form Row
    $(document).on('click','.labour-container .add-row-button',function(e) {
        const rowCount = $('#job-fields').children().length
        const jobRow = `<div class="form-row" >
                            <div class="input-label-wrapper labour-name-wrapper" >
                                <label for="labour-name" >Labour Name</label>
                                <input type="text" class="labour-name" name="labour-name" >
                            </div>
                                <div class="input-label-wrapper description-wrapper" >
                                <label for="description" >Description</label>
                                <input type="text" class="description" name="description" >
                            </div>
                                <div class="input-label-wrapper unit-price-wrapper" >
                                <label for="unit-price" >Unit price </label>
                                <input type="number" class="unit-price" name="unit-price" value="${ $('#hourly-labour-rate').val() }" >
                            </div>
                                <div class="input-label-wrapper quantity-wrapper" >
                                <label for="qty" >Quantity</label>
                                <input type="number" class="qty" name="qty" value="1" >
                            </div>
                                <div class="input-label-wrapper vat-wrapper" >
                                <label for="vat" >Vat </label>
                                <input type="number" class="vat" name="vat" value="${ $('#hourly-labour-rate').val() / 100 * $('#vat-rate').val() }" >
                            </div>
                                <div class="input-label-wrapper line-total-wrapper" >
                                <label for="line-total" >Line Total </label>
                                <input type="number" class="line-total" name="line-total" >
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

        const appendedRow = $('#job-fields').append(jobRow)
        appendedRow.find(".unit-price").trigger("change")
        $(document).on('change','#job-fields .quantity-wrapper input, #job-fields .unit-price-wrapper input, #job-fields .vat-wrapper input',calculateLineTotal)
    })
   
    //Add Parts Form Row
    $(document).on('click','.parts-container .add-row-button',function(e) {
        const rowCount = $('#parts-fields').children().length
        const jobRow = `<div class="form-row" >
                            <div class="input-label-wrapper part-name-wrapper" >
                                <label for="part-name" >Part Name</label>
                                <input type="text" class="part-name" name="part-name" >
                            </div>
                            <div class="input-label-wrapper warranty-wrapper" >
                                <label for="warranty" >Warranty</label>
                                <input type="text" class="warranty" name="warranty" >
                            </div>
                            <div class="input-label-wrapper cost-price-wrapper" >
                                <label for="cost-price" >Cost Price</label>
                                <input type="number" class="cost-price" name="cost-price" >
                            </div>
                            <div class="input-label-wrapper markup-wrapper" >
                                <label for="markup" >Markup (%)</label>
                                <input type="number" class="markup" name="markup" value="${ $('#markup-percentage').val() }" >
                            </div>
                            <div class="input-label-wrapper unit-price-wrapper" >
                                <label for="unit-price" >Unit price</label>
                                <input type="number" class="unit-price" name="unit-price" >
                            </div>
                            <div class="input-label-wrapper quantity-wrapper" >
                                <label for="qty" >Qty</label>
                                <input type="number" class="qty" name="qty" value="1" >
                            </div>
                            <div class="input-label-wrapper vat-wrapper" >
                                <label for="vat" >Vat</label>
                                <input type="number" class="vat" name="vat" >
                            </div>
                            <div class="input-label-wrapper line-total-wrapper" >
                                <label for="line-total" >Line Total</label>
                                <input type="number" class="line-total" name="line-total" >
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

        const appendedRow = $('#parts-fields').append(jobRow)
        appendedRow.find(".unit-price").trigger("change")
        $(document).on('change','#parts-fields .quantity-wrapper input, #parts-fields .vat-wrapper input',calculateLineTotal)
    })

    //Update part unit price based on cost & markup
    if( $(".parts-container .cost-price-wrapper .cost-price").length > 0 ) {
        $(document).on("change",".parts-container .cost-price-wrapper .cost-price, .parts-container .markup-wrapper .markup", function() {
            const costPrice = Number($(this).closest(".form-row").find(".cost-price").val())
            const markup = Number($(this).closest(".form-row").find(".markup").val())
            const unitPrice = ((costPrice / 100 * markup) + costPrice)
            console.log(unitPrice);
            $(this).closest(".form-row").find(".unit-price").val((unitPrice).toFixed(2))
            $(this).closest(".form-row").find(".unit-price").trigger("change")
        })
    }

    //Delete form row & trigger input change to update calculations
    $(document).on('click','.delete-row',function(e) {
        const form = $(this).closest('form')
        $(this).closest('.form-row').remove()
        form.find('.form-row:first-child .quantity-wrapper input').change()  
        if(form.children().length === 0) {
            form.closest('.section').find('.sub-total-outer > p > .value').text('R0.00')
            updateTotalCosts('.section.labour-container','.section.parts-container')
        }        
    })
    
    //Calculate Line Total
    $(document).on('change','.quantity-wrapper input, .unit-price-wrapper input, .vat-wrapper input',calculateLineTotal)
    function calculateLineTotal() {
        const quantity = Number($(this).closest('.form-row').find('.quantity-wrapper input').val().replace(',','.'))
        const unitPrice = Number($(this).closest('.form-row').find('.unit-price-wrapper input').val().replace(',','.'))
        const vatRate = Number($("#vat-rate").val())
        
        //Line Vat
        const vat = Number(( quantity * unitPrice / 100 * vatRate ).toFixed(2))
        $(this).closest('.form-row').find('.vat-wrapper input').val( vat )

        //Line Total
        $(this).closest('.form-row').find('.line-total-wrapper input').val( (quantity * unitPrice + vat).toFixed(2) )

        //Update Subtotals & Totals
        let lineSubtotal = 0
        let vatSubtotal = 0
        $(this).closest('form').find('.form-row').each(function(index,ele) {
            const lineTotal = $(ele).find('.line-total-wrapper input').val()
            const vat = $(ele).find('.vat-wrapper input').val()
            vatSubtotal += Number(vat)
            lineSubtotal += Number(lineTotal)
        })
        
        $(this).closest('.section').find('.sub-total-outer .sub-total .value').text(`R${(lineSubtotal - vatSubtotal).toFixed(2)}`)
        $(this).closest('.section').find('.sub-total-outer .vat .value').text(`R${vatSubtotal.toFixed(2)}`)
        $(this).closest('.section').find('.sub-total-outer .total .value').text(`R${(lineSubtotal).toFixed(2)}`)
        updateTotalCosts('.section.labour-container','.section.parts-container')
    }
    
    //Update Total
    function updateTotalCosts(subtotal1,subtotal2) {
        const total1 = Number($(subtotal1).find('.total .value').text().replace('R',''))
        const vat1 = Number($(subtotal1).find('.vat .value').text().replace('R',''))
        const total2 = Number($(subtotal2).find('.total .value').text().replace('R',''))
        const vat2 = Number($(subtotal2).find('.vat .value').text().replace('R',''))
       
        $('.total-outer input#grand-total-value').val(`R${(total1 + total2).toFixed(2)}`)
        $('.total-outer .total-vat .value').text(`R${(vat1 + vat2).toFixed(2)}`)
        $('.total-outer .grand-total .value').text(`R${(total1 + total2).toFixed(2)}`)
    }

    // Onboard Slider
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
                if(columns.length === 14) { 
                    for (let coli = 0; coli < columns.length; coli++) {
                        columns[coli] = columns[coli].trim()
                    }
                    i != 0 && data.push(columns)
                } else {
                    $('#csvData .csv-table').html('<h5>Your CSV format does not look right, please download the template</h5>')
                    break
                }   
            }
      
            //Create window object
            window.customerCsv = data
            let table = `<div class="table-wrapper" >
                            <table border="1">
                                <thead>
                                    <tr>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Phone no.</th>
                                        <th>Additional Phone no.</th>
                                        <th>Email</th>
                                        <th>Address</th>
                                        <th>Suburb</th>
                                        <th>City</th>
                                        <th>Province</th>
                                        <th>Postal Code</th>
                                        <th>Company Name</th>
                                        <th>VAT no.</th>
                                        <th>Company Registration</th>
                                        <th>Note</th>
                                    </tr>
                                </thead>`;
            for (let i = 0; i < 10;) {
                if(i < data.length) {
                    table += '<tr>';
                    for (let j = 0; j < 14; j++) {
                        table += '<td>' + data[i][j] + '</td>';
                    }
                    table += '</tr>';
                    i++
                } else {
                    break
                }
            }
            data.length > 9 ? table += `<tr><td colspan="2" >And ${data.length - 10} more rows... </td></tr></table></div` : "";
            $('#csvData .csv-table').html(table);
           
            //Create progress bar
            let progresSegments = []
            for (let i = 0; i < (rows.length / 20); i++) {
                progresSegments += `<span class="segment" ></span>`
            }       

            $('#csvData .csv-table').append(`<p>Customers upload progress <span class="loading-elipses" style="opacity:0;" ><span>.</span><span>.</span><span>.</span><span>.</span><span>.</span><span>.</span></span> <span class="bar" ><span class="segment" ></span></span></p>`)
            $('#csvData button').removeAttr('disabled').fadeIn()
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

    // Profile form updates
    if( $('#profile-form').length ) {
        $(document).on('change keyup','#profile-form input[name="customer_prefix"]',function() {
            $('.customer-prefix-box').text($(this).val())
        })
        $(document).on('change keyup','#profile-form input[name="job_prefix"]',function() { 
            $('.job-prefix-box').text($(this).val())
        })
    }


    //Get started guide 
    if($('.get-started-guide').length) { 
        
        $(document).on('click','.add-business-info .add-business-btn',function() {

            $(this).toggleClass('active')
            $('.add-business-form').addClass('show');
            
            if($('.add-business-form').hasClass('show')) {
                $('.add-business-form').slideToggle('slow');
                $('.add-business-form').removeClass('show');
            } else {
                $('.add-business-form').slideUp('slow');
            }

        })

        if( $('#profile-form').length ) {

            let profileFormValid = true

            $('#profile-form input').each(function() {
                if ( 
                    $(this).val() === '' && 
                    $(this).attr('name') !== 'miwa_member' && 
                    $(this).attr('name') !== 'profile_picture' && 
                    $(this).attr('name') !== 'profile_form_nonce' && 
                    $(this).attr('name') !== 'vat_number' && 
                    $(this).attr('name') !== 'company_registration_number'
                ) {
                    profileFormValid = false
                }
            });
            
            if (profileFormValid) {
                
                $('#profile-form').closest('.add-business-info').addClass('completed');
                $('#profile-form').closest('.add-business-info').find('.icon-col').html('<svg width="60" height="61" viewBox="0 0 60 61" fill="none" xmlns="http://www.w3.org/2000/svg"><rect y="0.662109" width="60" height="60" rx="30" fill="#009026"></rect><path fill-rule="evenodd" clip-rule="evenodd" d="M37.6854 23.9755C38.0841 24.4299 38.0841 25.1666 37.6854 25.6209L29.5173 37.2555C29.1185 37.7099 28.4721 37.7099 28.0733 37.2555L22.6692 31.0975C22.2704 30.6431 22.2704 29.9064 22.6692 29.4521C23.0679 28.9977 23.7144 28.9977 24.1131 29.4521L28.7953 34.7875L36.2415 23.9755C36.6402 23.5212 37.2867 23.5212 37.6854 23.9755Z" fill="white"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M35.7025 23.8726C36.2819 23.2209 37.2214 23.2209 37.8008 23.8726C38.3731 24.5163 38.3802 25.5551 37.8219 26.2086L29.924 37.3126C29.9126 37.3286 29.9004 37.3439 29.8875 37.3584C29.3081 38.0102 28.3687 38.0102 27.7892 37.3585L22.5537 31.4697C21.9743 30.818 21.9743 29.7613 22.5537 29.1096C23.1332 28.4579 24.0726 28.4579 24.652 29.1096L28.7937 33.768L35.6631 23.9225C35.6753 23.905 35.6885 23.8883 35.7025 23.8726Z" fill="white"></path></svg>');
                $('#profile-form').closest('.add-business-info').find('.add-business-btn').click();

            } else {

                $('#profile-form').closest('.add-business-info').removeClass('completed');
                $('#profile-form').closest('.add-business-info').find('.icon-col').html('<svg width="60" height="61" viewBox="0 0 60 61" fill="none" xmlns="http://www.w3.org/2000/svg"><rect y="0.162109" width="60" height="60" rx="30" fill="#EDFFEB"/><path fill-rule="evenodd" clip-rule="evenodd" d="M18 30.1621C18 23.5347 23.3726 18.1621 30 18.1621C36.6274 18.1621 42 23.5347 42 30.1621C42 36.7895 36.6274 42.1621 30 42.1621C23.3726 42.1621 18 36.7895 18 30.1621ZM29.25 19.7769C28.2459 20.084 27.2469 21.0079 26.4191 22.5601C26.2044 22.9626 26.006 23.3999 25.8266 23.8675C26.8843 24.1035 28.0357 24.2538 29.25 24.2979V19.7769ZM24.3728 23.4713C23.7211 23.2588 23.1194 23.0114 22.5772 22.7357C23.5465 21.7668 24.7043 20.9866 25.9909 20.4546C25.6629 20.8807 25.3637 21.3516 25.0956 21.8542C24.829 22.354 24.5871 22.8951 24.3728 23.4713ZM23.2627 29.4121H19.5264C19.6716 27.3546 20.4096 25.4607 21.5707 23.9003C22.2747 24.2866 23.063 24.6226 23.9172 24.9005C23.5453 26.281 23.3171 27.8071 23.2627 29.4121ZM25.363 25.3004C26.5756 25.5805 27.8853 25.7525 29.25 25.7988V29.4121H24.7636C24.8174 27.9316 25.0293 26.5418 25.363 25.3004ZM30.75 25.7988V29.4121H35.2364C35.1825 27.9316 34.9707 26.5418 34.637 25.3004C33.4244 25.5805 32.1147 25.7525 30.75 25.7988ZM24.7636 30.9121H29.25V34.5254C27.8853 34.5717 26.5756 34.7437 25.363 35.0238C25.0293 33.7824 24.8174 32.3926 24.7636 30.9121ZM30.75 30.9121V34.5254C32.1147 34.5717 33.4244 34.7437 34.637 35.0238C34.9707 33.7824 35.1825 32.3926 35.2364 30.9121H30.75ZM25.8266 36.4567C26.8843 36.2207 28.0357 36.0704 29.25 36.0263V40.5473C28.2459 40.2402 27.2469 39.3163 26.4191 37.7641C26.2044 37.3616 26.006 36.9243 25.8266 36.4567ZM25.9909 39.8696C25.6629 39.4435 25.3637 38.9726 25.0956 38.47C24.829 37.9702 24.5871 37.4291 24.3728 36.8529C23.7211 37.0654 23.1194 37.3128 22.5772 37.5885C23.5465 38.5574 24.7043 39.3376 25.9909 39.8696ZM23.9172 35.4237C23.063 35.7016 22.2747 36.0376 21.5707 36.4239C20.4096 34.8635 19.6716 32.9696 19.5264 30.9121H23.2627C23.3171 32.5171 23.5453 34.0432 23.9172 35.4237ZM34.0091 39.8696C35.2957 39.3376 36.4535 38.5574 37.4228 37.5885C36.8806 37.3128 36.2788 37.0654 35.6272 36.8529C35.4128 37.4291 35.171 37.9702 34.9044 38.47C34.6363 38.9726 34.337 39.4435 34.0091 39.8696ZM30.75 36.0263C31.9642 36.0704 33.1157 36.2207 34.1734 36.4567C33.994 36.9243 33.7956 37.3616 33.5809 37.7641C32.7531 39.3163 31.7541 40.2402 30.75 40.5473V36.0263ZM36.0827 35.4237C36.937 35.7016 37.7253 36.0376 38.4293 36.4239C39.5904 34.8635 40.3284 32.9696 40.4736 30.9121H36.7373C36.6829 32.5171 36.4547 34.0432 36.0827 35.4237ZM40.4736 29.4121H36.7373C36.6829 27.8071 36.4547 26.281 36.0827 24.9005C36.937 24.6226 37.7253 24.2866 38.4293 23.9003C39.5904 25.4607 40.3284 27.3546 40.4736 29.4121ZM34.9044 21.8542C35.171 22.354 35.4128 22.8951 35.6272 23.4713C36.2788 23.2588 36.8806 23.0114 37.4228 22.7357C36.4535 21.7668 35.2957 20.9866 34.0091 20.4546C34.337 20.8807 34.6363 21.3516 34.9044 21.8542ZM34.1734 23.8675C33.1157 24.1035 31.9642 24.2538 30.75 24.2979V19.7769C31.7541 20.084 32.7531 21.0079 33.5809 22.5601C33.7956 22.9626 33.994 23.3999 34.1734 23.8675Z" fill="#009026"/></svg>');

            }
        }
    }


    //Toggle snapshot
    if($('.snapshot-section').length)  { 
        $(document).on('click','.snapshot-section .reveal-snapshot-btn',function() {
            $(this).toggleClass('active')
            $('.snapshot-items').slideToggle('slow');
        })
    }

    //Workshop Doughnut Chart 
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

                }], 
                unitSuffix: "%",
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

    //Popup 
    $(document).on('click','.popup-btn',function(e) {  
        e.preventDefault();
        const popup = '#'+$(this).data('popup')
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

        $(this).closest('form:not(#send-quote-form)').clearForm();

        // Remove Attachment Files from table
        $('#attachment-files').hide();
        $('#attachment-files tbody tr').remove();

        // #send-quote-popup 
        if( $(this).closest('.popup').attr('id') === 'send-quote-popup' ) {

            console.log('Send Quote Popup Closed');

            $('.pdf-success-message-close, .pdf-success-message').fadeOut();
            $('#send-quote-form').fadeIn();

        }
    });

    //Vehicle Edit popup extras
    $(document).on(
        'click', 
        '.edit-vehicle-popup .popup-overlay, .edit-vehicle-popup .close-popup, .edit-vehicle-popup .cancel-popup', 
        function() { 
            setTimeout(() => {
                $('.popup').fadeOut('fast', function() {
                    $(this).removeClass('show');
                    $('body').css('overflow','auto');
                });
                $('#add-vehicle-popup').removeClass('edit-vehicle-popup').find('.popup-title').text('Add Vehicle');
                $('#add-vehicle-popup').find('form').clearForm();
                $('.customer').find('.selected-customer-outer').fadeOut(0,function() {
                    $('.customer-select').fadeIn();                            
                })
            }, 500);
        }
    );

    // Customer Vehicle popup  
    $(document).on('click','.add-customer-vehicle',function(e) { 

        e.preventDefault();

        const popup = '#'+$(this).attr('data-popup')
        $(popup).fadeIn('fast', function() {
            $(popup).addClass('show');
            $('body').css('overflow','hidden');
        });

        $('#add-vehicle-popup').addClass('edit-vehicle-popup');

        // Populate Customer Select Field
        $('.customer').find('.customer-select').fadeOut(0,function() {
            $('.selected-customer-outer').fadeIn();                            
        })
        
        // Customer field update        
        $('.selected-customer-outer .customer-name-val').text( $('input[name="first-name-1"]').val()+' '+$('input[name="last-name-1"]').val() );
        $('.selected-customer-outer .company-name-val').text( $('input[name="company-name"]').val() );
        $('.selected-customer-outer .contact-val').text( $('input[name="cell-number-1"]').val() );
        $('.selected-customer-outer .address-val').text( $('input[name="physical-address"]').val()+' '+$('input[name="suburb"]').val()+' '+$('input[name="city"]').val()+' '+$('input[name="province"]').val()+' '+$('input[name="postal-code"]').val() );
                
        // Populate the vehicle fields with the data
        const customerData = '{"customer-post-id":"'+$('input[name="customer-post-id"]').val()+'", "customer-name":"'+$('input[name="first-name-1"]').val()+' '+$('input[name="last-name-1"]').val()+'", "company-name":"'+$('input[name="company-name"]').val()+'", "email":"'+$('input[name="email-1"]').val()+'", "phone":"'+$('input[name="cell-number-1"]').val()+'", "address":"'+$('input[name="physical-address"]').val()+' '+$('input[name="suburb"]').val()+' '+$('input[name="city"]').val()+' '+$('input[name="province"]').val()+' '+$('input[name="postal-code"]').val()+'"}';
        $('.edit-vehicle-popup input[name="customer-data"]').val(customerData);

    }); 

    //Job Status
    $(document).on('click','.select-wrapper.job-status.active .options > span',function() {

        const value = $(this).data('value')
        const text = $(this).text()
        let nextValue = ''
        let nextText = ''
        
        $('#job-status').val(value)
        
        $('.select-wrapper.job-status .control-status').text(text).addClass('active-select')
        console.log("Changed",$('.control-fields .job-send'));
        switch (value) {
            case "draft":   
                nextValue = "quote-sent"          
                nextText = "Send Quote"   
                $('.control-fields .job-send').css('display','block')       
                break; 

            case "quote-sent": 
                nextValue = "quote-accepted"          
                nextText = "Quote Accepted" 
                $('.control-fields .job-send').css('display','block')                    
                break; 
                    
            case "quote-accepted":
                nextValue = "in-progress"          
                nextText = "In Progress" 
                $('.control-fields .job-send').css('display','block')
                break; 

            case "awaiting-parts":
                nextValue = "in-progress"          
                nextText = "In Progress" 
                $('.control-fields .job-send').css('display','block')
                break;  
                
            case "in-progress":
                nextValue = "completed"          
                nextText = "Complete & Invoice" 
                $('.control-fields .job-send').css('display','block')
                break; 
                    
            case "completed":
                nextValue = "awaiting-payment"          
                nextText = "Awaiting Payment"
                $('.control-fields .job-send').css('display','block')
                break;  

            case "awaiting-payment":
                nextValue = "paid-&-closed"          
                nextText = "Paid & Closed" 
                $('.control-fields .job-send').css('display','block')
                break;  
                
            case "paid-&-closed":
                nextValue = "paid-&-closed"          
                nextText = "Paid & Closed"
                $('.control-fields .job-send').css('display','none')
            break;    

            default:
                // alert("State not found... Look at quote-and-invoice.js switch statement for clues")
                break;
        }    

        $('.control-fields .job-send').attr('data-state',nextValue)
        $('.control-fields .job-send').text(nextText)
        
    })

    //Preferred Contact Method
    $(document).on('click','.select-wrapper.preferred-contact-method .options > span',function() {

        const text = $(this).text()
      
        $(this).closest('.select-wrapper').find('input.preferred-contact-method').val(text)
        
    })
    
    //Add Mechanic
    $(document).on('click','.select-wrapper.mechanics .options > span',function() {
        const self = $(this)
        let selectedMechanics = $('#selected-mechanics').val().length > 0 ? $('#selected-mechanics').val() : ''
        selectedMechanics.length > 0 ? selectedMechanics += `,${self.text().trim()}` : selectedMechanics = self.text().trim()
        $('#selected-mechanics').val() 
        $('#selected-mechanics').val(selectedMechanics) 

        let selectedMechanicMarkup = self.html()
        self.closest('.select-wrapper-outer').find('.assigned-mechanics').append(selectedMechanicMarkup)
        self.closest('.select-wrapper-outer').find('.assigned-mechanics .mechanic-inner').off()
        self.closest('.mechanic-outer').fadeOut()
    })

    //Remove selected mechanic
    $(document).on('click','.select-wrapper-outer .assigned-mechanics-outer .assigned-mechanics .mechanic-inner .close',function() {
        const self = $(this)
        let selectedMechanics = $('#selected-mechanics').val()
        const removedMechanic = self.closest('.mechanic').data('mechanic')

        if(selectedMechanics.indexOf(removedMechanic) > -1) {      
            if(selectedMechanics.indexOf(','+removedMechanic) > -1) {
                selectedMechanics = selectedMechanics.replace(','+removedMechanic,'')
            } else if(selectedMechanics.indexOf(removedMechanic+',')  > -1) {
                selectedMechanics = selectedMechanics.replace(removedMechanic+',','')
            } else {
                selectedMechanics = selectedMechanics.replace(removedMechanic,'')
            } 
        }
        
        $('#selected-mechanics').val() 
        $('#selected-mechanics').val(selectedMechanics) 

        const mechanicName = $(this).closest('.mechanic').data('mechanic')
        $(this).closest('.select-wrapper-outer').find(`.options > .mechanic-outer[data-mechanic="${mechanicName}"]`).fadeIn()
        $(this).closest('.mechanic-inner').remove()
    })

    //Fill job sub-totals on load if editing
    if($("#main > .editing").length > 0) {
        let labourVat = 0
        let labourLineTotal = 0
        Array.from($('#job-fields .form-row')).forEach(ele => {
            labourVat += Number($(ele).find('.vat-wrapper > input').val())
            labourLineTotal += Number($(ele).find('.line-total-wrapper > input').val())
        });
        console.log(labourVat,labourLineTotal);
        $('.section.labour-container .sub-total-outer .sub-total .value').text(`R${(labourLineTotal - labourVat).toFixed(2)}`)
        $('.section.labour-container .sub-total-outer .vat .value').text(`R${labourVat.toFixed(2)}`)
        $('.section.labour-container .sub-total-outer .total .value').text(`R${(labourLineTotal + labourVat).toFixed(2)}`)
        
        let partVat = 0
        let partLineTotal = 0
        Array.from($('#parts-fields .form-row')).forEach(ele => {
            partVat += Number($(ele).find('.vat-wrapper > input').val())
            partLineTotal += Number($(ele).find('.line-total-wrapper > input').val())
        });
        $('.section.parts-container .sub-total-outer .sub-total .value').text(`R${(partLineTotal - partVat).toFixed(2)}`)
        $('.section.parts-container .sub-total-outer .vat .value').text(`R${partVat.toFixed(2)}`)
        $('.section.parts-container .sub-total-outer .total .value').text(`R${(partLineTotal + partVat).toFixed(2)}`)
      
        updateTotalCosts('.section.labour-container','.section.parts-container')
    } 

    // Edit Vehicle Popop remove customer list options
    $(document).on('click', '.edit-vehicle-popup .customer .change-customer, .edit-vehicle-popup .customer .close', function(e) {
        $('input.selected-value, input[name="customer-data"]').val('').focus();
        $('.edit-vehicle-popup .customer .options.active li').fadeOut();
        $('.edit-vehicle-popup .customer .options.active').removeClass('active');
    });
  
    // Tabs 
    if($('.tab-container').length > 0) {

        $('.tab-item').hide();
        $('.tab-item:first-child').show();
        $('.tab-button:first-child').addClass('active');

        $(document).on('click','.tab-button',function() {
            // Hide all tab content 
            $(this).closest('.tab-container').children('.tab-content').children('.tab-item').hide();
    
            // Show the selected tab content 
            const tabId = $(this).data('tab');
            $(`#${tabId}`).fadeIn();
    
            // Optional: Add active class to the selected tab button
            $(this).siblings().removeClass('active');
            $(this).addClass('active');
    
        })

        // if url has a hash, show the tab 
        if(window.location.hash) {
            const tab = window.location.hash.replace('#','') + '-tab'
            $(`.tab-button[data-tab="${tab}"]`).click()
        }
    }

    //Display additional contact in customer form
    if($('.alternate-contact .title-button').length > 0) {
        let additionalDetails = $('.alternate-contact').hasClass('open') ? true : false

        $(document).on('click','.alternate-contact .title-button',function() {
            if(!additionalDetails) {
                $(this).closest('.alternate-contact').find('.alternate-contact-form').fadeIn()
                $(this).closest('.alternate-contact').addClass('open')
                additionalDetails = true
            } else {
                $(this).closest('.alternate-contact').find('.alternate-contact-form').fadeOut()
                $(this).closest('.alternate-contact').removeClass('open')
                additionalDetails = false
            }
        })
    }

    // Send Quote Email
    if($('#send-quote-form').length > 0) {

        $(document).on('click','.add-email-btn',function() {

            let emailCount = Number($(this).closest('.email-wrapper').siblings().length) + 1;

            console.log(emailCount)

            if( $(this).closest('.email-wrapper').siblings().length < 3) {
                $(this).closest('.input-label-wrapper').append(`
                    <div class="email-wrapper d-flex flex-align-center mt-2">
                        <input type="email" name="email` + emailCount + `" id="email` + emailCount + `" value="" class="required">
                        <div class="remove-email-btn ml-2">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M10 0C4.47715 0 0 4.47715 0 10C0 15.5228 4.47715 20 10 20C15.5228 20 20 15.5228 20 10C20 4.47715 15.5228 0 10 0ZM10 18.75C5.57963 18.75 1.25 14.4204 1.25 10C1.25 5.57963 5.57963 1.25 10 1.25C14.4204 1.25 18.75 5.57963 18.75 10C18.75 14.4204 14.4204 18.75 10 18.75ZM10 5C9.44772 5 9 5.44772 9 6V9H6C5.44772 9 5 9.44772 5 10C5 10.5523 5.44772 11 6 11H9V14C9 14.5523 9.44772 15 10 15C10.5523 15 11 14.5523 11 14V11H14C14.5523 11 15 10.5523 15 10C15 9.44772 14.5523 9 14 9H11V6C11 5.44772 10.5523 5 10 5Z" fill="#7A7A9D"></path>
                            </svg>
                        </div> 
                    </div>
                `);
            }
            
        })

        $(document).on('click','.remove-email-btn',function() {
            $(this).closest('.email-wrapper').remove();
        })
        
    }

    // Default quote message key words 
    function typeInTextarea(newText, el = document.activeElement) {
        const [start, end] = [el.selectionStart, el.selectionEnd];
        el.setRangeText(newText, start, end, 'select');
    }
    
    // on click of the button, insert the text into textarea
    $(document).on('click','.key-word',function(e) {
        e.preventDefault();
        let keyWord = $(this).data('key'); 
        let textarea = $(this).closest('.form-row').find('textarea')[0];
        typeInTextarea(keyWord, textarea);
    })

    //Redirect to job list
    $(document).on('click','.continue-to-job-list',function() {
        window.location.href = "/workshoppro/jobs/"
    })
    
    // limit the number of words in a textarea on keyup 
    $(document).on('keyup','[data-max-words]',function() { 
        const maxWords = $(this).data('max-words')
        const words = $(this).val().split(' ').length
        if(words > maxWords) {
            $(this).val($(this).val().split(' ').slice(0,maxWords).join(' '))
        }
    });

})



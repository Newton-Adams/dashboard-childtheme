'use strict'

jQuery(document).ready(function ($) {

    //Customer Select Dropdown
    if($('.job-select-wrapper.customer .customer-select').length > 0) {       

        let keyupTimeout
        let customerResultsActive = false
        let searching = false
        $(document).on('keyup','.selected-value',function() {
            const searchValue = $(this).val()            
            const self = $(this)

            //Prevent search from running until we stop typing for 2 seconds
            clearTimeout(keyupTimeout);

            //Set a new timeout
            keyupTimeout = setTimeout(function() {
            if(!searching) {
                searching = true
                
                //Add loader
                addLoader('.job-select-wrapper.customer')
                
                $.ajax({
                    type: "POST",
                    url: dashboard_obj.ajaxurl,
                    data: {
                        'action': 'fetch_customers_customer_select',
                        'search-val': searchValue,
                    },
                    success: function (response) {	

                        customerResultsActive = true
                        const customerData = JSON.parse(response)
              
                        let options = `<li class="add-new-customer" >
                            <a href="/workshoppro/customers/add-customer/">
                                <svg width="46" height="46" viewBox="0 0 46 46" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect width="46" height="46" rx="23" fill="#EDFFEB"/>
                                <mask id="mask0_2_12674" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="14" y="14" width="18" height="18">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M23 18.5C23.3107 18.5 23.5625 18.7518 23.5625 19.0625V22.4375H26.9375C27.2482 22.4375 27.5 22.6893 27.5 23C27.5 23.3107 27.2482 23.5625 26.9375 23.5625H23.5625V26.9375C23.5625 27.2482 23.3107 27.5 23 27.5C22.6893 27.5 22.4375 27.2482 22.4375 26.9375V23.5625H19.0625C18.7518 23.5625 18.5 23.3107 18.5 23C18.5 22.6893 18.7518 22.4375 19.0625 22.4375H22.4375V19.0625C22.4375 18.7518 22.6893 18.5 23 18.5Z" fill="black"/>
                                </mask>
                                <g mask="url(#mask0_2_12674)">
                                <rect x="14" y="14" width="18" height="18" fill="#009026"/>
                                </g>
                                </svg>
                                Add new customer
                            </a>
                        </li>`
                        
                        if(Object.keys(customerData).length > 0) {
                            Object.keys(customerData).forEach(customer => {
                                options += `<li 
                                data-customer-id='${customerData[customer]["customer_post_id"]}' 
                                data-company-name='${customerData[customer]["company-name"]}' 
                                data-address='${customerData[customer]["address"]}' 
                                data-name='${customerData[customer]["customer-name"]}' 
                                data-email='${customerData[customer]["email"]}' 
                                data-phone='${customerData[customer]["phone"]}' 
                                data-vehicle-all='${customerData[customer]["all-vehicle-values"]}'
                                >
                                    <svg width="46" height="46" viewBox="0 0 46 46" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect width="46" height="46" rx="23" fill="#F0F6FF"/>
                                        <mask id="mask0_2_12688" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="14" y="14" width="18" height="18">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M23 30.875C27.3492 30.875 30.875 27.3492 30.875 23C30.875 18.6508 27.3492 15.125 23 15.125C18.6508 15.125 15.125 18.6508 15.125 23C15.125 27.3492 18.6508 30.875 23 30.875ZM23 32C27.9706 32 32 27.9706 32 23C32 18.0294 27.9706 14 23 14C18.0294 14 14 18.0294 14 23C14 27.9706 18.0294 32 23 32Z" fill="black"/>
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M18.8204 24.7631C19.0893 24.6075 19.4334 24.6994 19.589 24.9683C20.2706 26.1467 21.5433 26.9375 23 26.9375C24.4568 26.9375 25.7294 26.1467 26.4111 24.9683C26.5667 24.6994 26.9108 24.6075 27.1797 24.7631C27.4486 24.9187 27.5405 25.2627 27.3849 25.5317C26.5104 27.0434 24.8746 28.0625 23 28.0625C21.1255 28.0625 19.4896 27.0434 18.6151 25.5317C18.4596 25.2627 18.5515 24.9187 18.8204 24.7631Z" fill="black"/>
                                        <path d="M21.875 21.3125C21.875 22.2445 21.3713 23 20.75 23C20.1287 23 19.625 22.2445 19.625 21.3125C19.625 20.3805 20.1287 19.625 20.75 19.625C21.3713 19.625 21.875 20.3805 21.875 21.3125Z" fill="black"/>
                                        <path d="M26.375 21.3125C26.375 22.2445 25.8713 23 25.25 23C24.6287 23 24.125 22.2445 24.125 21.3125C24.125 20.3805 24.6287 19.625 25.25 19.625C25.8713 19.625 26.375 20.3805 26.375 21.3125Z" fill="black"/>
                                        </mask>
                                        <g mask="url(#mask0_2_12688)">
                                        <rect x="14" y="14" width="18" height="18" fill="#18181A"/>
                                        </g>
                                    </svg>
                                    ${customerData[customer]["customer-name"]} 
                                </li>`
                            });
                        } else {
                            options += `<li class="no-customers" >
                                            <svg width="46" height="46" viewBox="0 0 46 46" fill="none" xmlns="http://www.w3.org/2000/svg" style="transform: rotate(180deg);" >
                                                <rect width="46" height="46" rx="23" fill="#F0F6FF"/>
                                                <mask id="mask0_2_12688" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="14" y="14" width="18" height="18">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M23 30.875C27.3492 30.875 30.875 27.3492 30.875 23C30.875 18.6508 27.3492 15.125 23 15.125C18.6508 15.125 15.125 18.6508 15.125 23C15.125 27.3492 18.6508 30.875 23 30.875ZM23 32C27.9706 32 32 27.9706 32 23C32 18.0294 27.9706 14 23 14C18.0294 14 14 18.0294 14 23C14 27.9706 18.0294 32 23 32Z" fill="black"/>
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M18.8204 24.7631C19.0893 24.6075 19.4334 24.6994 19.589 24.9683C20.2706 26.1467 21.5433 26.9375 23 26.9375C24.4568 26.9375 25.7294 26.1467 26.4111 24.9683C26.5667 24.6994 26.9108 24.6075 27.1797 24.7631C27.4486 24.9187 27.5405 25.2627 27.3849 25.5317C26.5104 27.0434 24.8746 28.0625 23 28.0625C21.1255 28.0625 19.4896 27.0434 18.6151 25.5317C18.4596 25.2627 18.5515 24.9187 18.8204 24.7631Z" fill="black"/>
                                                <path d="M21.875 21.3125C21.875 22.2445 21.3713 23 20.75 23C20.1287 23 19.625 22.2445 19.625 21.3125C19.625 20.3805 20.1287 19.625 20.75 19.625C21.3713 19.625 21.875 20.3805 21.875 21.3125Z" fill="black"/>
                                                <path d="M26.375 21.3125C26.375 22.2445 25.8713 23 25.25 23C24.6287 23 24.125 22.2445 24.125 21.3125C24.125 20.3805 24.6287 19.625 25.25 19.625C25.8713 19.625 26.375 20.3805 26.375 21.3125Z" fill="black"/>
                                                </mask>
                                                <g mask="url(#mask0_2_12688)">
                                                <rect x="14" y="14" width="18" height="18" fill="#18181A"/>
                                                </g>
                                            </svg>
                                            No matching customers found
                                        </li>`
                        }
                        self.closest('.customer-select').find('.options').addClass('active').html(options)
    
                        //Remove loader                        
                        removeLoader('.job-select-wrapper.customer')  
                        searching = false    
                    }
                });
            }

            }, 1500);
            
        })

         //Add customer option event listeners
         $(document).on('click','.job-select-wrapper.customer .options li:not(.add-new-customer):not(.no-customers)',function() {
            customerResultsActive = false     
            const customerID = $(this).data('customer-id')
            const customerName = $(this).data('name')
            const companyName = $(this).data('company-name')
            const contact = $(this).data('email')
            const phone = $(this).data('phone')
            const address = $(this).data('address')

            $('.selected-customer-outer .customer-name-val').text(customerName)
            $('.selected-customer-outer .company-name-val').text(companyName)
            $('.selected-customer-outer .contact-val').text(contact)
            $('.selected-customer-outer .address-val').text(address)

            //Complete hidden customer field
            const customerData = {
                "customer-post-id": customerID,
                "customer-name": customerName,
                "company-name": companyName,
                "email": contact,
                "phone": phone,
                "address": address,
            }
            $('input[name="customer-data"]').val(JSON.stringify(customerData))                        
            
            //Build out vehicle options
            vehicleOptions( $(this) )  

            //Append selected customer markup & hide search field.
            $(this).closest('.job-select-wrapper.customer').find('.customer-select').fadeOut(0,function() {
                $('.selected-customer-outer').fadeIn()                            
                validateInput( $(this).closest('.job-select-wrapper.customer').find('input[type="hidden"][name="customer-data"]') )                
            })
        })

        //Change customer event
        $(document).on('click','.change-customer, .selected-customer-outer .close',function() {  
            customerResultsActive = true
            //Remove selected vehicle & options if they exists
            $('.job-select-wrapper.vehicle .options > li, .job-select-wrapper.vehicle .pre-vehicle-selection .options li').remove()
            $('.job-select-wrapper.vehicle .no-customer-selected').fadeIn()
            $('.job-select-wrapper.vehicle .pre-vehicle-selection, .job-select-wrapper.vehicle .selected-vehicle-outer').fadeOut()
                                               
            //Make search results active again
            $('.job-select-wrapper.customer .options').addClass('active')
            $('.job-select-wrapper.customer .options.active li').fadeIn()

            $(this).closest('.job-select-wrapper').find('.customer-select').fadeIn()
            $(this).closest('.job-select-wrapper').find('.selected-customer-outer').fadeOut()
            
        })

        //Add change vehicle event listener
        $(document).on('click','.job-select-wrapper.vehicle .change-vehicle',function changeVehicle() {
            customerResultsActive = false
            $('.pre-vehicle-selection').fadeIn(0)
            $('.selected-vehicle-outer').fadeOut(0)
        })

        //Vehicle Options - If only one vehicle exists then autofill the selected vehicle fields, but still populate the vehicle options without showing them
        function vehicleOptions(self) {
            const dataValues = self.data()   
            const allVehicles = dataValues['vehicleAll']
            let vehicleOptions = ""
            
            Object.keys(allVehicles).forEach(function(vin) {
                vehicleOptions += `<li 
                data-vin="${vin}"   
                data-mileage="${allVehicles[vin]['mileage']}" 
                data-make="${allVehicles[vin]['make']}" 
                data-model="${allVehicles[vin]['model']}" 
                                            data-vehicle-all='${ JSON.stringify(allVehicles[vin]) }' 
                                            >
                                            <p class="make-model" > ${allVehicles[vin]['make']} / ${allVehicles[vin]['model']} / ${allVehicles[vin]['colour']} </p>
                                            <p class="registration" > ${allVehicles[vin]['registration']} </p>
                                        </li>`;
            })
            $('.no-customer-selected').fadeOut(0)
            $('.job-select-wrapper.vehicle .options > li').remove()
            $('.job-select-wrapper.vehicle .options').html( vehicleOptions )                 
          
            if(Object.keys(allVehicles).length === 1) {
                Object.keys(allVehicles).forEach(function(vin) {
                    
                    customerResultsActive = false
                
                    //Complete hidden vehicle fields
                    $('input[name="vehicle-registration"]').val(allVehicles[vin]['registration'])
                    $('input[name="vehicle-vin"]').val(vin)         
                    $('input[name="vehicle-data"]').val( `{"${vin}":${JSON.stringify(allVehicles[vin])}}` )         

                    $('.vehicle-select .pre-vehicle-selection').fadeOut(function() {
                        $('.selected-vehicle-outer .make-model-val').text(allVehicles[vin]['make'] + ', ' + allVehicles[vin]['model'])
                        $('.selected-vehicle-outer .vehicle-details .mileage-val').text("Mileage: " + allVehicles[vin]['mileage'])
                        $('.selected-vehicle-outer .vehicle-details .vin-val').text("VIN: " + vin)
                        $('.selected-vehicle-outer .vehicle-details .registration-val').text("License Number: " + allVehicles[vin]['registration'])
                        $('.no-customer-selected').fadeOut(0)
                        $('.vehicle-select .pre-vehicle-selection').fadeOut(0,function() {    
                            $('.selected-vehicle-outer').fadeIn()
                            $('.job-select-wrapper.vehicle .vehicle-select').fadeIn()
                        })
                    })
                })
                $('.vehicle-select .pre-vehicle-selection').length > 0 && validateInput( $('.vehicle-select .pre-vehicle-selection').closest('.forms-container').find('input[type="hidden"][name="vehicle-data"]') )
            } else {
                $('.vehicle-select .pre-vehicle-selection').length > 0 && validateInput( $('.vehicle-select .pre-vehicle-selection').closest('.forms-container').find('input[type="hidden"][name="vehicle-data"]') )
                $('.job-select-wrapper.vehicle .vehicle-select .pre-vehicle-selection').fadeIn()
                $('.job-select-wrapper.vehicle .vehicle-select').fadeIn()
            }            
            
        }

        //Add vehicle option event listeners
        $(document).on('click','.job-select-wrapper.vehicle .pre-vehicle-selection > .options > li',function() {
            customerResultsActive = false
            const selectedVin = $(this).data("vin")
            const selectedVehicleData = JSON.stringify($(this).data("vehicle-all"))
            const selectedMakeModel = $(this).find(".make-model").text()
            const selectedMileage = $(this).data("mileage")
            const selectedRegistration = $(this).find(".registration").text()
        
            //Complete hidden vehicle fields
            $('input[name="vehicle-registration"]').val(selectedRegistration)
            $('input[name="vehicle-vin"]').val(selectedVin)         
            $('input[name="vehicle-data"]').val(`{"${selectedVin}":${selectedVehicleData}}`)         

            $('.vehicle-select .pre-vehicle-selection').fadeOut(function() {
                $('.selected-vehicle-outer .make-model-val').text(selectedMakeModel)
                $('.selected-vehicle-outer .vehicle-details .mileage-val').text(selectedMileage)
                $('.selected-vehicle-outer .vehicle-details .vin-val').text(selectedVin)
                $('.selected-vehicle-outer .vehicle-details .registration-val').text(selectedRegistration)
                $('.selected-vehicle-outer').fadeIn()
                validateInput( $('.vehicle-select .pre-vehicle-selection').closest('.forms-container').find('input[type="hidden"][name="vehicle-data"]') )
            })
        })

        //Todo: add vehicle popup to this event
        $(document).on('click','.job-select-wrapper .add-new-vehicle',function(e) {
        
            e.preventDefault(); 

            let vehicleData = $('input[name="customer-data"]').val();
            vehicleData = JSON.parse(vehicleData);

            const popup = '#'+$(this).attr('data-popup')
            $(popup).fadeIn('fast', function() {
                $(popup).addClass('show');
                $('body').css('overflow','hidden');
            });
    
            $('#add-vehicle-popup').addClass('job-add-vehicle-popup');
    
            // Populate Customer Select Field
            $('.customer').find('.customer-select').fadeOut( 0, function() { 
                console.log('customer select fadeout')
                $('.selected-customer-outer').fadeIn(); 
            })
            
            // Customer field update        
            $('.job-add-vehicle-popup .selected-customer-outer .customer-name-val').text( vehicleData['customer-name'] );
            $('.job-add-vehicle-popup .selected-customer-outer .company-name-val').text( vehicleData['company-name'] );
            $('.job-add-vehicle-popup .selected-customer-outer .contact-val').text( vehicleData['email'] );
            $('.job-add-vehicle-popup .selected-customer-outer .address-val').text( vehicleData['address'] );
                    
            // Populate the vehicle fields with the data
            $('.job-add-vehicle-popup input[name="customer-data"]').val($('input[name="customer-data"]').val());

        })

        // Add to selected vehicle 
        $(document).on('click','.selected-vehicle-add',function(e) {

            e.preventDefault();

            customerResultsActive = false
            $('.pre-vehicle-selection').fadeIn(0)
            $('.selected-vehicle-outer').fadeOut(0)

            const popup = '#'+$(this).attr('data-popup')
            $(popup).fadeIn('fast', function() {
                $(popup).addClass('show');
                $('body').css('overflow','hidden');
            });
    
            $('#add-vehicle-popup').addClass('job-add-vehicle-popup');

        })

        // Close dropdown on clickoff
        $(document).on('click',function(e) {
            if( !$(e.target).closest('.customer-select').length > 0 && !$(e.target).closest('.selected-customer-outer .change-customer').length > 0 && !$(e.target).closest('.selected-customer-outer .close').length > 0) { 
                $('.job-select-wrapper.customer .options.active li').fadeOut()
                $('.job-select-wrapper.customer .options.active').removeClass('active') 
            } 
        })
    }

    //Mechanics Save/Edit Ajax
    $(document).on('click','#save-post.technicians-save',function() {

        // Validate 
        if( !validateFormSubmit() ) {            
            return false
        }

        addLoader('.add-staff-outer .add-row-button-outer')
        
        //Labour Rows
        const mechanicsData = $("#add-staff").serialize()

        if(mechanicsData.length > 0) {
            $.ajax({
                type: "POST",
                url: dashboard_obj.ajaxurl,
                data: {
                    'action': 'insert_mechanics',
                    'staff-member': mechanicsData,
                },
                success: function (response) {	
                    removeLoader('.add-staff-outer .add-row-button-outer'); 
                    
                    // Reload the vehicle table 
                    var table = $('#staff-table').DataTable();
                    table.ajax.reload();

                    // Clear the form 
                    $('#add-staff')[0].reset();
                }
            });
        } else {
            removeLoader('.add-staff-outer .add-row-button-outer')
        }
    })

    //Job Save/Edit Ajax
    $(document).on('click','#save-post.job-save, .job-send',function(event) { 

        event.preventDefault(); 
        
        const self = $(this)

        progressPopup('saving','start')
        
        // Validate 
        let valid = true;
        let requiredInputs = Array.from(document.querySelectorAll('.jobno-customer-vehicle input.required'))
        let i = 0;
        requiredInputs.forEach(function(input) {
            if (input.value.length === 0 ) {
                let inputWrapper = input.closest('.input-label-wrapper');
                // removeErrorMessage(input);
                input.classList.remove('error');
                let errorMessage = inputWrapper.querySelector('.error-message');
                
                if (errorMessage) {
                    inputWrapper.removeChild(errorMessage);
                }
                // addErrorMessage(input, 'This field is required');
                let message = 'This field is required';
                input.classList.add('error');
                inputWrapper.insertAdjacentHTML('beforeend', '<span class="error-message">'+message+'</span>');

                if(i === 0) { 
                    input.focus();
                    i++;
                }
                valid = false;
            } else {
                // removeErrorMessage(input);
                input.classList.remove('error');
                let inputWrapper = input.closest('.input-label-wrapper');
                let errorMessage = inputWrapper.querySelector('.error-message');
                if (errorMessage) {
                    inputWrapper.removeChild(errorMessage);
                }
            }
        });
        
        if( !valid ) {
            return false    
        }
        
        //Job single data
        const existingJobID = $('input#job-id').val()
        const jobNumber = $('input#job-number').val()        
        // const postDate = $('#booking-date').closest('.input-label-wrapper').find('.wm-date-picker').val()
        
        //Customer hidden fields
        const customerData = $('input[name="customer-data"]').val()
        
        //Vehicle hidden fields
        const vehicleRegistration = $('input[name="vehicle-registration"]').val()
        const vehicleVIN = $('input[name="vehicle-vin"]').val()
        const vehicleData = $('input[name="vehicle-data"]').val()

        //Cost
        let jobGrandTotal = $("input#grand-total-value").val().replace('R','')

        //Notes & Attachments Rows
        let jobAttachments = $("#attachments-obj").val()
        const jobJobNotes = $("#job-notes").serialize()

        //Labour Rows
        const labourFieldForm = document.getElementById("job-fields")
        const formData = new FormData(labourFieldForm);
        
        let labourRowArray = []
        let labourKeyAndValue = {}
        let labourSortedFormData = {}
        let labourI = 0
        let labourRowNum = 0
        //The loop count is based on the number of fields in the form
        for (const pair of formData.entries()) {                
            if(labourI < 6) {
                labourKeyAndValue = {}
                const pairkey = pair[0]
                const pairValue = pair[1]
                if (labourKeyAndValue[pairkey] === undefined) {
                    labourKeyAndValue[pairkey] = "";
                }
                labourKeyAndValue[pairkey] += pairValue
                labourRowArray.push(labourKeyAndValue)
                labourI++
                if(labourI === 6) {
                    labourI = 0
                    labourSortedFormData[`row-${labourRowNum}`] = labourRowArray
                    labourRowArray = []
                    labourRowNum++
                }
            } 
        }

        //Parts Rows
         const partsFieldForm = document.getElementById("parts-fields");
         const partsFormData = new FormData(partsFieldForm);
         
         let partsRowArray = []
         let partsKeyAndValue = {}
         let partsSortedFormData = {}
         let partsI = 0
         let partsRowNum = 0
         //The loop count is based on the number of fields in the form
         for (const pair of partsFormData.entries()) {                
             if(partsI < 8) {
                 partsKeyAndValue = {}
                 const pairkey = pair[0]
                 const pairValue = pair[1]
                 if (partsKeyAndValue[pairkey] === undefined) {
                     partsKeyAndValue[pairkey] = "";
                 }
                 partsKeyAndValue[pairkey] += pairValue
                 partsRowArray.push(partsKeyAndValue)
                 partsI++
                 if(partsI === 8) {
                     partsI = 0
                     partsSortedFormData[`row-${partsRowNum}`] = partsRowArray
                     partsRowArray = []
                     partsRowNum++
                 }
             } 
         }

        //Booking Fields
        const bookingFields = $('#booking-fields').serialize()

        //Mechanics Field
        const mechanicField = $('#selected-mechanics').val()
        
        //Give the js a moment to update the inputs value
        let jobStatus = $(self).hasClass('job-send') ? self.attr('data-state') : self.closest('.control-fields').find('#job-status').val()
        console.log("JS before save ",jobStatus,self,$(self).hasClass('job-send'))

        $.ajax({
            type: "POST",
            url: dashboard_obj.ajaxurl,
            data: {
                'action': 'post_jobs',
                // 'post-date': postDate,
                'labour-data': labourSortedFormData,
                'parts-data': partsSortedFormData,
                'job-number': jobNumber,
                'job-notes': jobJobNotes,
                'attachments': jobAttachments,
                'vin': vehicleVIN,
                'registration': vehicleRegistration,
                'customer-data': customerData,
                'vehicle-data': vehicleData,
                'booking-fields': bookingFields,
                'existing-job-id': existingJobID,
                'job-status': jobStatus,
                'grand-total': jobGrandTotal,
                'mechanics': mechanicField,
            },
            success: function (response) {	   

                const dataStateWhenInitiallyClicked = jobStatus

                //Saving Overlay
                progressPopup('saving','complete')

                if( (dataStateWhenInitiallyClicked === 'quote-sent' || dataStateWhenInitiallyClicked === 'completed') && response.length > 0 && $(self).hasClass('job-send') ) {

                    const jobData = JSON.parse(response);
                    let send_quote_message, send_quote_subject
                    $('#job-id').val(jobData['job_id'])
                    
                    if(dataStateWhenInitiallyClicked == 'completed') {
                        send_quote_message = $('#send-quote-popup #invoice-message').val();
                        send_quote_subject = $('#send-quote-popup #invoice-subject').val();
                        $('#send-quote-form .popup-title').text('Send Invoice')
                        $('#submit-quote-invoice').text('Send Invoice')
                        // Hide the quote fields
                        $('#send-quote-form .input-label-wrapper.quote-message').hide()
                        $('#send-quote-form .input-label-wrapper.quote-subject').hide()
                        // Show the invoice fields 
                        $('#send-quote-form .input-label-wrapper.invoice-message').show()
                        $('#send-quote-form .input-label-wrapper.invoice-subject').show()
                    } else {
                        send_quote_message = $('#send-quote-popup #quote-message').val();
                        send_quote_subject = $('#send-quote-popup #quote-subject').val();
                        $('#send-quote-form .popup-title').text('Send quote')
                        $('#submit-quote-invoice').text('Send Quote')
                        // Hide the invoice fields
                        $('#send-quote-form .input-label-wrapper.invoice-message').hide()
                        $('#send-quote-form .input-label-wrapper.invoice-subject').hide()
                        // Show the quote fields
                        $('#send-quote-form .input-label-wrapper.quote-message').show()
                        $('#send-quote-form .input-label-wrapper.quote-subject').show()
                    }                        
                    // replace [Customer_Name]
                    send_quote_message = send_quote_message.replace( '[Customer_Name]', jobData['customer-name'] )
                    // replace [quote]
                    send_quote_subject = send_quote_subject.replace( '[quote]', $('#job-number').val() )
                    send_quote_message = send_quote_message.replace( '[quote]', $('#job_number').val() )
                    // replace [invoice] 
                    send_quote_subject = send_quote_subject.replace( '[invoice]', $('#job_number').val() ) 
                    send_quote_message = send_quote_message.replace( '[invoice]', $('#job_number').val() )
                    // replace [workshop_email]
                    send_quote_message = send_quote_message.replace( '[workshop_email]', $('#workshop_email').text() )
                    // replace [workshop_number]
                    send_quote_message = send_quote_message.replace( '[workshop_number]', $('#workshop_number').text() )
                    // replace [Job_number] 
                    send_quote_subject = send_quote_subject.replace( '[Job_Number]', $('#job_number').text() )
                    send_quote_message = send_quote_message.replace( '[Job_Number]', $('#job_number').text() )
                    // replace [company_name] 
                    send_quote_subject = send_quote_subject.replace( '[company_name]', jobData['customer-name'] )
                    send_quote_message = send_quote_message.replace( '[company_name]', jobData['customer-name'] )
                
                    // Populate Fields
                    $('#send-quote-form input[name="email"]').val(jobData['email']);
                    $('#send-quote-form input[name="whatsapp"]').val(jobData['whatsapp']);
                    
                    dataStateWhenInitiallyClicked == 'completed' ? $('#send-quote-form').find('#invoice-subject').val(send_quote_subject) : $('#send-quote-form').find('#quote-subject').val(send_quote_subject);
                    
                    dataStateWhenInitiallyClicked == 'completed' ? $('#send-quote-form').find('textarea#invoice-message').val(send_quote_message) : $('#send-quote-form').find('textarea#quote-message').val(send_quote_message);
                    
                    $( '#send-quote-popup' ).fadeIn('fast', function() {
                        $( '#send-quote-popup' ).addClass('show')
                        $('body').css('overflow','hidden')
                    })                   

                } else {
                    $('input[name="content-changed"]').prop('checked',false)
                    window.location.href = "/workshoppro/jobs/" 
                }

            },
            error: function (xhr) {
                xhr.status === 500 ? $('.alert-popup-outer.error .warning-title').html(`There was a 500 internal server error and the post did not save, please contact support @ <a href="mailto:sfjha@fdsf.com">sfjha@fdsf.com</a> or call <a href="tel:1231231234">1231231234</a>`) : $('.alert-popup-outer.error .warning-title').text("There was an error and the post did not save, please retry saving")
                $('.alert-popup-outer.error').fadeIn(function() {

                })           
            }
        });
     

        //Delete attachment files from folder (The saving of attachment json is handled in te main ajax function above)
        const attachment_file_url = $('#delete-attachments').val()
        
        $.ajax({
            type: "POST",
            url: dashboard_obj.ajaxurl,
            data: {
                'action': 'delete_file',
                'file_url': attachment_file_url,
            },
            success: function (response) {
                //Update JSON
                removeLoader(self)
            },
        });
    })

    //New Customer Save/Edit Ajax 
    $(document).on('click','#save-post.customer-save',function(event) {
        event.preventDefault()

        // Validate 
        if( !validateFormSubmit('#add-vehicle-form') ) {
            return false
        }

        //Customer Name/ID & Card no.
        const customerName = $('#first-name-1').val() + ' ' + $('#last-name-1').val()
        const existingCustomerPostID = $('input#customer-post-id').val()
        
        //Company Fields
        const companyDetails = $('#company-fields').serialize()
        
        //Customer Details Fields
        const customerDetails = $('#customer-details').serialize()

        //Vehicle Fields
        const vehicleName = `${ $('#make').val() } / ${$('#model').val()} / ${$('#colour').val()}`
        const customerVehicle = $('#vehicle-fields').serialize()
        const vehicleAttachments = $('#attachments-obj').val()
       
        //Notes Fields
        const customerNotes = $('#customer-notes textarea').val()
        
        //Saving progress popup
        progressPopup('saving','start')

        $.ajax({
            type: "POST",
            url: dashboard_obj.ajaxurl,
            data: {
                'action': 'post_customers',
                'customer-name': customerName,
                'customer-post-id': existingCustomerPostID,
                'company-details': companyDetails,
                'customer-details': customerDetails,
                'vehicle-name': vehicleName,
                'customer-vehicles': customerVehicle,
                'vehicle-attachments': vehicleAttachments,
                'customer-notes': customerNotes,
            },
            success: function (response) {	
                $('input[name="content-changed"]').prop('checked',false) 
                window.location.href = "/workshoppro/customers/"
                
                //Saving Popup
                $('.ajax-progress-popup-outer').fadeOut(function() {
                    $('.ajax-progress-popup-outer').removeClass('active')
                })
            },
            error: function (xhr) {
                xhr.status === 500 ? $('.alert-popup-outer.error .warning-title').html(`There was a 500 internal server error and the post did not save, please contact support @ <a href="mailto:sfjha@fdsf.com">sfjha@fdsf.com</a> or call <a href="tel:1231231234">1231231234</a>`) : $('.alert-popup-outer.error .warning-title').text("There was an error and the post did not save, please retry saving")
                $('.alert-popup-outer.error').fadeIn(function() {

                })           
            }
        });
    })

    
    $(document).on('click','#csvData button',function() {  
        let csvChunks = []
        const chunkCount = Math.ceil(window.customerCsv.length / 20)
        let completedChunks = 0
        let row = 0
        
        function insertPosts() {
            $('.loading-elipses').addClass('active')
            for (let i = 0; i < 20; i++) {               
                window.customerCsv[row] && csvChunks.push(window.customerCsv[row])
                row++
                $(`.bar > .segment:nth-child(${completedChunks + 1})`).addClass('loading')
                
                if(i === 19) {
                    $.ajax({
                        type: "POST",
                        url: dashboard_obj.ajaxurl,
                        data: {
                            'action': 'insert_csv_customers',
                            'csv-customer-data': csvChunks,
                        },
                        success: function (response) {
                            i = 0
                            completedChunks++
                            csvChunks = []
                            $(`.bar > .segment`).css('max-width',`${(100 / chunkCount) * completedChunks}%`)
                           
                            if(completedChunks < chunkCount) {
                                insertPosts()
                            } else {
                                setTimeout(() => {
                                    $('#csvData h3').fadeOut(300)
                                    $('#csvData button').fadeOut(300)
                                    $('.csv-table').fadeOut(300,function(){
                                        $('.loading-elipses').removeClass('active')
                                        $(this).html('<p>Customers upload progress: <strong>Complete!</strong></p>').fadeIn()
                                    })
                                    window.customerCsv = undefined
                                    delete(window.customerCsv)	
                                }, 3000); 
                            }                            
                        }
                    });
                }         
            }
        }
        insertPosts()
        
    })

    // Profile Picture Upload 
    $(document).on('change', '#profile_picture', function(e) {
        const file = e.target.files[0];
        
        if (!file) return;
        
        let formData = new FormData();
        formData.append('action', 'upload_profile_picture');
        formData.append('profile_picture', file);
        
        //Loader
        addLoader('.profile-image')
        
        $.ajax({
            type: 'POST',
            url: dashboard_obj.ajaxurl,
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                if (response.success) {

                    // Handle successful file upload
                    const { name, url } = response.data;

                    removeLoader('.profile-image')

                    // Update the profile picture with the new URL
                    $('.profile-image img').attr('src', url);

                } else {

                    // Handle error
                    console.error(response.data.message);

                }
            },
            error: function () {

                // Handle AJAX request failure
                console.error('An error occurred during the file upload.');

                removeLoader('.profile-image')

            }
        });
    });

    
    //Job attachments
    $(document).on('change','#attachment', function(e) {
        const file = e.target.files[0];
        const self = $(this)
        if (!file) return;
        let attachmentFormData = new FormData();
        attachmentFormData.append('action', 'upload_attachment');
        attachmentFormData.append('attachment', file);
        
        //Loader
        addLoader('.form-row.attachments label')

        $.ajax({
            type: "POST",
            url: dashboard_obj.ajaxurl,
            data: attachmentFormData,
            processData: false,
            contentType: false,
            success: function (response) {  

                // Show Table 
                $('#attachment-files').slideDown();
                
                //New Attachments
                let concatenatedFiles = {}
                const files = JSON.parse(response)
                let name = files[0][0]
                const tmp_name = files[0][1]
                const url = files[0][2]
                
                //Existing Attachments
                let jobAttachments = $("#attachments-obj").val()
                if(jobAttachments.length > 0) {
                    jobAttachments = JSON.parse(jobAttachments)
                    //First add existing attachments
                    console.log(jobAttachments);
                    Object.keys(jobAttachments).forEach(key => {
                        concatenatedFiles[key] = jobAttachments[key]
                    });
                }
                

                //Rename new attachment if name is used
                const existingAttchmentsCount = Object.keys(concatenatedFiles)                
                if(existingAttchmentsCount.includes(name)) {
                    for (let i = 0; i <= existingAttchmentsCount.length; i++) {
                
                        //TODO:Change to recursive function instead of for
                        if(!existingAttchmentsCount.includes(`${name}-${i}`)) {
                            concatenatedFiles[`${name}-${i}`] = [name,tmp_name,url]
                            name = `${name}-${i}`
                            break
                        } else {
                            concatenatedFiles[name] = [name,tmp_name,url]   
                            break     
                        }   
                    }
                } else {
                    concatenatedFiles[name] = [name,tmp_name,url]
                }
           
                //Append new attachment to table
                const newTableRow = `
                <tr>
                    <td>
                    <a href="${url}" target="_blank" >${name}</a>
                    <input type="hidden" class="hidden-attachment-values" name="hidden-attachment" value="${tmp_name}" >
                    </td>
                    <td class="delete" attachment_id="${name}" >
                        <svg width="14" height="17" viewBox="0 0 14 17" fill="none" xmlns="http:www.w3.org/2000/svg">
                            <path d="M4.30769 6.36667C4.60508 6.36667 4.84615 6.60545 4.84615 6.9V13.3C4.84615 13.5946 4.60508 13.8333 4.30769 13.8333C4.01031 13.8333 3.76923 13.5946 3.76923 13.3V6.9C3.76923 6.60545 4.01031 6.36667 4.30769 6.36667Z" fill="#7A7A9D"></path>
                            <path d="M7 6.36667C7.29738 6.36667 7.53846 6.60545 7.53846 6.9V13.3C7.53846 13.5946 7.29738 13.8333 7 13.8333C6.70262 13.8333 6.46154 13.5946 6.46154 13.3V6.9C6.46154 6.60545 6.70262 6.36667 7 6.36667Z" fill="#7A7A9D"></path>
                            <path d="M10.2308 6.9C10.2308 6.60545 9.98969 6.36667 9.69231 6.36667C9.39492 6.36667 9.15385 6.60545 9.15385 6.9V13.3C9.15385 13.5946 9.39492 13.8333 9.69231 13.8333C9.98969 13.8333 10.2308 13.5946 10.2308 13.3V6.9Z" fill="#7A7A9D"></path>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M14 3.7C14 4.2891 13.5178 4.76667 12.9231 4.76667H12.3846V14.3667C12.3846 15.5449 11.4203 16.5 10.2308 16.5H3.76923C2.57969 16.5 1.61538 15.5449 1.61538 14.3667V4.76667H1.07692C0.482155 4.76667 0 4.2891 0 3.7V2.63333C0 2.04423 0.482155 1.56667 1.07692 1.56667H4.84615C4.84615 0.977563 5.32831 0.5 5.92308 0.5H8.07692C8.67169 0.5 9.15385 0.977563 9.15385 1.56667H12.9231C13.5178 1.56667 14 2.04423 14 2.63333V3.7ZM2.81942 4.76667L2.69231 4.82962V14.3667C2.69231 14.9558 3.17446 15.4333 3.76923 15.4333H10.2308C10.8255 15.4333 11.3077 14.9558 11.3077 14.3667V4.82962L11.1806 4.76667H2.81942ZM1.07692 3.7V2.63333H12.9231V3.7H1.07692Z" fill="#7A7A9D"></path>
                        </svg>
                    </td>
                </tr>`

                removeLoader('.form-row.attachments label')
              
                $('#attachments-obj').val(JSON.stringify(concatenatedFiles))

                //Add new attachment to table
                $('#attachment-files tbody').append(newTableRow)            
                self.val('')
            },
            error: function (xhr, status, error) {
                alert('Error uploading file: ' + error);
            }
        });
    });
    
    
    //Delete upload file
    $(document).on('click','#attachment-files .delete',function() {
        let self = $(this)
        const attachment_file_url = self.closest('tr').find('a').attr('href')
        const attachment_file_name = self.attr('attachment_id')
        let attachmentObj = JSON.parse($('#attachments-obj').val())
        delete attachmentObj[attachment_file_name]        
        
        $('#attachments-obj').val( JSON.stringify(attachmentObj) )
        
        //Add attachment url to delete field to delete later
        let attchmentsToDelete = []
        if($('#delete-attachments').val().length > 0) {
            attchmentsToDelete.push($('#delete-attachments').val() + ',',attachment_file_url)
        } else {
            attchmentsToDelete.push(attachment_file_url)
        }

        $('#delete-attachments').val(attchmentsToDelete)        
        self.closest('tr').fadeOut().remove()
      
    });

    // Profile Form update 
    $('#profile-form').submit(function(e) { 
        
        e.preventDefault();

        const self = $(this); 

        // Validate 
        if( !validateFormSubmit('#add-staff') ) {
            return false
        }

        var formData = $(this).serialize();
        const profileFormNonce = $('#profile-form input[name="profile_form_nonce"]').val();
        
        
        //Saving progress popup
        progressPopup('saving','start')

        $.ajax({
            type: 'POST',
            url: dashboard_obj.ajaxurl,
            data: {
                action: 'update_profile',
                formData: formData, 
                profile_form_nonce: profileFormNonce
            },
            success: function(response) { 
                
                //Saving Overlay
                progressPopup('saving','complete')
                
                let profileFormComplete = true

                $('#profile-form input').each(function() {
                    if ( 
                        $(this).val() === '' && 
                        $(this).attr('name') !== 'miwa_member' && 
                        $(this).attr('name') !== 'profile_picture' && 
                        $(this).attr('name') !== 'profile_form_nonce' && 
                        $(this).attr('name') !== 'vat_number' && 
                        $(this).attr('name') !== 'company_registration_number'
                    ) {
                        profileFormComplete = false
                    }
                });
                
                if (profileFormComplete) {
                    
                    $('#profile-form').closest('.add-business-info').addClass('completed');
                    $('#profile-form').closest('.add-business-info').find('.icon-col').html('<svg width="60" height="61" viewBox="0 0 60 61" fill="none" xmlns="http://www.w3.org/2000/svg"><rect y="0.662109" width="60" height="60" rx="30" fill="#009026"></rect><path fill-rule="evenodd" clip-rule="evenodd" d="M37.6854 23.9755C38.0841 24.4299 38.0841 25.1666 37.6854 25.6209L29.5173 37.2555C29.1185 37.7099 28.4721 37.7099 28.0733 37.2555L22.6692 31.0975C22.2704 30.6431 22.2704 29.9064 22.6692 29.4521C23.0679 28.9977 23.7144 28.9977 24.1131 29.4521L28.7953 34.7875L36.2415 23.9755C36.6402 23.5212 37.2867 23.5212 37.6854 23.9755Z" fill="white"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M35.7025 23.8726C36.2819 23.2209 37.2214 23.2209 37.8008 23.8726C38.3731 24.5163 38.3802 25.5551 37.8219 26.2086L29.924 37.3126C29.9126 37.3286 29.9004 37.3439 29.8875 37.3584C29.3081 38.0102 28.3687 38.0102 27.7892 37.3585L22.5537 31.4697C21.9743 30.818 21.9743 29.7613 22.5537 29.1096C23.1332 28.4579 24.0726 28.4579 24.652 29.1096L28.7937 33.768L35.6631 23.9225C35.6753 23.905 35.6885 23.8883 35.7025 23.8726Z" fill="white"></path></svg>');
                    $('#profile-form').closest('.add-business-info').find('.add-business-btn').click();

                } else {

                    $('#profile-form').closest('.add-business-info').removeClass('completed');
                    $('#profile-form').closest('.add-business-info').find('.icon-col').html('<svg width="60" height="61" viewBox="0 0 60 61" fill="none" xmlns="http://www.w3.org/2000/svg"><rect y="0.162109" width="60" height="60" rx="30" fill="#EDFFEB"/><path fill-rule="evenodd" clip-rule="evenodd" d="M18 30.1621C18 23.5347 23.3726 18.1621 30 18.1621C36.6274 18.1621 42 23.5347 42 30.1621C42 36.7895 36.6274 42.1621 30 42.1621C23.3726 42.1621 18 36.7895 18 30.1621ZM29.25 19.7769C28.2459 20.084 27.2469 21.0079 26.4191 22.5601C26.2044 22.9626 26.006 23.3999 25.8266 23.8675C26.8843 24.1035 28.0357 24.2538 29.25 24.2979V19.7769ZM24.3728 23.4713C23.7211 23.2588 23.1194 23.0114 22.5772 22.7357C23.5465 21.7668 24.7043 20.9866 25.9909 20.4546C25.6629 20.8807 25.3637 21.3516 25.0956 21.8542C24.829 22.354 24.5871 22.8951 24.3728 23.4713ZM23.2627 29.4121H19.5264C19.6716 27.3546 20.4096 25.4607 21.5707 23.9003C22.2747 24.2866 23.063 24.6226 23.9172 24.9005C23.5453 26.281 23.3171 27.8071 23.2627 29.4121ZM25.363 25.3004C26.5756 25.5805 27.8853 25.7525 29.25 25.7988V29.4121H24.7636C24.8174 27.9316 25.0293 26.5418 25.363 25.3004ZM30.75 25.7988V29.4121H35.2364C35.1825 27.9316 34.9707 26.5418 34.637 25.3004C33.4244 25.5805 32.1147 25.7525 30.75 25.7988ZM24.7636 30.9121H29.25V34.5254C27.8853 34.5717 26.5756 34.7437 25.363 35.0238C25.0293 33.7824 24.8174 32.3926 24.7636 30.9121ZM30.75 30.9121V34.5254C32.1147 34.5717 33.4244 34.7437 34.637 35.0238C34.9707 33.7824 35.1825 32.3926 35.2364 30.9121H30.75ZM25.8266 36.4567C26.8843 36.2207 28.0357 36.0704 29.25 36.0263V40.5473C28.2459 40.2402 27.2469 39.3163 26.4191 37.7641C26.2044 37.3616 26.006 36.9243 25.8266 36.4567ZM25.9909 39.8696C25.6629 39.4435 25.3637 38.9726 25.0956 38.47C24.829 37.9702 24.5871 37.4291 24.3728 36.8529C23.7211 37.0654 23.1194 37.3128 22.5772 37.5885C23.5465 38.5574 24.7043 39.3376 25.9909 39.8696ZM23.9172 35.4237C23.063 35.7016 22.2747 36.0376 21.5707 36.4239C20.4096 34.8635 19.6716 32.9696 19.5264 30.9121H23.2627C23.3171 32.5171 23.5453 34.0432 23.9172 35.4237ZM34.0091 39.8696C35.2957 39.3376 36.4535 38.5574 37.4228 37.5885C36.8806 37.3128 36.2788 37.0654 35.6272 36.8529C35.4128 37.4291 35.171 37.9702 34.9044 38.47C34.6363 38.9726 34.337 39.4435 34.0091 39.8696ZM30.75 36.0263C31.9642 36.0704 33.1157 36.2207 34.1734 36.4567C33.994 36.9243 33.7956 37.3616 33.5809 37.7641C32.7531 39.3163 31.7541 40.2402 30.75 40.5473V36.0263ZM36.0827 35.4237C36.937 35.7016 37.7253 36.0376 38.4293 36.4239C39.5904 34.8635 40.3284 32.9696 40.4736 30.9121H36.7373C36.6829 32.5171 36.4547 34.0432 36.0827 35.4237ZM40.4736 29.4121H36.7373C36.6829 27.8071 36.4547 26.281 36.0827 24.9005C36.937 24.6226 37.7253 24.2866 38.4293 23.9003C39.5904 25.4607 40.3284 27.3546 40.4736 29.4121ZM34.9044 21.8542C35.171 22.354 35.4128 22.8951 35.6272 23.4713C36.2788 23.2588 36.8806 23.0114 37.4228 22.7357C36.4535 21.7668 35.2957 20.9866 34.0091 20.4546C34.337 20.8807 34.6363 21.3516 34.9044 21.8542ZM34.1734 23.8675C33.1157 24.1035 31.9642 24.2538 30.75 24.2979V19.7769C31.7541 20.084 32.7531 21.0079 33.5809 22.5601C33.7956 22.9626 33.994 23.3999 34.1734 23.8675Z" fill="#009026"/></svg>');

                }

            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                // Handle errors here
            }
        });
    });
    

    // Adding Vehicle
    $('#add-vehicle-form').submit(function(e) {

        e.preventDefault();

        // Validate 
        if( !validateFormSubmit() ) {
            return false
        }

        const self = $(this); 

        const formData = $(self).serialize();
        const attachments = $('#attachments-obj').val();
            
        addOverlayLoader(self); 

        $.ajax({
            url: dashboard_obj.ajaxurl, // AJAX URL provided by WordPress
            type: 'POST',
            data: {
                action: 'save_vehicle_data',
                formData: formData, 
                attachments: attachments
            }, 
            success: function(response) {

                // Remove Attachment Files from table 
                $('#attachment-files tbody tr').remove();

                removeOverlayLoader(self);
                setTimeout(() => {

                    $('.popup').fadeOut('fast', function() {
                        $(this).removeClass('show');
                        $('body').css('overflow','auto');
                    });

                    $(this).closest('form').clearForm(); 

                    // Reload the vehicle table 
                    var table = $('#vehicleTable').DataTable();
                    table.ajax.reload();

                    var customerVehicleTable = $('#customerVehicleTable').DataTable();
                    customerVehicleTable.ajax.reload( function (json) {
                       
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
                        customerVehicleTable.rows.add(rowData).draw();
                    });

                    self.clearForm();
                    
                    
                }, 500);

                
                console.log('Vehicle Added');

                if( $(".job-add-vehicle-popup").length > 0) {

                    // Remove error messaging 
                    $('input[name="vehicle-data"]').removeClass('error');
                    $('input[name="vehicle-data"]').siblings('.error-message').remove();

                    // add vehicle to job form
                    let vehicles = JSON.parse(response);

                    // Iterate over each vehicle in the response
                    for (let vin in vehicles) {
                        if (vehicles.hasOwnProperty(vin)) {
                            let vehicleInfo = vehicles[vin];
                            
                            // Construct the HTML structure for each vehicle
                            let listItem = `
                                <li data-vin="${vin}" data-mileage="${vehicleInfo.mileage}" data-make="${vehicleInfo.make}" data-model="${vehicleInfo.model}" data-vehicle-all="${JSON.stringify(vehicleInfo).replace(/"/g, '&quot;')}">
                                    <p class="make-model"> ${vehicleInfo.make} / ${vehicleInfo.model} / ${vehicleInfo.colour} </p>
                                    <p class="registration"> ${vehicleInfo.registration} </p>
                                </li>
                            `;
                            
                            // Append the new list item to the specified element
                            $('.job-select-wrapper.vehicle .vehicle-select .options').append(listItem);
                        }
                    }

                    // click the appended vehicle 
                    setTimeout(() => {
                        $('.job-select-wrapper.vehicle .vehicle-select .options li').last().click();
                    }, 500);
                }
            },
            error: function(xhr, status, error) {

                console.error(xhr.responseText);
                // Handle error
                console.log('Error'); 
                removeOverlayLoader(self);
                setTimeout(() => {
                    $('.popup').fadeOut('fast', function() {
                        $(this).removeClass('show');
                        $('body').css('overflow','auto');
                    });
                    $(this).closest('form').clearForm();
                }, 500);
            }, 
        });
        
    });

    // Edit Vehicle 
    $(document).on('click', '.edit-vehicle-action', function(e) {
        
        e.preventDefault();
        
        // Remove Attachment Files from table
        $('#attachment-files tbody tr').remove();
        
        const tr_post_id = $(this).closest('tr').attr('class');
        // Strip 'post-id-' from tr_post_id 
        const edit_post_id = tr_post_id.replace('post-id-','');
        
        $.ajax({ 
            url: dashboard_obj.ajaxurl, 
            type: 'POST', 
            data: {
                action: 'edit_vehicle_data',
                edit_post_id: edit_post_id
            },
            success: function(response) { 
                // Change popup title and add class to identify edit vehicle 
                $('#add-vehicle-popup').addClass('edit-vehicle-popup');
                $('#add-vehicle-popup').find('.popup-title').text('Edit Vehicle');

                // decode the JSON response
                const vehicleData = JSON.parse(response);
                
                // Pass the post id to the form
                $('#add-vehicle-form input[name="vehicle_post_id"]').val(edit_post_id);
                

                $('.customer').find('.customer-select').fadeOut(0,function() {
                    $('.selected-customer-outer').fadeIn();                            
                })
                
                // Customer field update
                const customerData = '{"customer-post-id":' + vehicleData['customer-post-id'] + ',"customer-name":"' + vehicleData['customer-name'] + '","company-name":"' + vehicleData['company-name'] + '","email":"' + vehicleData['email'] + '","phone":"' + vehicleData['phone'] + '","address":"' + vehicleData['address'] +'"}';

                // Populate the vehicle fields with the data
                $('.edit-vehicle-popup input[name="customer-data"]').val(customerData);
                $('.edit-vehicle-popup input[name="old_customer_data"]').val(customerData);
                
                const companyName = vehicleData['company-name'] ? vehicleData['company-name'] : '';
                
                const companyData = companyName.split('&').reduce((acc, item) => {
                    const [key, value] = item.split('=');
                    acc[key] = value;
                    return acc;
                }, {});
                console.log(companyData);
                

                $('.selected-customer-outer .customer-name-val').text(vehicleData['customer-name']);
                $('.selected-customer-outer .company-name-val').text(companyData['company-name'].replace('%20', ' '));
                $('.selected-customer-outer .contact-val').text(vehicleData['phone'])
                $('.selected-customer-outer .address-val').text(vehicleData['address'], vehicleData['city'], vehicleData['province'], vehicleData['postal-code'])
                

                // Vehicle fields update
                const vehicle = vehicleData['vehicle'];
                $('.edit-vehicle-popup input[name="make"]').val(vehicle.make);
                $('.edit-vehicle-popup input[name="model"]').val(vehicle.model);
                $('.edit-vehicle-popup input[name="year"]').val(vehicle.year); 
                $('.edit-vehicle-popup input[name="vin"]').val(vehicleData.vin); 
                $('.edit-vehicle-popup input[name="registration"]').val(vehicle.registration); 
                $('.edit-vehicle-popup input[name="colour"]').val(vehicle.colour); 
                $('.edit-vehicle-popup input[name="mileage"]').val(vehicle.mileage); 
                $('.edit-vehicle-popup textarea[name="description"]').val(vehicle.description);

                // Attachments 
                const attachments = vehicleData.attachments;
                if(attachments) {
                    $('input#attachments-obj').val(JSON.stringify(attachments));
                    let attachmentFiles = ''; 
                    for (const [key, value] of Object.entries(attachments)) {
                        attachmentFiles += `<tr>
                            <td>
                                <a href="${value[2]}" target="_blank">${value[0]}</a>
                                <input type="hidden" class="hidden-attachment-values" name="hidden-attachment" value="${value[1]}" >
                            </td>
                            <td class="delete" attachment_id="${key}">
                                <svg width="14" height="17" viewBox="0 0 14 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M4.30769 6.36667C4.60508 6.36667 4.84615 6.60545 4.84615 6.9V13.3C4.84615 13.5946 4.60508 13.8333 4.30769 13.8333C4.01031 13.8333 3.76923 13.5946 3.76923 13.3V6.9C3.76923 6.60545 4.01031 6.36667 4.30769 6.36667Z" fill="#7A7A9D"></path>
                                    <path d="M7 6.36667C7.29738 6.36667 7.53846 6.60545 7.53846 6.9V13.3C7.53846 13.5946 7.29738 13.8333 7 13.8333C6.70262 13.8333 6.46154 13.5946 6.46154 13.3V6.9C6.46154 6.60545 6.70262 6.36667 7 6.36667Z" fill="#7A7A9D"></path>
                                    <path d="M10.2308 6.9C10.2308 6.60545 9.98969 6.36667 9.69231 6.36667C9.39492 6.36667 9.15385 6.60545 9.15385 6.9V13.3C9.15385 13.5946 9.39492 13.8333 9.69231 13.8333C9.98969 13.8333 10.2308 13.5946 10.2308 13.3V6.9Z" fill="#7A7A9D"></path>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M14 3.7C14 4.2891 13.5178 4.76667 12.9231 4.76667H12.3846V14.3667C12.3846 15.5449 11.4203 16.5 10.2308 16.5H3.76923C2.57969 16.5 1.61538 15.5449 1.61538 14.3667V4.76667H1.07692C0.482155 4.76667 0 4.2891 0 3.7V2.63333C0 2.04423 0.482155 1.56667 1.07692 1.56667H4.84615C4.84615 0.977563 5.32831 0.5 5.92308 0.5H8.07692C8.67169 0.5 9.15385 0.977563 9.15385 1.56667H12.9231C13.5178 1.56667 14 2.04423 14 2.63333V3.7ZM2.81942 4.76667L2.69231 4.82962V14.3667C2.69231 14.9558 3.17446 15.4333 3.76923 15.4333H10.2308C10.8255 15.4333 11.3077 14.9558 11.3077 14.3667V4.82962L11.1806 4.76667H2.81942ZM1.07692 3.7V2.63333H12.9231V3.7H1.07692Z" fill="#7A7A9D"></path>
                                </svg>
                            </td>
                        </tr>`
                    }
                    $('#attachment-files').slideDown();
                    $('#attachment-files tbody').append(attachmentFiles);
                }

            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });

    }); 

    // Quote and invoice footer note 
    $(document).on('submit','#quote-invoice-note',function(e) { 
        
        e.preventDefault();
            
        const self = $(this); 
        const formData = $(self).serialize();
        addOverlayLoader(self); 

        $.ajax({
            url: dashboard_obj.ajaxurl,
            type: 'POST',
            data: {
                action: 'quote_invoice_note',
                formData: formData
            },
            success: function(response) { 
                removeOverlayLoader(self);
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    })

    // Bank details 
    // $(document).on('submit','#bank-details',function(e) { 
    //     e.preventDefault();
        
    //     const self = $(this); 
    //     const formData = $(self).serialize();
    //     addOverlayLoader(self); 

    //     $.ajax({
    //         url: dashboard_obj.ajaxurl,
    //         type: 'POST',
    //         data: {
    //             action: 'bank_details',
    //             formData: formData,
    //             bank_details_nonce: $('#bank-details input[name="bank_details_nonce"]').val()
    //         },
    //         success: function(response) { 
    //             removeOverlayLoader(self);
    //         },
    //         error: function(xhr, status, error) {
    //             console.error(xhr.responseText);
    //         }
    //     });
    // })

    // Payment Terms 
    $(document).on('submit','#payment-terms',function(e) { 
        
        e.preventDefault();
            
        const self = $(this); 
        const formData = $(self).serialize();
        addOverlayLoader(self); 

        $.ajax({
            url: dashboard_obj.ajaxurl,
            type: 'POST',
            data: {
                action: 'payment_terms',
                formData: formData
            },
            success: function(response) { 
                removeOverlayLoader(self);
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    })

    // Warranty information 
    $(document).on('submit','#warranty-information',function(e) { 

        e.preventDefault(); 

        const self = $(this); 
        const formData = $(self).serialize(); 
        addOverlayLoader(self); 
         
        $.ajax({ 
            url: dashboard_obj.ajaxurl, 
            type: 'POST', 
            data: {
                action: 'warranty_information',
                formData: formData
            },
            success: function(response) { 
                removeOverlayLoader(self);
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    }) 

    // Default Quote Message 
    $(document).on('submit','#default-quote-message',function(e) {
            
        e.preventDefault(); 

        const self = $(this); 
        const formData = $(self).serialize(); 
        addOverlayLoader(self); 

        $.ajax({ 
            url: dashboard_obj.ajaxurl, 
            type: 'POST', 
            data: {
                action: 'default_quote_message',
                formData: formData
            },
            success: function(response) { 
                removeOverlayLoader(self);
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    })
    
    // Default Invoice Message 
    $(document).on('submit','#default-invoice-message',function(e) { 
            
        e.preventDefault(); 

        const self = $(this); 
        const formData = $(self).serialize(); 
        addOverlayLoader(self); 

        $.ajax({ 
            url: dashboard_obj.ajaxurl, 
            type: 'POST', 
            data: {
                action: 'default_invoice_message',
                formData: formData
            },
            success: function(response) { 
                removeOverlayLoader(self);
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    })

    // Default Quote Whatsapp Message  
    $(document).on('submit','#default-quote-whatsapp-message',function(e) { 
            
        e.preventDefault(); 

        const self = $(this); 
        const formData = $(self).serialize(); 
        addOverlayLoader(self); 

        $.ajax({ 
            url: dashboard_obj.ajaxurl, 
            type: 'POST', 
            data: {
                action: 'default_quote_whatsapp_message',
                formData: formData
            },
            success: function(response) { 
                removeOverlayLoader(self);
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    })

    // Default Invoice Whatsapp Message 
    $(document).on('submit','#default-invoice-whatsapp-message',function(e) { 
            
        e.preventDefault(); 

        const self = $(this); 
        const formData = $(self).serialize(); 
        addOverlayLoader(self); 

        $.ajax({ 
            url: dashboard_obj.ajaxurl, 
            type: 'POST', 
            data: {
                action: 'default_invoice_whatsapp_message',
                formData: formData
            },
            success: function(response) { 
                removeOverlayLoader(self);
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    })


    
    // Delete Post Action
    $(document).on('click', '[data-delete-post]', function(e) {
        e.preventDefault(); 

        const delete_post_id = $(this).data('delete-post');
        
        //Deleting progress popup
        progressPopup('delete','start')

        $.ajax({ 
            url: dashboard_obj.ajaxurl, 
            type: 'POST', 
            data: {
                action: 'delete_post',
                delete_post_id: delete_post_id
            },
            success: function(response) { 
                
                //Deleting progress popup
                progressPopup('delete','complete')

                // Reload the vehicle table 
                var table = $('.dt-table').DataTable();
                table.ajax.reload();

                var customerVehicleTable = $('#customerVehicleTable').DataTable();
                customerVehicleTable.ajax.reload( function (json) {
                   
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
                    customerVehicleTable.rows.add(rowData).draw();
                });
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });

    });

    // Delete Staff Member 
    $(document).on('click', '.delete-staff-member', function(e) { 
        e.preventDefault(); 

        const member_name = $(this).closest('tr').find('td:nth-child(1)').text();
        const member_contact_number = $(this).closest('tr').find('td:nth-child(2)').text();
        const member_role = $(this).closest('tr').find('td:nth-child(3)').text();

        const staffMember = member_name;
        
        $.ajax({ 
            url: dashboard_obj.ajaxurl, 
            type: 'POST', 
            data: {
                action: 'delete_staff_member',
                staff_member: staffMember
            },
            success: function(response) { 

                console.log(response);

                // Reload the staff table 
                var table = $('#staff-table').DataTable();
                table.ajax.reload();

            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });

    });

    //Saving/Deleting progress popup
    function progressPopup(type,state) {
        if(state === 'start') {
            $('.ajax-progress-popup-outer').addClass('active');
            type === 'save' && $('.ajax-progress-popup-outer h2').text('Saving')
            type === 'delete' && $('.ajax-progress-popup-outer h2').text('Deleting')
        } else {
            $('.ajax-progress-popup-outer').removeClass('active');
        }
    }

    //Loader - used for ajax
    function addLoader(ele) {
        const loadingGears = '<div class="svg-loader"></div>';
        $(ele).prepend(loadingGears)
    }
    function removeLoader(ele) {
        $(ele).find('.svg-loader').fadeOut(300,function() {
            $(this).remove()
        })
    }

    // overlay loader 
    function addOverlayLoader(ele) {
        $(ele).addClass('overlay-loader');
        const loadingGears = '<div class="svg-loader"></div>'; 
        $(ele).prepend(loadingGears);
    }
    function removeOverlayLoader(ele) {
        $(ele).find('.svg-loader').fadeOut(300,function() {
            $(this).remove();
            $(ele).removeClass('overlay-loader');
        });
    }
})

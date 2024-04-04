'use strict'

jQuery(document).ready(function ($) {
    
    // Form Validation 
    function validateForm(form) {

        let isValid = true; // Initialize flag
    
        // Check if the form exists and has the validate-form class
        if (form) {

            // Select all required fields within the form
            const formFields = form.find('input.required, select.required, textarea.required');
            
            // Loop through each required field
            formFields.each( function() {
                const self = $(this); 
                const selfVal = self.val();

                // Check if the field is empty
                if( selfVal === '' ) {
                    if( !self.hasClass('error') ) {
                        self.addClass('error');
                        self.closest('.input-label-wrapper').append('<span class="error-message">This field is required</span>');
                    }
                    console.log('Field is empty')
                    isValid = false; // Set flag to false if any field is empty
                    return false; // Exit the loop
                } else {
                    self.removeClass('error');
                    self.siblings('.error-message').remove();
                }

                // Email validation 
                if (self.attr('type') === 'email') {
                    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                    if (!emailPattern.test(selfVal)) {
                        self.addClass('error');
                        self.closest('.input-label-wrapper').append('<span class="error-message">Enter a valid email address</span>');
                        isValid = false; // Set flag to false if email is invalid
                        return false; // Exit the loop
                    }
                }

                // Cellphone validation 
                if (self.attr('type') === 'tel') {
                    const cellphonePattern = /^\d{10}$/; // Assuming 10 digit cellphone format
                    if (!cellphonePattern.test(selfVal)) {
                        self.addClass('error');
                        self.closest('.input-label-wrapper').append('<span class="error-message">Enter a valid cellphone number (10 digits)</span>');
                        isValid = false; // Set flag to false if cellphone is invalid
                        return false; // Exit the loop
                    }
                }
            });
            
            // Return isValid flag
            return isValid;
        } else {
            // Form with validate-form class not found, allow submission
            return true;
        }
    }
    
    if( $('.validate-form').length ) {
        $(document).on('submit','.validate-form',function(e) {

            e.preventDefault();
            validateForm( $(this) );
            
        })
    }

    //Customer Select Dropdown
    if($('.job-select-wrapper.customer .customer-select').length > 0) {       

        let keyupTimeout
        let customerResultsActive = false
        $(document).on('keyup','.selected-value',function() {
            const searchValue = $(this).val()            
            const self = $(this)
            let selectedVehicle = false

            //Prevent search from running until we stop typing for 2 seconds
            clearTimeout(keyupTimeout);

            //Set a new timeout
            keyupTimeout = setTimeout(function() {
                
            //Add loader
            addLoader('.job-select-wrapper.customer')
            
            $.ajax({
                type: "POST",
                url: workshop_pro_obj.ajaxurl,
                data: {
                    'action': 'fetch_customers',
                    'search-val': searchValue,
                },
                success: function (response) {	
                    customerResultsActive = true
                    const customerData = JSON.parse(response)
                    
                    let options = `<li class="add-new-customer" >
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
                                    </li>`

                    if(Object.keys(customerData).length > 0) {
                        Object.keys(customerData).forEach(customer => {
                            options += `<li 
                                            data-company-name="${customerData[customer]['company-name']}" 
                                            data-address="${customerData[customer]['address']}" 
                                            data-name="${customerData[customer]['name']}" 
                                            data-email="${customerData[customer]['email']}" 
                                            data-vin="${customerData[customer]['vin']}" 
                                            data-make="${customerData[customer]['make']}"
                                            data-model="${customerData[customer]['model']}"
                                            data-registration="${customerData[customer]['registration']}"
                                            data-mileage="${customerData[customer]['mileage']}"
                                            data-colour="${customerData[customer]['colour']}"
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
                                            ${customerData[customer]['name']} 
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
                   
                }
            });

            }, 1500);

             //Add customer option event listeners
             $(document).on('click','.job-select-wrapper.customer .options li:not(.add-new-customer):not(.no-customers)',function() {
                customerResultsActive = false     
                const customerName = $(this).data('name')
                const companyName = $(this).data('company-name')
                const contact = $(this).data('email')
                const address = $(this).data('address')

                $('.selected-customer-outer .customer-name-val').text(customerName)
                $('.selected-customer-outer .company-name-val').text(companyName)
                $('.selected-customer-outer .contact-val').text(contact)
                $('.selected-customer-outer .address-val').text(address)

                //Complete hidden customer field
                $('input[name="customer-name"]').val(customerName)                        
                
                //Build out vehicle options
                vehicleOptions( $(this) )                        
                $('.job-select-wrapper.vehicle .vehicle-select').fadeIn()
                $('.job-select-wrapper.vehicle .vehicle-select .pre-vehicle-selection').fadeIn()

                //Append selected customer markup & hide search field.
                $(this).closest('.job-select-wrapper.customer').find('.customer-select').fadeOut(0,function() {
                    $('.selected-customer-outer').fadeIn()                            
                })
            })

             //Add vehicle option event listeners
             $(document).on('click','.job-select-wrapper.vehicle .pre-vehicle-selection > .options > li',function() {
                customerResultsActive = false
                const selectedVin = $(this).data("vin")
                const selectedMakeModel = $(this).find(".make-model").text()
                const selectedMileage = $(this).data("mileage")
                const selectedRegistration = $(this).find(".registration").text()
                
                //Complete hidden vehicle fields
                $('input[name="vehicle-registration"]').val(selectedRegistration)
                $('input[name="vehicle-vin"]').val(selectedVin)         

                    $('.vehicle-select .pre-vehicle-selection').fadeOut(function() {
                        $('.selected-vehicle-outer .make-model-val').text(selectedMakeModel)
                        $('.selected-vehicle-outer .vehicle-details .mileage-val').text(selectedMileage)
                        $('.selected-vehicle-outer .vehicle-details .vin-val').text(selectedVin)
                        $('.selected-vehicle-outer .vehicle-details .registration-val').text(selectedRegistration)
                        $('.selected-vehicle-outer').fadeIn()
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

            //Vehicle Options
            function vehicleOptions(self) {
                const dataValues = self.data()           
              
                const vehicleOptions = `<li 
                                            data-vin="${dataValues['vin']}" 
                                            data-mileage="${dataValues['mileage']}" 
                                            data-make="${dataValues['make']}" 
                                            data-model="${dataValues['model']}" 
                                        >
                                            <p class="make-model" > ${dataValues['make']} / ${dataValues['model']} / ${dataValues['colour']} </p>
                                            <p class="registration" > ${dataValues['registration']} </p>
                                        </li>`;
                
                $('.no-customer-selected').fadeOut(0)
                $('.job-select-wrapper.vehicle .options > li').remove()
                $('.job-select-wrapper.vehicle .options').html( vehicleOptions ) 
                $('.job-select-wrapper.vehicle .pre-vehicle-selection').fadeIn()    

            }            
            
        })

        //Todo: add vehicle popup to this event
        $(document).on('click','.pre-vehicle-selection .header .add-new-vehicle',function() {
            alert('adding another vehicle!')   
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

        addLoader('.add-staff-outer .add-row-button-outer')

        //Labour Rows
        const mechanicsForm = document.getElementById("add-staff");
        const mechanicsFormData = new FormData(mechanicsForm);
        
        let mechanicRowArray = []
        let mechanicKeyAndValue = {}
        let mechanicSortedFormData = {}
        let mechanicI = 0
        let mechanicRowNum = 0
        //The loop count is based on the number of fields in the form
        for (const pair of mechanicsFormData.entries()) {                
            if(mechanicI < 3) {
                mechanicKeyAndValue = {}
                const pairkey = pair[0]
                const pairValue = pair[1]
                if (mechanicKeyAndValue[pairkey] === undefined) {
                    mechanicKeyAndValue[pairkey] = "";
                }
                
                mechanicKeyAndValue[pairkey] += pairValue
                mechanicRowArray.push(mechanicKeyAndValue)
                mechanicI++
                if(mechanicI === 3) {
                    mechanicI = 0
                    mechanicSortedFormData[`row-${mechanicRowNum}`] = mechanicRowArray
                    mechanicRowArray = []
                    mechanicRowNum++
                }
            } 
        }

        $.ajax({
            type: "POST",
            url: workshop_pro_obj.ajaxurl,
            data: {
                'action': 'insert_mechanics',
                'mechanics-data': mechanicSortedFormData,
            },
            success: function (response) {	
                removeLoader('.add-staff-outer .add-row-button-outer')
                console.log(response);
            }
        });
    })

    //Job Save/Edit Ajax
    $(document).on('click','#save-post.job-save',function(event) {
        event.preventDefault()
        
        //Job related posts & title
        const jobNumber = $('input#job-number').val()
        
        //Customer hidden fields
        const customerName = $('input[name="customer-name"]').val()
        
        //Vehicle hidden fields
        const vehicleRegistration = $('input[name="vehicle-registration"]').val()
        const vehicleVIN = $('input[name="vehicle-vin"]').val()

        //Notes & Attachments Rows
        let jobAttachments = $("#attachments-obj").val()
        const jobJobNotes = $("#job-notes").val()

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

        $.ajax({
            type: "POST",
            url: workshop_pro_obj.ajaxurl,
            data: {
                'action': 'post_jobs',
                'labour_data': labourSortedFormData,
                'parts_data': partsSortedFormData,
                'job_number': jobNumber,
                'job_notes': jobJobNotes,
                'attachments': jobAttachments,
                'vin': vehicleVIN,
                'registration': vehicleRegistration,
                'customer-name': customerName
            },
            success: function (response) {	
                console.log(response);
            }
        });
    })

    //New Customer Save/Edit Ajax
    $(document).on('click','#save-post.customer-save',function() {

        //Details Fields
        const customerDetailsFieldForm = document.getElementById("customer-fields");
        const detailsFormData = new FormData(customerDetailsFieldForm);
       
        let detailsArray = []
        let detailsKeyAndValue = {}
        let detailsI = 0
        //The loop count is based on the number of fields in the form
        for (const pair of detailsFormData.entries()) {                
            if(detailsI < 10) {
                detailsKeyAndValue = {}
                const pairkey = pair[0]
                const pairValue = pair[1]
                if (detailsKeyAndValue[pairkey] === undefined) {
                    detailsKeyAndValue[pairkey] = "";
                }
                detailsKeyAndValue[pairkey] += pairValue
                detailsArray.push(detailsKeyAndValue)
                detailsI++
            } 
        }

        //Contact Fields
        const customerContactFieldForm = document.getElementById("contact-fields");
        const contactFormData = new FormData(customerContactFieldForm);
        
        let customerName = ""
        let contactArray = []
        let contactKeyAndValue = {}
        let contactI = 0
        //The loop count is based on the number of fields in the form
        for (const pair of contactFormData.entries()) {                
            if(contactI < 10) {
                contactKeyAndValue = {}
                const pairkey = pair[0]
                const pairValue = pair[1]
                if (contactKeyAndValue[pairkey] === undefined) {
                    contactKeyAndValue[pairkey] = "";
                }
                if(pairkey === "first-name-1" || pairkey === "last-name-1") {
                    customerName += pairValue + " "
                }
                contactKeyAndValue[pairkey] += pairValue
                contactArray.push(contactKeyAndValue)
                contactI++
            } 
        }

         //Vehicle Fields
         const vehicleFieldForm = document.getElementById("vehicle-fields");
         const vehicleFormData = new FormData(vehicleFieldForm);
         
         let vehicleVin = ""
         let vehicleObject = {}
         let vehicleKeyAndValue = {}
         let vehicleI = 0
         //The loop count is based on the number of fields in the form
         for (const pair of vehicleFormData.entries()) {                
            if(vehicleI < 9) {
                const pairkey = pair[0]
                const pairValue = pair[1]
                console.log(vehicleKeyAndValue,pairkey,pairValue);
                if (vehicleKeyAndValue[pairkey] === undefined) {
                    vehicleKeyAndValue[pairkey] = "";
                }
                if(pairkey === "VIN" ) {
                    vehicleVin = pairValue
                }
                vehicleKeyAndValue[pairkey] += pairValue
                if(vehicleVin.length > 1 && vehicleI === 8) {
                    vehicleObject[vehicleVin] = vehicleKeyAndValue
                    // vehicleObject = JSON.stringify(vehicleObject)
                }
                vehicleI++
            } 
        }
        
        //Notes Fields
        const customerNotes = $('#customer-notes textarea').val()

        $.ajax({
            type: "POST",
            url: workshop_pro_obj.ajaxurl,
            data: {
                'action': 'post_customers',
                'customer-name': customerName,
                'customer-details': detailsArray,
                'customer-contacts': contactArray,
                'customer-vehicles': vehicleObject,
                'customer-notes': customerNotes,
            },
            success: function (response) {	                
                alert('Customer added!')
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
                csvChunks.push(window.customerCsv[row])
                i++   
                row++
                $(`.bar > .segment:nth-child(${completedChunks + 1})`).addClass('loading')
                if(i === 19) {
                    $.ajax({
                        type: "POST",
                        url: workshop_pro_obj.ajaxurl,
                        data: {
                            'action': 'insert_csv_customers',
                            'csv-customer-data': csvChunks,
                        },
                        success: function (response) {
                            i = 0
                            completedChunks++
                            $(`.bar > .segment`).css('max-width',`${(100 / chunkCount) * completedChunks}%`)
                            
                            if(completedChunks < chunkCount) {
                                insertPosts()
                            } else {
                                setTimeout(() => {
                                    $('#csvData').fadeOut(300,function(){
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
            url: workshop_pro_obj.ajaxurl,
            data: attachmentFormData,
            processData: false,
            contentType: false,
            success: function (response) {  
                
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
              
                console.log(url, tmp_name, concatenatedFiles, JSON.stringify(concatenatedFiles));
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
        addLoader(self)
        
        $.ajax({
            type: "POST",
            url: workshop_pro_obj.ajaxurl,
            data: {
                'action': 'delete_file',
                'file_url': attachment_file_url,
            },
            success: function (response) {
                //Update JSON
                $('#attachments-obj').val( JSON.stringify(attachmentObj) )
                removeLoader(self)
                self.closest('tr').fadeOut().remove()
            }
        });
    });

    // Profile Form update 
    $('#profile-form').submit(function(e) { 
        
        e.preventDefault();

        const self = $(this); 

        if(validateForm(self)) {

            console.log('Profile form is valid')
            
            addLoader(self); 

            var formData = $(this).serialize();

            $.ajax({
                type: 'POST',
                url: workshop_pro_obj.ajaxurl,
                data: {
                    action: 'update_profile',
                    formData: formData
                },
                success: function(response) {
                    // alert('Profile updated successfully!');
                    removeLoader(self); 
                    // $(this).html(response).fadeIn()
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    // Handle errors here
                }
            });
        }
    });


    $('#add-vehicle-form').submit(function(e) {

        e.preventDefault(); // Prevent default form submission

        const self = $(this); 

        var formData = $(self).serialize();

        console.log('Form data:', formData)
            
        addLoader(self); 

        $.ajax({
            url: workshop_pro_obj.ajaxurl, // AJAX URL provided by WordPress
            type: 'POST',
            data: {
                action: 'save_vehicle_data',
                formData: formData
            }, 
            success: function(response) {
                removeLoader(self); 
                // Handle success 
                console.log('Success')
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                // Handle error
                console.log('Error')
            }
        });
    });
    
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

    // $.ajax({
    //     url: workshop_pro_obj.ajaxurl,
    //     type: 'POST',
    //     data: {
    //         action: 'get_authentication_vrid'
    //     },
    //     success: function(response) {
    //         const vrid=getAuthenticationVrid()
    //         console.log('success',response); // Handle the response accordingly
    //     },
    //     error: function(xhr, status, error) {
    //         console.error(xhr.responseText); // Handle errors
    //     }
    // });
})

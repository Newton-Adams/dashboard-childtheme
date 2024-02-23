'use strict'

jQuery(document).ready(function ($) {

    //Mechanics Save/Edit Ajax
    $(document).on('click','#save-post.technicians-save',function() {

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
                console.log(response);
            }
        });
    })

    //Job Save/Edit Ajax
    $(document).on('click','#save-post.job-save',function() {
        //Job related posts & title
        const jobNumber = $('input#job-number').val();

        //Labour Rows
        const labourFieldForm = document.getElementById("job-fields");
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
                'job_number': jobNumber
            },
            success: function (response) {	
                alert('Job added!')
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

        $.ajax({
            type: "POST",
            url: workshop_pro_obj.ajaxurl,
            data: {
                'action': 'post_customers',
                'customer-name': customerName,
                'customer-details': detailsArray,
                'customer-contacts': contactArray,
            },
            success: function (response) {	
                console.log(response);
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
                            console.log((100 / chunkCount) * (completedChunks));
                            
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
})
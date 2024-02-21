'use strict'

jQuery(document).ready(function ($) {

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
})
'use strict'

jQuery(document).ready(function ($) {

    $(document).on('click','#save-post',function() {

        //Job related posts & title
        const jobNumber = $('input#job-number').val();

        //Labour fields
        const jobFieldForm = document.getElementById("job-fields");
        const formData = new FormData(jobFieldForm);
      
        let rowArray = []
        let keyAndValue = {}
        let sortedFormData = {}
        let i = 0
        let rowNum = 0
        for (const pair of formData.entries()) {                
            if(i < 6) {
                keyAndValue = {}
                const pairkey = pair[0]
                const pairValue = pair[1]
                console.log(i, ':', pairValue);
                if (keyAndValue[pairkey] === undefined) {
                    keyAndValue[pairkey] = "";
                }
                keyAndValue[pairkey] += pairValue
                rowArray.push(keyAndValue)
                i++
                if(i === 6) {
                    i = 0
                    sortedFormData[`row-${rowNum}`] = rowArray
                    rowArray = []
                    rowNum++
                }
            } 
        }
        
        $.ajax({
            type: "POST",
            url: workshop_pro_obj.ajaxurl,
            data: {
                'action': 'post_jobs',
                'form_data': sortedFormData,
                'job_number': jobNumber
            },
            success: function (response) {	
                console.log(response);
                // $('form[name="job-fields"]').find('input').val('')	
            }
        });
    })

    //Fetch jobs and append in drop down
    $.ajax({
        type: "POST",
        url: workshop_pro_obj.ajaxurl,
        data: {
            'action': 'fetch_jobs',
        },
        success: function (response) {
            $('#select-customer').html(response)
        }
    });

})
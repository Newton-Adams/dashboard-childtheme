'use strict'

jQuery(document).ready(function ($) {

    $(document).on('click','#save-post',function() {
        // const formaData = $('.forms-container > form').serializeArray()
        const form = document.getElementById("job-fields");
        // const submitter = document.querySelector("#save-post");
        const formData = new FormData(form);
        let sortedFormData = {}
        let i = 0
        for (const pair of formData.entries()) {
            if(i < 7) {
                // const keyValue = { pair[0] : pair[1] }
                sortedFormData[`row-${i}`] = keyValue
                console.log(pair[0], pair[1]);
            }
            i++
        }
        console.log('Test',sortedFormData);
        // $.ajax({
        //     type: "POST",
        //     url: workshop_pro_obj.ajaxurl,
        //     data: {
        //         'action': 'post_ajax_form',
        //         'form_data': formaData,
        //     },
        //     success: function (response) {	
        //         $('form[name="job-fields"]').find('input').val('')	
        //     }
        // });
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
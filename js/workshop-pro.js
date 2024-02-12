'use strict'

jQuery(document).ready(function ($) {

    $(document).on('click','#save-button',function() {
        const formaData = $('form[name="job-fields"]').serializeArray()
        console.log(formaData);
        $.ajax({
			type: "POST",
			url: workshop_pro_obj.ajaxurl,
			data: {
				'action': 'post_ajax_form',
                'form_data': formaData,
			},
			success: function (response) {	
				$('form[name="job-fields"]').find('input').val('')	
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

    //Burger menu
    $(document).on('click','#burger-menu svg',function() {
        $('body').toggleClass('menu-closed')
    })
    
})
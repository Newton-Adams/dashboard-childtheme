'use strict'

jQuery(document).ready(function ($) {

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

        //Notes & Attachments Rows
        const jobAttachments = $("#attachments-obj").val()
        const jobJobNotes = $("#job-notes").val()
        
        console.log('Test',jobAttachments);

        $.ajax({
            type: "POST",
            url: workshop_pro_obj.ajaxurl,
            data: {
                'action': 'post_jobs',
                'labour_data': labourSortedFormData,
                'parts_data': partsSortedFormData,
                'job_number': jobNumber,
                'job_notes': jobJobNotes,
                'attachments': jobAttachments
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
                //Existing Attachments
                const jobAttachments = JSON.parse($("#attachments-obj").val()) 
                console.log('Existing',jobAttachments);
                //New Attachments
                let concatenatedFiles = {}
                const files = JSON.parse(response)
                let name = files[0][0]
                const tmp_name = files[0][1]
                const url = files[0][2]

                
                //First add existing attachments
                jobAttachments.forEach(attachmentArray => {
                    concatenatedFiles[attachmentArray[0]] = attachmentArray
                });

                //Rename new attachment if name is used
                const existingAttchmentsCount = Object.keys(concatenatedFiles)                
                if(existingAttchmentsCount.includes(name)) {
                    for (let i = 0; i <= existingAttchmentsCount.length; i++) {
                        //TODO:Change to recursive fucntion instead of for
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
                    <td class="delete" attachment_id="${url}" >
                        <svg width="14" height="17" viewBox="0 0 14 17" fill="none" xmlns="http:www.w3.org/2000/svg">
                            <path d="M4.30769 6.36667C4.60508 6.36667 4.84615 6.60545 4.84615 6.9V13.3C4.84615 13.5946 4.60508 13.8333 4.30769 13.8333C4.01031 13.8333 3.76923 13.5946 3.76923 13.3V6.9C3.76923 6.60545 4.01031 6.36667 4.30769 6.36667Z" fill="#7A7A9D"></path>
                            <path d="M7 6.36667C7.29738 6.36667 7.53846 6.60545 7.53846 6.9V13.3C7.53846 13.5946 7.29738 13.8333 7 13.8333C6.70262 13.8333 6.46154 13.5946 6.46154 13.3V6.9C6.46154 6.60545 6.70262 6.36667 7 6.36667Z" fill="#7A7A9D"></path>
                            <path d="M10.2308 6.9C10.2308 6.60545 9.98969 6.36667 9.69231 6.36667C9.39492 6.36667 9.15385 6.60545 9.15385 6.9V13.3C9.15385 13.5946 9.39492 13.8333 9.69231 13.8333C9.98969 13.8333 10.2308 13.5946 10.2308 13.3V6.9Z" fill="#7A7A9D"></path>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M14 3.7C14 4.2891 13.5178 4.76667 12.9231 4.76667H12.3846V14.3667C12.3846 15.5449 11.4203 16.5 10.2308 16.5H3.76923C2.57969 16.5 1.61538 15.5449 1.61538 14.3667V4.76667H1.07692C0.482155 4.76667 0 4.2891 0 3.7V2.63333C0 2.04423 0.482155 1.56667 1.07692 1.56667H4.84615C4.84615 0.977563 5.32831 0.5 5.92308 0.5H8.07692C8.67169 0.5 9.15385 0.977563 9.15385 1.56667H12.9231C13.5178 1.56667 14 2.04423 14 2.63333V3.7ZM2.81942 4.76667L2.69231 4.82962V14.3667C2.69231 14.9558 3.17446 15.4333 3.76923 15.4333H10.2308C10.8255 15.4333 11.3077 14.9558 11.3077 14.3667V4.82962L11.1806 4.76667H2.81942ZM1.07692 3.7V2.63333H12.9231V3.7H1.07692Z" fill="#7A7A9D"></path>
                        </svg>
                    </td>
                </tr>`

                removeLoader('.form-row.attachments label')
                console.log(JSON.stringify(concatenatedFiles));
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
        const attachment_file_url = $(this).attr('attachment_id')
        let self = $(this)
        addLoader(self)
     
        $.ajax({
            type: "POST",
            url: workshop_pro_obj.ajaxurl,
            data: {
                'action': 'delete_file',
                'file_url': attachment_file_url,
            },
            success: function (response) {
                removeLoader(self)
                self.closest('tr').fadeOut().remove()
            }
        });
    })
    
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

})
function validateFormSubmit() {

    let valid = true;

    // Get all required input fields
    let requiredInputs = document.querySelectorAll('input.required');

    requiredInputs.forEach(function(input) {
        if (input.value.length === 0) {
            removeErrorMessage(input);
            addErrorMessage(input, 'This field is required');
            valid = false;
        } else {
            removeErrorMessage(input);
        }
    });

    return valid;
}

// Validate required input
function validateInput() { 
    if (this.value.length === 0) { 
        removeErrorMessage(this);
        addErrorMessage(this, 'This field is required');
    } else {
        removeErrorMessage(this);
    }
}

// Validate number input 
function validateNumberInput() {
    if( isNaN(this.valueAsNumber) ) {
        removeErrorMessage(this); 
        addErrorMessage(this, 'Please enter a valid number');
    } else {
        removeErrorMessage(this);
    }
}

// Validate email input
function validateEmailInput() { 
    let email = this.value;
    let emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
    if( !email.match(emailPattern) ) {
        removeErrorMessage(this); 
        addErrorMessage(this, 'Please enter a valid email address');
    } else {
        removeErrorMessage(this);
    }
}

// Validate phone input
function validatePhoneInput() { 
    let phone = this.value;
    let phonePattern = /^\d{10}$/;
    if( !phone.match(phonePattern) ) {
        removeErrorMessage(this); 
        addErrorMessage(this, 'Please enter a valid phone number');
    } else {
        removeErrorMessage(this);
    }
}

// Validate Whatsapp input  
function validateWhatsappInput() {
    let whatsapp = this.value;
    let whatsappPattern = /\+\d{3}[ ]?(\d+(-| )?)+/;
    if( !whatsapp.match(whatsappPattern) ) {
        removeErrorMessage(this); 
        addErrorMessage(this, 'Please enter a valid whatsapp number');
    } else {
        removeErrorMessage(this);
    }
}

// Validate VIN 
function validateVIN() {
    let vin = this.value;
    let vinPattern = new RegExp("^[A-HJ-NPR-Z\\d]{8}[\\dX][A-HJ-NPR-Z\\d]{2}\\d{6}$");
    if( !vin.match(vinPattern) ) {
        removeErrorMessage(this); 
        addErrorMessage(this, 'Please enter a valid VIN');
    } else {
        removeErrorMessage(this);
    }
}

// Add error message to input field 
function addErrorMessage(input, message) {
    message = message || 'This field is required';
    input.classList.add('error');
    let inputWrapper = input.closest('.input-label-wrapper');
    inputWrapper.insertAdjacentHTML('beforeend', '<span class="error-message">'+message+'</span>');
}

// Remove error message from input field 
function removeErrorMessage(input) {
    input.classList.remove('error');
    let inputWrapper = input.closest('.input-label-wrapper');
    let errorMessage = inputWrapper.querySelector('.error-message');
    if (errorMessage) {
        inputWrapper.removeChild(errorMessage);
    }
}

// Validate input on change and keyup 
document.addEventListener('DOMContentLoaded', function() {

    // Validate form required inputs
    let requiredInputs = document.querySelectorAll('input.required');
    requiredInputs.forEach(function(input) {
        input.addEventListener('change', validateInput);
    });

    // Validate number input
    let numberInputs = document.querySelectorAll('input[type="number"]');
    numberInputs.forEach(function(input) {
        input.addEventListener('change', validateNumberInput);
    });

    // Validate Email input
    let emailInputs = document.querySelectorAll('input[type="email"]'); 
    emailInputs.forEach(function(input) {
        input.addEventListener('change', validateEmailInput);
    });

    // Validate Phone input 
    let phoneInputs = document.querySelectorAll('input[type="tel"]'); 
    phoneInputs.forEach(function(input) {
        input.addEventListener('change', validatePhoneInput);
    });

    // Validate Whatsapp input
    let whatsappInputs = document.querySelectorAll('input[name="whatsapp_number"]');
    whatsappInputs.forEach(function(input) {
        input.addEventListener('change', validateWhatsappInput);
    });

    // Validate VIN input
    let vinInputs = document.querySelectorAll('input[name="vehicle_vin"]');
    vinInputs.forEach(function(input) {
        input.addEventListener('change', validateVIN);
    });

    
});



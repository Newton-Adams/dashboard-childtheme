function validateFormSubmit() {

    let valid = true;

    // Get all required input fields
    let requiredInputs = document.querySelectorAll('input.required');

    requiredInputs.forEach(function(input) {

        if (input.value.length === 0) {

            // Remove any existing error messages
            input.classList.remove('error');
            let inputWrapper = input.closest('.input-label-wrapper');
            let errorMessage = inputWrapper.querySelector('.error-message');
            if (errorMessage) {
                inputWrapper.removeChild(errorMessage);
            }
            // Add error message
            input.classList.add('error');
            inputWrapper.insertAdjacentHTML('beforeend', '<span class="error-message">This field is required</span>');
            valid = false;

        } else {

            input.classList.remove('error');
            let inputWrapper = input.closest('.input-label-wrapper');
            let errorMessage = inputWrapper.querySelector('.error-message');
            if (errorMessage) {
                inputWrapper.removeChild(errorMessage);
            }

        }

    });

    return valid;
}

// validate form inputs on change
let requiredInputs = document.querySelectorAll('input.required');
requiredInputs.forEach(function(input) {
    input.addEventListener('change', validateInput);
    input.addEventListener('keyup', validateInput);
});

function validateInput() {

    console.log('input changed');

    if (this.value.length === 0) {

        // Remove any existing error messages
        this.classList.remove('error');

        let inputWrapper = this.closest('.input-label-wrapper');

        let errorMessage = inputWrapper.querySelector('.error-message');
        if (errorMessage) {
            inputWrapper.removeChild(errorMessage);
        }

        // Add error message
        this.classList.add('error');
        inputWrapper.insertAdjacentHTML('beforeend', '<span class="error-message">This field is required</span>');

    } else {

        this.classList.remove('error');
        let inputWrapper = this.closest('.input-label-wrapper');

        let errorMessage = inputWrapper.querySelector('.error-message');
        if (errorMessage) {
            inputWrapper.removeChild(errorMessage);
        }
    }
}

// Validate number input on change and keyup 
let numberInputs = document.querySelectorAll('input[type="number"]');
numberInputs.forEach(function(input) {
    input.addEventListener('change', validateNumberInput);
    input.addEventListener('keyup', validateNumberInput);
});

function validateNumberInput() {

    console.log(this);
    
    if( isNaN(this.valueAsNumber) ) {

        // Remove any existing error messages
        this.classList.remove('error');

        let inputWrapper = this.closest('.input-label-wrapper');

        let errorMessage = inputWrapper.querySelector('.error-message');
        if (errorMessage) {
            inputWrapper.removeChild(errorMessage);
        }

        // Add error message
        this.classList.add('error');
        inputWrapper.insertAdjacentHTML('beforeend', '<span class="error-message">This field must be a number</span>');

    } else {

        this.classList.remove('error');
        let inputWrapper = this.closest('.input-label-wrapper');

        let errorMessage = inputWrapper.querySelector('.error-message');
        if (errorMessage) {
            inputWrapper.removeChild(errorMessage);
        }
    }
}
function handleChangePass(form) {
    const requestMethod = form.getAttribute('method');

    if (requestMethod === 'post') {
        const curr_password = form.curr_password.value;
        const new_password = form.new_password.value;
        const cnew_password = form.cnew_password.value;

        let isValid = true;

        // Current Password Validation
        if (curr_password === '') {
            document.getElementById('cp_cpass_err').innerText = 'Please Enter Your Current Password.';
            isValid = false;
        } else {
            document.getElementById('cp_cpass_err').innerText = '';
        }


        // New Password Validation
        if (new_password === '') {
            document.getElementById('cp_npass_err').innerText = 'Please Enter Your Password.';
            isValid = false;
        } else {
            document.getElementById('cp_npass_err').innerText = '';
        }

        // Confirm Password Validation
        if (cnew_password === '') {
            document.getElementById('cp_cnpass_err').innerText = 'Please Reenter Your Password.';
            isValid = false;

        } else if (new_password != cnew_password) {
            document.getElementById('cp_cnpass_err').innerText = 'Password does not match';
            isValid = false;

        } else {
            document.getElementById('cp_cnpass_err').innerText = '';
        }

        return isValid;
    }
}
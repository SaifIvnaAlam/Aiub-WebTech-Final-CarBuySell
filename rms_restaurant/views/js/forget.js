function handleForget(form) {
    const requestMethod = form.getAttribute('method');

    if (requestMethod === 'post') {
        const sq = form.sq.value;
        const email = form.email.value;
        const password = form.password.value;
        const cpassword = form.cpassword.value;

        let isValid = true;
        const isEmailValid = email.match(
            /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
        );

        // Restaurant Name validation
        if (sq === '') {
            document.getElementById('fsq_err').innerText = 'Please Enter Your SQ.';
            isValid = false;
        } else {
            document.getElementById('fsq_err').innerText = '';
        }

        // Email Validation
        if (email === '') {
            document.getElementById('femail_err').innerText = 'Please Enter Your Email.';
            isValid = false;

        } else if (!isEmailValid) {
            document.getElementById('femail_err').innerText = 'Please Enter A Valid Email.';
            isValid = false;

        } else {
            document.getElementById('femail_err').innerText = '';
        }

        // Password Validation
        if (password === '') {
            document.getElementById('fpass_err').innerText = 'Please Enter Your Password.';
            isValid = false;
        } else {
            document.getElementById('fpass_err').innerText = '';
        }

        // Confirm Password Validation
        if (cpassword === '') {
            document.getElementById('fcpass_err').innerText = 'Please Reenter Your Password.';
            isValid = false;
        } else if (password != cpassword) {
            document.getElementById('fcpass_err').innerText = 'Password does not match';
            isValid = false;
        } else {
            document.getElementById('fpass_err').innerText = '';
        }

        return isValid;
    }
}
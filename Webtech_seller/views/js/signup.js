function handleSignup(form) {
    const requestMethod = form.getAttribute('method');

    if (requestMethod === 'post') {
        const rname = form.rname.value;
        const email = form.email.value;
        const password = form.password.value;
        const cpassword = form.cpassword.value;

        let isValid = true;
        const isEmailValid = email.match(
            /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
        );

        // Restaurant Name validation
        if (rname === '') {
            document.getElementById('srname_err').innerText = 'Please Enter Restaurant Name.';
            isValid = false;
        } else {
            document.getElementById('srname_err').innerText = '';
        }

        // Email Validation
        if (email === '') {
            document.getElementById('semail_err').innerText = 'Please Enter Your Email.';
            isValid = false;

        } else if (!isEmailValid) {
            document.getElementById('semail_err').innerText = 'Please Enter A Valid Email.';
            isValid = false;

        } else {
            document.getElementById('semail_err').innerText = '';
        }

        // Password Validation
        if (password === '') {
            document.getElementById('spass_err').innerText = 'Please Enter Your Password.';
            isValid = false;
        } else {
            document.getElementById('spass_err').innerText = '';
        }

        // Confirm Password Validation
        if (cpassword === '') {
            document.getElementById('scpass_err').innerText = 'Please Reenter Your Password.';
            isValid = false;
        } else if (password != cpassword) {
            document.getElementById('scpass_err').innerText = 'Password does not match';
            isValid = false;
        } else {
            document.getElementById('spass_err').innerText = '';
        }

        return isValid;
    }
}
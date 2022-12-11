function loginCredentials(form) {
    const requestMethod = form.getAttribute('method');

    if (requestMethod === 'post') {
        const email = form.email.value;
        const password = form.password.value;

        let isValid = true;
        const isEmailValid = email.match(
            /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
        );

        // Email Validation
        if (email === '') {
            document.getElementById('email_err').innerText = 'Please Enter Your Email.';
            isValid = false;

        } else if (!isEmailValid) {
            document.getElementById('email_err').innerText = 'Please Enter A Valid Email.';
            isValid = false;

        } else {
            document.getElementById('email_err').innerText = '';
        }

        // Password Validation
        if (password === '') {
            document.getElementById('pass_err').innerText = 'Please Enter Your Password.';
            isValid = false;
        } else {
            document.getElementById('pass_err').innerText = '';
        }

        return isValid;
    }
}
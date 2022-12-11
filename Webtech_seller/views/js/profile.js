function profile(form) {
    const requestMethod = form.getAttribute('method');

    if (requestMethod === 'post') {
        const rname = form.rname.value;
        const sq = form.sq.value;
        const address = form.address.value;

        let isValid = true;

        // Name Validation
        if (rname === '') {
            document.getElementById('profile_rname_err').innerText = 'Please Enter Restaurant Name.';
            isValid = false;
        } else {
            document.getElementById('profile_rname_err').innerText = '';
        }

        // SQ Validation
        if (sq === '') {
            document.getElementById('profile_sq_err').innerText = 'Please Enter Special Item Name.';
            isValid = false;
        } else {
            document.getElementById('profile_sq_err').innerText = '';
        }

        // Address Validation
        if (address === '') {
            document.getElementById('profile_address_err').innerText = 'Please Enter Your Address.';
            isValid = false;
        } else {
            document.getElementById('profile_address_err').innerText = '';
        }

        return isValid;
    }
}
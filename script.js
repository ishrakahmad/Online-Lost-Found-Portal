
 function validateFullName() {
    let name = document.getElementById("full_name").value;
    if (name == "" || name.length < 3) {
        document.getElementById("error_name").innerHTML = "Enter your full name (at least 3 characters).";
        return false;
    }
    document.getElementById("error_name").innerHTML = "";
    return true;
}

function validateEmail() {
    let email = document.getElementById("email").value;
    if (email == "" || !email.includes("@") || !email.includes(".")) {
        document.getElementById("error_email").innerHTML = "Enter a valid email address.";
        return false;
    }
    document.getElementById("error_email").innerHTML = "";
    return true;
}

function validatePhone() {
    let phone = document.getElementById("phone").value;
    if (phone == "" || phone.length !== 11 || isNaN(phone)) {
        document.getElementById("error_phone").innerHTML = "Enter a valid 11-digit phone number.";
        return false;
    }
    document.getElementById("error_phone").innerHTML = "";
    return true;
}

function validateItemName() {
    let item = document.getElementById("item_name").value;
    if (item == "") {
        document.getElementById("error_item").innerHTML = "Item name is required.";
        return false;
    }
    document.getElementById("error_item").innerHTML = "";
    return true;
}

function validateLocation() {
    let location = document.getElementById("found_location").value;
    if (location == "") {
        document.getElementById("error_location").innerHTML = "Location is required.";
        return false;
    }
    document.getElementById("error_location").innerHTML = "";
    return true;
}

function validateForm() {
    return validateFullName() &&
           validateEmail() &&
           validatePhone() &&
           validateItemName() &&
           validateLocation();
}
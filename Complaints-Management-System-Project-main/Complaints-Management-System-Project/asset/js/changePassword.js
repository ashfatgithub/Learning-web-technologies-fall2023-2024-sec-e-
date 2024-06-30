function changePasswordCheck() {
    const oldPassword = document.getElementById('oldPassword').value;
    const password = document.getElementById('password').value;
    const confirmPassword = document.getElementById('confirmPassword').value;

    const data = {
        changePasswordSubmit: 1,
        oldPassword: oldPassword,
        password: password,
        confirmPassword: confirmPassword
    };

    let xhr = new XMLHttpRequest();

    xhr.open("POST", "../controller/changePasswordCheck.php", true);
    xhr.setRequestHeader("Content-type", "application/json");
    xhr.send(JSON.stringify(data));

    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            handleResponse(xhr.responseText);
        }
    };
}

function handleResponse(response) {
    if (response == "old password invalid") {
        document.getElementById('oldPasswordS').innerHTML = "password is invalid";
    } else if (response == "new password invalid") {
        document.getElementById('passwordS').innerHTML = "password is invalid";
        document.getElementById('oldPasswordS').innerHTML = "";
    } else if (response == "password mismatch") {
        document.getElementById('confirmPasswordS').innerHTML = "password mismatch";
        document.getElementById('passwordS').innerHTML = "";
        document.getElementById('oldPasswordS').innerHTML = "";
    } else if (response == "wrong old password") {
        document.getElementById('oldPasswordS').innerHTML = "wrong old password";
        document.getElementById('confirmPasswordS').innerHTML = "";
        document.getElementById('passwordS').innerHTML = "";
        document.getElementById('changePasswordS').innerHTML = "";
    } else if (response == "password changed") {
        document.getElementById('changePasswordS').innerHTML = "Password changed successfully!";
        document.getElementById('confirmPasswordS').innerHTML = "";
        document.getElementById('passwordS').innerHTML = "";
        document.getElementById('oldPasswordS').innerHTML = "";
    }
}

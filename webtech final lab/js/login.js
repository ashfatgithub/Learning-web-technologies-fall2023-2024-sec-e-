function loginValidation() 
{
    let username = document.getElementById("user_name").value;
    let password = document.getElementById("pass").value;

    if(username === "" || password === "") 
    {
        alert("All fields must be filled out.");
        return false;
    }

    return true;
}

function updateValidation() 
{
    let empname = document.getElementById("emp_name").value;
    let emp_cno = document.getElementById("cont_no").value;
    let empuname = document.getElementById("emp_uname").value;

    // Name Check.
    if (empname === "" || emp_cno === "" || empuname === "") 
    {
        alert("All fields must be filled out.");
        return false;
    }

    if (empuname.length > 8) 
    {
       alert("Username maximum 8 characters.");
       return false;
    }

    return true;

}
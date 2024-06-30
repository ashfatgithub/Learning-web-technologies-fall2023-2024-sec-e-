// In your manageComplaints.js

function manageComplaints() {
    let complaintId = 0;
    let xhttp = new XMLHttpRequest();
    xhttp.open('POST', '../controller/showComplaintsCheck.php', true);

    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send('complaintId=' + complaintId);

    xhttp.onreadystatechange = function () {
        if (this.readyState == 4) {
            if (this.status == 200) {
                try {
                    let complaints = JSON.parse(this.responseText);

                    if (complaints.error) {// In your manageComplaints.js

                        function manageComplaints() {
                            let complaintId = 0;
                            let xhttp = new XMLHttpRequest();
                            xhttp.open('POST', '../controller/showComplaintsCheck.php', true);

                            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                            xhttp.send('complaintId=' + complaintId);

                            xhttp.onreadystatechange = function () {
                                if (this.readyState == 4) {
                                    if (this.status == 200) {
                                        try {
                                            let response = JSON.parse(this.responseText);

                                            if (response.error) {
                                                console.error(response.error);
                                                document.getElementById('table').innerHTML = "Error: " + response.error;
                                            } else {
                                                let complaints = response.complaints;
                                                // Your existing code to display complaints
                                            }
                                        } catch (e) {
                                            console.error("Error parsing JSON:", e);
                                            document.getElementById('table').innerHTML = "Error parsing JSON";
                                        }
                                    } else {
                                        console.error("HTTP request failed with status:", this.status);
                                        document.getElementById('table').innerHTML = "HTTP request failed";
                                    }
                                }
                            };
                        }

                        console.error(complaints.error);
                        document.getElementById('table').innerHTML = "Error: " + complaints.error;
                    } else {
                        // Your existing code to display complaints
                    }
                } catch (e) {
                    console.error("Error parsing JSON:", e);
                    document.getElementById('table').innerHTML = "Error parsing JSON";
                }
            } else {
                console.error("HTTP request failed with status:", this.status);
                document.getElementById('table').innerHTML = "HTTP request failed";
            }
        }
    };
}

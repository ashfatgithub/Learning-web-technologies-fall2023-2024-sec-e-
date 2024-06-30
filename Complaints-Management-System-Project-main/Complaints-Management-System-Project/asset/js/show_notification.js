function showNotifications(){
    //alert('hi');
    let xhttp= new XMLHttpRequest();
    xhttp.open('POST', '../controller/get_notification.php', true);
    
    xhttp.setRequestHeader("Content-type", "application/json");
    xhttp.send();
    //alert('hi');
    xhttp.onreadystatechange=function(){
        //alert('hi');
        if(this.readyState==4){
            if(this.status==200){
                let notifs = JSON.parse(this.responseText);
                if(notifs.length>0){
                    let firstRow=`<tr>
                    <th>Message</th>
                    <th>Timestamp</th>
                    <th>Status</th>
                    </tr>`
                    document.getElementById('table').innerHTML=firstRow;
                }
                if(notifs.length>0){
                    for (let i = 0; i < notifs.length; i++) {
                        let row = `<tr>
                            <td>${notifs[i].message}</td>
                            <td>${notifs[i].timestamp}</td>
                            <td>${notifs[i].status}</td>
                        </tr>`;
                        document.getElementById('table').innerHTML += row;
                    }
                }
                else{
                    document.getElementById('table').innerHTML="You have no complaints";
                }   
            }
            else{console.error('Error: ' + this.status);}
        }
    }
}

function markRead() {
    let xhttp = new XMLHttpRequest();
    xhttp.open('POST', '../controller/read_notification.php', true);

    xhttp.setRequestHeader("Content-type", "application/json");
    xhttp.send();

    xhttp.onreadystatechange = function () {
        if (this.readyState == 4) {
            if (this.status == 200) {
                // Successfully marked as read, redirect to another page
                if(JSON.parse(this.responseText)){
                    window.location.href = '../view/userDashboard.php';
                }
                else{console.error('Error: Database error')}
            } else {
                console.error('Error: ' + this.status);
                // Handle other status codes or errors
            }
        }
    };
}

function logout() {
    let xhttp = new XMLHttpRequest();
    xhttp.open('POST', '../controller/logout.php', true);

    //xhttp.setRequestHeader("Content-type", "application/json");
    xhttp.send();

    // xhttp.onreadystatechange = function () {
    //     if (this.readyState == 4) {
    //         if (this.status == 200) {
    //             // Successfully marked as read, redirect to another page
    //             if(JSON.parse(this.responseText)){
    //                 window.location.href = '../view/userDashboard.php';
    //             }
    //             else{console.error('Error: Database error')}
    //         } else {
    //             console.error('Error: ' + this.status);
    //             // Handle other status codes or errors
    //         }
    //     }
    // };
}

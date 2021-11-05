const currentUser = document.querySelector('.current-user');
let shortName = localStorage.getItem('first_name');
if(!shortName) shortName = 'Guest';
currentUser.innerText = `Hello, ${shortName}!`;

function logout() {
    localStorage.clear();
    return true;
}

const arrow = document.getElementById('arrow');
const navMenu = document.getElementById('nav-menu');

navMenu.addEventListener("click", () => {
    if(arrow.style.transform === 'rotate(90deg)') {
        arrow.style.transform = 'rotate(0)';
    } else {
        arrow.style.transform = 'rotate(90deg)';
    }
})


let timeRange = document.getElementById("time-range");
let submit = document.getElementById("load-history");
let table = document.getElementById("log-table");
let username = localStorage.getItem("username");

submit.addEventListener("click", (event) => {
    event.preventDefault();
    let today = new Date();
    let tempDate;

    //validate input formats

    fetch("api/history.php", {
        method: "POST",
        body: JSON.stringify({
            "username": username,
        })
    })
    .then( res => res.json())
    .then (data => {
        if(!data.message.includes("found")) {
            document.querySelector('.error-message').innerText = (data.message);
        } else {
            document.querySelector('.error-message').innerText = null;
            table.innerHTML = '';
            delete data.message;
            let row;
            let header = document.createElement('TR');
            header.innerHTML = `
                <tr>
                    <th>Date</th>
                    <th>Start Time</th>
                    <th>Stop Time</th>
                    <th>Total Time</th>
                    <th>Notes</th>
                </tr>
            `;
            table.appendChild(header);
            for(item in data) {
                
                tempDate = new Date(data[item]['date']).valueOf();
                console.log(tempDate);
                if(timeRange.value === "last-week") {
                    if(tempDate >= (today.valueOf() - 604800000)) {
                        row = document.createElement('TR');
                        row.innerHTML = `
                            <tr>
                                <td>${data[item]['date']}</td>
                                <td>${data[item]['start_time']}</td>
                                <td>${data[item]['stop_time']}</td>
                                <td>${data[item]['total_time']}</td>
                                <td>${data[item]['notes']}</td>
                            </tr>
                        `;
                    }
                } else if(timeRange.value === "last-month") {
                    if(tempDate >= (today.valueOf() - 2592000000)) {
                        row = document.createElement('TR');
                        row.innerHTML = `
                            <tr>
                                <td>${data[item]['date']}</td>
                                <td>${data[item]['start_time']}</td>
                                <td>${data[item]['stop_time']}</td>
                                <td>${data[item]['total_time']}</td>
                                <td>${data[item]['notes']}</td>
                            </tr>
                        `;
                    }                
                } else {
                    row = document.createElement('TR');
                    row.innerHTML = `
                        <tr>
                            <td>${data[item]['date']}</td>
                            <td>${data[item]['start_time']}</td>
                            <td>${data[item]['stop_time']}</td>
                            <td>${data[item]['total_time']}</td>
                            <td>${data[item]['notes']}</td>
                        </tr>
                    `;
                }

                table.appendChild(row);

            }
        }
    });
});    
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
            let html = `
                <tr>
                    <th>Date</th>
                    <th>Start Time</th>
                    <th>Stop Time</th>
                    <th>Total Time</th>
                    <th>Notes</th>
                </tr>
            `;
            for(item in data) {
                
                tempDate = new Date(data[item]['date']).valueOf();
                if(timeRange.value === "last-week") {
                    if(tempDate >= (today.valueOf() - 604800000)) {
                        html += `
                            <tr>
                                <td data-th="Date">${data[item]['date']}</td>
                                <td data-th="Start Time">${data[item]['start_time']}</td>
                                <td data-th="Stop Time">${data[item]['stop_time']}</td>
                                <td data-th="Total Time">${data[item]['total_time']}</td>
                                <td data-th="Notes">${data[item]['notes']}</td>
                            </tr>
                        `;
                    }
                } else if(timeRange.value === "last-month") {
                    if(tempDate >= (today.valueOf() - 2592000000)) {
                        html += `
                            <tr>
                                <td data-th="Date">${data[item]['date']}</td>
                                <td data-th="Start Time">${data[item]['start_time']}</td>
                                <td data-th="Stop Time">${data[item]['stop_time']}</td>
                                <td data-th="Total Time">${data[item]['total_time']}</td>
                                <td data-th="Notes">${data[item]['notes']}</td>
                            </tr>
                        `;
                    }                
                } else {
                    html += `
                        <tr>
                            <td data-th="Date">${data[item]['date']}</td>
                            <td data-th="Start Time">${data[item]['start_time']}</td>
                            <td data-th="Stop Time">${data[item]['stop_time']}</td>
                            <td data-th="Total Time">${data[item]['total_time']}</td>
                            <td data-th="Notes">${data[item]['notes']}</td>
                        </tr>
                    `;
                }

            }
            
            if (!html.includes('td')) {
                document.querySelector('.error-message').innerText = 'No records found - time to hit the shed!';
            } else {
                table.innerHTML = html;
                table.style.border = '2px solid white';    
            }
            
        }
    });
});
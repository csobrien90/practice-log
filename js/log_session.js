let username = localStorage.getItem('username');

let button = document.querySelector('button');
let stopwatch = document.querySelector('#stopwatch');
let submit = document.querySelector('#submit-session');
let notes = document.querySelector('#notes');

let timer;
let now = new Date();
let startDate = new Date();
let restartTime = 0;

function formatSeconds(time) {
    let hours = '00';
    let seconds = (time % 60).toString().padStart(2, '0');
    let minutes = Math.floor(time / 60).toString().padStart(2, '0');
    if (minutes > 59) {
        hours = Math.floor(minutes / 60).toString().padStart(2, '0');
        minutes = (minues % 60).toString().padStart(2, '0');
    }

    return `${hours}:${minutes}:${seconds}`; 
}

button.addEventListener('click', () => {

    if(button.innerHTML === "Start Session") {
        button.innerHTML = "Pause Session";
        startDate = new Date()

        if(!timer) {
            timer = setInterval(() => {
                now = new Date();
                elapsedTime = restartTime + Math.floor((now - startDate)/1000);
                stopwatch.innerHTML = formatSeconds(elapsedTime);    
            }, 1000);
        }

    } else {
        restartTime = elapsedTime;
        button.innerHTML = "Start Session";
        clearInterval(timer);
        timer = null;
    }
})

submit.addEventListener("click", (event) => {
    event.preventDefault();

    //validate input formats (timer must have been started)

    fetch("api/log.php", {
        method: "POST",
        body: JSON.stringify({
            "username": username,
            "date": startDate.toDateString(),
            "start_time": startDate.toTimeString(),
            "stop_time": now.toTimeString(),
            "total_time": stopwatch.innerHTML,
            "notes": notes.value
        })
    })
        .then( res => res.json())
        .then (data => {
            document.querySelector('.error-message').innerText = data.message;
    });
});
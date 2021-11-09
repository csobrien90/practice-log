document.getElementById('profile-name').innerText = `Name: ${localStorage.getItem('full_name')}`;
document.getElementById('profile-email').innerText = `Email: ${localStorage.getItem('email')}`;
document.getElementById('profile-username').innerText = `Username: ${localStorage.getItem('username')}`;

const deleteButton = document.getElementById('profile-delete');
const confirmButton = document.getElementById('confirm-delete');
const deleteConfirm = document.getElementById('confirm-delete-message');
const password = document.getElementById('confirm-delete-password');
let username = localStorage.getItem('username');

deleteButton.addEventListener("click", () => {
    if (deleteConfirm.style.display == "none") {     
        deleteConfirm.innerHTML = 'Enter your password to confirm you wish to permanently delete this account.';
        deleteConfirm.style.display = confirmButton.style.display = password.style.display = "unset";
    } else {
        deleteConfirm.innerHTML = '';
        deleteConfirm.style.display = confirmButton.style.display = password.style.display = "none";
    }
});

confirmButton.addEventListener("click", (event) => {
    event.preventDefault();

        fetch("api/delete.php", {
            method: "POST",
            body: JSON.stringify({
                "username": username,
                "password": password.value 
            })
        })
            .then( res => res.json())
            .then (data => {
                confirmButton.style.display = password.style.display = "none";
                deleteConfirm.innerHTML = (data.message);
                if (data.message.includes('successfully')) {setTimeout(() => {
                    logout();
                    window.location.href = "index.php";    
                }, 4000)};
            });

}); 
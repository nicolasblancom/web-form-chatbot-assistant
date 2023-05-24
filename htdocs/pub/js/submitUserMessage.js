const messageInput = document.querySelector('#messageFromUser');
const messageFromUser = messageInput.value;

var formData = new FormData();
formData.append('messageFromUser', messageFromUser);

fetch('/processMessage.php', {
    method: 'POST',
    body: formData
})
    .then(response => response.json())
    .then(res => {
        console.log(res)
    })
    .catch(err => console.log('Solicitud fallida', err));
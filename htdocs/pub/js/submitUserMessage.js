const form = document.querySelector('#messageForm');
const messageInput = document.querySelector('#messageFromUser');
const contextAppend = [];

form.addEventListener("submit", event => {
    event.preventDefault();

    const messageText = messageInput.value;
    if (!messageText) return;

    messageInput.value = "";
    updateContextToAppend('user', messageText);
    sendMessage(messageText); // TODO send context instead of user message
});

function updateContextToAppend(role, message) {
    contextAppend.push({
        "role": role,
        "content": message
    });
    console.log(contextAppend);
}

function sendMessage(messageFromUser) {
    var formData = new FormData();
    formData.append('messageFromUser', messageFromUser);
    
    fetch('/processMessage.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(res => {
        updateContextToAppend(res.role, res.content);
        
        // TODO: feedback en pantalla
    })
    .catch(err => console.log('Solicitud fallida', err));
}

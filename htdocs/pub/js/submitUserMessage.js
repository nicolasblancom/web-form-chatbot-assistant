const form = document.querySelector('#messageForm');
const messageInput = document.querySelector('#messageFromUser');
const contextAppend = [];

form.addEventListener("submit", event => {
    event.preventDefault();

    const messageText = messageInput.value;
    if (!messageText) return;

    messageInput.value = "";
    updateContextToAppend('user', messageText);
    sendMessage(contextAppend);
});

function updateContextToAppend(role, message) {
    contextAppend.push({
        "role": role,
        "content": message
    });

    // TODO: remove console log
    console.log(contextAppend);
}

function sendMessage(contextAppend) {
    var formData = new FormData();
    formData.append('contextAppend', JSON.stringify(contextAppend));
    
    fetch('/processMessage.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(res => {
        // TODO: remove console log
        // console.log(res);
        updateContextToAppend(res.role, res.content);
        
        // TODO: feedback en pantalla
    })
    .catch(err => console.log('Solicitud fallida', err));
}

const form = document.querySelector('#messageForm');
const messageInput = document.querySelector('#messageFromUser');
const contextAppend = [];

form.addEventListener("submit", event => {
    event.preventDefault();

    const messageText = messageInput.value;
    if (!messageText) return;

    messageInput.value = "";
    updateContextToAppend('user', messageText);
    appendMessageToUi('user', messageText);
    sendMessage(contextAppend);
});

function appendMessageToUi(role, message) {
    const messagesList = document.querySelector('.messages__list');
    const htmlMarkup = `<li class="messages__item messages__item--${role}">
        <span class="meessages__content">${message}</span>
    </li>`;

    messagesList.innerHTML += htmlMarkup;
}

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
            appendMessageToUi(res.role, res.content);
        })
        .catch(err => console.log('Solicitud fallida', err));
}

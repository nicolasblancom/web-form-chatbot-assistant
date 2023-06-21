const form = document.querySelector('#messageForm');
const messageInput = document.querySelector('#messageFromUser');
const contextAppend = [];

function handleFormSubmitEvent() {
    form.addEventListener("submit", event => {
        event.preventDefault();
        submitForm();
    });
}

function submitForm() {
    const messageText = messageInput.value;
    if (!messageText) return;

    messageInput.value = "";
    updateContextToAppend('user', messageText);
    appendMessageToUi('user', messageText);
    sendMessage(contextAppend);
}

function handleFormSubmitOnEnter() {
    messageInput.addEventListener('keydown', event => {
        if(event.key === 'Enter') {
            submitForm();
        }
    });
}

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
            updateContextToAppend(res.role, res.content);
            appendMessageToUi(res.role, res.content);
        })
        .catch(err => console.log('Solicitud fallida', err));
}

function init () {
    handleFormSubmitEvent();
    handleFormSubmitOnEnter();
}

init();
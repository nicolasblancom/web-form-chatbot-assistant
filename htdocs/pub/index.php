<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hello world</title>
</head>

<body>
    <main>
        <div id="messages" class="messages">
            <ul class="messages__list">
                <li class="messages__item messages__item--user">
                    <span class="meessages__content">Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni inventore quisquam mollitia? Ea cum quod nemo! Temporibus, placeat nulla iure aperiam hic quibusdam ipsum nobis qui, perspiciatis cumque corporis nihil.</span>
                </li>
                <li class="messages__item messages__item--assistant">
                    <span class="messages__content">Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni inventore quisquam mollitia? Ea cum quod nemo! Temporibus, placeat nulla iure aperiam hic quibusdam ipsum nobis qui, perspiciatis cumque corporis nihil.</span>
                </li>
            </ul>
        </div>
        <div id="chat" class="chat">
            <form action="#" method="post">
                <textarea name="messageFromUser" id="messageFromUser" cols="30" rows="10" placeholder="Write message to assistant...">Who won the world series in 2020?</textarea>
                <br>
                <input type="submit" value="submit">
            </form>
        </div>
        <script>
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
        </script>
    </main>
</body>

</html>
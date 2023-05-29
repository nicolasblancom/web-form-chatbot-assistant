<?php
require_once '../Src/Bootstrap.php';

//$messages = $chat->getChatMessages(0, 100);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $contextAppend = [
        'role' => 'user',
        'content' => $_POST['messageFromUser'],
    ];
    $messages = $chat->getChatMessages(0, 100, $contextAppend);

    echo $messages;
}

// TODO: remove (debug purposes only)
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    echo '<pre>';
    print_r($messages);
    echo '</pre>';
}

exit;
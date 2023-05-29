<?php
require_once '../Src/Bootstrap.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $contextAppend = json_decode($_POST['contextAppend']);
    $messages = $chat->getChatMessages(0, 100, $contextAppend);

    echo $messages;
}

exit;
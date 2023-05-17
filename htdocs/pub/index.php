<?php

require __DIR__ . '/../vendor/autoload.php'; // remove this line if you use a PHP Framework.

use Orhanerday\OpenAi\OpenAi;

$dotenv = Dotenv\Dotenv::createImmutable('../');
$dotenv->load();

/**
 * TODO: recommended way of define open ai api key is through env variables 
 * (like so: `$open_ai_key = getenv('OPENAI_API_KEY');`), but for now just 
 * use a string in code
 * 
 */
$open_ai_key = $_ENV['OPENAI_API_KEY'];
$open_ai = new OpenAi($open_ai_key);

$chat = $open_ai->chat([
    'model' => 'gpt-3.5-turbo',
    'messages' => [
        [
            "role" => "system",
            "content" => "You are a helpful assistant."
        ],
        [
            "role" => "user",
            "content" => "Who won the world series in 2020?"
        ],
        [
            "role" => "assistant",
            "content" => "The Los Angeles Dodgers won the World Series in 2020."
        ],
        [
            "role" => "user",
            "content" => "Where was it played?"
        ],
    ],
    'temperature' => 0,
    'max_tokens' => 100,
    'frequency_penalty' => 0,
    'presence_penalty' => 0,
 ]);

 // decode response
 $d = json_decode($chat);
 // Get Content
 $content = $d->choices[0]->message->content;
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hello world</title>
</head>
<body>
    <h1>Example chat from orhanerday/open-ai</h1>
    <pre><?= $content ?></pre>
    <pre><?php print_r($chat) ?></pre>
</body>
</html>
<?php

namespace Src\OpenAi;

use Src\OpenAi\OpenaiConnection;

class OpenAiMain
{
    private $connection;
    private $chat;
    private $model;

    public function __construct()
    {
        $this->connection = $this->getConnection();
        $this->model = 'gpt-3.5-turbo';
    }

    private function getConnection()
    {
        $openAiConnection = new OpenaiConnection();

        return $openAiConnection->getConnection();
    }

    public function getChatMessages($temperature = 0, $maxTokens = 100)
    {
        $this->chat = $this->connection->chat([
            'model' => $this->model,
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
            'temperature' => $temperature,
            'max_tokens' => $maxTokens,
            'frequency_penalty' => 0,
            'presence_penalty' => 0,
        ]);

        // decode response
        $decodedMessages = json_decode($this->chat);

        // Get Content
        $content = $decodedMessages->choices[0]->message->content;

        return $content;
    }
}

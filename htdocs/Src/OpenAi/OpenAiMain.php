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

    public function getChatMessages(
        $temperature = 0,
        $maxTokens = 100,
        $contextAppend  = [],
        $completeResponse = false,
        $json = true
    ) {
        $messagesContext = [];
        $messagesContext[] = [
            "role" => "system",
            "content" => "You are a helpful assistant."
        ];
        $messagesContext[] = [
            "role" => "user",
            "content" => "Hello!"
        ];
        $messagesContext[] = [
            "role" => "assistant",
            "content" => "How can I help you?"
        ];

        $messagesContext[] = $contextAppend;

        $this->chat = $this->connection->chat([
            'model' => $this->model,
            'messages' => $messagesContext,
            'temperature' => $temperature,
            'max_tokens' => $maxTokens,
            'frequency_penalty' => 0,
            'presence_penalty' => 0,
        ]);

        // decode response
        $response = $this->chat;
        
        if ($completeResponse) {
            if ($json) {
                return $response;
            }
            
            return json_decode($response);
        }

        // Get Content
        $decodedResponse = json_decode($response);
        $message = $decodedResponse->choices[0]->message;

        if ($json) {
            return json_encode($message);
        }

        return $message;
    }
}

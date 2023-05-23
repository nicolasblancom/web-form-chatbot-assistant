<?php

namespace Src\OpenAi;

use Orhanerday\OpenAi\OpenAi;
use Src\Env\EnvLoader;

class OpenaiConnection
{

    private $envLoader;
    private $openai;
    private $open_ai_key;

    public function __construct()
    {
        $this->envLoader = new EnvLoader();
        $this->open_ai_key = $this->getApiKey();
        $this->openai = new OpenAi($this->open_ai_key);
    }

    private function getApiKey()
    {
        $envVariables = $this->envLoader->getEnvVariables();

        return $envVariables['OPENAI_API_KEY'];
    }

    public function getConnection()
    {
        return $this->openai;
    }
}

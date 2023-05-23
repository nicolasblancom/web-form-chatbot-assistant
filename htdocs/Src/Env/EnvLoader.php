<?php

namespace Src\Env;

class EnvLoader
{
    private $envVariables;

    public function __construct()
    {
        $dotenv = \Dotenv\Dotenv::createImmutable('../');
        $dotenv->load();
        $this->envVariables = $_SERVER;
    }

    public function getEnvVariables()
    {
        return $this->envVariables;
    }
}

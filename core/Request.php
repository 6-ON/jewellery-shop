<?php

namespace app\core;

class Request
{
    public function getPath()
    {
        $path = $_SERVER["REQUEST_URI"];
        $position = strpos($path, '?');
        if ($position === false) {
            return $path;
        } else {
            return substr($path,0,$position);
        }
    }

    public function method(): string
    {
        return strtolower($_SERVER["REQUEST_METHOD"]);
    }

    public function isGet(): bool
    {
        return strtolower($_SERVER["REQUEST_METHOD"]) === 'get';
    }

    public function isPost(): bool
    {
        return strtolower($_SERVER["REQUEST_METHOD"]) === 'post';
    }

    public function getBody(): array
    {
        $body = [];

        if ($this->isPost()) {
            foreach ($_POST as $key => $value) {

                $body[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }

        if ($this->isGet()) {
            foreach ($_GET as $key => $value) {

                $body[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }

        return $body;
    }

}
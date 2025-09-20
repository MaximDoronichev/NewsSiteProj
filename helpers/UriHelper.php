<?php
class UriHelper {
    public string $uri;
    public array $params = [];

    public function __construct()
    {
        $this->uri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');

        $this->parseUriParams();
        

        foreach ($_GET as $key => $value) {
            if ($key !== 'url') {
                $this->params[$key] = $value;
            }
        }
    }

    private function parseUriParams(): void
    {
        $segments = explode('/', $this->uri);
        
        if (count($segments) >= 2) {
            $key = $segments[0];
            $value = $segments[1];
            $this->params[$key] = $value;
        }
    }

    public function get(string $key, $default = null)
    {
        return $this->params[$key] ?? $default;
    }
    
    public function getUri(): string
    {
        return $this->uri;
    }
    
    public function getAllParams(): array
    {
        return $this->params;
    }
}
<?php

namespace {
    
    use Core\Bootstrap;
    use Slim\Psr7\Response;

    function root_path(): string
    {
        return _ROOT_;
    }

    function resource_path(): string
    {
        return _RESOURCES_;
    }

    function view_path(): string
    {
        return _RESOURCES_ . '/views';
    }

    function app()
    {
        return Bootstrap::$appInstance;
    }

    function db()
    {
        return Bootstrap::$dbInstance;
    }

    function app_env(): string
    {
        return config('APP_ENV');
    }

    function config($key)
    {
        $config = getenv($key);
            
        // filter boolean values
        $boolValues = ['0', '1', 'on', 'off', 'yes', 'no', 'true', 'false', ''];
        if (in_array($config, $boolValues)) {
            $config = filter_var($config, FILTER_VALIDATE_BOOLEAN);
        }

        // filter interger values
        if (is_numeric($config)) {
            $config = filter_var($config, FILTER_VALIDATE_INT);
        }

        return $config;
    }

    function asset(string $path): string
    {
        $assetUrl = config('ASSET_URL');
        if (empty($assetUrl)) {
            $assetUrl = config('APP_URL');
        }
        return $assetUrl . $path;
    }

    function url(string $path = '', array $params = []): string
    {
        if (empty($path)) {
            // current qualified url
            $urlParts = parse_url(config('APP_URL'));
            $path = $_SERVER['REQUEST_URI'];
            $url = $urlParts['scheme'] . '://' . $urlParts['host'] . $path;
        } else {
            $url = config('APP_URL') . $path;
            $url .= !empty($params) ? '/' . implode('/', $params) : null;
        }

        return $url;
    }

    function route_url(
        string $routeName,
        array $params = [],
        array $opts = []
    ): ?string {

        $routeParser = Bootstrap::$appInstance
            ->getRouteCollector()
            ->getRouteParser();

        $queryParams = !empty($opts['query']) ? $opts['query'] : [];

        try {
            $url = $routeParser->urlFor($routeName, $params, $queryParams);
            
            // fully qualified url if the fullUrl option is not set or it's set to true
            if (
                !isset($opts['fullUrl']) ||
                (isset($opts['fullUrl']) && $opts['fullUrl'] == true)
            ) {
                $urlParts = parse_url(config('APP_URL'));
                $url = $urlParts['scheme'] . '://' . $urlParts['host'] . $url;
            }
            
            return $url;
        } catch (\Exception $e) {
            return config('APP_URL');
        }
    }

    function redirect(
        Response $response,
        string $routeName,
        array $params = [],
        array $opts = []
    ): Response {

        $redirectUrl = $this->urlFor($routeName, $params, $opts);
        return $response
            ->withHeader('Location', $redirectUrl)
            ->withStatus(302);
    }

    function remove_trail(string $str): string
    {
        $str = trim($str);
        $strLen = strlen($str);

        $lastChar = substr($str, strlen($str) - 1, strlen($str));
        if ($lastChar == '/') {
            $str = substr($str, 0, $strLen - 1);
        }

        return $str;
    }

    function json_response(Response $response, $payload): Response
    {
        if (is_array($payload)) {
            $payload = json_encode($payload);
        }

        $response->getBody()->write($payload);
        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(201);
    }

    function view(Response $response = null, $template = null, $params = [])
    {
        if ($response == null && $template == null) {
            return Bootstrap::$twigInstance;
        }

        $view = view()->render($template, $params);
        $response->getBody()->write($view);
        return $response;
    }
}

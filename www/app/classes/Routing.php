<?php

namespace app\classes;

use app\View;

class Routing
{
    protected RequestParse $requestParse;
    static public array $routMap = array();

    /**
     * Routing constructor.
     */
    public function __construct()
    {
        $this->requestParse = new RequestParse();
    }

    /**
     * Составляем карту запросов для сопоставления с текущим.
     * @param $request
     * @return array
     */
    protected function mapRequest($request): array
    {

        $explodeRequest = $this->requestParse->explodeRequest($request);

        $regexp = '/\{([a-zA-Z0-9-_]+)}/m';
        $routeRequest = null;

        foreach ($explodeRequest as $value) {
            if (preg_match($regexp, $value, $matches)) {
                $routeRequest[] = array(
                    'name' => $matches[1],
                    'dynamic' => 1
                );
            } else {
                $routeRequest[] = array(
                    'name' => $value,
                    'dynamic' => 0
                );
            }
        }

        return $routeRequest;

    }


    /**
     * @param string $request
     * @param string $controller
     */
    public function addMap(string $request, string $controller): void
    {
        self::$routMap[] = array(
            'request' => $this->mapRequest($request),
            'controller' => explode('@', $controller)
        );
    }



    public function routeStart(): void
    {
        $route = $this->requestParse->defineRout();
        $params = $this->requestParse->getParams($route);

        $controllerName = 'app\controllers\\' . $route['controller'][0];

        if (class_exists($controllerName)) {
            $action = $route['controller'][1] ?? 'index';
            new $controllerName($action, $params);
        } else {
            View::page404();
        }

    }
}



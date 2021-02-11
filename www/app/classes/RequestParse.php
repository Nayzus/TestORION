<?php
/**
 * Created by PhpStorm.
 * User Nayzus [nayzus@list.ru].
 * Date: 05.02.2021.
 * Time: 11:51.
 **/

namespace app\classes;


use app\View;

class RequestParse
{
    /*
     * Массив запроса
     */
    public array $requestArray;

    public function __construct()
    {
        $this->requestArray = $this->explodeRequest($_SERVER['REQUEST_URI']);

    }

    /**
     * Разделение Url на массив для последующей обработки
     * @param $request
     * @return array
     */
    public function explodeRequest($request): array
    {
        if($request === '/') {
            return ['index'];
        }

        $explodeRequest = explode('/', $request);

        $filteredRequest = array();
        foreach ($explodeRequest as $value)
        {
            if (!empty($value))
            {
                $filteredRequest[] = $value;
            }
        }
        return $filteredRequest;
    }


    /**
     * Получаем динамические данные из request
     * @param $routes
     * @return array
     */
    public function getParams($routes): array
    {
        $params = array();
        $request = $this->requestArray;

        for ($i=0, $iMax = count($routes['request']); $i < $iMax; $i++) {
            if ($routes['request'][$i]['dynamic'] === 1) {
                $params[$routes['request'][$i]['name']]  = $request[$i];
            }
        }
        return $params;

    }

    /**
     * Ищем роутсы в карте запросов
     * @return mixed
     */
    public function defineRout()
    {
        $search = 0;
        foreach (Routing::$routMap as $map) {
            if (count($map['request']) !== count($this->requestArray)) {
                continue;
            }
            for ($i=0, $iMax = count($map['request']); $i < $iMax; $i++) {

                $param1 = $map['request'][$i]['name'];
                $param2 = $this->requestArray[$i];
                $dynamic = $map['request'][$i]['dynamic'];

                if ($dynamic === 1) {
                    $search = 1;
                }
                elseif ($param1 === $param2) {
                    $search = 1;
                }
                else {
                    $search = 0;
                    break;
                }
            }

            if ($search === 1) {
                return $map;
            }
        }
        View::page404();
    }
}


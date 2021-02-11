<?php
/**
 * Created by PhpStorm.
 * User Nayzus [nayzus@list.ru].
 * Date: 04.02.2021.
 * Time: 14:42.
 **/


use app\classes\Routing;
use app\models\CamerasModel;

require_once __DIR__.'/autoload.php';

/**Включаем вывод ошибок**/

ini_set('display_errors', 1);

$route = new Routing();

$route->addMap('/', 'IndexController');
$route->addMap('/page/{page_num}', 'IndexController@pages');

$route->addMap('/city/{city_id}', 'CityController');
$route->addMap('/city/{city_id}/page/{page_num}', 'CityController@pages');

$route->routeStart();



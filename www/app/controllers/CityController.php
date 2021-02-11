<?php
namespace app\controllers;

use app\Controllers;
use app\models\CamerasModel;
use app\View;

/**
 * Created by PhpStorm.
 * User Nayzus [nayzus@list.ru].
 * Date: 04.02.2021.
 * Time: 15:03.
 **/

class CityController extends Controllers
{
    /**
     * Доступные параметры передаваемые роутером
     * @city_id: $this->params['@city_id']
     */
    public function index():void {
        $cameras = new CamerasModel($this->params['city_id']);
        $view = new View();


        $view->setData('cameras', $cameras->getPosts(1));
        $view->setData('pages', array(
            'count'=>$cameras->getPageCount(),
            'current'=>$cameras->currentPage,
            'url'=>'/city/'.$this->params['city_id'].'/',
            'city_id'=>$this->params['city_id']
        ));

        $view->render('main.php');
    }

    /**
     * Доступные параметры передаваемые роутером
     * @city_id: $this->params['@city_id']
     * @page_num: $this->params['@page_num']
     */
    public function pages(): void
    {
        $cameras = new CamerasModel($this->params['city_id']);
        $view = new View();

        $view->setData('cameras', $cameras->getPosts( $this->params['page_num']));
        $view->setData('pages', array(
            'count'=>$cameras->getPageCount(),
            'current'=>$cameras->currentPage,
            'url'=>'/city/'.$this->params['city_id'].'/',
            'city_id'=>$this->params['city_id']
        ));

        $view->render('main.php');
    }

}